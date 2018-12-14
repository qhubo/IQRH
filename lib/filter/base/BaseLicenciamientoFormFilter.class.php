<?php

/**
 * Licenciamiento filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseLicenciamientoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa' => new sfWidgetFormFilterInput(),
      'mac'     => new sfWidgetFormFilterInput(),
      'activo'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'empresa' => new sfValidatorPass(array('required' => false)),
      'mac'     => new sfValidatorPass(array('required' => false)),
      'activo'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('licenciamiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Licenciamiento';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'empresa' => 'Text',
      'mac'     => 'Text',
      'activo'  => 'Boolean',
    );
  }
}
