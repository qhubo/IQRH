<?php

class SeleccionEmpleadoForm extends sfForm {

    public function configure() {
        $empresaseleccion=sfContext::getInstance()->getUser()->getAttribute('seleccion', null, 'empresa');  
        $usuario = UsuarioQuery::create()
                ->filterByEmpresa($empresaseleccion)
                ->orderByNombreCompleto()
                ->find();

        $registro = UsuarioQuery::create()
                ->orderByNombreCompleto()
                ->find();
        $listado[null]='[Seleccione]';
        foreach ($usuario as $query) {
            $listado[$query->getId()] =  $query->getNombreCompleto()."| ".$query->getCodigo();
        }

        foreach ($registro as $lista) {

            $this->setWidget('empleado_'.$lista->getId(), new sfWidgetFormChoice(array(
                "choices" => $listado,
                    ), array("class" => "form-control")));
            $this->setValidator('empleado_'.$lista->getId(), new sfValidatorString(array('required' => false)));
        }
        $this->widgetSchema->setNameFormat('consulta[%s]');
    }

}
