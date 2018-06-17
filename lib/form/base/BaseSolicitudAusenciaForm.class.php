<?php

/**
 * SolicitudAusencia form base class.
 *
 * @method SolicitudAusencia getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseSolicitudAusenciaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'usuario_id'    => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'fecha'         => new sfWidgetFormDate(),
      'motivo'        => new sfWidgetFormInputText(),
      'observaciones' => new sfWidgetFormTextarea(),
      'estado'        => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario_id'    => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'fecha'         => new sfValidatorDate(array('required' => false)),
      'motivo'        => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'observaciones' => new sfValidatorString(array('required' => false)),
      'estado'        => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
      'updated_at'    => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('solicitud_ausencia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SolicitudAusencia';
  }


}
