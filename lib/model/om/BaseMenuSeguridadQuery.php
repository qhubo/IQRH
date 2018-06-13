<?php


/**
 * Base class that represents a query for the 'menu_seguridad' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 06/13/18 07:04:57
 *
 * @method MenuSeguridadQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MenuSeguridadQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method MenuSeguridadQuery orderByCredencial($order = Criteria::ASC) Order by the credencial column
 * @method MenuSeguridadQuery orderByModulo($order = Criteria::ASC) Order by the modulo column
 * @method MenuSeguridadQuery orderByIcono($order = Criteria::ASC) Order by the icono column
 * @method MenuSeguridadQuery orderByAccion($order = Criteria::ASC) Order by the accion column
 * @method MenuSeguridadQuery orderBySuperior($order = Criteria::ASC) Order by the superior column
 * @method MenuSeguridadQuery orderByOrden($order = Criteria::ASC) Order by the orden column
 *
 * @method MenuSeguridadQuery groupById() Group by the id column
 * @method MenuSeguridadQuery groupByDescripcion() Group by the descripcion column
 * @method MenuSeguridadQuery groupByCredencial() Group by the credencial column
 * @method MenuSeguridadQuery groupByModulo() Group by the modulo column
 * @method MenuSeguridadQuery groupByIcono() Group by the icono column
 * @method MenuSeguridadQuery groupByAccion() Group by the accion column
 * @method MenuSeguridadQuery groupBySuperior() Group by the superior column
 * @method MenuSeguridadQuery groupByOrden() Group by the orden column
 *
 * @method MenuSeguridadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MenuSeguridadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MenuSeguridadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MenuSeguridad findOne(PropelPDO $con = null) Return the first MenuSeguridad matching the query
 * @method MenuSeguridad findOneOrCreate(PropelPDO $con = null) Return the first MenuSeguridad matching the query, or a new MenuSeguridad object populated from the query conditions when no match is found
 *
 * @method MenuSeguridad findOneById(int $id) Return the first MenuSeguridad filtered by the id column
 * @method MenuSeguridad findOneByDescripcion(string $descripcion) Return the first MenuSeguridad filtered by the descripcion column
 * @method MenuSeguridad findOneByCredencial(string $credencial) Return the first MenuSeguridad filtered by the credencial column
 * @method MenuSeguridad findOneByModulo(string $modulo) Return the first MenuSeguridad filtered by the modulo column
 * @method MenuSeguridad findOneByIcono(string $icono) Return the first MenuSeguridad filtered by the icono column
 * @method MenuSeguridad findOneByAccion(string $accion) Return the first MenuSeguridad filtered by the accion column
 * @method MenuSeguridad findOneBySuperior(int $superior) Return the first MenuSeguridad filtered by the superior column
 * @method MenuSeguridad findOneByOrden(int $orden) Return the first MenuSeguridad filtered by the orden column
 *
 * @method array findById(int $id) Return MenuSeguridad objects filtered by the id column
 * @method array findByDescripcion(string $descripcion) Return MenuSeguridad objects filtered by the descripcion column
 * @method array findByCredencial(string $credencial) Return MenuSeguridad objects filtered by the credencial column
 * @method array findByModulo(string $modulo) Return MenuSeguridad objects filtered by the modulo column
 * @method array findByIcono(string $icono) Return MenuSeguridad objects filtered by the icono column
 * @method array findByAccion(string $accion) Return MenuSeguridad objects filtered by the accion column
 * @method array findBySuperior(int $superior) Return MenuSeguridad objects filtered by the superior column
 * @method array findByOrden(int $orden) Return MenuSeguridad objects filtered by the orden column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseMenuSeguridadQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMenuSeguridadQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'MenuSeguridad', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MenuSeguridadQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     MenuSeguridadQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MenuSeguridadQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MenuSeguridadQuery) {
            return $criteria;
        }
        $query = new MenuSeguridadQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   MenuSeguridad|MenuSeguridad[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MenuSeguridadPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MenuSeguridadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   MenuSeguridad A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `DESCRIPCION`, `CREDENCIAL`, `MODULO`, `ICONO`, `ACCION`, `SUPERIOR`, `ORDEN` FROM `menu_seguridad` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new MenuSeguridad();
            $obj->hydrate($row);
            MenuSeguridadPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return MenuSeguridad|MenuSeguridad[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|MenuSeguridad[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return MenuSeguridadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MenuSeguridadPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MenuSeguridadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MenuSeguridadPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuSeguridadQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(MenuSeguridadPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
     * $query->filterByDescripcion('%fooValue%'); // WHERE descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuSeguridadQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcion)) {
                $descripcion = str_replace('*', '%', $descripcion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuSeguridadPeer::DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the credencial column
     *
     * Example usage:
     * <code>
     * $query->filterByCredencial('fooValue');   // WHERE credencial = 'fooValue'
     * $query->filterByCredencial('%fooValue%'); // WHERE credencial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $credencial The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuSeguridadQuery The current query, for fluid interface
     */
    public function filterByCredencial($credencial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($credencial)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $credencial)) {
                $credencial = str_replace('*', '%', $credencial);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuSeguridadPeer::CREDENCIAL, $credencial, $comparison);
    }

    /**
     * Filter the query on the modulo column
     *
     * Example usage:
     * <code>
     * $query->filterByModulo('fooValue');   // WHERE modulo = 'fooValue'
     * $query->filterByModulo('%fooValue%'); // WHERE modulo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $modulo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuSeguridadQuery The current query, for fluid interface
     */
    public function filterByModulo($modulo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($modulo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $modulo)) {
                $modulo = str_replace('*', '%', $modulo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuSeguridadPeer::MODULO, $modulo, $comparison);
    }

    /**
     * Filter the query on the icono column
     *
     * Example usage:
     * <code>
     * $query->filterByIcono('fooValue');   // WHERE icono = 'fooValue'
     * $query->filterByIcono('%fooValue%'); // WHERE icono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $icono The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuSeguridadQuery The current query, for fluid interface
     */
    public function filterByIcono($icono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($icono)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $icono)) {
                $icono = str_replace('*', '%', $icono);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuSeguridadPeer::ICONO, $icono, $comparison);
    }

    /**
     * Filter the query on the accion column
     *
     * Example usage:
     * <code>
     * $query->filterByAccion('fooValue');   // WHERE accion = 'fooValue'
     * $query->filterByAccion('%fooValue%'); // WHERE accion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuSeguridadQuery The current query, for fluid interface
     */
    public function filterByAccion($accion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $accion)) {
                $accion = str_replace('*', '%', $accion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuSeguridadPeer::ACCION, $accion, $comparison);
    }

    /**
     * Filter the query on the superior column
     *
     * Example usage:
     * <code>
     * $query->filterBySuperior(1234); // WHERE superior = 1234
     * $query->filterBySuperior(array(12, 34)); // WHERE superior IN (12, 34)
     * $query->filterBySuperior(array('min' => 12)); // WHERE superior > 12
     * </code>
     *
     * @param     mixed $superior The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuSeguridadQuery The current query, for fluid interface
     */
    public function filterBySuperior($superior = null, $comparison = null)
    {
        if (is_array($superior)) {
            $useMinMax = false;
            if (isset($superior['min'])) {
                $this->addUsingAlias(MenuSeguridadPeer::SUPERIOR, $superior['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($superior['max'])) {
                $this->addUsingAlias(MenuSeguridadPeer::SUPERIOR, $superior['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuSeguridadPeer::SUPERIOR, $superior, $comparison);
    }

    /**
     * Filter the query on the orden column
     *
     * Example usage:
     * <code>
     * $query->filterByOrden(1234); // WHERE orden = 1234
     * $query->filterByOrden(array(12, 34)); // WHERE orden IN (12, 34)
     * $query->filterByOrden(array('min' => 12)); // WHERE orden > 12
     * </code>
     *
     * @param     mixed $orden The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuSeguridadQuery The current query, for fluid interface
     */
    public function filterByOrden($orden = null, $comparison = null)
    {
        if (is_array($orden)) {
            $useMinMax = false;
            if (isset($orden['min'])) {
                $this->addUsingAlias(MenuSeguridadPeer::ORDEN, $orden['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orden['max'])) {
                $this->addUsingAlias(MenuSeguridadPeer::ORDEN, $orden['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuSeguridadPeer::ORDEN, $orden, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   MenuSeguridad $menuSeguridad Object to remove from the list of results
     *
     * @return MenuSeguridadQuery The current query, for fluid interface
     */
    public function prune($menuSeguridad = null)
    {
        if ($menuSeguridad) {
            $this->addUsingAlias(MenuSeguridadPeer::ID, $menuSeguridad->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
