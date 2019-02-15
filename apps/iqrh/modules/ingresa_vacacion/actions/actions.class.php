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
        $vacaciones = UsuarioVacacionQuery::periodos($codigo);
        $retorna = '';
        foreach ($vacaciones as $reg) {
            $pagada = $reg['pagada'];
            if ($pagada > 0) {
                $periodo = $reg['periodo'];
                $retorna = " Ultimo Periodo Pagada " . $periodo;
            }
        }
        sfContext::getInstance()->getUser()->setAttribute('usuario', $retorna, 'Diap');
        echo $retorna;
        die();
    }

    public function executeDia(sfWebRequest $request) {
        $codigo = $request->getParameter('id');
        $vacaciones = UsuarioVacacionQuery::periodos($codigo);
        $totalderecho = 0;
        $totalpagado = 0;
        foreach ($vacaciones as $reg) {
            $totalderecho = $totalderecho + $reg['derecho'];
            $totalpagado = $totalpagado + $reg['pagada'];
        }
        $pendientes = $totalderecho - $totalpagado;
        $retorna = " Dias Pendientes " . $pendientes;
        sfContext::getInstance()->getUser()->setAttribute('usuario', $retorna, 'Dia');

        echo $retorna;
        die();
    }

    public function executeIndex(sfWebRequest $request) {
        $this->empresaseleccion = $request->getParameter('em');
        $this->t = $request->getParameter('t');


        $empresaseleccion = $this->empresaseleccion;
        $valores = null;
        $edit=null;
        $this->q =$request->getParameter('edit');
        sfContext::getInstance()->getUser()->setAttribute('usuario', $request->getParameter('edit'), 'val');
        if ($request->getParameter('edit')) {
            $edit = ProyeccionVacacionQuery::create()
                    ->filterById($request->getParameter('edit'))
                    ->findOne();
            if ($edit) {
                $usuarioQ = UsuarioQuery::create()->findOneByCodigo($edit->getUsuario());
                $valores['diaInicio'] = $edit->getFechaInicio('d/m/Y');
                $valores['empleado'] = $edit->getUsuario();
                $valores['dia'] = $edit->getDiaVacacion();
                $valores['periodo'] = $edit->getPeriodo();
                $valores['observaciones'] = $edit->getObservaciones();
                $valores['diaFin'] = $edit->getFechaFin('d/m/Y');

                if ($usuarioQ) {
                    $empresaseleccion = $usuarioQ->getEmpresa();
                    $this->empresaseleccion = $empresaseleccion;
                }

                $vacaciones = UsuarioVacacionQuery::periodos($edit->getUsuario());
                $totalderecho = 0;
                $totalpagado = 0;
                foreach ($vacaciones as $reg) {
                    $totalderecho = $totalderecho + $reg['derecho'];
                    $totalpagado = $totalpagado + $reg['pagada'];
                }
                $pendientes = $totalderecho - $totalpagado;
                $retorna = " Dias Pendientes " . $pendientes;
                sfContext::getInstance()->getUser()->setAttribute('usuario', $retorna, 'Dia');
                $retorna = '';
                foreach ($vacaciones as $reg) {
                    $pagada = $reg['pagada'];
                    if ($pagada > 0) {
                        $periodo = $reg['periodo'];
                        $retorna = " Ultimo Periodo Pagada " . $periodo;
                    }
                }
                sfContext::getInstance()->getUser()->setAttribute('usuario', $retorna, 'Diap');
            }
        }
        $this->edit = $edit;
        sfContext::getInstance()->getUser()->setAttribute('seleccion', $empresaseleccion, 'empresa');
        $this->empresas = UsuarioQuery::create()
                ->filterByEmpresa('', Criteria::NOT_EQUAL)
                ->orderByEmpresa()
                ->groupByEmpresa()
                ->find();
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $usuarioQ = UsuarioQuery::create()->findOneById($usuarioId);


        $this->form = new IngresoProyVacacionForm($valores);
        if ($this->t == 1) {
            if ($request->isMethod('post')) {
                $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
                if ($this->form->isValid()) {
                    $valores = $this->form->getValues();


                    $fechaInicio = explode('/', $valores['diaInicio']);
                    $diaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
                    if ($edit) {
                       $nuevo=$edit; 
                    } else {
                      $nuevo = new ProyeccionVacacion();
                      $nuevo->setFechaCrea(date('Y-m-d')); 
                    }
                    
                    $nuevo->setUsuario($valores['empleado']);
                    $nuevo->setFechaInicio($diaInicio);
                    $fechaInicio = explode('/', $valores['diaFin']);
                    $fechaFin = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
                    $nuevo->setFechaFin($fechaFin);
                    $nuevo->setDiaVacacion($valores['dia']);
                  
                    $nuevo->setPeriodo($valores['periodo']);
                    $nuevo->setEstatus('Nuevo');
                    $nuevo->setUsuarioCreo($usuarioQ->getCodigo());
                    $nuevo->setObservaciones($valores['observaciones']);
                    $nuevo->save();
                if ($edit){
                    $this->getUser()->setFlash('exito', 'Proyección actualizada  con éxito');
                } else {
                    $this->getUser()->setFlash('exito', 'Proyección de Vacación ingresdas con éxito');
                    
                }
                    $this->redirect("ingresa_vacacion/index?em=" . $empresaseleccion);
                }
            }
        }

        $usuarioQ = UsuarioQuery::create()
                ->filterByEmpresa($empresaseleccion)
                ->find();
        $listaOk[] = 'x';
        foreach ($usuarioQ as $cod) {
            $listaOk[] = $cod->getCodigo();
        }
        $this->listado = ProyeccionVacacionQuery::create()
                ->filterByUsuario($listaOk, Criteria::IN)
                ->orderByFechaInicio("Asc")
                ->filterById($request->getParameter('edit'), Criteria::NOT_EQUAL)
                ->find();
    }

}
