<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1523890696.
 * Generated on 2018-04-16 16:58:16 
 */
class PropelMigration_1523890696
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

CREATE TABLE `usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(50),
    `usuario` VARCHAR(32) NOT NULL,
    `clave` VARCHAR(60),
    `correo` VARCHAR(255),
    `estado` VARCHAR(32),
    `imagen` VARCHAR(255),
    `administrador` TINYINT(1) DEFAULT 0,
    `validado` TINYINT(1) DEFAULT 1,
    `ultimo_ingreso` DATE,
    `tema` VARCHAR(255),
    `frase` VARCHAR(255),
    `genero` VARCHAR(30),
    `fecha_nacimiento` DATE,
    `nombre_completo` VARCHAR(320),
    `empresa` VARCHAR(320),
    `logo` VARCHAR(200),
    `activo` TINYINT(1) DEFAULT 1,
    `tipo_usuario` VARCHAR(320),
    `observaciones` TEXT,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `llave` (`usuario`)
) ENGINE=InnoDB;

CREATE TABLE `perfil`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(100) DEFAULT \'\',
    `observaciones` TEXT,
    `activo` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `menu_seguridad`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(100) DEFAULT \'\',
    `credencial` VARCHAR(100),
    `modulo` VARCHAR(100),
    `icono` VARCHAR(50),
    `accion` VARCHAR(100),
    `superior` INTEGER,
    `orden` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `usuario_perfil`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `perfil_id` INTEGER,
    `usuario_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `usuario_perfil_FI_1` (`perfil_id`),
    INDEX `usuario_perfil_FI_2` (`usuario_id`),
    CONSTRAINT `usuario_perfil_FK_1`
        FOREIGN KEY (`perfil_id`)
        REFERENCES `perfil` (`id`),
    CONSTRAINT `usuario_perfil_FK_2`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `correlativo_codigo`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `numero_asginar` INTEGER,
    `prefijo` VARCHAR(50),
    `tipo` VARCHAR(100),
    PRIMARY KEY (`id`)
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

DROP TABLE IF EXISTS `usuario`;

DROP TABLE IF EXISTS `perfil`;

DROP TABLE IF EXISTS `menu_seguridad`;

DROP TABLE IF EXISTS `usuario_perfil`;

DROP TABLE IF EXISTS `correlativo_codigo`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}