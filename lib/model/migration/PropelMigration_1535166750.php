<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1535166750.
 * Generated on 2018-08-25 05:12:30 
 */
class PropelMigration_1535166750
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

ALTER TABLE `recibo_cabecera`
    ADD `cabecera_in` INTEGER AFTER `texto`;

ALTER TABLE `recibo_detalle`
    ADD `cabecera_in` INTEGER AFTER `identificar`;

ALTER TABLE `recibo_encabezado`
    ADD `cabecera_in` INTEGER AFTER `laborados`;

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

ALTER TABLE `recibo_cabecera` DROP `cabecera_in`;

ALTER TABLE `recibo_detalle` DROP `cabecera_in`;

ALTER TABLE `recibo_encabezado` DROP `cabecera_in`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}