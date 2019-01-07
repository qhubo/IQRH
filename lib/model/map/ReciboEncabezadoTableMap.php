<?php



/**
 * This class defines the structure of the 'recibo_encabezado' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 01/07/19 03:29:16
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ReciboEncabezadoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ReciboEncabezadoTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('recibo_encabezado');
        $this->setPhpName('ReciboEncabezado');
        $this->setClassname('ReciboEncabezado');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('PLANILLA_RESUMEN_ID', 'PlanillaResumenId', 'INTEGER', false, null, null);
        $this->addColumn('EMPLEADO', 'Empleado', 'VARCHAR', false, 150, null);
        $this->addColumn('EMPLEADO_PROYECTO_ID', 'EmpleadoProyectoId', 'INTEGER', false, null, null);
        $this->addColumn('SUELDO_BASE', 'SueldoBase', 'DOUBLE', false, null, null);
        $this->addColumn('BONIFICACION_BASE', 'BonificacionBase', 'VARCHAR', false, 50, null);
        $this->addColumn('DIAS_AUSENCIAS', 'DiasAusencias', 'DOUBLE', false, null, null);
        $this->addColumn('DIAS_SUSPENDIDO', 'DiasSuspendido', 'DOUBLE', false, null, null);
        $this->addColumn('SEPTIMOS', 'Septimos', 'DOUBLE', false, null, null);
        $this->addColumn('TOTAL_DESCUENTOS', 'TotalDescuentos', 'DOUBLE', false, null, null);
        $this->addColumn('TOTAL_INGRESOS', 'TotalIngresos', 'DOUBLE', false, null, null);
        $this->addColumn('TOTAL_EXTRAS', 'TotalExtras', 'DOUBLE', false, null, null);
        $this->addColumn('TOTAL_SUELDO_LIQUIDO', 'TotalSueldoLiquido', 'DOUBLE', false, null, null);
        $this->addColumn('ALTA', 'Alta', 'VARCHAR', false, 150, null);
        $this->addColumn('BAJA', 'Baja', 'VARCHAR', false, 150, null);
        $this->addColumn('CODIGO', 'Codigo', 'VARCHAR', false, 150, null);
        $this->addColumn('PUESTO', 'Puesto', 'VARCHAR', false, 150, null);
        $this->addColumn('DEPARTAMENTO', 'Departamento', 'VARCHAR', false, 150, null);
        $this->addColumn('DIAS_BASE', 'DiasBase', 'DOUBLE', false, null, null);
        $this->addColumn('BLOQUE', 'Bloque', 'VARCHAR', false, 50, null);
        $this->addColumn('INICIO', 'Inicio', 'VARCHAR', false, 50, null);
        $this->addColumn('FIN', 'Fin', 'VARCHAR', false, 50, null);
        $this->addColumn('NUMERO', 'Numero', 'VARCHAR', false, 50, null);
        $this->addColumn('LABORADOS', 'Laborados', 'DOUBLE', false, null, null);
        $this->addColumn('CABECERA_IN', 'CabeceraIn', 'INTEGER', false, null, null);
        $this->addColumn('ENVIADO_CORREO', 'EnviadoCorreo', 'BOOLEAN', false, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
        );
    } // getBehaviors()

} // ReciboEncabezadoTableMap
