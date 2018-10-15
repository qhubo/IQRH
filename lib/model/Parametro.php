<?php



/**
 * Skeleton subclass for representing a row from the 'parametro' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 03/21/18 20:06:40
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Parametro extends BaseParametro
{
      public function save(PropelPDO $con = null) {
        if ($this->isNew()) {
            $tipo = 'Parametro';
            $pre = 'PAM';
            $numero = 1;
            $busca = CorrelativoCodigoQuery::create()
                    ->filterByTipo($tipo)
                    ->findOne();
            if (!$busca) {
                $busca = New CorrelativoCodigo();
                $busca->setTipo($tipo);
                $busca->setPrefijo($pre);
                $busca->setNumeroAsginar($numero);
                $busca->save();
            }

            $numero = $busca->getNumeroAsginar();
            $prefijo = $pre . $numero;
            if (strlen($numero) == 1) {
                $prefijo = $pre . '0' . $numero;
            }
            if ($numero > 99) {
                $prefijo = $pre . $numero;
            }
            $this->setCodigo($prefijo);
            $busca->setNumeroAsginar($numero + 1);
            $busca->save();
        }
        return parent::save($con);
    }

}