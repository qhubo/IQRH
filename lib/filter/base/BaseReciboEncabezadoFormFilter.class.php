<?php

/**
 * ReciboEncabezado filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseReciboEncabezadoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Planilla_Resumen_id'  => new sfWidgetFormFilterInput(),
      'empleado'             => new sfWidgetFormFilterInput(),
      'empleado_proyecto_id' => new sfWidgetFormFilterInput(),
      'sueldo_base'          => new sfWidgetFormFilterInput(),
      'bonificacion_base'    => new sfWidgetFormFilterInput(),
      'dias_ausencias'       => new sfWidgetFormFilterInput(),
      'dias_suspendido'      => new sfWidgetFormFilterInput(),
      'septimos'             => new sfWidgetFormFilterInput(),
      'total_descuentos'     => new sfWidgetFormFilterInput(),
      'total_ingresos'       => new sfWidgetFormFilterInput(),
      'total_extras'         => new sfWidgetFormFilterInput(),
      'total_sueldo_liquido' => new sfWidgetFormFilterInput(),
      'alta'                 => new sfWidgetFormFilterInput(),
      'baja'                 => new sfWidgetFormFilterInput(),
      'codigo'               => new sfWidgetFormFilterInput(),
      'puesto'               => new sfWidgetFormFilterInput(),
      'departamento'         => new sfWidgetFormFilterInput(),
      'dias_base'            => new sfWidgetFormFilterInput(),
      'bloque'               => new sfWidgetFormFilterInput(),
      'inicio'               => new sfWidgetFormFilterInput(),
      'fin'                  => new sfWidgetFormFilterInput(),
      'numero'               => new sfWidgetFormFilterInput(),
      'laborados'            => new sfWidgetFormFilterInput(),
      'cabecera_in'          => new sfWidgetFormFilterInput(),
      'enviado_correo'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'Planilla_Resumen_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'empleado'             => new sfValidatorPass(array('required' => false)),
      'empleado_proyecto_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sueldo_base'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bonificacion_base'    => new sfValidatorPass(array('required' => false)),
      'dias_ausencias'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'dias_suspendido'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'septimos'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'total_descuentos'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'total_ingresos'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'total_extras'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'total_sueldo_liquido' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'alta'                 => new sfValidatorPass(array('required' => false)),
      'baja'                 => new sfValidatorPass(array('required' => false)),
      'codigo'               => new sfValidatorPass(array('required' => false)),
      'puesto'               => new sfValidatorPass(array('required' => false)),
      'departamento'         => new sfValidatorPass(array('required' => false)),
      'dias_base'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bloque'               => new sfValidatorPass(array('required' => false)),
      'inicio'               => new sfValidatorPass(array('required' => false)),
      'fin'                  => new sfValidatorPass(array('required' => false)),
      'numero'               => new sfValidatorPass(array('required' => false)),
      'laborados'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cabecera_in'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'enviado_correo'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('recibo_encabezado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReciboEncabezado';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'Planilla_Resumen_id'  => 'Number',
      'empleado'             => 'Text',
      'empleado_proyecto_id' => 'Number',
      'sueldo_base'          => 'Number',
      'bonificacion_base'    => 'Text',
      'dias_ausencias'       => 'Number',
      'dias_suspendido'      => 'Number',
      'septimos'             => 'Number',
      'total_descuentos'     => 'Number',
      'total_ingresos'       => 'Number',
      'total_extras'         => 'Number',
      'total_sueldo_liquido' => 'Number',
      'alta'                 => 'Text',
      'baja'                 => 'Text',
      'codigo'               => 'Text',
      'puesto'               => 'Text',
      'departamento'         => 'Text',
      'dias_base'            => 'Number',
      'bloque'               => 'Text',
      'inicio'               => 'Text',
      'fin'                  => 'Text',
      'numero'               => 'Text',
      'laborados'            => 'Number',
      'cabecera_in'          => 'Number',
      'enviado_correo'       => 'Boolean',
    );
  }
}
