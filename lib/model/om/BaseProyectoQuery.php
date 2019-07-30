<?php


/**
 * Base class that represents a query for the 'proyecto' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 07/30/19 18:41:47
 *
 * @method ProyectoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ProyectoQuery orderByCodigo($order = Criteria::ASC) Order by the codigo column
 * @method ProyectoQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method ProyectoQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method ProyectoQuery orderByContacto($order = Criteria::ASC) Order by the contacto column
 * @method ProyectoQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method ProyectoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProyectoQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method ProyectoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method ProyectoQuery orderByNitProyecto($order = Criteria::ASC) Order by the nit_proyecto column
 * @method ProyectoQuery orderByRazonSocial($order = Criteria::ASC) Order by the razon_social column
 * @method ProyectoQuery orderByNomenclatura($order = Criteria::ASC) Order by the nomenclatura column
 * @method ProyectoQuery orderByUbicacionGeografica($order = Criteria::ASC) Order by the ubicacion_geografica column
 * @method ProyectoQuery orderByDocumentoRepresentante($order = Criteria::ASC) Order by the documento_representante column
 * @method ProyectoQuery orderByRepresentanteLegal($order = Criteria::ASC) Order by the representante_legal column
 * @method ProyectoQuery orderByGerente($order = Criteria::ASC) Order by the gerente column
 * @method ProyectoQuery orderByResidente($order = Criteria::ASC) Order by the residente column
 * @method ProyectoQuery orderByDepartamento($order = Criteria::ASC) Order by the departamento column
 * @method ProyectoQuery orderByMunicipio($order = Criteria::ASC) Order by the municipio column
 * @method ProyectoQuery orderByInterno($order = Criteria::ASC) Order by the interno column
 *
 * @method ProyectoQuery groupById() Group by the id column
 * @method ProyectoQuery groupByCodigo() Group by the codigo column
 * @method ProyectoQuery groupByNombre() Group by the nombre column
 * @method ProyectoQuery groupByTelefono() Group by the telefono column
 * @method ProyectoQuery groupByContacto() Group by the contacto column
 * @method ProyectoQuery groupByCreatedBy() Group by the created_by column
 * @method ProyectoQuery groupByCreatedAt() Group by the created_at column
 * @method ProyectoQuery groupByUpdatedBy() Group by the updated_by column
 * @method ProyectoQuery groupByUpdatedAt() Group by the updated_at column
 * @method ProyectoQuery groupByNitProyecto() Group by the nit_proyecto column
 * @method ProyectoQuery groupByRazonSocial() Group by the razon_social column
 * @method ProyectoQuery groupByNomenclatura() Group by the nomenclatura column
 * @method ProyectoQuery groupByUbicacionGeografica() Group by the ubicacion_geografica column
 * @method ProyectoQuery groupByDocumentoRepresentante() Group by the documento_representante column
 * @method ProyectoQuery groupByRepresentanteLegal() Group by the representante_legal column
 * @method ProyectoQuery groupByGerente() Group by the gerente column
 * @method ProyectoQuery groupByResidente() Group by the residente column
 * @method ProyectoQuery groupByDepartamento() Group by the departamento column
 * @method ProyectoQuery groupByMunicipio() Group by the municipio column
 * @method ProyectoQuery groupByInterno() Group by the interno column
 *
 * @method ProyectoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProyectoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProyectoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Proyecto findOne(PropelPDO $con = null) Return the first Proyecto matching the query
 * @method Proyecto findOneOrCreate(PropelPDO $con = null) Return the first Proyecto matching the query, or a new Proyecto object populated from the query conditions when no match is found
 *
 * @method Proyecto findOneById(int $id) Return the first Proyecto filtered by the id column
 * @method Proyecto findOneByCodigo(string $codigo) Return the first Proyecto filtered by the codigo column
 * @method Proyecto findOneByNombre(string $nombre) Return the first Proyecto filtered by the nombre column
 * @method Proyecto findOneByTelefono(string $telefono) Return the first Proyecto filtered by the telefono column
 * @method Proyecto findOneByContacto(string $contacto) Return the first Proyecto filtered by the contacto column
 * @method Proyecto findOneByCreatedBy(string $created_by) Return the first Proyecto filtered by the created_by column
 * @method Proyecto findOneByCreatedAt(string $created_at) Return the first Proyecto filtered by the created_at column
 * @method Proyecto findOneByUpdatedBy(string $updated_by) Return the first Proyecto filtered by the updated_by column
 * @method Proyecto findOneByUpdatedAt(string $updated_at) Return the first Proyecto filtered by the updated_at column
 * @method Proyecto findOneByNitProyecto(string $nit_proyecto) Return the first Proyecto filtered by the nit_proyecto column
 * @method Proyecto findOneByRazonSocial(string $razon_social) Return the first Proyecto filtered by the razon_social column
 * @method Proyecto findOneByNomenclatura(string $nomenclatura) Return the first Proyecto filtered by the nomenclatura column
 * @method Proyecto findOneByUbicacionGeografica(string $ubicacion_geografica) Return the first Proyecto filtered by the ubicacion_geografica column
 * @method Proyecto findOneByDocumentoRepresentante(string $documento_representante) Return the first Proyecto filtered by the documento_representante column
 * @method Proyecto findOneByRepresentanteLegal(string $representante_legal) Return the first Proyecto filtered by the representante_legal column
 * @method Proyecto findOneByGerente(string $gerente) Return the first Proyecto filtered by the gerente column
 * @method Proyecto findOneByResidente(string $residente) Return the first Proyecto filtered by the residente column
 * @method Proyecto findOneByDepartamento(string $departamento) Return the first Proyecto filtered by the departamento column
 * @method Proyecto findOneByMunicipio(string $municipio) Return the first Proyecto filtered by the municipio column
 * @method Proyecto findOneByInterno(string $interno) Return the first Proyecto filtered by the interno column
 *
 * @method array findById(int $id) Return Proyecto objects filtered by the id column
 * @method array findByCodigo(string $codigo) Return Proyecto objects filtered by the codigo column
 * @method array findByNombre(string $nombre) Return Proyecto objects filtered by the nombre column
 * @method array findByTelefono(string $telefono) Return Proyecto objects filtered by the telefono column
 * @method array findByContacto(string $contacto) Return Proyecto objects filtered by the contacto column
 * @method array findByCreatedBy(string $created_by) Return Proyecto objects filtered by the created_by column
 * @method array findByCreatedAt(string $created_at) Return Proyecto objects filtered by the created_at column
 * @method array findByUpdatedBy(string $updated_by) Return Proyecto objects filtered by the updated_by column
 * @method array findByUpdatedAt(string $updated_at) Return Proyecto objects filtered by the updated_at column
 * @method array findByNitProyecto(string $nit_proyecto) Return Proyecto objects filtered by the nit_proyecto column
 * @method array findByRazonSocial(string $razon_social) Return Proyecto objects filtered by the razon_social column
 * @method array findByNomenclatura(string $nomenclatura) Return Proyecto objects filtered by the nomenclatura column
 * @method array findByUbicacionGeografica(string $ubicacion_geografica) Return Proyecto objects filtered by the ubicacion_geografica column
 * @method array findByDocumentoRepresentante(string $documento_representante) Return Proyecto objects filtered by the documento_representante column
 * @method array findByRepresentanteLegal(string $representante_legal) Return Proyecto objects filtered by the representante_legal column
 * @method array findByGerente(string $gerente) Return Proyecto objects filtered by the gerente column
 * @method array findByResidente(string $residente) Return Proyecto objects filtered by the residente column
 * @method array findByDepartamento(string $departamento) Return Proyecto objects filtered by the departamento column
 * @method array findByMunicipio(string $municipio) Return Proyecto objects filtered by the municipio column
 * @method array findByInterno(string $interno) Return Proyecto objects filtered by the interno column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseProyectoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProyectoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Proyecto', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProyectoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ProyectoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProyectoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProyectoQuery) {
            return $criteria;
        }
        $query = new ProyectoQuery();
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
     * @return   Proyecto|Proyecto[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProyectoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProyectoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Proyecto A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CODIGO`, `NOMBRE`, `TELEFONO`, `CONTACTO`, `CREATED_BY`, `CREATED_AT`, `UPDATED_BY`, `UPDATED_AT`, `NIT_PROYECTO`, `RAZON_SOCIAL`, `NOMENCLATURA`, `UBICACION_GEOGRAFICA`, `DOCUMENTO_REPRESENTANTE`, `REPRESENTANTE_LEGAL`, `GERENTE`, `RESIDENTE`, `DEPARTAMENTO`, `MUNICIPIO`, `INTERNO` FROM `proyecto` WHERE `ID` = :p0';
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
            $obj = new Proyecto();
            $obj->hydrate($row);
            ProyectoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Proyecto|Proyecto[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Proyecto[]|mixed the list of results, formatted by the current formatter
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
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProyectoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProyectoPeer::ID, $keys, Criteria::IN);
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
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ProyectoPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByCodigo('fooValue');   // WHERE codigo = 'fooValue'
     * $query->filterByCodigo('%fooValue%'); // WHERE codigo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codigo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByCodigo($codigo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codigo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $codigo)) {
                $codigo = str_replace('*', '%', $codigo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::CODIGO, $codigo, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%'); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombre)) {
                $nombre = str_replace('*', '%', $nombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::NOMBRE, $nombre, $comparison);
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
     * @return ProyectoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProyectoPeer::TELEFONO, $telefono, $comparison);
    }

    /**
     * Filter the query on the contacto column
     *
     * Example usage:
     * <code>
     * $query->filterByContacto('fooValue');   // WHERE contacto = 'fooValue'
     * $query->filterByContacto('%fooValue%'); // WHERE contacto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contacto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByContacto($contacto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contacto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contacto)) {
                $contacto = str_replace('*', '%', $contacto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::CONTACTO, $contacto, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy('fooValue');   // WHERE created_by = 'fooValue'
     * $query->filterByCreatedBy('%fooValue%'); // WHERE created_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createdBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createdBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $createdBy)) {
                $createdBy = str_replace('*', '%', $createdBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::CREATED_BY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('fooValue');   // WHERE created_at = 'fooValue'
     * $query->filterByCreatedAt('%fooValue%'); // WHERE created_at LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createdAt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createdAt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $createdAt)) {
                $createdAt = str_replace('*', '%', $createdAt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedBy('fooValue');   // WHERE updated_by = 'fooValue'
     * $query->filterByUpdatedBy('%fooValue%'); // WHERE updated_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updatedBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updatedBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updatedBy)) {
                $updatedBy = str_replace('*', '%', $updatedBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('fooValue');   // WHERE updated_at = 'fooValue'
     * $query->filterByUpdatedAt('%fooValue%'); // WHERE updated_at LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updatedAt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updatedAt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updatedAt)) {
                $updatedAt = str_replace('*', '%', $updatedAt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the nit_proyecto column
     *
     * Example usage:
     * <code>
     * $query->filterByNitProyecto('fooValue');   // WHERE nit_proyecto = 'fooValue'
     * $query->filterByNitProyecto('%fooValue%'); // WHERE nit_proyecto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nitProyecto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByNitProyecto($nitProyecto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nitProyecto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nitProyecto)) {
                $nitProyecto = str_replace('*', '%', $nitProyecto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::NIT_PROYECTO, $nitProyecto, $comparison);
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
     * @return ProyectoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProyectoPeer::RAZON_SOCIAL, $razonSocial, $comparison);
    }

    /**
     * Filter the query on the nomenclatura column
     *
     * Example usage:
     * <code>
     * $query->filterByNomenclatura('fooValue');   // WHERE nomenclatura = 'fooValue'
     * $query->filterByNomenclatura('%fooValue%'); // WHERE nomenclatura LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomenclatura The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByNomenclatura($nomenclatura = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomenclatura)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomenclatura)) {
                $nomenclatura = str_replace('*', '%', $nomenclatura);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::NOMENCLATURA, $nomenclatura, $comparison);
    }

    /**
     * Filter the query on the ubicacion_geografica column
     *
     * Example usage:
     * <code>
     * $query->filterByUbicacionGeografica('fooValue');   // WHERE ubicacion_geografica = 'fooValue'
     * $query->filterByUbicacionGeografica('%fooValue%'); // WHERE ubicacion_geografica LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ubicacionGeografica The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByUbicacionGeografica($ubicacionGeografica = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ubicacionGeografica)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ubicacionGeografica)) {
                $ubicacionGeografica = str_replace('*', '%', $ubicacionGeografica);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::UBICACION_GEOGRAFICA, $ubicacionGeografica, $comparison);
    }

    /**
     * Filter the query on the documento_representante column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumentoRepresentante('fooValue');   // WHERE documento_representante = 'fooValue'
     * $query->filterByDocumentoRepresentante('%fooValue%'); // WHERE documento_representante LIKE '%fooValue%'
     * </code>
     *
     * @param     string $documentoRepresentante The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByDocumentoRepresentante($documentoRepresentante = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($documentoRepresentante)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $documentoRepresentante)) {
                $documentoRepresentante = str_replace('*', '%', $documentoRepresentante);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::DOCUMENTO_REPRESENTANTE, $documentoRepresentante, $comparison);
    }

    /**
     * Filter the query on the representante_legal column
     *
     * Example usage:
     * <code>
     * $query->filterByRepresentanteLegal('fooValue');   // WHERE representante_legal = 'fooValue'
     * $query->filterByRepresentanteLegal('%fooValue%'); // WHERE representante_legal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $representanteLegal The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByRepresentanteLegal($representanteLegal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($representanteLegal)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $representanteLegal)) {
                $representanteLegal = str_replace('*', '%', $representanteLegal);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::REPRESENTANTE_LEGAL, $representanteLegal, $comparison);
    }

    /**
     * Filter the query on the gerente column
     *
     * Example usage:
     * <code>
     * $query->filterByGerente('fooValue');   // WHERE gerente = 'fooValue'
     * $query->filterByGerente('%fooValue%'); // WHERE gerente LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gerente The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByGerente($gerente = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gerente)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $gerente)) {
                $gerente = str_replace('*', '%', $gerente);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::GERENTE, $gerente, $comparison);
    }

    /**
     * Filter the query on the residente column
     *
     * Example usage:
     * <code>
     * $query->filterByResidente('fooValue');   // WHERE residente = 'fooValue'
     * $query->filterByResidente('%fooValue%'); // WHERE residente LIKE '%fooValue%'
     * </code>
     *
     * @param     string $residente The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByResidente($residente = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($residente)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $residente)) {
                $residente = str_replace('*', '%', $residente);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::RESIDENTE, $residente, $comparison);
    }

    /**
     * Filter the query on the departamento column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartamento('fooValue');   // WHERE departamento = 'fooValue'
     * $query->filterByDepartamento('%fooValue%'); // WHERE departamento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $departamento The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByDepartamento($departamento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departamento)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $departamento)) {
                $departamento = str_replace('*', '%', $departamento);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::DEPARTAMENTO, $departamento, $comparison);
    }

    /**
     * Filter the query on the municipio column
     *
     * Example usage:
     * <code>
     * $query->filterByMunicipio('fooValue');   // WHERE municipio = 'fooValue'
     * $query->filterByMunicipio('%fooValue%'); // WHERE municipio LIKE '%fooValue%'
     * </code>
     *
     * @param     string $municipio The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByMunicipio($municipio = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($municipio)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $municipio)) {
                $municipio = str_replace('*', '%', $municipio);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::MUNICIPIO, $municipio, $comparison);
    }

    /**
     * Filter the query on the interno column
     *
     * Example usage:
     * <code>
     * $query->filterByInterno('fooValue');   // WHERE interno = 'fooValue'
     * $query->filterByInterno('%fooValue%'); // WHERE interno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $interno The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function filterByInterno($interno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($interno)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $interno)) {
                $interno = str_replace('*', '%', $interno);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProyectoPeer::INTERNO, $interno, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Proyecto $proyecto Object to remove from the list of results
     *
     * @return ProyectoQuery The current query, for fluid interface
     */
    public function prune($proyecto = null)
    {
        if ($proyecto) {
            $this->addUsingAlias(ProyectoPeer::ID, $proyecto->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
