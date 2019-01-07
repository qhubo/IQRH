<?php

/**
 * PerfilMenu filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BasePerfilMenuFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'perfil_id'         => new sfWidgetFormPropelChoice(array('model' => 'Perfil', 'add_empty' => true)),
      'menu_seguridad_id' => new sfWidgetFormPropelChoice(array('model' => 'MenuSeguridad', 'add_empty' => true)),
      'created_by'        => new sfWidgetFormFilterInput(),
      'updated_by'        => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'perfil_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Perfil', 'column' => 'id')),
      'menu_seguridad_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'MenuSeguridad', 'column' => 'id')),
      'created_by'        => new sfValidatorPass(array('required' => false)),
      'updated_by'        => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('perfil_menu_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PerfilMenu';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'perfil_id'         => 'ForeignKey',
      'menu_seguridad_id' => 'ForeignKey',
      'created_by'        => 'Text',
      'updated_by'        => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
