<?php



/**
 * This class defines the structure of the 'parametro' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 01/12/19 03:45:02
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ParametroTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ParametroTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('parametro');
        $this->setPhpName('Parametro');
        $this->setClassname('Parametro');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('CODIGO', 'Codigo', 'VARCHAR', false, 50, null);
        $this->addColumn('SLOGAN', 'Slogan', 'LONGVARCHAR', false, null, null);
        $this->addColumn('LOGO', 'Logo', 'VARCHAR', false, 150, null);
        $this->addColumn('PUERTO_CORREO', 'PuertoCorreo', 'VARCHAR', false, 50, null);
        $this->addColumn('SMTP_CORREO', 'SmtpCorreo', 'VARCHAR', false, 50, null);
        $this->addColumn('USUARIO_CORREO', 'UsuarioCorreo', 'VARCHAR', false, 100, null);
        $this->addColumn('CLAVE_CORREO', 'ClaveCorreo', 'VARCHAR', false, 100, null);
        $this->addColumn('BANNER_REPORTE', 'BannerReporte', 'VARCHAR', false, 250, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
        );
    } // getBehaviors()

} // ParametroTableMap
