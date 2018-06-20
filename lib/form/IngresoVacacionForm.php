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

    $this->setWidget('dia', new sfWidgetFormInputText(array(), array('class' => 'form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
        $this->setValidator('dia', new sfValidatorString(array('required' => true)));
    
        $this->setWidget('diaFin', new sfWidgetFormInputText(array(), array('class' => 'form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
        $this->setValidator('diaFin', new sfValidatorString(array('required' => true)));
        
        
        $this->setWidget('observaciones', new sfWidgetFormTextarea(array(), array('class' => 'form-control')));
        $this->setValidator('observaciones', new sfValidatorString(array('required' => false)));
        

        $this->widgetSchema->setNameFormat('consulta[%s]');
    }
}