<?php

/**
 * MenuSeguridad filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseMenuSeguridadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion' => new sfWidgetFormFilterInput(),
      'credencial'  => new sfWidgetFormFilterInput(),
      'modulo'      => new sfWidgetFormFilterInput(),
      'icono'       => new sfWidgetFormFilterInput(),
      'accion'      => new sfWidgetFormFilterInput(),
      'superior'    => new sfWidgetFormFilterInput(),
      'orden'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descripcion' => new sfValidatorPass(array('required' => false)),
      'credencial'  => new sfValidatorPass(array('required' => false)),
      'modulo'      => new sfValidatorPass(array('required' => false)),
      'icono'       => new sfValidatorPass(array('required' => false)),
      'accion'      => new sfValidatorPass(array('required' => false)),
      'superior'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'orden'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('menu_seguridad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MenuSeguridad';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'descripcion' => 'Text',
      'credencial'  => 'Text',
      'modulo'      => 'Text',
      'icono'       => 'Text',
      'accion'      => 'Text',
      'superior'    => 'Number',
      'orden'       => 'Number',
    );
  }
}
