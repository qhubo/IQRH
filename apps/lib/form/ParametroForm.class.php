<?php

/**
 * Parametro form.
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
class ParametroForm extends BaseParametroForm
{
  public function configure()
  {
            $this->setWidget('logo', new sfWidgetFormInputFile());
        $this->validatorSchema['logo'] = new sfValidatorFile(array(
            'required' => false,
            'path' => sfConfig::get('sf_upload_dir') . '/segmento',
            'mime_types' => 'web_images',
        ));
        
  }
}
