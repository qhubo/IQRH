<?php
 $ruta="C:/xampp/htdocs/iqrh/web/uploads/";
 $ruta ='/home/iqrhviasagt/public_html/uploads/';
require_once('tcpdf/tcpdf.php');

include_once('NumberToLetterConverter.class.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('VIA');
$pdf->SetTitle('Factura Electronica');
$pdf->SetSubject('Factura');
$pdf->SetKeywords('Factura, Detalle, Cobro');
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetMargins(1, 2, 0, true);
$pdf->SetFont('dejavusans', '', 8, '');
$pdf->AddPage();
//$archivo='00100001010000000346_02_Firmado.xml';
  $archivo= $_POST["archivo"];  //'00100001010000000018_01_SF.xml';

$NombrePdf = str_replace(".xml", "", $archivo);
   
$xml = simplexml_load_file("uploads/xml_cr/".$archivo);

$json = json_encode($xml);

$xmlArr = json_decode($json, true);
//echo "<pre>";
//print_r($xmlArr);
//die();
$clave = $xmlArr['Clave']; // => 50610101800310142379000100001010000000013101001807
$NumeroConsecutivo = $xmlArr['NumeroConsecutivo']; // => 00100001010000000013
$FechaEmision = $xmlArr['FechaEmision']; // => 2018-10-10T15:08:55
$fechaTime = explode("T", $FechaEmision);
$fecha = $fechaTime[0];
$PlazoCredito = $xmlArr['PlazoCredito']; // => 30
$nuevafecha = strtotime('+' . $PlazoCredito . ' day', strtotime($fecha));
//$nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date('d/m/Y', $nuevafecha);
$FechaArray = explode("-", $fecha);
$ANO = $FechaArray[0];
$MES = $FechaArray[1];
$DIA = $FechaArray[2];
$fechaD = $DIA . "/" . $MES . "/" . $ANO;
$DIA = (int) $DIA;
$MESDESCRIPCION[1] = 'Enero';
$MESDESCRIPCION[2] = 'Febrero';
$MESDESCRIPCION[3] = 'Marzo';
$MESDESCRIPCION[4] = 'Abril';
$MESDESCRIPCION[5] = 'Mayo';
$MESDESCRIPCION[6] = 'Junio';
$MESDESCRIPCION[7] = 'Julio';
$MESDESCRIPCION[8] = 'Agosto';
$MESDESCRIPCION[9] = 'Septiembre';
$MESDESCRIPCION[10] = 'Octubre';
$MESDESCRIPCION[11] = 'Noviembre';
$MESDESCRIPCION[12] = 'Diciembre';
$EMISOR = $xmlArr['Emisor'];
$EMISOR_NOMBRE = $EMISOR['Nombre'];
$EMISOR_IDENTIFICACION_TIPO = $EMISOR['Identificacion']['Tipo'];
$EMISOR_IDENTIFICACION_NUMERO = $EMISOR['Identificacion']['Numero'];
$EMISOR_UBICACION_PROVINCIA = $EMISOR['Ubicacion']['Provincia'];
$EMISOR_UBICACION_CANTON = $EMISOR['Ubicacion']['Canton'];
$EMISOR_UBICACION_DISTRITO = $EMISOR['Ubicacion']['Distrito'];
$EMISOR_UBICACION_BARRIO = $EMISOR['Ubicacion']['Barrio'];
$EMISOR_UBICACION_OTRASSENAS = $EMISOR['Ubicacion']['OtrasSenas'];

$DIRECCION = $EMISOR_UBICACION_OTRASSENAS . " Barrio " . $EMISOR_UBICACION_BARRIO . " Canton " . $EMISOR_UBICACION_CANTON . " Distrito " . $EMISOR_UBICACION_DISTRITO;

$EMISOR_TELEFONO_CODIGO = $EMISOR['Telefono']['CodigoPais'];
$EMISOR_TELEFONO_NUMERO = $EMISOR['Telefono']['NumTelefono'];
$EMISOR_CORREO = $EMISOR['CorreoElectronico'];
$RECEPTOR = $xmlArr['Receptor'];
$RECEPTOR_NOMBRE = $RECEPTOR['Nombre'];
$RECEPTOR_IDENTIFICACION_TIPO = $RECEPTOR['Identificacion']['Tipo'];
$RECEPTOR_IDENTIFICACION_NUMERO = $RECEPTOR['Identificacion']['Numero'];
$RECEPTOR_CORREO = $RECEPTOR['CorreoElectronico'];
$CondicicionVenta = $xmlArr['CondicionVenta']; // => 02
$condi='Contado';
if ($CondicicionVenta=='02') {
    $condi='Cr&eacute;dito';
}

$MedioPago = $xmlArr['MedioPago']; // => 04
$DETALLEServicio = $xmlArr['DetalleServicio'];
$LineaDetalle = $DETALLEServicio['LineaDetalle'];
$nunero=0;
 if (array_key_exists('NumeroLinea', $LineaDetalle)) {
$nunero= $LineaDetalle['NumeroLinea'];
 }
$detalleAc=true;
if ($nunero  >0) {
    $detalleAc =false;
    $linea=$LineaDetalle;
        $numeroLinea = $linea['NumeroLinea']; // => 1
    $CODIGO_TIPO = $linea['Codigo']['Codigo'];
    $CODIGO_CODIGO = $linea['Codigo']['Codigo'];
    $Cantidad = $linea['Cantidad']; // => 2.00
    $UnidadMedida = $linea['UnidadMedida']; // => Unid
    $Detalle = $linea['Detalle']; // =$linea[NOMBRE PRODUCTO''
    $PrecioUnitario = $linea['PrecioUnitario']; // => 80820.000
    $MontoTotal = $linea['MontoTotal']; // => 161640.000
    $MontoDescuento = $linea['MontoDescuento']; // => 0.00000
    $NaturalezaDescuento = $linea['NaturalezaDescuento']; // => Descuento al cliente
    $SubTotal = $linea['SubTotal']; // => 161640.00000
    //  $search_array = array('first' => 1, 'second' => 4);
    $Impuesto_Codigo = 0;
    $Impuesto_Tarifa = 0;
    $Impuesto_Monto = 0;
    $MontoTotalLinea = $SubTotal; // => 161640.00000
    if (array_key_exists('Impuesto', $linea)) {
        $Impuesto = $linea['Impuesto'];
        $Impuesto_Codigo = $Impuesto['Codigo'];
        $Impuesto_Tarifa = $Impuesto['Tarifa'];
        $Impuesto_Monto = $Impuesto['Monto'];
        $MontoTotalLinea = $linea['MontoTotalLinea']; // => 161640.00000
    }
 } 
if ($detalleAc) {
foreach ($LineaDetalle as $linea) {


    $numeroLinea = $linea['NumeroLinea']; // => 1
    $CODIGO_TIPO = $linea['Codigo']['Codigo'];
    $CODIGO_CODIGO = $linea['Codigo']['Codigo'];
    $Cantidad = $linea['Cantidad']; // => 2.00
    $UnidadMedida = $linea['UnidadMedida']; // => Unid
    $Detalle = $linea['Detalle']; // =$linea[NOMBRE PRODUCTO''
    $PrecioUnitario = $linea['PrecioUnitario']; // => 80820.000
    $MontoTotal = $linea['MontoTotal']; // => 161640.000
    $MontoDescuento = $linea['MontoDescuento']; // => 0.00000
    $NaturalezaDescuento = $linea['NaturalezaDescuento']; // => Descuento al cliente
    $SubTotal = $linea['SubTotal']; // => 161640.00000
    //  $search_array = array('first' => 1, 'second' => 4);
    $Impuesto_Codigo = 0;
    $Impuesto_Tarifa = 0;
    $Impuesto_Monto = 0;
    $MontoTotalLinea = $SubTotal; // => 161640.00000
    if (array_key_exists('Impuesto', $linea)) {
        $Impuesto = $linea['Impuesto'];
        $Impuesto_Codigo = $Impuesto['Codigo'];
        $Impuesto_Tarifa = $Impuesto['Tarifa'];
        $Impuesto_Monto = $Impuesto['Monto'];
        $MontoTotalLinea = $linea['MontoTotalLinea']; // => 161640.00000
    }
 }
}
$ResumenFactura = $xmlArr['ResumenFactura']; // => Array
$CodigoMoneda = $ResumenFactura['CodigoMoneda']; // => CRC
    $moneda='$';

if (trim(strtoupper($CodigoMoneda))=='CRC') {
    $moneda='₡';
}
$TipoCambio = $ResumenFactura['TipoCambio']; // => 1.00000
$TotalServGravados = $ResumenFactura['TotalServGravados']; // => 0.00000
$TotalServExentos = $ResumenFactura['TotalServExentos']; // => 0.00000
$TotalMercanciasGravadas = $ResumenFactura['TotalMercanciasGravadas']; // => 16515.00000
$TotalMercanciasExentas = $ResumenFactura['TotalMercanciasExentas']; // => 170985.00000
$TotalGravado = $ResumenFactura['TotalGravado']; // => 16515.00000
$TotalExento = $ResumenFactura['TotalExento']; // => 170985.00000
$TotalVenta = $ResumenFactura['TotalVenta']; // => 187500.00000
$TotalDescuentos = $ResumenFactura['TotalDescuentos']; // => 0.00000
$TotalVentaNeta = $ResumenFactura['TotalVentaNeta']; // => 187500.00000
$TotalImpuesto = $ResumenFactura['TotalImpuesto']; // => 2146.95000
$TotalComprobante = $ResumenFactura['TotalComprobante']; // => 189646.95000

$Nomativa = $xmlArr['Normativa'];
$NumeroResolucion = $Nomativa ['NumeroResolucion']; // => DGT-R-48-2016
$FechaResolucion = $Nomativa['FechaResolucion']; // => 07-10-2016 01:00:00
$linea ='<table style=" width: 714px;"><tr><td style="border-top-color:#BAE39C; border-top-width:4px " width="714px">&nbsp;</td> </tr> </table>';
$html = '';
$VER=2.3;
$html .='<table style="width: 714px;">
<tbody>
<tr>
<td style="width: 580px;">
<font size="+2"><br>FACTURA ELECTR&Oacute;NICA&nbsp; &nbsp;&nbsp;NO.&nbsp;</font> <strong>
<font size="+2">' . $NumeroConsecutivo . '</font>

</strong>
<br /><font size="+2">VER &nbsp; &nbsp;' . $VER . ' </font>
<br /><font size="+2">CLAVE NUM&Eacute;RICA&nbsp; &nbsp;' . $clave . ' </font>

</td>
<td style="width: 134px;"><br>&nbsp;<strong>Fecha de emisi&oacute;n: </strong> '.date('d/m/Y H:i').'</td>
</tr>
</tbody>
</table>';
//echo $html;
//die();
$html .=$linea;
$html .='<table style=" width: 714px;">
<tbody>
<tr>
<td style="width: 164px;"><img src="http://iqrh.viasagt.com/images/logoCr.png" width="140px" ></td>
<td style="width: 300px; text-align: center;">
<p><strong>CONVERNGENCIA DE NEGOCIOS&nbsp;</strong><br /> <strong>TELEVISIVOS E COSTA RICA</strong><br /><strong> S.R.L</strong><br />CONVERNGENCIA DE NEGOCIOS&nbsp;<br /> TELEVISIVOS DE COSTA RICA<br /> S.R.L</p>
<p><strong>Ident. Jurídica: </strong> 3-102-761131</p>
</td>
<td style="width: 300px; text-align: justify;">
<p><strong>Tel&eacute;fono:</strong> +(506) 2248-4543</p>
<p><strong>Correo</strong>: <a href="mailto:contabilidad@diazzeledon.com">contabilidad@diazzeledon.com</a></p>
<p><strong>Direcci&oacute;n:</strong> San Jos&eacute;, El Carmen, Av 01 entres<br> calles 5 y 7 edificio Amalia</p>
</td>
</tr>
</tbody>
</table><br>';
$html .=$linea;


$html .='<table style="height: 87px; width: 714px; ">
<tbody>
<tr>
<td style="width: 400px;">
<p><span style="color: ;"><strong>Receptor</strong>:&nbsp; &nbsp;&nbsp;</span>'. $RECEPTOR_NOMBRE.'&nbsp; &nbsp; &nbsp;<br />
    <span style="color: ;"><strong>C&eacute;dula Jur&iacute;dica</strong></span>: &nbsp;'.$RECEPTOR_IDENTIFICACION_NUMERO.' &nbsp;&nbsp;<br /> 
    <span style="color: ;"><strong>Tel&eacute;fono:</strong></span>&nbsp;+(506) 2768-7676</p>
<br /> <span style="color: ;"><strong>Direcci&oacute;n:</strong></span>&nbsp;' . $DIRECCION . ' 
</td>
<td style="width: 314px;">
<p><br /> <span style="color: ;"><strong>C&oacute;digo Interno:&nbsp;C'.$RECEPTOR_IDENTIFICACION_NUMERO.' </strong></span></p>
<p><br /> <span style="color: ;"><strong>Condici&oacute;n de Venta: </strong></span>Contado <br /> <span style="color: ;"><strong>Medio de Pago:</strong> Efectivo</span></p>
</td>
</tr>
</tbody>
</table><br><br>';
$html .=$linea;
$html .='<table width="714px" style="text-align: center;"><tr> <td width="714px"><h3>Líneas de Detalle</h3></td></tr> </table>';
$html .=$linea;


$html .= '<br> <table style=" width: 720px; ">
<tr style="border-bottom-color:#BAE39C; border-bottom-width:4px">
<td style="width: 90px;border-bottom-color:#BAE39C; border-bottom-width:4px; text-align: center; border-left: 1px solid black"><font size="-1"><strong>Código</strong></font></td>
<td style="width: 60px;border-bottom-color:#BAE39C; border-bottom-width:4px; text-align: center;"><font size="-1"><strong>Cantidad</strong></font></td>
<td style="width: 50px;border-bottom-color:#BAE39C; border-bottom-width:4px; text-align: center;"><font size="-1"><strong>Unidad<br>Medida</strong></font></td>
<td style="width: 145px;border-bottom-color:#BAE39C; border-bottom-width:4px; text-align: center;"><font size="-1"><strong>Descripci&oacute;n del <br> Producto/Servicio</strong></font></td>
<td style="width: 65px;border-bottom-color:#BAE39C; border-bottom-width:4px; text-align: center;"><font size="-1"><strong>Precio<br>Unitario</strong></font></td>
<td style="width: 70px;border-bottom-color:#BAE39C; border-bottom-width:4px; text-align: center;"><font size="-1"><strong>Descuento</strong></font></td>
<td style="width: 85px;border-bottom-color:#BAE39C; border-bottom-width:4px; text-align: center;  border-right: 1px solid black"><font size="-1"><strong>Naturaleza<br>Descuento</strong></font></td>
<td style="width: 85px; border-bottom-color:#BAE39C; border-bottom-width:4px; text-align: center;"><font size="-1"><strong>SubTotal</strong></font></td>
<td style="width: 70px; border-top-color:#BAE39C; border-bottom-width:4px; text-align: center;"><font size="-1"><strong>Impuesto</strong></font></td>
</tr> ';

$count=0;

if (!$detalleAc) {
     $count++;
     $linea =$LineaDetalle;
    $numeroLinea = $linea['NumeroLinea']; // => 1
    $CODIGO_TIPO = $linea['Codigo']['Codigo'];
    $CODIGO_CODIGO = $linea['Codigo']['Codigo'];
    $Cantidad = $linea['Cantidad']; // => 2.00
    $Cantidad = round($Cantidad,2);
    $UnidadMedida = $linea['UnidadMedida']; // => Unid
    $Detalle = $linea['Detalle']; // =$linea[NOMBRE PRODUCTO''
 
    $PrecioUnitario = $linea['PrecioUnitario']; // => 80820.000
    $MontoTotal = $linea['MontoTotal']; // => 161640.000
    $MontoDescuento = $linea['MontoDescuento']; // => 0.00000
    $NaturalezaDescuento = $linea['NaturalezaDescuento']; // => Descuento al cliente
    $SubTotal = $linea['SubTotal']; // => 161640.00000
    

    
 
    //  $search_array = array('first' => 1, 'second' => 4);
    $Impuesto_Codigo = 0;
    $Impuesto_Tarifa = 0;
    $Impuesto_Monto = 0;
    $MontoTotalLinea = $SubTotal; // => 161640.00000
    if (array_key_exists('Impuesto', $linea)) {
        $Impuesto = $linea['Impuesto'];
        $Impuesto_Codigo = $Impuesto['Codigo'];
        $Impuesto_Tarifa = $Impuesto['Tarifa'];
        $Impuesto_Monto = $Impuesto['Monto'];
        $MontoTotalLinea = $linea['MontoTotalLinea']; // => 161640.00000
    
    }
    $html .='<tr>
<td style="width: 90px; text-align: left; border-left: 1px solid black">'.$CODIGO_CODIGO.'</td>
<td style="width: 60px; text-align: right;">'.$Cantidad.'</td>
<td style="width: 50px; text-align: left;">'.$UnidadMedida.'</td>
<td style="width: 145px; text-align: left;">'.$Detalle.'</td>
<td style="width: 65px; text-align: right;">'.number_format($PrecioUnitario,2).'</td>
<td style="width: 70px; text-align: right;">'.number_format($MontoDescuento,2).'</td>
<td style="width: 85px; text-align: right;  border-right: 1px solid black"></td>
<td style="width: 85px; text-align: right;">'.number_format($SubTotal,2).'</td>
<td style="width: 70px; text-align: right;">'.number_format($Impuesto_Monto,2).'</td>
</tr> ';    
 //   <td style="width: 85px; text-align: right;  border-right: 1px solid black">'.number_format($MontoTotalLinea,2).'</td>

}


if ($detalleAc) {
foreach ($LineaDetalle as $linea) {
    $count++;
    $numeroLinea = $linea['NumeroLinea']; // => 1
    $CODIGO_TIPO = $linea['Codigo']['Codigo'];
    $CODIGO_CODIGO = $linea['Codigo']['Codigo'];
    $Cantidad = $linea['Cantidad']; // => 2.00
    $Cantidad = round($Cantidad,2);
    $UnidadMedida = $linea['UnidadMedida']; // => Unid
    $Detalle = $linea['Detalle']; // =$linea[NOMBRE PRODUCTO''
    $PrecioUnitario = $linea['PrecioUnitario']; // => 80820.000
    $MontoTotal = $linea['MontoTotal']; // => 161640.000
    $MontoDescuento = $linea['MontoDescuento']; // => 0.00000
    $SubTotal = $linea['SubTotal']; // => 161640.00000
    $NaturalezaDescuento = $linea['NaturalezaDescuento']; // => Descuento al cliente
    //  $search_array = array('first' => 1, 'second' => 4);
    
    
  
    
    $Impuesto_Codigo = 0;
    $Impuesto_Tarifa = 0;
    $Impuesto_Monto = 0;
    $MontoTotalLinea = $SubTotal; // => 161640.00000
    if (array_key_exists('Impuesto', $linea)) {
        $Impuesto = $linea['Impuesto'];
        $Impuesto_Codigo = $Impuesto['Codigo'];
        $Impuesto_Tarifa = $Impuesto['Tarifa'];
        $Impuesto_Monto = $Impuesto['Monto'];
        $MontoTotalLinea = $linea['MontoTotalLinea']; // => 161640.00000
     
    }
    $html .='<tr>
<td style="width: 90px; text-align: left; border-left: 1px solid black">'.$CODIGO_CODIGO.'</td>
<td style="width: 60px; text-align: right;">'.$Cantidad.'</td>
<td style="width: 50px; text-align: left;">'.$UnidadMedida.'</td>
<td style="width: 145px; text-align: left;">'.$Detalle.'</td>
<td style="width: 65px; text-align: right;">'.number_format($PrecioUnitario,2).'</td>
<td style="width: 70px; text-align: right;">'.number_format($MontoDescuento,2).'</td>
<td style="width: 85px; text-align: right;  border-right: 1px solid black"></td>
<td style="width: 85px; text-align: right;">'.number_format($SubTotal,2).'</td>
<td style="width: 70px; text-align: right;">'.number_format($Impuesto_Monto,2).'</td>
</tr> ';    
}

}

$cuadro='<br><br><table style=" width: 290px; border:1px solid black ">
<tr>
<td style="width: 120px;"><strong>Subtotal Neto: </strong></td>
<td style="width: 75px;  text-align: right;">$</td>
<td style="width: 100px; text-align: right;">'.number_format($TotalVenta,2).'</td>
<td style="width: 65px;"></td>
</tr>
<tr>
<td style="width: 120px;"><strong>Imp. de Ventas: </strong></td>
<td style="width: 75px;  text-align: right;">$</td>
<td style="width: 100px; text-align: right;">'.number_format($TotalImpuesto,2).' </td>
<td style="width: 65px;"></td>
</tr>
<tr>
<td style="width: 120px;"><strong>Otros Impuestos: </strong></td>
<td style="width: 75px;  text-align: right;">$</td>
<td style="width: 100px;">&nbsp;</td>
<td style="width: 65px;"></td>
</tr>
<tr>
<td style="width: 120px;"><strong>Total Factura: </strong></td>
<td style="width: 75px; text-align: right;">$</td>
<td style="width: 100px; text-align: right;">'.number_format($TotalComprobante,2).'</td>
<td style="width: 65px;"></td>
</tr>
</table> 
<table style=" width: 290px; ">
<tr>
<td width="290px" style=" text-align: right;"><h4></h4> </td>
</tr>
</table>';
       $valor = number_format($TotalComprobante,2);
        $valor = str_replace(",", "", $valor);
        $numberToLetterConverter = new NumberToLetterConverter();
        $totalImprime = str_replace(".", ",", $valor);
        $areglo = explode(",", $totalImprime);
        $totalImprime = $areglo[0] . ",00";
        $centa = $areglo[1];
        $letras = $numberToLetterConverter->to_word($totalImprime, $miMoneda = null);
        $letras = strtolower($letras);
        $explode = explode("con", $letras);
        $fin = '';
        //  $fin = 'Quetzales Exactos';
        if (count($explode) > 1) {
            $fin = '';
            $letras = $explode[0] . " con " . $explode[1] . " centavos ";
        }
        $let = explode('Exactos', $letras);
        $letras = $let[0];
        $letras = trim($letras);
        // echo $letras;
        // echo $explode[1];
        // echo "<br>";
        $letras = ucwords($letras);
        $letras = trim($letras);
        $letras = str_replace("Y", "y", $letras);
        $letras = str_replace("Con", "con", $letras);
        $len = (int) $centa;
        if ($len == 0) {
            $fin = 'Exactos';
        } else {
            $fin = 'con ' . $centa . "/100";
        }
        $letras = str_replace("Ventiun", "Veintiun", $letras);
        $letras = $letras . " " . $fin;
        
$cuadro .=$letras.'<br>El&nbsp;monto&nbsp;total&nbsp;facturado&nbsp;es&nbsp;equivalente&nbsp;a:&nbsp;₡&nbsp;'.number_format($TotalComprobante*$TipoCambio,2).'<br>
Tipo de cambio:&nbsp;'.$TipoCambio.' <br>'; 


     $html .='<tr>
<td colspan="5"  style="width: 350px; text-align: right;"></td>
<td colspan="3" style="width: 330px; text-align: left;">'.$cuadro.'</td>
<td  style="width: 50px; text-align: left;"></td>    
</tr> ';   
$html .='<tr><td  style="width: 720px;  "  colspan=9 "> </td>  </tr> ';
$html .='</table> ';



$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$style = array(
    'border' => 0,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);
$tex='QRCODE,H';
//$tex= substr($clave, -6);
//$tex='QRCODE';
$pos = $count*75;
// echo $tex;
// die();
$pdf->write2DBarcode('www.costarica.com/'.$clave, $tex, 172, $pos, 28, 28, $style, 'N');


$ruta .="FacturaFace_CR.pdf"; 
//echo $ruta;

//$ruta .= $NombrePdf.".pdf";
$pdf->Output($ruta, 'F');
//$pdf->Output('/Factura.pdf', 'I');
echo $RECEPTOR_CORREO;
die();
?>
