<?php



/**
 * This class defines the structure of the 'proyeccion_vacacion' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 08/09/19 22:15:16
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ProyeccionVacacionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ProyeccionVacacionTableMap';

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
        $this->setName('proyeccion_vacacion');
        $this->setPhpName('ProyeccionVacacion');
        $this->setClassname('ProyeccionVacacion');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('USUARIO', 'Usuario', 'VARCHAR', false, 50, null);
        $this->addColumn('FECHA_INICIO', 'FechaInicio', 'DATE', false, null, null);
        $this->addColumn('FECHA_FIN', 'FechaFin', 'DATE', false, null, null);
        $this->addColumn('PERIODO', 'Periodo', 'INTEGER', false, null, null);
        $this->addColumn('DIA_VACACION', 'DiaVacacion', 'DOUBLE', false, null, null);
        $this->addColumn('ESTATUS', 'Estatus', 'VARCHAR', false, 50, null);
        $this->addColumn('USUARIO_CREO', 'UsuarioCreo', 'VARCHAR', false, 50, null);
        $this->addColumn('FECHA_CREA', 'FechaCrea', 'DATE', false, null, null);
        $this->addColumn('OBSERVACIONES', 'Observaciones', 'LONGVARCHAR', false, null, null);
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

} // ProyeccionVacacionTableMap
