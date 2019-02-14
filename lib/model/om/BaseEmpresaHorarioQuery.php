<?php


/**
 * Base class that represents a query for the 'empresa_horario' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 02/14/19 20:14:55
 *
 * @method EmpresaHorarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EmpresaHorarioQuery orderByEmpresa($order = Criteria::ASC) Order by the empresa column
 * @method EmpresaHorarioQuery orderByHora($order = Criteria::ASC) Order by the hora column
 * @method EmpresaHorarioQuery orderByHoraFin($order = Criteria::ASC) Order by the hora_fin column
 * @method EmpresaHorarioQuery orderByHora24($order = Criteria::ASC) Order by the hora24 column
 * @method EmpresaHorarioQuery orderByHoraFin24($order = Criteria::ASC) Order by the hora_fin24 column
 * @method EmpresaHorarioQuery orderByEstricto($order = Criteria::ASC) Order by the estricto column
 * @method EmpresaHorarioQuery orderByMinutoProrroga($order = Criteria::ASC) Order by the minuto_prorroga column
 * @method EmpresaHorarioQuery orderByTextoUno($order = Criteria::ASC) Order by the texto_uno column
 * @method EmpresaHorarioQuery orderByTextoDos($order = Criteria::ASC) Order by the texto_dos column
 * @method EmpresaHorarioQuery orderByCorreoNotifica($order = Criteria::ASC) Order by the correo_notifica column
 *
 * @method EmpresaHorarioQuery groupById() Group by the id column
 * @method EmpresaHorarioQuery groupByEmpresa() Group by the empresa column
 * @method EmpresaHorarioQuery groupByHora() Group by the hora column
 * @method EmpresaHorarioQuery groupByHoraFin() Group by the hora_fin column
 * @method EmpresaHorarioQuery groupByHora24() Group by the hora24 column
 * @method EmpresaHorarioQuery groupByHoraFin24() Group by the hora_fin24 column
 * @method EmpresaHorarioQuery groupByEstricto() Group by the estricto column
 * @method EmpresaHorarioQuery groupByMinutoProrroga() Group by the minuto_prorroga column
 * @method EmpresaHorarioQuery groupByTextoUno() Group by the texto_uno column
 * @method EmpresaHorarioQuery groupByTextoDos() Group by the texto_dos column
 * @method EmpresaHorarioQuery groupByCorreoNotifica() Group by the correo_notifica column
 *
 * @method EmpresaHorarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EmpresaHorarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EmpresaHorarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EmpresaHorario findOne(PropelPDO $con = null) Return the first EmpresaHorario matching the query
 * @method EmpresaHorario findOneOrCreate(PropelPDO $con = null) Return the first EmpresaHorario matching the query, or a new EmpresaHorario object populated from the query conditions when no match is found
 *
 * @method EmpresaHorario findOneById(int $id) Return the first EmpresaHorario filtered by the id column
 * @method EmpresaHorario findOneByEmpresa(string $empresa) Return the first EmpresaHorario filtered by the empresa column
 * @method EmpresaHorario findOneByHora(string $hora) Return the first EmpresaHorario filtered by the hora column
 * @method EmpresaHorario findOneByHoraFin(string $hora_fin) Return the first EmpresaHorario filtered by the hora_fin column
 * @method EmpresaHorario findOneByHora24(string $hora24) Return the first EmpresaHorario filtered by the hora24 column
 * @method EmpresaHorario findOneByHoraFin24(string $hora_fin24) Return the first EmpresaHorario filtered by the hora_fin24 column
 * @method EmpresaHorario findOneByEstricto(boolean $estricto) Return the first EmpresaHorario filtered by the estricto column
 * @method EmpresaHorario findOneByMinutoProrroga(int $minuto_prorroga) Return the first EmpresaHorario filtered by the minuto_prorroga column
 * @method EmpresaHorario findOneByTextoUno(string $texto_uno) Return the first EmpresaHorario filtered by the texto_uno column
 * @method EmpresaHorario findOneByTextoDos(string $texto_dos) Return the first EmpresaHorario filtered by the texto_dos column
 * @method EmpresaHorario findOneByCorreoNotifica(string $correo_notifica) Return the first EmpresaHorario filtered by the correo_notifica column
 *
 * @method array findById(int $id) Return EmpresaHorario objects filtered by the id column
 * @method array findByEmpresa(string $empresa) Return EmpresaHorario objects filtered by the empresa column
 * @method array findByHora(string $hora) Return EmpresaHorario objects filtered by the hora column
 * @method array findByHoraFin(string $hora_fin) Return EmpresaHorario objects filtered by the hora_fin column
 * @method array findByHora24(string $hora24) Return EmpresaHorario objects filtered by the hora24 column
 * @method array findByHoraFin24(string $hora_fin24) Return EmpresaHorario objects filtered by the hora_fin24 column
 * @method array findByEstricto(boolean $estricto) Return EmpresaHorario objects filtered by the estricto column
 * @method array findByMinutoProrroga(int $minuto_prorroga) Return EmpresaHorario objects filtered by the minuto_prorroga column
 * @method array findByTextoUno(string $texto_uno) Return EmpresaHorario objects filtered by the texto_uno column
 * @method array findByTextoDos(string $texto_dos) Return EmpresaHorario objects filtered by the texto_dos column
 * @method array findByCorreoNotifica(string $correo_notifica) Return EmpresaHorario objects filtered by the correo_notifica column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseEmpresaHorarioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEmpresaHorarioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'EmpresaHorario', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EmpresaHorarioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     EmpresaHorarioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EmpresaHorarioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EmpresaHorarioQuery) {
            return $criteria;
        }
        $query = new EmpresaHorarioQuery();
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
     * @return   EmpresaHorario|EmpresaHorario[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EmpresaHorarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EmpresaHorarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   EmpresaHorario A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `EMPRESA`, `HORA`, `HORA_FIN`, `HORA24`, `HORA_FIN24`, `ESTRICTO`, `MINUTO_PRORROGA`, `TEXTO_UNO`, `TEXTO_DOS`, `CORREO_NOTIFICA` FROM `empresa_horario` WHERE `ID` = :p0';
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
            $obj = new EmpresaHorario();
            $obj->hydrate($row);
            EmpresaHorarioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return EmpresaHorario|EmpresaHorario[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EmpresaHorario[]|mixed the list of results, formatted by the current formatter
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
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EmpresaHorarioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EmpresaHorarioPeer::ID, $keys, Criteria::IN);
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
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EmpresaHorarioPeer::ID, $id, $comparison);
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
     * @return EmpresaHorarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EmpresaHorarioPeer::EMPRESA, $empresa, $comparison);
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
     * @return EmpresaHorarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EmpresaHorarioPeer::HORA, $hora, $comparison);
    }

    /**
     * Filter the query on the hora_fin column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraFin('fooValue');   // WHERE hora_fin = 'fooValue'
     * $query->filterByHoraFin('%fooValue%'); // WHERE hora_fin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $horaFin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function filterByHoraFin($horaFin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($horaFin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $horaFin)) {
                $horaFin = str_replace('*', '%', $horaFin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmpresaHorarioPeer::HORA_FIN, $horaFin, $comparison);
    }

    /**
     * Filter the query on the hora24 column
     *
     * Example usage:
     * <code>
     * $query->filterByHora24('fooValue');   // WHERE hora24 = 'fooValue'
     * $query->filterByHora24('%fooValue%'); // WHERE hora24 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hora24 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function filterByHora24($hora24 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hora24)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hora24)) {
                $hora24 = str_replace('*', '%', $hora24);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmpresaHorarioPeer::HORA24, $hora24, $comparison);
    }

    /**
     * Filter the query on the hora_fin24 column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraFin24('fooValue');   // WHERE hora_fin24 = 'fooValue'
     * $query->filterByHoraFin24('%fooValue%'); // WHERE hora_fin24 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $horaFin24 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function filterByHoraFin24($horaFin24 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($horaFin24)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $horaFin24)) {
                $horaFin24 = str_replace('*', '%', $horaFin24);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmpresaHorarioPeer::HORA_FIN24, $horaFin24, $comparison);
    }

    /**
     * Filter the query on the estricto column
     *
     * Example usage:
     * <code>
     * $query->filterByEstricto(true); // WHERE estricto = true
     * $query->filterByEstricto('yes'); // WHERE estricto = true
     * </code>
     *
     * @param     boolean|string $estricto The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function filterByEstricto($estricto = null, $comparison = null)
    {
        if (is_string($estricto)) {
            $estricto = in_array(strtolower($estricto), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EmpresaHorarioPeer::ESTRICTO, $estricto, $comparison);
    }

    /**
     * Filter the query on the minuto_prorroga column
     *
     * Example usage:
     * <code>
     * $query->filterByMinutoProrroga(1234); // WHERE minuto_prorroga = 1234
     * $query->filterByMinutoProrroga(array(12, 34)); // WHERE minuto_prorroga IN (12, 34)
     * $query->filterByMinutoProrroga(array('min' => 12)); // WHERE minuto_prorroga > 12
     * </code>
     *
     * @param     mixed $minutoProrroga The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function filterByMinutoProrroga($minutoProrroga = null, $comparison = null)
    {
        if (is_array($minutoProrroga)) {
            $useMinMax = false;
            if (isset($minutoProrroga['min'])) {
                $this->addUsingAlias(EmpresaHorarioPeer::MINUTO_PRORROGA, $minutoProrroga['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minutoProrroga['max'])) {
                $this->addUsingAlias(EmpresaHorarioPeer::MINUTO_PRORROGA, $minutoProrroga['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmpresaHorarioPeer::MINUTO_PRORROGA, $minutoProrroga, $comparison);
    }

    /**
     * Filter the query on the texto_uno column
     *
     * Example usage:
     * <code>
     * $query->filterByTextoUno('fooValue');   // WHERE texto_uno = 'fooValue'
     * $query->filterByTextoUno('%fooValue%'); // WHERE texto_uno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $textoUno The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function filterByTextoUno($textoUno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($textoUno)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $textoUno)) {
                $textoUno = str_replace('*', '%', $textoUno);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmpresaHorarioPeer::TEXTO_UNO, $textoUno, $comparison);
    }

    /**
     * Filter the query on the texto_dos column
     *
     * Example usage:
     * <code>
     * $query->filterByTextoDos('fooValue');   // WHERE texto_dos = 'fooValue'
     * $query->filterByTextoDos('%fooValue%'); // WHERE texto_dos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $textoDos The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function filterByTextoDos($textoDos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($textoDos)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $textoDos)) {
                $textoDos = str_replace('*', '%', $textoDos);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmpresaHorarioPeer::TEXTO_DOS, $textoDos, $comparison);
    }

    /**
     * Filter the query on the correo_notifica column
     *
     * Example usage:
     * <code>
     * $query->filterByCorreoNotifica('fooValue');   // WHERE correo_notifica = 'fooValue'
     * $query->filterByCorreoNotifica('%fooValue%'); // WHERE correo_notifica LIKE '%fooValue%'
     * </code>
     *
     * @param     string $correoNotifica The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function filterByCorreoNotifica($correoNotifica = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($correoNotifica)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $correoNotifica)) {
                $correoNotifica = str_replace('*', '%', $correoNotifica);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmpresaHorarioPeer::CORREO_NOTIFICA, $correoNotifica, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   EmpresaHorario $empresaHorario Object to remove from the list of results
     *
     * @return EmpresaHorarioQuery The current query, for fluid interface
     */
    public function prune($empresaHorario = null)
    {
        if ($empresaHorario) {
            $this->addUsingAlias(EmpresaHorarioPeer::ID, $empresaHorario->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
