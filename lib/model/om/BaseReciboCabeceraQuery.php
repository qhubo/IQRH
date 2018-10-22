<?php


/**
 * Base class that represents a query for the 'recibo_cabecera' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 10/22/18 22:23:20
 *
 * @method ReciboCabeceraQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ReciboCabeceraQuery orderByPlanilla($order = Criteria::ASC) Order by the planilla column
 * @method ReciboCabeceraQuery orderByInicio($order = Criteria::ASC) Order by the inicio column
 * @method ReciboCabeceraQuery orderByFin($order = Criteria::ASC) Order by the fin column
 * @method ReciboCabeceraQuery orderByProyecto($order = Criteria::ASC) Order by the proyecto column
 * @method ReciboCabeceraQuery orderByEmpresa($order = Criteria::ASC) Order by the empresa column
 * @method ReciboCabeceraQuery orderByRazonSocial($order = Criteria::ASC) Order by the razon_social column
 * @method ReciboCabeceraQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method ReciboCabeceraQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method ReciboCabeceraQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method ReciboCabeceraQuery orderByNombreComercial($order = Criteria::ASC) Order by the nombre_comercial column
 * @method ReciboCabeceraQuery orderByTexto($order = Criteria::ASC) Order by the texto column
 * @method ReciboCabeceraQuery orderByCabeceraIn($order = Criteria::ASC) Order by the cabecera_in column
 *
 * @method ReciboCabeceraQuery groupById() Group by the id column
 * @method ReciboCabeceraQuery groupByPlanilla() Group by the planilla column
 * @method ReciboCabeceraQuery groupByInicio() Group by the inicio column
 * @method ReciboCabeceraQuery groupByFin() Group by the fin column
 * @method ReciboCabeceraQuery groupByProyecto() Group by the proyecto column
 * @method ReciboCabeceraQuery groupByEmpresa() Group by the empresa column
 * @method ReciboCabeceraQuery groupByRazonSocial() Group by the razon_social column
 * @method ReciboCabeceraQuery groupByDireccion() Group by the direccion column
 * @method ReciboCabeceraQuery groupByEmail() Group by the email column
 * @method ReciboCabeceraQuery groupByTelefono() Group by the telefono column
 * @method ReciboCabeceraQuery groupByNombreComercial() Group by the nombre_comercial column
 * @method ReciboCabeceraQuery groupByTexto() Group by the texto column
 * @method ReciboCabeceraQuery groupByCabeceraIn() Group by the cabecera_in column
 *
 * @method ReciboCabeceraQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ReciboCabeceraQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ReciboCabeceraQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ReciboCabecera findOne(PropelPDO $con = null) Return the first ReciboCabecera matching the query
 * @method ReciboCabecera findOneOrCreate(PropelPDO $con = null) Return the first ReciboCabecera matching the query, or a new ReciboCabecera object populated from the query conditions when no match is found
 *
 * @method ReciboCabecera findOneById(int $id) Return the first ReciboCabecera filtered by the id column
 * @method ReciboCabecera findOneByPlanilla(string $planilla) Return the first ReciboCabecera filtered by the planilla column
 * @method ReciboCabecera findOneByInicio(string $inicio) Return the first ReciboCabecera filtered by the inicio column
 * @method ReciboCabecera findOneByFin(string $fin) Return the first ReciboCabecera filtered by the fin column
 * @method ReciboCabecera findOneByProyecto(string $proyecto) Return the first ReciboCabecera filtered by the proyecto column
 * @method ReciboCabecera findOneByEmpresa(string $empresa) Return the first ReciboCabecera filtered by the empresa column
 * @method ReciboCabecera findOneByRazonSocial(string $razon_social) Return the first ReciboCabecera filtered by the razon_social column
 * @method ReciboCabecera findOneByDireccion(string $direccion) Return the first ReciboCabecera filtered by the direccion column
 * @method ReciboCabecera findOneByEmail(string $email) Return the first ReciboCabecera filtered by the email column
 * @method ReciboCabecera findOneByTelefono(string $telefono) Return the first ReciboCabecera filtered by the telefono column
 * @method ReciboCabecera findOneByNombreComercial(string $nombre_comercial) Return the first ReciboCabecera filtered by the nombre_comercial column
 * @method ReciboCabecera findOneByTexto(string $texto) Return the first ReciboCabecera filtered by the texto column
 * @method ReciboCabecera findOneByCabeceraIn(int $cabecera_in) Return the first ReciboCabecera filtered by the cabecera_in column
 *
 * @method array findById(int $id) Return ReciboCabecera objects filtered by the id column
 * @method array findByPlanilla(string $planilla) Return ReciboCabecera objects filtered by the planilla column
 * @method array findByInicio(string $inicio) Return ReciboCabecera objects filtered by the inicio column
 * @method array findByFin(string $fin) Return ReciboCabecera objects filtered by the fin column
 * @method array findByProyecto(string $proyecto) Return ReciboCabecera objects filtered by the proyecto column
 * @method array findByEmpresa(string $empresa) Return ReciboCabecera objects filtered by the empresa column
 * @method array findByRazonSocial(string $razon_social) Return ReciboCabecera objects filtered by the razon_social column
 * @method array findByDireccion(string $direccion) Return ReciboCabecera objects filtered by the direccion column
 * @method array findByEmail(string $email) Return ReciboCabecera objects filtered by the email column
 * @method array findByTelefono(string $telefono) Return ReciboCabecera objects filtered by the telefono column
 * @method array findByNombreComercial(string $nombre_comercial) Return ReciboCabecera objects filtered by the nombre_comercial column
 * @method array findByTexto(string $texto) Return ReciboCabecera objects filtered by the texto column
 * @method array findByCabeceraIn(int $cabecera_in) Return ReciboCabecera objects filtered by the cabecera_in column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseReciboCabeceraQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseReciboCabeceraQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'ReciboCabecera', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ReciboCabeceraQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ReciboCabeceraQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ReciboCabeceraQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ReciboCabeceraQuery) {
            return $criteria;
        }
        $query = new ReciboCabeceraQuery();
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
     * @return   ReciboCabecera|ReciboCabecera[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ReciboCabeceraPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ReciboCabeceraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ReciboCabecera A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `PLANILLA`, `INICIO`, `FIN`, `PROYECTO`, `EMPRESA`, `RAZON_SOCIAL`, `DIRECCION`, `EMAIL`, `TELEFONO`, `NOMBRE_COMERCIAL`, `TEXTO`, `CABECERA_IN` FROM `recibo_cabecera` WHERE `ID` = :p0';
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
            $obj = new ReciboCabecera();
            $obj->hydrate($row);
            ReciboCabeceraPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ReciboCabecera|ReciboCabecera[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ReciboCabecera[]|mixed the list of results, formatted by the current formatter
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
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ReciboCabeceraPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ReciboCabeceraPeer::ID, $keys, Criteria::IN);
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
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the planilla column
     *
     * Example usage:
     * <code>
     * $query->filterByPlanilla('fooValue');   // WHERE planilla = 'fooValue'
     * $query->filterByPlanilla('%fooValue%'); // WHERE planilla LIKE '%fooValue%'
     * </code>
     *
     * @param     string $planilla The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByPlanilla($planilla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($planilla)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $planilla)) {
                $planilla = str_replace('*', '%', $planilla);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::PLANILLA, $planilla, $comparison);
    }

    /**
     * Filter the query on the inicio column
     *
     * Example usage:
     * <code>
     * $query->filterByInicio('fooValue');   // WHERE inicio = 'fooValue'
     * $query->filterByInicio('%fooValue%'); // WHERE inicio LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inicio The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByInicio($inicio = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inicio)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $inicio)) {
                $inicio = str_replace('*', '%', $inicio);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::INICIO, $inicio, $comparison);
    }

    /**
     * Filter the query on the fin column
     *
     * Example usage:
     * <code>
     * $query->filterByFin('fooValue');   // WHERE fin = 'fooValue'
     * $query->filterByFin('%fooValue%'); // WHERE fin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByFin($fin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fin)) {
                $fin = str_replace('*', '%', $fin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::FIN, $fin, $comparison);
    }

    /**
     * Filter the query on the proyecto column
     *
     * Example usage:
     * <code>
     * $query->filterByProyecto('fooValue');   // WHERE proyecto = 'fooValue'
     * $query->filterByProyecto('%fooValue%'); // WHERE proyecto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $proyecto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByProyecto($proyecto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($proyecto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $proyecto)) {
                $proyecto = str_replace('*', '%', $proyecto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::PROYECTO, $proyecto, $comparison);
    }

    /**
     * Filter the query on the empresa column
     *
     * Example usage:
     * <code>
     * $query->filterByEmpresa('fooValue');   // WHERE empresa = 'fooValue'
     * $query->filterByEmpresa('%fooValue%'); // WHERE empresa LIKE '%fooValue%'
     * </code>
     *
     * @param     string $empresa The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByEmpresa($empresa = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($empresa)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $empresa)) {
                $empresa = str_replace('*', '%', $empresa);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::EMPRESA, $empresa, $comparison);
    }

    /**
     * Filter the query on the razon_social column
     *
     * Example usage:
     * <code>
     * $query->filterByRazonSocial('fooValue');   // WHERE razon_social = 'fooValue'
     * $query->filterByRazonSocial('%fooValue%'); // WHERE razon_social LIKE '%fooValue%'
     * </code>
     *
     * @param     string $razonSocial The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByRazonSocial($razonSocial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($razonSocial)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $razonSocial)) {
                $razonSocial = str_replace('*', '%', $razonSocial);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::RAZON_SOCIAL, $razonSocial, $comparison);
    }

    /**
     * Filter the query on the direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireccion('fooValue');   // WHERE direccion = 'fooValue'
     * $query->filterByDireccion('%fooValue%'); // WHERE direccion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direccion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direccion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $direccion)) {
                $direccion = str_replace('*', '%', $direccion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::DIRECCION, $direccion, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the telefono column
     *
     * Example usage:
     * <code>
     * $query->filterByTelefono('fooValue');   // WHERE telefono = 'fooValue'
     * $query->filterByTelefono('%fooValue%'); // WHERE telefono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telefono The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByTelefono($telefono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telefono)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $telefono)) {
                $telefono = str_replace('*', '%', $telefono);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::TELEFONO, $telefono, $comparison);
    }

    /**
     * Filter the query on the nombre_comercial column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreComercial('fooValue');   // WHERE nombre_comercial = 'fooValue'
     * $query->filterByNombreComercial('%fooValue%'); // WHERE nombre_comercial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombreComercial The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByNombreComercial($nombreComercial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreComercial)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombreComercial)) {
                $nombreComercial = str_replace('*', '%', $nombreComercial);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::NOMBRE_COMERCIAL, $nombreComercial, $comparison);
    }

    /**
     * Filter the query on the texto column
     *
     * Example usage:
     * <code>
     * $query->filterByTexto('fooValue');   // WHERE texto = 'fooValue'
     * $query->filterByTexto('%fooValue%'); // WHERE texto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $texto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByTexto($texto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($texto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $texto)) {
                $texto = str_replace('*', '%', $texto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::TEXTO, $texto, $comparison);
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
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function filterByCabeceraIn($cabeceraIn = null, $comparison = null)
    {
        if (is_array($cabeceraIn)) {
            $useMinMax = false;
            if (isset($cabeceraIn['min'])) {
                $this->addUsingAlias(ReciboCabeceraPeer::CABECERA_IN, $cabeceraIn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cabeceraIn['max'])) {
                $this->addUsingAlias(ReciboCabeceraPeer::CABECERA_IN, $cabeceraIn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReciboCabeceraPeer::CABECERA_IN, $cabeceraIn, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ReciboCabecera $reciboCabecera Object to remove from the list of results
     *
     * @return ReciboCabeceraQuery The current query, for fluid interface
     */
    public function prune($reciboCabecera = null)
    {
        if ($reciboCabecera) {
            $this->addUsingAlias(ReciboCabeceraPeer::ID, $reciboCabecera->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
