<?php

/**
 * vacaciones actions.
 *
 * @package    plan
 * @subpackage vacaciones
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vacacionesActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
                $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->usuario = UsuarioQuery::create()->findOneById($usuarioId);
        $vacaciones =UsuarioVacacionQuery::periodos($this->usuario->getCodigo());
        $totalderecho=0;
        $totalpagado=0;
        foreach ($vacaciones as $reg) {
            $totalderecho =$totalderecho+$reg['derecho'];
            $totalpagado = $totalpagado+$reg['pagada'];
        }
        
       $pendientes = $totalderecho-$totalpagado;
       $this->pendientes=$pendientes;
       $this->vacaciones=$vacaciones;
       $explode =explode (".", $pendientes);
       
      // $default['dia']=$explode[0];
        

        $carpetaArchivos = sfConfig::get('sf_upload_dir'); // $ParametroConexion['ruta']; 
        $default['diaInicio']=date('d/m/Y');
        $this->form = new IngresoVacacionForm($default);
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $empleado = $valores['empleado'];
                $usuarioQue = UsuarioQuery::create()->findOneById($empleado);
                $fechaInicio = $valores['diaInicio'];
                $fechaInicio = explode('/', $fechaInicio);
                $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
                $fechaFin = $valores['diaFin'];
                $fechaFin = explode('/', $fechaFin);
                $fechaFin = $fechaFin[2] . '-' . $fechaFin[1] . '-' . $fechaFin[0];
                $solVacacion = new SolicitudVacacion();
                $solVacacion->setUsuarioId($empleado);
                $solVacacion->setFechaInicio($fechaInicio);
                $solVacacion->setFechaFin($fechaFin);
                $solVacacion->setDia($valores['dia']);
                $solVacacion->setMotivo($valores['observaciones']);
                $solVacacion->save();
                      $filename = '';
                if ($valores["archivo"]) {
                    $archivo = $valores["archivo"];
                    $nombre = $archivo->getOriginalName();
                    $nombre = str_replace(" ", "_", $nombre);
                    $nombre = str_replace(".", "", $nombre);
                    $filename = $nombre . date("ymdh") . $archivo->getExtension($archivo->getOriginalExtension());
                    $archivo->save(sfConfig::get("sf_upload_dir") . DIRECTORY_SEPARATOR . 'carga' . DIRECTORY_SEPARATOR . $filename);
                    $archivo->save($carpetaArchivos . 'carga' . DIRECTORY_SEPARATOR . $filename);
                    $solVacacion->setArchivoUno($filename);
                    $solVacacion->save();
                }
                
               $bitacora = New BitacoraUsuario();
               $bitacora->setFecha(date('Y-m-d H:i'));
               $bitacora->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'));
               $bitacora->setTipo('Vacacion');
               $bitacora->setIdentificador($solVacacion->getId());
               $bitacora->setUsuarioJefe($usuarioQue->getUsuarioJefe());
               $bitacora->setMotivo($valores['observaciones']);
               $bitacora->setArchivoUno($filename);
               $bitacora->save();
               
                $this->getUser()->setFlash('exito', ' La solicitud de vacación ha sido ingresada con éxito ');
                $this->redirect('vacaciones/index');
            }
        }
    }

}
