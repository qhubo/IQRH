<?php

/**
 * AsistenciaUsuario form base class.
 *
 * @method AsistenciaUsuario getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseAsistenciaUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'empresa'      => new sfWidgetFormInputText(),
      'usuario'      => new sfWidgetFormInputText(),
      'dia'          => new sfWidgetFormDate(),
      'hora'         => new sfWidgetFormInputText(),
      'fecha_hora'   => new sfWidgetFormDateTime(),
      'tarde'        => new sfWidgetFormInputCheckbox(),
      'hora_tarde'   => new sfWidgetFormInputText(),
      'minuto_tarde' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'empresa'      => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'usuario'      => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'dia'          => new sfValidatorDate(array('required' => false)),
      'hora'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'fecha_hora'   => new sfValidatorDateTime(array('required' => false)),
      'tarde'        => new sfValidatorBoolean(array('required' => false)),
      'hora_tarde'   => new sfValidatorNumber(array('required' => false)),
      'minuto_tarde' => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('asistencia_usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AsistenciaUsuario';
  }


}
