<?php



/**
 * This class defines the structure of the 'menu_seguridad' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 11/11/18 04:58:14
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class MenuSeguridadTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.MenuSeguridadTableMap';

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
        $this->setName('menu_seguridad');
        $this->setPhpName('MenuSeguridad');
        $this->setClassname('MenuSeguridad');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 100, '');
        $this->getColumn('DESCRIPCION', false)->setPrimaryString(true);
        $this->addColumn('CREDENCIAL', 'Credencial', 'VARCHAR', false, 100, null);
        $this->addColumn('MODULO', 'Modulo', 'VARCHAR', false, 100, null);
        $this->addColumn('ICONO', 'Icono', 'VARCHAR', false, 50, null);
        $this->addColumn('ACCION', 'Accion', 'VARCHAR', false, 100, null);
        $this->addColumn('SUPERIOR', 'Superior', 'INTEGER', false, null, null);
        $this->addColumn('ORDEN', 'Orden', 'INTEGER', false, null, null);
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

} // MenuSeguridadTableMap