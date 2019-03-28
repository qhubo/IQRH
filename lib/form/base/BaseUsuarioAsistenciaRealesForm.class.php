<?php

/**
 * UsuarioAsistenciaReales form base class.
 *
 * @method UsuarioAsistenciaReales getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseUsuarioAsistenciaRealesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'usuario' => new sfWidgetFormInputText(),
      'dia'     => new sfWidgetFormDate(),
      'minutos' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'dia'     => new sfValidatorDate(array('required' => false)),
      'minutos' => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario_asistencia_reales[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioAsistenciaReales';
  }


}
