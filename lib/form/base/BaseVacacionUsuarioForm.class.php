<?php

/**
 * VacacionUsuario form base class.
 *
 * @method VacacionUsuario getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseVacacionUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'usuario_id'    => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'periodo'       => new sfWidgetFormInputText(),
      'fecha_inicio'  => new sfWidgetFormDate(),
      'fecha_fin'     => new sfWidgetFormDate(),
      'valor'         => new sfWidgetFormInputText(),
      'dias'          => new sfWidgetFormInputText(),
      'observaciones' => new sfWidgetFormTextarea(),
      'archivo_uno'   => new sfWidgetFormInputText(),
      'archivo_dos'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario_id'    => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'periodo'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'fecha_inicio'  => new sfValidatorDate(array('required' => false)),
      'fecha_fin'     => new sfValidatorDate(array('required' => false)),
      'valor'         => new sfValidatorNumber(array('required' => false)),
      'dias'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'observaciones' => new sfValidatorString(array('required' => false)),
      'archivo_uno'   => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'archivo_dos'   => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vacacion_usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VacacionUsuario';
  }


}
