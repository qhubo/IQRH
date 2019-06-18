<?php

/**
 * Proyecto filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseProyectoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo'                  => new sfWidgetFormFilterInput(),
      'nombre'                  => new sfWidgetFormFilterInput(),
      'telefono'                => new sfWidgetFormFilterInput(),
      'contacto'                => new sfWidgetFormFilterInput(),
      'created_by'              => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterInput(),
      'updated_by'              => new sfWidgetFormFilterInput(),
      'updated_at'              => new sfWidgetFormFilterInput(),
      'nit_proyecto'            => new sfWidgetFormFilterInput(),
      'razon_social'            => new sfWidgetFormFilterInput(),
      'nomenclatura'            => new sfWidgetFormFilterInput(),
      'ubicacion_geografica'    => new sfWidgetFormFilterInput(),
      'documento_representante' => new sfWidgetFormFilterInput(),
      'representante_legal'     => new sfWidgetFormFilterInput(),
      'gerente'                 => new sfWidgetFormFilterInput(),
      'residente'               => new sfWidgetFormFilterInput(),
      'departamento'            => new sfWidgetFormFilterInput(),
      'municipio'               => new sfWidgetFormFilterInput(),
      'interno'                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'codigo'                  => new sfValidatorPass(array('required' => false)),
      'nombre'                  => new sfValidatorPass(array('required' => false)),
      'telefono'                => new sfValidatorPass(array('required' => false)),
      'contacto'                => new sfValidatorPass(array('required' => false)),
      'created_by'              => new sfValidatorPass(array('required' => false)),
      'created_at'              => new sfValidatorPass(array('required' => false)),
      'updated_by'              => new sfValidatorPass(array('required' => false)),
      'updated_at'              => new sfValidatorPass(array('required' => false)),
      'nit_proyecto'            => new sfValidatorPass(array('required' => false)),
      'razon_social'            => new sfValidatorPass(array('required' => false)),
      'nomenclatura'            => new sfValidatorPass(array('required' => false)),
      'ubicacion_geografica'    => new sfValidatorPass(array('required' => false)),
      'documento_representante' => new sfValidatorPass(array('required' => false)),
      'representante_legal'     => new sfValidatorPass(array('required' => false)),
      'gerente'                 => new sfValidatorPass(array('required' => false)),
      'residente'               => new sfValidatorPass(array('required' => false)),
      'departamento'            => new sfValidatorPass(array('required' => false)),
      'municipio'               => new sfValidatorPass(array('required' => false)),
      'interno'                 => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proyecto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proyecto';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'codigo'                  => 'Text',
      'nombre'                  => 'Text',
      'telefono'                => 'Text',
      'contacto'                => 'Text',
      'created_by'              => 'Text',
      'created_at'              => 'Text',
      'updated_by'              => 'Text',
      'updated_at'              => 'Text',
      'nit_proyecto'            => 'Text',
      'razon_social'            => 'Text',
      'nomenclatura'            => 'Text',
      'ubicacion_geografica'    => 'Text',
      'documento_representante' => 'Text',
      'representante_legal'     => 'Text',
      'gerente'                 => 'Text',
      'residente'               => 'Text',
      'departamento'            => 'Text',
      'municipio'               => 'Text',
      'interno'                 => 'Text',
    );
  }
}
