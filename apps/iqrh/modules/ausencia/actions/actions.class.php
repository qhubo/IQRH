<?php

/**
 * ausencia actions.
 *
 * @package    plan
 * @subpackage ausencia
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ausenciaActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeTipo(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $dia = 1;
        $tipoAsuencia = TipoAusenciaQuery::create()->findOneById($id);
        if ($tipoAsuencia) {
            $dia = $tipoAsuencia->getDia();
        }
        echo $dia;
        die();
    }

    public function executeIndex(sfWebRequest $request) {
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->usuario = UsuarioQuery::create()->findOneById($usuarioId);
        $carpetaArchivos = sfConfig::get('sf_upload_dir'); // $ParametroConexion['ruta']; 
        // $this->empleados = UsuarioQuery::create()->filterByUsuarioJefe($usuario_id)->find();
        $default['dia'] = date('d/m/Y');
        $this->form = new IngresoAusenciaForm($default);
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $empleado = $valores['empleado'];
                $tipo = $valores['tipo'];
                $dia = 1;
                $tipoAsuencia = TipoAusenciaQuery::create()->findOneById($tipo);
                if ($tipoAsuencia) {
                    $dia = $tipoAsuencia->getDia();
                }



                $usuarioQue = UsuarioQuery::create()->findOneById($empleado);
                $fechaInicio = $valores['dia'];
                $fechaInicio = explode('/', $fechaInicio);
                $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
                $fecha = date('Y-m-j');
                $nuevafecha = strtotime('+' . $dia . ' day', strtotime($fecha));
                $fechaFin = date('Y-m-j', $nuevafecha);

                $soli = new SolicitudAusencia();
                $soli->setFechaFin($fechaFin);
                $soli->setFecha($fechaInicio);
                $soli->setUsuarioId($empleado);
                $soli->setMotivo($valores['observaciones']);
                $soli->setEstado('Pendiente');
                $soli->setComentarioModero('');
                $soli->setJefe($usuarioQue->getUsuarioJefe());
                $filename = '';
                if ($valores["archivo"]) {
                    $archivo = $valores["archivo"];
                    $nombre = $archivo->getOriginalName();
                    $nombre = str_replace(" ", "_", $nombre);
                    $nombre = str_replace(".", "", $nombre);
                    $filename = $nombre . date("ymdh") . $archivo->getExtension($archivo->getOriginalExtension());
                    $archivo->save(sfConfig::get("sf_upload_dir") . DIRECTORY_SEPARATOR . 'carga' . DIRECTORY_SEPARATOR . $filename);
                    $archivo->save($carpetaArchivos . 'carga' . DIRECTORY_SEPARATOR . $filename);
                    $soli->setArchivoUno($filename);
                    $soli->save();
                }

                $soli->save();


//                echo "<pre>";
//                print_r($soli);
//                die();

                $bitacora = New BitacoraUsuario();
                $bitacora->setFecha(date('Y-m-d H:i'));
                $bitacora->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'));
                $bitacora->setTipo('Ausencia');
                $bitacora->setIdentificador($soli->getId());
                $bitacora->setUsuarioJefe($usuarioQue->getUsuarioJefe());
                $bitacora->setMotivo($valores['observaciones']);
                $bitacora->setArchivoUno($filename);
                $bitacora->save();

                $this->getUser()->setFlash('exito', ' La solicitud de ausencia ha sido ingresada con  éxito ');
                $this->redirect('ausencia/index');
            }
        }
    }

}
