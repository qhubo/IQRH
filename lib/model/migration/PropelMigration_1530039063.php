<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1530039063.
 * Generated on 2018-06-26 20:51:03 
 */
class PropelMigration_1530039063
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

ALTER TABLE `solicitud_ausencia`
    ADD `jefe` INTEGER AFTER `updated_at`,
    ADD `usuario_modero` VARCHAR(150) AFTER `jefe`,
    ADD `comentario_modero` TEXT AFTER `usuario_modero`;

ALTER TABLE `solicitud_finquito`
    ADD `jefe` INTEGER AFTER `updated_at`,
    ADD `usuario_modero` VARCHAR(150) AFTER `jefe`,
    ADD `comentario_modero` TEXT AFTER `usuario_modero`;

ALTER TABLE `solicitud_vacacion`
    ADD `jefe` INTEGER AFTER `updated_at`;

ALTER TABLE `usuario`
    ADD `usuario_jefe` INTEGER AFTER `sueldo`;

CREATE TABLE `capacitacion_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `nombre` VARCHAR(250),
    `fecha` DATE,
    `observaciones` TEXT,
    PRIMARY KEY (`id`),
    INDEX `capacitacion_usuario_FI_1` (`usuario_id`),
    CONSTRAINT `capacitacion_usuario_FK_1`
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

DROP TABLE IF EXISTS `capacitacion_usuario`;

ALTER TABLE `solicitud_ausencia` DROP `jefe`;

ALTER TABLE `solicitud_ausencia` DROP `usuario_modero`;

ALTER TABLE `solicitud_ausencia` DROP `comentario_modero`;

ALTER TABLE `solicitud_finquito` DROP `jefe`;

ALTER TABLE `solicitud_finquito` DROP `usuario_modero`;

ALTER TABLE `solicitud_finquito` DROP `comentario_modero`;

ALTER TABLE `solicitud_vacacion` DROP `jefe`;

ALTER TABLE `usuario` DROP `usuario_jefe`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}