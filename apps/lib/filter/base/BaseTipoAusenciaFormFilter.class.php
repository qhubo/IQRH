<?php

/**
 * TipoAusencia filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseTipoAusenciaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa'      => new sfWidgetFormFilterInput(),
      'observacioes' => new sfWidgetFormFilterInput(),
      'dia'          => new sfWidgetFormFilterInput(),
      'nombre'       => new sfWidgetFormFilterInput(),
      'activo'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'empresa'      => new sfValidatorPass(array('required' => false)),
      'observacioes' => new sfValidatorPass(array('required' => false)),
      'dia'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre'       => new sfValidatorPass(array('required' => false)),
      'activo'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('tipo_ausencia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoAusencia';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'empresa'      => 'Text',
      'observacioes' => 'Text',
      'dia'          => 'Number',
      'nombre'       => 'Text',
      'activo'       => 'Boolean',
    );
  }
}
