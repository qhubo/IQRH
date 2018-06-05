<?php
class cambioClaveForm extends sfForm {
    public function configure() {
        $this->setWidget('nueva', new sfWidgetFormInputPassword(array(), 
                array('class' => 'form-control')));
        $this->setValidator('nueva', new sfValidatorString(array('required' => false)));
                $this->setWidget('verifica', new sfWidgetFormInputPassword(array(), 
                array('class' => 'form-control')));
        $this->setValidator('verifica', new sfValidatorString(array('required' => false)));
        
        $this->widgetSchema->setNameFormat('consulta[%s]');
    }
}