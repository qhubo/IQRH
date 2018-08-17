<?php


/**
 * Base class that represents a query for the 'catalogo_solicitud' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 08/17/18 06:17:31
 *
 * @method CatalogoSolicitudQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CatalogoSolicitudQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method CatalogoSolicitudQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method CatalogoSolicitudQuery orderByActivo($order = Criteria::ASC) Order by the activo column
 *
 * @method CatalogoSolicitudQuery groupById() Group by the id column
 * @method CatalogoSolicitudQuery groupByNombre() Group by the nombre column
 * @method CatalogoSolicitudQuery groupByObservaciones() Group by the observaciones column
 * @method CatalogoSolicitudQuery groupByActivo() Group by the activo column
 *
 * @method CatalogoSolicitudQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CatalogoSolicitudQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CatalogoSolicitudQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CatalogoSolicitudQuery leftJoinSolicitudUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the SolicitudUsuario relation
 * @method CatalogoSolicitudQuery rightJoinSolicitudUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SolicitudUsuario relation
 * @method CatalogoSolicitudQuery innerJoinSolicitudUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the SolicitudUsuario relation
 *
 * @method CatalogoSolicitud findOne(PropelPDO $con = null) Return the first CatalogoSolicitud matching the query
 * @method CatalogoSolicitud findOneOrCreate(PropelPDO $con = null) Return the first CatalogoSolicitud matching the query, or a new CatalogoSolicitud object populated from the query conditions when no match is found
 *
 * @method CatalogoSolicitud findOneById(int $id) Return the first CatalogoSolicitud filtered by the id column
 * @method CatalogoSolicitud findOneByNombre(string $nombre) Return the first CatalogoSolicitud filtered by the nombre column
 * @method CatalogoSolicitud findOneByObservaciones(string $observaciones) Return the first CatalogoSolicitud filtered by the observaciones column
 * @method CatalogoSolicitud findOneByActivo(boolean $activo) Return the first CatalogoSolicitud filtered by the activo column
 *
 * @method array findById(int $id) Return CatalogoSolicitud objects filtered by the id column
 * @method array findByNombre(string $nombre) Return CatalogoSolicitud objects filtered by the nombre column
 * @method array findByObservaciones(string $observaciones) Return CatalogoSolicitud objects filtered by the observaciones column
 * @method array findByActivo(boolean $activo) Return CatalogoSolicitud objects filtered by the activo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCatalogoSolicitudQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCatalogoSolicitudQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'CatalogoSolicitud', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CatalogoSolicitudQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CatalogoSolicitudQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CatalogoSolicitudQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CatalogoSolicitudQuery) {
            return $criteria;
        }
        $query = new CatalogoSolicitudQuery();
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
     * @return   CatalogoSolicitud|CatalogoSolicitud[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CatalogoSolicitudPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CatalogoSolicitudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   CatalogoSolicitud A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `NOMBRE`, `OBSERVACIONES`, `ACTIVO` FROM `catalogo_solicitud` WHERE `ID` = :p0';
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
            $obj = new CatalogoSolicitud();
            $obj->hydrate($row);
            CatalogoSolicitudPeer::addInstanceToPool($obj, (string) $key);
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
     * @return CatalogoSolicitud|CatalogoSolicitud[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|CatalogoSolicitud[]|mixed the list of results, formatted by the current formatter
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
     * @return CatalogoSolicitudQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CatalogoSolicitudPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CatalogoSolicitudQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CatalogoSolicitudPeer::ID, $keys, Criteria::IN);
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
     * @return CatalogoSolicitudQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CatalogoSolicitudPeer::ID, $id, $comparison);
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
     * @return CatalogoSolicitudQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CatalogoSolicitudPeer::NOMBRE, $nombre, $comparison);
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
     * @return CatalogoSolicitudQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CatalogoSolicitudPeer::OBSERVACIONES, $observaciones, $comparison);
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
     * @return CatalogoSolicitudQuery The current query, for fluid interface
     */
    public function filterByActivo($activo = null, $comparison = null)
    {
        if (is_string($activo)) {
            $activo = in_array(strtolower($activo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CatalogoSolicitudPeer::ACTIVO, $activo, $comparison);
    }

    /**
     * Filter the query by a related SolicitudUsuario object
     *
     * @param   SolicitudUsuario|PropelObjectCollection $solicitudUsuario  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CatalogoSolicitudQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySolicitudUsuario($solicitudUsuario, $comparison = null)
    {
        if ($solicitudUsuario instanceof SolicitudUsuario) {
            return $this
                ->addUsingAlias(CatalogoSolicitudPeer::ID, $solicitudUsuario->getCatalogoSolicitudId(), $comparison);
        } elseif ($solicitudUsuario instanceof PropelObjectCollection) {
            return $this
                ->useSolicitudUsuarioQuery()
                ->filterByPrimaryKeys($solicitudUsuario->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySolicitudUsuario() only accepts arguments of type SolicitudUsuario or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SolicitudUsuario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CatalogoSolicitudQuery The current query, for fluid interface
     */
    public function joinSolicitudUsuario($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SolicitudUsuario');

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
            $this->addJoinObject($join, 'SolicitudUsuario');
        }

        return $this;
    }

    /**
     * Use the SolicitudUsuario relation SolicitudUsuario object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SolicitudUsuarioQuery A secondary query class using the current class as primary query
     */
    public function useSolicitudUsuarioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSolicitudUsuario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SolicitudUsuario', 'SolicitudUsuarioQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   CatalogoSolicitud $catalogoSolicitud Object to remove from the list of results
     *
     * @return CatalogoSolicitudQuery The current query, for fluid interface
     */
    public function prune($catalogoSolicitud = null)
    {
        if ($catalogoSolicitud) {
            $this->addUsingAlias(CatalogoSolicitudPeer::ID, $catalogoSolicitud->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
