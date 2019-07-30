<?php


/**
 * Base class that represents a query for the 'tipo_ausencia' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 07/30/19 18:41:46
 *
 * @method TipoAusenciaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TipoAusenciaQuery orderByEmpresa($order = Criteria::ASC) Order by the empresa column
 * @method TipoAusenciaQuery orderByObservacioes($order = Criteria::ASC) Order by the observacioes column
 * @method TipoAusenciaQuery orderByDia($order = Criteria::ASC) Order by the dia column
 * @method TipoAusenciaQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method TipoAusenciaQuery orderByActivo($order = Criteria::ASC) Order by the activo column
 *
 * @method TipoAusenciaQuery groupById() Group by the id column
 * @method TipoAusenciaQuery groupByEmpresa() Group by the empresa column
 * @method TipoAusenciaQuery groupByObservacioes() Group by the observacioes column
 * @method TipoAusenciaQuery groupByDia() Group by the dia column
 * @method TipoAusenciaQuery groupByNombre() Group by the nombre column
 * @method TipoAusenciaQuery groupByActivo() Group by the activo column
 *
 * @method TipoAusenciaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TipoAusenciaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TipoAusenciaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TipoAusencia findOne(PropelPDO $con = null) Return the first TipoAusencia matching the query
 * @method TipoAusencia findOneOrCreate(PropelPDO $con = null) Return the first TipoAusencia matching the query, or a new TipoAusencia object populated from the query conditions when no match is found
 *
 * @method TipoAusencia findOneById(int $id) Return the first TipoAusencia filtered by the id column
 * @method TipoAusencia findOneByEmpresa(string $empresa) Return the first TipoAusencia filtered by the empresa column
 * @method TipoAusencia findOneByObservacioes(string $observacioes) Return the first TipoAusencia filtered by the observacioes column
 * @method TipoAusencia findOneByDia(int $dia) Return the first TipoAusencia filtered by the dia column
 * @method TipoAusencia findOneByNombre(string $nombre) Return the first TipoAusencia filtered by the nombre column
 * @method TipoAusencia findOneByActivo(boolean $activo) Return the first TipoAusencia filtered by the activo column
 *
 * @method array findById(int $id) Return TipoAusencia objects filtered by the id column
 * @method array findByEmpresa(string $empresa) Return TipoAusencia objects filtered by the empresa column
 * @method array findByObservacioes(string $observacioes) Return TipoAusencia objects filtered by the observacioes column
 * @method array findByDia(int $dia) Return TipoAusencia objects filtered by the dia column
 * @method array findByNombre(string $nombre) Return TipoAusencia objects filtered by the nombre column
 * @method array findByActivo(boolean $activo) Return TipoAusencia objects filtered by the activo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTipoAusenciaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTipoAusenciaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'TipoAusencia', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TipoAusenciaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TipoAusenciaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TipoAusenciaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TipoAusenciaQuery) {
            return $criteria;
        }
        $query = new TipoAusenciaQuery();
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
     * @return   TipoAusencia|TipoAusencia[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TipoAusenciaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TipoAusenciaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   TipoAusencia A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `EMPRESA`, `OBSERVACIOES`, `DIA`, `NOMBRE`, `ACTIVO` FROM `tipo_ausencia` WHERE `ID` = :p0';
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
            $obj = new TipoAusencia();
            $obj->hydrate($row);
            TipoAusenciaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TipoAusencia|TipoAusencia[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TipoAusencia[]|mixed the list of results, formatted by the current formatter
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
     * @return TipoAusenciaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TipoAusenciaPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TipoAusenciaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TipoAusenciaPeer::ID, $keys, Criteria::IN);
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
     * @return TipoAusenciaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TipoAusenciaPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the empresa column
     *
     * Example usage:
     * <code>
     * $query->filterByEmpresa('fooValue');   // WHERE empresa = 'fooValue'
     * $query->filterByEmpresa('%fooValue%'); // WHERE empresa LIKE '%fooValue%'
     * </code>
     *
     * @param     string $empresa The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TipoAusenciaQuery The current query, for fluid interface
     */
    public function filterByEmpresa($empresa = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($empresa)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $empresa)) {
                $empresa = str_replace('*', '%', $empresa);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TipoAusenciaPeer::EMPRESA, $empresa, $comparison);
    }

    /**
     * Filter the query on the observacioes column
     *
     * Example usage:
     * <code>
     * $query->filterByObservacioes('fooValue');   // WHERE observacioes = 'fooValue'
     * $query->filterByObservacioes('%fooValue%'); // WHERE observacioes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $observacioes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TipoAusenciaQuery The current query, for fluid interface
     */
    public function filterByObservacioes($observacioes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($observacioes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $observacioes)) {
                $observacioes = str_replace('*', '%', $observacioes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TipoAusenciaPeer::OBSERVACIOES, $observacioes, $comparison);
    }

    /**
     * Filter the query on the dia column
     *
     * Example usage:
     * <code>
     * $query->filterByDia(1234); // WHERE dia = 1234
     * $query->filterByDia(array(12, 34)); // WHERE dia IN (12, 34)
     * $query->filterByDia(array('min' => 12)); // WHERE dia > 12
     * </code>
     *
     * @param     mixed $dia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TipoAusenciaQuery The current query, for fluid interface
     */
    public function filterByDia($dia = null, $comparison = null)
    {
        if (is_array($dia)) {
            $useMinMax = false;
            if (isset($dia['min'])) {
                $this->addUsingAlias(TipoAusenciaPeer::DIA, $dia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dia['max'])) {
                $this->addUsingAlias(TipoAusenciaPeer::DIA, $dia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TipoAusenciaPeer::DIA, $dia, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%'); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TipoAusenciaQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombre)) {
                $nombre = str_replace('*', '%', $nombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TipoAusenciaPeer::NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the activo column
     *
     * Example usage:
     * <code>
     * $query->filterByActivo(true); // WHERE activo = true
     * $query->filterByActivo('yes'); // WHERE activo = true
     * </code>
     *
     * @param     boolean|string $activo The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TipoAusenciaQuery The current query, for fluid interface
     */
    public function filterByActivo($activo = null, $comparison = null)
    {
        if (is_string($activo)) {
            $activo = in_array(strtolower($activo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TipoAusenciaPeer::ACTIVO, $activo, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   TipoAusencia $tipoAusencia Object to remove from the list of results
     *
     * @return TipoAusenciaQuery The current query, for fluid interface
     */
    public function prune($tipoAusencia = null)
    {
        if ($tipoAusencia) {
            $this->addUsingAlias(TipoAusenciaPeer::ID, $tipoAusencia->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
