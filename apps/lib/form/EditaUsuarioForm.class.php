<?php
class EditaUsuarioForm extends sfForm {
    public function configure() {


 

$this->setWidget('activo' , new sfWidgetFormInputCheckbox(array(),array('class'=>'checkbox') ));
            
            $this->setValidator('activo', new sfValidatorString(array('required' => false)));

        
    
        $this->setWidget('nombre_completo', new sfWidgetFormInputText(array(), array('class' => 'form-control',
            "placeholder" => "Ingreso Nombre",
        )));
        $this->setValidator('nombre_completo', new sfValidatorString(array('required' => true)));
  

        
          $this->setWidget('correo', new sfWidgetFormInputText(array(), array('class' => 'form-control',
            "type" => "email",
        )));
        $this->setValidator('correo', new sfValidatorString(array('required' => true)));
        
         $this->setWidget('empresa', new sfWidgetFormInputText(array(), array('class' => 'form-control',
            "placeholder" => "empresa",
        )));
        $this->setValidator('empresa', new sfValidatorString(array('required' => false)));
        
        $tipo['Publico'] = 'Publico';
        $tipo['Administrador'] = 'Administrador';
        $tipo['Moderador'] = 'Moderador';
      
        
        $this->setWidget('tipo', new sfWidgetFormChoice(array(
            "choices" => $tipo,
                ), array("class" => "form-control")));
        $this->setValidator('tipo', new sfValidatorString(array('required' => true)));
        $this->setWidget('observaciones', new sfWidgetFormTextarea(array(), array('class' => 'form-control EditorMce')));
        $this->setValidator('observaciones', new sfValidatorString(array('required' => false)));
        

   
        $this->widgetSchema->setNameFormat('consulta[%s]');
    }
}