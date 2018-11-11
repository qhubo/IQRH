<?php



/**
 * This class defines the structure of the 'recibo_cabecera' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 11/11/18 04:58:30
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ReciboCabeceraTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ReciboCabeceraTableMap';

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
        $this->setName('recibo_cabecera');
        $this->setPhpName('ReciboCabecera');
        $this->setClassname('ReciboCabecera');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('PLANILLA', 'Planilla', 'VARCHAR', false, 100, null);
        $this->addColumn('INICIO', 'Inicio', 'VARCHAR', false, 15, null);
        $this->addColumn('FIN', 'Fin', 'VARCHAR', false, 15, null);
        $this->addColumn('PROYECTO', 'Proyecto', 'VARCHAR', false, 200, null);
        $this->addColumn('EMPRESA', 'Empresa', 'VARCHAR', false, 200, null);
        $this->addColumn('RAZON_SOCIAL', 'RazonSocial', 'VARCHAR', false, 200, null);
        $this->addColumn('DIRECCION', 'Direccion', 'VARCHAR', false, 300, null);
        $this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 10, null);
        $this->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 10, null);
        $this->addColumn('NOMBRE_COMERCIAL', 'NombreComercial', 'VARCHAR', false, 300, null);
        $this->addColumn('TEXTO', 'Texto', 'LONGVARCHAR', false, null, null);
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

} // ReciboCabeceraTableMap
