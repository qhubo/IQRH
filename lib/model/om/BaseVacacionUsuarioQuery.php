<?php


/**
 * Base class that represents a query for the 'vacacion_usuario' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 11/28/18 19:31:08
 *
 * @method VacacionUsuarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method VacacionUsuarioQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method VacacionUsuarioQuery orderByPeriodo($order = Criteria::ASC) Order by the periodo column
 * @method VacacionUsuarioQuery orderByFechaInicio($order = Criteria::ASC) Order by the fecha_inicio column
 * @method VacacionUsuarioQuery orderByFechaFin($order = Criteria::ASC) Order by the fecha_fin column
 * @method VacacionUsuarioQuery orderByValor($order = Criteria::ASC) Order by the valor column
 * @method VacacionUsuarioQuery orderByDias($order = Criteria::ASC) Order by the dias column
 * @method VacacionUsuarioQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method VacacionUsuarioQuery orderByArchivoUno($order = Criteria::ASC) Order by the archivo_uno column
 * @method VacacionUsuarioQuery orderByArchivoDos($order = Criteria::ASC) Order by the archivo_dos column
 *
 * @method VacacionUsuarioQuery groupById() Group by the id column
 * @method VacacionUsuarioQuery groupByUsuarioId() Group by the usuario_id column
 * @method VacacionUsuarioQuery groupByPeriodo() Group by the periodo column
 * @method VacacionUsuarioQuery groupByFechaInicio() Group by the fecha_inicio column
 * @method VacacionUsuarioQuery groupByFechaFin() Group by the fecha_fin column
 * @method VacacionUsuarioQuery groupByValor() Group by the valor column
 * @method VacacionUsuarioQuery groupByDias() Group by the dias column
 * @method VacacionUsuarioQuery groupByObservaciones() Group by the observaciones column
 * @method VacacionUsuarioQuery groupByArchivoUno() Group by the archivo_uno column
 * @method VacacionUsuarioQuery groupByArchivoDos() Group by the archivo_dos column
 *
 * @method VacacionUsuarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VacacionUsuarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VacacionUsuarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method VacacionUsuarioQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method VacacionUsuarioQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method VacacionUsuarioQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method VacacionUsuario findOne(PropelPDO $con = null) Return the first VacacionUsuario matching the query
 * @method VacacionUsuario findOneOrCreate(PropelPDO $con = null) Return the first VacacionUsuario matching the query, or a new VacacionUsuario object populated from the query conditions when no match is found
 *
 * @method VacacionUsuario findOneById(int $id) Return the first VacacionUsuario filtered by the id column
 * @method VacacionUsuario findOneByUsuarioId(int $usuario_id) Return the first VacacionUsuario filtered by the usuario_id column
 * @method VacacionUsuario findOneByPeriodo(int $periodo) Return the first VacacionUsuario filtered by the periodo column
 * @method VacacionUsuario findOneByFechaInicio(string $fecha_inicio) Return the first VacacionUsuario filtered by the fecha_inicio column
 * @method VacacionUsuario findOneByFechaFin(string $fecha_fin) Return the first VacacionUsuario filtered by the fecha_fin column
 * @method VacacionUsuario findOneByValor(double $valor) Return the first VacacionUsuario filtered by the valor column
 * @method VacacionUsuario findOneByDias(int $dias) Return the first VacacionUsuario filtered by the dias column
 * @method VacacionUsuario findOneByObservaciones(string $observaciones) Return the first VacacionUsuario filtered by the observaciones column
 * @method VacacionUsuario findOneByArchivoUno(string $archivo_uno) Return the first VacacionUsuario filtered by the archivo_uno column
 * @method VacacionUsuario findOneByArchivoDos(string $archivo_dos) Return the first VacacionUsuario filtered by the archivo_dos column
 *
 * @method array findById(int $id) Return VacacionUsuario objects filtered by the id column
 * @method array findByUsuarioId(int $usuario_id) Return VacacionUsuario objects filtered by the usuario_id column
 * @method array findByPeriodo(int $periodo) Return VacacionUsuario objects filtered by the periodo column
 * @method array findByFechaInicio(string $fecha_inicio) Return VacacionUsuario objects filtered by the fecha_inicio column
 * @method array findByFechaFin(string $fecha_fin) Return VacacionUsuario objects filtered by the fecha_fin column
 * @method array findByValor(double $valor) Return VacacionUsuario objects filtered by the valor column
 * @method array findByDias(int $dias) Return VacacionUsuario objects filtered by the dias column
 * @method array findByObservaciones(string $observaciones) Return VacacionUsuario objects filtered by the observaciones column
 * @method array findByArchivoUno(string $archivo_uno) Return VacacionUsuario objects filtered by the archivo_uno column
 * @method array findByArchivoDos(string $archivo_dos) Return VacacionUsuario objects filtered by the archivo_dos column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseVacacionUsuarioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVacacionUsuarioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'VacacionUsuario', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VacacionUsuarioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     VacacionUsuarioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VacacionUsuarioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VacacionUsuarioQuery) {
            return $criteria;
        }
        $query = new VacacionUsuarioQuery();
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
     * @return   VacacionUsuario|VacacionUsuario[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VacacionUsuarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VacacionUsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   VacacionUsuario A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USUARIO_ID`, `PERIODO`, `FECHA_INICIO`, `FECHA_FIN`, `VALOR`, `DIAS`, `OBSERVACIONES`, `ARCHIVO_UNO`, `ARCHIVO_DOS` FROM `vacacion_usuario` WHERE `ID` = :p0';
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
            $obj = new VacacionUsuario();
            $obj->hydrate($row);
            VacacionUsuarioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return VacacionUsuario|VacacionUsuario[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|VacacionUsuario[]|mixed the list of results, formatted by the current formatter
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
     * @return VacacionUsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VacacionUsuarioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VacacionUsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VacacionUsuarioPeer::ID, $keys, Criteria::IN);
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
     * @return VacacionUsuarioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(VacacionUsuarioPeer::ID, $id, $comparison);
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
     * @return VacacionUsuarioQuery The current query, for fluid interface
     */
    public function filterByUsuarioId($usuarioId = null, $comparison = null)
    {
        if (is_array($usuarioId)) {
            $useMinMax = false;
            if (isset($usuarioId['min'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioId['max'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VacacionUsuarioPeer::USUARIO_ID, $usuarioId, $comparison);
    }

    /**
     * Filter the query on the periodo column
     *
     * Example usage:
     * <code>
     * $query->filterByPeriodo(1234); // WHERE periodo = 1234
     * $query->filterByPeriodo(array(12, 34)); // WHERE periodo IN (12, 34)
     * $query->filterByPeriodo(array('min' => 12)); // WHERE periodo > 12
     * </code>
     *
     * @param     mixed $periodo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VacacionUsuarioQuery The current query, for fluid interface
     */
    public function filterByPeriodo($periodo = null, $comparison = null)
    {
        if (is_array($periodo)) {
            $useMinMax = false;
            if (isset($periodo['min'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::PERIODO, $periodo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($periodo['max'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::PERIODO, $periodo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VacacionUsuarioPeer::PERIODO, $periodo, $comparison);
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
     * @return VacacionUsuarioQuery The current query, for fluid interface
     */
    public function filterByFechaInicio($fechaInicio = null, $comparison = null)
    {
        if (is_array($fechaInicio)) {
            $useMinMax = false;
            if (isset($fechaInicio['min'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::FECHA_INICIO, $fechaInicio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaInicio['max'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::FECHA_INICIO, $fechaInicio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VacacionUsuarioPeer::FECHA_INICIO, $fechaInicio, $comparison);
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
     * @return VacacionUsuarioQuery The current query, for fluid interface
     */
    public function filterByFechaFin($fechaFin = null, $comparison = null)
    {
        if (is_array($fechaFin)) {
            $useMinMax = false;
            if (isset($fechaFin['min'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::FECHA_FIN, $fechaFin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaFin['max'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::FECHA_FIN, $fechaFin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VacacionUsuarioPeer::FECHA_FIN, $fechaFin, $comparison);
    }

    /**
     * Filter the query on the valor column
     *
     * Example usage:
     * <code>
     * $query->filterByValor(1234); // WHERE valor = 1234
     * $query->filterByValor(array(12, 34)); // WHERE valor IN (12, 34)
     * $query->filterByValor(array('min' => 12)); // WHERE valor > 12
     * </code>
     *
     * @param     mixed $valor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VacacionUsuarioQuery The current query, for fluid interface
     */
    public function filterByValor($valor = null, $comparison = null)
    {
        if (is_array($valor)) {
            $useMinMax = false;
            if (isset($valor['min'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::VALOR, $valor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($valor['max'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::VALOR, $valor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VacacionUsuarioPeer::VALOR, $valor, $comparison);
    }

    /**
     * Filter the query on the dias column
     *
     * Example usage:
     * <code>
     * $query->filterByDias(1234); // WHERE dias = 1234
     * $query->filterByDias(array(12, 34)); // WHERE dias IN (12, 34)
     * $query->filterByDias(array('min' => 12)); // WHERE dias > 12
     * </code>
     *
     * @param     mixed $dias The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VacacionUsuarioQuery The current query, for fluid interface
     */
    public function filterByDias($dias = null, $comparison = null)
    {
        if (is_array($dias)) {
            $useMinMax = false;
            if (isset($dias['min'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::DIAS, $dias['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dias['max'])) {
                $this->addUsingAlias(VacacionUsuarioPeer::DIAS, $dias['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VacacionUsuarioPeer::DIAS, $dias, $comparison);
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
     * @return VacacionUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VacacionUsuarioPeer::OBSERVACIONES, $observaciones, $comparison);
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
     * @return VacacionUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VacacionUsuarioPeer::ARCHIVO_UNO, $archivoUno, $comparison);
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
     * @return VacacionUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VacacionUsuarioPeer::ARCHIVO_DOS, $archivoDos, $comparison);
    }

    /**
     * Filter the query by a related Usuario object
     *
     * @param   Usuario|PropelObjectCollection $usuario The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   VacacionUsuarioQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByUsuario($usuario, $comparison = null)
    {
        if ($usuario instanceof Usuario) {
            return $this
                ->addUsingAlias(VacacionUsuarioPeer::USUARIO_ID, $usuario->getId(), $comparison);
        } elseif ($usuario instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VacacionUsuarioPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return VacacionUsuarioQuery The current query, for fluid interface
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
     * @param   VacacionUsuario $vacacionUsuario Object to remove from the list of results
     *
     * @return VacacionUsuarioQuery The current query, for fluid interface
     */
    public function prune($vacacionUsuario = null)
    {
        if ($vacacionUsuario) {
            $this->addUsingAlias(VacacionUsuarioPeer::ID, $vacacionUsuario->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
