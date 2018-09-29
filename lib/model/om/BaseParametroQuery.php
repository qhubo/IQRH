<?php


/**
 * Base class that represents a query for the 'parametro' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 09/29/18 04:44:05
 *
 * @method ParametroQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ParametroQuery orderByCodigo($order = Criteria::ASC) Order by the codigo column
 * @method ParametroQuery orderBySlogan($order = Criteria::ASC) Order by the slogan column
 * @method ParametroQuery orderByLogo($order = Criteria::ASC) Order by the logo column
 *
 * @method ParametroQuery groupById() Group by the id column
 * @method ParametroQuery groupByCodigo() Group by the codigo column
 * @method ParametroQuery groupBySlogan() Group by the slogan column
 * @method ParametroQuery groupByLogo() Group by the logo column
 *
 * @method ParametroQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ParametroQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ParametroQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Parametro findOne(PropelPDO $con = null) Return the first Parametro matching the query
 * @method Parametro findOneOrCreate(PropelPDO $con = null) Return the first Parametro matching the query, or a new Parametro object populated from the query conditions when no match is found
 *
 * @method Parametro findOneById(int $id) Return the first Parametro filtered by the id column
 * @method Parametro findOneByCodigo(string $codigo) Return the first Parametro filtered by the codigo column
 * @method Parametro findOneBySlogan(string $slogan) Return the first Parametro filtered by the slogan column
 * @method Parametro findOneByLogo(string $logo) Return the first Parametro filtered by the logo column
 *
 * @method array findById(int $id) Return Parametro objects filtered by the id column
 * @method array findByCodigo(string $codigo) Return Parametro objects filtered by the codigo column
 * @method array findBySlogan(string $slogan) Return Parametro objects filtered by the slogan column
 * @method array findByLogo(string $logo) Return Parametro objects filtered by the logo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseParametroQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseParametroQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Parametro', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ParametroQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ParametroQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ParametroQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ParametroQuery) {
            return $criteria;
        }
        $query = new ParametroQuery();
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
     * @return   Parametro|Parametro[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ParametroPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ParametroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Parametro A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CODIGO`, `SLOGAN`, `LOGO` FROM `parametro` WHERE `ID` = :p0';
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
            $obj = new Parametro();
            $obj->hydrate($row);
            ParametroPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Parametro|Parametro[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Parametro[]|mixed the list of results, formatted by the current formatter
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
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ParametroPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ParametroPeer::ID, $keys, Criteria::IN);
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
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ParametroPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByCodigo('fooValue');   // WHERE codigo = 'fooValue'
     * $query->filterByCodigo('%fooValue%'); // WHERE codigo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codigo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByCodigo($codigo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codigo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $codigo)) {
                $codigo = str_replace('*', '%', $codigo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ParametroPeer::CODIGO, $codigo, $comparison);
    }

    /**
     * Filter the query on the slogan column
     *
     * Example usage:
     * <code>
     * $query->filterBySlogan('fooValue');   // WHERE slogan = 'fooValue'
     * $query->filterBySlogan('%fooValue%'); // WHERE slogan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slogan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterBySlogan($slogan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slogan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $slogan)) {
                $slogan = str_replace('*', '%', $slogan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ParametroPeer::SLOGAN, $slogan, $comparison);
    }

    /**
     * Filter the query on the logo column
     *
     * Example usage:
     * <code>
     * $query->filterByLogo('fooValue');   // WHERE logo = 'fooValue'
     * $query->filterByLogo('%fooValue%'); // WHERE logo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByLogo($logo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $logo)) {
                $logo = str_replace('*', '%', $logo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ParametroPeer::LOGO, $logo, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Parametro $parametro Object to remove from the list of results
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function prune($parametro = null)
    {
        if ($parametro) {
            $this->addUsingAlias(ParametroPeer::ID, $parametro->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
