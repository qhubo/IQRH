<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1531107147.
 * Generated on 2018-07-09 05:32:27 
 */
class PropelMigration_1531107147
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

ALTER TABLE `solicitud_ausencia` CHANGE `estado` `estado` VARCHAR(150) DEFAULT \'Pendiente\';

ALTER TABLE `solicitud_vacacion` CHANGE `estado` `estado` VARCHAR(150) DEFAULT \'Pendiente\';

CREATE TABLE `bitacora_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `usuario_jefe` INTEGER,
    `motivo` TEXT,
    `leido` TINYINT(1) DEFAULT 0,
    `tipo` VARCHAR(50),
    `identificador` VARCHAR(250),
    `fecha` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `bitacora_usuario_FI_1` (`usuario_id`),
    CONSTRAINT `bitacora_usuario_FK_1`
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

DROP TABLE IF EXISTS `bitacora_usuario`;

ALTER TABLE `solicitud_ausencia` CHANGE `estado` `estado` VARCHAR(150);

ALTER TABLE `solicitud_vacacion` CHANGE `estado` `estado` VARCHAR(150);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}