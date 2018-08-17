<?php

/**
 * ReciboCabecera form base class.
 *
 * @method ReciboCabecera getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseReciboCabeceraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'planilla'         => new sfWidgetFormInputText(),
      'inicio'           => new sfWidgetFormInputText(),
      'fin'              => new sfWidgetFormInputText(),
      'proyecto'         => new sfWidgetFormInputText(),
      'empresa'          => new sfWidgetFormInputText(),
      'razon_social'     => new sfWidgetFormInputText(),
      'direccion'        => new sfWidgetFormInputText(),
      'email'            => new sfWidgetFormInputText(),
      'telefono'         => new sfWidgetFormInputText(),
      'nombre_comercial' => new sfWidgetFormInputText(),
      'texto'            => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'planilla'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'inicio'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'fin'              => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'proyecto'         => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'empresa'          => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'razon_social'     => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'direccion'        => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'email'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'telefono'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'nombre_comercial' => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'texto'            => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('recibo_cabecera[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReciboCabecera';
  }


}
