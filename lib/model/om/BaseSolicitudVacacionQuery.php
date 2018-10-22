<?php


/**
 * Base class that represents a query for the 'solicitud_vacacion' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 10/22/18 22:23:14
 *
 * @method SolicitudVacacionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method SolicitudVacacionQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method SolicitudVacacionQuery orderByFechaInicio($order = Criteria::ASC) Order by the fecha_inicio column
 * @method SolicitudVacacionQuery orderByFechaFin($order = Criteria::ASC) Order by the fecha_fin column
 * @method SolicitudVacacionQuery orderByDia($order = Criteria::ASC) Order by the dia column
 * @method SolicitudVacacionQuery orderByMotivo($order = Criteria::ASC) Order by the motivo column
 * @method SolicitudVacacionQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method SolicitudVacacionQuery orderByUsuarioModero($order = Criteria::ASC) Order by the usuario_modero column
 * @method SolicitudVacacionQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method SolicitudVacacionQuery orderByComentarioModero($order = Criteria::ASC) Order by the comentario_modero column
 * @method SolicitudVacacionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method SolicitudVacacionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method SolicitudVacacionQuery orderByJefe($order = Criteria::ASC) Order by the jefe column
 * @method SolicitudVacacionQuery orderByArchivoUno($order = Criteria::ASC) Order by the archivo_uno column
 * @method SolicitudVacacionQuery orderByArchivoDos($order = Criteria::ASC) Order by the archivo_dos column
 *
 * @method SolicitudVacacionQuery groupById() Group by the id column
 * @method SolicitudVacacionQuery groupByUsuarioId() Group by the usuario_id column
 * @method SolicitudVacacionQuery groupByFechaInicio() Group by the fecha_inicio column
 * @method SolicitudVacacionQuery groupByFechaFin() Group by the fecha_fin column
 * @method SolicitudVacacionQuery groupByDia() Group by the dia column
 * @method SolicitudVacacionQuery groupByMotivo() Group by the motivo column
 * @method SolicitudVacacionQuery groupByObservaciones() Group by the observaciones column
 * @method SolicitudVacacionQuery groupByUsuarioModero() Group by the usuario_modero column
 * @method SolicitudVacacionQuery groupByEstado() Group by the estado column
 * @method SolicitudVacacionQuery groupByComentarioModero() Group by the comentario_modero column
 * @method SolicitudVacacionQuery groupByCreatedAt() Group by the created_at column
 * @method SolicitudVacacionQuery groupByUpdatedAt() Group by the updated_at column
 * @method SolicitudVacacionQuery groupByJefe() Group by the jefe column
 * @method SolicitudVacacionQuery groupByArchivoUno() Group by the archivo_uno column
 * @method SolicitudVacacionQuery groupByArchivoDos() Group by the archivo_dos column
 *
 * @method SolicitudVacacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SolicitudVacacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SolicitudVacacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SolicitudVacacionQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method SolicitudVacacionQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method SolicitudVacacionQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method SolicitudVacacion findOne(PropelPDO $con = null) Return the first SolicitudVacacion matching the query
 * @method SolicitudVacacion findOneOrCreate(PropelPDO $con = null) Return the first SolicitudVacacion matching the query, or a new SolicitudVacacion object populated from the query conditions when no match is found
 *
 * @method SolicitudVacacion findOneById(int $id) Return the first SolicitudVacacion filtered by the id column
 * @method SolicitudVacacion findOneByUsuarioId(int $usuario_id) Return the first SolicitudVacacion filtered by the usuario_id column
 * @method SolicitudVacacion findOneByFechaInicio(string $fecha_inicio) Return the first SolicitudVacacion filtered by the fecha_inicio column
 * @method SolicitudVacacion findOneByFechaFin(string $fecha_fin) Return the first SolicitudVacacion filtered by the fecha_fin column
 * @method SolicitudVacacion findOneByDia(int $dia) Return the first SolicitudVacacion filtered by the dia column
 * @method SolicitudVacacion findOneByMotivo(string $motivo) Return the first SolicitudVacacion filtered by the motivo column
 * @method SolicitudVacacion findOneByObservaciones(string $observaciones) Return the first SolicitudVacacion filtered by the observaciones column
 * @method SolicitudVacacion findOneByUsuarioModero(string $usuario_modero) Return the first SolicitudVacacion filtered by the usuario_modero column
 * @method SolicitudVacacion findOneByEstado(string $estado) Return the first SolicitudVacacion filtered by the estado column
 * @method SolicitudVacacion findOneByComentarioModero(string $comentario_modero) Return the first SolicitudVacacion filtered by the comentario_modero column
 * @method SolicitudVacacion findOneByCreatedAt(string $created_at) Return the first SolicitudVacacion filtered by the created_at column
 * @method SolicitudVacacion findOneByUpdatedAt(string $updated_at) Return the first SolicitudVacacion filtered by the updated_at column
 * @method SolicitudVacacion findOneByJefe(int $jefe) Return the first SolicitudVacacion filtered by the jefe column
 * @method SolicitudVacacion findOneByArchivoUno(string $archivo_uno) Return the first SolicitudVacacion filtered by the archivo_uno column
 * @method SolicitudVacacion findOneByArchivoDos(string $archivo_dos) Return the first SolicitudVacacion filtered by the archivo_dos column
 *
 * @method array findById(int $id) Return SolicitudVacacion objects filtered by the id column
 * @method array findByUsuarioId(int $usuario_id) Return SolicitudVacacion objects filtered by the usuario_id column
 * @method array findByFechaInicio(string $fecha_inicio) Return SolicitudVacacion objects filtered by the fecha_inicio column
 * @method array findByFechaFin(string $fecha_fin) Return SolicitudVacacion objects filtered by the fecha_fin column
 * @method array findByDia(int $dia) Return SolicitudVacacion objects filtered by the dia column
 * @method array findByMotivo(string $motivo) Return SolicitudVacacion objects filtered by the motivo column
 * @method array findByObservaciones(string $observaciones) Return SolicitudVacacion objects filtered by the observaciones column
 * @method array findByUsuarioModero(string $usuario_modero) Return SolicitudVacacion objects filtered by the usuario_modero column
 * @method array findByEstado(string $estado) Return SolicitudVacacion objects filtered by the estado column
 * @method array findByComentarioModero(string $comentario_modero) Return SolicitudVacacion objects filtered by the comentario_modero column
 * @method array findByCreatedAt(string $created_at) Return SolicitudVacacion objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return SolicitudVacacion objects filtered by the updated_at column
 * @method array findByJefe(int $jefe) Return SolicitudVacacion objects filtered by the jefe column
 * @method array findByArchivoUno(string $archivo_uno) Return SolicitudVacacion objects filtered by the archivo_uno column
 * @method array findByArchivoDos(string $archivo_dos) Return SolicitudVacacion objects filtered by the archivo_dos column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSolicitudVacacionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSolicitudVacacionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'SolicitudVacacion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SolicitudVacacionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     SolicitudVacacionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SolicitudVacacionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SolicitudVacacionQuery) {
            return $criteria;
        }
        $query = new SolicitudVacacionQuery();
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
     * @return   SolicitudVacacion|SolicitudVacacion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SolicitudVacacionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SolicitudVacacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   SolicitudVacacion A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USUARIO_ID`, `FECHA_INICIO`, `FECHA_FIN`, `DIA`, `MOTIVO`, `OBSERVACIONES`, `USUARIO_MODERO`, `ESTADO`, `COMENTARIO_MODERO`, `CREATED_AT`, `UPDATED_AT`, `JEFE`, `ARCHIVO_UNO`, `ARCHIVO_DOS` FROM `solicitud_vacacion` WHERE `ID` = :p0';
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
            $obj = new SolicitudVacacion();
            $obj->hydrate($row);
            SolicitudVacacionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SolicitudVacacion|SolicitudVacacion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SolicitudVacacion[]|mixed the list of results, formatted by the current formatter
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SolicitudVacacionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SolicitudVacacionPeer::ID, $keys, Criteria::IN);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(SolicitudVacacionPeer::ID, $id, $comparison);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterByUsuarioId($usuarioId = null, $comparison = null)
    {
        if (is_array($usuarioId)) {
            $useMinMax = false;
            if (isset($usuarioId['min'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioId['max'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudVacacionPeer::USUARIO_ID, $usuarioId, $comparison);
    }

    /**
     * Filter the query on the fecha_inicio column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaInicio('2011-03-14'); // WHERE fecha_inicio = '2011-03-14'
     * $query->filterByFechaInicio('now'); // WHERE fecha_inicio = '2011-03-14'
     * $query->filterByFechaInicio(array('max' => 'yesterday')); // WHERE fecha_inicio > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaInicio The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterByFechaInicio($fechaInicio = null, $comparison = null)
    {
        if (is_array($fechaInicio)) {
            $useMinMax = false;
            if (isset($fechaInicio['min'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::FECHA_INICIO, $fechaInicio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaInicio['max'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::FECHA_INICIO, $fechaInicio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudVacacionPeer::FECHA_INICIO, $fechaInicio, $comparison);
    }

    /**
     * Filter the query on the fecha_fin column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaFin('2011-03-14'); // WHERE fecha_fin = '2011-03-14'
     * $query->filterByFechaFin('now'); // WHERE fecha_fin = '2011-03-14'
     * $query->filterByFechaFin(array('max' => 'yesterday')); // WHERE fecha_fin > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaFin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterByFechaFin($fechaFin = null, $comparison = null)
    {
        if (is_array($fechaFin)) {
            $useMinMax = false;
            if (isset($fechaFin['min'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::FECHA_FIN, $fechaFin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaFin['max'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::FECHA_FIN, $fechaFin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudVacacionPeer::FECHA_FIN, $fechaFin, $comparison);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterByDia($dia = null, $comparison = null)
    {
        if (is_array($dia)) {
            $useMinMax = false;
            if (isset($dia['min'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::DIA, $dia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dia['max'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::DIA, $dia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudVacacionPeer::DIA, $dia, $comparison);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SolicitudVacacionPeer::MOTIVO, $motivo, $comparison);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SolicitudVacacionPeer::OBSERVACIONES, $observaciones, $comparison);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SolicitudVacacionPeer::USUARIO_MODERO, $usuarioModero, $comparison);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SolicitudVacacionPeer::ESTADO, $estado, $comparison);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SolicitudVacacionPeer::COMENTARIO_MODERO, $comentarioModero, $comparison);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudVacacionPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudVacacionPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterByJefe($jefe = null, $comparison = null)
    {
        if (is_array($jefe)) {
            $useMinMax = false;
            if (isset($jefe['min'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::JEFE, $jefe['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jefe['max'])) {
                $this->addUsingAlias(SolicitudVacacionPeer::JEFE, $jefe['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SolicitudVacacionPeer::JEFE, $jefe, $comparison);
    }

    /**
     * Filter the query on the archivo_uno column
     *
     * Example usage:
     * <code>
     * $query->filterByArchivoUno('fooValue');   // WHERE archivo_uno = 'fooValue'
     * $query->filterByArchivoUno('%fooValue%'); // WHERE archivo_uno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $archivoUno The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterByArchivoUno($archivoUno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($archivoUno)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $archivoUno)) {
                $archivoUno = str_replace('*', '%', $archivoUno);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SolicitudVacacionPeer::ARCHIVO_UNO, $archivoUno, $comparison);
    }

    /**
     * Filter the query on the archivo_dos column
     *
     * Example usage:
     * <code>
     * $query->filterByArchivoDos('fooValue');   // WHERE archivo_dos = 'fooValue'
     * $query->filterByArchivoDos('%fooValue%'); // WHERE archivo_dos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $archivoDos The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function filterByArchivoDos($archivoDos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($archivoDos)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $archivoDos)) {
                $archivoDos = str_replace('*', '%', $archivoDos);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SolicitudVacacionPeer::ARCHIVO_DOS, $archivoDos, $comparison);
    }

    /**
     * Filter the query by a related Usuario object
     *
     * @param   Usuario|PropelObjectCollection $usuario The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SolicitudVacacionQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByUsuario($usuario, $comparison = null)
    {
        if ($usuario instanceof Usuario) {
            return $this
                ->addUsingAlias(SolicitudVacacionPeer::USUARIO_ID, $usuario->getId(), $comparison);
        } elseif ($usuario instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SolicitudVacacionPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return SolicitudVacacionQuery The current query, for fluid interface
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
     * @param   SolicitudVacacion $solicitudVacacion Object to remove from the list of results
     *
     * @return SolicitudVacacionQuery The current query, for fluid interface
     */
    public function prune($solicitudVacacion = null)
    {
        if ($solicitudVacacion) {
            $this->addUsingAlias(SolicitudVacacionPeer::ID, $solicitudVacacion->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
