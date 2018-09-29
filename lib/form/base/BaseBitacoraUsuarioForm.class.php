<?php

/**
 * BitacoraUsuario form base class.
 *
 * @method BitacoraUsuario getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseBitacoraUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'usuario_id'    => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'usuario_jefe'  => new sfWidgetFormInputText(),
      'motivo'        => new sfWidgetFormTextarea(),
      'leido'         => new sfWidgetFormInputCheckbox(),
      'tipo'          => new sfWidgetFormInputText(),
      'identificador' => new sfWidgetFormInputText(),
      'fecha'         => new sfWidgetFormDateTime(),
      'archivo_uno'   => new sfWidgetFormInputText(),
      'archivo_dos'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario_id'    => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'usuario_jefe'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'motivo'        => new sfValidatorString(array('required' => false)),
      'leido'         => new sfValidatorBoolean(array('required' => false)),
      'tipo'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'identificador' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'fecha'         => new sfValidatorDateTime(array('required' => false)),
      'archivo_uno'   => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'archivo_dos'   => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bitacora_usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BitacoraUsuario';
  }


}
