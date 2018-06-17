<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1529202726.
 * Generated on 2018-06-17 04:32:06 
 */
class PropelMigration_1529202726
{

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'propel' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `usuario`
    ADD `primer_nombre` VARCHAR(200) AFTER `observaciones`,
    ADD `segundo_nombre` VARCHAR(200) AFTER `primer_nombre`,
    ADD `primer_apellido` VARCHAR(200) AFTER `segundo_nombre`,
    ADD `segundo_apellido` VARCHAR(200) AFTER `primer_apellido`,
    ADD `puesto` VARCHAR(200) AFTER `segundo_apellido`,
    ADD `departamento` VARCHAR(300) AFTER `puesto`,
    ADD `jefe` VARCHAR(300) AFTER `departamento`,
    ADD `fecha_alta` DATE AFTER `jefe`,
    ADD `sueldo` DOUBLE AFTER `fecha_alta`;

CREATE TABLE `alerta_ausencia`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `fecha` DATE,
    `estado` VARCHAR(150),
    `usuario_modero` VARCHAR(150),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `alerta_ausencia_FI_1` (`usuario_id`),
    CONSTRAINT `alerta_ausencia_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `solicitud_ausencia`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `fecha` DATE,
    `motivo` VARCHAR(250),
    `observaciones` TEXT,
    `estado` VARCHAR(150),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `solicitud_ausencia_FI_1` (`usuario_id`),
    CONSTRAINT `solicitud_ausencia_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `solicitud_vacacion`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `fecha_inicio` DATE,
    `fecha_fin` DATE,
    `dia` INTEGER,
    `motivo` VARCHAR(250),
    `observaciones` TEXT,
    `usuario_modero` VARCHAR(150),
    `estado` VARCHAR(150),
    `comentario_modero` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `solicitud_vacacion_FI_1` (`usuario_id`),
    CONSTRAINT `solicitud_vacacion_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `solicitud_finquito`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_graba` INTEGER,
    `usuario_retiro` INTEGER,
    `fecha_retiro` DATE,
    `motivo` VARCHAR(250),
    `observaciones` TEXT,
    `estado` VARCHAR(150),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `solicitud_finquito_I_1` (`usuario_graba`),
    INDEX `solicitud_finquito_I_2` (`usuario_retiro`),
    CONSTRAINT `solicitud_finquito_FK_1`
        FOREIGN KEY (`usuario_graba`)
        REFERENCES `usuario` (`id`),
    CONSTRAINT `solicitud_finquito_FK_2`
        FOREIGN KEY (`usuario_retiro`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `vacacion_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `periodo` INTEGER,
    `fecha_inicio` DATE,
    `fecha_fin` DATE,
    `valor` DOUBLE,
    `dias` INTEGER,
    `observaciones` TEXT,
    PRIMARY KEY (`id`),
    INDEX `vacacion_usuario_FI_1` (`usuario_id`),
    CONSTRAINT `vacacion_usuario_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `aumento_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `fecha_aumento` DATE,
    `sueldo_anterior` DOUBLE,
    `puesto_anterior` VARCHAR(250),
    `sueldo` DOUBLE,
    `nuevo_puesto` VARCHAR(250),
    `observaciones` TEXT,
    PRIMARY KEY (`id`),
    INDEX `aumento_usuario_FI_1` (`usuario_id`),
    CONSTRAINT `aumento_usuario_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'propel' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `alerta_ausencia`;

DROP TABLE IF EXISTS `solicitud_ausencia`;

DROP TABLE IF EXISTS `solicitud_vacacion`;

DROP TABLE IF EXISTS `solicitud_finquito`;

DROP TABLE IF EXISTS `vacacion_usuario`;

DROP TABLE IF EXISTS `aumento_usuario`;

ALTER TABLE `usuario` DROP `primer_nombre`;

ALTER TABLE `usuario` DROP `segundo_nombre`;

ALTER TABLE `usuario` DROP `primer_apellido`;

ALTER TABLE `usuario` DROP `segundo_apellido`;

ALTER TABLE `usuario` DROP `puesto`;

ALTER TABLE `usuario` DROP `departamento`;

ALTER TABLE `usuario` DROP `jefe`;

ALTER TABLE `usuario` DROP `fecha_alta`;

ALTER TABLE `usuario` DROP `sueldo`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}