<?php

/**
 * rest_asiste actions.
 *
 * @package    plan
 * @subpackage rest_asiste
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class rest_asisteActions extends sfActions {

    /**
     *  18 000 5465108
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeAsiste(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $this->getResponse()->setContentType('charset=utf-8');
        $token = $request->getParameter('token');
        $fechaHora = $request->getParameter('fecha');
        $hora = $request->getParameter('hora');
        $dia = $request->getParameter('dia');
        $usuario = $request->getParameter('usuario');
        if ($token <> "bbba722f948709955de06b9e2a7e703e3bc15996") {
            $resultado['valido'] = 0;
            $resultado['mensaje'] = 'TOKEN NO VALIDO';
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
        }
        $resultado['mensaje'] = 'TOKEN NO VALIDO';
        $usuarioQ = null;
        if ($usuario) {
            $usuarioQ = UsuarioQuery::create()->findOneByCodigo($usuario);
        }
        if (!$usuarioQ) {
            $resultado['valido'] = 0;
            $resultado['mensaje'] = 'USUARIO NO ENCONTRADO';
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
        }
        if (!$fechaHora) {
            $resultado['valido'] = 0;
            $resultado['mensaje'] = 'FECHA NO RECIBIDA';
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
        }

        $con = Propel::getConnection();
        $con->beginTransaction();
        try {
            if ($usuarioQ) {

                $asistencia = AsistenciaUsuarioQuery::create()
                        ->filterByFechaHora($fechaHora)
                        ->filterByUsuario($usuarioQ->getUsuario())
                        ->findOne();
                if (!$asistencia) {
                    $asistencia = new AsistenciaUsuario();
                    $asistencia->setFechaHora($fechaHora);
                    $asistencia->setDia($dia);
                    $asistencia->setHora($hora);
                    $asistencia->save();
                }
            }
            $resultado['valido'] = 1;
            $resultado['mensaje'] = 'ACTUALIZADO';
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
        } catch (Exception $e) {
            $resultado['valido'] = 0;
            $resultado['mensaje'] = $e->getMessage();
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
            $con->rollback();
        }
    }

}
