<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1533578476.
 * Generated on 2018-08-06 20:01:16 
 */
class PropelMigration_1533578476
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

CREATE TABLE `catalogo_solicitud`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100) DEFAULT \'\',
    `observaciones` TEXT,
    `activo` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `solicitud_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `fecha` DATE,
    `catalogo_solicitud_id` INTEGER,
    `observaciones` TEXT,
    `estado` VARCHAR(150) DEFAULT \'Pendiente\',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `jefe` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `solicitud_usuario_FI_1` (`usuario_id`),
    INDEX `solicitud_usuario_FI_2` (`catalogo_solicitud_id`),
    CONSTRAINT `solicitud_usuario_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`),
    CONSTRAINT `solicitud_usuario_FK_2`
        FOREIGN KEY (`catalogo_solicitud_id`)
        REFERENCES `catalogo_solicitud` (`id`)
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

DROP TABLE IF EXISTS `catalogo_solicitud`;

DROP TABLE IF EXISTS `solicitud_usuario`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}