<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1546460944.
 * Generated on 2019-01-02 21:29:04 
 */
class PropelMigration_1546460944
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

ALTER TABLE `empresa_horario`
    ADD `correo_notifica` VARCHAR(300) AFTER `texto_dos`;

ALTER TABLE `parametro`
    ADD `puerto_correo` VARCHAR(50) AFTER `logo`,
    ADD `smtp_correo` VARCHAR(50) AFTER `puerto_correo`,
    ADD `usuario_correo` VARCHAR(100) AFTER `smtp_correo`,
    ADD `clave_correo` VARCHAR(100) AFTER `usuario_correo`;

ALTER TABLE `recibo_encabezado`
    ADD `enviado_correo` TINYINT(1) DEFAULT 0 AFTER `cabecera_in`;

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

ALTER TABLE `empresa_horario` DROP `correo_notifica`;

ALTER TABLE `parametro` DROP `puerto_correo`;

ALTER TABLE `parametro` DROP `smtp_correo`;

ALTER TABLE `parametro` DROP `usuario_correo`;

ALTER TABLE `parametro` DROP `clave_correo`;

ALTER TABLE `recibo_encabezado` DROP `enviado_correo`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}