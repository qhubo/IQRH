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
    public function executeIndex(sfWebRequest $request) {
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->usuario = UsuarioQuery::create()->findOneById($usuarioId);
        $this->form = new IngresoAusenciaForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
               $valores = $this->form->getValues();
               $usuarioQue = UsuarioQuery::create()->findOneById($usuarioId);
               $fechaInicio = $valores['dia'];
               $fechaInicio = explode('/', $fechaInicio);
               $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
               $soli = new SolicitudAusencia();
               $soli->setFecha($fechaInicio);
               $soli->setUsuarioId($usuarioId);
               $soli->setMotivo($valores['observaciones']);
               $soli->setEstado('Pendiente');
               $soli->setComentarioModero('');
               $soli->setJefe($usuarioQue->getUsuarioJefe());
               $soli->save();
              $this->getUser()->setFlash('exito', ' La solicitud de ausencia ha sido ingresada con  éxito ' );
             $this->redirect('ausencia/index');
                
            }
        }
    }

}
