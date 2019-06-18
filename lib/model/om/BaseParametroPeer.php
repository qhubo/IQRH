<?php


/**
 * Base static class for performing query and update operations on the 'parametro' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 06/18/19 05:13:08
 *
 * @package propel.generator.lib.model.om
 */
abstract class BaseParametroPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'parametro';

    /** the related Propel class for this table */
    const OM_CLASS = 'Parametro';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ParametroTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the ID field */
    const ID = 'parametro.ID';

    /** the column name for the CODIGO field */
    const CODIGO = 'parametro.CODIGO';

    /** the column name for the SLOGAN field */
    const SLOGAN = 'parametro.SLOGAN';

    /** the column name for the LOGO field */
    const LOGO = 'parametro.LOGO';

    /** the column name for the PUERTO_CORREO field */
    const PUERTO_CORREO = 'parametro.PUERTO_CORREO';

    /** the column name for the SMTP_CORREO field */
    const SMTP_CORREO = 'parametro.SMTP_CORREO';

    /** the column name for the USUARIO_CORREO field */
    const USUARIO_CORREO = 'parametro.USUARIO_CORREO';

    /** the column name for the CLAVE_CORREO field */
    const CLAVE_CORREO = 'parametro.CLAVE_CORREO';

    /** the column name for the BANNER_REPORTE field */
    const BANNER_REPORTE = 'parametro.BANNER_REPORTE';

    /** the column name for the CORREO_NOTIFICA field */
    const CORREO_NOTIFICA = 'parametro.CORREO_NOTIFICA';

    /** the column name for the NOTIFICA_MARCA field */
    const NOTIFICA_MARCA = 'parametro.NOTIFICA_MARCA';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Parametro objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Parametro[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ParametroPeer::$fieldNames[ParametroPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Codigo', 'Slogan', 'Logo', 'PuertoCorreo', 'SmtpCorreo', 'UsuarioCorreo', 'ClaveCorreo', 'BannerReporte', 'CorreoNotifica', 'NotificaMarca', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'codigo', 'slogan', 'logo', 'puertoCorreo', 'smtpCorreo', 'usuarioCorreo', 'claveCorreo', 'bannerReporte', 'correoNotifica', 'notificaMarca', ),
        BasePeer::TYPE_COLNAME => array (ParametroPeer::ID, ParametroPeer::CODIGO, ParametroPeer::SLOGAN, ParametroPeer::LOGO, ParametroPeer::PUERTO_CORREO, ParametroPeer::SMTP_CORREO, ParametroPeer::USUARIO_CORREO, ParametroPeer::CLAVE_CORREO, ParametroPeer::BANNER_REPORTE, ParametroPeer::CORREO_NOTIFICA, ParametroPeer::NOTIFICA_MARCA, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CODIGO', 'SLOGAN', 'LOGO', 'PUERTO_CORREO', 'SMTP_CORREO', 'USUARIO_CORREO', 'CLAVE_CORREO', 'BANNER_REPORTE', 'CORREO_NOTIFICA', 'NOTIFICA_MARCA', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'codigo', 'slogan', 'logo', 'puerto_correo', 'smtp_correo', 'usuario_correo', 'clave_correo', 'banner_reporte', 'correo_notifica', 'notifica_marca', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ParametroPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Codigo' => 1, 'Slogan' => 2, 'Logo' => 3, 'PuertoCorreo' => 4, 'SmtpCorreo' => 5, 'UsuarioCorreo' => 6, 'ClaveCorreo' => 7, 'BannerReporte' => 8, 'CorreoNotifica' => 9, 'NotificaMarca' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'codigo' => 1, 'slogan' => 2, 'logo' => 3, 'puertoCorreo' => 4, 'smtpCorreo' => 5, 'usuarioCorreo' => 6, 'claveCorreo' => 7, 'bannerReporte' => 8, 'correoNotifica' => 9, 'notificaMarca' => 10, ),
        BasePeer::TYPE_COLNAME => array (ParametroPeer::ID => 0, ParametroPeer::CODIGO => 1, ParametroPeer::SLOGAN => 2, ParametroPeer::LOGO => 3, ParametroPeer::PUERTO_CORREO => 4, ParametroPeer::SMTP_CORREO => 5, ParametroPeer::USUARIO_CORREO => 6, ParametroPeer::CLAVE_CORREO => 7, ParametroPeer::BANNER_REPORTE => 8, ParametroPeer::CORREO_NOTIFICA => 9, ParametroPeer::NOTIFICA_MARCA => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CODIGO' => 1, 'SLOGAN' => 2, 'LOGO' => 3, 'PUERTO_CORREO' => 4, 'SMTP_CORREO' => 5, 'USUARIO_CORREO' => 6, 'CLAVE_CORREO' => 7, 'BANNER_REPORTE' => 8, 'CORREO_NOTIFICA' => 9, 'NOTIFICA_MARCA' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'codigo' => 1, 'slogan' => 2, 'logo' => 3, 'puerto_correo' => 4, 'smtp_correo' => 5, 'usuario_correo' => 6, 'clave_correo' => 7, 'banner_reporte' => 8, 'correo_notifica' => 9, 'notifica_marca' => 10, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $toNames = ParametroPeer::getFieldNames($toType);
        $key = isset(ParametroPeer::$fieldKeys[$fromType][$name]) ? ParametroPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ParametroPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ParametroPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ParametroPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ParametroPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ParametroPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ParametroPeer::ID);
            $criteria->addSelectColumn(ParametroPeer::CODIGO);
            $criteria->addSelectColumn(ParametroPeer::SLOGAN);
            $criteria->addSelectColumn(ParametroPeer::LOGO);
            $criteria->addSelectColumn(ParametroPeer::PUERTO_CORREO);
            $criteria->addSelectColumn(ParametroPeer::SMTP_CORREO);
            $criteria->addSelectColumn(ParametroPeer::USUARIO_CORREO);
            $criteria->addSelectColumn(ParametroPeer::CLAVE_CORREO);
            $criteria->addSelectColumn(ParametroPeer::BANNER_REPORTE);
            $criteria->addSelectColumn(ParametroPeer::CORREO_NOTIFICA);
            $criteria->addSelectColumn(ParametroPeer::NOTIFICA_MARCA);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.CODIGO');
            $criteria->addSelectColumn($alias . '.SLOGAN');
            $criteria->addSelectColumn($alias . '.LOGO');
            $criteria->addSelectColumn($alias . '.PUERTO_CORREO');
            $criteria->addSelectColumn($alias . '.SMTP_CORREO');
            $criteria->addSelectColumn($alias . '.USUARIO_CORREO');
            $criteria->addSelectColumn($alias . '.CLAVE_CORREO');
            $criteria->addSelectColumn($alias . '.BANNER_REPORTE');
            $criteria->addSelectColumn($alias . '.CORREO_NOTIFICA');
            $criteria->addSelectColumn($alias . '.NOTIFICA_MARCA');
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
        $criteria->setPrimaryTableName(ParametroPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ParametroPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ParametroPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ParametroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseParametroPeer', $criteria, $con);
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
     * @return                 Parametro
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ParametroPeer::doSelect($critcopy, $con);
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
        return ParametroPeer::populateObjects(ParametroPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ParametroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ParametroPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ParametroPeer::DATABASE_NAME);
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseParametroPeer', $criteria, $con);
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
     * @param      Parametro $obj A Parametro object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            ParametroPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Parametro object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Parametro) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Parametro object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ParametroPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Parametro Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ParametroPeer::$instances[$key])) {
                return ParametroPeer::$instances[$key];
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
        ParametroPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to parametro
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
        $cls = ParametroPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ParametroPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ParametroPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ParametroPeer::addInstanceToPool($obj, $key);
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
     * @return array (Parametro object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ParametroPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ParametroPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ParametroPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ParametroPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ParametroPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(ParametroPeer::DATABASE_NAME)->getTable(ParametroPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseParametroPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseParametroPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ParametroTableMap());
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
        return ParametroPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Parametro or Criteria object.
     *
     * @param      mixed $values Criteria or Parametro object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ParametroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Parametro object
        }

        if ($criteria->containsKey(ParametroPeer::ID) && $criteria->keyContainsValue(ParametroPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ParametroPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ParametroPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Parametro or Criteria object.
     *
     * @param      mixed $values Criteria or Parametro object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ParametroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ParametroPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ParametroPeer::ID);
            $value = $criteria->remove(ParametroPeer::ID);
            if ($value) {
                $selectCriteria->add(ParametroPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ParametroPeer::TABLE_NAME);
            }

        } else { // $values is Parametro object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ParametroPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the parametro table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ParametroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ParametroPeer::TABLE_NAME, $con, ParametroPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ParametroPeer::clearInstancePool();
            ParametroPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Parametro or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Parametro object or primary key or array of primary keys
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
            $con = Propel::getConnection(ParametroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ParametroPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Parametro) { // it's a model object
            // invalidate the cache for this single object
            ParametroPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ParametroPeer::DATABASE_NAME);
            $criteria->add(ParametroPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ParametroPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ParametroPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ParametroPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Parametro object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Parametro $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ParametroPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ParametroPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ParametroPeer::DATABASE_NAME, ParametroPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Parametro
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ParametroPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ParametroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ParametroPeer::DATABASE_NAME);
        $criteria->add(ParametroPeer::ID, $pk);

        $v = ParametroPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Parametro[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ParametroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ParametroPeer::DATABASE_NAME);
            $criteria->add(ParametroPeer::ID, $pks, Criteria::IN);
            $objs = ParametroPeer::doSelect($criteria, $con);
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
        return sprintf('BaseParametroPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
      }

      throw new LogicException(sprintf('Unrecognized function "%s"', $method));
    }

} // BaseParametroPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseParametroPeer::buildTableMap();

