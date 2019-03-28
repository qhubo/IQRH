<?php

/**
 * UsuarioAsistenciaReales filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseUsuarioAsistenciaRealesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario' => new sfWidgetFormFilterInput(),
      'dia'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'minutos' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'usuario' => new sfValidatorPass(array('required' => false)),
      'dia'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'minutos' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('usuario_asistencia_reales_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioAsistenciaReales';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'usuario' => 'Text',
      'dia'     => 'Date',
      'minutos' => 'Number',
    );
  }
}
