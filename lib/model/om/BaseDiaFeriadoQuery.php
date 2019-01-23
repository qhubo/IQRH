<?php


/**
 * Base class that represents a query for the 'dia_feriado' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 01/23/19 21:51:43
 *
 * @method DiaFeriadoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DiaFeriadoQuery orderByDia($order = Criteria::ASC) Order by the dia column
 *
 * @method DiaFeriadoQuery groupById() Group by the id column
 * @method DiaFeriadoQuery groupByDia() Group by the dia column
 *
 * @method DiaFeriadoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DiaFeriadoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DiaFeriadoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DiaFeriado findOne(PropelPDO $con = null) Return the first DiaFeriado matching the query
 * @method DiaFeriado findOneOrCreate(PropelPDO $con = null) Return the first DiaFeriado matching the query, or a new DiaFeriado object populated from the query conditions when no match is found
 *
 * @method DiaFeriado findOneById(int $id) Return the first DiaFeriado filtered by the id column
 * @method DiaFeriado findOneByDia(string $dia) Return the first DiaFeriado filtered by the dia column
 *
 * @method array findById(int $id) Return DiaFeriado objects filtered by the id column
 * @method array findByDia(string $dia) Return DiaFeriado objects filtered by the dia column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDiaFeriadoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDiaFeriadoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'DiaFeriado', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DiaFeriadoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     DiaFeriadoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DiaFeriadoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DiaFeriadoQuery) {
            return $criteria;
        }
        $query = new DiaFeriadoQuery();
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
     * @return   DiaFeriado|DiaFeriado[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DiaFeriadoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DiaFeriadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   DiaFeriado A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `DIA` FROM `dia_feriado` WHERE `ID` = :p0';
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
            $obj = new DiaFeriado();
            $obj->hydrate($row);
            DiaFeriadoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return DiaFeriado|DiaFeriado[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|DiaFeriado[]|mixed the list of results, formatted by the current formatter
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
     * @return DiaFeriadoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DiaFeriadoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DiaFeriadoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DiaFeriadoPeer::ID, $keys, Criteria::IN);
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
     * @return DiaFeriadoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(DiaFeriadoPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the dia column
     *
     * Example usage:
     * <code>
     * $query->filterByDia('2011-03-14'); // WHERE dia = '2011-03-14'
     * $query->filterByDia('now'); // WHERE dia = '2011-03-14'
     * $query->filterByDia(array('max' => 'yesterday')); // WHERE dia > '2011-03-13'
     * </code>
     *
     * @param     mixed $dia The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiaFeriadoQuery The current query, for fluid interface
     */
    public function filterByDia($dia = null, $comparison = null)
    {
        if (is_array($dia)) {
            $useMinMax = false;
            if (isset($dia['min'])) {
                $this->addUsingAlias(DiaFeriadoPeer::DIA, $dia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dia['max'])) {
                $this->addUsingAlias(DiaFeriadoPeer::DIA, $dia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiaFeriadoPeer::DIA, $dia, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   DiaFeriado $diaFeriado Object to remove from the list of results
     *
     * @return DiaFeriadoQuery The current query, for fluid interface
     */
    public function prune($diaFeriado = null)
    {
        if ($diaFeriado) {
            $this->addUsingAlias(DiaFeriadoPeer::ID, $diaFeriado->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
