<?php

/**
 * edita_usuario actions.
 *
 * @package    plan
 * @subpackage edita_usuario
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class edita_usuarioActions extends sfActions {

        public function executeCorreo(sfWebRequest $request) {
        $valor = $request->getParameter('id');
        $id = $request->getParameter('idv');
        $usuarioQ = UsuarioQuery::create()->findOneById($id);
        $usuarioQ->setCorreo($valor);
        $usuarioQ->save();
        echo "<span class='font font-green bold Bold' >Correo Actualizado </span>";
        die();
        }
    public function executeCambioClave(sfWebRequest $request) {
        $id = $request->getParameter('id');

$valors['usuarioId']=$id;
        
        $this->usuariodescripcion = UsuarioQuery::create()->findOneById($id);
        $this->form = new CambioClaveUsuarioForm($valors);
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('clave'));
            if ($this->form->isValid()) {

                $this->getUser()->setFlash('exito', 'Cambio de Clave Efectuado Exitosamente');
                $this->redirect("edita_usuario/index");
            }
        }
    }

    public function executeIndex(sfWebRequest $request) {
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->usuarioId=$usuarioId;
        $this->usuarios = UsuarioQuery::create()
             //   ->filterById($usuarioId, Criteria::NOT_EQUAL)
                ->find();
    }

    public function executeElimina(sfWebRequest $request) {
        $id = $request->getParameter('id');

        $token = $request->getParameter('token');
        $cliente = UsuarioQuery::create()->findOneById($id);
        $tokenPro = '';
        if ($cliente) {
            $tokenPro = md5($cliente->getUsuario());
        }
        if ($tokenPro <> $token) {
            $this->getUser()->setFlash('error', 'Token de usuario incorrecto !Intentar Nuevamente');
            $this->redirect('edita_usuario/index');
        }
        $con = Propel::getConnection();
        $con->beginTransaction();
        try {
            $codigo = $cliente->getUsuario();
            $cliente->delete();
            $con->commit();
            $this->getUser()->setFlash('error', 'Usuario ' . $codigo . ' eliminado con exito');
            $this->redirect('edita_usuario/index');
        } catch (Exception $e) {
            $con->rollback();
            if ($e->getMessage()) {
                $this->getUser()->setFlash('error', $e->getMessage() . ', !Intentar Nuevamente');
            }
            $this->redirect('edita_usuario/index');
        }
    }

    public function executeMuestra(sfWebRequest $request) {
        $Id = $request->getParameter('id'); //=155555&
        $this->usuario = UsuarioQuery::create()->findOneById($Id);
        $this->id = $Id;
        $default['nombre_completo'] = $this->usuario->getNombreCompleto();
        $default['correo'] = $this->usuario->getCorreo();
        $default['tipo'] = $this->usuario->getUsuario();
        $default['empresa'] = $this->usuario->getEmpresa();
                $default['activo'] = $this->usuario->getActivo();
        $default['observaciones'] = $this->usuario->getObservaciones();
        $this->form = new EditaUsuarioForm($default);
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $nuevo = $this->usuario;
                $nuevo->setNombreCompleto($valores['nombre_completo']); // => Jose Antonio 
                $nuevo->setCorreo($valores['correo']); // => abrantar@hotmail.com
                $nuevo->setTipoUsuario($valores['tipo']); // => Publico
                $nuevo->setEmpresa($valores['empresa']); // => 
                $nuevo->setActivo($valores['activo']); // => 
                $nuevo->setObservaciones($valores['observaciones']); // => 
                $nuevo->save();
                $this->getUser()->setFlash('exito', 'Usuario creado con exito ');
                $this->redirect('edita_usuario/index');
            }
        }
    }

}
