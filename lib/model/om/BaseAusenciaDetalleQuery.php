<?php


/**
 * Base class that represents a query for the 'ausencia_detalle' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 11/28/18 19:31:08
 *
 * @method AusenciaDetalleQuery orderById($order = Criteria::ASC) Order by the id column
 * @method AusenciaDetalleQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method AusenciaDetalleQuery orderBySolicitudAusenciaId($order = Criteria::ASC) Order by the solicitud_ausencia_id column
 * @method AusenciaDetalleQuery orderByDia($order = Criteria::ASC) Order by the dia column
 *
 * @method AusenciaDetalleQuery groupById() Group by the id column
 * @method AusenciaDetalleQuery groupByUsuarioId() Group by the usuario_id column
 * @method AusenciaDetalleQuery groupBySolicitudAusenciaId() Group by the solicitud_ausencia_id column
 * @method AusenciaDetalleQuery groupByDia() Group by the dia column
 *
 * @method AusenciaDetalleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AusenciaDetalleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AusenciaDetalleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AusenciaDetalleQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method AusenciaDetalleQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method AusenciaDetalleQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method AusenciaDetalleQuery leftJoinSolicitudAusencia($relationAlias = null) Adds a LEFT JOIN clause to the query using the SolicitudAusencia relation
 * @method AusenciaDetalleQuery rightJoinSolicitudAusencia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SolicitudAusencia relation
 * @method AusenciaDetalleQuery innerJoinSolicitudAusencia($relationAlias = null) Adds a INNER JOIN clause to the query using the SolicitudAusencia relation
 *
 * @method AusenciaDetalle findOne(PropelPDO $con = null) Return the first AusenciaDetalle matching the query
 * @method AusenciaDetalle findOneOrCreate(PropelPDO $con = null) Return the first AusenciaDetalle matching the query, or a new AusenciaDetalle object populated from the query conditions when no match is found
 *
 * @method AusenciaDetalle findOneById(int $id) Return the first AusenciaDetalle filtered by the id column
 * @method AusenciaDetalle findOneByUsuarioId(int $usuario_id) Return the first AusenciaDetalle filtered by the usuario_id column
 * @method AusenciaDetalle findOneBySolicitudAusenciaId(int $solicitud_ausencia_id) Return the first AusenciaDetalle filtered by the solicitud_ausencia_id column
 * @method AusenciaDetalle findOneByDia(string $dia) Return the first AusenciaDetalle filtered by the dia column
 *
 * @method array findById(int $id) Return AusenciaDetalle objects filtered by the id column
 * @method array findByUsuarioId(int $usuario_id) Return AusenciaDetalle objects filtered by the usuario_id column
 * @method array findBySolicitudAusenciaId(int $solicitud_ausencia_id) Return AusenciaDetalle objects filtered by the solicitud_ausencia_id column
 * @method array findByDia(string $dia) Return AusenciaDetalle objects filtered by the dia column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAusenciaDetalleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAusenciaDetalleQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'AusenciaDetalle', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AusenciaDetalleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     AusenciaDetalleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AusenciaDetalleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AusenciaDetalleQuery) {
            return $criteria;
        }
        $query = new AusenciaDetalleQuery();
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
     * @return   AusenciaDetalle|AusenciaDetalle[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AusenciaDetallePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AusenciaDetallePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   AusenciaDetalle A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USUARIO_ID`, `SOLICITUD_AUSENCIA_ID`, `DIA` FROM `ausencia_detalle` WHERE `ID` = :p0';
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
            $obj = new AusenciaDetalle();
            $obj->hydrate($row);
            AusenciaDetallePeer::addInstanceToPool($obj, (string) $key);
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
     * @return AusenciaDetalle|AusenciaDetalle[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AusenciaDetalle[]|mixed the list of results, formatted by the current formatter
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
     * @return AusenciaDetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AusenciaDetallePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AusenciaDetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AusenciaDetallePeer::ID, $keys, Criteria::IN);
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
     * @return AusenciaDetalleQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(AusenciaDetallePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the usuario_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioId(1234); // WHERE usuario_id = 1234
     * $query->filterByUsuarioId(array(12, 34)); // WHERE usuario_id IN (12, 34)
     * $query->filterByUsuarioId(array('min' => 12)); // WHERE usuario_id > 12
     * </code>
     *
     * @see       filterByUsuario()
     *
     * @param     mixed $usuarioId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AusenciaDetalleQuery The current query, for fluid interface
     */
    public function filterByUsuarioId($usuarioId = null, $comparison = null)
    {
        if (is_array($usuarioId)) {
            $useMinMax = false;
            if (isset($usuarioId['min'])) {
                $this->addUsingAlias(AusenciaDetallePeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioId['max'])) {
                $this->addUsingAlias(AusenciaDetallePeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AusenciaDetallePeer::USUARIO_ID, $usuarioId, $comparison);
    }

    /**
     * Filter the query on the solicitud_ausencia_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySolicitudAusenciaId(1234); // WHERE solicitud_ausencia_id = 1234
     * $query->filterBySolicitudAusenciaId(array(12, 34)); // WHERE solicitud_ausencia_id IN (12, 34)
     * $query->filterBySolicitudAusenciaId(array('min' => 12)); // WHERE solicitud_ausencia_id > 12
     * </code>
     *
     * @see       filterBySolicitudAusencia()
     *
     * @param     mixed $solicitudAusenciaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AusenciaDetalleQuery The current query, for fluid interface
     */
    public function filterBySolicitudAusenciaId($solicitudAusenciaId = null, $comparison = null)
    {
        if (is_array($solicitudAusenciaId)) {
            $useMinMax = false;
            if (isset($solicitudAusenciaId['min'])) {
                $this->addUsingAlias(AusenciaDetallePeer::SOLICITUD_AUSENCIA_ID, $solicitudAusenciaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($solicitudAusenciaId['max'])) {
                $this->addUsingAlias(AusenciaDetallePeer::SOLICITUD_AUSENCIA_ID, $solicitudAusenciaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AusenciaDetallePeer::SOLICITUD_AUSENCIA_ID, $solicitudAusenciaId, $comparison);
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
     * @return AusenciaDetalleQuery The current query, for fluid interface
     */
    public function filterByDia($dia = null, $comparison = null)
    {
        if (is_array($dia)) {
            $useMinMax = false;
            if (isset($dia['min'])) {
                $this->addUsingAlias(AusenciaDetallePeer::DIA, $dia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dia['max'])) {
                $this->addUsingAlias(AusenciaDetallePeer::DIA, $dia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AusenciaDetallePeer::DIA, $dia, $comparison);
    }

    /**
     * Filter the query by a related Usuario object
     *
     * @param   Usuario|PropelObjectCollection $usuario The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AusenciaDetalleQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByUsuario($usuario, $comparison = null)
    {
        if ($usuario instanceof Usuario) {
            return $this
                ->addUsingAlias(AusenciaDetallePeer::USUARIO_ID, $usuario->getId(), $comparison);
        } elseif ($usuario instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AusenciaDetallePeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsuario() only accepts arguments of type Usuario or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Usuario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AusenciaDetalleQuery The current query, for fluid interface
     */
    public function joinUsuario($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Usuario');

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
            $this->addJoinObject($join, 'Usuario');
        }

        return $this;
    }

    /**
     * Use the Usuario relation Usuario object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsuarioQuery A secondary query class using the current class as primary query
     */
    public function useUsuarioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsuario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Usuario', 'UsuarioQuery');
    }

    /**
     * Filter the query by a related SolicitudAusencia object
     *
     * @param   SolicitudAusencia|PropelObjectCollection $solicitudAusencia The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AusenciaDetalleQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySolicitudAusencia($solicitudAusencia, $comparison = null)
    {
        if ($solicitudAusencia instanceof SolicitudAusencia) {
            return $this
                ->addUsingAlias(AusenciaDetallePeer::SOLICITUD_AUSENCIA_ID, $solicitudAusencia->getId(), $comparison);
        } elseif ($solicitudAusencia instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AusenciaDetallePeer::SOLICITUD_AUSENCIA_ID, $solicitudAusencia->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySolicitudAusencia() only accepts arguments of type SolicitudAusencia or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SolicitudAusencia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AusenciaDetalleQuery The current query, for fluid interface
     */
    public function joinSolicitudAusencia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SolicitudAusencia');

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
            $this->addJoinObject($join, 'SolicitudAusencia');
        }

        return $this;
    }

    /**
     * Use the SolicitudAusencia relation SolicitudAusencia object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SolicitudAusenciaQuery A secondary query class using the current class as primary query
     */
    public function useSolicitudAusenciaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSolicitudAusencia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SolicitudAusencia', 'SolicitudAusenciaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AusenciaDetalle $ausenciaDetalle Object to remove from the list of results
     *
     * @return AusenciaDetalleQuery The current query, for fluid interface
     */
    public function prune($ausenciaDetalle = null)
    {
        if ($ausenciaDetalle) {
            $this->addUsingAlias(AusenciaDetallePeer::ID, $ausenciaDetalle->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
