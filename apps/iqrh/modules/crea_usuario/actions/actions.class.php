<?php

/**
 * crea_usuario actions.
 *
 * @package    plan
 * @subpackage crea_usuario
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class crea_usuarioActions extends sfActions {

    public function executeCodigo(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $canti = UsuarioQuery::create()
                ->filterByUsuario($id)
                ->count();
        $retun = 0;
        if ($canti > 0) {
            $retun = 1;
        }
        echo $retun;
        die();
    }

    public function executeIndex(sfWebRequest $request) {
        $this->form = new CreaUsuarioForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $nuevo = New Usuario();
                $nuevo->setNombreCompleto($valores['nombre_completo']); // => Jose Antonio 
                $nuevo->setUsuario($valores['usuario']); // => demou
                $nuevo->setCorreo($valores['correo']); // => abrantar@hotmail.com
                $nuevo->setTipoUsuario($valores['tipo']); // => Publico
                $nuevo->setEmpresa($valores['empresa']); // => 
                $nuevo->setObservaciones($valores['observaciones']); // => 
                $nuevo->setClave($valores['clave']);
                $nuevo->save();
                $this->getUser()->setFlash('exito', 'Usuario creado con exito ');
                $this->redirect('crea_usuario/index');
            }
        }
    }

}
