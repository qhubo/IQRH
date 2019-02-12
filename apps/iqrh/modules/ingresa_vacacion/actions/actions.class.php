<?php

/**
 * ingresa_vacacion actions.
 *
 * @package    plan
 * @subpackage ingresa_vacacion
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ingresa_vacacionActions extends sfActions {

    public function executeDiaP(sfWebRequest $request) {
        $codigo = $request->getParameter('id');
       $vacaciones =UsuarioVacacionQuery::periodos($codigo);
        $retorna= '';
       foreach ($vacaciones as $reg){
           $pagada = $reg['pagada'];
           if ($pagada >0) {
            $periodo=   $reg['periodo'];
             $retorna =" Ultimo Periodo Pagada ".$periodo;
           }
       }
       
//        $totalderecho=0;
//        $totalpagado=0;
//        foreach ($vacaciones as $reg) {
//            $totalderecho =$totalderecho+$reg['derecho'];
//            $totalpagado = $totalpagado+$reg['pagada'];
//        }
//       $pendientes = $totalderecho-$totalpagado;
       
        echo $retorna;
        die();
        
    }
    
    public function executeDia(sfWebRequest $request) {
         $codigo = $request->getParameter('id');
       $vacaciones =UsuarioVacacionQuery::periodos($codigo);
        $totalderecho=0;
        $totalpagado=0;
        foreach ($vacaciones as $reg) {
            $totalderecho =$totalderecho+$reg['derecho'];
            $totalpagado = $totalpagado+$reg['pagada'];
        }
       $pendientes = $totalderecho-$totalpagado;
        $retorna =" Dias Pendientes ".$pendientes;
        echo $retorna;
        die();
        
    }
    public function executeIndex(sfWebRequest $request) {

        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $usuarioQ = UsuarioQuery::create()->findOneById($usuarioId);
        $this->form = new IngresoProyVacacionForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $fechaInicio = explode('/', $valores['diaInicio']);
                $diaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];

              
                $nuevo = new ProyeccionVacacion();
                $nuevo->setUsuario($valores['empleado']);
                $nuevo->setFechaInicio($diaInicio);
                  $fechaInicio = explode('/', $valores['diaFin']);
                $fechaFin = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
                $nuevo->setFechaFin($fechaFin);
                $nuevo->setDiaVacacion($valores['dia']);
                $nuevo->setFechaCrea(date('Y-m-d'));
                $nuevo->setPeriodo($valores['periodo']);
                $nuevo->setEstatus('Nuevo');
                $nuevo->setUsuarioCreo($usuarioQ->getCodigo());
                $nuevo->save();
                $this->getUser()->setFlash('exito', 'Proyeccion de Vacacion ingresdas con exito');
                $this->redirect("ingresa_vacacion/index");
            }
        }
        $this->listado = ProyeccionVacacionQuery::create()
                ->find();
        
    }

}
