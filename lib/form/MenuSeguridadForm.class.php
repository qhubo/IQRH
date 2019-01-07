<?php

/**
 * MenuSeguridad form.
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
class MenuSeguridadForm extends BaseMenuSeguridadForm
{
 public function configure()
  {
               $criteria = new Criteria();
            $criteria->add(MenuSeguridadPeer::SUPERIOR, null, Criteria::EQUAL);
            
        $this->setWidget('superior', new sfWidgetFormPropelChoice(array('model' => 'MenuSeguridad',
             'criteria'=>$criteria,
            'add_empty'=>'',),
                array('add_empty'=>'', 'class'=> 'select2me',)));
        
//          if (!$this->getObject()->isNew()) {
//                $this->widgetSchema["credencial"] = new sfWidgetFormInputHidden();
//                $this->widgetSchema["modulo"] = new sfWidgetFormInputHidden();
//                $this->widgetSchema["icono"] = new sfWidgetFormInputHidden();
//                $this->widgetSchema["accion"] = new sfWidgetFormInputHidden();
//          }
    }
}

