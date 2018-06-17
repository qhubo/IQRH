<?php

/**
 * ausencia actions.
 *
 * @package    plan
 * @subpackage ausencia
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ausenciaActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
   $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
$this->usuario = UsuarioQuery::create()->findOneById($usuarioId);
        $this->form = new IngresoAusenciaForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
            }
        }
    }

}
