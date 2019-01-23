<?php



/**
 * This class defines the structure of the 'ausencia_detalle' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 01/23/19 21:51:42
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class AusenciaDetalleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.AusenciaDetalleTableMap';

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
        $this->setName('ausencia_detalle');
        $this->setPhpName('AusenciaDetalle');
        $this->setClassname('AusenciaDetalle');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', false, null, null);
        $this->addForeignKey('SOLICITUD_AUSENCIA_ID', 'SolicitudAusenciaId', 'INTEGER', 'solicitud_ausencia', 'ID', false, null, null);
        $this->addColumn('DIA', 'Dia', 'DATE', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
        $this->addRelation('SolicitudAusencia', 'SolicitudAusencia', RelationMap::MANY_TO_ONE, array('solicitud_ausencia_id' => 'id', ), null, null);
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

} // AusenciaDetalleTableMap
