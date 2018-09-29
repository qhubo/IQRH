<?php

/**
 * BitacoraUsuario filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseBitacoraUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'    => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'usuario_jefe'  => new sfWidgetFormFilterInput(),
      'motivo'        => new sfWidgetFormFilterInput(),
      'leido'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tipo'          => new sfWidgetFormFilterInput(),
      'identificador' => new sfWidgetFormFilterInput(),
      'fecha'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'archivo_uno'   => new sfWidgetFormFilterInput(),
      'archivo_dos'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'usuario_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'usuario_jefe'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'motivo'        => new sfValidatorPass(array('required' => false)),
      'leido'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tipo'          => new sfValidatorPass(array('required' => false)),
      'identificador' => new sfValidatorPass(array('required' => false)),
      'fecha'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'archivo_uno'   => new sfValidatorPass(array('required' => false)),
      'archivo_dos'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bitacora_usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BitacoraUsuario';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'usuario_id'    => 'ForeignKey',
      'usuario_jefe'  => 'Number',
      'motivo'        => 'Text',
      'leido'         => 'Boolean',
      'tipo'          => 'Text',
      'identificador' => 'Text',
      'fecha'         => 'Date',
      'archivo_uno'   => 'Text',
      'archivo_dos'   => 'Text',
    );
  }
}
