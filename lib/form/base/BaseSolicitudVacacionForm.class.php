<?php

/**
 * SolicitudVacacion form base class.
 *
 * @method SolicitudVacacion getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseSolicitudVacacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'usuario_id'        => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'fecha_inicio'      => new sfWidgetFormDate(),
      'fecha_fin'         => new sfWidgetFormDate(),
      'dia'               => new sfWidgetFormInputText(),
      'motivo'            => new sfWidgetFormInputText(),
      'observaciones'     => new sfWidgetFormTextarea(),
      'usuario_modero'    => new sfWidgetFormInputText(),
      'estado'            => new sfWidgetFormInputText(),
      'comentario_modero' => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'jefe'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario_id'        => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'fecha_inicio'      => new sfValidatorDate(array('required' => false)),
      'fecha_fin'         => new sfValidatorDate(array('required' => false)),
      'dia'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'motivo'            => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'observaciones'     => new sfValidatorString(array('required' => false)),
      'usuario_modero'    => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'estado'            => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'comentario_modero' => new sfValidatorString(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'jefe'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('solicitud_vacacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SolicitudVacacion';
  }


}
