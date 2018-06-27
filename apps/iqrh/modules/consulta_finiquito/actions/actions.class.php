<?php

/**
 * consulta_finiquito actions.
 *
 * @package    plan
 * @subpackage consulta_finiquito
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class consulta_finiquitoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
      $this->registros = SolicitudFinquitoQuery::create()->find();
  }
}
