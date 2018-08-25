<?php


/**
 * Base class that represents a query for the 'solicitud_ausencia' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 08/25/18 05:15:23
 *
 * @method SolicitudAusenciaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method SolicitudAusenciaQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method SolicitudAusenciaQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method SolicitudAusenciaQuery orderByMotivo($order = Criteria::ASC) Order by the motivo column
 * @method SolicitudAusenciaQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method SolicitudAusenciaQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method SolicitudAusenciaQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method SolicitudAusenciaQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method SolicitudAusenciaQuery orderByJefe($order = Criteria::ASC) Order by the jefe column
 * @method SolicitudAusenciaQuery orderByUsuarioModero($order = Criteria::ASC) Order by the usuario_modero column
 * @method SolicitudAusenciaQuery orderByComentarioModero($order = Criteria::ASC) Order by the comentario_modero column
 *
 * @method SolicitudAusenciaQuery groupById() Group by the id column
 * @method SolicitudAusenciaQuery groupByUsuarioId() Group by the usuario_id column
 * @method SolicitudAusenciaQuery groupByFecha() Group by the fecha column
 * @method SolicitudAusenciaQuery groupByMotivo() Group by the motivo column
 * @method SolicitudAusenciaQuery groupByObservaciones() Group by the observaciones column
 * @method SolicitudAusenciaQuery groupByEstado() Group by the estado column
 * @method SolicitudAusenciaQuery groupByCreatedAt() Group by the created_at column
 * @method SolicitudAusenciaQuery groupByUpdatedAt() Group by the updated_at column
 * @method SolicitudAusenciaQuery groupByJefe() Group by the jefe column
 * @method SolicitudAusenciaQuery groupByUsuarioModero() Group by the usuario_modero column
 * @method SolicitudAusenciaQuery groupByComentarioModero() Group by the comentario_modero column
 *
 * @method SolicitudAusenciaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SolicitudAusenciaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SolicitudAusenciaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SolicitudAusenciaQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method SolicitudAusenciaQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method SolicitudAusenciaQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method SolicitudAusencia findOne(PropelPDO $con = null) Return the first SolicitudAusencia matching the query
 * @method SolicitudAusencia findOneOrCreate(PropelPDO $con = null) Return the first SolicitudAusencia matching the query, or a new SolicitudAusencia object populated from the query conditions when no match is found
 *
 * @method SolicitudAusencia findOneById(int $id) Return the first SolicitudAusencia filtered by the id column
 * @method SolicitudAusencia findOneByUsuarioId(int $usuario_id) Return the first SolicitudAusencia filtered by the usuario_id column
 * @method SolicitudAusencia findOneByFecha(string $fecha) Return the first SolicitudAusencia filtered by the fecha column
 * @method SolicitudAusencia findOneByMotivo(string $motivo) Return the first SolicitudAusencia filtered by the motivo column
 * @method SolicitudAusencia findOneByObservaciones(string $observaciones) Return the first SolicitudAusencia filtered by the observaciones column
 * @method SolicitudAusencia findOneByEstado(string $estado) Return the first SolicitudAusencia filtered by the estado column
 * @method SolicitudAusencia findOneByCreatedAt(string $created_at) Return the first SolicitudAusencia filtered by the created_at column
 * @method SolicitudAusencia findOneByUpdatedAt(string $updated_at) Return the first SolicitudAusencia filtered by the updated_at column
 * @method SolicitudAusencia findOneByJefe(int $jefe) Return the first SolicitudAusencia filtered by the jefe column
 * @method SolicitudAusencia findOneByUsuarioModero(string $usuario_modero) Return the first SolicitudAusencia filtered by the usuario_modero column
 * @method SolicitudAusencia findOneByComentarioModero(string $comentario_modero) Return the first SolicitudAusencia filtered by the comentario_modero column
 *
 * @method array findById(int $id) Return SolicitudAusencia objects filtered by the id column
 * @method array findByUsuarioId(int $usuario_id) Return SolicitudAusencia objects filtered by the usuario_id column
 * @method array findByFecha(string $fecha) Return SolicitudAusencia objects filtered by the fecha column
 * @method array findByMotivo(string $motivo) Return SolicitudAusencia objects filtered by the motivo column
 * @method array findByObservaciones(string $observaciones) Return SolicitudAusencia objects filtered by the observaciones column
 * @method array findByEstado(string $estado) Return SolicitudAusencia objects filtered by the estado column
 * @method array findByCreatedAt(string $created_at) Return SolicitudAusencia objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return SolicitudAusencia objects filtered by the updated_at column
 * @method array findByJefe(int $jefe) Return SolicitudAusencia objects filtered by the jefe column
 * @method array findByUsuarioModero(string $usuario_modero) Return SolicitudAusencia objects filtered by the usuario_modero column
 * @method array findByComentarioModero(string $comentario_modero) Return SolicitudAusencia objects filtered by the comentario_modero column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSolicitudAusenciaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSolicitudAusenciaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'SolicitudAusencia', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SolicitudAusenciaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     SolicitudAusenciaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SolicitudAusenciaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SolicitudAusenciaQuery) {
            return $criteria;
        }
        $query = new SolicitudAusenciaQuery();
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
     * @return   SolicitudAusencia|SolicitudAusencia[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SolicitudAusenciaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SolicitudAusenciaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   SolicitudAusencia A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USUARIO_ID`, `FECHA`, `MOTIVO`, `OBSERVACIONES`, `ESTADO`, `CREATED_AT`, `UPDATED_AT`, `JEFE`, `USUARIO_MODERO`, `COMENTARIO_MODERO` FROM `solicitud_ausencia` WHERE `ID` = :p0';
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
            $obj = new SolicitudAusencia();
            $obj->hydrate($row);
            SolicitudAusenciaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SolicitudAusencia|SolicitudAusencia[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SolicitudAusencia[]|mixed the list of results, formatted by the current formatter
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
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SolicitudAusenciaPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SolicitudAusenciaPeer::ID, $keys, Criteria::IN);
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
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(SolicitudAusenciaPeer::ID, $id, $comparison);
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
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterByUsuarioId($usuarioId = null, $comparison = null)
    {
        if (is_array($usuarioId)) {
            $useMinMax = false;
            if (isset($usuarioId['min'])) {
                $this->addUsingAlias(SolicitudAusenciaPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioId['max'])) {
                $this->addUsingAlias(SolicitudAusenciaPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudAusenciaPeer::USUARIO_ID, $usuarioId, $comparison);
    }

    /**
     * Filter the query on the fecha column
     *
     * Example usage:
     * <code>
     * $query->filterByFecha('2011-03-14'); // WHERE fecha = '2011-03-14'
     * $query->filterByFecha('now'); // WHERE fecha = '2011-03-14'
     * $query->filterByFecha(array('max' => 'yesterday')); // WHERE fecha > '2011-03-13'
     * </code>
     *
     * @param     mixed $fecha The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterByFecha($fecha = null, $comparison = null)
    {
        if (is_array($fecha)) {
            $useMinMax = false;
            if (isset($fecha['min'])) {
                $this->addUsingAlias(SolicitudAusenciaPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecha['max'])) {
                $this->addUsingAlias(SolicitudAusenciaPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudAusenciaPeer::FECHA, $fecha, $comparison);
    }

    /**
     * Filter the query on the motivo column
     *
     * Example usage:
     * <code>
     * $query->filterByMotivo('fooValue');   // WHERE motivo = 'fooValue'
     * $query->filterByMotivo('%fooValue%'); // WHERE motivo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $motivo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterByMotivo($motivo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($motivo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $motivo)) {
                $motivo = str_replace('*', '%', $motivo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SolicitudAusenciaPeer::MOTIVO, $motivo, $comparison);
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
     * @return SolicitudAusenciaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SolicitudAusenciaPeer::OBSERVACIONES, $observaciones, $comparison);
    }

    /**
     * Filter the query on the estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEstado('fooValue');   // WHERE estado = 'fooValue'
     * $query->filterByEstado('%fooValue%'); // WHERE estado LIKE '%fooValue%'
     * </code>
     *
     * @param     string $estado The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $estado)) {
                $estado = str_replace('*', '%', $estado);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SolicitudAusenciaPeer::ESTADO, $estado, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SolicitudAusenciaPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SolicitudAusenciaPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudAusenciaPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SolicitudAusenciaPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SolicitudAusenciaPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudAusenciaPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the jefe column
     *
     * Example usage:
     * <code>
     * $query->filterByJefe(1234); // WHERE jefe = 1234
     * $query->filterByJefe(array(12, 34)); // WHERE jefe IN (12, 34)
     * $query->filterByJefe(array('min' => 12)); // WHERE jefe > 12
     * </code>
     *
     * @param     mixed $jefe The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterByJefe($jefe = null, $comparison = null)
    {
        if (is_array($jefe)) {
            $useMinMax = false;
            if (isset($jefe['min'])) {
                $this->addUsingAlias(SolicitudAusenciaPeer::JEFE, $jefe['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jefe['max'])) {
                $this->addUsingAlias(SolicitudAusenciaPeer::JEFE, $jefe['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudAusenciaPeer::JEFE, $jefe, $comparison);
    }

    /**
     * Filter the query on the usuario_modero column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioModero('fooValue');   // WHERE usuario_modero = 'fooValue'
     * $query->filterByUsuarioModero('%fooValue%'); // WHERE usuario_modero LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usuarioModero The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterByUsuarioModero($usuarioModero = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usuarioModero)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $usuarioModero)) {
                $usuarioModero = str_replace('*', '%', $usuarioModero);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SolicitudAusenciaPeer::USUARIO_MODERO, $usuarioModero, $comparison);
    }

    /**
     * Filter the query on the comentario_modero column
     *
     * Example usage:
     * <code>
     * $query->filterByComentarioModero('fooValue');   // WHERE comentario_modero = 'fooValue'
     * $query->filterByComentarioModero('%fooValue%'); // WHERE comentario_modero LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comentarioModero The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function filterByComentarioModero($comentarioModero = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comentarioModero)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comentarioModero)) {
                $comentarioModero = str_replace('*', '%', $comentarioModero);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SolicitudAusenciaPeer::COMENTARIO_MODERO, $comentarioModero, $comparison);
    }

    /**
     * Filter the query by a related Usuario object
     *
     * @param   Usuario|PropelObjectCollection $usuario The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SolicitudAusenciaQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByUsuario($usuario, $comparison = null)
    {
        if ($usuario instanceof Usuario) {
            return $this
                ->addUsingAlias(SolicitudAusenciaPeer::USUARIO_ID, $usuario->getId(), $comparison);
        } elseif ($usuario instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SolicitudAusenciaPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return SolicitudAusenciaQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   SolicitudAusencia $solicitudAusencia Object to remove from the list of results
     *
     * @return SolicitudAusenciaQuery The current query, for fluid interface
     */
    public function prune($solicitudAusencia = null)
    {
        if ($solicitudAusencia) {
            $this->addUsingAlias(SolicitudAusenciaPeer::ID, $solicitudAusencia->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
