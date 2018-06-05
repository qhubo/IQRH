<?php

class ConsultaFechaEstadoForm extends sfForm {

    public function configure() {
        $this->setWidget('fechaInicio', new sfWidgetFormInputText(array(), array('class' => 'form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
        $this->setValidator('fechaInicio', new sfValidatorString(array('required' => true)));
        $this->setWidget('fechaFin', new sfWidgetFormInputText(array(), array('class' => 'form-control',
            'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
        $this->setValidator('fechaFin', new sfValidatorString(array('required' => true)));


        $opcionesP[null] = '[Todos los estados]';
        $opcionesP['Activo'] = 'Activo';
        $opcionesP['Cancelado'] = 'Cancelado';
        $opcionesP['Finalizado'] = 'Finalizado';
        $opcionesP['Nuevo'] = 'Nuevo';
        $opcionesP['Rechazado'] = 'Rechazado';
        
        $this->setWidget('estado', new sfWidgetFormChoice(array(
            "choices" => $opcionesP,
                ), array("class" => " form-control")));

        $this->setValidator('estado', new sfValidatorString(array('required' => false)));


        $this->widgetSchema->setNameFormat('consulta[%s]');
    }

}
