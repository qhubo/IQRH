<?php


/**
 * Base static class for performing query and update operations on the 'proyeccion_vacacion' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 08/09/19 22:15:16
 *
 * @package propel.generator.lib.model.om
 */
abstract class BaseProyeccionVacacionPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'proyeccion_vacacion';

    /** the related Propel class for this table */
    const OM_CLASS = 'ProyeccionVacacion';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ProyeccionVacacionTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 10;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 10;

    /** the column name for the ID field */
    const ID = 'proyeccion_vacacion.ID';

    /** the column name for the USUARIO field */
    const USUARIO = 'proyeccion_vacacion.USUARIO';

    /** the column name for the FECHA_INICIO field */
    const FECHA_INICIO = 'proyeccion_vacacion.FECHA_INICIO';

    /** the column name for the FECHA_FIN field */
    const FECHA_FIN = 'proyeccion_vacacion.FECHA_FIN';

    /** the column name for the PERIODO field */
    const PERIODO = 'proyeccion_vacacion.PERIODO';

    /** the column name for the DIA_VACACION field */
    const DIA_VACACION = 'proyeccion_vacacion.DIA_VACACION';

    /** the column name for the ESTATUS field */
    const ESTATUS = 'proyeccion_vacacion.ESTATUS';

    /** the column name for the USUARIO_CREO field */
    const USUARIO_CREO = 'proyeccion_vacacion.USUARIO_CREO';

    /** the column name for the FECHA_CREA field */
    const FECHA_CREA = 'proyeccion_vacacion.FECHA_CREA';

    /** the column name for the OBSERVACIONES field */
    const OBSERVACIONES = 'proyeccion_vacacion.OBSERVACIONES';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ProyeccionVacacion objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ProyeccionVacacion[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProyeccionVacacionPeer::$fieldNames[ProyeccionVacacionPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Usuario', 'FechaInicio', 'FechaFin', 'Periodo', 'DiaVacacion', 'Estatus', 'UsuarioCreo', 'FechaCrea', 'Observaciones', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'usuario', 'fechaInicio', 'fechaFin', 'periodo', 'diaVacacion', 'estatus', 'usuarioCreo', 'fechaCrea', 'observaciones', ),
        BasePeer::TYPE_COLNAME => array (ProyeccionVacacionPeer::ID, ProyeccionVacacionPeer::USUARIO, ProyeccionVacacionPeer::FECHA_INICIO, ProyeccionVacacionPeer::FECHA_FIN, ProyeccionVacacionPeer::PERIODO, ProyeccionVacacionPeer::DIA_VACACION, ProyeccionVacacionPeer::ESTATUS, ProyeccionVacacionPeer::USUARIO_CREO, ProyeccionVacacionPeer::FECHA_CREA, ProyeccionVacacionPeer::OBSERVACIONES, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'USUARIO', 'FECHA_INICIO', 'FECHA_FIN', 'PERIODO', 'DIA_VACACION', 'ESTATUS', 'USUARIO_CREO', 'FECHA_CREA', 'OBSERVACIONES', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'usuario', 'fecha_inicio', 'fecha_fin', 'periodo', 'dia_vacacion', 'estatus', 'usuario_creo', 'fecha_crea', 'observaciones', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProyeccionVacacionPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Usuario' => 1, 'FechaInicio' => 2, 'FechaFin' => 3, 'Periodo' => 4, 'DiaVacacion' => 5, 'Estatus' => 6, 'UsuarioCreo' => 7, 'FechaCrea' => 8, 'Observaciones' => 9, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'usuario' => 1, 'fechaInicio' => 2, 'fechaFin' => 3, 'periodo' => 4, 'diaVacacion' => 5, 'estatus' => 6, 'usuarioCreo' => 7, 'fechaCrea' => 8, 'observaciones' => 9, ),
        BasePeer::TYPE_COLNAME => array (ProyeccionVacacionPeer::ID => 0, ProyeccionVacacionPeer::USUARIO => 1, ProyeccionVacacionPeer::FECHA_INICIO => 2, ProyeccionVacacionPeer::FECHA_FIN => 3, ProyeccionVacacionPeer::PERIODO => 4, ProyeccionVacacionPeer::DIA_VACACION => 5, ProyeccionVacacionPeer::ESTATUS => 6, ProyeccionVacacionPeer::USUARIO_CREO => 7, ProyeccionVacacionPeer::FECHA_CREA => 8, ProyeccionVacacionPeer::OBSERVACIONES => 9, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'USUARIO' => 1, 'FECHA_INICIO' => 2, 'FECHA_FIN' => 3, 'PERIODO' => 4, 'DIA_VACACION' => 5, 'ESTATUS' => 6, 'USUARIO_CREO' => 7, 'FECHA_CREA' => 8, 'OBSERVACIONES' => 9, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'usuario' => 1, 'fecha_inicio' => 2, 'fecha_fin' => 3, 'periodo' => 4, 'dia_vacacion' => 5, 'estatus' => 6, 'usuario_creo' => 7, 'fecha_crea' => 8, 'observaciones' => 9, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $toNames = ProyeccionVacacionPeer::getFieldNames($toType);
        $key = isset(ProyeccionVacacionPeer::$fieldKeys[$fromType][$name]) ? ProyeccionVacacionPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProyeccionVacacionPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ProyeccionVacacionPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProyeccionVacacionPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ProyeccionVacacionPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProyeccionVacacionPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ProyeccionVacacionPeer::ID);
            $criteria->addSelectColumn(ProyeccionVacacionPeer::USUARIO);
            $criteria->addSelectColumn(ProyeccionVacacionPeer::FECHA_INICIO);
            $criteria->addSelectColumn(ProyeccionVacacionPeer::FECHA_FIN);
            $criteria->addSelectColumn(ProyeccionVacacionPeer::PERIODO);
            $criteria->addSelectColumn(ProyeccionVacacionPeer::DIA_VACACION);
            $criteria->addSelectColumn(ProyeccionVacacionPeer::ESTATUS);
            $criteria->addSelectColumn(ProyeccionVacacionPeer::USUARIO_CREO);
            $criteria->addSelectColumn(ProyeccionVacacionPeer::FECHA_CREA);
            $criteria->addSelectColumn(ProyeccionVacacionPeer::OBSERVACIONES);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.USUARIO');
            $criteria->addSelectColumn($alias . '.FECHA_INICIO');
            $criteria->addSelectColumn($alias . '.FECHA_FIN');
            $criteria->addSelectColumn($alias . '.PERIODO');
            $criteria->addSelectColumn($alias . '.DIA_VACACION');
            $criteria->addSelectColumn($alias . '.ESTATUS');
            $criteria->addSelectColumn($alias . '.USUARIO_CREO');
            $criteria->addSelectColumn($alias . '.FECHA_CREA');
            $criteria->addSelectColumn($alias . '.OBSERVACIONES');
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
        $criteria->setPrimaryTableName(ProyeccionVacacionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProyeccionVacacionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProyeccionVacacionPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProyeccionVacacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseProyeccionVacacionPeer', $criteria, $con);
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
     * @return                 ProyeccionVacacion
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProyeccionVacacionPeer::doSelect($critcopy, $con);
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
        return ProyeccionVacacionPeer::populateObjects(ProyeccionVacacionPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ProyeccionVacacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProyeccionVacacionPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProyeccionVacacionPeer::DATABASE_NAME);
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseProyeccionVacacionPeer', $criteria, $con);
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
     * @param      ProyeccionVacacion $obj A ProyeccionVacacion object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ProyeccionVacacionPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A ProyeccionVacacion object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ProyeccionVacacion) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ProyeccionVacacion object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProyeccionVacacionPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   ProyeccionVacacion Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProyeccionVacacionPeer::$instances[$key])) {
                return ProyeccionVacacionPeer::$instances[$key];
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
        ProyeccionVacacionPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to proyeccion_vacacion
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
        $cls = ProyeccionVacacionPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProyeccionVacacionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProyeccionVacacionPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProyeccionVacacionPeer::addInstanceToPool($obj, $key);
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
     * @return array (ProyeccionVacacion object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProyeccionVacacionPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProyeccionVacacionPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProyeccionVacacionPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProyeccionVacacionPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProyeccionVacacionPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(ProyeccionVacacionPeer::DATABASE_NAME)->getTable(ProyeccionVacacionPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseProyeccionVacacionPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseProyeccionVacacionPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ProyeccionVacacionTableMap());
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
        return ProyeccionVacacionPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a ProyeccionVacacion or Criteria object.
     *
     * @param      mixed $values Criteria or ProyeccionVacacion object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProyeccionVacacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ProyeccionVacacion object
        }

        if ($criteria->containsKey(ProyeccionVacacionPeer::ID) && $criteria->keyContainsValue(ProyeccionVacacionPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProyeccionVacacionPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProyeccionVacacionPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a ProyeccionVacacion or Criteria object.
     *
     * @param      mixed $values Criteria or ProyeccionVacacion object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProyeccionVacacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProyeccionVacacionPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProyeccionVacacionPeer::ID);
            $value = $criteria->remove(ProyeccionVacacionPeer::ID);
            if ($value) {
                $selectCriteria->add(ProyeccionVacacionPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProyeccionVacacionPeer::TABLE_NAME);
            }

        } else { // $values is ProyeccionVacacion object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProyeccionVacacionPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the proyeccion_vacacion table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProyeccionVacacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProyeccionVacacionPeer::TABLE_NAME, $con, ProyeccionVacacionPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProyeccionVacacionPeer::clearInstancePool();
            ProyeccionVacacionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ProyeccionVacacion or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ProyeccionVacacion object or primary key or array of primary keys
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
            $con = Propel::getConnection(ProyeccionVacacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProyeccionVacacionPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ProyeccionVacacion) { // it's a model object
            // invalidate the cache for this single object
            ProyeccionVacacionPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProyeccionVacacionPeer::DATABASE_NAME);
            $criteria->add(ProyeccionVacacionPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProyeccionVacacionPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProyeccionVacacionPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProyeccionVacacionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ProyeccionVacacion object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      ProyeccionVacacion $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProyeccionVacacionPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProyeccionVacacionPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ProyeccionVacacionPeer::DATABASE_NAME, ProyeccionVacacionPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ProyeccionVacacion
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProyeccionVacacionPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProyeccionVacacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProyeccionVacacionPeer::DATABASE_NAME);
        $criteria->add(ProyeccionVacacionPeer::ID, $pk);

        $v = ProyeccionVacacionPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ProyeccionVacacion[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProyeccionVacacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProyeccionVacacionPeer::DATABASE_NAME);
            $criteria->add(ProyeccionVacacionPeer::ID, $pks, Criteria::IN);
            $objs = ProyeccionVacacionPeer::doSelect($criteria, $con);
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
        return sprintf('BaseProyeccionVacacionPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
      }

      throw new LogicException(sprintf('Unrecognized function "%s"', $method));
    }

} // BaseProyeccionVacacionPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseProyeccionVacacionPeer::buildTableMap();

