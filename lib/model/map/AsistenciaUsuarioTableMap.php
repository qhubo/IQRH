<?php



/**
 * This class defines the structure of the 'asistencia_usuario' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 01/23/19 21:51:43
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class AsistenciaUsuarioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.AsistenciaUsuarioTableMap';

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
        $this->setName('asistencia_usuario');
        $this->setPhpName('AsistenciaUsuario');
        $this->setClassname('AsistenciaUsuario');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('EMPRESA', 'Empresa', 'VARCHAR', false, 300, null);
        $this->addColumn('USUARIO', 'Usuario', 'VARCHAR', false, 300, null);
        $this->addColumn('DIA', 'Dia', 'DATE', false, null, null);
        $this->addColumn('HORA', 'Hora', 'VARCHAR', false, 30, null);
        $this->addColumn('FECHA_HORA', 'FechaHora', 'TIMESTAMP', false, null, null);
        $this->addColumn('TARDE', 'Tarde', 'BOOLEAN', false, 1, true);
        $this->addColumn('HORA_TARDE', 'HoraTarde', 'DOUBLE', false, null, null);
        $this->addColumn('MINUTO_TARDE', 'MinutoTarde', 'DOUBLE', false, null, null);
        $this->addColumn('HORA_DIARIA', 'HoraDiaria', 'DOUBLE', false, null, null);
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

} // AsistenciaUsuarioTableMap
