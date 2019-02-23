<?php

/**
 * proceso actions.
 *
 * @package    plan
 * @subpackage proceso
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class procesoActions extends sfActions {

  

    public function executeCorreo(sfWebRequest $request) {
       date_default_timezone_set("America/Guatemala"); 
        $minuto = date('i');
        AsistenciaUsuarioQuery::procesa();
       if ($minuto <= 10) {
           $Gminuto =0;
       }
       if (($minuto >=10) && ($minuto <20)) {
           $Gminuto =10;
       }
       if (($minuto >=20) && ($minuto <30)) {
           $Gminuto =20;
       }
       if (($minuto >=30) && ($minuto <40)) {
           $Gminuto =30;
       }
       if (($minuto >=40) && ($minuto <50)) {
           $Gminuto =40;
       }
       if (($minuto >=50) && ($minuto <60)) {
           $Gminuto =50;
       }
       if (($minuto >50)) {
           $Gminuto =60;
       }

       $empresaHorario = EmpresaHorarioQuery::create()
               ->find();
       foreach ($empresaHorario as $reg) {
           $horas= explode(":", $reg->getHora());
           $hora = $horas[0];
           $empresaQ= $reg->getEmpresa();
           $horaInicio =date('Y-m-d 0'.$hora.":i:s");
           $horaActual =date('Y-m-d H:i:s');
           if ($horaInicio < $horaActual) {
           $marcas = AsistenciaUsuarioQuery::create()
                   ->filterByEmpresa($empresaQ)
                   ->filterByDia(date('Y-m-d'))
                   ->count();
           if ($marcas ==0) {
               $bitacora= BitacoraAlertaQuery::create()
                       ->filterByEmpresa($empresaQ)
                       ->filterByMinuto($Gminuto)
                       ->filterByHora(date('H'))
                       ->filterByFecha(date('Y-m-d'))
                       ->count();
               if ($bitacora==0) {
                   echo "<br> ENVIA CORREO <BR>";
                   $bitacora = new BitacoraAlerta();
                   $bitacora->setEmpresa($empresaQ);
                   $bitacora->setMinuto($Gminuto);
                   $bitacora->setHora(date('H'));
                   $bitacora->setFecha(date('Y-m-d'));
                   $bitacora->save();
                   
                        $url = "http://iqrh:8080/envio.php";
        $urlH = "http://" . $_SERVER['SERVER_NAME'];
        $PortA = $_SERVER['SERVER_PORT'];
        $port = '';
        if ($PortA == '8080') {
            $port = ':8080';
        }
        $url = $urlH . $port . "/envio.php";
        echo $url;
        echo "<br>";
        $correo = 'iqrhdemo@gmail.com';
        $clave = 'iqrh2019';
        // $correcoC = "yluna@visioneninformatica.com";
        $correcoC ='lavila@ratingspcr.com';
        $postData['correo'] = $correo;
        $postData['clave'] = $clave;
        $postData['servidor'] = 'smtp.gmail.com';
        $postData['puerto'] = '465';
        $postData['correo_cliente'] = $correcoC ;
        $postData['asunto'] = 'Alerta Biometrico '.$empresaQ;
        $postData['mensaje'] = "El Biometrico de la empresa ".$empresaQ." no tienes marcas registradas para este dia ".date('d/m/Y');
        $postData['empresa'] = 'IQRH';
        echo "<pre>";
        print_r($postData);
        echo "</pre>";
        
        $handler = curl_init();
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($handler, CURLOPT_URL, $url);
        curl_setopt($handler, CURLOPT_POST, true);
        curl_setopt($handler, CURLOPT_POSTFIELDS, $postData);
        $resultado = curl_exec($handler);
        curl_close($handler);
        
        echo $resultado;
        
                   
                   
               }
           }
               
               echo $empresaQ." ".$horaInicio;
           echo "<br>";
               
           }
       }
        die();

        $parametro = ParametroQuery::create()->findOne();
        $correoNotifica = $parametro->getCorreoNotifica();
        $clave= $parametro->getClaveCorreo();
        $usu = $parametro->getUsuarioCorreo();
        $puerto = $parametro->getPuertoCorreo();
        if ((trim($clave)  == "") || (trim($puerto)  == "") || (trim($usu)  == "") ) {  
            die('configura correo');
        }
        $soliC = SolicitudFinquitoQuery::create()
                ->filterByEnviadoCorreo(false)
                ->find();
        foreach ($soliC as $lista) {
            $usuarioGra = UsuarioQuery::create()->findOneById($lista->getUsuarioRetiro());
            $usuarioRet = UsuarioQuery::create()->findOneById($lista->getJefe());
            $empleado = $usuarioGra->getNombreCompleto();
            $fecha = $lista->getCreatedAt('d/m/Y');
            $jefe = '';
            $correo = '';
            if ($usuarioRet) {
                $jefe = $usuarioRet->getNombreCompleto();
                $correo = $usuarioRet->getCorreo();
            }
            echo $correo;
            echo "<br>";
            $observacion = html_entity_decode($lista->getObservaciones());
            $tipo = " Finiquito de Empleado ";
            $html = $this->getPartial('proceso/nota', array(
                'empleado' => $empleado,
                'fecha' => $fecha,
                'tipo' => $tipo,
                'jefe' => $jefe,
                'observacion' => $observacion
            ));
            //   $correo = 'abrantar@gmail.com';
            $resultado = ParametroQuery::Correo($correo, $parametro, $html);
            echo "<pre>";
            print_r($resultado);
            echo "</pre>";

            $resultado = ParametroQuery::Correo($correoNotifica, $parametro, $html);
            $lista->setEnviadoCorreo(true);
            $lista->save();
        }



        $soliC = SolicitudAusenciaQuery::create()
                ->filterByEnviadoCorreo(false)
                ->find();
        foreach ($soliC as $lista) {
            $usuarioGra = UsuarioQuery::create()->findOneById($lista->getUsuarioId());
            $usuarioRet = UsuarioQuery::create()->findOneById($lista->getJefe());
            $empleado = $usuarioGra->getNombreCompleto();
            $fecha = $lista->getCreatedAt('d/m/Y');
            $jefe = '';
            $correo = '';
            if ($usuarioRet) {
                $jefe = $usuarioRet->getNombreCompleto();
                $correo = $usuarioRet->getCorreo();
            }
            echo $correo;
            echo "<br>";
            $observacion = html_entity_decode($lista->getMotivo());
            $tipo = " Ausencia ";
            $html = $this->getPartial('proceso/nota', array(
                'empleado' => $empleado,
                'fecha' => $fecha,
                'tipo' => $tipo,
                'jefe' => $jefe,
                'observacion' => $observacion
            ));
            //   $correo = 'abrantar@gmail.com';
            $resultado = ParametroQuery::Correo($correo, $parametro, $html);
            echo "<pre>";
            print_r($resultado);
            echo "</pre>";
            $resultado = ParametroQuery::Correo($correoNotifica, $parametro, $html);
            $lista->setEnviadoCorreo(true);
            $lista->save();
        }



        $soliC = SolicitudVacacionQuery::create()
                ->filterByEnviadoCorreo(false)
                ->find();
   
        foreach ($soliC as $lista) {
            $usuarioGra = UsuarioQuery::create()->findOneById($lista->getUsuarioId());
            $usuarioRet = UsuarioQuery::create()->findOneById($lista->getJefe());
            $empleado = $usuarioGra->getNombreCompleto();
            $fecha = $lista->getCreatedAt('d/m/Y');
            $jefe = '';
            $correo = '';
            if ($usuarioRet) {
                $jefe = $usuarioRet->getNombreCompleto();
                $correo = $usuarioRet->getCorreo();
            }
            echo $correo;
            echo "<br>";
            $observacion = html_entity_decode($lista->getObservaciones())."<br> El cual inicia del dia <strong> " .$lista->getFechaInicio('d/m/Y')." </strong> al  <strong>".$lista->getFechaFin( 'd/m/Y')."</strong>";
            $tipo = " Vacaciones ";
            $observacion = "Dias Solicitados del " . $lista->getFechaInicio('d/m/Y') . "  Al " . $lista->getFechaFin('d/m/Y'). "   Dias a cuenta de vacaciones ".$lista->getDia();
            $html = $this->getPartial('proceso/nota', array(
                'empleado' => $empleado,
                'fecha' => $fecha,
                'tipo' => $tipo,
                'jefe' => $jefe,
                'observacion' => $observacion
            ));
            // $correo = 'abrantar@gmail.com';
            $resultado = ParametroQuery::Correo($correo, $parametro, $html);
            echo "<pre>";
            print_r($resultado);
            echo "</pre>";
            $resultado = ParametroQuery::Correo($correoNotifica, $parametro, $html);
            $lista->setEnviadoCorreo(true);
            $lista->save();
        }
        $soliC = SolicitudUsuarioQuery::create()
                ->filterByEnviadoCorreo(false)
                ->find();
        foreach ($soliC as $lista) {
            $usuarioGra = UsuarioQuery::create()->findOneById($lista->getUsuarioId());
            $usuarioRet = UsuarioQuery::create()->findOneById($lista->getJefe());
            $empleado = $usuarioGra->getNombreCompleto();
            $fecha = $lista->getCreatedAt('d/m/Y');
            $jefe = '';
            $correo = '';
            if ($usuarioRet) {
                $jefe = $usuarioRet->getNombreCompleto();
                $correo = $usuarioRet->getCorreo();
            }
            echo $correo;
            echo "<br>";
            $observacion = html_entity_decode($lista->getObservaciones());
            $tipo = $lista->getCatalogoSolicitud();
            $html = $this->getPartial('proceso/nota', array(
                'empleado' => $empleado,
                'fecha' => $fecha,
                'tipo' => $tipo,
                'jefe' => $jefe,
                'observacion' => $observacion
            ));
            // echo $html;
            //   $correo = 'abrantar@gmail.com';
            $resultado = ParametroQuery::Correo($correo, $parametro, $html);
            echo "<pre>";
            print_r($resultado);
            echo "</pre>";

            $resultado = ParametroQuery::Correo($correoNotifica, $parametro, $html);
            $lista->setEnviadoCorreo(true);
            $lista->save();
        }
        $url = "http://iqrh:8080/envio.php";
        $urlH = "http://" . $_SERVER['SERVER_NAME'];
        $PortA = $_SERVER['SERVER_PORT'];
        $port = '';
        if ($PortA == '8080') {
            $port = ':8080';
        }
        $url = $urlH . $port . "/envio.php";
        echo $url;
        echo "<br>";
        $parametro = ParametroQuery::create()->findOne();
        $registros = ReciboEncabezadoQuery::create()
                ->filterByEnviadoCorreo(false)
                ->setlimit(20)
                ->find();
        foreach ($registros as $planilla) {
            $id = $planilla->getCabeceraIn();
//            echo $id;
//            echo "<br>";
            $codigo = $planilla->getCodigo();
            echo $codigo;
            echo "<br>";

            $cabecera = ReciboCabeceraQuery::create()
                    ->filterByCabeceraIn($id)
                    ->findOne();
            $encabezado = ReciboEncabezadoQuery::create()
                    ->filterByCabeceraIn($id)
                    ->filterByCodigo($codigo)
                    ->findOne();
            $detalle = ReciboDetalleQuery::create()
                    ->filterByPlanillaResumenId($encabezado->getPlanillaResumenId())
                    ->find();
            if (count($detalle) > 0 && count($cabecera) > 0) {
                $codigoEmpleado = $encabezado->getCodigo();
                $usuarioQ = UsuarioQuery::create()->findOneByCodigo($codigoEmpleado);
                if ($usuarioQ) {
                    $correcoC = $usuarioQ->getCorreo();

                    $html = $this->getPartial('reporte/recibo', array("muestra" => 0,
                        'cabecera' => $cabecera,
                        'encabezado' => $encabezado,
                        'detalle' => $detalle
                    ));
                    echo $correcoC;
                    echo "<br>";
                    $texto = 'Estimad@ ' . $planilla->getEmpleado() . "  adjunto encontrara su recibo de pago.";
                    $pdf = new sfTCPDF("P", "mm", "Letter");
                    $this->id = $request->getParameter("id");
                    $pdf->SetCreator(PDF_CREATOR);
                    $pdf->SetAuthor('Sistema');
                    $pdf->SetTitle("IQRH");
                    $pdf->SetSubject('Recibo');
                    $pdf->SetKeywords('Recibo, Pago Planilla'); // set default header data
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
                    $pdf->writeHTML($html);
                    $ruta = sfConfig::get("sf_upload_dir") . DIRECTORY_SEPARATOR . 'Recibo' . '.pdf';
                    $pdf->Output($ruta, 'F');
                    $asunto = "Recibo Planilla " . $cabecera->getInicio() . " " . $cabecera->getFin();
                    $correo = $parametro->getUsuarioCorreo();
                    $clave = $parametro->getClaveCorreo();
                    // $correcoC = "yluna@visioneninformatica.com";
                    //$correcoC ='abrantar@gmail.com';
                    $postData['correo'] = $correo;
                    $postData['clave'] = $clave;
                    $postData['servidor'] = $parametro->getSmtpCorreo();
                    $postData['puerto'] = $parametro->getPuertoCorreo();
                    $postData['correo_cliente'] = $correcoC;
                    $postData['asunto'] = $asunto;
                    $postData['mensaje'] = $texto;
                    $postData['empresa'] = 'IQRH';
                    $postData['archivo'] = 'Recibo' . '.pdf';
                    $handler = curl_init();
                    curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($handler, CURLOPT_URL, $url);
                    curl_setopt($handler, CURLOPT_POST, true);
                    curl_setopt($handler, CURLOPT_POSTFIELDS, $postData);
                    $resultado = curl_exec($handler);
                    curl_close($handler);

                    echo "<pre>";
                    print_r($resultado);
                    echo "</pre>";
                }
            }
            $planilla->setEnviadoCorreo(true);
            $planilla->save();
        }
        echo "<pre>";
        print_r($registros);
        echo "</pre>";
        die();
    }

//C:\xampp\htdocs\IQRH\apps\iqrh\modules\proceso\actions\actions.class.php
    public function executeIndex2(sfWebRequest $request) {
        $codigo = 'COTY60';
        $listado = UsuarioVacacionQuery::periodos($codigo);
        echo "<pre>";
        print_r($listado);
        echo "</pre>";
        die();
    }

    public function executeEnvio(sfWebRequest $request) {
        $url = 'http://iqrh:8080/iqrh_dev.php/rest_asiste/asiste';
        $usuarioQ = UsuarioQuery::create()
                ->setlimit(10)
                ->where("Usuario.Codigo not like '%INPRO%'")
                ->find();
        $cantida = 0;
        foreach ($usuarioQ as $usuario) {
            $cantida++;
            $dia = date('Y-m-13');
            $hora = '11:00'; // date('H:i');
            $postData['token'] = 'bbba722f948709955de06b9e2a7e703e3bc15996';
            $postData['usuario'] = $usuario->getCodigo();
            $postData['fecha'] = $dia . " " . $hora;
            $postData['hora'] = $hora;
            $postData['dia'] = $dia;
            $handler = curl_init();
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($handler, CURLOPT_URL, $url);
            curl_setopt($handler, CURLOPT_POST, true);
            curl_setopt($handler, CURLOPT_POSTFIELDS, $postData);
            $resultado = curl_exec($handler);
            curl_close($handler);
            $resultado = json_decode($resultado);
        }
        echo "cantidad " . $cantida;
        die();
    }

    public function executeVacacion(sfWebRequest $request) {
        $valor = $request->getParameter('id');
        $usuarioQ = UsuarioQuery::create()->findOneById($valor);
        echo $usuarioQ->getNombreCompleto();
        echo "<br>";
        echo $usuarioQ->getFechaAlta();
        echo "<br>";
        $vacaciones = UsuarioVacacionQuery::periodos($usuarioQ->getCodigo());
        echo "<pre>";
        print_R($vacaciones);
        die();
    }

}
