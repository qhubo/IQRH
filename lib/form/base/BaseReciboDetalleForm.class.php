<?php

/**
 * ReciboDetalle form base class.
 *
 * @method ReciboDetalle getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseReciboDetalleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'id_c'                => new sfWidgetFormInputText(),
      'planilla_resumen_id' => new sfWidgetFormInputText(),
      'tipo'                => new sfWidgetFormInputText(),
      'afeca_ss'            => new sfWidgetFormInputText(),
      'descripcion'         => new sfWidgetFormInputText(),
      'monto'               => new sfWidgetFormInputText(),
      'debe'                => new sfWidgetFormInputText(),
      'haber'               => new sfWidgetFormInputText(),
      'identificar'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_c'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'planilla_resumen_id' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'tipo'                => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'afeca_ss'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'descripcion'         => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'monto'               => new sfValidatorNumber(array('required' => false)),
      'debe'                => new sfValidatorNumber(array('required' => false)),
      'haber'               => new sfValidatorNumber(array('required' => false)),
      'identificar'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('recibo_detalle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReciboDetalle';
  }


}
