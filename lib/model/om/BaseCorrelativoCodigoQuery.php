<?php


/**
 * Base class that represents a query for the 'correlativo_codigo' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 10/12/18 19:50:43
 *
 * @method CorrelativoCodigoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CorrelativoCodigoQuery orderByNumeroAsginar($order = Criteria::ASC) Order by the numero_asginar column
 * @method CorrelativoCodigoQuery orderByPrefijo($order = Criteria::ASC) Order by the prefijo column
 * @method CorrelativoCodigoQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 *
 * @method CorrelativoCodigoQuery groupById() Group by the id column
 * @method CorrelativoCodigoQuery groupByNumeroAsginar() Group by the numero_asginar column
 * @method CorrelativoCodigoQuery groupByPrefijo() Group by the prefijo column
 * @method CorrelativoCodigoQuery groupByTipo() Group by the tipo column
 *
 * @method CorrelativoCodigoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CorrelativoCodigoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CorrelativoCodigoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CorrelativoCodigo findOne(PropelPDO $con = null) Return the first CorrelativoCodigo matching the query
 * @method CorrelativoCodigo findOneOrCreate(PropelPDO $con = null) Return the first CorrelativoCodigo matching the query, or a new CorrelativoCodigo object populated from the query conditions when no match is found
 *
 * @method CorrelativoCodigo findOneById(int $id) Return the first CorrelativoCodigo filtered by the id column
 * @method CorrelativoCodigo findOneByNumeroAsginar(int $numero_asginar) Return the first CorrelativoCodigo filtered by the numero_asginar column
 * @method CorrelativoCodigo findOneByPrefijo(string $prefijo) Return the first CorrelativoCodigo filtered by the prefijo column
 * @method CorrelativoCodigo findOneByTipo(string $tipo) Return the first CorrelativoCodigo filtered by the tipo column
 *
 * @method array findById(int $id) Return CorrelativoCodigo objects filtered by the id column
 * @method array findByNumeroAsginar(int $numero_asginar) Return CorrelativoCodigo objects filtered by the numero_asginar column
 * @method array findByPrefijo(string $prefijo) Return CorrelativoCodigo objects filtered by the prefijo column
 * @method array findByTipo(string $tipo) Return CorrelativoCodigo objects filtered by the tipo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCorrelativoCodigoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCorrelativoCodigoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'CorrelativoCodigo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CorrelativoCodigoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CorrelativoCodigoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CorrelativoCodigoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CorrelativoCodigoQuery) {
            return $criteria;
        }
        $query = new CorrelativoCodigoQuery();
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
     * @return   CorrelativoCodigo|CorrelativoCodigo[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CorrelativoCodigoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CorrelativoCodigoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   CorrelativoCodigo A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `NUMERO_ASGINAR`, `PREFIJO`, `TIPO` FROM `correlativo_codigo` WHERE `ID` = :p0';
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
            $obj = new CorrelativoCodigo();
            $obj->hydrate($row);
            CorrelativoCodigoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return CorrelativoCodigo|CorrelativoCodigo[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|CorrelativoCodigo[]|mixed the list of results, formatted by the current formatter
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
     * @return CorrelativoCodigoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CorrelativoCodigoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CorrelativoCodigoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CorrelativoCodigoPeer::ID, $keys, Criteria::IN);
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
     * @return CorrelativoCodigoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CorrelativoCodigoPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the numero_asginar column
     *
     * Example usage:
     * <code>
     * $query->filterByNumeroAsginar(1234); // WHERE numero_asginar = 1234
     * $query->filterByNumeroAsginar(array(12, 34)); // WHERE numero_asginar IN (12, 34)
     * $query->filterByNumeroAsginar(array('min' => 12)); // WHERE numero_asginar > 12
     * </code>
     *
     * @param     mixed $numeroAsginar The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CorrelativoCodigoQuery The current query, for fluid interface
     */
    public function filterByNumeroAsginar($numeroAsginar = null, $comparison = null)
    {
        if (is_array($numeroAsginar)) {
            $useMinMax = false;
            if (isset($numeroAsginar['min'])) {
                $this->addUsingAlias(CorrelativoCodigoPeer::NUMERO_ASGINAR, $numeroAsginar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numeroAsginar['max'])) {
                $this->addUsingAlias(CorrelativoCodigoPeer::NUMERO_ASGINAR, $numeroAsginar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CorrelativoCodigoPeer::NUMERO_ASGINAR, $numeroAsginar, $comparison);
    }

    /**
     * Filter the query on the prefijo column
     *
     * Example usage:
     * <code>
     * $query->filterByPrefijo('fooValue');   // WHERE prefijo = 'fooValue'
     * $query->filterByPrefijo('%fooValue%'); // WHERE prefijo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prefijo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CorrelativoCodigoQuery The current query, for fluid interface
     */
    public function filterByPrefijo($prefijo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prefijo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $prefijo)) {
                $prefijo = str_replace('*', '%', $prefijo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CorrelativoCodigoPeer::PREFIJO, $prefijo, $comparison);
    }

    /**
     * Filter the query on the tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo('fooValue');   // WHERE tipo = 'fooValue'
     * $query->filterByTipo('%fooValue%'); // WHERE tipo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CorrelativoCodigoQuery The current query, for fluid interface
     */
    public function filterByTipo($tipo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tipo)) {
                $tipo = str_replace('*', '%', $tipo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CorrelativoCodigoPeer::TIPO, $tipo, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   CorrelativoCodigo $correlativoCodigo Object to remove from the list of results
     *
     * @return CorrelativoCodigoQuery The current query, for fluid interface
     */
    public function prune($correlativoCodigo = null)
    {
        if ($correlativoCodigo) {
            $this->addUsingAlias(CorrelativoCodigoPeer::ID, $correlativoCodigo->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
