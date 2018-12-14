<?php


/**
 * Base class that represents a query for the 'asistencia_usuario' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 12/14/18 21:36:48
 *
 * @method AsistenciaUsuarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method AsistenciaUsuarioQuery orderByEmpresa($order = Criteria::ASC) Order by the empresa column
 * @method AsistenciaUsuarioQuery orderByUsuario($order = Criteria::ASC) Order by the usuario column
 * @method AsistenciaUsuarioQuery orderByDia($order = Criteria::ASC) Order by the dia column
 * @method AsistenciaUsuarioQuery orderByHora($order = Criteria::ASC) Order by the hora column
 * @method AsistenciaUsuarioQuery orderByFechaHora($order = Criteria::ASC) Order by the fecha_hora column
 * @method AsistenciaUsuarioQuery orderByTarde($order = Criteria::ASC) Order by the tarde column
 * @method AsistenciaUsuarioQuery orderByHoraTarde($order = Criteria::ASC) Order by the hora_tarde column
 * @method AsistenciaUsuarioQuery orderByMinutoTarde($order = Criteria::ASC) Order by the minuto_tarde column
 * @method AsistenciaUsuarioQuery orderByHoraDiaria($order = Criteria::ASC) Order by the hora_diaria column
 *
 * @method AsistenciaUsuarioQuery groupById() Group by the id column
 * @method AsistenciaUsuarioQuery groupByEmpresa() Group by the empresa column
 * @method AsistenciaUsuarioQuery groupByUsuario() Group by the usuario column
 * @method AsistenciaUsuarioQuery groupByDia() Group by the dia column
 * @method AsistenciaUsuarioQuery groupByHora() Group by the hora column
 * @method AsistenciaUsuarioQuery groupByFechaHora() Group by the fecha_hora column
 * @method AsistenciaUsuarioQuery groupByTarde() Group by the tarde column
 * @method AsistenciaUsuarioQuery groupByHoraTarde() Group by the hora_tarde column
 * @method AsistenciaUsuarioQuery groupByMinutoTarde() Group by the minuto_tarde column
 * @method AsistenciaUsuarioQuery groupByHoraDiaria() Group by the hora_diaria column
 *
 * @method AsistenciaUsuarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AsistenciaUsuarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AsistenciaUsuarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AsistenciaUsuario findOne(PropelPDO $con = null) Return the first AsistenciaUsuario matching the query
 * @method AsistenciaUsuario findOneOrCreate(PropelPDO $con = null) Return the first AsistenciaUsuario matching the query, or a new AsistenciaUsuario object populated from the query conditions when no match is found
 *
 * @method AsistenciaUsuario findOneById(int $id) Return the first AsistenciaUsuario filtered by the id column
 * @method AsistenciaUsuario findOneByEmpresa(string $empresa) Return the first AsistenciaUsuario filtered by the empresa column
 * @method AsistenciaUsuario findOneByUsuario(string $usuario) Return the first AsistenciaUsuario filtered by the usuario column
 * @method AsistenciaUsuario findOneByDia(string $dia) Return the first AsistenciaUsuario filtered by the dia column
 * @method AsistenciaUsuario findOneByHora(string $hora) Return the first AsistenciaUsuario filtered by the hora column
 * @method AsistenciaUsuario findOneByFechaHora(string $fecha_hora) Return the first AsistenciaUsuario filtered by the fecha_hora column
 * @method AsistenciaUsuario findOneByTarde(boolean $tarde) Return the first AsistenciaUsuario filtered by the tarde column
 * @method AsistenciaUsuario findOneByHoraTarde(double $hora_tarde) Return the first AsistenciaUsuario filtered by the hora_tarde column
 * @method AsistenciaUsuario findOneByMinutoTarde(double $minuto_tarde) Return the first AsistenciaUsuario filtered by the minuto_tarde column
 * @method AsistenciaUsuario findOneByHoraDiaria(double $hora_diaria) Return the first AsistenciaUsuario filtered by the hora_diaria column
 *
 * @method array findById(int $id) Return AsistenciaUsuario objects filtered by the id column
 * @method array findByEmpresa(string $empresa) Return AsistenciaUsuario objects filtered by the empresa column
 * @method array findByUsuario(string $usuario) Return AsistenciaUsuario objects filtered by the usuario column
 * @method array findByDia(string $dia) Return AsistenciaUsuario objects filtered by the dia column
 * @method array findByHora(string $hora) Return AsistenciaUsuario objects filtered by the hora column
 * @method array findByFechaHora(string $fecha_hora) Return AsistenciaUsuario objects filtered by the fecha_hora column
 * @method array findByTarde(boolean $tarde) Return AsistenciaUsuario objects filtered by the tarde column
 * @method array findByHoraTarde(double $hora_tarde) Return AsistenciaUsuario objects filtered by the hora_tarde column
 * @method array findByMinutoTarde(double $minuto_tarde) Return AsistenciaUsuario objects filtered by the minuto_tarde column
 * @method array findByHoraDiaria(double $hora_diaria) Return AsistenciaUsuario objects filtered by the hora_diaria column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAsistenciaUsuarioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAsistenciaUsuarioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'AsistenciaUsuario', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AsistenciaUsuarioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     AsistenciaUsuarioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AsistenciaUsuarioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AsistenciaUsuarioQuery) {
            return $criteria;
        }
        $query = new AsistenciaUsuarioQuery();
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
     * @return   AsistenciaUsuario|AsistenciaUsuario[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AsistenciaUsuarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AsistenciaUsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   AsistenciaUsuario A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `EMPRESA`, `USUARIO`, `DIA`, `HORA`, `FECHA_HORA`, `TARDE`, `HORA_TARDE`, `MINUTO_TARDE`, `HORA_DIARIA` FROM `asistencia_usuario` WHERE `ID` = :p0';
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
            $obj = new AsistenciaUsuario();
            $obj->hydrate($row);
            AsistenciaUsuarioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AsistenciaUsuario|AsistenciaUsuario[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AsistenciaUsuario[]|mixed the list of results, formatted by the current formatter
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
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AsistenciaUsuarioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AsistenciaUsuarioPeer::ID, $keys, Criteria::IN);
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
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(AsistenciaUsuarioPeer::ID, $id, $comparison);
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
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AsistenciaUsuarioPeer::EMPRESA, $empresa, $comparison);
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
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AsistenciaUsuarioPeer::USUARIO, $usuario, $comparison);
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
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
     */
    public function filterByDia($dia = null, $comparison = null)
    {
        if (is_array($dia)) {
            $useMinMax = false;
            if (isset($dia['min'])) {
                $this->addUsingAlias(AsistenciaUsuarioPeer::DIA, $dia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dia['max'])) {
                $this->addUsingAlias(AsistenciaUsuarioPeer::DIA, $dia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AsistenciaUsuarioPeer::DIA, $dia, $comparison);
    }

    /**
     * Filter the query on the hora column
     *
     * Example usage:
     * <code>
     * $query->filterByHora('fooValue');   // WHERE hora = 'fooValue'
     * $query->filterByHora('%fooValue%'); // WHERE hora LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hora The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
     */
    public function filterByHora($hora = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hora)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hora)) {
                $hora = str_replace('*', '%', $hora);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AsistenciaUsuarioPeer::HORA, $hora, $comparison);
    }

    /**
     * Filter the query on the fecha_hora column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaHora('2011-03-14'); // WHERE fecha_hora = '2011-03-14'
     * $query->filterByFechaHora('now'); // WHERE fecha_hora = '2011-03-14'
     * $query->filterByFechaHora(array('max' => 'yesterday')); // WHERE fecha_hora > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaHora The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
     */
    public function filterByFechaHora($fechaHora = null, $comparison = null)
    {
        if (is_array($fechaHora)) {
            $useMinMax = false;
            if (isset($fechaHora['min'])) {
                $this->addUsingAlias(AsistenciaUsuarioPeer::FECHA_HORA, $fechaHora['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaHora['max'])) {
                $this->addUsingAlias(AsistenciaUsuarioPeer::FECHA_HORA, $fechaHora['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AsistenciaUsuarioPeer::FECHA_HORA, $fechaHora, $comparison);
    }

    /**
     * Filter the query on the tarde column
     *
     * Example usage:
     * <code>
     * $query->filterByTarde(true); // WHERE tarde = true
     * $query->filterByTarde('yes'); // WHERE tarde = true
     * </code>
     *
     * @param     boolean|string $tarde The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
     */
    public function filterByTarde($tarde = null, $comparison = null)
    {
        if (is_string($tarde)) {
            $tarde = in_array(strtolower($tarde), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AsistenciaUsuarioPeer::TARDE, $tarde, $comparison);
    }

    /**
     * Filter the query on the hora_tarde column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraTarde(1234); // WHERE hora_tarde = 1234
     * $query->filterByHoraTarde(array(12, 34)); // WHERE hora_tarde IN (12, 34)
     * $query->filterByHoraTarde(array('min' => 12)); // WHERE hora_tarde > 12
     * </code>
     *
     * @param     mixed $horaTarde The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
     */
    public function filterByHoraTarde($horaTarde = null, $comparison = null)
    {
        if (is_array($horaTarde)) {
            $useMinMax = false;
            if (isset($horaTarde['min'])) {
                $this->addUsingAlias(AsistenciaUsuarioPeer::HORA_TARDE, $horaTarde['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horaTarde['max'])) {
                $this->addUsingAlias(AsistenciaUsuarioPeer::HORA_TARDE, $horaTarde['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AsistenciaUsuarioPeer::HORA_TARDE, $horaTarde, $comparison);
    }

    /**
     * Filter the query on the minuto_tarde column
     *
     * Example usage:
     * <code>
     * $query->filterByMinutoTarde(1234); // WHERE minuto_tarde = 1234
     * $query->filterByMinutoTarde(array(12, 34)); // WHERE minuto_tarde IN (12, 34)
     * $query->filterByMinutoTarde(array('min' => 12)); // WHERE minuto_tarde > 12
     * </code>
     *
     * @param     mixed $minutoTarde The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
     */
    public function filterByMinutoTarde($minutoTarde = null, $comparison = null)
    {
        if (is_array($minutoTarde)) {
            $useMinMax = false;
            if (isset($minutoTarde['min'])) {
                $this->addUsingAlias(AsistenciaUsuarioPeer::MINUTO_TARDE, $minutoTarde['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minutoTarde['max'])) {
                $this->addUsingAlias(AsistenciaUsuarioPeer::MINUTO_TARDE, $minutoTarde['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AsistenciaUsuarioPeer::MINUTO_TARDE, $minutoTarde, $comparison);
    }

    /**
     * Filter the query on the hora_diaria column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraDiaria(1234); // WHERE hora_diaria = 1234
     * $query->filterByHoraDiaria(array(12, 34)); // WHERE hora_diaria IN (12, 34)
     * $query->filterByHoraDiaria(array('min' => 12)); // WHERE hora_diaria > 12
     * </code>
     *
     * @param     mixed $horaDiaria The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
     */
    public function filterByHoraDiaria($horaDiaria = null, $comparison = null)
    {
        if (is_array($horaDiaria)) {
            $useMinMax = false;
            if (isset($horaDiaria['min'])) {
                $this->addUsingAlias(AsistenciaUsuarioPeer::HORA_DIARIA, $horaDiaria['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horaDiaria['max'])) {
                $this->addUsingAlias(AsistenciaUsuarioPeer::HORA_DIARIA, $horaDiaria['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AsistenciaUsuarioPeer::HORA_DIARIA, $horaDiaria, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   AsistenciaUsuario $asistenciaUsuario Object to remove from the list of results
     *
     * @return AsistenciaUsuarioQuery The current query, for fluid interface
     */
    public function prune($asistenciaUsuario = null)
    {
        if ($asistenciaUsuario) {
            $this->addUsingAlias(AsistenciaUsuarioPeer::ID, $asistenciaUsuario->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
