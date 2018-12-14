<?php

/**
 * Licenciamiento form base class.
 *
 * @method Licenciamiento getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseLicenciamientoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'empresa' => new sfWidgetFormInputText(),
      'mac'     => new sfWidgetFormInputText(),
      'activo'  => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'empresa' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'mac'     => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'activo'  => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('licenciamiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Licenciamiento';
  }


}
