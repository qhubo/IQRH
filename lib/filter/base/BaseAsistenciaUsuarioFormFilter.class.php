<?php

/**
 * AsistenciaUsuario filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseAsistenciaUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa'    => new sfWidgetFormFilterInput(),
      'usuario'    => new sfWidgetFormFilterInput(),
      'dia'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora'       => new sfWidgetFormFilterInput(),
      'fecha_hora' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'tarde'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'hora_tarde' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'empresa'    => new sfValidatorPass(array('required' => false)),
      'usuario'    => new sfValidatorPass(array('required' => false)),
      'dia'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora'       => new sfValidatorPass(array('required' => false)),
      'fecha_hora' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'tarde'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'hora_tarde' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('asistencia_usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AsistenciaUsuario';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'empresa'    => 'Text',
      'usuario'    => 'Text',
      'dia'        => 'Date',
      'hora'       => 'Text',
      'fecha_hora' => 'Date',
      'tarde'      => 'Boolean',
      'hora_tarde' => 'Number',
    );
  }
}
