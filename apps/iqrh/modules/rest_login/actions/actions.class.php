<?php

/**
 * rest_login actions.
 *
 * @package    plan
 * @subpackage rest_login
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class rest_loginActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeLogin(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $this->getResponse()->setContentType('charset=utf-8');
        $token = $request->getParameter('token');
        $resultado['valido'] = 0;
        $resultado['token'] = 1;
        $resultado['mensaje'] = 'TOKEN NO VALIDO';
        $usuarioQ = UsuarioQuery::create()->findOneByToken($token);
        if ($usuarioQ) {
            $usuarioQ->setToken('');
            $usuarioQ->save();
            $valido = $usuarioQ;
            $this->getUser()->getAttributeHolder()->clear();
            $user = sfContext::getInstance()->getUser();
            $user->setAuthenticated(true);
            $user->setAttribute('usuario', $valido->getId(), 'seguridad');
            //    sfContext::getInstance()->getUser()->setAttribute("usuario", $valido->getEmpresaId(), 'empresa');
            $user->setAttribute('administrador', $valido->getAdministrador(), 'seguridad');
            sfContext::getInstance()->getUser()->setAttribute('usuario', $valido->getId(), 'seguridad');
            if ($valido->getImagen()) {
                sfContext::getInstance()->getUser()->setAttribute('usuario', $valido->getImagen(), 'imagen');
            }
            $user->setAttribute('usuarioNombre', $valido->getUsuario(), 'seguridad');
            $supervisa = UsuarioQuery::create()->filterByUsuarioJefe($valido->getId())->count();
            sfContext::getInstance()->getUser()->setAttribute('supervisa', $supervisa, 'seguridad');
            UsuarioQuery::menuUsuario($valido->getId());
            $user->setAuthenticated(true);
            $this->redirect("inicio/index");
        }
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeCheck(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $this->getResponse()->setContentType('charset=utf-8');
        $usuario = $request->getParameter('usuario');
        $clave = $request->getParameter('clave');
        $clave = sha1($clave);
        $resultado['valido'] = 0;
        $resultado['token'] = 1;
        $resultado['mensaje'] = 'USUARIO NO VALIDO';
        $usuarioQ = UsuarioQuery::create()
                ->filterByUsuario($usuario)
                ->filterByClave($clave)
                ->findOne();
        if ($usuarioQ) {
            $token = sha1(date('YmdH') . rand(1, 10) . $usuarioQ->getId());
            $usuarioQ->setToken($token);
            $usuarioQ->save();
            $resultado['valido'] = 1;
            $resultado['token'] = $token;
            $resultado['mensaje'] = 'BIENVENIDO USUARIO ';
        }
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

}
