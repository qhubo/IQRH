<?php

/**
 * crea_solicitud actions.
 *
 * @package    plan
 * @subpackage crea_solicitud
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class crea_solicitudActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
 public function executeIndex(sfWebRequest $request) {
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->usuario = UsuarioQuery::create()->findOneById($usuarioId);
        $this->form = new IngresoSolicitudForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
               $valores = $this->form->getValues();
               $usuarioQue = UsuarioQuery::create()->findOneById($usuarioId);
               $fechaInicio = $valores['dia'];
               $fechaInicio = explode('/', $fechaInicio);
               $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
               $soli = new SolicitudUsuario();
               $soli->setFecha(date('Y-m-d'));
                $empleado = $valores['empleado'];
//                     echo $empleado;
//                die();
               $soli->setUsuarioId($empleado);
               $soli->setObservaciones($valores['observaciones']);
               $soli->setEstado('Pendiente');
               $soli->setCatalogoSolicitudId($valores['motivo']);
               $soli->setJefe($usuarioQue->getUsuarioJefe());
               $soli->save();    
               $filaname='';
                  $carpetaArchivos = sfConfig::get('sf_upload_dir'); // $ParametroConexion['ruta']; 
   
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
                
               $bitacora = New BitacoraUsuario();
               $bitacora->setFecha(date('Y-m-d H:i'));
               $bitacora->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'));
               $bitacora->setTipo('Solicitud');
               $bitacora->setIdentificador($soli->getId());
               $bitacora->setUsuarioJefe($this->usuario->getUsuarioJefe());
               $bitacora->setMotivo($valores['observaciones']);
               $bitacora->setArchivoUno($filaname);
               $bitacora->save();               
              $this->getUser()->setFlash('exito', ' La solicitud ha sido ingresada con  éxito ' );
             $this->redirect('crea_solicitud/index');
                
            }
        }
    }

}
