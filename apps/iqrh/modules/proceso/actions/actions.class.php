<?php

/**
 * proceso actions.
 *
 * @package    plan
 * @subpackage proceso
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class procesoActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        AsistenciaUsuarioQuery::procesa();
//        echo "registro actualizados " . $actualizados;
        die();
    }

    public function executeEnvio(sfWebRequest $request) {
        $url = 'http://iqrh:8080/iqrh_dev.php/rest_asiste/asiste';
        $usuarioQ = UsuarioQuery::create()
                ->setlimit(10)
                ->where("Usuario.Codigo not like '%INPRO%'")
                ->find();
        $cantida = 0;
        foreach ($usuarioQ as $usuario) {
            $cantida++;
            $dia = date('Y-m-13');
            $hora = '11:00'; // date('H:i');
            $postData['token'] = 'bbba722f948709955de06b9e2a7e703e3bc15996';
            $postData['usuario'] = $usuario->getCodigo();
            $postData['fecha'] = $dia . " " . $hora;
            $postData['hora'] = $hora;
            $postData['dia'] = $dia;
            $handler = curl_init();
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($handler, CURLOPT_URL, $url);
            curl_setopt($handler, CURLOPT_POST, true);
            curl_setopt($handler, CURLOPT_POSTFIELDS, $postData);
            $resultado = curl_exec($handler);
            curl_close($handler);
            $resultado = json_decode($resultado);
        }
        echo "cantidad " . $cantida;
        die();
    }

}
