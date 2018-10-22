<?php

/**
 * EmpresaHorario form.
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
class EmpresaHorarioForm extends BaseEmpresaHorarioForm
{
  public function configure()
  {
        $empresas = UsuarioQuery::create()
                ->filterByEmpresa('', Criteria::NOT_EQUAL)
                ->orderByEmpresa()
                ->groupByEmpresa()
                ->find();
        $opcionesPa[null] = 'Seleccione Empresa';
        foreach ($empresas as $lista) {
            $opcionesPa[$lista->getEmpresa()] = $lista->getEmpresa();
        }


        $this->setWidget('empresa', new sfWidgetFormChoice(array(
            "choices" => $opcionesPa,
                ), array("class" => " form-control input-xlarge")));
  }
}
