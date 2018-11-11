<?php

/**
 * AusenciaDetalle form base class.
 *
 * @method AusenciaDetalle getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseAusenciaDetalleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'usuario_id'            => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'solicitud_ausencia_id' => new sfWidgetFormPropelChoice(array('model' => 'SolicitudAusencia', 'add_empty' => true)),
      'dia'                   => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario_id'            => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'solicitud_ausencia_id' => new sfValidatorPropelChoice(array('model' => 'SolicitudAusencia', 'column' => 'id', 'required' => false)),
      'dia'                   => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ausencia_detalle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AusenciaDetalle';
  }


}
