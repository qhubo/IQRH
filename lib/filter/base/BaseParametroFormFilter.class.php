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
      'codigo'          => new sfWidgetFormFilterInput(),
      'slogan'          => new sfWidgetFormFilterInput(),
      'logo'            => new sfWidgetFormFilterInput(),
      'puerto_correo'   => new sfWidgetFormFilterInput(),
      'smtp_correo'     => new sfWidgetFormFilterInput(),
      'usuario_correo'  => new sfWidgetFormFilterInput(),
      'clave_correo'    => new sfWidgetFormFilterInput(),
      'banner_reporte'  => new sfWidgetFormFilterInput(),
      'correo_notifica' => new sfWidgetFormFilterInput(),
      'notifica_marca'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'codigo'          => new sfValidatorPass(array('required' => false)),
      'slogan'          => new sfValidatorPass(array('required' => false)),
      'logo'            => new sfValidatorPass(array('required' => false)),
      'puerto_correo'   => new sfValidatorPass(array('required' => false)),
      'smtp_correo'     => new sfValidatorPass(array('required' => false)),
      'usuario_correo'  => new sfValidatorPass(array('required' => false)),
      'clave_correo'    => new sfValidatorPass(array('required' => false)),
      'banner_reporte'  => new sfValidatorPass(array('required' => false)),
      'correo_notifica' => new sfValidatorPass(array('required' => false)),
      'notifica_marca'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
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
      'id'              => 'Number',
      'codigo'          => 'Text',
      'slogan'          => 'Text',
      'logo'            => 'Text',
      'puerto_correo'   => 'Text',
      'smtp_correo'     => 'Text',
      'usuario_correo'  => 'Text',
      'clave_correo'    => 'Text',
      'banner_reporte'  => 'Text',
      'correo_notifica' => 'Text',
      'notifica_marca'  => 'Boolean',
    );
  }
}
