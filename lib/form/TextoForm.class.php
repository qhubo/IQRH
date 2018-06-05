<?php
class TextoForm extends sfForm {
    public function configure() {
        $this->setWidget('observaciones', new sfWidgetFormTextarea(array(), array('class' => 'form-control EditorMce')));
        $this->setValidator('observaciones', new sfValidatorString(array('required' => false)));
        

   
        $this->widgetSchema->setNameFormat('consulta[%s]');
    }
}