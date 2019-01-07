<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1546828102.
 * Generated on 2019-01-07 03:28:22 
 */
class PropelMigration_1546828102
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

CREATE TABLE `perfil_menu`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `perfil_id` INTEGER,
    `menu_seguridad_id` INTEGER,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `perfil_menu_FI_1` (`perfil_id`),
    INDEX `perfil_menu_FI_2` (`menu_seguridad_id`),
    CONSTRAINT `perfil_menu_FK_1`
        FOREIGN KEY (`perfil_id`)
        REFERENCES `perfil` (`id`),
    CONSTRAINT `perfil_menu_FK_2`
        FOREIGN KEY (`menu_seguridad_id`)
        REFERENCES `menu_seguridad` (`id`)
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

DROP TABLE IF EXISTS `perfil_menu`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}