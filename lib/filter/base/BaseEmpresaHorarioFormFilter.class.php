<?php

/**
 * EmpresaHorario filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseEmpresaHorarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa'    => new sfWidgetFormFilterInput(),
      'hora'       => new sfWidgetFormFilterInput(),
      'hora_fin'   => new sfWidgetFormFilterInput(),
      'hora24'     => new sfWidgetFormFilterInput(),
      'hora_fin24' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'empresa'    => new sfValidatorPass(array('required' => false)),
      'hora'       => new sfValidatorPass(array('required' => false)),
      'hora_fin'   => new sfValidatorPass(array('required' => false)),
      'hora24'     => new sfValidatorPass(array('required' => false)),
      'hora_fin24' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('empresa_horario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmpresaHorario';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'empresa'    => 'Text',
      'hora'       => 'Text',
      'hora_fin'   => 'Text',
      'hora24'     => 'Text',
      'hora_fin24' => 'Text',
    );
  }
}
