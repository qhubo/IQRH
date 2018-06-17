<?php

/**
 * AumentoUsuario filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseAumentoUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'      => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'fecha_aumento'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'sueldo_anterior' => new sfWidgetFormFilterInput(),
      'puesto_anterior' => new sfWidgetFormFilterInput(),
      'sueldo'          => new sfWidgetFormFilterInput(),
      'nuevo_puesto'    => new sfWidgetFormFilterInput(),
      'observaciones'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'usuario_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'fecha_aumento'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'sueldo_anterior' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'puesto_anterior' => new sfValidatorPass(array('required' => false)),
      'sueldo'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nuevo_puesto'    => new sfValidatorPass(array('required' => false)),
      'observaciones'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('aumento_usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AumentoUsuario';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'usuario_id'      => 'ForeignKey',
      'fecha_aumento'   => 'Date',
      'sueldo_anterior' => 'Number',
      'puesto_anterior' => 'Text',
      'sueldo'          => 'Number',
      'nuevo_puesto'    => 'Text',
      'observaciones'   => 'Text',
    );
  }
}
