<?php

/**
 * ProyeccionVacacion filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseProyeccionVacacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario'      => new sfWidgetFormFilterInput(),
      'fecha_inicio' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_fin'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'periodo'      => new sfWidgetFormFilterInput(),
      'dia_vacacion' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'estatus'      => new sfWidgetFormFilterInput(),
      'usuario_creo' => new sfWidgetFormFilterInput(),
      'fecha_crea'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'usuario'      => new sfValidatorPass(array('required' => false)),
      'fecha_inicio' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_fin'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'periodo'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dia_vacacion' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'estatus'      => new sfValidatorPass(array('required' => false)),
      'usuario_creo' => new sfValidatorPass(array('required' => false)),
      'fecha_crea'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('proyeccion_vacacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyeccionVacacion';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'usuario'      => 'Text',
      'fecha_inicio' => 'Date',
      'fecha_fin'    => 'Date',
      'periodo'      => 'Number',
      'dia_vacacion' => 'Boolean',
      'estatus'      => 'Text',
      'usuario_creo' => 'Text',
      'fecha_crea'   => 'Date',
    );
  }
}
