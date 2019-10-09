<?php

/**
 * reporte_asistencia actions.
 *
 * @package    plan
 * @subpackage reporte_asistencia
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reporte_asistenciaActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeReporte(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $Empleado = UsuarioQuery::create()->findOneById($id);
        $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia'));
        $fechaInicio = $valores['fechaInicio'];
        $fechaFin = $valores['fechaFin'];
        $lista = ProyectoQuery::reporteasistencia($Empleado, $fechaInicio, $fechaFin);
     
        $html = $this->getPartial('reporte_asistencia/reporte', array('Empleado'=>$Empleado,
         'lista'=>$lista       
        ));
  $pdf = new sfTCPDF("P", "mm", "Letter");
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('IQRH');
        $pdf->SetTitle('Asistencia Resumen');
        $pdf->SetSubject('Asistencia');
        $pdf->SetKeywords('Asistencia, Empleado,Asistencia'); // set default header data
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
        $pdf->SetFont('helvetica', '', 9);
        $pdf->AddPage();
        //   $pdf->Image('./images/fondo.jpg', 0, 55, 720, 50, 'JPG', 'http://app.doblef.com/', '', true, 150, '', false, false, 1, false, false, false);
        $pdf->writeHTML($html);
      //  $pdf->AddPage();
         $pdf->Output('Reporte_Asistencia_'.$Empleado->getCodigo().'.pdf', 'I');
    }

    public function executeDetalle(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $this->id = $id;
        $Empleado = UsuarioQuery::create()->findOneById($id);
        $this->Empleado = $Empleado;
        $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia'));
        $fechaInicio = $valores['fechaInicio'];
        $fechaFin = $valores['fechaFin'];
        $lista = ProyectoQuery::reporteasistencia($Empleado, $fechaInicio, $fechaFin);

        $this->lista = $lista;
//        echo "<pre>";
//        print_r($lista);
//        die();
    }

    public function semana($nu) {
        $data[1] = 'Lun';
        $data[2] = 'Mar';
        $data[3] = 'Mie';
        $data[4] = 'Juv';
        $data[5] = 'Vie';
        $data[6] = 'Sab';
        $data[7] = 'Dom';
        $dia = $data[$nu];
        return $dia;
    }

    public function executeObservacion(sfWebRequest $request) {
        $empresa = $request->getParameter('id');
        $valor = $request->getParameter('idv');
        $empresHorario = EmpresaHorarioQuery::create()->findOneById($empresa);
        $empresHorario->setTextoUno($valor);
        $empresHorario->save();
        echo 'actualizado ';
        die();
    }

    public function executeObservacion2(sfWebRequest $request) {
        $empresa = $request->getParameter('id');
        $valor = $request->getParameter('idv');
        $empresHorario = EmpresaHorarioQuery::create()->findOneById($empresa);
        $empresHorario->setTextoDos($valor);
        $empresHorario->save();
        echo 'actualizado ';
        die();
    }

    public function executeMuestra(sfWebRequest $request) {

        $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia'));
        $this->valores = $valores;
        $fechaInicio = $valores['fechaInicio'];
        $fechaInicio = explode('/', $fechaInicio);
        $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
        $fechaFin = $valores['fechaFin'];
        $fechaFin = explode('/', $fechaFin);
        $fechaFin = $fechaFin[2] . '-' . $fechaFin[1] . '-' . $fechaFin[0];
        $asistencia = new AsistenciaUsuarioQuery();
        $asistencia->filterByEmpresa($valores['empresa']);
        $asistencia->where("AsistenciaUsuario.Dia >= '" . $fechaInicio . " 00:00:00" . "'");
        $asistencia->where("AsistenciaUsuario.Dia <= '" . $fechaFin . " 23:59:00" . "'");
        $asistencia->orderByDia('Desc');
        $asistencia->groupByDia();
        $asistencia->groupByUsuario();
        $this->asistencias = $asistencia->find();
        $this->inicio = $fechaInicio;
        $this->fin = $fechaFin;
        $asistencia = AsistenciaUsuarioQuery::create()
                ->where("AsistenciaUsuario.Dia >= '" . $fechaInicio . " 00:00:00" . "'")
                ->where("AsistenciaUsuario.Dia <= '" . $fechaFin . " 23:59:00" . "'")
                ->filterByEmpresa($valores['empresa'])
                ->groupByUsuario()
                ->find();
        $usuario[] = 0;
        foreach ($asistencia as $reg) {
            $usuario[] = $reg->getUsuario();
        }

        $this->Listado = UsuarioQuery::create()
                ->filterByUsuario($usuario, Criteria::IN)
                ->filterByUsuario('Demo', Criteria::NOT_IN)
                ->orderByPrimerApellido("Asc")
                //->filterByEmpresa('PCR GUATEMALA')
                ->filterByEmpresa($valores['empresa'])
                ->find();
        $empresa = $valores['empresa'];
        $this->dataGra = EmpresaHorarioQuery::data($empresa);
        $emrresaHora = EmpresaHorarioQuery::create()->findOneByEmpresa($empresa);

        $default = null;

        $this->idHorario = '';
        $this->textoUno = '';
        $this->textoDos = '';
        if ($emrresaHora) {
            $this->idHorario = $emrresaHora->getId();
            $this->textoUno = $emrresaHora->getTextoUno();
            $this->textoDos = $emrresaHora->getTextoDos();
        }
        $default['texto'] = $this->textoUno;
        $default['texto2'] = $this->textoDos;
        $this->form = new TextosForm($default);
//        echo "<pre>";
//        print_r($this->dataGra);
//        echo "</pre>";
    }

    public function executeIndex(sfWebRequest $request) {
//        $resulta = 'a:2:{s:13:"Autenticacion";a:2:{s:5:"Login";s:9:"JANDRESGA";s:8:"Password";s:10:"OUZVWk4681";}s:10:"DatosEnvio";a:5:{s:20:"CodigoPobladoDestino";s:4:"1020";s:11:"CodigoPieza";i:2;s:12:"TipoServicio";i:1;s:9:"PesoTotal";s:1:"1";s:13:"CodigoCredito";s:7:"1803237";}}';
//        echo "<pre>";
//        print_r(unserialize($resulta));
//        echo "</pre>";
//        $resulta ='O:8:"stdClass":1:{s:22:"ResultadoObtenerTarifa";O:8:"stdClass":3:{s:18:"ResultadoOperacion";O:8:"stdClass":3:{s:16:"ResultadoExitoso";b:0;s:12:"MensajeError";s:139:"La cadena de entrada no tiene el formato correcto.Revise el tipo de autorización con sus credenciales  y las url del sistema de parametros";s:15:"CodigoRespuesta";i:0;}s:4:"Peso";s:1:"0";s:11:"MontoTarifa";s:1:"0";}}';
//        echo "<pre>";
//        print_r(unserialize($resulta));
//        echo "</pre>";
//        die();
//        
        // echo AsistenciaUsuarioQuery::laboradosReales($fechaInicio, $fechaFin);
        //   echo "<br>";
        $this->empresaseleccion = $request->getParameter('em');
        $empresaseleccion = $this->empresaseleccion;
        sfContext::getInstance()->getUser()->setAttribute('seleccion', $empresaseleccion, 'empresa');
        $this->empresas = UsuarioQuery::create()
                ->filterByEmpresa('', Criteria::NOT_EQUAL)
                ->orderByEmpresa()
                ->groupByEmpresa()
                ->find();
        $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia'));
        if (!$valores) {
            $valores['fechaInicio'] = date('01/m/Y');
            $valores['fechaFin'] = date('d/m/Y');
            $valores['empresa'] = 'PCR GUATEMALA';
            sfContext::getInstance()->getUser()->setAttribute('valores', serialize($valores), 'Asistencia');
        }

        $usuarioQ = UsuarioQuery::create()
                ->filterByFechaReporte('', Criteria::NOT_EQUAL)
                ->orderByFechaReporte("Desc")
                ->findOne();
        $this->fechaRepor = '';
        if ($usuarioQ) {
            $this->fechaRepor = $usuarioQ->getFechaReporte();
        }
        $this->form = new ConsultaAsistenciaForm($valores);
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $fechaInicio = $valores['fechaInicio'];
                $fechaInicio = explode('/', $fechaInicio);
                $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
                $fechaFin = $valores['fechaFin'];
                $fechaFin = explode('/', $fechaFin);
                $fechaFin = $fechaFin[2] . '-' . $fechaFin[1] . '-' . $fechaFin[0];
                $dias = AsistenciaUsuarioQuery::laboradosReales($fechaInicio, $fechaFin);
                $usus = UsuarioQuery::create()
                        ->filterByEmpresa($valores['empresa'])
                        ->find();
//                   echo "<pre>";
//                print_r($usus);
//                echo "</pre>";
//                die();
                foreach ($usus as $reg) {
                    $reg->setHoras(0);
                    $reg->setAsistencia(0);
                    $reg->save();
                }

                $asistencia = AsistenciaUsuarioQuery::create()
                        ->where("AsistenciaUsuario.Dia >= '" . $fechaInicio . " 00:00:00" . "'")
                        ->where("AsistenciaUsuario.Dia <= '" . $fechaFin . " 23:59:00" . "'")
                        ->filterByEmpresa($valores['empresa'])
                        ->groupByUsuario()
                        ->find();


                $usuario[] = 0;
                foreach ($asistencia as $reg) {
                    $usuario[] = $reg->getUsuario();
                }
                $Listado = UsuarioQuery::create()
                        ->filterByUsuario($usuario, Criteria::IN)
                        ->filterByUsuario('Demo', Criteria::NOT_IN)
                        ->orderByPrimerApellido("Desc")
                        // ->filterByEmpresa('PCR GUATEMALA')
                        ->filterByEmpresa($valores['empresa'])
                        ->find();


                foreach ($Listado as $regi) {
                    $usuarioQ = UsuarioQuery::create()->findOneById($regi->getId());
                    $puntualidad = 0;
//                    echo $fechaInicio;
//                    echo "  ";
//                    echo $fechaFin;
//                    echo "<br>";
//                    $dias = AsistenciaUsuarioQuery::laborados($fechaInicio, $fechaFin, $regi->getUsuario());
                    $tardes = AsistenciaUsuarioQuery::tardes($fechaInicio, $fechaFin, $regi->getUsuario());
//                  echo $dias;
//                  echo "<br>";
//                  echo $tardes;
//                  die();
                    if ($dias > 0) {
                        $puntualidad = (($tardes * 100) / $dias);
                        $puntualidad = round($puntualidad, 2);
                    }
                    $reales = AsistenciaUsuarioQuery::Reales($fechaInicio, $fechaFin, $regi->getUsuario());
                    $usuarioQ->setFechaReporte($valores['fechaInicio'] . " AL  " . $valores['fechaFin']);
                    $usuarioQ->setAsistencia($dias);
                    $usuarioQ->setPuntualida($puntualidad);
                    $usuarioQ->setHoras($reales);
                    $usuarioQ->save();
                    //     echo $regi->getCodigo()." ".$dias." ".$puntualidad;
                    //     echo "<br>";
                }
                //die();
                sfContext::getInstance()->getUser()->setAttribute('valores', serialize($valores), 'Asistencia');
                $this->redirect("reporte_asistencia/muestra");
            }
        }


//        $html = $this->getPartial('reporte/asistencia', array("muestra" => 0, 'Listado' => $Listado,
//            'inicio'=>$inicio, 'fin'=>$fin, 'horamensual'=>$horaMensual,
//            'mes' => $mesDescripcion
//        ));
    }

}
