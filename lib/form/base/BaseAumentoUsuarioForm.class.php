<?php

/**
 * AumentoUsuario form base class.
 *
 * @method AumentoUsuario getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseAumentoUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'usuario_id'      => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'fecha_aumento'   => new sfWidgetFormDate(),
      'sueldo_anterior' => new sfWidgetFormInputText(),
      'puesto_anterior' => new sfWidgetFormInputText(),
      'sueldo'          => new sfWidgetFormInputText(),
      'nuevo_puesto'    => new sfWidgetFormInputText(),
      'observaciones'   => new sfWidgetFormTextarea(),
      'archivo_uno'     => new sfWidgetFormInputText(),
      'archivo_dos'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario_id'      => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'fecha_aumento'   => new sfValidatorDate(array('required' => false)),
      'sueldo_anterior' => new sfValidatorNumber(array('required' => false)),
      'puesto_anterior' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'sueldo'          => new sfValidatorNumber(array('required' => false)),
      'nuevo_puesto'    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'observaciones'   => new sfValidatorString(array('required' => false)),
      'archivo_uno'     => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'archivo_dos'     => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('aumento_usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AumentoUsuario';
  }


}
