<?php



/**
 * This class defines the structure of the 'solicitud_finquito' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 06/17/18 04:37:04
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class SolicitudFinquitoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.SolicitudFinquitoTableMap';

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
        $this->setName('solicitud_finquito');
        $this->setPhpName('SolicitudFinquito');
        $this->setClassname('SolicitudFinquito');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('USUARIO_GRABA', 'UsuarioGraba', 'INTEGER', 'usuario', 'ID', false, null, null);
        $this->addForeignKey('USUARIO_RETIRO', 'UsuarioRetiro', 'INTEGER', 'usuario', 'ID', false, null, null);
        $this->addColumn('FECHA_RETIRO', 'FechaRetiro', 'DATE', false, null, null);
        $this->addColumn('MOTIVO', 'Motivo', 'VARCHAR', false, 250, null);
        $this->addColumn('OBSERVACIONES', 'Observaciones', 'LONGVARCHAR', false, null, null);
        $this->addColumn('ESTADO', 'Estado', 'VARCHAR', false, 150, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('UsuarioRelatedByUsuarioGraba', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_graba' => 'id', ), null, null);
        $this->addRelation('UsuarioRelatedByUsuarioRetiro', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_retiro' => 'id', ), null, null);
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
            'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

} // SolicitudFinquitoTableMap
