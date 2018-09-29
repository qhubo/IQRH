<?php

/**
 * TipoAusencia form.
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
class TipoAusenciaForm extends BaseTipoAusenciaForm {

    public function configure() {

        $empresas = UsuarioQuery::create()
                ->filterByEmpresa('', Criteria::NOT_EQUAL)
                ->orderByEmpresa()
                ->groupByEmpresa()
                ->find();
        $opcionesPa['Todas'] = 'Todas Las Empresas';
        foreach ($empresas as $lista) {
            $opcionesPa[$lista->getEmpresa()] = $lista->getEmpresa();
        }


        $this->setWidget('empresa', new sfWidgetFormChoice(array(
            "choices" => $opcionesPa,
                ), array("class" => " form-control input-xlarge")));
    }

}
