<?php

/**
 * BitacoraAlerta filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseBitacoraAlertaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa' => new sfWidgetFormFilterInput(),
      'fecha'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora'    => new sfWidgetFormFilterInput(),
      'minuto'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'empresa' => new sfValidatorPass(array('required' => false)),
      'fecha'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'minuto'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('bitacora_alerta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BitacoraAlerta';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'empresa' => 'Text',
      'fecha'   => 'Date',
      'hora'    => 'Number',
      'minuto'  => 'Number',
    );
  }
}
