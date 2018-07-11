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
        $this->form = new IngresoVacacionForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $usuarioQue = UsuarioQuery::create()->findOneById($usuarioId);
                $fechaInicio = $valores['diaInicio'];
                $fechaInicio = explode('/', $fechaInicio);
                $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
                $fechaFin = $valores['diaFin'];
                $fechaFin = explode('/', $fechaFin);
                $fechaFin = $fechaFin[2] . '-' . $fechaFin[1] . '-' . $fechaFin[0];
                $solVacacion = new SolicitudVacacion();
                $solVacacion->setUsuarioId($usuarioId);
                $solVacacion->setFechaInicio($fechaInicio);
                $solVacacion->setFechaFin($fechaFin);
                $solVacacion->setDia($valores['dia']);
                $solVacacion->setMotivo($valores['observaciones']);
                $solVacacion->save();
                
                
                      $bitacora = New BitacoraUsuario();
               $bitacora->setFecha(date('Y-m-d H:i'));
               $bitacora->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'));
               $bitacora->setTipo('Vacacion');
               $bitacora->setIdentificador($solVacacion->getId());
               $bitacora->setUsuarioJefe($this->usuario->getUsuarioJefe());
               $bitacora->setMotivo($valores['observaciones']);
               $bitacora->save();
               
                $this->getUser()->setFlash('exito', ' La solicitud de vacación ha sido ingresada con éxito ');
                $this->redirect('ausencia/index');
            }
        }
    }

}
