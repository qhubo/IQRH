<?php



/**
 * This class defines the structure of the 'solicitud_vacacion' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 11/16/18 21:48:55
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class SolicitudVacacionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.SolicitudVacacionTableMap';

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
        $this->setName('solicitud_vacacion');
        $this->setPhpName('SolicitudVacacion');
        $this->setClassname('SolicitudVacacion');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', false, null, null);
        $this->addColumn('FECHA_INICIO', 'FechaInicio', 'DATE', false, null, null);
        $this->addColumn('FECHA_FIN', 'FechaFin', 'DATE', false, null, null);
        $this->addColumn('DIA', 'Dia', 'INTEGER', false, null, null);
        $this->addColumn('MOTIVO', 'Motivo', 'VARCHAR', false, 250, null);
        $this->addColumn('OBSERVACIONES', 'Observaciones', 'LONGVARCHAR', false, null, null);
        $this->addColumn('USUARIO_MODERO', 'UsuarioModero', 'VARCHAR', false, 150, null);
        $this->addColumn('ESTADO', 'Estado', 'VARCHAR', false, 150, 'Pendiente');
        $this->addColumn('COMENTARIO_MODERO', 'ComentarioModero', 'LONGVARCHAR', false, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('JEFE', 'Jefe', 'INTEGER', false, null, null);
        $this->addColumn('ARCHIVO_UNO', 'ArchivoUno', 'VARCHAR', false, 150, null);
        $this->addColumn('ARCHIVO_DOS', 'ArchivoDos', 'VARCHAR', false, 150, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
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

} // SolicitudVacacionTableMap
