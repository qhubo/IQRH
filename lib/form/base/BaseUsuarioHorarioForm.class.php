<?php

/**
 * UsuarioHorario form base class.
 *
 * @method UsuarioHorario getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseUsuarioHorarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'usuario'         => new sfWidgetFormInputText(),
      'hora'            => new sfWidgetFormInputText(),
      'hora_fin'        => new sfWidgetFormInputText(),
      'hora24'          => new sfWidgetFormInputText(),
      'hora_fin24'      => new sfWidgetFormInputText(),
      'estricto'        => new sfWidgetFormInputCheckbox(),
      'minuto_prorroga' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario'         => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'hora'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'hora_fin'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'hora24'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'hora_fin24'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'estricto'        => new sfValidatorBoolean(array('required' => false)),
      'minuto_prorroga' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario_horario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioHorario';
  }


}
