<?php

/**
 * DiaFeriado form base class.
 *
 * @method DiaFeriado getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseDiaFeriadoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'  => new sfWidgetFormInputHidden(),
      'dia' => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'dia' => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dia_feriado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DiaFeriado';
  }


}
