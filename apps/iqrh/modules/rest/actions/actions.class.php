<?php

/**
 * rest actions.
 *
 * @package    plan
 * @subpackage rest
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class restActions extends sfActions {

    public function executeOnline(sfWebRequest $request) {
        echo "online";
        die();
    }

    public function executeResumen(sfWebRequest $request) {
        $Planilla_Resumen_id = $request->getParameter('Planilla_Resumen_id');
        $empleado = $request->getParameter('empleado');
        $empleado_proyecto_id = $request->getParameter('empleado_proyecto_id');
        $sueldo_base = $request->getParameter('sueldo_base');
        $bonificacion_base = $request->getParameter('bonificacion_base');
        $dias_ausencias = $request->getParameter('dias_ausencias');
        $dias_suspendido = $request->getParameter('dias_suspendido');
        $septimos = $request->getParameter('septimos');
        $total_descuentos = $request->getParameter('total_descuentos');
        $total_ingresos = $request->getParameter('total_ingresos');
        $total_extras = $request->getParameter('total_extras');
        $total_sueldo_liquido = $request->getParameter('total_sueldo_liquido');
        $alta = $request->getParameter('alta');
        $baja = $request->getParameter('baja');
        $codigo = $request->getParameter('codigo');
        $puesto = $request->getParameter('puesto');
        $departamento = $request->getParameter('departamento');
        $dias_base = $request->getParameter('dias_base');
        $bloque = $request->getParameter('bloque');
        $inicio = $request->getParameter('inicio');
        $fin = $request->getParameter('fin');
        $numero = $request->getParameter('numero');
        $laborados = $request->getParameter('laborados');
        $cabecera_in = $request->getParameter('cabecera_in');
        $planillaRe = ReciboEncabezadoQuery::create()
                ->filterByPlanillaResumenId($Planilla_Resumen_id)
                ->findOne();
        if (!$planillaRe) {
            $planillaRe = new ReciboEncabezado();
            $planillaRe->setPlanillaResumenId($Planilla_Resumen_id);
            $planillaRe->save();
        }

        $planillaRe->setCabeceraIn($cabecera_in);
        $planillaRe->setEmpleado($empleado);
        $planillaRe->setEmpleadoProyectoId($empleado_proyecto_id);
        $planillaRe->setSueldoBase($sueldo_base);
        $planillaRe->setBonificacionBase($bonificacion_base);
        $planillaRe->setDiasAusencias($dias_ausencias);
        $planillaRe->setDiasSuspendido($dias_ausencias);
        $planillaRe->setSeptimos($septimos);
        $planillaRe->setTotalDescuentos($total_descuentos);
        $planillaRe->setTotalIngresos($total_ingresos);
        $planillaRe->setTotalExtras($total_extras);
        $planillaRe->setTotalSueldoLiquido($total_sueldo_liquido);
        $planillaRe->setDiasSuspendido($dias_suspendido);
        $planillaRe->setAlta($alta);
        $planillaRe->setBaja($baja);
        $planillaRe->setCodigo($codigo);
        $planillaRe->setPuesto($puesto);
        $planillaRe->setDepartamento($departamento);
        $planillaRe->setDiasBase($dias_base);
        $planillaRe->setBloque($bloque);
        $planillaRe->setInicio($inicio);
        $planillaRe->setFin($fin);
        $planillaRe->setNumero($numero);
        $planillaRe->setLaborados($laborados);
        $planillaRe->save();
        $resultado['detalle'] = 'ok';
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeResumenData(sfWebRequest $request) {

        $data = $request->getParameter('data');
        //  $data ="?idx=1&id_c=4&planilla_resumen_id=95920&tipo=Descuento&afeca_ss=False&descripcion=Seguro Móvil&monto=25.00&debe=0.00&haber=25.00&identificar=-&cabecera_in=578|||?idx=1&id_c=32&planilla_resumen_id=95920&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=29875.00&debe=29875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=141&planilla_resumen_id=95920&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=33&planilla_resumen_id=95921&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=37375.00&debe=37375.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=140&planilla_resumen_id=95921&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=34&planilla_resumen_id=95922&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2000.00&debe=2000.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=139&planilla_resumen_id=95922&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=5&planilla_resumen_id=95923&tipo=Descuento&afeca_ss=False&descripcion=Préstamo a Empleados&monto=685.26&debe=0.00&haber=685.26&identificar=-&cabecera_in=578|||?idx=1&id_c=35&planilla_resumen_id=95923&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2048.00&debe=2048.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=138&planilla_resumen_id=95923&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=30&planilla_resumen_id=95924&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1525.00&debe=1525.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=143&planilla_resumen_id=95924&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=6&planilla_resumen_id=95925&tipo=Descuento&afeca_ss=False&descripcion=Préstamo a Empleados&monto=281.88&debe=0.00&haber=281.88&identificar=-&cabecera_in=578|||?idx=1&id_c=31&planilla_resumen_id=95925&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1787.50&debe=1787.50&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=142&planilla_resumen_id=95925&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=1&planilla_resumen_id=95926&tipo=Seguro Social&afeca_ss=True&descripcion=Seguro Social Empleado&monto=53.13&debe=0.00&haber=53.13&identificar=-&cabecera_in=578|||?idx=1&id_c=7&planilla_resumen_id=95926&tipo=Descuento&afeca_ss=False&descripcion=Préstamo a Empleados&monto=404.08&debe=0.00&haber=404.08&identificar=-&cabecera_in=578|||?idx=1&id_c=29&planilla_resumen_id=95926&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1100.00&debe=1100.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=144&planilla_resumen_id=95926&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=91.67&debe=91.67&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=28&planilla_resumen_id=95927&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2875.00&debe=2875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=145&planilla_resumen_id=95927&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=8&planilla_resumen_id=95928&tipo=Descuento&afeca_ss=False&descripcion=Préstamo a Empleados&monto=489.40&debe=0.00&haber=489.40&identificar=-&cabecera_in=578|||?idx=1&id_c=24&planilla_resumen_id=95928&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2300.00&debe=2300.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=149&planilla_resumen_id=95928&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=25&planilla_resumen_id=95929&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2500.00&debe=2500.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=148&planilla_resumen_id=95929&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=26&planilla_resumen_id=95930&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=3375.00&debe=3375.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=147&planilla_resumen_id=95930&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=9&planilla_resumen_id=95931&tipo=Descuento&afeca_ss=False&descripcion=Seguro Móvil&monto=15.00&debe=0.00&haber=15.00&identificar=-&cabecera_in=578|||?idx=1&id_c=27&planilla_resumen_id=95931&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2041.50&debe=2041.50&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=146&planilla_resumen_id=95931&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=10&planilla_resumen_id=95932&tipo=Descuento&afeca_ss=False&descripcion=Seguro Móvil&monto=25.00&debe=0.00&haber=25.00&identificar=-&cabecera_in=578|||?idx=1&id_c=22&planilla_resumen_id=95932&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=3000.00&debe=3000.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=151&planilla_resumen_id=95932&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=2&planilla_resumen_id=95933&tipo=Seguro Social&afeca_ss=True&descripcion=Seguro Social Empleado&monto=57.56&debe=0.00&haber=57.56&identificar=-&cabecera_in=578|||?idx=1&id_c=23&planilla_resumen_id=95933&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1191.67&debe=1191.67&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=150&planilla_resumen_id=95933&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=91.67&debe=91.67&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=20&planilla_resumen_id=95934&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=153&planilla_resumen_id=95934&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=21&planilla_resumen_id=95935&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=152&planilla_resumen_id=95935&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=11&planilla_resumen_id=95936&tipo=Descuento&afeca_ss=False&descripcion=Seguro Móvil&monto=25.00&debe=0.00&haber=25.00&identificar=-&cabecera_in=578|||?idx=1&id_c=6&planilla_resumen_id=95936&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=167&planilla_resumen_id=95936&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=7&planilla_resumen_id=95937&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1500.00&debe=1500.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=166&planilla_resumen_id=95937&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=3&planilla_resumen_id=95938&tipo=Seguro Social&afeca_ss=True&descripcion=Seguro Social Empleado&monto=48.30&debe=0.00&haber=48.30&identificar=-&cabecera_in=578|||?idx=1&id_c=5&planilla_resumen_id=95938&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1000.00&debe=1000.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=168&planilla_resumen_id=95938&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=83.33&debe=83.33&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=4&planilla_resumen_id=95939&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=169&planilla_resumen_id=95939&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=12&planilla_resumen_id=95940&tipo=Descuento&afeca_ss=False&descripcion=Seguro Móvil&monto=25.00&debe=0.00&haber=25.00&identificar=-&cabecera_in=578|||?idx=1&id_c=8&planilla_resumen_id=95940&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=3477.50&debe=3477.50&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=165&planilla_resumen_id=95940&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=9&planilla_resumen_id=95941&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1775.00&debe=1775.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=164&planilla_resumen_id=95941&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=10&planilla_resumen_id=95942&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1775.00&debe=1775.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=163&planilla_resumen_id=95942&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=11&planilla_resumen_id=95943&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=162&planilla_resumen_id=95943&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=12&planilla_resumen_id=95944&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=5875.00&debe=5875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=161&planilla_resumen_id=95944&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=13&planilla_resumen_id=95945&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=160&planilla_resumen_id=95945&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=14&planilla_resumen_id=95946&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=159&planilla_resumen_id=95946&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=15&planilla_resumen_id=95947&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=158&planilla_resumen_id=95947&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=16&planilla_resumen_id=95948&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=157&planilla_resumen_id=95948&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=17&planilla_resumen_id=95949&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=91.41&debe=91.41&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=156&planilla_resumen_id=95949&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=8.33&debe=8.33&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=18&planilla_resumen_id=95950&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=155&planilla_resumen_id=95950&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=19&planilla_resumen_id=95951&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=154&planilla_resumen_id=95951&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=36&planilla_resumen_id=95952&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=137&planilla_resumen_id=95952&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=37&planilla_resumen_id=95953&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=136&planilla_resumen_id=95953&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=38&planilla_resumen_id=95954&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=135&planilla_resumen_id=95954&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=39&planilla_resumen_id=95955&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=134&planilla_resumen_id=95955&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=40&planilla_resumen_id=95956&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=133&planilla_resumen_id=95956&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=41&planilla_resumen_id=95957&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=132&planilla_resumen_id=95957&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=42&planilla_resumen_id=95958&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=131&planilla_resumen_id=95958&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=43&planilla_resumen_id=95959&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=130&planilla_resumen_id=95959&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=44&planilla_resumen_id=95960&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=129&planilla_resumen_id=95960&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=45&planilla_resumen_id=95961&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=128&planilla_resumen_id=95961&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=46&planilla_resumen_id=95962&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=127&planilla_resumen_id=95962&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=47&planilla_resumen_id=95963&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=126&planilla_resumen_id=95963&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=48&planilla_resumen_id=95964&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=125&planilla_resumen_id=95964&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=49&planilla_resumen_id=95965&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=124&planilla_resumen_id=95965&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=50&planilla_resumen_id=95966&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=123&planilla_resumen_id=95966&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=51&planilla_resumen_id=95967&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=122&planilla_resumen_id=95967&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=52&planilla_resumen_id=95968&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=121&planilla_resumen_id=95968&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=53&planilla_resumen_id=95969&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=120&planilla_resumen_id=95969&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=54&planilla_resumen_id=95970&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=119&planilla_resumen_id=95970&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=55&planilla_resumen_id=95971&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1875.00&debe=1875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=118&planilla_resumen_id=95971&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=56&planilla_resumen_id=95972&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2875.00&debe=2875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=117&planilla_resumen_id=95972&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=57&planilla_resumen_id=95973&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2875.00&debe=2875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=116&planilla_resumen_id=95973&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=58&planilla_resumen_id=95974&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=115&planilla_resumen_id=95974&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=59&planilla_resumen_id=95975&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2250.00&debe=2250.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=114&planilla_resumen_id=95975&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=60&planilla_resumen_id=95976&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2000.00&debe=2000.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=113&planilla_resumen_id=95976&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=61&planilla_resumen_id=95977&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1875.00&debe=1875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=112&planilla_resumen_id=95977&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=62&planilla_resumen_id=95978&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=111&planilla_resumen_id=95978&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=63&planilla_resumen_id=95979&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1875.00&debe=1875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=110&planilla_resumen_id=95979&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=64&planilla_resumen_id=95980&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=109&planilla_resumen_id=95980&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=65&planilla_resumen_id=95981&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=108&planilla_resumen_id=95981&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=66&planilla_resumen_id=95982&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=107&planilla_resumen_id=95982&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=67&planilla_resumen_id=95983&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=106&planilla_resumen_id=95983&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=68&planilla_resumen_id=95984&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=105&planilla_resumen_id=95984&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=69&planilla_resumen_id=95985&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=104&planilla_resumen_id=95985&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=70&planilla_resumen_id=95986&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=103&planilla_resumen_id=95986&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=71&planilla_resumen_id=95987&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=102&planilla_resumen_id=95987&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=72&planilla_resumen_id=95988&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=101&planilla_resumen_id=95988&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=73&planilla_resumen_id=95989&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1571.61&debe=1571.61&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=100&planilla_resumen_id=95989&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=74&planilla_resumen_id=95990&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=99&planilla_resumen_id=95990&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=75&planilla_resumen_id=95991&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1375.00&debe=1375.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=98&planilla_resumen_id=95991&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=76&planilla_resumen_id=95992&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=97&planilla_resumen_id=95992&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=77&planilla_resumen_id=95993&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=96&planilla_resumen_id=95993&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=78&planilla_resumen_id=95994&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=95&planilla_resumen_id=95994&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=79&planilla_resumen_id=95995&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=94&planilla_resumen_id=95995&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=80&planilla_resumen_id=95996&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=93&planilla_resumen_id=95996&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=81&planilla_resumen_id=95997&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=92&planilla_resumen_id=95997&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=82&planilla_resumen_id=95998&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=91&planilla_resumen_id=95998&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=83&planilla_resumen_id=95999&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=90&planilla_resumen_id=95999&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=84&planilla_resumen_id=96000&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=89&planilla_resumen_id=96000&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=85&planilla_resumen_id=96001&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=88&planilla_resumen_id=96001&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=86&planilla_resumen_id=96002&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578?idx=1&id_c=87&planilla_resumen_id=96002&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578";
        $data = str_replace("?", "", $data);
        $array = explode("|||", $data);
        $LISTADO = NULL;
        foreach ($array as $lista) {
            $detalle = explode("&", $lista);
            foreach ($detalle as $linea) {
                $linea = trim($linea);
                $datos = explode("=", $linea);
                $campo = $datos[0];
                $valor = $datos[1];
                $DAT[$campo] = $valor;
            }
            $LISTADO[] = $DAT;
        }
        foreach ($LISTADO as $DataQ) {
//        $Planilla_Resumen_id = $request->getParameter('Planilla_Resumen_id');
//        $empleado = $request->getParameter('empleado');
//        $empleado_proyecto_id = $request->getParameter('empleado_proyecto_id');
//        $sueldo_base = $request->getParameter('sueldo_base');
//        $bonificacion_base = $request->getParameter('bonificacion_base');
//        $dias_ausencias = $request->getParameter('dias_ausencias');
//        $dias_suspendido = $request->getParameter('dias_suspendido');
//        $septimos = $request->getParameter('septimos');
//        $total_descuentos = $request->getParameter('total_descuentos');
//        $total_ingresos = $request->getParameter('total_ingresos');
//        $total_extras = $request->getParameter('total_extras');
//        $total_sueldo_liquido = $request->getParameter('total_sueldo_liquido');
//        $alta = $request->getParameter('alta');
//        $baja = $request->getParameter('baja');
//        $codigo = $request->getParameter('codigo');
//        $puesto = $request->getParameter('puesto');
//        $departamento = $request->getParameter('departamento');
//        $dias_base = $request->getParameter('dias_base');
//        $bloque = $request->getParameter('bloque');
//        $inicio = $request->getParameter('inicio');
//        $fin = $request->getParameter('fin');
//        $numero = $request->getParameter('numero');
//        $laborados = $request->getParameter('laborados');
//        $cabecera_in = $request->getParameter('cabecera_in');
            $Planilla_Resumen_id = $DataQ['Planilla_Resumen_id'];
            $empleado = $DataQ['empleado'];
            $empleado_proyecto_id = $DataQ['empleado_proyecto_id'];
            $sueldo_base = $DataQ['sueldo_base'];
            $bonificacion_base = $DataQ['bonificacion_base'];
            $dias_ausencias = $DataQ['dias_ausencias'];
            $dias_suspendido = $DataQ['dias_suspendido'];
            $septimos = $DataQ['septimos'];
            $total_descuentos = $DataQ['total_descuentos'];
            $total_ingresos = $DataQ['total_ingresos'];
            $total_extras = $DataQ['total_extras'];
            $total_sueldo_liquido = $DataQ['total_sueldo_liquido'];
            $alta = $DataQ['alta'];
            $baja = $DataQ['baja'];
            $codigo = $DataQ['codigo'];
            $puesto = $DataQ['puesto'];
            $departamento = $DataQ['departamento'];
            $dias_base = $DataQ['dias_base'];
            $bloque = $DataQ['bloque'];
            $inicio = $DataQ['inicio'];
            $fin = $DataQ['fin'];
            $numero = $DataQ['numero'];
            $laborados = $DataQ['laborados'];
            $cabecera_in = $DataQ['cabecera_in'];

            $planillaRe = ReciboEncabezadoQuery::create()
                    ->filterByPlanillaResumenId($Planilla_Resumen_id)
                    ->findOne();
            if (!$planillaRe) {
                $planillaRe = new ReciboEncabezado();
                $planillaRe->setPlanillaResumenId($Planilla_Resumen_id);
                $planillaRe->save();
            }

            $planillaRe->setCabeceraIn($cabecera_in);
            $planillaRe->setEmpleado($empleado);
            $planillaRe->setEmpleadoProyectoId($empleado_proyecto_id);
            $planillaRe->setSueldoBase($sueldo_base);
            $planillaRe->setBonificacionBase($bonificacion_base);
            $planillaRe->setDiasAusencias($dias_ausencias);
            $planillaRe->setDiasSuspendido($dias_ausencias);
            $planillaRe->setSeptimos($septimos);
            $planillaRe->setTotalDescuentos($total_descuentos);
            $planillaRe->setTotalIngresos($total_ingresos);
            $planillaRe->setTotalExtras($total_extras);
            $planillaRe->setTotalSueldoLiquido($total_sueldo_liquido);
            $planillaRe->setDiasSuspendido($dias_suspendido);
            $planillaRe->setAlta($alta);
            $planillaRe->setBaja($baja);
            $planillaRe->setCodigo($codigo);
            $planillaRe->setPuesto($puesto);
            $planillaRe->setDepartamento($departamento);
            $planillaRe->setDiasBase($dias_base);
            $planillaRe->setBloque($bloque);
            $planillaRe->setInicio($inicio);
            $planillaRe->setFin($fin);
            $planillaRe->setNumero($numero);
            $planillaRe->setLaborados($laborados);
            $planillaRe->save();
        }
        $resultado['detalle'] = 'ok';
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeDetalleData(sfWebRequest $request) {

        $data = $request->getParameter('data');
        //  $data ="?idx=1&id_c=4&planilla_resumen_id=95920&tipo=Descuento&afeca_ss=False&descripcion=Seguro Móvil&monto=25.00&debe=0.00&haber=25.00&identificar=-&cabecera_in=578|||?idx=1&id_c=32&planilla_resumen_id=95920&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=29875.00&debe=29875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=141&planilla_resumen_id=95920&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=33&planilla_resumen_id=95921&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=37375.00&debe=37375.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=140&planilla_resumen_id=95921&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=34&planilla_resumen_id=95922&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2000.00&debe=2000.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=139&planilla_resumen_id=95922&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=5&planilla_resumen_id=95923&tipo=Descuento&afeca_ss=False&descripcion=Préstamo a Empleados&monto=685.26&debe=0.00&haber=685.26&identificar=-&cabecera_in=578|||?idx=1&id_c=35&planilla_resumen_id=95923&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2048.00&debe=2048.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=138&planilla_resumen_id=95923&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=30&planilla_resumen_id=95924&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1525.00&debe=1525.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=143&planilla_resumen_id=95924&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=6&planilla_resumen_id=95925&tipo=Descuento&afeca_ss=False&descripcion=Préstamo a Empleados&monto=281.88&debe=0.00&haber=281.88&identificar=-&cabecera_in=578|||?idx=1&id_c=31&planilla_resumen_id=95925&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1787.50&debe=1787.50&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=142&planilla_resumen_id=95925&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=1&planilla_resumen_id=95926&tipo=Seguro Social&afeca_ss=True&descripcion=Seguro Social Empleado&monto=53.13&debe=0.00&haber=53.13&identificar=-&cabecera_in=578|||?idx=1&id_c=7&planilla_resumen_id=95926&tipo=Descuento&afeca_ss=False&descripcion=Préstamo a Empleados&monto=404.08&debe=0.00&haber=404.08&identificar=-&cabecera_in=578|||?idx=1&id_c=29&planilla_resumen_id=95926&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1100.00&debe=1100.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=144&planilla_resumen_id=95926&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=91.67&debe=91.67&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=28&planilla_resumen_id=95927&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2875.00&debe=2875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=145&planilla_resumen_id=95927&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=8&planilla_resumen_id=95928&tipo=Descuento&afeca_ss=False&descripcion=Préstamo a Empleados&monto=489.40&debe=0.00&haber=489.40&identificar=-&cabecera_in=578|||?idx=1&id_c=24&planilla_resumen_id=95928&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2300.00&debe=2300.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=149&planilla_resumen_id=95928&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=25&planilla_resumen_id=95929&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2500.00&debe=2500.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=148&planilla_resumen_id=95929&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=26&planilla_resumen_id=95930&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=3375.00&debe=3375.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=147&planilla_resumen_id=95930&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=9&planilla_resumen_id=95931&tipo=Descuento&afeca_ss=False&descripcion=Seguro Móvil&monto=15.00&debe=0.00&haber=15.00&identificar=-&cabecera_in=578|||?idx=1&id_c=27&planilla_resumen_id=95931&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2041.50&debe=2041.50&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=146&planilla_resumen_id=95931&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=10&planilla_resumen_id=95932&tipo=Descuento&afeca_ss=False&descripcion=Seguro Móvil&monto=25.00&debe=0.00&haber=25.00&identificar=-&cabecera_in=578|||?idx=1&id_c=22&planilla_resumen_id=95932&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=3000.00&debe=3000.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=151&planilla_resumen_id=95932&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=2&planilla_resumen_id=95933&tipo=Seguro Social&afeca_ss=True&descripcion=Seguro Social Empleado&monto=57.56&debe=0.00&haber=57.56&identificar=-&cabecera_in=578|||?idx=1&id_c=23&planilla_resumen_id=95933&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1191.67&debe=1191.67&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=150&planilla_resumen_id=95933&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=91.67&debe=91.67&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=20&planilla_resumen_id=95934&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=153&planilla_resumen_id=95934&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=21&planilla_resumen_id=95935&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=152&planilla_resumen_id=95935&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=11&planilla_resumen_id=95936&tipo=Descuento&afeca_ss=False&descripcion=Seguro Móvil&monto=25.00&debe=0.00&haber=25.00&identificar=-&cabecera_in=578|||?idx=1&id_c=6&planilla_resumen_id=95936&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=167&planilla_resumen_id=95936&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=7&planilla_resumen_id=95937&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1500.00&debe=1500.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=166&planilla_resumen_id=95937&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=3&planilla_resumen_id=95938&tipo=Seguro Social&afeca_ss=True&descripcion=Seguro Social Empleado&monto=48.30&debe=0.00&haber=48.30&identificar=-&cabecera_in=578|||?idx=1&id_c=5&planilla_resumen_id=95938&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1000.00&debe=1000.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=168&planilla_resumen_id=95938&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=83.33&debe=83.33&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=4&planilla_resumen_id=95939&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=169&planilla_resumen_id=95939&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=12&planilla_resumen_id=95940&tipo=Descuento&afeca_ss=False&descripcion=Seguro Móvil&monto=25.00&debe=0.00&haber=25.00&identificar=-&cabecera_in=578|||?idx=1&id_c=8&planilla_resumen_id=95940&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=3477.50&debe=3477.50&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=165&planilla_resumen_id=95940&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=9&planilla_resumen_id=95941&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1775.00&debe=1775.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=164&planilla_resumen_id=95941&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=10&planilla_resumen_id=95942&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1775.00&debe=1775.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=163&planilla_resumen_id=95942&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=11&planilla_resumen_id=95943&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=162&planilla_resumen_id=95943&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=12&planilla_resumen_id=95944&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=5875.00&debe=5875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=161&planilla_resumen_id=95944&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=13&planilla_resumen_id=95945&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=160&planilla_resumen_id=95945&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=14&planilla_resumen_id=95946&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=159&planilla_resumen_id=95946&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=15&planilla_resumen_id=95947&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=158&planilla_resumen_id=95947&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=16&planilla_resumen_id=95948&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=157&planilla_resumen_id=95948&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=17&planilla_resumen_id=95949&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=91.41&debe=91.41&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=156&planilla_resumen_id=95949&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=8.33&debe=8.33&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=18&planilla_resumen_id=95950&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=155&planilla_resumen_id=95950&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=19&planilla_resumen_id=95951&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=154&planilla_resumen_id=95951&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=36&planilla_resumen_id=95952&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=137&planilla_resumen_id=95952&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=37&planilla_resumen_id=95953&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=136&planilla_resumen_id=95953&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=38&planilla_resumen_id=95954&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=135&planilla_resumen_id=95954&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=39&planilla_resumen_id=95955&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=134&planilla_resumen_id=95955&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=40&planilla_resumen_id=95956&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=133&planilla_resumen_id=95956&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=41&planilla_resumen_id=95957&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=132&planilla_resumen_id=95957&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=42&planilla_resumen_id=95958&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=131&planilla_resumen_id=95958&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=43&planilla_resumen_id=95959&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=130&planilla_resumen_id=95959&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=44&planilla_resumen_id=95960&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=129&planilla_resumen_id=95960&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=45&planilla_resumen_id=95961&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=128&planilla_resumen_id=95961&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=46&planilla_resumen_id=95962&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=127&planilla_resumen_id=95962&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=47&planilla_resumen_id=95963&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=126&planilla_resumen_id=95963&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=48&planilla_resumen_id=95964&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=125&planilla_resumen_id=95964&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=49&planilla_resumen_id=95965&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=124&planilla_resumen_id=95965&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=50&planilla_resumen_id=95966&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=123&planilla_resumen_id=95966&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=51&planilla_resumen_id=95967&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=122&planilla_resumen_id=95967&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=52&planilla_resumen_id=95968&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=121&planilla_resumen_id=95968&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=53&planilla_resumen_id=95969&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=120&planilla_resumen_id=95969&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=54&planilla_resumen_id=95970&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=119&planilla_resumen_id=95970&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=55&planilla_resumen_id=95971&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1875.00&debe=1875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=118&planilla_resumen_id=95971&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=56&planilla_resumen_id=95972&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2875.00&debe=2875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=117&planilla_resumen_id=95972&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=57&planilla_resumen_id=95973&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2875.00&debe=2875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=116&planilla_resumen_id=95973&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=58&planilla_resumen_id=95974&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=115&planilla_resumen_id=95974&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=59&planilla_resumen_id=95975&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2250.00&debe=2250.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=114&planilla_resumen_id=95975&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=60&planilla_resumen_id=95976&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=2000.00&debe=2000.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=113&planilla_resumen_id=95976&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=61&planilla_resumen_id=95977&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1875.00&debe=1875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=112&planilla_resumen_id=95977&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=62&planilla_resumen_id=95978&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=111&planilla_resumen_id=95978&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=63&planilla_resumen_id=95979&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1875.00&debe=1875.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=110&planilla_resumen_id=95979&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=64&planilla_resumen_id=95980&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=109&planilla_resumen_id=95980&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=65&planilla_resumen_id=95981&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=108&planilla_resumen_id=95981&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=66&planilla_resumen_id=95982&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=107&planilla_resumen_id=95982&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=67&planilla_resumen_id=95983&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=106&planilla_resumen_id=95983&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=68&planilla_resumen_id=95984&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=105&planilla_resumen_id=95984&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=69&planilla_resumen_id=95985&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=104&planilla_resumen_id=95985&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=70&planilla_resumen_id=95986&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=103&planilla_resumen_id=95986&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=71&planilla_resumen_id=95987&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=102&planilla_resumen_id=95987&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=72&planilla_resumen_id=95988&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=101&planilla_resumen_id=95988&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=73&planilla_resumen_id=95989&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1571.61&debe=1571.61&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=100&planilla_resumen_id=95989&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=74&planilla_resumen_id=95990&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=99&planilla_resumen_id=95990&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=75&planilla_resumen_id=95991&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1375.00&debe=1375.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=98&planilla_resumen_id=95991&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=76&planilla_resumen_id=95992&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=97&planilla_resumen_id=95992&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=77&planilla_resumen_id=95993&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=96&planilla_resumen_id=95993&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=78&planilla_resumen_id=95994&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=95&planilla_resumen_id=95994&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=79&planilla_resumen_id=95995&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=94&planilla_resumen_id=95995&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=80&planilla_resumen_id=95996&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=93&planilla_resumen_id=95996&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=81&planilla_resumen_id=95997&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=92&planilla_resumen_id=95997&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=82&planilla_resumen_id=95998&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1625.00&debe=1625.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=91&planilla_resumen_id=95998&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=83&planilla_resumen_id=95999&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=90&planilla_resumen_id=95999&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=84&planilla_resumen_id=96000&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=89&planilla_resumen_id=96000&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=85&planilla_resumen_id=96001&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=88&planilla_resumen_id=96001&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578|||?idx=1&id_c=86&planilla_resumen_id=96002&tipo=Sueldo&afeca_ss=True&descripcion=Sueldo Ordinario&monto=1371.19&debe=1371.19&haber=0.00&identificar=+&cabecera_in=578?idx=1&id_c=87&planilla_resumen_id=96002&tipo=Bonificacion&afeca_ss=False&descripcion=Bonificacion Decreto&monto=125.00&debe=125.00&haber=0.00&identificar=+&cabecera_in=578";
        $data = str_replace("?", "", $data);
        $array = explode("|||", $data);
        $LISTADO = NULL;
        foreach ($array as $lista) {
            $detalle = explode("&", $lista);
            foreach ($detalle as $linea) {
                $linea = trim($linea);
                $datos = explode("=", $linea);
                $campo = $datos[0];
                $valor = $datos[1];
                $DAT[$campo] = $valor;
            }
            $LISTADO[] = $DAT;
        }
        foreach ($LISTADO as $DataQ) {

//        $id_c = $request->getParameter('id_c');
//        $planilla_resumen_id = $request->getParameter('planilla_resumen_id');
//        $tipo = $request->getParameter('tipo');
//        $afeca_ss = $request->getParameter('afeca_ss');
//        $descripcion = trim($request->getParameter('descripcion'));
//        $monto = $request->getParameter('monto');
//        $debe = $request->getParameter('debe');
//        $haber = $request->getParameter('haber');
//        $identificar = $request->getParameter('identificar');
//        $cabecera_in = $request->getParameter('cabecera_in');
            $id_c = $DataQ['id_c'];
            $planilla_resumen_id = $DataQ['planilla_resumen_id'];
            $tipo = $DataQ['tipo'];
            $afeca_ss = $DataQ['afeca_ss'];
            $descripcion = trim($DataQ['descripcion']);
            $monto = $DataQ['monto'];
            $debe = $DataQ['debe'];
            $haber = $DataQ['haber'];
            $identificar = $DataQ['identificar'];
            $cabecera_in = $DataQ['cabecera_in'];

            $planillaDeta = ReciboDetalleQuery::create()
                    ->filterByCabeceraIn($cabecera_in)
                    ->filterByIdC($id_c)
                    ->filterByDescripcion($descripcion)
                    ->filterByPlanillaResumenId($planilla_resumen_id)
                    ->findOne();
//                ->findOneByIdC($id_c);
            if (!$planillaDeta) {
                $planillaDeta = new ReciboDetalle();
                $planillaDeta->setIdC($id_c);
                $planillaDeta->setCabeceraIn($cabecera_in);
                $planillaDeta->setPlanillaResumenId($planilla_resumen_id);
                $planillaDeta->save();
            }

            $planillaDeta->setTipo($tipo);
            $planillaDeta->setAfecaSs($afeca_ss);
            $planillaDeta->setDescripcion($descripcion);
            $planillaDeta->setMonto($monto);
            $planillaDeta->setDebe($debe);
            $planillaDeta->setHaber($haber);
            $planillaDeta->setIdentificar($identificar);
            $planillaDeta->save();
        }
        $resultado['detalle'] = 'ok';
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeDetalle(sfWebRequest $request) {
        $id_c = $request->getParameter('id_c');
        $planilla_resumen_id = $request->getParameter('planilla_resumen_id');
        $tipo = $request->getParameter('tipo');
        $afeca_ss = $request->getParameter('afeca_ss');
        $descripcion = trim($request->getParameter('descripcion'));
        $monto = $request->getParameter('monto');
        $debe = $request->getParameter('debe');
        $haber = $request->getParameter('haber');
        $identificar = $request->getParameter('identificar');
        $cabecera_in = $request->getParameter('cabecera_in');

        $planillaDeta = ReciboDetalleQuery::create()
                ->filterByCabeceraIn($cabecera_in)
                ->filterByIdC($id_c)
                ->filterByDescripcion($descripcion)
                ->filterByPlanillaResumenId($planilla_resumen_id)
                ->findOne();
//                ->findOneByIdC($id_c);
        if (!$planillaDeta) {
            $planillaDeta = new ReciboDetalle();
            $planillaDeta->setIdC($id_c);
            $planillaDeta->setCabeceraIn($cabecera_in);
            $planillaDeta->setPlanillaResumenId($planilla_resumen_id);
            $planillaDeta->save();
        }

        $planillaDeta->setTipo($tipo);
        $planillaDeta->setAfecaSs($afeca_ss);
        $planillaDeta->setDescripcion($descripcion);
        $planillaDeta->setMonto($monto);
        $planillaDeta->setDebe($debe);
        $planillaDeta->setHaber($haber);
        $planillaDeta->setIdentificar($identificar);
        $planillaDeta->save();
        $resultado['detalle'] = 'ok';
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeCabecera(sfWebRequest $request) {
        $planilla = $request->getParameter('planilla');
        $inicio = $request->getParameter('inicio');
        $fin = $request->getParameter('fin');
        $proyecto = $request->getParameter('proyecto');
        $empresa = $request->getParameter('empresa');
        $razon_social = $request->getParameter('razon_social');
        $direccion = $request->getParameter('direccion');
        $email = $request->getParameter('email');
        $telefono = $request->getParameter('telefono');
        $nombre_comercial = $request->getParameter('nombre_comercial');
        $texto = $request->getParameter('texto');
        $cabecera_in = $request->getParameter('cabecera_in');
        $ReSum = ReciboCabeceraQuery::create()
                ->filterByCabeceraIn($cabecera_in)
                ->findOne();
        if (!$ReSum) {
            $ReSum = new ReciboCabecera();
            $ReSum->setCabeceraIn($cabecera_in);
        }
        $ReSum->setPlanilla($planilla);
        $ReSum->setFin($fin);
        $ReSum->setInicio($inicio);
        $ReSum->setProyecto($proyecto);
        $ReSum->setEmpresa($empresa);
        $ReSum->setRazonSocial($razon_social);
        $ReSum->setDireccion($direccion);
        $ReSum->setEmail($email);
        $ReSum->setTelefono($telefono);
        $ReSum->setNombreComercial($nombre_comercial);
        $ReSum->setTexto($texto);
        $ReSum->save();
        $resultado['detalle'] = 'ok';
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeOkAusencia(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $estado = 'AutorizadoRH';
        if ($request->getParameter('estado')) {
            $estado = $request->getParameter('estado');
        }
        $ausencia = SolicitudAusenciaQuery::create()->findOneById($id);
        $ausencia->setEstado($estado);
        $ausencia->save();
        die();
    }

    public function executeAusencia(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $ausencia = SolicitudAusenciaQuery::create()
                ->filterByEstado('Autorizado')
                ->findOne();
        $resultado['LINEA'] = 0;
        $lista = null;
        if ($ausencia) {
            $linea['ID'] = $ausencia->getId();
            $linea['IDACTUA'] = $ausencia->getId();
            $linea['EMPLEADO'] = ParametroQuery::limpiezaCaracter($ausencia->getUsuario()->getCodigo());
            $linea['FECHA'] = $ausencia->getFecha('Ymd');
            $linea['MOTIVO'] = ParametroQuery::limpiezaCaracter($ausencia->getMotivo());
            $linea['OBSERVACIONES'] = ParametroQuery::limpiezaCaracter($ausencia->getObservaciones());
            $resultado['RESULTADO'][] = $linea;
            $resultado['LINEA'] = 1;

            if ($id == 1) {
                echo "<pre>";
                print_r($resultado);
                die();
            }
        }
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeOkVacacion(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $estado = 'EnviadoRH';
        if ($request->getParameter('estado')) {
            $estado = $request->getParameter('estado') . "RH";
        }

        $ausencia = SolicitudVacacionQuery::create()->findOneById($id);
        if ($ausencia) {
            $ausencia->setEstado($estado);
            $ausencia->save();
        }
        die();
    }

    public function executeVacacion(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $vacacion = SolicitudVacacionQuery::create()
                ->filterByEstado('Autorizado')
                ->findOne();
        $resultado['LINEA'] = 0;
        $lista = null;
        if ($vacacion) {
            $linea['ID'] = $vacacion->getId();
            $linea['IDACTUA'] = $vacacion->getId();
            $linea['EMPLEADO'] = ParametroQuery::limpiezaCaracter($vacacion->getUsuario()->getCodigo());
            $UsuAuto = UsuarioQuery::create()->findOneById($vacacion->getUsuarioModero());
            $linea['AUTORIZO'] = $UsuAuto->getCodigo();

            $linea['FECHA_INICIO'] = $vacacion->getFechaInicio('Ymd');
            $linea['FECHA_FIN'] = $vacacion->getFechaFin('Ymd');
            $linea['DIA'] = $vacacion->getDia();
            $linea['MOTIVO'] = ParametroQuery::limpiezaCaracter($vacacion->getMotivo());
            $linea['OBSERVACIONES'] = ParametroQuery::limpiezaCaracter($vacacion->getObservaciones());
            $linea['COMENTARIO_APROBO'] = ParametroQuery::limpiezaCaracter($vacacion->getComentarioModero());
            //  $linea['JEFE'] = ParametroQuery::limpiezaCaracter($vacacion->getJefe());

            $resultado['RESULTADO'][] = $linea;
            $resultado['LINEA'] = 1;

            if ($id == 1) {
                echo "<pre>";
                print_r($resultado);
                die();
            }
        }
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeOkFiniquito(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $estado = 'EnviadoRH';
        if ($request->getParameter('estado')) {
            $estado = $request->getParameter('estado') . "RH";
        }
        $ausencia = SolicitudFinquitoQuery::create()->findOneById($id);
        if ($ausencia) {
            $ausencia->setEstado($estado);
            $ausencia->save();
        }
        die();
    }

    public function executeFiniquito(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $solicitud = SolicitudFinquitoQuery::create()
                ->filterByEstado('Pendiente')
                ->findOne();
        $resultado['LINEA'] = 0;
        $lista = null;
        $lista = null;
        if ($solicitud) {
            $usuarioRetiro = UsuarioQuery::create()->findOneById($solicitud->getUsuarioRetiro());
            $usuarioSoli = UsuarioQuery::create()->findOneById($solicitud->getUsuarioGraba());
            $linea['ID'] = $solicitud->getId();
            $linea['IDACTUA'] = $solicitud->getId();
            $linea['AUTORIZO'] = ParametroQuery::limpiezaCaracter($usuarioRetiro->getCodigo());
            $linea['EMPLEADO'] = ParametroQuery::limpiezaCaracter($usuarioSoli->getCodigo());
            $linea['FECHA_RETIRO'] = $solicitud->getFechaRetiro('Ymd');
            $linea['MOTIVO'] = ParametroQuery::limpiezaCaracter($solicitud->getMotivo());
            $linea['OBSERVACIONES'] = ParametroQuery::limpiezaCaracter($solicitud->getObservaciones());
            $linea['JEFE'] = ParametroQuery::limpiezaCaracter($solicitud->getJefe());

            $resultado['RESULTADO'][] = $linea;
            $resultado['LINEA'] = 1;
            $data_json = json_encode($resultado);
            if ($id == 1) {
                echo "<pre>";
                print_r($resultado);
                die();
            }
        }
        return $this->renderText($data_json);
    }

    public function executeUsuario(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $actualizaFoto = $request->getParameter('actualiaFoto');
        $usuario = $request->getParameter('usuario');
        $correo = $request->getParameter('correo');
        $logo = $request->getParameter('logo');
        $codigo = $request->getParameter('codigo');
        $urlLogo = '';
        if ($logo) {
            $extension = 'jpg';
            $exitePng = explode("PNG", strtoupper($logo));
            if ($exitePng > 1) {
                $extension = 'png';
            }
            $codigoL = trim($codigo);
            $codigoL = str_replace("-", "", $codigoL);
            $filename = $codigoL . '.' . $extension;
            $urlLogo = ParametroQuery::convierteImagen($logo, $filename);
        }
        $genero = $request->getParameter('genero');
        $clave = $request->getParameter('clave');
        $fecha_nacimiento = $request->getParameter('fecha_nacimiento');
        $empresa = $request->getParameter('empresa');
        $tipo_usuario = $request->getParameter('tipo_usuario');
        $primer_nombre = $request->getParameter('primer_nombre');
        $segundo_nombre = $request->getParameter('segundo_nombre');
        $primer_apellido = $request->getParameter('primer_apellido');
        $segundo_apellido = $request->getParameter('segundo_apellido');
        $puesto = $request->getParameter('puesto');
        $departamento = $request->getParameter('departamento');
        $jefe = $request->getParameter('jefe');
        $fecha_alta = $request->getParameter('fecha_alta');
        $sueldo = $request->getParameter('sueldo');

        $mensaje = 'Codigo No enviado';
        if ($codigo) {
            $usuarioQ = UsuarioQuery::create()->findOneByUsuario($usuario);
            if (!$usuarioQ) {
                $mensaje = "Creado";
                $usuarioQ = new Usuario();
                $usuarioQ->setActivo(true);
                $usuarioQ->setClave($clave);
            }
            $mensaje = 'Actualizado';
            $usuarioQ->setUsuario($usuario);
            $usuarioQ->setCodigo($codigo);
            $usuarioQ->setCorreo($correo);
            $usuarioQ->setGenero($genero);
            $usuarioQ->setFechaNacimiento($fecha_nacimiento);
            $usuarioQ->setTipoUsuario($tipo_usuario);
            $usuarioQ->setPrimerNombre($primer_nombre);
            $usuarioQ->setPrimerApellido($primer_apellido);
            $usuarioQ->setSegundoNombre($segundo_nombre);
            $usuarioQ->setSegundoApellido($segundo_apellido);
            $usuarioQ->setPuesto($puesto);
            $usuarioQ->setDepartamento($departamento);
            $usuarioQ->setJefe($jefe);
            $usuarioQ->setFechaAlta($fecha_alta);
            $usuarioQ->setSueldo($sueldo);
            $usuarioQ->setEmpresa($empresa);
            $usuarioQ->setLogo($urlLogo);
            $usuarioQ->save();
//            $usuarioQ->setLogo($v)
        }
        //$linea = null;
        $linea['ID'] = 1;
        $linea['IDACTUA'] = 1;
        $linea['enviado'] = 1;
        $linea['codigo'] = $codigo;
        $linea['mensaje'] = $mensaje;
        $resultado['LINEA'] = 1;
        $resultado['RESULTADO'][] = $linea;
        $resultado['LINEA'] = 1;
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

}
