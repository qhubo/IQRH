<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'codigo'           => new sfWidgetFormInputText(),
      'usuario'          => new sfWidgetFormInputText(),
      'clave'            => new sfWidgetFormInputText(),
      'correo'           => new sfWidgetFormInputText(),
      'estado'           => new sfWidgetFormInputText(),
      'imagen'           => new sfWidgetFormInputText(),
      'administrador'    => new sfWidgetFormInputCheckbox(),
      'validado'         => new sfWidgetFormInputCheckbox(),
      'ultimo_ingreso'   => new sfWidgetFormDate(),
      'tema'             => new sfWidgetFormInputText(),
      'frase'            => new sfWidgetFormInputText(),
      'genero'           => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormDate(),
      'nombre_completo'  => new sfWidgetFormInputText(),
      'empresa'          => new sfWidgetFormInputText(),
      'logo'             => new sfWidgetFormInputText(),
      'activo'           => new sfWidgetFormInputCheckbox(),
      'tipo_usuario'     => new sfWidgetFormInputText(),
      'observaciones'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'codigo'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'usuario'          => new sfValidatorString(array('max_length' => 32)),
      'clave'            => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'correo'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'estado'           => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'imagen'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'administrador'    => new sfValidatorBoolean(array('required' => false)),
      'validado'         => new sfValidatorBoolean(array('required' => false)),
      'ultimo_ingreso'   => new sfValidatorDate(array('required' => false)),
      'tema'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'frase'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'genero'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'fecha_nacimiento' => new sfValidatorDate(array('required' => false)),
      'nombre_completo'  => new sfValidatorString(array('max_length' => 320, 'required' => false)),
      'empresa'          => new sfValidatorString(array('max_length' => 320, 'required' => false)),
      'logo'             => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'activo'           => new sfValidatorBoolean(array('required' => false)),
      'tipo_usuario'     => new sfValidatorString(array('max_length' => 320, 'required' => false)),
      'observaciones'    => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Usuario', 'column' => array('usuario')))
    );

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }


}
