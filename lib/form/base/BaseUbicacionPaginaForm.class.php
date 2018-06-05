<?php

/**
 * UbicacionPagina form base class.
 *
 * @method UbicacionPagina getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseUbicacionPaginaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'codigo'          => new sfWidgetFormInputText(),
      'nombre'          => new sfWidgetFormInputText(),
      'observaciones'   => new sfWidgetFormTextarea(),
      'tipo_imagen'     => new sfWidgetFormInputText(),
      'medida_imagen'   => new sfWidgetFormInputText(),
      'banner_imagen'   => new sfWidgetFormInputText(),
      'activo'          => new sfWidgetFormInputCheckbox(),
      'tipo_campana_id' => new sfWidgetFormPropelChoice(array('model' => 'TipoCampana', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'codigo'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'observaciones'   => new sfValidatorString(array('required' => false)),
      'tipo_imagen'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'medida_imagen'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'banner_imagen'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'activo'          => new sfValidatorBoolean(array('required' => false)),
      'tipo_campana_id' => new sfValidatorPropelChoice(array('model' => 'TipoCampana', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ubicacion_pagina[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UbicacionPagina';
  }


}
