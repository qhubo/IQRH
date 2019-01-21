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

    public function executeClaves(sfWebRequest $request) {
        $ussuario = UsuarioQuery::create()
                ->filterByUsuario('Demo', Criteria::NOT_IN)
                ->find();
        $cant = 0;
        foreach ($ussuario as $lista) {
            $codigo = $lista->getCodigo();
            $usuarioQ = UsuarioQuery::create()->findOneById($lista->getId());
            $usuarioQ->setUsuario($codigo);
            $usuarioQ->setClave(sha1($codigo));
//            $usuarioQ->save();
            $cant++;
        }
        echo 'actualizados ' . $cant;
        die();
    }

    public function executeCorreo(sfWebRequest $request) {
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
                ->setlimit(1)
                ->find();

        foreach ($registros as $planilla) {
            $id = $planilla->getCabeceraIn();
            $codigo = $planilla->getCodigo();


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

                $html = $this->getPartial('reporte/recibo', array("muestra" => 0,
                    'cabecera' => $cabecera,
                    'encabezado' => $encabezado,
                    'detalle' => $detalle
                ));
//                echo $html;
//                die();
                $texto = 'Estimad@ ' . $planilla->getEmpleado() . "  adjunto encontrara su recibo de pago.";
$html ='test';

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
                $ruta = sfConfig::get("sf_upload_dir") . DIRECTORY_SEPARATOR . 'Recibo'.'.pdf';
                $pdf->Output($ruta, 'F');
                $asunto = "Recibo Planilla " . $cabecera->getInicio() . " " . $cabecera->getFin();
                $correo = $parametro->getUsuarioCorreo();
                $clave = $parametro->getClaveCorreo();
                $correcoC = "yluna@visioneninformatica.com";
                $correcoC ='abrantar@gmail.com';
                $postData['correo'] = $correo;
                $postData['clave'] = $clave;
                $postData['servidor'] = $parametro->getSmtpCorreo();
                $postData['puerto'] = $parametro->getPuertoCorreo();
                $postData['correo_cliente'] = $correcoC;
                $postData['asunto'] = $asunto;
                $postData['mensaje'] = $texto;
                $postData['empresa'] = 'IQRH';
                $postData['archivo'] = 'Recibo'.'.pdf';
                echo "<pre>";
                print_r($postData);
                echo "</pre>";

                $handler = curl_init();
                curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($handler, CURLOPT_URL, $url);
                curl_setopt($handler, CURLOPT_POST, true);
                curl_setopt($handler, CURLOPT_POSTFIELDS, $postData);
                $resultado = curl_exec($handler);
                echo $resultado;

                curl_close($handler);
              //  $planilla->setEnviadoCorreo(true);
                $planilla->save();
                   echo "<pre>";
            print_r($resultado);
            }
         
        }

        die();
    }
//C:\xampp\htdocs\IQRH\apps\iqrh\modules\proceso\actions\actions.class.php
    public function executeIndex(sfWebRequest $request) {
   
        $codigo ='20';
        $listado = UsuarioVacacionQuery::periodos($codigo);
        
        
        echo "<pre>";
        print_r($listado);
        echo "</pre>";
        die();



  
        //echo $dias=  $interval->format('%a');


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
          
    $vacaciones =UsuarioVacacionQuery::periodos($usuarioQ->getCodigo());
    echo "<pre>";
print_R($vacaciones);
die();
    
      }
}
