<?php


/**
 * Base class that represents a query for the 'recibo_detalle' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 06/18/19 05:13:10
 *
 * @method ReciboDetalleQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ReciboDetalleQuery orderByIdC($order = Criteria::ASC) Order by the id_c column
 * @method ReciboDetalleQuery orderByPlanillaResumenId($order = Criteria::ASC) Order by the planilla_resumen_id column
 * @method ReciboDetalleQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method ReciboDetalleQuery orderByAfecaSs($order = Criteria::ASC) Order by the afeca_ss column
 * @method ReciboDetalleQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method ReciboDetalleQuery orderByMonto($order = Criteria::ASC) Order by the monto column
 * @method ReciboDetalleQuery orderByDebe($order = Criteria::ASC) Order by the debe column
 * @method ReciboDetalleQuery orderByHaber($order = Criteria::ASC) Order by the haber column
 * @method ReciboDetalleQuery orderByIdentificar($order = Criteria::ASC) Order by the identificar column
 * @method ReciboDetalleQuery orderByCabeceraIn($order = Criteria::ASC) Order by the cabecera_in column
 *
 * @method ReciboDetalleQuery groupById() Group by the id column
 * @method ReciboDetalleQuery groupByIdC() Group by the id_c column
 * @method ReciboDetalleQuery groupByPlanillaResumenId() Group by the planilla_resumen_id column
 * @method ReciboDetalleQuery groupByTipo() Group by the tipo column
 * @method ReciboDetalleQuery groupByAfecaSs() Group by the afeca_ss column
 * @method ReciboDetalleQuery groupByDescripcion() Group by the descripcion column
 * @method ReciboDetalleQuery groupByMonto() Group by the monto column
 * @method ReciboDetalleQuery groupByDebe() Group by the debe column
 * @method ReciboDetalleQuery groupByHaber() Group by the haber column
 * @method ReciboDetalleQuery groupByIdentificar() Group by the identificar column
 * @method ReciboDetalleQuery groupByCabeceraIn() Group by the cabecera_in column
 *
 * @method ReciboDetalleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ReciboDetalleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ReciboDetalleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ReciboDetalle findOne(PropelPDO $con = null) Return the first ReciboDetalle matching the query
 * @method ReciboDetalle findOneOrCreate(PropelPDO $con = null) Return the first ReciboDetalle matching the query, or a new ReciboDetalle object populated from the query conditions when no match is found
 *
 * @method ReciboDetalle findOneById(int $id) Return the first ReciboDetalle filtered by the id column
 * @method ReciboDetalle findOneByIdC(int $id_c) Return the first ReciboDetalle filtered by the id_c column
 * @method ReciboDetalle findOneByPlanillaResumenId(int $planilla_resumen_id) Return the first ReciboDetalle filtered by the planilla_resumen_id column
 * @method ReciboDetalle findOneByTipo(string $tipo) Return the first ReciboDetalle filtered by the tipo column
 * @method ReciboDetalle findOneByAfecaSs(int $afeca_ss) Return the first ReciboDetalle filtered by the afeca_ss column
 * @method ReciboDetalle findOneByDescripcion(string $descripcion) Return the first ReciboDetalle filtered by the descripcion column
 * @method ReciboDetalle findOneByMonto(double $monto) Return the first ReciboDetalle filtered by the monto column
 * @method ReciboDetalle findOneByDebe(double $debe) Return the first ReciboDetalle filtered by the debe column
 * @method ReciboDetalle findOneByHaber(double $haber) Return the first ReciboDetalle filtered by the haber column
 * @method ReciboDetalle findOneByIdentificar(string $identificar) Return the first ReciboDetalle filtered by the identificar column
 * @method ReciboDetalle findOneByCabeceraIn(int $cabecera_in) Return the first ReciboDetalle filtered by the cabecera_in column
 *
 * @method array findById(int $id) Return ReciboDetalle objects filtered by the id column
 * @method array findByIdC(int $id_c) Return ReciboDetalle objects filtered by the id_c column
 * @method array findByPlanillaResumenId(int $planilla_resumen_id) Return ReciboDetalle objects filtered by the planilla_resumen_id column
 * @method array findByTipo(string $tipo) Return ReciboDetalle objects filtered by the tipo column
 * @method array findByAfecaSs(int $afeca_ss) Return ReciboDetalle objects filtered by the afeca_ss column
 * @method array findByDescripcion(string $descripcion) Return ReciboDetalle objects filtered by the descripcion column
 * @method array findByMonto(double $monto) Return ReciboDetalle objects filtered by the monto column
 * @method array findByDebe(double $debe) Return ReciboDetalle objects filtered by the debe column
 * @method array findByHaber(double $haber) Return ReciboDetalle objects filtered by the haber column
 * @method array findByIdentificar(string $identificar) Return ReciboDetalle objects filtered by the identificar column
 * @method array findByCabeceraIn(int $cabecera_in) Return ReciboDetalle objects filtered by the cabecera_in column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseReciboDetalleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseReciboDetalleQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'ReciboDetalle', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ReciboDetalleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ReciboDetalleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ReciboDetalleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ReciboDetalleQuery) {
            return $criteria;
        }
        $query = new ReciboDetalleQuery();
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
     * @return   ReciboDetalle|ReciboDetalle[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ReciboDetallePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ReciboDetallePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ReciboDetalle A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `ID_C`, `PLANILLA_RESUMEN_ID`, `TIPO`, `AFECA_SS`, `DESCRIPCION`, `MONTO`, `DEBE`, `HABER`, `IDENTIFICAR`, `CABECERA_IN` FROM `recibo_detalle` WHERE `ID` = :p0';
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
            $obj = new ReciboDetalle();
            $obj->hydrate($row);
            ReciboDetallePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ReciboDetalle|ReciboDetalle[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ReciboDetalle[]|mixed the list of results, formatted by the current formatter
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
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ReciboDetallePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ReciboDetallePeer::ID, $keys, Criteria::IN);
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
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ReciboDetallePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the id_c column
     *
     * Example usage:
     * <code>
     * $query->filterByIdC(1234); // WHERE id_c = 1234
     * $query->filterByIdC(array(12, 34)); // WHERE id_c IN (12, 34)
     * $query->filterByIdC(array('min' => 12)); // WHERE id_c > 12
     * </code>
     *
     * @param     mixed $idC The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterByIdC($idC = null, $comparison = null)
    {
        if (is_array($idC)) {
            $useMinMax = false;
            if (isset($idC['min'])) {
                $this->addUsingAlias(ReciboDetallePeer::ID_C, $idC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idC['max'])) {
                $this->addUsingAlias(ReciboDetallePeer::ID_C, $idC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReciboDetallePeer::ID_C, $idC, $comparison);
    }

    /**
     * Filter the query on the planilla_resumen_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPlanillaResumenId(1234); // WHERE planilla_resumen_id = 1234
     * $query->filterByPlanillaResumenId(array(12, 34)); // WHERE planilla_resumen_id IN (12, 34)
     * $query->filterByPlanillaResumenId(array('min' => 12)); // WHERE planilla_resumen_id > 12
     * </code>
     *
     * @param     mixed $planillaResumenId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterByPlanillaResumenId($planillaResumenId = null, $comparison = null)
    {
        if (is_array($planillaResumenId)) {
            $useMinMax = false;
            if (isset($planillaResumenId['min'])) {
                $this->addUsingAlias(ReciboDetallePeer::PLANILLA_RESUMEN_ID, $planillaResumenId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($planillaResumenId['max'])) {
                $this->addUsingAlias(ReciboDetallePeer::PLANILLA_RESUMEN_ID, $planillaResumenId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReciboDetallePeer::PLANILLA_RESUMEN_ID, $planillaResumenId, $comparison);
    }

    /**
     * Filter the query on the tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo('fooValue');   // WHERE tipo = 'fooValue'
     * $query->filterByTipo('%fooValue%'); // WHERE tipo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterByTipo($tipo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tipo)) {
                $tipo = str_replace('*', '%', $tipo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboDetallePeer::TIPO, $tipo, $comparison);
    }

    /**
     * Filter the query on the afeca_ss column
     *
     * Example usage:
     * <code>
     * $query->filterByAfecaSs(1234); // WHERE afeca_ss = 1234
     * $query->filterByAfecaSs(array(12, 34)); // WHERE afeca_ss IN (12, 34)
     * $query->filterByAfecaSs(array('min' => 12)); // WHERE afeca_ss > 12
     * </code>
     *
     * @param     mixed $afecaSs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterByAfecaSs($afecaSs = null, $comparison = null)
    {
        if (is_array($afecaSs)) {
            $useMinMax = false;
            if (isset($afecaSs['min'])) {
                $this->addUsingAlias(ReciboDetallePeer::AFECA_SS, $afecaSs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($afecaSs['max'])) {
                $this->addUsingAlias(ReciboDetallePeer::AFECA_SS, $afecaSs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReciboDetallePeer::AFECA_SS, $afecaSs, $comparison);
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
     * @return ReciboDetalleQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ReciboDetallePeer::DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the monto column
     *
     * Example usage:
     * <code>
     * $query->filterByMonto(1234); // WHERE monto = 1234
     * $query->filterByMonto(array(12, 34)); // WHERE monto IN (12, 34)
     * $query->filterByMonto(array('min' => 12)); // WHERE monto > 12
     * </code>
     *
     * @param     mixed $monto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterByMonto($monto = null, $comparison = null)
    {
        if (is_array($monto)) {
            $useMinMax = false;
            if (isset($monto['min'])) {
                $this->addUsingAlias(ReciboDetallePeer::MONTO, $monto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($monto['max'])) {
                $this->addUsingAlias(ReciboDetallePeer::MONTO, $monto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReciboDetallePeer::MONTO, $monto, $comparison);
    }

    /**
     * Filter the query on the debe column
     *
     * Example usage:
     * <code>
     * $query->filterByDebe(1234); // WHERE debe = 1234
     * $query->filterByDebe(array(12, 34)); // WHERE debe IN (12, 34)
     * $query->filterByDebe(array('min' => 12)); // WHERE debe > 12
     * </code>
     *
     * @param     mixed $debe The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterByDebe($debe = null, $comparison = null)
    {
        if (is_array($debe)) {
            $useMinMax = false;
            if (isset($debe['min'])) {
                $this->addUsingAlias(ReciboDetallePeer::DEBE, $debe['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($debe['max'])) {
                $this->addUsingAlias(ReciboDetallePeer::DEBE, $debe['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReciboDetallePeer::DEBE, $debe, $comparison);
    }

    /**
     * Filter the query on the haber column
     *
     * Example usage:
     * <code>
     * $query->filterByHaber(1234); // WHERE haber = 1234
     * $query->filterByHaber(array(12, 34)); // WHERE haber IN (12, 34)
     * $query->filterByHaber(array('min' => 12)); // WHERE haber > 12
     * </code>
     *
     * @param     mixed $haber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterByHaber($haber = null, $comparison = null)
    {
        if (is_array($haber)) {
            $useMinMax = false;
            if (isset($haber['min'])) {
                $this->addUsingAlias(ReciboDetallePeer::HABER, $haber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($haber['max'])) {
                $this->addUsingAlias(ReciboDetallePeer::HABER, $haber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReciboDetallePeer::HABER, $haber, $comparison);
    }

    /**
     * Filter the query on the identificar column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentificar('fooValue');   // WHERE identificar = 'fooValue'
     * $query->filterByIdentificar('%fooValue%'); // WHERE identificar LIKE '%fooValue%'
     * </code>
     *
     * @param     string $identificar The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterByIdentificar($identificar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($identificar)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $identificar)) {
                $identificar = str_replace('*', '%', $identificar);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboDetallePeer::IDENTIFICAR, $identificar, $comparison);
    }

    /**
     * Filter the query on the cabecera_in column
     *
     * Example usage:
     * <code>
     * $query->filterByCabeceraIn(1234); // WHERE cabecera_in = 1234
     * $query->filterByCabeceraIn(array(12, 34)); // WHERE cabecera_in IN (12, 34)
     * $query->filterByCabeceraIn(array('min' => 12)); // WHERE cabecera_in > 12
     * </code>
     *
     * @param     mixed $cabeceraIn The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function filterByCabeceraIn($cabeceraIn = null, $comparison = null)
    {
        if (is_array($cabeceraIn)) {
            $useMinMax = false;
            if (isset($cabeceraIn['min'])) {
                $this->addUsingAlias(ReciboDetallePeer::CABECERA_IN, $cabeceraIn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cabeceraIn['max'])) {
                $this->addUsingAlias(ReciboDetallePeer::CABECERA_IN, $cabeceraIn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReciboDetallePeer::CABECERA_IN, $cabeceraIn, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ReciboDetalle $reciboDetalle Object to remove from the list of results
     *
     * @return ReciboDetalleQuery The current query, for fluid interface
     */
    public function prune($reciboDetalle = null)
    {
        if ($reciboDetalle) {
            $this->addUsingAlias(ReciboDetallePeer::ID, $reciboDetalle->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
