<?php

/**
 * ReciboEncabezado form base class.
 *
 * @method ReciboEncabezado getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseReciboEncabezadoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'Planilla_Resumen_id'  => new sfWidgetFormInputText(),
      'empleado'             => new sfWidgetFormInputText(),
      'empleado_proyecto_id' => new sfWidgetFormInputText(),
      'sueldo_base'          => new sfWidgetFormInputText(),
      'bonificacion_base'    => new sfWidgetFormInputText(),
      'dias_ausencias'       => new sfWidgetFormInputText(),
      'dias_suspendido'      => new sfWidgetFormInputText(),
      'septimos'             => new sfWidgetFormInputText(),
      'total_descuentos'     => new sfWidgetFormInputText(),
      'total_ingresos'       => new sfWidgetFormInputText(),
      'total_extras'         => new sfWidgetFormInputText(),
      'total_sueldo_liquido' => new sfWidgetFormInputText(),
      'alta'                 => new sfWidgetFormInputText(),
      'baja'                 => new sfWidgetFormInputText(),
      'codigo'               => new sfWidgetFormInputText(),
      'puesto'               => new sfWidgetFormInputText(),
      'departamento'         => new sfWidgetFormInputText(),
      'dias_base'            => new sfWidgetFormInputText(),
      'bloque'               => new sfWidgetFormInputText(),
      'inicio'               => new sfWidgetFormInputText(),
      'fin'                  => new sfWidgetFormInputText(),
      'numero'               => new sfWidgetFormInputText(),
      'laborados'            => new sfWidgetFormInputText(),
      'cabecera_in'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'Planilla_Resumen_id'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'empleado'             => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'empleado_proyecto_id' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'sueldo_base'          => new sfValidatorNumber(array('required' => false)),
      'bonificacion_base'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'dias_ausencias'       => new sfValidatorNumber(array('required' => false)),
      'dias_suspendido'      => new sfValidatorNumber(array('required' => false)),
      'septimos'             => new sfValidatorNumber(array('required' => false)),
      'total_descuentos'     => new sfValidatorNumber(array('required' => false)),
      'total_ingresos'       => new sfValidatorNumber(array('required' => false)),
      'total_extras'         => new sfValidatorNumber(array('required' => false)),
      'total_sueldo_liquido' => new sfValidatorNumber(array('required' => false)),
      'alta'                 => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'baja'                 => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'codigo'               => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'puesto'               => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'departamento'         => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'dias_base'            => new sfValidatorNumber(array('required' => false)),
      'bloque'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'inicio'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fin'                  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'numero'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'laborados'            => new sfValidatorNumber(array('required' => false)),
      'cabecera_in'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('recibo_encabezado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReciboEncabezado';
  }


}
