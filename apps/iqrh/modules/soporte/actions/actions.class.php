<?php

/**
 * soporte actions.
 *
 * @package    plan
 * @subpackage soporte
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class soporteActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }
   public function executeFormato(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $valo = $request->getParameter('valo');
        $retorna=number_format($valo,2);
        echo  $retorna;
        die();
    }

       public function executeFecha(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $valo = $request->getParameter('valo');
        $hoy = date('Ymd');
        $fechaInicio = $valo;
        $fechaInicio = explode('/', $fechaInicio);
        $fechaInicio = $fechaInicio[2].$fechaInicio[1]. $fechaInicio[0];
  //      $retorna= $fechaInicio."-".$hoy;
        $retorna = $valo;    
        if ($fechaInicio < $hoy) {
        $retorna=date('d/m/Y');
        }
        echo  $retorna;
        die();
    }
    public function executeAvisos(sfWebRequest $request) {
        
    }

  



}
