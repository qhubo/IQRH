<?php

/**
 * reporte actions.
 *
 * @package    plan
 * @subpackage reporte
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reporteActions extends sfActions {

    public function executeResumenAsiste(sfWebRequest $request) {
        $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia'));
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
        $asistencias = $asistencia->find();
        $inicio = $fechaInicio;
        $fin = $fechaFin;
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
                ->orderByPrimerApellido("Asc")
                //->filterByEmpresa('PCR GUATEMALA')
                ->filterByEmpresa($valores['empresa'])
                ->find();
$horamensual =160;

        $nombreempresa = $valores['empresa'];
        $pestanas[] = 'Reporte_Asistencia';
        $nombreEMpresa = str_replace(" ", "_", $nombreempresa);
        $Parametro = ParametroQuery::create()->findOne();
        $filename = "Reporte_Asistencia_" . $nombreEMpresa . date("d_m_Y");
        $xl = sfContext::getInstance()->getUser()->nuevoExcel($nombreempresa, $pestanas, $pestanas[0]);
        $hoja = $xl->setActiveSheetIndex(0);
        //CABECERA  Y FILTRO        
        $hoja->getRowDimension('1')->setRowHeight(15);
        $hoja->getRowDimension('2')->setRowHeight(20);
        $textoBusqueda = $this->textobusqueda($valores);
        $hoja->mergeCells("A1:A2");
        $obj = new PHPExcel_Worksheet_Drawing();
        $obj->setName("Logo");
        $obj->setDescription("Logo");
        $obj->setPath("./uploads/segmento/" . $Parametro->getLogo());
        $obj->setCoordinates("A1");
        $obj->setHeight(48);
        $obj->setWorksheet($hoja);
        $hoja = $xl->getActiveSheet();
        $hoja->getCell("B1")->setValueExplicit(strtoupper($nombreempresa), PHPExcel_Cell_DataType::TYPE_STRING);
        $hoja->getStyle("B1")->getFont()->setBold(true);
        $hoja->getStyle("B1")->getFont()->setSize(13);
        // $hoja->getStyle("B1")->applyFromArray($styleArray);
        $hoja->getCell("C1")->setValueExplicit("Asistencia ", PHPExcel_Cell_DataType::TYPE_STRING);
        $hoja->getStyle("C1")->getFont()->setBold(true);
        $hoja->getStyle("C1")->getFont()->setSize(10);
        $hoja->mergeCells("C1:E1");
        $hoja->getCell("B2")->setValueExplicit("Busqueda ", PHPExcel_Cell_DataType::TYPE_STRING);
        $hoja->getStyle("B2")->getFont()->setBold(true);
        $hoja->getStyle("B2")->getFont()->setSize(10);
        $hoja->getCell("C2")->setValueExplicit($textoBusqueda, PHPExcel_Cell_DataType::TYPE_STRING);
        $hoja->getStyle('C2')->getAlignment()->setWrapText(true);
        $hoja->mergeCells("C2:E2");
        $fila = 3;
        $columna = 0;
        $encabezados = null;
        $encabezados[] = array("Nombre" => strtoupper("NOMBRE COMPLETO"), "width" => 60, "align" => "center", "format" => "@");
        $encabezados[] = array("Nombre" => strtoupper("PUESTO"), "width" => 50, "align" => "left", "format" => "#,##0.00");
        $encabezados[] = array("Nombre" => strtoupper("DIAS LABORADOS"), "width" => 20, "align" => "left", "format" => "#,##0");
        $encabezados[] = array("Nombre" => strtoupper("LLEGADAS TARDE"), "width" => 20, "align" => "left", "format" => "#,##0.00");
        $encabezados[] = array("Nombre" => strtoupper("PUNTUALIDAD"), "width" => 20, "align" => "center", "format" => "@");
        $encabezados[] = array("Nombre" => strtoupper("HORAS MENSUALES"), "width" => 20, "align" => "left", "format" => "#,##0.00");
        $encabezados[] = array("Nombre" => strtoupper("HORAS REALES"), "width" => 20, "align" => "left", "format" => "#,##0.00");
        $encabezados[] = array("Nombre" => strtoupper("% HORAS"), "width" => 20, "align" => "left", "format" => "#,##0.00");
        sfContext::getInstance()->getUser()->HojaImprimeEncabezadoHorizontal($encabezados, $columna, $fila, $hoja);

        foreach ($Listado as $regi) {
            $fila++;
            $datos = null;
            $puntualidad = $regi->getPuntualida();

          $datos[] = array("tipo" => 3, "valor" =>  $regi->getNombreCompleto());
         
         $datos[] = array("tipo" => 3, "valor" =>  $regi->getPuesto());
         
             $dias = $regi->getAsistencia();   //AsistenciaUsuarioQuery::laborados($inicio, $fin, $regi->getUsuario());  
            $datos[] = array("tipo" => 3,  "valor" => $dias);
             $tardes = AsistenciaUsuarioQuery::tardes($inicio, $fin, $regi->getUsuario());
            $datos[] = array("tipo" => 3,  "valor" => $tardes);
             if ($dias > 0) {
                $puntualidad = (($tardes * 100) / $dias);
            }
            $datos[] = array("tipo" => 3,  "valor" =>  round($puntualidad, 0));
            $datos[] = array("tipo" => 3, "valor" =>  "%".$horamensual);
            $reales = AsistenciaUsuarioQuery::Reales($inicio, $fin, $regi->getUsuario());
            $datos[] = array("tipo" => 3, "valor" => $reales);
            $horas = 0;
            if ($reales > $horamensual) {
                $horas = 100;
            }
            if ($reales > 0) {
                $horas = (($reales * 100) / $horamensual);
            }
            $horas = round($horas, 2);
             $datos[] = array("tipo" => 3, "valor" => $horas);
             $columnafinal = sfContext::getInstance()->getUser()->HojaImprimeListaHorizontal($datos, $columna, $fila, $hoja);
          
        }


        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
        header('Cache-Control: max-age=0');
        $xl = PHPExcel_IOFactory::createWriter($xl, 'Excel5');
        $xl->save('php://output');
        throw new sfStopException();


        die();
    }

    public function textobusqueda($valores) {
        $textoBusqueda = '';
        $Busqueda = null;
        foreach ($valores as $clave => $valor) {
            $clave = trim(strtoupper($clave));
//            echo $clave;
//            echo "<br>";
            if ($valor) {
                if ($clave == 'FECHAINICIO') {
                    $Busqueda[] = 'DEL ' . $valor;
                }
                if ($clave == 'FECHAFIN') {
                    $Busqueda[] = ' AL  ' . $valor;
                }
                if ($clave == 'USUARIO') {
                    $query = UsuarioQuery::create()->findOneById($valor);
                    if ($query) {
                        $valor = $query->getUsuario();
                    }
                    $Busqueda[] = ' USUARIO: ' . $valor;
                }
                if ($clave == 'ESTADO') {
                    $Busqueda[] = ' ESTADO: ' . $valor;
                }
            }
        }
        if ($Busqueda) {
            $textoBusqueda = implode(",", $Busqueda);
        }
        return $textoBusqueda;
    }

    public function executeRecibo(sfWebRequest $request) {
        $pdf = new sfTCPDF("P", "mm", "Letter");
        $id = $request->getParameter("id");
        $codigo = $request->getParameter("cod");

        $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia'));
        $this->valores = $valores;
        $fechaInicio = $valores['fechaInicio'];
        $fechaInicio = explode('/', $fechaInicio);
        $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
        $fechaFin = $valores['fechaFin'];
        $fechaFin = explode('/', $fechaFin);
        $fechaFin = $fechaFin[2] . '-' . $fechaFin[1] . '-' . $fechaFin[0];
        $html = $this->getPartial('reporte/correo', array("muestra" => 0));
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('IQRH');
        $pdf->SetTitle('Recibo Empleado');
        $pdf->SetSubject('Recibo');
        $pdf->SetKeywords('Recibo, Empleado,Pago'); // set default header data
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
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        $pdf->Output('Visita.pdf', 'I');
    }

    public function executeAsistencia(sfWebRequest $request) {
        $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia'));
        $this->valores = $valores;
        $fechaInicio = $valores['fechaInicio'];
        $fechaInicio = explode('/', $fechaInicio);
        $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
        $fechaFin = $valores['fechaFin'];
        $fechaFin = explode('/', $fechaFin);
        $fechaFin = $fechaFin[2] . '-' . $fechaFin[1] . '-' . $fechaFin[0];

        $datetime1 = new DateTime($fechaInicio);
        $datetime2 = new DateTime($fechaFin);
        $interval = $datetime1->diff($datetime2);
        $dias = str_replace("+", "", $interval->format('%R%a'));
        $SEMANA = NULL;
        for ($i = 0; $i <= $dias; $i++) {
            $fecha = $fechaInicio;
            $nuevafecha = strtotime('+' . $i . ' day', strtotime($fecha));
            $fecha = date('Y-m-d', $nuevafecha);
            $diaSema = date('W', $nuevafecha);
            $SEMANA[$diaSema][] = $fecha;
        }



        $pdf = new sfTCPDF("P", "mm", "Letter");
        $id = $request->getParameter("id");
        $codigo = $request->getParameter("cod");
        $mes[1] = 'Enero';
        $mes[2] = 'Febrero';
        $mes[3] = 'Marzo';
        $mes[4] = 'Abril';
        $mes[5] = 'Mayo';
        $mes[6] = 'Junio';
        $mes[7] = 'Julio';
        $mes[8] = 'Agosto';
        $mes[7] = 'Julio';
        $mes[8] = 'Agosto';
        $mes[9] = 'Septiembre';
        $mes[10] = 'Octubre';
        $mes[11] = 'Noviembre';
        $mes[12] = 'Diciembre';
        $mesDescripcion = $mes[10];
        $horaMensual = 160;
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
                ->orderByPrimerApellido("Asc")
                   ->filterByEmpresa($valores['empresa'])
                ->find();
      $datagra=  EmpresaHorarioQuery::data($valores['empresa']);
//      echo "<pre>";
//      print_r($datagra);
//      die();
      
        $empresaQ= EmpresaHorarioQuery::create()->findOneByEmpresa($valores['empresa']);
        
        $html = $this->getPartial('reporte/asistencia', array("empresaQ"=>$empresaQ, "muestra" => 0, 'Listado' => $Listado,
            'inicio' => $fechaInicio, 'fin' => $fechaFin, 'horamensual' => $horaMensual,
            'datagra'=>$datagra,
            'mes' => $mesDescripcion
        ));

//        echo $html;
//        die();
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
        $pdf->AddPage();

        ///EMPLEADO
        //    $id=411;
        foreach ($Listado as $empleado) {
            //    $empleado = UsuarioQuery::create()->findOneById($id);
            $horario = EmpresaHorarioQuery::create()->findOneByEmpresa($empleado->getEmpresa());
            $codigo = $empleado->getCodigo();
            $asistencia = new AsistenciaUsuarioQuery();
            $asistencia->filterByUsuario($codigo);
            $asistencia->where("AsistenciaUsuario.FechaHora >= '" . $fechaInicio . " 00:00:00" . "'");
            $asistencia->where("AsistenciaUsuario.FechaHora <= '" . $fechaFin . " 23:59:00" . "'");
            $asistencia->withColumn('min(AsistenciaUsuario.Hora)', 'Entrada');
            $asistencia->withColumn('max(AsistenciaUsuario.Hora)', 'Salida');
            $asistencia->groupByDia();
            $asistencia->orderByDia();
            $listado = $asistencia->find();
            foreach ($listado as $asite) {
                $inicio = $asite->getEntrada();
                $salida = $asite->getSalida();
                $retorna = AsistenciaUsuarioQuery::diferencia($inicio, $salida);
                $horas = $retorna['minutos'];
                $asite->setHoraDiaria($horas);
                $asite->save();
            }
            $totalMnutos = 0;
            foreach ($SEMANA as $key => $lista) {
                $conta = 0;
                $total = 0;
                foreach ($lista as $dias) {
                    $conta++;
                    if ($conta == 1) {
                        $sumaM = AsistenciaUsuarioQuery::create()
                                ->withColumn('sum(AsistenciaUsuario.HoraDiaria)', 'Total')
                                ->filterByDia($lista, Criteria::IN)
                                ->filterByUsuario($asite->getUsuario())
                                ->findOne();
                        if ($sumaM) {
                            $total = $sumaM->getTotal();
                        }
                        $totalMnutos = $totalMnutos + $total;
                    }
                    $formato = $this->formato($total);
                    $RESUMEN[$key] = $formato;
                    //           $RESUMEN[$key] = $total;
                }
            }
            $horaReal = $this->formato($totalMnutos);
            $Porecentaje = (100 * $totalMnutos) / (160 * 60);
            $Porecentaje = round($Porecentaje, 2);
            $html = $this->getPartial('reporte/empleado', array(
                'inicio' => $fechaInicio, 'fin' => $fechaFin, 'mes' => $mesDescripcion,
                'asistencia' => $listado, 'SEMANA' => $SEMANA, 'RESUMEN' => $RESUMEN,
                'HORA_REAL' => $horaReal, 'PORCENTAJE' => $Porecentaje,
                'empleado' => $empleado, 'horario' => $horario, 'cabecera' => 0
            ));
            $pdf->writeHTML($html);
        }



        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        $pdf->Output('Asistencia.pdf', 'I');
    }

    public function executeEmpleado(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia'));
        $this->valores = $valores;
        $fechaInicio = $valores['fechaInicio'];
        $fechaInicio = explode('/', $fechaInicio);
        $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
        $fechaFin = $valores['fechaFin'];
        $fechaFin = explode('/', $fechaFin);
        $fechaFin = $fechaFin[2] . '-' . $fechaFin[1] . '-' . $fechaFin[0];
        $datetime1 = new DateTime($fechaInicio);
        $datetime2 = new DateTime($fechaFin);
        $interval = $datetime1->diff($datetime2);
        $dias = str_replace("+", "", $interval->format('%R%a'));
        $SEMANA = NULL;
        for ($i = 0; $i <= $dias; $i++) {
            $fecha = $fechaInicio;
            $nuevafecha = strtotime('+' . $i . ' day', strtotime($fecha));
            $fecha = date('Y-m-d', $nuevafecha);
            $diaSema = date('W', $nuevafecha);
            $SEMANA[$diaSema][] = $fecha;
        }
        $id = $request->getParameter("id");
        $codigo = $request->getParameter("cod");
        $mes[1] = 'Enero';
        $mes[2] = 'Febrero';
        $mes[3] = 'Marzo';
        $mes[4] = 'Abril';
        $mes[5] = 'Mayo';
        $mes[6] = 'Junio';
        $mes[7] = 'Julio';
        $mes[8] = 'Agosto';
        $mes[7] = 'Julio';
        $mes[8] = 'Agosto';
        $mes[9] = 'Septiembre';
        $mes[10] = 'Octubre';
        $mes[11] = 'Noviembre';
        $mes[12] = 'Diciembre';
        $mesDescripcion = $mes[10];
        $horaMensual = 160;
///EMPLEADO
        $empleado = UsuarioQuery::create()->findOneById($id);
        $horario = EmpresaHorarioQuery::create()->findOneByEmpresa($empleado->getEmpresa());
        $codigo = $empleado->getCodigo();
        $asistencia = new AsistenciaUsuarioQuery();
        $asistencia->filterByUsuario($codigo);
        $asistencia->where("AsistenciaUsuario.FechaHora >= '" . $fechaInicio . " 00:00:00" . "'");
        $asistencia->where("AsistenciaUsuario.FechaHora <= '" . $fechaFin . " 23:59:00" . "'");
        $asistencia->withColumn('min(AsistenciaUsuario.Hora)', 'Entrada');
        $asistencia->withColumn('max(AsistenciaUsuario.Hora)', 'Salida');
        $asistencia->groupByDia();
        $asistencia->orderByDia();
        $listado = $asistencia->find();
        foreach ($listado as $asite) {
            $inicio = $asite->getEntrada();
            $salida = $asite->getSalida();
            $retorna = AsistenciaUsuarioQuery::diferencia($inicio, $salida);
            $horas = $retorna['minutos'];
            $asite->setHoraDiaria($horas);
            $asite->save();
        }
        $totalMnutos = 0;
        foreach ($SEMANA as $key => $lista) {
            $conta = 0;
            $total = 0;
            foreach ($lista as $dias) {
                $conta++;
                if ($conta == 1) {
                    $sumaM = AsistenciaUsuarioQuery::create()
                            ->withColumn('sum(AsistenciaUsuario.HoraDiaria)', 'Total')
                            ->filterByDia($lista, Criteria::IN)
                            ->filterByUsuario($asite->getUsuario())
                            ->findOne();
                    if ($sumaM) {
                        $total = $sumaM->getTotal();
                    }
                    $totalMnutos = $totalMnutos + $total;
                }
                $formato = $this->formato($total);
                $RESUMEN[$key] = $formato;
                //           $RESUMEN[$key] = $total;
            }
        }
        $horaReal = $this->formato($totalMnutos);
        $Porecentaje = (100 * $totalMnutos) / (160 * 60);
        $Porecentaje = round($Porecentaje, 2);
        $html = $this->getPartial('reporte/empleado', array(
            'inicio' => $fechaInicio, 'fin' => $fechaFin, 'mes' => $mesDescripcion,
            'asistencia' => $listado, 'SEMANA' => $SEMANA, 'RESUMEN' => $RESUMEN,
            'HORA_REAL' => $horaReal, 'PORCENTAJE' => $Porecentaje,
            'empleado' => $empleado, 'horario' => $horario, 'cabecera' => 1
        ));
        /////////// EMPLEADO

        $pdf = new sfTCPDF("P", "mm", "Letter");
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('IQRH');
        $pdf->SetTitle('Asistencia Empleado');
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
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        $pdf->Output('AsistenciaEmpleado.pdf', 'I');
    }

    public function formato($minutos) {
        $horaDifecnia = $minutos / 60;
        $horario = explode(".", $horaDifecnia);
        $horaTarde = $horario[0];
        $minutoTarde = 0;
        if (count($horario) > 1) {
            $minuto = '0.' . $horario[1];
            if ($minuto) {
                $minutoTarde = $minuto * 60;
            }
        }
        $minutoTarde = round($minutoTarde, 0);
        $horaReal = $horaTarde . ":" . $minutoTarde;
        return $horaReal;
    }

}
