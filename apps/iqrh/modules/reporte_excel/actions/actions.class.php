<?php

/**
 * reporte_excel actions.
 *
 * @package    plan
 * @subpackage reporte_excel
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reporte_excelActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
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
//        $html = $this->getPartial('reporte/empleado', array(
//            'inicio' => $fechaInicio, 'fin' => $fechaFin, 'mes' => $mesDescripcion,
//            'asistencia' => $listado, 'SEMANA' => $SEMANA, 'RESUMEN' => $RESUMEN,
//            'HORA_REAL' => $horaReal, 'PORCENTAJE' => $Porecentaje,
//            'empleado' => $empleado, 'horario' => $horario, 'cabecera' => 1
//        ));
        /////////// EMPLEADO
        $nombreempresa = $empleado->getNombreCompleto();
        $pestanas[] = 'Asistencia_Empleado';
        $nombreEMpresa = str_replace(" ", "_", $nombreempresa);
        $Parametro = ParametroQuery::create()->findOne();
        $filename = "Asistencia_" . $nombreEMpresa . date("d_m_Y");
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
        $hoja->getCell("B1")->setValueExplicit("Asistencia", PHPExcel_Cell_DataType::TYPE_STRING);
        $hoja->getStyle("B1")->getFont()->setBold(true);
        $hoja->getStyle("B1")->getFont()->setSize(13);
        // $hoja->getStyle("B1")->applyFromArray($styleArray);
        $hoja->getCell("C1")->setValueExplicit($nombreempresa, PHPExcel_Cell_DataType::TYPE_STRING);
        $hoja->getStyle("C1")->getFont()->setBold(true);
        $hoja->getStyle("C1")->getFont()->setSize(10);
        $hoja->mergeCells("C1:E1");
        $hoja->getCell("B2")->setValueExplicit("Fecha  ", PHPExcel_Cell_DataType::TYPE_STRING);
        $hoja->getStyle("B2")->getFont()->setBold(true);
        $hoja->getStyle("B2")->getFont()->setSize(10);
        $hoja->getCell("C2")->setValueExplicit($textoBusqueda, PHPExcel_Cell_DataType::TYPE_STRING);
        $hoja->getStyle('C2')->getAlignment()->setWrapText(true);
        $hoja->mergeCells("C2:E2");
        $fila = 3;
        $columna = 0;
        $encabezados = null;
        $encabezados = null;
        $encabezados[] = array("Nombre" => strtoupper("NOMBRE COMPLETO"), "width" => 52, "align" => "center", "format" => "@");
        $encabezados[] = array("Nombre" => strtoupper("PUESTO"), "width" => 45, "align" => "left", "format" => "#,##0.00");
        $encabezados[] = array("Nombre" => strtoupper("FECHA"), "width" => 15, "align" => "left", "format" => "#,##0");
        $encabezados[] = array("Nombre" => strtoupper("HORA ENTRADA"), "width" => 15, "align" => "left", "format" => "#,##0.00");
        $encabezados[] = array("Nombre" => strtoupper("HORA SALIDA"), "width" => 15, "align" => "center", "format" => "@");
        $encabezados[] = array("Nombre" => strtoupper("HORAS DIARIAS"), "width" => 15, "align" => "left", "format" => "#,##0.00");
        $encabezados[] = array("Nombre" => strtoupper("HORAS POR SEMANA"), "width" => 25, "align" => "left", "format" => "#,##0.00");
        sfContext::getInstance()->getUser()->HojaImprimeEncabezadoHorizontal($encabezados, $columna, $fila, $hoja);


        $bandera = 0;
        $cant = 0;

        foreach ($listado as $asite) {
//            echo "<pre>";
//            print_r($asite);
//            die();
            $fila++;
            $datos = null;
            $cant++;
            $semana = $asite->getDia('W');
            $pinta = '';
            $total = '';
            if ($semana <> $bandera) {
                $bandera = $semana;
                $total = $RESUMEN[$semana];
            }
            $Hinicio = $asite->getEntrada();
            $salida = $asite->getSalida();
            $retorna = AsistenciaUsuarioQuery::diferencia($Hinicio, $salida);

               $datos[] = array("tipo" => 3,  "valor" =>$empleado->getPrimerNombre()." ".$empleado->getPrimerApellido());
              $datos[] = array("tipo" => 3,  "valor" =>$empleado->getPuesto());
              $datos[] = array("tipo" => 3,  "valor" =>$asite->getDia('d/m/Y'));
              $datos[] = array("tipo" => 3,  "valor" =>$asite->getEntrada());
              $datos[] = array("tipo" => 3,  "valor" => $asite->getSalida());
              $datos[] = array("tipo" => 3,  "valor" =>$retorna['muestra']);
              $datos[] = array("tipo" => 3,  "valor" => $total);
                       $columnafinal = sfContext::getInstance()->getUser()->HojaImprimeListaHorizontal($datos, $columna, $fila, $hoja);
   
        }


        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
        header('Cache-Control: max-age=0');
        $xl = PHPExcel_IOFactory::createWriter($xl, 'Excel5');
        $xl->save('php://output');
        throw new sfStopException();
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
