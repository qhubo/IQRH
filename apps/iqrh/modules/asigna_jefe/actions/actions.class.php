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
        $empresaseleccion= $this->empresaseleccion;
        sfContext::getInstance()->getUser()->setAttribute('seleccion', $empresaseleccion, 'empresa');        
        $this->empresas = UsuarioQuery::create()
                ->filterByEmpresa('', Criteria::NOT_EQUAL)
                ->orderByEmpresa()
                ->groupByEmpresa()
                ->find();
        $this->usuarios = UsuarioQuery::create()
                ->filterByCodigo('', Criteria::NOT_EQUAL)
                ->filterByEmpresa($empresaseleccion)
               // ->setLimit(10)
                ->find();
        $usuario = UsuarioQuery::create()
                ->orderByNombreCompleto()
                ->find();
        foreach ($usuario as $reg) {
            $default['empleado_' . $reg->getId()] = $reg->getUsuarioJefe();
        }
        $this->form = new SeleccionEmpleadoForm($default);
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
            }
        }
    }

}
