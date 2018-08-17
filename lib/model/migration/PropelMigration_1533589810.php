<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1533589810.
 * Generated on 2018-08-06 23:10:10 
 */
class PropelMigration_1533589810
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

CREATE TABLE `recibo_encabezado`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `Planilla_Resumen_id` INTEGER,
    `empleado` VARCHAR(150),
    `empleado_proyecto_id` INTEGER,
    `sueldo_base` DOUBLE,
    `bonificacion_base` VARCHAR(50),
    `dias_ausencias` DOUBLE,
    `dias_suspendido` DOUBLE,
    `septimos` DOUBLE,
    `total_descuentos` DOUBLE,
    `total_ingresos` DOUBLE,
    `total_extras` DOUBLE,
    `total_sueldo_liquido` DOUBLE,
    `alta` VARCHAR(150),
    `baja` VARCHAR(150),
    `codigo` VARCHAR(150),
    `puesto` VARCHAR(150),
    `departamento` VARCHAR(150),
    `dias_base` DOUBLE,
    `bloque` VARCHAR(50),
    `inicio` VARCHAR(50),
    `fin` VARCHAR(50),
    `numero` VARCHAR(50),
    `laborados` DOUBLE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `recibo_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `id_c` INTEGER,
    `planilla_resumen_id` INTEGER,
    `tipo` VARCHAR(20),
    `afeca_ss` INTEGER,
    `descripcion` VARCHAR(200),
    `monto` DOUBLE,
    `debe` DOUBLE,
    `haber` DOUBLE,
    `identificar` VARCHAR(10),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `recibo_cabecera`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `planilla` VARCHAR(100),
    `inicio` VARCHAR(15),
    `fin` VARCHAR(15),
    `proyecto` VARCHAR(200),
    `empresa` VARCHAR(200),
    `razon_social` VARCHAR(200),
    `direccion` VARCHAR(300),
    `email` VARCHAR(10),
    `telefono` VARCHAR(10),
    `nombre_comercial` VARCHAR(300),
    `texto` TEXT,
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

DROP TABLE IF EXISTS `recibo_encabezado`;

DROP TABLE IF EXISTS `recibo_detalle`;

DROP TABLE IF EXISTS `recibo_cabecera`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}