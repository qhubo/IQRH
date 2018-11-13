<?php


/**
 * Base class that represents a query for the 'aumento_usuario' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 11/14/18 00:00:57
 *
 * @method AumentoUsuarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method AumentoUsuarioQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method AumentoUsuarioQuery orderByFechaAumento($order = Criteria::ASC) Order by the fecha_aumento column
 * @method AumentoUsuarioQuery orderBySueldoAnterior($order = Criteria::ASC) Order by the sueldo_anterior column
 * @method AumentoUsuarioQuery orderByPuestoAnterior($order = Criteria::ASC) Order by the puesto_anterior column
 * @method AumentoUsuarioQuery orderBySueldo($order = Criteria::ASC) Order by the sueldo column
 * @method AumentoUsuarioQuery orderByNuevoPuesto($order = Criteria::ASC) Order by the nuevo_puesto column
 * @method AumentoUsuarioQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method AumentoUsuarioQuery orderByArchivoUno($order = Criteria::ASC) Order by the archivo_uno column
 * @method AumentoUsuarioQuery orderByArchivoDos($order = Criteria::ASC) Order by the archivo_dos column
 *
 * @method AumentoUsuarioQuery groupById() Group by the id column
 * @method AumentoUsuarioQuery groupByUsuarioId() Group by the usuario_id column
 * @method AumentoUsuarioQuery groupByFechaAumento() Group by the fecha_aumento column
 * @method AumentoUsuarioQuery groupBySueldoAnterior() Group by the sueldo_anterior column
 * @method AumentoUsuarioQuery groupByPuestoAnterior() Group by the puesto_anterior column
 * @method AumentoUsuarioQuery groupBySueldo() Group by the sueldo column
 * @method AumentoUsuarioQuery groupByNuevoPuesto() Group by the nuevo_puesto column
 * @method AumentoUsuarioQuery groupByObservaciones() Group by the observaciones column
 * @method AumentoUsuarioQuery groupByArchivoUno() Group by the archivo_uno column
 * @method AumentoUsuarioQuery groupByArchivoDos() Group by the archivo_dos column
 *
 * @method AumentoUsuarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AumentoUsuarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AumentoUsuarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AumentoUsuarioQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method AumentoUsuarioQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method AumentoUsuarioQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method AumentoUsuario findOne(PropelPDO $con = null) Return the first AumentoUsuario matching the query
 * @method AumentoUsuario findOneOrCreate(PropelPDO $con = null) Return the first AumentoUsuario matching the query, or a new AumentoUsuario object populated from the query conditions when no match is found
 *
 * @method AumentoUsuario findOneById(int $id) Return the first AumentoUsuario filtered by the id column
 * @method AumentoUsuario findOneByUsuarioId(int $usuario_id) Return the first AumentoUsuario filtered by the usuario_id column
 * @method AumentoUsuario findOneByFechaAumento(string $fecha_aumento) Return the first AumentoUsuario filtered by the fecha_aumento column
 * @method AumentoUsuario findOneBySueldoAnterior(double $sueldo_anterior) Return the first AumentoUsuario filtered by the sueldo_anterior column
 * @method AumentoUsuario findOneByPuestoAnterior(string $puesto_anterior) Return the first AumentoUsuario filtered by the puesto_anterior column
 * @method AumentoUsuario findOneBySueldo(double $sueldo) Return the first AumentoUsuario filtered by the sueldo column
 * @method AumentoUsuario findOneByNuevoPuesto(string $nuevo_puesto) Return the first AumentoUsuario filtered by the nuevo_puesto column
 * @method AumentoUsuario findOneByObservaciones(string $observaciones) Return the first AumentoUsuario filtered by the observaciones column
 * @method AumentoUsuario findOneByArchivoUno(string $archivo_uno) Return the first AumentoUsuario filtered by the archivo_uno column
 * @method AumentoUsuario findOneByArchivoDos(string $archivo_dos) Return the first AumentoUsuario filtered by the archivo_dos column
 *
 * @method array findById(int $id) Return AumentoUsuario objects filtered by the id column
 * @method array findByUsuarioId(int $usuario_id) Return AumentoUsuario objects filtered by the usuario_id column
 * @method array findByFechaAumento(string $fecha_aumento) Return AumentoUsuario objects filtered by the fecha_aumento column
 * @method array findBySueldoAnterior(double $sueldo_anterior) Return AumentoUsuario objects filtered by the sueldo_anterior column
 * @method array findByPuestoAnterior(string $puesto_anterior) Return AumentoUsuario objects filtered by the puesto_anterior column
 * @method array findBySueldo(double $sueldo) Return AumentoUsuario objects filtered by the sueldo column
 * @method array findByNuevoPuesto(string $nuevo_puesto) Return AumentoUsuario objects filtered by the nuevo_puesto column
 * @method array findByObservaciones(string $observaciones) Return AumentoUsuario objects filtered by the observaciones column
 * @method array findByArchivoUno(string $archivo_uno) Return AumentoUsuario objects filtered by the archivo_uno column
 * @method array findByArchivoDos(string $archivo_dos) Return AumentoUsuario objects filtered by the archivo_dos column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAumentoUsuarioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAumentoUsuarioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'AumentoUsuario', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AumentoUsuarioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     AumentoUsuarioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AumentoUsuarioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AumentoUsuarioQuery) {
            return $criteria;
        }
        $query = new AumentoUsuarioQuery();
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
     * @return   AumentoUsuario|AumentoUsuario[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AumentoUsuarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AumentoUsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   AumentoUsuario A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USUARIO_ID`, `FECHA_AUMENTO`, `SUELDO_ANTERIOR`, `PUESTO_ANTERIOR`, `SUELDO`, `NUEVO_PUESTO`, `OBSERVACIONES`, `ARCHIVO_UNO`, `ARCHIVO_DOS` FROM `aumento_usuario` WHERE `ID` = :p0';
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
            $obj = new AumentoUsuario();
            $obj->hydrate($row);
            AumentoUsuarioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AumentoUsuario|AumentoUsuario[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AumentoUsuario[]|mixed the list of results, formatted by the current formatter
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
     * @return AumentoUsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AumentoUsuarioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AumentoUsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AumentoUsuarioPeer::ID, $keys, Criteria::IN);
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
     * @return AumentoUsuarioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(AumentoUsuarioPeer::ID, $id, $comparison);
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
     * @return AumentoUsuarioQuery The current query, for fluid interface
     */
    public function filterByUsuarioId($usuarioId = null, $comparison = null)
    {
        if (is_array($usuarioId)) {
            $useMinMax = false;
            if (isset($usuarioId['min'])) {
                $this->addUsingAlias(AumentoUsuarioPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioId['max'])) {
                $this->addUsingAlias(AumentoUsuarioPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AumentoUsuarioPeer::USUARIO_ID, $usuarioId, $comparison);
    }

    /**
     * Filter the query on the fecha_aumento column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaAumento('2011-03-14'); // WHERE fecha_aumento = '2011-03-14'
     * $query->filterByFechaAumento('now'); // WHERE fecha_aumento = '2011-03-14'
     * $query->filterByFechaAumento(array('max' => 'yesterday')); // WHERE fecha_aumento > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaAumento The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AumentoUsuarioQuery The current query, for fluid interface
     */
    public function filterByFechaAumento($fechaAumento = null, $comparison = null)
    {
        if (is_array($fechaAumento)) {
            $useMinMax = false;
            if (isset($fechaAumento['min'])) {
                $this->addUsingAlias(AumentoUsuarioPeer::FECHA_AUMENTO, $fechaAumento['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaAumento['max'])) {
                $this->addUsingAlias(AumentoUsuarioPeer::FECHA_AUMENTO, $fechaAumento['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AumentoUsuarioPeer::FECHA_AUMENTO, $fechaAumento, $comparison);
    }

    /**
     * Filter the query on the sueldo_anterior column
     *
     * Example usage:
     * <code>
     * $query->filterBySueldoAnterior(1234); // WHERE sueldo_anterior = 1234
     * $query->filterBySueldoAnterior(array(12, 34)); // WHERE sueldo_anterior IN (12, 34)
     * $query->filterBySueldoAnterior(array('min' => 12)); // WHERE sueldo_anterior > 12
     * </code>
     *
     * @param     mixed $sueldoAnterior The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AumentoUsuarioQuery The current query, for fluid interface
     */
    public function filterBySueldoAnterior($sueldoAnterior = null, $comparison = null)
    {
        if (is_array($sueldoAnterior)) {
            $useMinMax = false;
            if (isset($sueldoAnterior['min'])) {
                $this->addUsingAlias(AumentoUsuarioPeer::SUELDO_ANTERIOR, $sueldoAnterior['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sueldoAnterior['max'])) {
                $this->addUsingAlias(AumentoUsuarioPeer::SUELDO_ANTERIOR, $sueldoAnterior['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AumentoUsuarioPeer::SUELDO_ANTERIOR, $sueldoAnterior, $comparison);
    }

    /**
     * Filter the query on the puesto_anterior column
     *
     * Example usage:
     * <code>
     * $query->filterByPuestoAnterior('fooValue');   // WHERE puesto_anterior = 'fooValue'
     * $query->filterByPuestoAnterior('%fooValue%'); // WHERE puesto_anterior LIKE '%fooValue%'
     * </code>
     *
     * @param     string $puestoAnterior The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AumentoUsuarioQuery The current query, for fluid interface
     */
    public function filterByPuestoAnterior($puestoAnterior = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($puestoAnterior)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $puestoAnterior)) {
                $puestoAnterior = str_replace('*', '%', $puestoAnterior);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AumentoUsuarioPeer::PUESTO_ANTERIOR, $puestoAnterior, $comparison);
    }

    /**
     * Filter the query on the sueldo column
     *
     * Example usage:
     * <code>
     * $query->filterBySueldo(1234); // WHERE sueldo = 1234
     * $query->filterBySueldo(array(12, 34)); // WHERE sueldo IN (12, 34)
     * $query->filterBySueldo(array('min' => 12)); // WHERE sueldo > 12
     * </code>
     *
     * @param     mixed $sueldo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AumentoUsuarioQuery The current query, for fluid interface
     */
    public function filterBySueldo($sueldo = null, $comparison = null)
    {
        if (is_array($sueldo)) {
            $useMinMax = false;
            if (isset($sueldo['min'])) {
                $this->addUsingAlias(AumentoUsuarioPeer::SUELDO, $sueldo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sueldo['max'])) {
                $this->addUsingAlias(AumentoUsuarioPeer::SUELDO, $sueldo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AumentoUsuarioPeer::SUELDO, $sueldo, $comparison);
    }

    /**
     * Filter the query on the nuevo_puesto column
     *
     * Example usage:
     * <code>
     * $query->filterByNuevoPuesto('fooValue');   // WHERE nuevo_puesto = 'fooValue'
     * $query->filterByNuevoPuesto('%fooValue%'); // WHERE nuevo_puesto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nuevoPuesto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AumentoUsuarioQuery The current query, for fluid interface
     */
    public function filterByNuevoPuesto($nuevoPuesto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nuevoPuesto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nuevoPuesto)) {
                $nuevoPuesto = str_replace('*', '%', $nuevoPuesto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AumentoUsuarioPeer::NUEVO_PUESTO, $nuevoPuesto, $comparison);
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
     * @return AumentoUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AumentoUsuarioPeer::OBSERVACIONES, $observaciones, $comparison);
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
     * @return AumentoUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AumentoUsuarioPeer::ARCHIVO_UNO, $archivoUno, $comparison);
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
     * @return AumentoUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AumentoUsuarioPeer::ARCHIVO_DOS, $archivoDos, $comparison);
    }

    /**
     * Filter the query by a related Usuario object
     *
     * @param   Usuario|PropelObjectCollection $usuario The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AumentoUsuarioQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByUsuario($usuario, $comparison = null)
    {
        if ($usuario instanceof Usuario) {
            return $this
                ->addUsingAlias(AumentoUsuarioPeer::USUARIO_ID, $usuario->getId(), $comparison);
        } elseif ($usuario instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AumentoUsuarioPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return AumentoUsuarioQuery The current query, for fluid interface
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
     * @param   AumentoUsuario $aumentoUsuario Object to remove from the list of results
     *
     * @return AumentoUsuarioQuery The current query, for fluid interface
     */
    public function prune($aumentoUsuario = null)
    {
        if ($aumentoUsuario) {
            $this->addUsingAlias(AumentoUsuarioPeer::ID, $aumentoUsuario->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
