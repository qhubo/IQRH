<?php



/**
 * This class defines the structure of the 'usuario_horario' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 11/28/18 19:31:09
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class UsuarioHorarioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.UsuarioHorarioTableMap';

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
        $this->setName('usuario_horario');
        $this->setPhpName('UsuarioHorario');
        $this->setClassname('UsuarioHorario');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('USUARIO', 'Usuario', 'VARCHAR', false, 300, null);
        $this->addColumn('HORA', 'Hora', 'VARCHAR', false, 10, null);
        $this->addColumn('HORA_FIN', 'HoraFin', 'VARCHAR', false, 10, null);
        $this->addColumn('HORA24', 'Hora24', 'VARCHAR', false, 10, null);
        $this->addColumn('HORA_FIN24', 'HoraFin24', 'VARCHAR', false, 10, null);
        $this->addColumn('ESTRICTO', 'Estricto', 'BOOLEAN', false, 1, true);
        $this->addColumn('MINUTO_PRORROGA', 'MinutoProrroga', 'INTEGER', false, null, 0);
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

} // UsuarioHorarioTableMap
