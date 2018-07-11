<?php
class IngresaCampForm extends sfForm {
    public function configure() {
        $this->setWidget('motivo', new sfWidgetFormInputText(array(), array('class' => 'form-control qRequired',
        )));
        $this->setValidator('motivo', new sfValidatorString(array('required' => true)));
        
//           $this->setWidget('referencia', new sfWidgetFormInputText(array(), array('class' => 'form-control qRequired',
//        )));
//        $this->setValidator('referencia', new sfValidatorString(array('required' => true)));
        $this->widgetSchema->setNameFormat('consulta[%s]');
    }
}