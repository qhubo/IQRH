<?php

/**
 * ReciboDetalle filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseReciboDetalleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_c'                => new sfWidgetFormFilterInput(),
      'planilla_resumen_id' => new sfWidgetFormFilterInput(),
      'tipo'                => new sfWidgetFormFilterInput(),
      'afeca_ss'            => new sfWidgetFormFilterInput(),
      'descripcion'         => new sfWidgetFormFilterInput(),
      'monto'               => new sfWidgetFormFilterInput(),
      'debe'                => new sfWidgetFormFilterInput(),
      'haber'               => new sfWidgetFormFilterInput(),
      'identificar'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_c'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'planilla_resumen_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tipo'                => new sfValidatorPass(array('required' => false)),
      'afeca_ss'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descripcion'         => new sfValidatorPass(array('required' => false)),
      'monto'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'debe'                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'haber'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'identificar'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('recibo_detalle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReciboDetalle';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'id_c'                => 'Number',
      'planilla_resumen_id' => 'Number',
      'tipo'                => 'Text',
      'afeca_ss'            => 'Number',
      'descripcion'         => 'Text',
      'monto'               => 'Number',
      'debe'                => 'Number',
      'haber'               => 'Number',
      'identificar'         => 'Text',
    );
  }
}
