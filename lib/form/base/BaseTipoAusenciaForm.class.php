<?php

/**
 * TipoAusencia form base class.
 *
 * @method TipoAusencia getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseTipoAusenciaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'empresa'      => new sfWidgetFormInputText(),
      'observacioes' => new sfWidgetFormTextarea(),
      'dia'          => new sfWidgetFormInputText(),
      'nombre'       => new sfWidgetFormInputText(),
      'activo'       => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'empresa'      => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'observacioes' => new sfValidatorString(array('required' => false)),
      'dia'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'nombre'       => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'activo'       => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_ausencia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoAusencia';
  }


}
