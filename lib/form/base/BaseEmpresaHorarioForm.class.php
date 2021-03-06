<?php

/**
 * EmpresaHorario form base class.
 *
 * @method EmpresaHorario getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseEmpresaHorarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'empresa'         => new sfWidgetFormInputText(),
      'hora'            => new sfWidgetFormInputText(),
      'hora_fin'        => new sfWidgetFormInputText(),
      'hora24'          => new sfWidgetFormInputText(),
      'hora_fin24'      => new sfWidgetFormInputText(),
      'estricto'        => new sfWidgetFormInputCheckbox(),
      'minuto_prorroga' => new sfWidgetFormInputText(),
      'texto_uno'       => new sfWidgetFormTextarea(),
      'texto_dos'       => new sfWidgetFormTextarea(),
      'correo_notifica' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'empresa'         => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'hora'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'hora_fin'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'hora24'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'hora_fin24'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'estricto'        => new sfValidatorBoolean(array('required' => false)),
      'minuto_prorroga' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'texto_uno'       => new sfValidatorString(array('required' => false)),
      'texto_dos'       => new sfValidatorString(array('required' => false)),
      'correo_notifica' => new sfValidatorString(array('max_length' => 300, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('empresa_horario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmpresaHorario';
  }


}
