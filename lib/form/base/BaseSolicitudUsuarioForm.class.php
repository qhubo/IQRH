<?php

/**
 * SolicitudUsuario form base class.
 *
 * @method SolicitudUsuario getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseSolicitudUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'usuario_id'            => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'fecha'                 => new sfWidgetFormDate(),
      'catalogo_solicitud_id' => new sfWidgetFormPropelChoice(array('model' => 'CatalogoSolicitud', 'add_empty' => true)),
      'observaciones'         => new sfWidgetFormTextarea(),
      'estado'                => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'jefe'                  => new sfWidgetFormInputText(),
      'usuario_modero'        => new sfWidgetFormInputText(),
      'comentario_modero'     => new sfWidgetFormTextarea(),
      'archivo_uno'           => new sfWidgetFormInputText(),
      'archivo_dos'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario_id'            => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'fecha'                 => new sfValidatorDate(array('required' => false)),
      'catalogo_solicitud_id' => new sfValidatorPropelChoice(array('model' => 'CatalogoSolicitud', 'column' => 'id', 'required' => false)),
      'observaciones'         => new sfValidatorString(array('required' => false)),
      'estado'                => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(array('required' => false)),
      'updated_at'            => new sfValidatorDateTime(array('required' => false)),
      'jefe'                  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'usuario_modero'        => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'comentario_modero'     => new sfValidatorString(array('required' => false)),
      'archivo_uno'           => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'archivo_dos'           => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('solicitud_usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SolicitudUsuario';
  }


}
