<?php



/**
 * This class defines the structure of the 'aumento_usuario' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 11/07/18 19:52:23
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class AumentoUsuarioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.AumentoUsuarioTableMap';

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
        $this->setName('aumento_usuario');
        $this->setPhpName('AumentoUsuario');
        $this->setClassname('AumentoUsuario');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', false, null, null);
        $this->addColumn('FECHA_AUMENTO', 'FechaAumento', 'DATE', false, null, null);
        $this->addColumn('SUELDO_ANTERIOR', 'SueldoAnterior', 'DOUBLE', false, null, null);
        $this->addColumn('PUESTO_ANTERIOR', 'PuestoAnterior', 'VARCHAR', false, 250, null);
        $this->addColumn('SUELDO', 'Sueldo', 'DOUBLE', false, null, null);
        $this->addColumn('NUEVO_PUESTO', 'NuevoPuesto', 'VARCHAR', false, 250, null);
        $this->addColumn('OBSERVACIONES', 'Observaciones', 'LONGVARCHAR', false, null, null);
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
        );
    } // getBehaviors()

} // AumentoUsuarioTableMap
