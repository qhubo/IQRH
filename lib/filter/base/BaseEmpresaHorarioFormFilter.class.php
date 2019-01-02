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
      'empresa'         => new sfWidgetFormFilterInput(),
      'hora'            => new sfWidgetFormFilterInput(),
      'hora_fin'        => new sfWidgetFormFilterInput(),
      'hora24'          => new sfWidgetFormFilterInput(),
      'hora_fin24'      => new sfWidgetFormFilterInput(),
      'estricto'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'minuto_prorroga' => new sfWidgetFormFilterInput(),
      'texto_uno'       => new sfWidgetFormFilterInput(),
      'texto_dos'       => new sfWidgetFormFilterInput(),
      'correo_notifica' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'empresa'         => new sfValidatorPass(array('required' => false)),
      'hora'            => new sfValidatorPass(array('required' => false)),
      'hora_fin'        => new sfValidatorPass(array('required' => false)),
      'hora24'          => new sfValidatorPass(array('required' => false)),
      'hora_fin24'      => new sfValidatorPass(array('required' => false)),
      'estricto'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'minuto_prorroga' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'texto_uno'       => new sfValidatorPass(array('required' => false)),
      'texto_dos'       => new sfValidatorPass(array('required' => false)),
      'correo_notifica' => new sfValidatorPass(array('required' => false)),
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
      'id'              => 'Number',
      'empresa'         => 'Text',
      'hora'            => 'Text',
      'hora_fin'        => 'Text',
      'hora24'          => 'Text',
      'hora_fin24'      => 'Text',
      'estricto'        => 'Boolean',
      'minuto_prorroga' => 'Number',
      'texto_uno'       => 'Text',
      'texto_dos'       => 'Text',
      'correo_notifica' => 'Text',
    );
  }
}
