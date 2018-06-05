<?php

/**
 * Usuario form.
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
class UsuarioForm extends BaseUsuarioForm
{
  public function configure()
  {
         if (!$this->getObject()->isNew()) {
      $this->widgetSchema["clave"] = new sfWidgetFormInputHidden();
    }
  }
}
