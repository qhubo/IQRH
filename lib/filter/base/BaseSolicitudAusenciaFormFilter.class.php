<?php

/**
 * SolicitudAusencia filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseSolicitudAusenciaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'        => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'fecha'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'motivo'            => new sfWidgetFormFilterInput(),
      'observaciones'     => new sfWidgetFormFilterInput(),
      'estado'            => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'jefe'              => new sfWidgetFormFilterInput(),
      'usuario_modero'    => new sfWidgetFormFilterInput(),
      'comentario_modero' => new sfWidgetFormFilterInput(),
      'archivo_uno'       => new sfWidgetFormFilterInput(),
      'archivo_dos'       => new sfWidgetFormFilterInput(),
      'fecha_fin'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'enviado_correo'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'usuario_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'fecha'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'motivo'            => new sfValidatorPass(array('required' => false)),
      'observaciones'     => new sfValidatorPass(array('required' => false)),
      'estado'            => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'jefe'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'usuario_modero'    => new sfValidatorPass(array('required' => false)),
      'comentario_modero' => new sfValidatorPass(array('required' => false)),
      'archivo_uno'       => new sfValidatorPass(array('required' => false)),
      'archivo_dos'       => new sfValidatorPass(array('required' => false)),
      'fecha_fin'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'enviado_correo'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('solicitud_ausencia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SolicitudAusencia';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'usuario_id'        => 'ForeignKey',
      'fecha'             => 'Date',
      'motivo'            => 'Text',
      'observaciones'     => 'Text',
      'estado'            => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'jefe'              => 'Number',
      'usuario_modero'    => 'Text',
      'comentario_modero' => 'Text',
      'archivo_uno'       => 'Text',
      'archivo_dos'       => 'Text',
      'fecha_fin'         => 'Date',
      'enviado_correo'    => 'Boolean',
    );
  }
}
