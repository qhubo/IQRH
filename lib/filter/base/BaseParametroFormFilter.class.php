<?php

/**
 * Parametro filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseParametroFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo'         => new sfWidgetFormFilterInput(),
      'slogan'         => new sfWidgetFormFilterInput(),
      'logo'           => new sfWidgetFormFilterInput(),
      'puerto_correo'  => new sfWidgetFormFilterInput(),
      'smtp_correo'    => new sfWidgetFormFilterInput(),
      'usuario_correo' => new sfWidgetFormFilterInput(),
      'clave_correo'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'codigo'         => new sfValidatorPass(array('required' => false)),
      'slogan'         => new sfValidatorPass(array('required' => false)),
      'logo'           => new sfValidatorPass(array('required' => false)),
      'puerto_correo'  => new sfValidatorPass(array('required' => false)),
      'smtp_correo'    => new sfValidatorPass(array('required' => false)),
      'usuario_correo' => new sfValidatorPass(array('required' => false)),
      'clave_correo'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('parametro_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parametro';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'codigo'         => 'Text',
      'slogan'         => 'Text',
      'logo'           => 'Text',
      'puerto_correo'  => 'Text',
      'smtp_correo'    => 'Text',
      'usuario_correo' => 'Text',
      'clave_correo'   => 'Text',
    );
  }
}
