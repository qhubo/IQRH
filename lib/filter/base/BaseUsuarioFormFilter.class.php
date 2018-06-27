<?php

/**
 * Usuario filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo'           => new sfWidgetFormFilterInput(),
      'usuario'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clave'            => new sfWidgetFormFilterInput(),
      'correo'           => new sfWidgetFormFilterInput(),
      'estado'           => new sfWidgetFormFilterInput(),
      'imagen'           => new sfWidgetFormFilterInput(),
      'administrador'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'validado'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'ultimo_ingreso'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'tema'             => new sfWidgetFormFilterInput(),
      'frase'            => new sfWidgetFormFilterInput(),
      'genero'           => new sfWidgetFormFilterInput(),
      'fecha_nacimiento' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'nombre_completo'  => new sfWidgetFormFilterInput(),
      'empresa'          => new sfWidgetFormFilterInput(),
      'logo'             => new sfWidgetFormFilterInput(),
      'activo'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tipo_usuario'     => new sfWidgetFormFilterInput(),
      'observaciones'    => new sfWidgetFormFilterInput(),
      'primer_nombre'    => new sfWidgetFormFilterInput(),
      'segundo_nombre'   => new sfWidgetFormFilterInput(),
      'primer_apellido'  => new sfWidgetFormFilterInput(),
      'segundo_apellido' => new sfWidgetFormFilterInput(),
      'puesto'           => new sfWidgetFormFilterInput(),
      'departamento'     => new sfWidgetFormFilterInput(),
      'jefe'             => new sfWidgetFormFilterInput(),
      'fecha_alta'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'sueldo'           => new sfWidgetFormFilterInput(),
      'usuario_jefe'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'codigo'           => new sfValidatorPass(array('required' => false)),
      'usuario'          => new sfValidatorPass(array('required' => false)),
      'clave'            => new sfValidatorPass(array('required' => false)),
      'correo'           => new sfValidatorPass(array('required' => false)),
      'estado'           => new sfValidatorPass(array('required' => false)),
      'imagen'           => new sfValidatorPass(array('required' => false)),
      'administrador'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'validado'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'ultimo_ingreso'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'tema'             => new sfValidatorPass(array('required' => false)),
      'frase'            => new sfValidatorPass(array('required' => false)),
      'genero'           => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'nombre_completo'  => new sfValidatorPass(array('required' => false)),
      'empresa'          => new sfValidatorPass(array('required' => false)),
      'logo'             => new sfValidatorPass(array('required' => false)),
      'activo'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tipo_usuario'     => new sfValidatorPass(array('required' => false)),
      'observaciones'    => new sfValidatorPass(array('required' => false)),
      'primer_nombre'    => new sfValidatorPass(array('required' => false)),
      'segundo_nombre'   => new sfValidatorPass(array('required' => false)),
      'primer_apellido'  => new sfValidatorPass(array('required' => false)),
      'segundo_apellido' => new sfValidatorPass(array('required' => false)),
      'puesto'           => new sfValidatorPass(array('required' => false)),
      'departamento'     => new sfValidatorPass(array('required' => false)),
      'jefe'             => new sfValidatorPass(array('required' => false)),
      'fecha_alta'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'sueldo'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'usuario_jefe'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'codigo'           => 'Text',
      'usuario'          => 'Text',
      'clave'            => 'Text',
      'correo'           => 'Text',
      'estado'           => 'Text',
      'imagen'           => 'Text',
      'administrador'    => 'Boolean',
      'validado'         => 'Boolean',
      'ultimo_ingreso'   => 'Date',
      'tema'             => 'Text',
      'frase'            => 'Text',
      'genero'           => 'Text',
      'fecha_nacimiento' => 'Date',
      'nombre_completo'  => 'Text',
      'empresa'          => 'Text',
      'logo'             => 'Text',
      'activo'           => 'Boolean',
      'tipo_usuario'     => 'Text',
      'observaciones'    => 'Text',
      'primer_nombre'    => 'Text',
      'segundo_nombre'   => 'Text',
      'primer_apellido'  => 'Text',
      'segundo_apellido' => 'Text',
      'puesto'           => 'Text',
      'departamento'     => 'Text',
      'jefe'             => 'Text',
      'fecha_alta'       => 'Date',
      'sueldo'           => 'Number',
      'usuario_jefe'     => 'Number',
    );
  }
}
