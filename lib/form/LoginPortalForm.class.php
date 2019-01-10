<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginPortalForm extends sfForm {

    public function configure() {
        $this->setWidgets(array(
            "usuario" => new sfWidgetFormInputText(array("label" => "Usuario",), array("size" => "16",
                "maxlength" => "32",
                "title" => "Ingrese Usuario a Validar",
                "class" => "validate form-control",
                "placeholder" => "Usuario",
                "autocomplete" => "off",)),
            "clave" => new sfWidgetFormInputPassword(array("label" => "Clave",), array("size" => "16",
                "maxlength" => "32",
                "title" => "Ingrese la Clave del Usuario para su Validación",
                "placeholder" => "Clave",
                "class" => "validate form-control",)),
        ));

        $this->setValidators(array(
            'usuario' => new sfValidatorString(
                    array('min_length' => 1), array("min_length" => "Longitud Mínima 1 Caracteres",)),
            'clave' => new sfValidatorString(
                    array(), array("invalid" => "Campo Obligatorio",))
        ));

        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array(
            'callback' => array($this, "validaUsuario")
        )));

        $this->widgetSchema->setNameFormat('login[%s]');
    }

    public function validaUsuario(sfValidatorBase $validator, array $values) {

        $usuario = $values['usuario'];
        $clave = sha1($values['clave']);
        $user = sfContext::getInstance()->getUser();
        $user->clearCredentials();
        if ($usuario != "" && $values['clave'] != "") {
            $valido = UsuarioQuery::validaUsuario($usuario, $clave);
            $user = sfContext::getInstance()->getUser();
            if ($valido) {
                if ($valido->getValidado()) {
                    
                    
                     $empleados = UsuarioQuery::create()->filterByUsuarioJefe($valido->getId())->count();
       
    
        sfContext::getInstance()->getUser()->setAttribute('usuario','Empleado', 'tipo');
  if ($empleados >2 )  { 
        sfContext::getInstance()->getUser()->setAttribute('usuario','Supervisor', 'tipo');
  }
          
        
        
                    $user->setAuthenticated(true);
                    $user->setAttribute('usuario', $valido->getId(), 'seguridad');
                 //    sfContext::getInstance()->getUser()->setAttribute("usuario", $valido->getEmpresaId(), 'empresa');
                    $user->setAttribute('administrador', $valido->getAdministrador(), 'seguridad');
                    sfContext::getInstance()->getUser()->setAttribute('usuario', $valido->getId(), 'seguridad');
                    if ($valido->getImagen()) {
                        sfContext::getInstance()->getUser()->setAttribute('usuario', $valido->getImagen(), 'imagen');
                    }
                    $user->setAttribute('usuarioNombre', $valido->getUsuario(), 'seguridad');
                   $supervisa = UsuarioQuery::create()
                           ->filterByUsuarioJefe($valido->getId())
                           ->count();
                    
                   sfContext::getInstance()->getUser()->setAttribute('supervisa', $supervisa, 'seguridad');
                  
                sfContext::getInstance()->getUser()->setAttribute('administrador', $valido->getAdministrador(), 'seguridad');
                    UsuarioQuery::menuUsuario($valido->getId());
                } else {
                    $user->setFlash('error', 'Usuario no validado.');
                    throw new sfValidatorErrorSchema($validator, array("usuario" => new sfValidatorError($validator, 'Usuario no validado')));
                }
            } else {
                $msg = sfContext::getInstance()->getUser()->getFlash("login");
                $user->setAuthenticated(false);
                $user->getAttributeHolder('seguridad')->removeNamespace('seguridad');
                $user->setFlash('error', 'Ingrese credenciales correctas.');
                throw new sfValidatorErrorSchema($validator, array("clave" => new sfValidatorError($validator, $msg)));
            }
        }
        return $values;
    }

}
