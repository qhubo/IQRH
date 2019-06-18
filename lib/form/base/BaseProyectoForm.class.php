<?php

/**
 * Proyecto form base class.
 *
 * @method Proyecto getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseProyectoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'codigo'                  => new sfWidgetFormInputText(),
      'nombre'                  => new sfWidgetFormInputText(),
      'telefono'                => new sfWidgetFormInputText(),
      'contacto'                => new sfWidgetFormInputText(),
      'created_by'              => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormInputText(),
      'updated_by'              => new sfWidgetFormInputText(),
      'updated_at'              => new sfWidgetFormInputText(),
      'nit_proyecto'            => new sfWidgetFormInputText(),
      'razon_social'            => new sfWidgetFormInputText(),
      'nomenclatura'            => new sfWidgetFormInputText(),
      'ubicacion_geografica'    => new sfWidgetFormInputText(),
      'documento_representante' => new sfWidgetFormInputText(),
      'representante_legal'     => new sfWidgetFormInputText(),
      'gerente'                 => new sfWidgetFormInputText(),
      'residente'               => new sfWidgetFormInputText(),
      'departamento'            => new sfWidgetFormInputText(),
      'municipio'               => new sfWidgetFormInputText(),
      'interno'                 => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'codigo'                  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'nombre'                  => new sfValidatorString(array('max_length' => 350, 'required' => false)),
      'telefono'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'contacto'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_by'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'updated_by'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'updated_at'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'nit_proyecto'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'razon_social'            => new sfValidatorString(array('max_length' => 350, 'required' => false)),
      'nomenclatura'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ubicacion_geografica'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'documento_representante' => new sfValidatorString(array('max_length' => 350, 'required' => false)),
      'representante_legal'     => new sfValidatorString(array('max_length' => 350, 'required' => false)),
      'gerente'                 => new sfValidatorString(array('max_length' => 350, 'required' => false)),
      'residente'               => new sfValidatorString(array('max_length' => 350, 'required' => false)),
      'departamento'            => new sfValidatorString(array('max_length' => 350, 'required' => false)),
      'municipio'               => new sfValidatorString(array('max_length' => 350, 'required' => false)),
      'interno'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proyecto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proyecto';
  }


}
