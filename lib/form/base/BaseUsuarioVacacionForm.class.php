<?php

/**
 * UsuarioVacacion form base class.
 *
 * @method UsuarioVacacion getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseUsuarioVacacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'usuario' => new sfWidgetFormInputText(),
      'periodo' => new sfWidgetFormInputText(),
      'pagado'  => new sfWidgetFormInputText(),
      'derecho' => new sfWidgetFormInputText(),
      'nuevo'   => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'periodo' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'pagado'  => new sfValidatorNumber(array('required' => false)),
      'derecho' => new sfValidatorNumber(array('required' => false)),
      'nuevo'   => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario_vacacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioVacacion';
  }


}
