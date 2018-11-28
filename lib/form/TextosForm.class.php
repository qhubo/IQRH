<?php

class TextosForm extends sfForm {

    public function configure() {
   

        $this->setWidget('texto', new sfWidgetFormTextarea(array(), array('class' => 'form-control')));
        $this->setValidator('texto', new sfValidatorString(array('required' => false)));


        $this->setWidget('texto2', new sfWidgetFormTextarea(array(), array('class' => 'form-control')));
        $this->setValidator('text2', new sfValidatorString(array('required' => false)));

        $this->widgetSchema->setNameFormat('consulta[%s]');
    }



}
