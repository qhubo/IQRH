<?php


/**
 * Base class that represents a query for the 'bitacora_usuario' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 10/24/18 20:06:13
 *
 * @method BitacoraUsuarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BitacoraUsuarioQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method BitacoraUsuarioQuery orderByUsuarioJefe($order = Criteria::ASC) Order by the usuario_jefe column
 * @method BitacoraUsuarioQuery orderByMotivo($order = Criteria::ASC) Order by the motivo column
 * @method BitacoraUsuarioQuery orderByLeido($order = Criteria::ASC) Order by the leido column
 * @method BitacoraUsuarioQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method BitacoraUsuarioQuery orderByIdentificador($order = Criteria::ASC) Order by the identificador column
 * @method BitacoraUsuarioQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method BitacoraUsuarioQuery orderByArchivoUno($order = Criteria::ASC) Order by the archivo_uno column
 * @method BitacoraUsuarioQuery orderByArchivoDos($order = Criteria::ASC) Order by the archivo_dos column
 *
 * @method BitacoraUsuarioQuery groupById() Group by the id column
 * @method BitacoraUsuarioQuery groupByUsuarioId() Group by the usuario_id column
 * @method BitacoraUsuarioQuery groupByUsuarioJefe() Group by the usuario_jefe column
 * @method BitacoraUsuarioQuery groupByMotivo() Group by the motivo column
 * @method BitacoraUsuarioQuery groupByLeido() Group by the leido column
 * @method BitacoraUsuarioQuery groupByTipo() Group by the tipo column
 * @method BitacoraUsuarioQuery groupByIdentificador() Group by the identificador column
 * @method BitacoraUsuarioQuery groupByFecha() Group by the fecha column
 * @method BitacoraUsuarioQuery groupByArchivoUno() Group by the archivo_uno column
 * @method BitacoraUsuarioQuery groupByArchivoDos() Group by the archivo_dos column
 *
 * @method BitacoraUsuarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BitacoraUsuarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BitacoraUsuarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BitacoraUsuarioQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method BitacoraUsuarioQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method BitacoraUsuarioQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method BitacoraUsuario findOne(PropelPDO $con = null) Return the first BitacoraUsuario matching the query
 * @method BitacoraUsuario findOneOrCreate(PropelPDO $con = null) Return the first BitacoraUsuario matching the query, or a new BitacoraUsuario object populated from the query conditions when no match is found
 *
 * @method BitacoraUsuario findOneById(int $id) Return the first BitacoraUsuario filtered by the id column
 * @method BitacoraUsuario findOneByUsuarioId(int $usuario_id) Return the first BitacoraUsuario filtered by the usuario_id column
 * @method BitacoraUsuario findOneByUsuarioJefe(int $usuario_jefe) Return the first BitacoraUsuario filtered by the usuario_jefe column
 * @method BitacoraUsuario findOneByMotivo(string $motivo) Return the first BitacoraUsuario filtered by the motivo column
 * @method BitacoraUsuario findOneByLeido(boolean $leido) Return the first BitacoraUsuario filtered by the leido column
 * @method BitacoraUsuario findOneByTipo(string $tipo) Return the first BitacoraUsuario filtered by the tipo column
 * @method BitacoraUsuario findOneByIdentificador(string $identificador) Return the first BitacoraUsuario filtered by the identificador column
 * @method BitacoraUsuario findOneByFecha(string $fecha) Return the first BitacoraUsuario filtered by the fecha column
 * @method BitacoraUsuario findOneByArchivoUno(string $archivo_uno) Return the first BitacoraUsuario filtered by the archivo_uno column
 * @method BitacoraUsuario findOneByArchivoDos(string $archivo_dos) Return the first BitacoraUsuario filtered by the archivo_dos column
 *
 * @method array findById(int $id) Return BitacoraUsuario objects filtered by the id column
 * @method array findByUsuarioId(int $usuario_id) Return BitacoraUsuario objects filtered by the usuario_id column
 * @method array findByUsuarioJefe(int $usuario_jefe) Return BitacoraUsuario objects filtered by the usuario_jefe column
 * @method array findByMotivo(string $motivo) Return BitacoraUsuario objects filtered by the motivo column
 * @method array findByLeido(boolean $leido) Return BitacoraUsuario objects filtered by the leido column
 * @method array findByTipo(string $tipo) Return BitacoraUsuario objects filtered by the tipo column
 * @method array findByIdentificador(string $identificador) Return BitacoraUsuario objects filtered by the identificador column
 * @method array findByFecha(string $fecha) Return BitacoraUsuario objects filtered by the fecha column
 * @method array findByArchivoUno(string $archivo_uno) Return BitacoraUsuario objects filtered by the archivo_uno column
 * @method array findByArchivoDos(string $archivo_dos) Return BitacoraUsuario objects filtered by the archivo_dos column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBitacoraUsuarioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBitacoraUsuarioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'BitacoraUsuario', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BitacoraUsuarioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     BitacoraUsuarioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BitacoraUsuarioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BitacoraUsuarioQuery) {
            return $criteria;
        }
        $query = new BitacoraUsuarioQuery();
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
     * @return   BitacoraUsuario|BitacoraUsuario[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BitacoraUsuarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BitacoraUsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   BitacoraUsuario A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USUARIO_ID`, `USUARIO_JEFE`, `MOTIVO`, `LEIDO`, `TIPO`, `IDENTIFICADOR`, `FECHA`, `ARCHIVO_UNO`, `ARCHIVO_DOS` FROM `bitacora_usuario` WHERE `ID` = :p0';
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
            $obj = new BitacoraUsuario();
            $obj->hydrate($row);
            BitacoraUsuarioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BitacoraUsuario|BitacoraUsuario[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BitacoraUsuario[]|mixed the list of results, formatted by the current formatter
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
     * @return BitacoraUsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BitacoraUsuarioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BitacoraUsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BitacoraUsuarioPeer::ID, $keys, Criteria::IN);
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
     * @return BitacoraUsuarioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(BitacoraUsuarioPeer::ID, $id, $comparison);
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
     * @return BitacoraUsuarioQuery The current query, for fluid interface
     */
    public function filterByUsuarioId($usuarioId = null, $comparison = null)
    {
        if (is_array($usuarioId)) {
            $useMinMax = false;
            if (isset($usuarioId['min'])) {
                $this->addUsingAlias(BitacoraUsuarioPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioId['max'])) {
                $this->addUsingAlias(BitacoraUsuarioPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitacoraUsuarioPeer::USUARIO_ID, $usuarioId, $comparison);
    }

    /**
     * Filter the query on the usuario_jefe column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioJefe(1234); // WHERE usuario_jefe = 1234
     * $query->filterByUsuarioJefe(array(12, 34)); // WHERE usuario_jefe IN (12, 34)
     * $query->filterByUsuarioJefe(array('min' => 12)); // WHERE usuario_jefe > 12
     * </code>
     *
     * @param     mixed $usuarioJefe The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraUsuarioQuery The current query, for fluid interface
     */
    public function filterByUsuarioJefe($usuarioJefe = null, $comparison = null)
    {
        if (is_array($usuarioJefe)) {
            $useMinMax = false;
            if (isset($usuarioJefe['min'])) {
                $this->addUsingAlias(BitacoraUsuarioPeer::USUARIO_JEFE, $usuarioJefe['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioJefe['max'])) {
                $this->addUsingAlias(BitacoraUsuarioPeer::USUARIO_JEFE, $usuarioJefe['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitacoraUsuarioPeer::USUARIO_JEFE, $usuarioJefe, $comparison);
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
     * @return BitacoraUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BitacoraUsuarioPeer::MOTIVO, $motivo, $comparison);
    }

    /**
     * Filter the query on the leido column
     *
     * Example usage:
     * <code>
     * $query->filterByLeido(true); // WHERE leido = true
     * $query->filterByLeido('yes'); // WHERE leido = true
     * </code>
     *
     * @param     boolean|string $leido The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraUsuarioQuery The current query, for fluid interface
     */
    public function filterByLeido($leido = null, $comparison = null)
    {
        if (is_string($leido)) {
            $leido = in_array(strtolower($leido), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(BitacoraUsuarioPeer::LEIDO, $leido, $comparison);
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
     * @return BitacoraUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BitacoraUsuarioPeer::TIPO, $tipo, $comparison);
    }

    /**
     * Filter the query on the identificador column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentificador('fooValue');   // WHERE identificador = 'fooValue'
     * $query->filterByIdentificador('%fooValue%'); // WHERE identificador LIKE '%fooValue%'
     * </code>
     *
     * @param     string $identificador The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraUsuarioQuery The current query, for fluid interface
     */
    public function filterByIdentificador($identificador = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($identificador)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $identificador)) {
                $identificador = str_replace('*', '%', $identificador);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitacoraUsuarioPeer::IDENTIFICADOR, $identificador, $comparison);
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
     * @return BitacoraUsuarioQuery The current query, for fluid interface
     */
    public function filterByFecha($fecha = null, $comparison = null)
    {
        if (is_array($fecha)) {
            $useMinMax = false;
            if (isset($fecha['min'])) {
                $this->addUsingAlias(BitacoraUsuarioPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecha['max'])) {
                $this->addUsingAlias(BitacoraUsuarioPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitacoraUsuarioPeer::FECHA, $fecha, $comparison);
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
     * @return BitacoraUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BitacoraUsuarioPeer::ARCHIVO_UNO, $archivoUno, $comparison);
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
     * @return BitacoraUsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BitacoraUsuarioPeer::ARCHIVO_DOS, $archivoDos, $comparison);
    }

    /**
     * Filter the query by a related Usuario object
     *
     * @param   Usuario|PropelObjectCollection $usuario The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   BitacoraUsuarioQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByUsuario($usuario, $comparison = null)
    {
        if ($usuario instanceof Usuario) {
            return $this
                ->addUsingAlias(BitacoraUsuarioPeer::USUARIO_ID, $usuario->getId(), $comparison);
        } elseif ($usuario instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BitacoraUsuarioPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return BitacoraUsuarioQuery The current query, for fluid interface
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
     * @param   BitacoraUsuario $bitacoraUsuario Object to remove from the list of results
     *
     * @return BitacoraUsuarioQuery The current query, for fluid interface
     */
    public function prune($bitacoraUsuario = null)
    {
        if ($bitacoraUsuario) {
            $this->addUsingAlias(BitacoraUsuarioPeer::ID, $bitacoraUsuario->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
