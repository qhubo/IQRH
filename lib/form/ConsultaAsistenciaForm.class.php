<?php

class ConsultaAsistenciaForm extends sfForm {

    public function configure() {
        $this->setWidget('fechaInicio', new sfWidgetFormInputText(array(), array('class' => 'form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
        $this->setValidator('fechaInicio', new sfValidatorString(array('required' => true)));
        $this->setWidget('fechaFin', new sfWidgetFormInputText(array(), array('class' => 'form-control',
            'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
        $this->setValidator('fechaFin', new sfValidatorString(array('required' => true)));

             $empresas = UsuarioQuery::create()
                ->filterByEmpresa('', Criteria::NOT_EQUAL)
                ->orderByEmpresa()
                ->groupByEmpresa()
                ->find();
             $opcionesU[null]='Seleccione Empresa';
        foreach ($empresas as $lista) {
            $opcionesU[$lista->getEmpresa()]=$lista->getEmpresa();
        }
        
         $this->setWidget('empresa', new sfWidgetFormChoice(array(
            "choices" => $opcionesU,
                ), array("class" => " form-control")));

        $this->setValidator('empresa', new sfValidatorString(array('required' => true)));

        
        
        $this->widgetSchema->setNameFormat('consulta[%s]');
        
        
    }
}