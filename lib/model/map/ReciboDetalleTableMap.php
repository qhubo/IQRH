<?php



/**
 * This class defines the structure of the 'recibo_detalle' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 08/09/19 22:15:15
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ReciboDetalleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ReciboDetalleTableMap';

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
        $this->setName('recibo_detalle');
        $this->setPhpName('ReciboDetalle');
        $this->setClassname('ReciboDetalle');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('ID_C', 'IdC', 'INTEGER', false, null, null);
        $this->addColumn('PLANILLA_RESUMEN_ID', 'PlanillaResumenId', 'INTEGER', false, null, null);
        $this->addColumn('TIPO', 'Tipo', 'VARCHAR', false, 20, null);
        $this->addColumn('AFECA_SS', 'AfecaSs', 'INTEGER', false, null, null);
        $this->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 200, null);
        $this->addColumn('MONTO', 'Monto', 'DOUBLE', false, null, null);
        $this->addColumn('DEBE', 'Debe', 'DOUBLE', false, null, null);
        $this->addColumn('HABER', 'Haber', 'DOUBLE', false, null, null);
        $this->addColumn('IDENTIFICAR', 'Identificar', 'VARCHAR', false, 10, null);
        $this->addColumn('CABECERA_IN', 'CabeceraIn', 'INTEGER', false, null, null);
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

} // ReciboDetalleTableMap
