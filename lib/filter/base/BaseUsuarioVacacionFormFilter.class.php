<?php

/**
 * UsuarioVacacion filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseUsuarioVacacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario' => new sfWidgetFormFilterInput(),
      'periodo' => new sfWidgetFormFilterInput(),
      'pagado'  => new sfWidgetFormFilterInput(),
      'derecho' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'usuario' => new sfValidatorPass(array('required' => false)),
      'periodo' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pagado'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'derecho' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('usuario_vacacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioVacacion';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'usuario' => 'Text',
      'periodo' => 'Number',
      'pagado'  => 'Number',
      'derecho' => 'Number',
    );
  }
}
