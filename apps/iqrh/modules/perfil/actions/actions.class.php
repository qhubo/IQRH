<?php

require_once dirname(__FILE__).'/../lib/perfilGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/perfilGeneratorHelper.class.php';

/**
 * perfil actions.
 *
 * @package    plan
 * @subpackage perfil
 * @author     Via
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class perfilActions extends autoPerfilActions
{
     public function executeAcceso(sfWebRequest $request) {
        $id = $request->getParameter("id");
      
        $this->getUser()->setAttribute("registro", $id, "seleccion");
        $this->forward("perfil", "accesos");
    }

    
    
    public function executeAccesos(sfWebRequest $request) {
        $this->id =  $this->getUser()->getAttribute("registro", null, "seleccion");
  
        $perfilMenu = MenuSeguridadQuery::create()
                ->usePerfilMenuQuery()
                ->filterByPerfilId($this->id)
                ->endUse()
                ->find();
        $default=null;
         foreach ($perfilMenu as $registro) {
            $default['menu_' . $registro->getId()] = true;
        }
        $this->form = new PerfilAccesoMenuForm($default);
        $this->menus = MenuSeguridadQuery::create()
                ->orderByDescripcion()
                ->filterBySuperior(null, Criteria::NOT_EQUAL)
                //->setlimit(1)
                ->find();
        
        $this->superiores = MenuSeguridadQuery::create()
                ->orderByOrden()
              //  ->filterByDescripcion('Configuración', Criteria::NOT_EQUAL)
                ->filterBySuperior(null, Criteria::EQUAL)
                //->setlimit(1)
                ->find();
        
        if ($request->isMethod('POST')) {
            $this->form->bind($request->getParameter('consulta'));
           $perfilMenu = PerfilMenuQuery::create()->filterByPerfilId($this->id)->find();
            if ($this->form->isValid()) {
                if ($perfilMenu) {
                    $perfilMenu->delete();
                }
                $valores = $this->form->getValues();
                foreach ($this->menus as $registro) {
                  if ($valores['menu_'.$registro->getId()]){
                     $perfilMenuN = new PerfilMenu();
                     $perfilMenuN->setPerfilId($this->id);
                     $perfilMenuN->setMenuSeguridadId($registro->getId());
                     $perfilMenuN->save();
                   }
                }
                $this->getUser()->setFlash('exito', 'Asignacion de Perfil realizada correctamente.');
                $this->redirect('perfil/index');
            }
        }
        $this->perfil = PerfilQuery::create()->findOneById($this->id);
    }

}
