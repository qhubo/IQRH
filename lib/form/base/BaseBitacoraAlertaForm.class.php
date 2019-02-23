<?php

/**
 * BitacoraAlerta form base class.
 *
 * @method BitacoraAlerta getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseBitacoraAlertaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'empresa' => new sfWidgetFormInputText(),
      'fecha'   => new sfWidgetFormDate(),
      'hora'    => new sfWidgetFormInputText(),
      'minuto'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'empresa' => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'fecha'   => new sfValidatorDate(array('required' => false)),
      'hora'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'minuto'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bitacora_alerta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BitacoraAlerta';
  }


}
