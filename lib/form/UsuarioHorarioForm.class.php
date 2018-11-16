<?php

/**
 * UsuarioHorario form.
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
class UsuarioHorarioForm extends BaseUsuarioHorarioForm
{
   public function configure()
  {
        $empresas = UsuarioQuery::create()
                ->filterByEmpresa('', Criteria::NOT_EQUAL)
                ->find();
        $opcionesPa[null] = 'Usuario';
        foreach ($empresas as $lista) {
            $opcionesPa[$lista->getCodigo()] = $lista->getNombreCompleto();
        }


        $this->setWidget('usuario', new sfWidgetFormChoice(array(
            "choices" => $opcionesPa,
                ), array("class" => " form-control input-xlarge")));
  }
}
