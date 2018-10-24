<?php

/**
 * reporte_asistencia actions.
 *
 * @package    plan
 * @subpackage reporte_asistencia
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reporte_asistenciaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
     $this->empresaseleccion = $request->getParameter('em');
        $empresaseleccion= $this->empresaseleccion;
        sfContext::getInstance()->getUser()->setAttribute('seleccion', $empresaseleccion, 'empresa');        
        $this->empresas = UsuarioQuery::create()
                ->filterByEmpresa('', Criteria::NOT_EQUAL)
                ->orderByEmpresa()
                ->groupByEmpresa()
                ->find();

        
        $this->asistencias = AsistenciaUsuarioQuery::create()
                ->orderByDia('Desc')
                //->filterByEmpresa($empresaseleccion)
               ->groupByUsuario()
                ->groupByDia()
                ->find();
  $this->form = new ConsultaAsistenciaForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
            }
        }
       
        
        
  }
}
