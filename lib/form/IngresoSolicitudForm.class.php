<?php

class IngresoSolicitudForm extends sfForm {

    public function configure() {
        $this->setWidget('motivo', new sfWidgetFormPropelChoice(
             array('model' => 'CatalogoSolicitud',
            'add_empty' => '[Seleccione Motivo]',
            'order_by' => array('Nombre', 'asc'),
                ), array('class' => 'form-control',
        )));
        $this->setValidator('motivo', new sfValidatorString(array('required' => true)));

//        $this->setWidget('dia', new sfWidgetFormInputText(array(), array('class' => 'form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
//        $this->setValidator('dia', new sfValidatorString(array('required' => true)));

        $this->setWidget('observaciones', new sfWidgetFormTextarea(array(), array('class' => 'form-control')));
        $this->setValidator('observaciones', new sfValidatorString(array('required' => true)));
  $this->setWidget(
                "archivo", new sfWidgetFormInputFile(array(), array(
            "class" => "file-upload btn btn-file-upload",
        )));
        $this->setValidator('archivo', new sfValidatorFile(array('required' => false), array()));


        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array(
            'callback' => array($this, "valida")
        )));

        $this->widgetSchema->setNameFormat('consulta[%s]');
    }

    public function valida(sfValidatorBase $validator, array $values) {
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $fechaInicio = $values['dia'];
        if ($fechaInicio) {
            $fechaInicio = explode('/', $fechaInicio);
            $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
            $ausencia = SolicitudAusenciaQuery::create()
                    ->filterByUsuarioId($usuarioId)
                    ->filterByFecha($fechaInicio)
                    ->count();
        if ($ausencia >0){
            $msg='Ausencia ya ingresa para este día';
            throw new sfValidatorErrorSchema($validator, array("observaciones" => new sfValidatorError($validator, $msg)));
        }
        }
        return $values;
    }

}
