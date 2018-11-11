<?php

class CargaImagenForm extends sfForm {
    public function configure() {
        
        $this->setWidget(
                "archivo", new sfWidgetFormInputFile(array(), array(
            "class" => "file-upload btn btn-file-upload",
        )));
        $this->setValidator('archivo', 
                 new sfValidatorFile(array(
			'required'   => false,
			'path'       => sfConfig::get('sf_upload_dir').'/empresas',
			'mime_types' => 'web_images',
			)));
                
        $this->widgetSchema->setNameFormat('consulta[%s]');
    }
}