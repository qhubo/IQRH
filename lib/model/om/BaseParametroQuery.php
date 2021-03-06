<?php


/**
 * Base class that represents a query for the 'parametro' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 08/09/19 22:15:14
 *
 * @method ParametroQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ParametroQuery orderByCodigo($order = Criteria::ASC) Order by the codigo column
 * @method ParametroQuery orderBySlogan($order = Criteria::ASC) Order by the slogan column
 * @method ParametroQuery orderByLogo($order = Criteria::ASC) Order by the logo column
 * @method ParametroQuery orderByPuertoCorreo($order = Criteria::ASC) Order by the puerto_correo column
 * @method ParametroQuery orderBySmtpCorreo($order = Criteria::ASC) Order by the smtp_correo column
 * @method ParametroQuery orderByUsuarioCorreo($order = Criteria::ASC) Order by the usuario_correo column
 * @method ParametroQuery orderByClaveCorreo($order = Criteria::ASC) Order by the clave_correo column
 * @method ParametroQuery orderByBannerReporte($order = Criteria::ASC) Order by the banner_reporte column
 * @method ParametroQuery orderByCorreoNotifica($order = Criteria::ASC) Order by the correo_notifica column
 * @method ParametroQuery orderByNotificaMarca($order = Criteria::ASC) Order by the notifica_marca column
 *
 * @method ParametroQuery groupById() Group by the id column
 * @method ParametroQuery groupByCodigo() Group by the codigo column
 * @method ParametroQuery groupBySlogan() Group by the slogan column
 * @method ParametroQuery groupByLogo() Group by the logo column
 * @method ParametroQuery groupByPuertoCorreo() Group by the puerto_correo column
 * @method ParametroQuery groupBySmtpCorreo() Group by the smtp_correo column
 * @method ParametroQuery groupByUsuarioCorreo() Group by the usuario_correo column
 * @method ParametroQuery groupByClaveCorreo() Group by the clave_correo column
 * @method ParametroQuery groupByBannerReporte() Group by the banner_reporte column
 * @method ParametroQuery groupByCorreoNotifica() Group by the correo_notifica column
 * @method ParametroQuery groupByNotificaMarca() Group by the notifica_marca column
 *
 * @method ParametroQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ParametroQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ParametroQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Parametro findOne(PropelPDO $con = null) Return the first Parametro matching the query
 * @method Parametro findOneOrCreate(PropelPDO $con = null) Return the first Parametro matching the query, or a new Parametro object populated from the query conditions when no match is found
 *
 * @method Parametro findOneById(int $id) Return the first Parametro filtered by the id column
 * @method Parametro findOneByCodigo(string $codigo) Return the first Parametro filtered by the codigo column
 * @method Parametro findOneBySlogan(string $slogan) Return the first Parametro filtered by the slogan column
 * @method Parametro findOneByLogo(string $logo) Return the first Parametro filtered by the logo column
 * @method Parametro findOneByPuertoCorreo(string $puerto_correo) Return the first Parametro filtered by the puerto_correo column
 * @method Parametro findOneBySmtpCorreo(string $smtp_correo) Return the first Parametro filtered by the smtp_correo column
 * @method Parametro findOneByUsuarioCorreo(string $usuario_correo) Return the first Parametro filtered by the usuario_correo column
 * @method Parametro findOneByClaveCorreo(string $clave_correo) Return the first Parametro filtered by the clave_correo column
 * @method Parametro findOneByBannerReporte(string $banner_reporte) Return the first Parametro filtered by the banner_reporte column
 * @method Parametro findOneByCorreoNotifica(string $correo_notifica) Return the first Parametro filtered by the correo_notifica column
 * @method Parametro findOneByNotificaMarca(boolean $notifica_marca) Return the first Parametro filtered by the notifica_marca column
 *
 * @method array findById(int $id) Return Parametro objects filtered by the id column
 * @method array findByCodigo(string $codigo) Return Parametro objects filtered by the codigo column
 * @method array findBySlogan(string $slogan) Return Parametro objects filtered by the slogan column
 * @method array findByLogo(string $logo) Return Parametro objects filtered by the logo column
 * @method array findByPuertoCorreo(string $puerto_correo) Return Parametro objects filtered by the puerto_correo column
 * @method array findBySmtpCorreo(string $smtp_correo) Return Parametro objects filtered by the smtp_correo column
 * @method array findByUsuarioCorreo(string $usuario_correo) Return Parametro objects filtered by the usuario_correo column
 * @method array findByClaveCorreo(string $clave_correo) Return Parametro objects filtered by the clave_correo column
 * @method array findByBannerReporte(string $banner_reporte) Return Parametro objects filtered by the banner_reporte column
 * @method array findByCorreoNotifica(string $correo_notifica) Return Parametro objects filtered by the correo_notifica column
 * @method array findByNotificaMarca(boolean $notifica_marca) Return Parametro objects filtered by the notifica_marca column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseParametroQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseParametroQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Parametro', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ParametroQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ParametroQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ParametroQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ParametroQuery) {
            return $criteria;
        }
        $query = new ParametroQuery();
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
     * @return   Parametro|Parametro[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ParametroPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ParametroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Parametro A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CODIGO`, `SLOGAN`, `LOGO`, `PUERTO_CORREO`, `SMTP_CORREO`, `USUARIO_CORREO`, `CLAVE_CORREO`, `BANNER_REPORTE`, `CORREO_NOTIFICA`, `NOTIFICA_MARCA` FROM `parametro` WHERE `ID` = :p0';
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
            $obj = new Parametro();
            $obj->hydrate($row);
            ParametroPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Parametro|Parametro[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Parametro[]|mixed the list of results, formatted by the current formatter
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
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ParametroPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ParametroPeer::ID, $keys, Criteria::IN);
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
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ParametroPeer::ID, $id, $comparison);
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
     * @return ParametroQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ParametroPeer::CODIGO, $codigo, $comparison);
    }

    /**
     * Filter the query on the slogan column
     *
     * Example usage:
     * <code>
     * $query->filterBySlogan('fooValue');   // WHERE slogan = 'fooValue'
     * $query->filterBySlogan('%fooValue%'); // WHERE slogan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slogan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterBySlogan($slogan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slogan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $slogan)) {
                $slogan = str_replace('*', '%', $slogan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ParametroPeer::SLOGAN, $slogan, $comparison);
    }

    /**
     * Filter the query on the logo column
     *
     * Example usage:
     * <code>
     * $query->filterByLogo('fooValue');   // WHERE logo = 'fooValue'
     * $query->filterByLogo('%fooValue%'); // WHERE logo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByLogo($logo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $logo)) {
                $logo = str_replace('*', '%', $logo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ParametroPeer::LOGO, $logo, $comparison);
    }

    /**
     * Filter the query on the puerto_correo column
     *
     * Example usage:
     * <code>
     * $query->filterByPuertoCorreo('fooValue');   // WHERE puerto_correo = 'fooValue'
     * $query->filterByPuertoCorreo('%fooValue%'); // WHERE puerto_correo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $puertoCorreo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByPuertoCorreo($puertoCorreo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($puertoCorreo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $puertoCorreo)) {
                $puertoCorreo = str_replace('*', '%', $puertoCorreo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ParametroPeer::PUERTO_CORREO, $puertoCorreo, $comparison);
    }

    /**
     * Filter the query on the smtp_correo column
     *
     * Example usage:
     * <code>
     * $query->filterBySmtpCorreo('fooValue');   // WHERE smtp_correo = 'fooValue'
     * $query->filterBySmtpCorreo('%fooValue%'); // WHERE smtp_correo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $smtpCorreo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterBySmtpCorreo($smtpCorreo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($smtpCorreo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $smtpCorreo)) {
                $smtpCorreo = str_replace('*', '%', $smtpCorreo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ParametroPeer::SMTP_CORREO, $smtpCorreo, $comparison);
    }

    /**
     * Filter the query on the usuario_correo column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioCorreo('fooValue');   // WHERE usuario_correo = 'fooValue'
     * $query->filterByUsuarioCorreo('%fooValue%'); // WHERE usuario_correo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usuarioCorreo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByUsuarioCorreo($usuarioCorreo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usuarioCorreo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $usuarioCorreo)) {
                $usuarioCorreo = str_replace('*', '%', $usuarioCorreo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ParametroPeer::USUARIO_CORREO, $usuarioCorreo, $comparison);
    }

    /**
     * Filter the query on the clave_correo column
     *
     * Example usage:
     * <code>
     * $query->filterByClaveCorreo('fooValue');   // WHERE clave_correo = 'fooValue'
     * $query->filterByClaveCorreo('%fooValue%'); // WHERE clave_correo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $claveCorreo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByClaveCorreo($claveCorreo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($claveCorreo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $claveCorreo)) {
                $claveCorreo = str_replace('*', '%', $claveCorreo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ParametroPeer::CLAVE_CORREO, $claveCorreo, $comparison);
    }

    /**
     * Filter the query on the banner_reporte column
     *
     * Example usage:
     * <code>
     * $query->filterByBannerReporte('fooValue');   // WHERE banner_reporte = 'fooValue'
     * $query->filterByBannerReporte('%fooValue%'); // WHERE banner_reporte LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bannerReporte The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByBannerReporte($bannerReporte = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bannerReporte)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bannerReporte)) {
                $bannerReporte = str_replace('*', '%', $bannerReporte);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ParametroPeer::BANNER_REPORTE, $bannerReporte, $comparison);
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
     * @return ParametroQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ParametroPeer::CORREO_NOTIFICA, $correoNotifica, $comparison);
    }

    /**
     * Filter the query on the notifica_marca column
     *
     * Example usage:
     * <code>
     * $query->filterByNotificaMarca(true); // WHERE notifica_marca = true
     * $query->filterByNotificaMarca('yes'); // WHERE notifica_marca = true
     * </code>
     *
     * @param     boolean|string $notificaMarca The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function filterByNotificaMarca($notificaMarca = null, $comparison = null)
    {
        if (is_string($notificaMarca)) {
            $notifica_marca = in_array(strtolower($notificaMarca), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ParametroPeer::NOTIFICA_MARCA, $notificaMarca, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Parametro $parametro Object to remove from the list of results
     *
     * @return ParametroQuery The current query, for fluid interface
     */
    public function prune($parametro = null)
    {
        if ($parametro) {
            $this->addUsingAlias(ParametroPeer::ID, $parametro->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
