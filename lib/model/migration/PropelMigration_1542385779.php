<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1542385779.
 * Generated on 2018-11-16 17:29:39 
 */
class PropelMigration_1542385779
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

CREATE UNIQUE INDEX `llave` ON `dia_feriado` (`dia`);

ALTER TABLE `empresa_horario`
    ADD `estricto` TINYINT(1) DEFAULT 1 AFTER `hora_fin24`,
    ADD `minuto_prorroga` INTEGER AFTER `estricto`;

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

DROP INDEX `llave` ON `dia_feriado`;

ALTER TABLE `empresa_horario` DROP `estricto`;

ALTER TABLE `empresa_horario` DROP `minuto_prorroga`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}