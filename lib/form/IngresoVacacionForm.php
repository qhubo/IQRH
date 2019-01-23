<?php

class IngresoVacacionForm extends sfForm {

    public function configure() {
//        $this->setWidget('motivo', new sfWidgetFormPropelChoice(
//             array('model' => 'MotivoMovimientoProducto',
//            'add_empty' => '[Selecciones Motivo Salida]',
//            'order_by' => array('Descripcion', 'asc'),
//                ), array('class' => 'form-control',
//        )));
//        $this->setValidator('motivo', new sfValidatorString(array('required' => true)));
             $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $usuarioQ = UsuarioQuery::create()->findOneById($usuarioId);
        $lista[$usuarioQ->getId()] = $usuarioQ->getNombreCompleto();
        $empleados = UsuarioQuery::create()
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
        $this->setWidget('diaInicio', new sfWidgetFormInputText(array(), array('class' => 'form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
        $this->setValidator('diaInicio', new sfValidatorString(array('required' => true)));

        
        $this->setWidget('dia', new sfWidgetFormInputText(array(), array('class' => 'form-control',
             'type' => 'number')));
        $this->setValidator('dia', new sfValidatorString(array('required' => true)));

        $this->setWidget('diaFin', new sfWidgetFormInputText(array(), array('class' => 'form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
        $this->setValidator('diaFin', new sfValidatorString(array('required' => true)));


        $this->setWidget('observaciones', new sfWidgetFormTextarea(array(), array('class' => 'form-control')));
        $this->setValidator('observaciones', new sfValidatorString(array('required' => false)));

        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array(
            'callback' => array($this, "valida")
        )));

        $this->widgetSchema->setNameFormat('consulta[%s]');
    }

    public function valida(sfValidatorBase $validator, array $values) {
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $usuarioId  = $values['empleado'];
        $fechaInicio = $values['diaInicio'];
        $fechaFin = $values['diaFin'];
        
        
        if ($fechaInicio) {
            $fechaInicio = explode('/', $fechaInicio);
            $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
            
            if ($fechaInicio < date('Y-m-d')) {
                $msg = 'La fecha de inicio no puede ser menor a la fecha actual';
                throw new sfValidatorErrorSchema($validator, array("diaInicio" => new sfValidatorError($validator, $msg)));
                
                
            }
            
            $ingreso = SolicitudVacacionQuery::create()
                    ->filterByUsuarioId($usuarioId)
                    ->where("SolicitudVacacion.FechaInicio <= '" . $fechaInicio . " 00:00:00" . "'")
                    ->where("SolicitudVacacion.FechaFin >= '" . $fechaInicio . " 23:59:00" . "'")
                    ->count();
            if ($ingreso > 0) {
                $msg = 'Ya se ingreso vacacion en este rango fechas';
                throw new sfValidatorErrorSchema($validator, array("observaciones" => new sfValidatorError($validator, $msg)));
            }
        }
        if (($fechaInicio) && ($fechaFin)) {
            $fechaInicio = explode('/', $values['diaInicio']);
            $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
            $fechaFin = explode('/', $fechaFin);
            $fechaFin = $fechaFin[2] . '-' . $fechaFin[1] . '-' . $fechaFin[0];
            if ($fechaInicio > $fechaFin) {
                $msg = 'Fecha Inicio no puede ser mayor que fecha Fin';
                throw new sfValidatorErrorSchema($validator, array("observaciones" => new sfValidatorError($validator, $msg)));
            }
        }
        return $values;
    }

}
