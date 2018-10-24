<?php

/**
 * reporte actions.
 *
 * @package    plan
 * @subpackage reporte
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reporteActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
 public function executeRecibo(sfWebRequest $request) {
        $pdf = new sfTCPDF("P", "mm", "Letter");
        $id = $request->getParameter("id");
        $codigo = $request->getParameter("cod");
//        $cabecera = ReciboCabeceraQuery::create()
//                ->filterByCabeceraIn($id)
//                ->findOne();
//        $encabezado = ReciboEncabezadoQuery::create()
//                ->filterByCabeceraIn($id)
//                ->filterByCodigo($codigo)
//                ->findOne();
//        $detalle= ReciboDetalleQuery::create()
//                ->filterByPlanillaResumenId($encabezado->getPlanillaResumenId())
//                ->find();
//        
//        
//        $html = $this->getPartial('reporte/recibo', array("muestra" => 0,
//            'cabecera' => $cabecera,
//            'encabezado'=>$encabezado,
//            'detalle'=>$detalle
//        ));
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
        $pdf = new sfTCPDF("P", "mm", "Letter");
        $id = $request->getParameter("id");
        $codigo = $request->getParameter("cod");
//        $cabecera = ReciboCabeceraQuery::create()
//                ->filterByCabeceraIn($id)
//                ->findOne();
//        $encabezado = ReciboEncabezadoQuery::create()
//                ->filterByCabeceraIn($id)
//                ->filterByCodigo($codigo)
//                ->findOne();
//        $detalle= ReciboDetalleQuery::create()
//                ->filterByPlanillaResumenId($encabezado->getPlanillaResumenId())
//                ->find();
//        
//        
        $html = $this->getPartial('reporte/asistencia', array("muestra" => 0,
//            'cabecera' => $cabecera,
//            'encabezado'=>$encabezado,
 //           'detalle'=>$detalle
        ));
     //           echo $html;
     //   die();
        
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
        $pdf->Output('Visita.pdf', 'I');

     }
}
