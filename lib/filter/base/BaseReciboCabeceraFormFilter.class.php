<?php

/**
 * ReciboCabecera filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseReciboCabeceraFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'planilla'         => new sfWidgetFormFilterInput(),
      'inicio'           => new sfWidgetFormFilterInput(),
      'fin'              => new sfWidgetFormFilterInput(),
      'proyecto'         => new sfWidgetFormFilterInput(),
      'empresa'          => new sfWidgetFormFilterInput(),
      'razon_social'     => new sfWidgetFormFilterInput(),
      'direccion'        => new sfWidgetFormFilterInput(),
      'email'            => new sfWidgetFormFilterInput(),
      'telefono'         => new sfWidgetFormFilterInput(),
      'nombre_comercial' => new sfWidgetFormFilterInput(),
      'texto'            => new sfWidgetFormFilterInput(),
      'cabecera_in'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'planilla'         => new sfValidatorPass(array('required' => false)),
      'inicio'           => new sfValidatorPass(array('required' => false)),
      'fin'              => new sfValidatorPass(array('required' => false)),
      'proyecto'         => new sfValidatorPass(array('required' => false)),
      'empresa'          => new sfValidatorPass(array('required' => false)),
      'razon_social'     => new sfValidatorPass(array('required' => false)),
      'direccion'        => new sfValidatorPass(array('required' => false)),
      'email'            => new sfValidatorPass(array('required' => false)),
      'telefono'         => new sfValidatorPass(array('required' => false)),
      'nombre_comercial' => new sfValidatorPass(array('required' => false)),
      'texto'            => new sfValidatorPass(array('required' => false)),
      'cabecera_in'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('recibo_cabecera_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReciboCabecera';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'planilla'         => 'Text',
      'inicio'           => 'Text',
      'fin'              => 'Text',
      'proyecto'         => 'Text',
      'empresa'          => 'Text',
      'razon_social'     => 'Text',
      'direccion'        => 'Text',
      'email'            => 'Text',
      'telefono'         => 'Text',
      'nombre_comercial' => 'Text',
      'texto'            => 'Text',
      'cabecera_in'      => 'Number',
    );
  }
}
