<?php

/**
 * finiquito actions.
 *
 * @package    plan
 * @subpackage finiquito
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class finiquitoActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->usuario = UsuarioQuery::create()->findOneById($usuarioId);
        $this->form = new IngresoFiniquitoForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $fechaInicio = $valores['dia'];
                $fechaInicio = explode('/', $fechaInicio);
                $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];

                $nueva = new SolicitudFinquito();
                $nueva->setFechaRetiro($fechaInicio);
                $nueva->setMotivo($valores['motivo']);
                $nueva->setObservaciones($valores['observaciones']);
                $nueva->setUsuarioGraba($usuarioId);
                $nueva->setUsuarioRetiro($valores['empleado']);
                $nueva->setEstado("Pendiente");
                $nueva->save();
                    $carpetaArchivos = sfConfig::get('sf_upload_dir'); // $ParametroConexion['ruta']; 
   
                 if ($valores["archivo"]) {
                    $archivo = $valores["archivo"];
                    $nombre = $archivo->getOriginalName();
                    $nombre = str_replace(" ", "_", $nombre);
                    $nombre = str_replace(".", "", $nombre);
                    $filename = $nombre . date("ymdh") . $archivo->getExtension($archivo->getOriginalExtension());
                    $archivo->save(sfConfig::get("sf_upload_dir") . DIRECTORY_SEPARATOR . 'carga' . DIRECTORY_SEPARATOR . $filename);
                    $archivo->save($carpetaArchivos . 'carga' . DIRECTORY_SEPARATOR . $filename);
                    $nueva->setArchivoUno($filename);
                    $nueva->save();
                }
                $this->getUser()->setFlash('exito', ' La solicitud de retiro ha sido ingresada con  éxito ' );
               $this->redirect('finiquito/index');
            }
        }
    }

}
