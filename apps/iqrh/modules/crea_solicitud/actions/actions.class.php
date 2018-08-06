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
               $soli->setUsuarioId($usuarioId);
               $soli->setObservaciones($valores['observaciones']);
               $soli->setEstado('Pendiente');
               $soli->setCatalogoSolicitudId($valores['motivo']);
               $soli->setJefe($usuarioQue->getUsuarioJefe());
               $soli->save();               
               $bitacora = New BitacoraUsuario();
               $bitacora->setFecha(date('Y-m-d H:i'));
               $bitacora->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'));
               $bitacora->setTipo('Solicitud');
               $bitacora->setIdentificador($soli->getId());
               $bitacora->setUsuarioJefe($this->usuario->getUsuarioJefe());
               $bitacora->setMotivo($valores['observaciones']);
               $bitacora->save();               
              $this->getUser()->setFlash('exito', ' La solicitud ha sido ingresada con  éxito ' );
             $this->redirect('crea_solicitud/index');
                
            }
        }
    }

}
