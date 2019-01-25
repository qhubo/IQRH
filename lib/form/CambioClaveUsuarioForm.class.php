<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class CambioClaveUsuarioForm extends sfForm {
 public function configure() {
   $this->setWidgets(array(
       
       "usuarioId" => new sfWidgetFormInputHidden (array("label" => "Nueva Clave", ),
                    array(
                           )),

        
        
        
     "nueva" => new sfWidgetFormInputPassword(array("label" => "Nueva Clave", ),
                    array("size" => "24",
                          "maxlength" => "32",
                          "title" => "Ingrese la Nueva Clave del Usuario",
                      'class' => 'form-control xmedium'
                           )),
     "verifica" => new sfWidgetFormInputPassword(array("label" => "Verificación", ),
                    array("size" => "24",
                          "maxlength" => "32",
                          "title" => "Ingrese la Nueva Clave del Usuario nuevamente para su Comprobación",
                      'class' => 'form-control xmedium'
                           )),
   ));
   $this->setValidators(array(
     'nueva'       => new sfValidatorString(array("min_length" => 3,  ),
                                            array("min_length" => "Longitud Mínima de 6 Caracteres",  )),
     'verifica'    => new sfValidatorString(),
            'usuarioId'    => new sfValidatorString(),
    ));
   $this->validatorSchema->setPostValidator(
           new sfValidatorCallback(array("callback" => array($this, "validaCambio"  )))
          );
   /*
    *
           "callback" => new sfValidatorCallback(array('callback' => array($this, "validaCambio" )))
    */
   $this->widgetSchema->setNameFormat('clave[%s]');
 }
 public function validaCambio(sfValidatorBase $validator, array $values) {

 // $anterior = $values['anterior'];
  $nueva    = $values['nueva'];
  $verifica = $values['verifica'];
  $usuarioId  = sfContext::getInstance()->getUser()->getAttribute("registro", null, "seleccion");
  $usuarioId = $values['usuarioId'];
   if ($nueva != $verifica) {
     
      throw new sfValidatorErrorSchema($validator,
            array("nueva" => new sfValidatorError($validator, "Nueva Clave y Verificación no coinciden")));
   } else {

    $valido = UsuarioQuery::create()
            ->filterById($usuarioId)->findOne();
     if ($valido) {
    
      $valido->setClave(sha1($nueva));
      $valido->save();

     } else {
       throw new sfValidatorErrorSchema($validator,
             array("clave" => new sfValidatorError($validator, "Usuario/Clave Incorrecto")));
     }
   
   }
  return $values;
 }
}