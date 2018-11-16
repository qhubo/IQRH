<?php



/**
 * This class defines the structure of the 'bitacora_usuario' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 11/16/18 21:48:57
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class BitacoraUsuarioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.BitacoraUsuarioTableMap';

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
        $this->setName('bitacora_usuario');
        $this->setPhpName('BitacoraUsuario');
        $this->setClassname('BitacoraUsuario');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', false, null, null);
        $this->addColumn('USUARIO_JEFE', 'UsuarioJefe', 'INTEGER', false, null, null);
        $this->addColumn('MOTIVO', 'Motivo', 'LONGVARCHAR', false, null, null);
        $this->addColumn('LEIDO', 'Leido', 'BOOLEAN', false, 1, false);
        $this->addColumn('TIPO', 'Tipo', 'VARCHAR', false, 50, null);
        $this->addColumn('IDENTIFICADOR', 'Identificador', 'VARCHAR', false, 250, null);
        $this->addColumn('FECHA', 'Fecha', 'TIMESTAMP', false, null, null);
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

} // BitacoraUsuarioTableMap
