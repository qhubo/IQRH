<?php



/**
 * This class defines the structure of the 'usuario' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 11/07/18 19:52:18
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class UsuarioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.UsuarioTableMap';

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
        $this->setName('usuario');
        $this->setPhpName('Usuario');
        $this->setClassname('Usuario');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('CODIGO', 'Codigo', 'VARCHAR', false, 50, null);
        $this->addColumn('USUARIO', 'Usuario', 'VARCHAR', true, 32, null);
        $this->getColumn('USUARIO', false)->setPrimaryString(true);
        $this->addColumn('CLAVE', 'Clave', 'VARCHAR', false, 60, null);
        $this->addColumn('CORREO', 'Correo', 'VARCHAR', false, 255, null);
        $this->addColumn('ESTADO', 'Estado', 'VARCHAR', false, 32, null);
        $this->addColumn('IMAGEN', 'Imagen', 'VARCHAR', false, 255, null);
        $this->addColumn('ADMINISTRADOR', 'Administrador', 'BOOLEAN', false, 1, false);
        $this->addColumn('VALIDADO', 'Validado', 'BOOLEAN', false, 1, true);
        $this->addColumn('ULTIMO_INGRESO', 'UltimoIngreso', 'DATE', false, null, null);
        $this->addColumn('TEMA', 'Tema', 'VARCHAR', false, 255, null);
        $this->addColumn('FRASE', 'Frase', 'VARCHAR', false, 255, null);
        $this->addColumn('GENERO', 'Genero', 'VARCHAR', false, 30, null);
        $this->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'DATE', false, null, null);
        $this->addColumn('NOMBRE_COMPLETO', 'NombreCompleto', 'VARCHAR', false, 320, null);
        $this->addColumn('EMPRESA', 'Empresa', 'VARCHAR', false, 320, null);
        $this->addColumn('LOGO', 'Logo', 'VARCHAR', false, 200, null);
        $this->addColumn('ACTIVO', 'Activo', 'BOOLEAN', false, 1, true);
        $this->addColumn('TIPO_USUARIO', 'TipoUsuario', 'VARCHAR', false, 320, null);
        $this->addColumn('OBSERVACIONES', 'Observaciones', 'LONGVARCHAR', false, null, null);
        $this->addColumn('PRIMER_NOMBRE', 'PrimerNombre', 'VARCHAR', false, 200, null);
        $this->addColumn('SEGUNDO_NOMBRE', 'SegundoNombre', 'VARCHAR', false, 200, null);
        $this->addColumn('PRIMER_APELLIDO', 'PrimerApellido', 'VARCHAR', false, 200, null);
        $this->addColumn('SEGUNDO_APELLIDO', 'SegundoApellido', 'VARCHAR', false, 200, null);
        $this->addColumn('PUESTO', 'Puesto', 'VARCHAR', false, 200, null);
        $this->addColumn('DEPARTAMENTO', 'Departamento', 'VARCHAR', false, 300, null);
        $this->addColumn('JEFE', 'Jefe', 'VARCHAR', false, 300, null);
        $this->addColumn('FECHA_ALTA', 'FechaAlta', 'DATE', false, null, null);
        $this->addColumn('SUELDO', 'Sueldo', 'DOUBLE', false, null, null);
        $this->addColumn('USUARIO_JEFE', 'UsuarioJefe', 'INTEGER', false, null, null);
        $this->addColumn('ASISTENCIA', 'Asistencia', 'DOUBLE', false, null, null);
        $this->addColumn('PUNTUALIDA', 'Puntualida', 'DOUBLE', false, null, null);
        $this->addColumn('TOKEN', 'Token', 'VARCHAR', false, 150, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('UsuarioPerfil', 'UsuarioPerfil', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'UsuarioPerfils');
        $this->addRelation('AlertaAusencia', 'AlertaAusencia', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'AlertaAusencias');
        $this->addRelation('SolicitudAusencia', 'SolicitudAusencia', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'SolicitudAusencias');
        $this->addRelation('AusenciaDetalle', 'AusenciaDetalle', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'AusenciaDetalles');
        $this->addRelation('SolicitudVacacion', 'SolicitudVacacion', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'SolicitudVacacions');
        $this->addRelation('SolicitudFinquitoRelatedByUsuarioGraba', 'SolicitudFinquito', RelationMap::ONE_TO_MANY, array('id' => 'usuario_graba', ), null, null, 'SolicitudFinquitosRelatedByUsuarioGraba');
        $this->addRelation('SolicitudFinquitoRelatedByUsuarioRetiro', 'SolicitudFinquito', RelationMap::ONE_TO_MANY, array('id' => 'usuario_retiro', ), null, null, 'SolicitudFinquitosRelatedByUsuarioRetiro');
        $this->addRelation('VacacionUsuario', 'VacacionUsuario', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'VacacionUsuarios');
        $this->addRelation('AumentoUsuario', 'AumentoUsuario', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'AumentoUsuarios');
        $this->addRelation('CapacitacionUsuario', 'CapacitacionUsuario', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'CapacitacionUsuarios');
        $this->addRelation('BitacoraUsuario', 'BitacoraUsuario', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'BitacoraUsuarios');
        $this->addRelation('SolicitudUsuario', 'SolicitudUsuario', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'SolicitudUsuarios');
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

} // UsuarioTableMap
