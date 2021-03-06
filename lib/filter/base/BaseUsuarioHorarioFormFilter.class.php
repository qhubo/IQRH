<?php

/**
 * UsuarioHorario filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseUsuarioHorarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario'         => new sfWidgetFormFilterInput(),
      'hora'            => new sfWidgetFormFilterInput(),
      'hora_fin'        => new sfWidgetFormFilterInput(),
      'hora24'          => new sfWidgetFormFilterInput(),
      'hora_fin24'      => new sfWidgetFormFilterInput(),
      'estricto'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'minuto_prorroga' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'usuario'         => new sfValidatorPass(array('required' => false)),
      'hora'            => new sfValidatorPass(array('required' => false)),
      'hora_fin'        => new sfValidatorPass(array('required' => false)),
      'hora24'          => new sfValidatorPass(array('required' => false)),
      'hora_fin24'      => new sfValidatorPass(array('required' => false)),
      'estricto'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'minuto_prorroga' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('usuario_horario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioHorario';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'usuario'         => 'Text',
      'hora'            => 'Text',
      'hora_fin'        => 'Text',
      'hora24'          => 'Text',
      'hora_fin24'      => 'Text',
      'estricto'        => 'Boolean',
      'minuto_prorroga' => 'Number',
    );
  }
}
