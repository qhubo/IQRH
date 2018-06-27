<?php

class IngresoFiniquitoForm extends sfForm {
    public function configure() {

$usuario = UsuarioQuery::create()
        ->orderByNombreCompleto()
        ->find();
        foreach ($usuario as $query){
     $lista[$query->getId()]= $query->getCodigo()." | ".$query->getNombreCompleto();
        }
        
        


        $this->setWidget('empleado', new sfWidgetFormChoice(array(
            "choices" => $lista,
                ), array("class" => "form-control")));
        $this->setValidator('empleado', new sfValidatorString(array('required' => false)));


        
        $tipo['1'] = 'Renuncia';
        $tipo['2'] = 'Despido';
        $this->setWidget('motivo', new sfWidgetFormChoice(array(
            "choices" => $tipo,
                ), array("class" => "form-control")));
        $this->setValidator('motivo', new sfValidatorString(array('required' => false)));
        

    $this->setWidget('dia', new sfWidgetFormInputText(array(), array('class' => 'form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')));
        $this->setValidator('dia', new sfValidatorString(array('required' => true)));
    

        
        $this->setWidget('observaciones', new sfWidgetFormTextarea(array(), array('class' => 'form-control')));
        $this->setValidator('observaciones', new sfValidatorString(array('required' => false)));
        

        $this->widgetSchema->setNameFormat('consulta[%s]');
    }
}