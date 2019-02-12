<?php



/**
 * This class defines the structure of the 'catalogo_solicitud' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 02/07/19 19:40:47
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class CatalogoSolicitudTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.CatalogoSolicitudTableMap';

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
        $this->setName('catalogo_solicitud');
        $this->setPhpName('CatalogoSolicitud');
        $this->setClassname('CatalogoSolicitud');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 100, '');
        $this->getColumn('NOMBRE', false)->setPrimaryString(true);
        $this->addColumn('OBSERVACIONES', 'Observaciones', 'LONGVARCHAR', false, null, null);
        $this->addColumn('ACTIVO', 'Activo', 'BOOLEAN', false, 1, true);
        $this->addColumn('ARCHIVO_UNO', 'ArchivoUno', 'VARCHAR', false, 150, null);
        $this->addColumn('ARCHIVO_DOS', 'ArchivoDos', 'VARCHAR', false, 150, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SolicitudUsuario', 'SolicitudUsuario', RelationMap::ONE_TO_MANY, array('id' => 'catalogo_solicitud_id', ), null, null, 'SolicitudUsuarios');
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

} // CatalogoSolicitudTableMap
