<?php

class IngresoAusenciaForm extends sfForm {

    public function configure() {
   

        $tipoAusencia = TipoAusenciaQuery::create()->find();
         $listaTip[null]='Personal';
        foreach($tipoAusencia as $listaA) {
            $listaTip[$listaA->getId()]=$listaA->getNombre();
        }
        
         $this->setWidget('tipo', new sfWidgetFormChoice(array(
            "choices" => $listaTip,
                ), array("class" => "form-control")));
        $this->setValidator('tipo', new sfValidatorString(array('required' => false)));
        
             $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $usuarioQ = UsuarioQuery::create()->findOneById($usuarioId);
        $lista[$usuarioQ->getId()] = $usuarioQ->getNombreCompleto();
        $empleados = UsuarioQuery::create()
                ->filterByActivo(true)
                ->orderByNombreCompleto()
                ->filterByUsuarioJefe($usuarioId)
                ->find();
        foreach ($empleados as $listado) {
            $lista[$listado->getId()] = $listado->getNombreCompleto();
        }
        $this->setWidget('empleado', new sfWidgetFormChoice(array(
            "choices" => $lista,
                ), array("class" => "form-control")));
        $this->setValidator('empleado', new sfValidatorString(array('required' => true)));
  $this->setWidget(
                "archivo", new sfWidgetFormInputFile(array(), array(
            "class" => "file-upload btn btn-file-upload",
        )));
        $this->setValidator('archivo', new sfValidatorFile(array('required' => false), array()));


        $this->setWidget('dia', new sfWidgetFormInputText(array(), array('class' => 'form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
        $this->setValidator('dia', new sfValidatorString(array('required' => true)));

        
//        
//        $this->setWidget('diaFin', new sfWidgetFormInputText(array(), array('class' => 'form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
//        $this->setValidator('diaFin', new sfValidatorString(array('required' => false)));
//        
        $this->setWidget('observaciones', new sfWidgetFormTextarea(array(), array('class' => 'form-control')));
        $this->setValidator('observaciones', new sfValidatorString(array('required' => false)));


        
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array(
            'callback' => array($this, "valida")
        )));

        $this->widgetSchema->setNameFormat('consulta[%s]');
    }

    public function valida(sfValidatorBase $validator, array $values) {
    //    $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $usuarioId=$values['empleado'];
        $fechaInicio = $values['dia'];
        if ($fechaInicio) {
            $fechaInicio = explode('/', $fechaInicio);
            $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
            $ausencia = SolicitudAusenciaQuery::create()
                    ->filterByUsuarioId($usuarioId)
                    ->filterByFecha($fechaInicio)
                    ->count();
              if ($fechaInicio <= date('Y-m-d')) {
                $msg = 'La fecha de inicio no puede ser menor a la fecha actual';
                throw new sfValidatorErrorSchema($validator, array("dia" => new sfValidatorError($validator, $msg)));
                
                
            }
            
            
            if ($ausencia > 0) {
                $msg = 'Ausencia ya ingresa para este día';
                throw new sfValidatorErrorSchema($validator, array("observaciones" => new sfValidatorError($validator, $msg)));
            }
        }
        return $values;
    }

}
