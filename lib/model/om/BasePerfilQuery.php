<?php


/**
 * Base class that represents a query for the 'perfil' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 11/28/18 19:31:07
 *
 * @method PerfilQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PerfilQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method PerfilQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method PerfilQuery orderByActivo($order = Criteria::ASC) Order by the activo column
 *
 * @method PerfilQuery groupById() Group by the id column
 * @method PerfilQuery groupByDescripcion() Group by the descripcion column
 * @method PerfilQuery groupByObservaciones() Group by the observaciones column
 * @method PerfilQuery groupByActivo() Group by the activo column
 *
 * @method PerfilQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PerfilQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PerfilQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PerfilQuery leftJoinUsuarioPerfil($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioPerfil relation
 * @method PerfilQuery rightJoinUsuarioPerfil($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioPerfil relation
 * @method PerfilQuery innerJoinUsuarioPerfil($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioPerfil relation
 *
 * @method Perfil findOne(PropelPDO $con = null) Return the first Perfil matching the query
 * @method Perfil findOneOrCreate(PropelPDO $con = null) Return the first Perfil matching the query, or a new Perfil object populated from the query conditions when no match is found
 *
 * @method Perfil findOneById(int $id) Return the first Perfil filtered by the id column
 * @method Perfil findOneByDescripcion(string $descripcion) Return the first Perfil filtered by the descripcion column
 * @method Perfil findOneByObservaciones(string $observaciones) Return the first Perfil filtered by the observaciones column
 * @method Perfil findOneByActivo(boolean $activo) Return the first Perfil filtered by the activo column
 *
 * @method array findById(int $id) Return Perfil objects filtered by the id column
 * @method array findByDescripcion(string $descripcion) Return Perfil objects filtered by the descripcion column
 * @method array findByObservaciones(string $observaciones) Return Perfil objects filtered by the observaciones column
 * @method array findByActivo(boolean $activo) Return Perfil objects filtered by the activo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePerfilQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePerfilQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Perfil', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PerfilQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     PerfilQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PerfilQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PerfilQuery) {
            return $criteria;
        }
        $query = new PerfilQuery();
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
     * @return   Perfil|Perfil[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PerfilPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PerfilPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Perfil A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `DESCRIPCION`, `OBSERVACIONES`, `ACTIVO` FROM `perfil` WHERE `ID` = :p0';
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
            $obj = new Perfil();
            $obj->hydrate($row);
            PerfilPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Perfil|Perfil[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Perfil[]|mixed the list of results, formatted by the current formatter
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
     * @return PerfilQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PerfilPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PerfilPeer::ID, $keys, Criteria::IN);
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
     * @return PerfilQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(PerfilPeer::ID, $id, $comparison);
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
     * @return PerfilQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PerfilPeer::DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the observaciones column
     *
     * Example usage:
     * <code>
     * $query->filterByObservaciones('fooValue');   // WHERE observaciones = 'fooValue'
     * $query->filterByObservaciones('%fooValue%'); // WHERE observaciones LIKE '%fooValue%'
     * </code>
     *
     * @param     string $observaciones The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function filterByObservaciones($observaciones = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($observaciones)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $observaciones)) {
                $observaciones = str_replace('*', '%', $observaciones);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PerfilPeer::OBSERVACIONES, $observaciones, $comparison);
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
     * @return PerfilQuery The current query, for fluid interface
     */
    public function filterByActivo($activo = null, $comparison = null)
    {
        if (is_string($activo)) {
            $activo = in_array(strtolower($activo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PerfilPeer::ACTIVO, $activo, $comparison);
    }

    /**
     * Filter the query by a related UsuarioPerfil object
     *
     * @param   UsuarioPerfil|PropelObjectCollection $usuarioPerfil  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PerfilQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByUsuarioPerfil($usuarioPerfil, $comparison = null)
    {
        if ($usuarioPerfil instanceof UsuarioPerfil) {
            return $this
                ->addUsingAlias(PerfilPeer::ID, $usuarioPerfil->getPerfilId(), $comparison);
        } elseif ($usuarioPerfil instanceof PropelObjectCollection) {
            return $this
                ->useUsuarioPerfilQuery()
                ->filterByPrimaryKeys($usuarioPerfil->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsuarioPerfil() only accepts arguments of type UsuarioPerfil or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsuarioPerfil relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function joinUsuarioPerfil($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsuarioPerfil');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UsuarioPerfil');
        }

        return $this;
    }

    /**
     * Use the UsuarioPerfil relation UsuarioPerfil object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsuarioPerfilQuery A secondary query class using the current class as primary query
     */
    public function useUsuarioPerfilQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsuarioPerfil($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsuarioPerfil', 'UsuarioPerfilQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Perfil $perfil Object to remove from the list of results
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function prune($perfil = null)
    {
        if ($perfil) {
            $this->addUsingAlias(PerfilPeer::ID, $perfil->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
