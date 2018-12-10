<?php

/**
 * reporte_recibo actions.
 *
 * @package    plan
 * @subpackage reporte_recibo
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reporte_reciboActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
     
        $usuario = UsuarioQuery::create()->findOneById($usuarioId);
        $codigo = $usuario->getCodigo();
        $nombreUsu = $usuario->getUsuario();
        
        if (strtoupper(trim($nombreUsu)) <>'DEMO') {
        $this->encabezados = ReciboEncabezadoQuery::create()
                ->filterByCodigo($codigo)
                ->orderByCabeceraIn("Desc")
                ->find();
        } else {
        $this->encabezados = ReciboEncabezadoQuery::create()
                ->orderByCabeceraIn("Desc")
                ->find();
            
        }
    }

}
