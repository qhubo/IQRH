<?php

/**
 * CatalogoSolicitud form base class.
 *
 * @method CatalogoSolicitud getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseCatalogoSolicitudForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'nombre'        => new sfWidgetFormInputText(),
      'observaciones' => new sfWidgetFormTextarea(),
      'activo'        => new sfWidgetFormInputCheckbox(),
      'archivo_uno'   => new sfWidgetFormInputText(),
      'archivo_dos'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'observaciones' => new sfValidatorString(array('required' => false)),
      'activo'        => new sfValidatorBoolean(array('required' => false)),
      'archivo_uno'   => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'archivo_dos'   => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('catalogo_solicitud[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CatalogoSolicitud';
  }


}
