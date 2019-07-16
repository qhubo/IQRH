<?php


/**
 * Base static class for performing query and update operations on the 'proyecto' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 06/20/19 17:40:57
 *
 * @package propel.generator.lib.model.om
 */
abstract class BaseProyectoPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'proyecto';

    /** the related Propel class for this table */
    const OM_CLASS = 'Proyecto';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ProyectoTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 20;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 20;

    /** the column name for the ID field */
    const ID = 'proyecto.ID';

    /** the column name for the CODIGO field */
    const CODIGO = 'proyecto.CODIGO';

    /** the column name for the NOMBRE field */
    const NOMBRE = 'proyecto.NOMBRE';

    /** the column name for the TELEFONO field */
    const TELEFONO = 'proyecto.TELEFONO';

    /** the column name for the CONTACTO field */
    const CONTACTO = 'proyecto.CONTACTO';

    /** the column name for the CREATED_BY field */
    const CREATED_BY = 'proyecto.CREATED_BY';

    /** the column name for the CREATED_AT field */
    const CREATED_AT = 'proyecto.CREATED_AT';

    /** the column name for the UPDATED_BY field */
    const UPDATED_BY = 'proyecto.UPDATED_BY';

    /** the column name for the UPDATED_AT field */
    const UPDATED_AT = 'proyecto.UPDATED_AT';

    /** the column name for the NIT_PROYECTO field */
    const NIT_PROYECTO = 'proyecto.NIT_PROYECTO';

    /** the column name for the RAZON_SOCIAL field */
    const RAZON_SOCIAL = 'proyecto.RAZON_SOCIAL';

    /** the column name for the NOMENCLATURA field */
    const NOMENCLATURA = 'proyecto.NOMENCLATURA';

    /** the column name for the UBICACION_GEOGRAFICA field */
    const UBICACION_GEOGRAFICA = 'proyecto.UBICACION_GEOGRAFICA';

    /** the column name for the DOCUMENTO_REPRESENTANTE field */
    const DOCUMENTO_REPRESENTANTE = 'proyecto.DOCUMENTO_REPRESENTANTE';

    /** the column name for the REPRESENTANTE_LEGAL field */
    const REPRESENTANTE_LEGAL = 'proyecto.REPRESENTANTE_LEGAL';

    /** the column name for the GERENTE field */
    const GERENTE = 'proyecto.GERENTE';

    /** the column name for the RESIDENTE field */
    const RESIDENTE = 'proyecto.RESIDENTE';

    /** the column name for the DEPARTAMENTO field */
    const DEPARTAMENTO = 'proyecto.DEPARTAMENTO';

    /** the column name for the MUNICIPIO field */
    const MUNICIPIO = 'proyecto.MUNICIPIO';

    /** the column name for the INTERNO field */
    const INTERNO = 'proyecto.INTERNO';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Proyecto objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Proyecto[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProyectoPeer::$fieldNames[ProyectoPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Codigo', 'Nombre', 'Telefono', 'Contacto', 'CreatedBy', 'CreatedAt', 'UpdatedBy', 'UpdatedAt', 'NitProyecto', 'RazonSocial', 'Nomenclatura', 'UbicacionGeografica', 'DocumentoRepresentante', 'RepresentanteLegal', 'Gerente', 'Residente', 'Departamento', 'Municipio', 'Interno', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'codigo', 'nombre', 'telefono', 'contacto', 'createdBy', 'createdAt', 'updatedBy', 'updatedAt', 'nitProyecto', 'razonSocial', 'nomenclatura', 'ubicacionGeografica', 'documentoRepresentante', 'representanteLegal', 'gerente', 'residente', 'departamento', 'municipio', 'interno', ),
        BasePeer::TYPE_COLNAME => array (ProyectoPeer::ID, ProyectoPeer::CODIGO, ProyectoPeer::NOMBRE, ProyectoPeer::TELEFONO, ProyectoPeer::CONTACTO, ProyectoPeer::CREATED_BY, ProyectoPeer::CREATED_AT, ProyectoPeer::UPDATED_BY, ProyectoPeer::UPDATED_AT, ProyectoPeer::NIT_PROYECTO, ProyectoPeer::RAZON_SOCIAL, ProyectoPeer::NOMENCLATURA, ProyectoPeer::UBICACION_GEOGRAFICA, ProyectoPeer::DOCUMENTO_REPRESENTANTE, ProyectoPeer::REPRESENTANTE_LEGAL, ProyectoPeer::GERENTE, ProyectoPeer::RESIDENTE, ProyectoPeer::DEPARTAMENTO, ProyectoPeer::MUNICIPIO, ProyectoPeer::INTERNO, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CODIGO', 'NOMBRE', 'TELEFONO', 'CONTACTO', 'CREATED_BY', 'CREATED_AT', 'UPDATED_BY', 'UPDATED_AT', 'NIT_PROYECTO', 'RAZON_SOCIAL', 'NOMENCLATURA', 'UBICACION_GEOGRAFICA', 'DOCUMENTO_REPRESENTANTE', 'REPRESENTANTE_LEGAL', 'GERENTE', 'RESIDENTE', 'DEPARTAMENTO', 'MUNICIPIO', 'INTERNO', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'codigo', 'nombre', 'telefono', 'contacto', 'created_by', 'created_at', 'updated_by', 'updated_at', 'nit_proyecto', 'razon_social', 'nomenclatura', 'ubicacion_geografica', 'documento_representante', 'representante_legal', 'gerente', 'residente', 'departamento', 'municipio', 'interno', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProyectoPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Codigo' => 1, 'Nombre' => 2, 'Telefono' => 3, 'Contacto' => 4, 'CreatedBy' => 5, 'CreatedAt' => 6, 'UpdatedBy' => 7, 'UpdatedAt' => 8, 'NitProyecto' => 9, 'RazonSocial' => 10, 'Nomenclatura' => 11, 'UbicacionGeografica' => 12, 'DocumentoRepresentante' => 13, 'RepresentanteLegal' => 14, 'Gerente' => 15, 'Residente' => 16, 'Departamento' => 17, 'Municipio' => 18, 'Interno' => 19, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'codigo' => 1, 'nombre' => 2, 'telefono' => 3, 'contacto' => 4, 'createdBy' => 5, 'createdAt' => 6, 'updatedBy' => 7, 'updatedAt' => 8, 'nitProyecto' => 9, 'razonSocial' => 10, 'nomenclatura' => 11, 'ubicacionGeografica' => 12, 'documentoRepresentante' => 13, 'representanteLegal' => 14, 'gerente' => 15, 'residente' => 16, 'departamento' => 17, 'municipio' => 18, 'interno' => 19, ),
        BasePeer::TYPE_COLNAME => array (ProyectoPeer::ID => 0, ProyectoPeer::CODIGO => 1, ProyectoPeer::NOMBRE => 2, ProyectoPeer::TELEFONO => 3, ProyectoPeer::CONTACTO => 4, ProyectoPeer::CREATED_BY => 5, ProyectoPeer::CREATED_AT => 6, ProyectoPeer::UPDATED_BY => 7, ProyectoPeer::UPDATED_AT => 8, ProyectoPeer::NIT_PROYECTO => 9, ProyectoPeer::RAZON_SOCIAL => 10, ProyectoPeer::NOMENCLATURA => 11, ProyectoPeer::UBICACION_GEOGRAFICA => 12, ProyectoPeer::DOCUMENTO_REPRESENTANTE => 13, ProyectoPeer::REPRESENTANTE_LEGAL => 14, ProyectoPeer::GERENTE => 15, ProyectoPeer::RESIDENTE => 16, ProyectoPeer::DEPARTAMENTO => 17, ProyectoPeer::MUNICIPIO => 18, ProyectoPeer::INTERNO => 19, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CODIGO' => 1, 'NOMBRE' => 2, 'TELEFONO' => 3, 'CONTACTO' => 4, 'CREATED_BY' => 5, 'CREATED_AT' => 6, 'UPDATED_BY' => 7, 'UPDATED_AT' => 8, 'NIT_PROYECTO' => 9, 'RAZON_SOCIAL' => 10, 'NOMENCLATURA' => 11, 'UBICACION_GEOGRAFICA' => 12, 'DOCUMENTO_REPRESENTANTE' => 13, 'REPRESENTANTE_LEGAL' => 14, 'GERENTE' => 15, 'RESIDENTE' => 16, 'DEPARTAMENTO' => 17, 'MUNICIPIO' => 18, 'INTERNO' => 19, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'codigo' => 1, 'nombre' => 2, 'telefono' => 3, 'contacto' => 4, 'created_by' => 5, 'created_at' => 6, 'updated_by' => 7, 'updated_at' => 8, 'nit_proyecto' => 9, 'razon_social' => 10, 'nomenclatura' => 11, 'ubicacion_geografica' => 12, 'documento_representante' => 13, 'representante_legal' => 14, 'gerente' => 15, 'residente' => 16, 'departamento' => 17, 'municipio' => 18, 'interno' => 19, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = ProyectoPeer::getFieldNames($toType);
        $key = isset(ProyectoPeer::$fieldKeys[$fromType][$name]) ? ProyectoPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProyectoPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, ProyectoPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProyectoPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. ProyectoPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProyectoPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ProyectoPeer::ID);
            $criteria->addSelectColumn(ProyectoPeer::CODIGO);
            $criteria->addSelectColumn(ProyectoPeer::NOMBRE);
            $criteria->addSelectColumn(ProyectoPeer::TELEFONO);
            $criteria->addSelectColumn(ProyectoPeer::CONTACTO);
            $criteria->addSelectColumn(ProyectoPeer::CREATED_BY);
            $criteria->addSelectColumn(ProyectoPeer::CREATED_AT);
            $criteria->addSelectColumn(ProyectoPeer::UPDATED_BY);
            $criteria->addSelectColumn(ProyectoPeer::UPDATED_AT);
            $criteria->addSelectColumn(ProyectoPeer::NIT_PROYECTO);
            $criteria->addSelectColumn(ProyectoPeer::RAZON_SOCIAL);
            $criteria->addSelectColumn(ProyectoPeer::NOMENCLATURA);
            $criteria->addSelectColumn(ProyectoPeer::UBICACION_GEOGRAFICA);
            $criteria->addSelectColumn(ProyectoPeer::DOCUMENTO_REPRESENTANTE);
            $criteria->addSelectColumn(ProyectoPeer::REPRESENTANTE_LEGAL);
            $criteria->addSelectColumn(ProyectoPeer::GERENTE);
            $criteria->addSelectColumn(ProyectoPeer::RESIDENTE);
            $criteria->addSelectColumn(ProyectoPeer::DEPARTAMENTO);
            $criteria->addSelectColumn(ProyectoPeer::MUNICIPIO);
            $criteria->addSelectColumn(ProyectoPeer::INTERNO);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.CODIGO');
            $criteria->addSelectColumn($alias . '.NOMBRE');
            $criteria->addSelectColumn($alias . '.TELEFONO');
            $criteria->addSelectColumn($alias . '.CONTACTO');
            $criteria->addSelectColumn($alias . '.CREATED_BY');
            $criteria->addSelectColumn($alias . '.CREATED_AT');
            $criteria->addSelectColumn($alias . '.UPDATED_BY');
            $criteria->addSelectColumn($alias . '.UPDATED_AT');
            $criteria->addSelectColumn($alias . '.NIT_PROYECTO');
            $criteria->addSelectColumn($alias . '.RAZON_SOCIAL');
            $criteria->addSelectColumn($alias . '.NOMENCLATURA');
            $criteria->addSelectColumn($alias . '.UBICACION_GEOGRAFICA');
            $criteria->addSelectColumn($alias . '.DOCUMENTO_REPRESENTANTE');
            $criteria->addSelectColumn($alias . '.REPRESENTANTE_LEGAL');
            $criteria->addSelectColumn($alias . '.GERENTE');
            $criteria->addSelectColumn($alias . '.RESIDENTE');
            $criteria->addSelectColumn($alias . '.DEPARTAMENTO');
            $criteria->addSelectColumn($alias . '.MUNICIPIO');
            $criteria->addSelectColumn($alias . '.INTERNO');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProyectoPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProyectoPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProyectoPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProyectoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseProyectoPeer', $criteria, $con);
        }

        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 Proyecto
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProyectoPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return ProyectoPeer::populateObjects(ProyectoPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement durirectly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProyectoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProyectoPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProyectoPeer::DATABASE_NAME);
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseProyectoPeer', $criteria, $con);
        }


        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      Proyecto $obj A Proyecto object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ProyectoPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Proyecto object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Proyecto) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Proyecto object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProyectoPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Proyecto Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProyectoPeer::$instances[$key])) {
                return ProyectoPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool()
    {
        ProyectoPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to proyecto
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = ProyectoPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProyectoPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProyectoPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProyectoPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Proyecto object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProyectoPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProyectoPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProyectoPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProyectoPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProyectoPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(ProyectoPeer::DATABASE_NAME)->getTable(ProyectoPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseProyectoPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseProyectoPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ProyectoTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return ProyectoPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Proyecto or Criteria object.
     *
     * @param      mixed $values Criteria or Proyecto object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProyectoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Proyecto object
        }

        if ($criteria->containsKey(ProyectoPeer::ID) && $criteria->keyContainsValue(ProyectoPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProyectoPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProyectoPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Proyecto or Criteria object.
     *
     * @param      mixed $values Criteria or Proyecto object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProyectoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProyectoPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProyectoPeer::ID);
            $value = $criteria->remove(ProyectoPeer::ID);
            if ($value) {
                $selectCriteria->add(ProyectoPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProyectoPeer::TABLE_NAME);
            }

        } else { // $values is Proyecto object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProyectoPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the proyecto table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProyectoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProyectoPeer::TABLE_NAME, $con, ProyectoPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProyectoPeer::clearInstancePool();
            ProyectoPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Proyecto or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Proyecto object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(ProyectoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProyectoPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Proyecto) { // it's a model object
            // invalidate the cache for this single object
            ProyectoPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProyectoPeer::DATABASE_NAME);
            $criteria->add(ProyectoPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProyectoPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProyectoPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProyectoPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Proyecto object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Proyecto $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProyectoPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProyectoPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(ProyectoPeer::DATABASE_NAME, ProyectoPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Proyecto
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProyectoPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProyectoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProyectoPeer::DATABASE_NAME);
        $criteria->add(ProyectoPeer::ID, $pk);

        $v = ProyectoPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Proyecto[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProyectoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProyectoPeer::DATABASE_NAME);
            $criteria->add(ProyectoPeer::ID, $pks, Criteria::IN);
            $objs = ProyectoPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

    // symfony behavior

    /**
     * Returns an array of arrays that contain columns in each unique index.
     *
     * @return array
     */
    static public function getUniqueColumnNames()
    {
      return array();
    }

    // symfony_behaviors behavior

    /**
     * Returns the name of the hook to call from inside the supplied method.
     *
     * @param string $method The calling method
     *
     * @return string A hook name for {@link sfMixer}
     *
     * @throws LogicException If the method name is not recognized
     */
    static private function getMixerPreSelectHook($method)
    {
      if (preg_match('/^do(Select|Count)(Join(All(Except)?)?|Stmt)?/', $method, $match))
      {
        return sprintf('BaseProyectoPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
      }

      throw new LogicException(sprintf('Unrecognized function "%s"', $method));
    }

} // BaseProyectoPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseProyectoPeer::buildTableMap();
