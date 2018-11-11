<?php

/**
 * AusenciaDetalle filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseAusenciaDetalleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'            => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'solicitud_ausencia_id' => new sfWidgetFormPropelChoice(array('model' => 'SolicitudAusencia', 'add_empty' => true)),
      'dia'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'usuario_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'solicitud_ausencia_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SolicitudAusencia', 'column' => 'id')),
      'dia'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('ausencia_detalle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AusenciaDetalle';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'usuario_id'            => 'ForeignKey',
      'solicitud_ausencia_id' => 'ForeignKey',
      'dia'                   => 'Date',
    );
  }
}
