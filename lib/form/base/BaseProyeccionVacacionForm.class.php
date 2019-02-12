<?php

/**
 * ProyeccionVacacion form base class.
 *
 * @method ProyeccionVacacion getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseProyeccionVacacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'usuario'      => new sfWidgetFormInputText(),
      'fecha_inicio' => new sfWidgetFormDate(),
      'fecha_fin'    => new sfWidgetFormDate(),
      'periodo'      => new sfWidgetFormInputText(),
      'dia_vacacion' => new sfWidgetFormInputCheckbox(),
      'estatus'      => new sfWidgetFormInputText(),
      'usuario_creo' => new sfWidgetFormInputText(),
      'fecha_crea'   => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'usuario'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fecha_inicio' => new sfValidatorDate(array('required' => false)),
      'fecha_fin'    => new sfValidatorDate(array('required' => false)),
      'periodo'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'dia_vacacion' => new sfValidatorBoolean(array('required' => false)),
      'estatus'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'usuario_creo' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fecha_crea'   => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proyeccion_vacacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyeccionVacacion';
  }


}
