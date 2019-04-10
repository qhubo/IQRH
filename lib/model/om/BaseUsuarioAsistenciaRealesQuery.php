<?php


/**
 * Base class that represents a query for the 'usuario_asistencia_reales' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 03/28/19 02:04:56
 *
 * @method UsuarioAsistenciaRealesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UsuarioAsistenciaRealesQuery orderByUsuario($order = Criteria::ASC) Order by the usuario column
 * @method UsuarioAsistenciaRealesQuery orderByDia($order = Criteria::ASC) Order by the dia column
 * @method UsuarioAsistenciaRealesQuery orderByMinutos($order = Criteria::ASC) Order by the minutos column
 *
 * @method UsuarioAsistenciaRealesQuery groupById() Group by the id column
 * @method UsuarioAsistenciaRealesQuery groupByUsuario() Group by the usuario column
 * @method UsuarioAsistenciaRealesQuery groupByDia() Group by the dia column
 * @method UsuarioAsistenciaRealesQuery groupByMinutos() Group by the minutos column
 *
 * @method UsuarioAsistenciaRealesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UsuarioAsistenciaRealesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UsuarioAsistenciaRealesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UsuarioAsistenciaReales findOne(PropelPDO $con = null) Return the first UsuarioAsistenciaReales matching the query
 * @method UsuarioAsistenciaReales findOneOrCreate(PropelPDO $con = null) Return the first UsuarioAsistenciaReales matching the query, or a new UsuarioAsistenciaReales object populated from the query conditions when no match is found
 *
 * @method UsuarioAsistenciaReales findOneById(int $id) Return the first UsuarioAsistenciaReales filtered by the id column
 * @method UsuarioAsistenciaReales findOneByUsuario(string $usuario) Return the first UsuarioAsistenciaReales filtered by the usuario column
 * @method UsuarioAsistenciaReales findOneByDia(string $dia) Return the first UsuarioAsistenciaReales filtered by the dia column
 * @method UsuarioAsistenciaReales findOneByMinutos(double $minutos) Return the first UsuarioAsistenciaReales filtered by the minutos column
 *
 * @method array findById(int $id) Return UsuarioAsistenciaReales objects filtered by the id column
 * @method array findByUsuario(string $usuario) Return UsuarioAsistenciaReales objects filtered by the usuario column
 * @method array findByDia(string $dia) Return UsuarioAsistenciaReales objects filtered by the dia column
 * @method array findByMinutos(double $minutos) Return UsuarioAsistenciaReales objects filtered by the minutos column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseUsuarioAsistenciaRealesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUsuarioAsistenciaRealesQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'UsuarioAsistenciaReales', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UsuarioAsistenciaRealesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     UsuarioAsistenciaRealesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UsuarioAsistenciaRealesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UsuarioAsistenciaRealesQuery) {
            return $criteria;
        }
        $query = new UsuarioAsistenciaRealesQuery();
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
     * @return   UsuarioAsistenciaReales|UsuarioAsistenciaReales[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UsuarioAsistenciaRealesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UsuarioAsistenciaRealesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   UsuarioAsistenciaReales A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USUARIO`, `DIA`, `MINUTOS` FROM `usuario_asistencia_reales` WHERE `ID` = :p0';
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
            $obj = new UsuarioAsistenciaReales();
            $obj->hydrate($row);
            UsuarioAsistenciaRealesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return UsuarioAsistenciaReales|UsuarioAsistenciaReales[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|UsuarioAsistenciaReales[]|mixed the list of results, formatted by the current formatter
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
     * @return UsuarioAsistenciaRealesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsuarioAsistenciaRealesPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UsuarioAsistenciaRealesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsuarioAsistenciaRealesPeer::ID, $keys, Criteria::IN);
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
     * @return UsuarioAsistenciaRealesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(UsuarioAsistenciaRealesPeer::ID, $id, $comparison);
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
     * @return UsuarioAsistenciaRealesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UsuarioAsistenciaRealesPeer::USUARIO, $usuario, $comparison);
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
     * @return UsuarioAsistenciaRealesQuery The current query, for fluid interface
     */
    public function filterByDia($dia = null, $comparison = null)
    {
        if (is_array($dia)) {
            $useMinMax = false;
            if (isset($dia['min'])) {
                $this->addUsingAlias(UsuarioAsistenciaRealesPeer::DIA, $dia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dia['max'])) {
                $this->addUsingAlias(UsuarioAsistenciaRealesPeer::DIA, $dia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioAsistenciaRealesPeer::DIA, $dia, $comparison);
    }

    /**
     * Filter the query on the minutos column
     *
     * Example usage:
     * <code>
     * $query->filterByMinutos(1234); // WHERE minutos = 1234
     * $query->filterByMinutos(array(12, 34)); // WHERE minutos IN (12, 34)
     * $query->filterByMinutos(array('min' => 12)); // WHERE minutos > 12
     * </code>
     *
     * @param     mixed $minutos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioAsistenciaRealesQuery The current query, for fluid interface
     */
    public function filterByMinutos($minutos = null, $comparison = null)
    {
        if (is_array($minutos)) {
            $useMinMax = false;
            if (isset($minutos['min'])) {
                $this->addUsingAlias(UsuarioAsistenciaRealesPeer::MINUTOS, $minutos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minutos['max'])) {
                $this->addUsingAlias(UsuarioAsistenciaRealesPeer::MINUTOS, $minutos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioAsistenciaRealesPeer::MINUTOS, $minutos, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   UsuarioAsistenciaReales $usuarioAsistenciaReales Object to remove from the list of results
     *
     * @return UsuarioAsistenciaRealesQuery The current query, for fluid interface
     */
    public function prune($usuarioAsistenciaReales = null)
    {
        if ($usuarioAsistenciaReales) {
            $this->addUsingAlias(UsuarioAsistenciaRealesPeer::ID, $usuarioAsistenciaReales->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}