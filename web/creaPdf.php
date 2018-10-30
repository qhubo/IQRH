<?php
$ruta="C:/xampp/htdocs/iqrh/web/uploads/";
require_once('tcpdf/tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('VIA');
$pdf->SetTitle('Factura Electronica');
$pdf->SetSubject('Factura');
$pdf->SetKeywords('Factura, Detalle, Cobro');
// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));
//// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);  /***** colocar numero de pagina
//$pdf->SetAutoPageBreak(TRUE); 
// set default font subsetting mode
//$pdf->setFontSubsetting(true);
// $pdf->SetFont('dejavusans', '', 9, '', true);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetMargins(1, 2, 0, true);
$pdf->SetFont('dejavusans', '', 8, '');
$pdf->AddPage();
$archivo=$_POST["archivo"];
//$archivo='00100001010000000013_02_Firmado.xml';
$NombrePdf = str_replace(".xml", "", $archivo);
// Set some content to print
//$xml = simplexml_load_file("00100001010000000013_02_Firmado.xml");
// $xml = simplexml_load_file("uploads/xml/00100001010000000013_02_Firmado.xml");
$xml = simplexml_load_file("uploads/xml/".$archivo);
$file ="uploads/xml/".$archivo;
$fileC ="uploads/back/".$archivo;
//unlink($file);
//if (!unlink($file)) {
//    
//}
$antes ='/home/iqrhviasagt/public_html/uploads/xml/'.$archivo;
$nuevo ='/home/iqrhviasagt/public_html/uploads/back/'.$archivo;
 move_uploaded_file ($antes, $nuevo );
   if (!unlink($antes)) {
   }      
   
      if (!unlink($file)) {
   }      

// print_r($xml);
$json = json_encode($xml);
//convert into associative array
$xmlArr = json_decode($json, true);
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

$MedioPago = $xmlArr['MedioPago']; // => 04
$DETALLEServicio = $xmlArr['DetalleServicio'];
$LineaDetalle = $DETALLEServicio['LineaDetalle'];
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
$ResumenFactura = $xmlArr['ResumenFactura']; // => Array
$CodigoMoneda = $ResumenFactura['CodigoMoneda']; // => CRC
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
$html = 'text';
$html = '<table style="height: 43px; width: 714px;">
<tbody>
<tr>
<td style="width: 140px;" ><br><br><img src="logoFa.jpg" width="140px" > </td>
<td style="width: 360px; text-align: center;"><span style="color: #000080; font-size=14px">&nbsp;<strong>GRAF DEPOT, S.A.&nbsp; </strong> </span><br /><span style="color: #000080;">C&eacute;dula Jur&iacute;dica No. 3-101-423790</span><br /><span style="color: #000080;"> De Perimercados 250 Este y 50 Sur calle sin salida Monterrey&nbsp;</span><br /><span style="color: #000080;"> San Pedro de Montes de Oca -- San Jos&eacute;, Costa Rica</span><br /><span style="color: #000080;"> Tels:. 2524-2424 / 2524-2495 / 2524-2496 / 2524-2039 / 2524-2009 / 24336134</span><br /><span style="color: #000080;"> E-mail: <a style="color: #000080;" href="mailto:administracioncr@eskolor.com">administracioncr@eskolor.com</a></span></td>
<td style="width: 214px;">
<table style="height: 43px; border-color: black; width: 214px;">
<tbody>';
//<tr style="height: 12px;">
//<td style="width: 50px; height: 12px; text-align: center;"><span style="color: #000080;"><strong>DIA</strong></span></td>
//<td style="width: 100px; height: 12px; text-align: center;"><span style="color: #000080;"><strong>MES</strong></span></td>
//<td style="width: 64px; height: 12px; text-align: center;"><span style="color: #000080;"><strong>A&Ntilde;O</strong></span></td>
//</tr>
$html .= '<tr style="text-align: right; height: 18px;">
<td style="width: 50px; height: 18px; text-align: center;"><span style="color: #000080;">' . $DIA . '</span></td>
<td style="width: 100px; height: 18px; text-align: center;"><span style="color: #000080;">' . $MESDESCRIPCION[$MES] . '</span></td>
<td style="width: 64px; height: 18px; text-align: center;"><span style="color: #000080;">' . $ANO . '</span></td>
</tr>
</tbody>
</table>
<table style="width:100%">
<tr>
<td style="width:100%; border-bottom: 1px solid black;border-top: 1px solid black;border-right: 1px solid black; border-left: 1px solid black;">
<p style="text-align: center;"><span style="color: #000080;">FACTURA ELECTR&Oacute;NICA</span><br /><span style="color: #000080;">NO. <span style="color: #ff0000;"><strong>' . $NumeroConsecutivo . '</strong></span></span></p>
<p style="text-align: center;"><span style="color: #000080;">CLAVE NUM&Eacute;RICA<br>' . $clave . '</span></p>
<br>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table> <br/><br/>';

$html .= '<table style="height: 95px; border-color: black; width: 714px;">
<tbody>
<tr>
<td style="width: 464px; border-bottom: 1px solid black; border-left: 1px solid black;">
<p><span style="color: #000080;"><strong>Se&ntilde;or(es)</strong>:</span> ' . $RECEPTOR_NOMBRE . '&nbsp; &nbsp; &nbsp;<br /> ';
$html2 = ' <span style="color: #000080;"><strong>C&oacute;digo de cliente</strong></span>: 06231-798 &nbsp; &nbsp;<br />';
$html .= '<span style="color: #000080;"><strong>Condiciones de Pago:</strong></span> Contado &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <span style="color: #000080;">&nbsp;</span><br /> 
   <span style="color: #000080;"><strong>Direcci&oacute;n:</strong></span> ' . $DIRECCION . '   &nbsp; &nbsp;<br />  
   <span style="color: #000080;"><strong>Correo</strong></span>: ' . $EMISOR_CORREO . ' &nbsp;<br /> ';
$html2 .= '<strong><span style="color: #000080;">Orden de Compra:</span>&nbsp;</strong> Alm:001';
$html .= '&nbsp; &nbsp;&nbsp;</p>
</td>
<td style="width: 250px; border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;" >';
$html .= '   <span style="color: #000080;"><strong>No. Interno:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><span style="color: #000000;">' . $RECEPTOR_IDENTIFICACION_NUMERO . '</span></span>';

$html .= '<br /> 
    &nbsp;<span style="color: #000080;"><strong>&nbsp;&nbsp;Condici&oacute;n:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong><span style="color: #000000;">Cr&eacute;dito</span></span> <br /> 
    &nbsp;<span style="color: #000080;"><strong>&nbsp;&nbsp;Creaci&oacute;n:&nbsp;</strong><span style="color: #000000;">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;' . $fechaD . '&nbsp;</span></span><br /> 
    &nbsp;<span style="color: #000080;"><strong>&nbsp;&nbsp;Vencimiento:&nbsp; &nbsp; &nbsp; &nbsp;</strong></span> ' . $nuevafecha . '<strong>&nbsp;</strong><br /> 
    &nbsp;<span style="color: #000080;"><strong>&nbsp;&nbsp;Plazo:&nbsp;</strong></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #000080;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style="color: #000000;">' . $PlazoCredito . ' dias</span></span><br /> 
    &nbsp;<span style="color: #000080;"><span style="color: #000000;"><strong><span style="color: #000080;">&nbsp;&nbsp;Tipo de Cambio:&nbsp; &nbsp;</span></strong> 0</span></span>
</td>
</tr>
</tbody>
</table>';

$html .= '<br> <br> <br> <table style="height: 50px; width: 720px; border-color: black;">
<tr>
<td style="width: 55px; text-align: center; border-left: 1px solid black"><span style="color: #000080;">Codigo</span></td>
<td style="width: 190px; text-align: center;"><span style="color: #000080;">Descripci&oacute;n</span></td>
<td style="width: 50px; text-align: center;"><span style="color: #000080;">Medida</span></td>
<td style="width: 50px; text-align: center;"><span style="color: #000080;">Cant</span></td>
<td style="width: 65px; text-align: center;"><span style="color: #000080;">Precio</span></td>
<td style="width: 85px; text-align: center;"><span style="color: #000080;">SubTotal</span></td>
<td style="width: 70px; text-align: center;"><span style="color: #000080;">Descuento</span></td>
<td style="width: 70px; text-align: center;"><span style="color: #000080;">Impuesto</span></td>
<td style="width: 85px; text-align: center;  border-right: 1px solid black"><span style="color: #000080;">Total</span></td>
</tr> ';

$count=0;
foreach ($LineaDetalle as $linea) {
    $count++;
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
    $html .='<tr>
<td style="width: 55px; text-align: left; border-left: 1px solid black">'.$CODIGO_CODIGO.'</td>
<td style="width: 190px; text-align: left;">'.$Detalle.'</td>
<td style="width: 50px; text-align: left;">'.$UnidadMedida.'</td>
<td style="width: 50px; text-align: right;">'.$Cantidad.'</td>
<td style="width: 65px; text-align: right;">'.number_format($PrecioUnitario,2).'</td>
<td style="width: 85px; text-align: right;">'.number_format($SubTotal,3).'</td>
<td style="width: 70px; text-align: right;">'.number_format($MontoDescuento,2).'</td>
<td style="width: 70px; text-align: right;">'.number_format($Impuesto_Monto,3).'</td>
<td style="width: 85px; text-align: right;  border-right: 1px solid black">'.number_format($MontoTotalLinea,2).'</td>
</tr> ';    
}


 for ($i =$count; $i <= 41; $i++) { 
     $html .='<tr>
<td style="width: 55px; text-align: left; border-left: 1px solid black"></td>
<td style="width: 190px; text-align: left;"></td>
<td style="width: 50px; text-align: left;"></td>
<td style="width: 50px; text-align: right;"></td>
<td style="width: 65px; text-align: right;"></td>
<td style="width: 85px; text-align: right;"></td>
<td style="width: 70px; text-align: right;"></td>
<td style="width: 70px; text-align: right;"></td>
<td style="width: 85px; text-align: right;  border-right: 1px solid black"></td>
</tr> ';   
 }
$html .='<tr><td  style="width: 720px;   border-top: 1px solid black" "  colspan=9 "> </td>  </tr> ';
$html .='</table> ';

$html.='<table style="height: 86px; width: 720px; border-color: black;">
<tr style="height: 14px;">
<td style="width: 150px; height: 14px; text-align: center; border-left: 1px solid black;border-bottom: 1px solid black">&nbsp;</td>
<td style="width: 290px; height: 14px; text-align: left; vertical-align: top;border-bottom: 1px solid black">Observaci&oacute;n:&nbsp;&nbsp; <br><br><br><br><br><br></td>
<td style="width: 280px; height: 14px; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black">
<span style="color: #000080;"><strong>SUB-TOTAL:</strong></span>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;   ₡&nbsp; &nbsp; '.number_format($TotalVenta,2).'<br /> 
<strong><span style="color: #000080;">DESCUENTO:&nbsp; &nbsp;</span></strong>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;    ₡&nbsp; &nbsp;'.number_format($TotalDescuentos,2).'<br /> 
<strong><span style="color: #000080;">IMP. DE VENTAS:</span></strong> &nbsp;&nbsp;   ₡ &nbsp; &nbsp; '.number_format($TotalImpuesto,2).' <br /> 
<strong><span style="color: #000080;">TOTAL :</span></strong> &nbsp;&nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ₡ &nbsp; &nbsp; <strong>'.number_format($TotalComprobante,2).' </strong></td>
</tr>
</table> <br><br>';

$html.='<table style="width: 720px"  > <tr>
        <td  style="width: 40%; border-left: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black" ><br><br><br><br><br><br> </td>
        <td  style="width: 60%; border-right: 1px solid black; border-left: 1px solid black;   border-bottom: 1px solid black; border-top: 1px solid black; " > 
<br> <br>&nbsp;&nbsp;Firma del Cliente ------------------------------------------------------
<br> <br><br> &nbsp;&nbsp;Cedula del Cliente ------------------------------------------------------

</td>
     
        </tr> </table> <Br><font size="-2"> Autorizada mediante  resolución No '.$NumeroResolucion." de fecha ".$FechaResolucion."</font>"; 



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

// echo $tex;
// die();
$pdf->write2DBarcode('www.eskolor.com/'.$clave, $tex, 2, 220, 30, 30, $style, 'N');
//$pdf->Text(20, 205, 'QRCODE H');



//$pdf->Write(0, $html, '', 0, 'C', true, 0, false, false, 0);

//$ruta .="FacturaFace.pdf"; 
$ruta .= $NombrePdf.".pdf";
$pdf->Output($ruta, 'F');
echo $RECEPTOR_CORREO;
die();
?>
