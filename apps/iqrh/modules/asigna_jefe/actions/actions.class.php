<?php

/**
 * asigna_jefe actions.
 *
 * @package    plan
 * @subpackage asigna_jefe
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class asigna_jefeActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeJefe(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $jefe = $request->getParameter('idv');
        $empleadoQ = UsuarioQuery::create()->findOneById($id);
        $empleadoQ->setUsuarioJefe($jefe);
        $empleadoQ->save();
        echo "actualizado";
        die();
    }

    public function executeIndex(sfWebRequest $request) {
        $this->empresaseleccion = $request->getParameter('em');
        $this->estatu = $request->getParameter('estatu');
        
        $empresaseleccion= $this->empresaseleccion;
        sfContext::getInstance()->getUser()->setAttribute('seleccion', $empresaseleccion, 'empresa');        
        $this->empresas = UsuarioQuery::create()
                ->filterByEmpresa('', Criteria::NOT_EQUAL)
                ->orderByEmpresa()
                ->groupByEmpresa()
                ->find();
        
        
          $usuarios = UsuarioQuery::create();
          $usuarios->orderByPrimerApellido();
        $usuarios->filterByActivo(true);
        $usuarios->filterByCodigo('', Criteria::NOT_EQUAL);
    //    $usuarios->filterByEmpresa($empresaseleccion);
        if ($this->estatu==1) {
            $usuarios->filterByUsuarioJefe(0, Criteria::NOT_EQUAL);
        }
        if ($this->estatu==2) {
            $usuarios->filterByUsuarioJefe(0);
        }
        
        $this->usuarios = $usuarios->find();
        
        $this->usuariosQ= $this->usuarios;
        
        
        
        $usuarios = UsuarioQuery::create();
        $usuarios->filterByActivo(true);
        $usuarios->filterByCodigo('', Criteria::NOT_EQUAL);
        $usuarios->filterByEmpresa($empresaseleccion);
        if ($this->estatu==1) {
            $usuarios->filterByUsuarioJefe(0, Criteria::NOT_EQUAL);
        }
        if ($this->estatu==2) {
            $usuarios->filterByUsuarioJefe(0);
        }
        
        $this->usuarios = $usuarios->find();
        
        $this->usuariosR= $this->usuarios;
        $usuario = UsuarioQuery::create()
                ->filterByActivo(true)
                ->orderByNombreCompleto()
                ->find();
        
        foreach ($usuario as $reg) {
            $default['empleado_'.$reg->getId()] = $reg->getUsuarioJefe();
        }
        
//        echo "<pre>";
//        print_r($default);
//        echo "</pre>";
//        
        $this->form = new SeleccionEmpleadoForm($default);
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
            }
        }
    }

}
