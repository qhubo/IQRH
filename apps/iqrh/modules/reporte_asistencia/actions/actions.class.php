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
       public function executeTest(sfWebRequest $request) {
           
       }
    public function executeIndex(sfWebRequest $request) {
        
//        $página_inicio = file_get_contents('http://iqrh:8080/grafica.php');
//echo $página_inicio;
//die();
//        
//             $ch = curl_init();
//                curl_setopt($ch, CURLOPT_URL, "http://iqrh:8080/grafica.php");
//                curl_setopt($ch, CURLOPT_POST, TRUE);
//        //        curl_setopt($ch, CURLOPT_POSTFIELDS, $porst);
//                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                $remote_server_output = curl_exec($ch);
//                curl_close($ch);
//        echo "actua";
//        die();
                
        AsistenciaUsuarioQuery::procesa();
//        die();
        
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
        $this->form = new ConsultaAsistenciaForm($valores);
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
            }
        }
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
        $this->inicio =$fechaInicio;
        $this->fin=$fechaFin;
        
        $this->Listado = UsuarioQuery::create()
               ->filterByUsuario('Demo', Criteria::NOT_IN)
                ->orderByPrimerApellido("Desc")
                   ->filterByEmpresa('PCR GUATEMALA')
                ->find();

//        $html = $this->getPartial('reporte/asistencia', array("muestra" => 0, 'Listado' => $Listado,
//            'inicio'=>$inicio, 'fin'=>$fin, 'horamensual'=>$horaMensual,
//            'mes' => $mesDescripcion
//        ));
        
        
        
    }

}
