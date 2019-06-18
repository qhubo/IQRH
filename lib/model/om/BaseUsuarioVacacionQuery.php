<?php


/**
 * Base class that represents a query for the 'usuario_vacacion' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 06/18/19 05:13:12
 *
 * @method UsuarioVacacionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UsuarioVacacionQuery orderByUsuario($order = Criteria::ASC) Order by the usuario column
 * @method UsuarioVacacionQuery orderByPeriodo($order = Criteria::ASC) Order by the periodo column
 * @method UsuarioVacacionQuery orderByPagado($order = Criteria::ASC) Order by the pagado column
 * @method UsuarioVacacionQuery orderByDerecho($order = Criteria::ASC) Order by the derecho column
 * @method UsuarioVacacionQuery orderByNuevo($order = Criteria::ASC) Order by the nuevo column
 *
 * @method UsuarioVacacionQuery groupById() Group by the id column
 * @method UsuarioVacacionQuery groupByUsuario() Group by the usuario column
 * @method UsuarioVacacionQuery groupByPeriodo() Group by the periodo column
 * @method UsuarioVacacionQuery groupByPagado() Group by the pagado column
 * @method UsuarioVacacionQuery groupByDerecho() Group by the derecho column
 * @method UsuarioVacacionQuery groupByNuevo() Group by the nuevo column
 *
 * @method UsuarioVacacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UsuarioVacacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UsuarioVacacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UsuarioVacacion findOne(PropelPDO $con = null) Return the first UsuarioVacacion matching the query
 * @method UsuarioVacacion findOneOrCreate(PropelPDO $con = null) Return the first UsuarioVacacion matching the query, or a new UsuarioVacacion object populated from the query conditions when no match is found
 *
 * @method UsuarioVacacion findOneById(int $id) Return the first UsuarioVacacion filtered by the id column
 * @method UsuarioVacacion findOneByUsuario(string $usuario) Return the first UsuarioVacacion filtered by the usuario column
 * @method UsuarioVacacion findOneByPeriodo(int $periodo) Return the first UsuarioVacacion filtered by the periodo column
 * @method UsuarioVacacion findOneByPagado(double $pagado) Return the first UsuarioVacacion filtered by the pagado column
 * @method UsuarioVacacion findOneByDerecho(double $derecho) Return the first UsuarioVacacion filtered by the derecho column
 * @method UsuarioVacacion findOneByNuevo(boolean $nuevo) Return the first UsuarioVacacion filtered by the nuevo column
 *
 * @method array findById(int $id) Return UsuarioVacacion objects filtered by the id column
 * @method array findByUsuario(string $usuario) Return UsuarioVacacion objects filtered by the usuario column
 * @method array findByPeriodo(int $periodo) Return UsuarioVacacion objects filtered by the periodo column
 * @method array findByPagado(double $pagado) Return UsuarioVacacion objects filtered by the pagado column
 * @method array findByDerecho(double $derecho) Return UsuarioVacacion objects filtered by the derecho column
 * @method array findByNuevo(boolean $nuevo) Return UsuarioVacacion objects filtered by the nuevo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseUsuarioVacacionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUsuarioVacacionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'UsuarioVacacion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UsuarioVacacionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     UsuarioVacacionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UsuarioVacacionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UsuarioVacacionQuery) {
            return $criteria;
        }
        $query = new UsuarioVacacionQuery();
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
     * @return   UsuarioVacacion|UsuarioVacacion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UsuarioVacacionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UsuarioVacacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   UsuarioVacacion A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USUARIO`, `PERIODO`, `PAGADO`, `DERECHO`, `NUEVO` FROM `usuario_vacacion` WHERE `ID` = :p0';
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
            $obj = new UsuarioVacacion();
            $obj->hydrate($row);
            UsuarioVacacionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return UsuarioVacacion|UsuarioVacacion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|UsuarioVacacion[]|mixed the list of results, formatted by the current formatter
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
     * @return UsuarioVacacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsuarioVacacionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UsuarioVacacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsuarioVacacionPeer::ID, $keys, Criteria::IN);
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
     * @return UsuarioVacacionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(UsuarioVacacionPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuario('fooValue');   // WHERE usuario = 'fooValue'
     * $query->filterByUsuario('%fooValue%'); // WHERE usuario LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usuario The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioVacacionQuery The current query, for fluid interface
     */
    public function filterByUsuario($usuario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usuario)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $usuario)) {
                $usuario = str_replace('*', '%', $usuario);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuarioVacacionPeer::USUARIO, $usuario, $comparison);
    }

    /**
     * Filter the query on the periodo column
     *
     * Example usage:
     * <code>
     * $query->filterByPeriodo(1234); // WHERE periodo = 1234
     * $query->filterByPeriodo(array(12, 34)); // WHERE periodo IN (12, 34)
     * $query->filterByPeriodo(array('min' => 12)); // WHERE periodo > 12
     * </code>
     *
     * @param     mixed $periodo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioVacacionQuery The current query, for fluid interface
     */
    public function filterByPeriodo($periodo = null, $comparison = null)
    {
        if (is_array($periodo)) {
            $useMinMax = false;
            if (isset($periodo['min'])) {
                $this->addUsingAlias(UsuarioVacacionPeer::PERIODO, $periodo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($periodo['max'])) {
                $this->addUsingAlias(UsuarioVacacionPeer::PERIODO, $periodo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioVacacionPeer::PERIODO, $periodo, $comparison);
    }

    /**
     * Filter the query on the pagado column
     *
     * Example usage:
     * <code>
     * $query->filterByPagado(1234); // WHERE pagado = 1234
     * $query->filterByPagado(array(12, 34)); // WHERE pagado IN (12, 34)
     * $query->filterByPagado(array('min' => 12)); // WHERE pagado > 12
     * </code>
     *
     * @param     mixed $pagado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioVacacionQuery The current query, for fluid interface
     */
    public function filterByPagado($pagado = null, $comparison = null)
    {
        if (is_array($pagado)) {
            $useMinMax = false;
            if (isset($pagado['min'])) {
                $this->addUsingAlias(UsuarioVacacionPeer::PAGADO, $pagado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pagado['max'])) {
                $this->addUsingAlias(UsuarioVacacionPeer::PAGADO, $pagado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioVacacionPeer::PAGADO, $pagado, $comparison);
    }

    /**
     * Filter the query on the derecho column
     *
     * Example usage:
     * <code>
     * $query->filterByDerecho(1234); // WHERE derecho = 1234
     * $query->filterByDerecho(array(12, 34)); // WHERE derecho IN (12, 34)
     * $query->filterByDerecho(array('min' => 12)); // WHERE derecho > 12
     * </code>
     *
     * @param     mixed $derecho The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioVacacionQuery The current query, for fluid interface
     */
    public function filterByDerecho($derecho = null, $comparison = null)
    {
        if (is_array($derecho)) {
            $useMinMax = false;
            if (isset($derecho['min'])) {
                $this->addUsingAlias(UsuarioVacacionPeer::DERECHO, $derecho['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($derecho['max'])) {
                $this->addUsingAlias(UsuarioVacacionPeer::DERECHO, $derecho['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioVacacionPeer::DERECHO, $derecho, $comparison);
    }

    /**
     * Filter the query on the nuevo column
     *
     * Example usage:
     * <code>
     * $query->filterByNuevo(true); // WHERE nuevo = true
     * $query->filterByNuevo('yes'); // WHERE nuevo = true
     * </code>
     *
     * @param     boolean|string $nuevo The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioVacacionQuery The current query, for fluid interface
     */
    public function filterByNuevo($nuevo = null, $comparison = null)
    {
        if (is_string($nuevo)) {
            $nuevo = in_array(strtolower($nuevo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UsuarioVacacionPeer::NUEVO, $nuevo, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   UsuarioVacacion $usuarioVacacion Object to remove from the list of results
     *
     * @return UsuarioVacacionQuery The current query, for fluid interface
     */
    public function prune($usuarioVacacion = null)
    {
        if ($usuarioVacacion) {
            $this->addUsingAlias(UsuarioVacacionPeer::ID, $usuarioVacacion->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
