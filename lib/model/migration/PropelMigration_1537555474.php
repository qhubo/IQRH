<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1537555474.
 * Generated on 2018-09-21 20:44:34 
 */
class PropelMigration_1537555474
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

ALTER TABLE `aumento_usuario`
    ADD `archivo_uno` VARCHAR(150) AFTER `observaciones`,
    ADD `archivo_dos` VARCHAR(150) AFTER `archivo_uno`;

ALTER TABLE `bitacora_usuario`
    ADD `archivo_uno` VARCHAR(150) AFTER `fecha`,
    ADD `archivo_dos` VARCHAR(150) AFTER `archivo_uno`;

ALTER TABLE `capacitacion_usuario`
    ADD `archivo_uno` VARCHAR(150) AFTER `observaciones`,
    ADD `archivo_dos` VARCHAR(150) AFTER `archivo_uno`;

ALTER TABLE `catalogo_solicitud`
    ADD `archivo_uno` VARCHAR(150) AFTER `activo`,
    ADD `archivo_dos` VARCHAR(150) AFTER `archivo_uno`;

ALTER TABLE `solicitud_ausencia`
    ADD `archivo_uno` VARCHAR(150) AFTER `comentario_modero`,
    ADD `archivo_dos` VARCHAR(150) AFTER `archivo_uno`,
    ADD `fecha_fin` DATE AFTER `archivo_dos`;

ALTER TABLE `solicitud_finquito`
    ADD `archivo_uno` VARCHAR(150) AFTER `comentario_modero`,
    ADD `archivo_dos` VARCHAR(150) AFTER `archivo_uno`;

ALTER TABLE `solicitud_usuario`
    ADD `archivo_uno` VARCHAR(150) AFTER `comentario_modero`,
    ADD `archivo_dos` VARCHAR(150) AFTER `archivo_uno`;

ALTER TABLE `solicitud_vacacion`
    ADD `archivo_uno` VARCHAR(150) AFTER `jefe`,
    ADD `archivo_dos` VARCHAR(150) AFTER `archivo_uno`;

ALTER TABLE `vacacion_usuario`
    ADD `archivo_uno` VARCHAR(150) AFTER `observaciones`,
    ADD `archivo_dos` VARCHAR(150) AFTER `archivo_uno`;

CREATE TABLE `ausencia_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `solicitud_ausencia_id` INTEGER,
    `dia` DATE,
    PRIMARY KEY (`id`),
    INDEX `ausencia_detalle_FI_1` (`usuario_id`),
    INDEX `ausencia_detalle_FI_2` (`solicitud_ausencia_id`),
    CONSTRAINT `ausencia_detalle_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`),
    CONSTRAINT `ausencia_detalle_FK_2`
        FOREIGN KEY (`solicitud_ausencia_id`)
        REFERENCES `solicitud_ausencia` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `tipo_ausencia`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa` VARCHAR(300),
    `observacioes` TEXT,
    `dia` INTEGER,
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

DROP TABLE IF EXISTS `ausencia_detalle`;

DROP TABLE IF EXISTS `tipo_ausencia`;

ALTER TABLE `aumento_usuario` DROP `archivo_uno`;

ALTER TABLE `aumento_usuario` DROP `archivo_dos`;

ALTER TABLE `bitacora_usuario` DROP `archivo_uno`;

ALTER TABLE `bitacora_usuario` DROP `archivo_dos`;

ALTER TABLE `capacitacion_usuario` DROP `archivo_uno`;

ALTER TABLE `capacitacion_usuario` DROP `archivo_dos`;

ALTER TABLE `catalogo_solicitud` DROP `archivo_uno`;

ALTER TABLE `catalogo_solicitud` DROP `archivo_dos`;

ALTER TABLE `solicitud_ausencia` DROP `archivo_uno`;

ALTER TABLE `solicitud_ausencia` DROP `archivo_dos`;

ALTER TABLE `solicitud_ausencia` DROP `fecha_fin`;

ALTER TABLE `solicitud_finquito` DROP `archivo_uno`;

ALTER TABLE `solicitud_finquito` DROP `archivo_dos`;

ALTER TABLE `solicitud_usuario` DROP `archivo_uno`;

ALTER TABLE `solicitud_usuario` DROP `archivo_dos`;

ALTER TABLE `solicitud_vacacion` DROP `archivo_uno`;

ALTER TABLE `solicitud_vacacion` DROP `archivo_dos`;

ALTER TABLE `vacacion_usuario` DROP `archivo_uno`;

ALTER TABLE `vacacion_usuario` DROP `archivo_dos`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}