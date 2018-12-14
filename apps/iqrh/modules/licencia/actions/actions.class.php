<?php

/**
 * licencia actions.
 *
 * @package    plan
 * @subpackage licencia
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class licenciaActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeFirma(sfWebRequest $request) {
        $mac = $request->getParameter('mac');
        $returna = 0;

        if ($mac) {
            $empresa = $request->getParameter('empresa');
            $licnecia = LicenciamientoQuery::create()
                    ->findOneByMac($mac);
            if (!$licnecia) {
                $licnecia = new Licenciamiento();
                $licnecia->setMac($mac);
                $licnecia->setEmpresa($empresa);
                $licnecia->save();
            }
            $activo = $licnecia->getActivo();
            if ($activo) {
                $returna = 1;
            }
        }
        echo $returna;
        die();
    }

}
