<?php

/**
 * CapacitacionUsuario form base class.
 *
 * @method CapacitacionUsuario getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseCapacitacionUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'usuario_id'    => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'nombre'        => new sfWidgetFormInputText(),
      'fecha'         => new sfWidgetFormDate(),
      'observaciones' => new sfWidgetFormTextarea(),
      'archivo_uno'   => new sfWidgetFormInputText(),
      'archivo_dos'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario_id'    => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'nombre'        => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'fecha'         => new sfValidatorDate(array('required' => false)),
      'observaciones' => new sfValidatorString(array('required' => false)),
      'archivo_uno'   => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'archivo_dos'   => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('capacitacion_usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CapacitacionUsuario';
  }


}
