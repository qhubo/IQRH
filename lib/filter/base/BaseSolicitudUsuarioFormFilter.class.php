<?php

/**
 * SolicitudUsuario filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseSolicitudUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'            => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'fecha'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'catalogo_solicitud_id' => new sfWidgetFormPropelChoice(array('model' => 'CatalogoSolicitud', 'add_empty' => true)),
      'observaciones'         => new sfWidgetFormFilterInput(),
      'estado'                => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'jefe'                  => new sfWidgetFormFilterInput(),
      'usuario_modero'        => new sfWidgetFormFilterInput(),
      'comentario_modero'     => new sfWidgetFormFilterInput(),
      'archivo_uno'           => new sfWidgetFormFilterInput(),
      'archivo_dos'           => new sfWidgetFormFilterInput(),
      'enviado_correo'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'usuario_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'fecha'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'catalogo_solicitud_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CatalogoSolicitud', 'column' => 'id')),
      'observaciones'         => new sfValidatorPass(array('required' => false)),
      'estado'                => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'jefe'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'usuario_modero'        => new sfValidatorPass(array('required' => false)),
      'comentario_modero'     => new sfValidatorPass(array('required' => false)),
      'archivo_uno'           => new sfValidatorPass(array('required' => false)),
      'archivo_dos'           => new sfValidatorPass(array('required' => false)),
      'enviado_correo'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('solicitud_usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SolicitudUsuario';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'usuario_id'            => 'ForeignKey',
      'fecha'                 => 'Date',
      'catalogo_solicitud_id' => 'ForeignKey',
      'observaciones'         => 'Text',
      'estado'                => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'jefe'                  => 'Number',
      'usuario_modero'        => 'Text',
      'comentario_modero'     => 'Text',
      'archivo_uno'           => 'Text',
      'archivo_dos'           => 'Text',
      'enviado_correo'        => 'Boolean',
    );
  }
}
