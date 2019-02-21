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

    
      public function executeReporte(sfWebRequest $request) {
        $pdf = new sfTCPDF("P", "mm", "Letter");
        $empresaseleccion = $request->getParameter("id");
        
            $usuarioQ = UsuarioQuery::create()
                ->filterByEmpresa($empresaseleccion)
                ->find();
        $listaOk[] = 'x';
        foreach ($usuarioQ as $cod) {
            $listaOk[] = $cod->getCodigo();
        }
        $listado = ProyeccionVacacionQuery::create()
             //   ->filterByUsuario($listaOk, Criteria::IN)
                ->orderByFechaInicio("Asc")
                ->filterById($request->getParameter('edit'), Criteria::NOT_EQUAL)
                ->find();
        
        

         $html = $this->getPartial('ingresa_vacacion/reporte', array("muestra" => 0,
            'listado' => $listado, 'empresa'=>$empresaseleccion,
        ));

        // echo $html;
        // die();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('IQRH');
        $pdf->SetTitle('Proyecta Vacacion '. $empresaseleccion);
        $pdf->SetSubject('Proyecta');
        $pdf->SetKeywords('Proyecta, Vacacion,Reporte'); // set default header data
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->SetMargins(6, 5, 0, true);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetHeaderMargin(0.1);
        $pdf->SetFooterMargin(0);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('helvetica', '', 8);
        $pdf->AddPage();
        //   $pdf->Image('./images/fondo.jpg', 0, 55, 720, 50, 'JPG', 'http://app.doblef.com/', '', true, 150, '', false, false, 1, false, false, false);
        $pdf->writeHTML($html);
        $empresaseleccion = str_replace(" ", "_", $empresaseleccion);
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        $pdf->Output('ProyectaVacacion_'.$empresaseleccion.'.pdf', 'I');
    }
    
    
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
