<?php
class BusquedaUsuarioForm extends sfForm {
    public function configure() {

 
        $this->setWidget('nombre', new sfWidgetFormInputText(array(), array('class' => 'form-control',
            "placeholder" => "Texto Busqueda",
        )));
        $this->setValidator('nombre', new sfValidatorString(array('required' => false)));
             $empresas = UsuarioQuery::create()
                ->filterByActivo(true)
                ->filterByEmpresa('', Criteria::NOT_EQUAL)
                ->orderByEmpresa()
                ->groupByEmpresa()
                ->find();
        $tipo['null']='Todos los usuarios';
        foreach ($empresas as $lista) {
            $tipo[$lista->getEmpresa()]=$lista->getEmpresa(); 
        }
        $this->setWidget('empresa', new sfWidgetFormChoice(array(
            "choices" => $tipo,
                ), array("class" => "form-control")));
        $this->setValidator('empresa', new sfValidatorString(array('required' =>false)));
  
   
        $this->widgetSchema->setNameFormat('consulta[%s]');
    }
}