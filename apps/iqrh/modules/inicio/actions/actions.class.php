<?php

/**
 * inicio actions.
 *
 * @package    plan
 * @subpackage inicio
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inicioActions extends sfActions {

        
    public function executeNota(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $bitacora= BitacoraCampanaQuery::create()->findOneById($id);
        $bitacora->setRevisado(true);
        $bitacora->save();
        die("acta");
        
    }
        

     public function executeNotifica(sfWebRequest $request) {
        $usuario_id = $this->getUser()->getAttribute('usuario', null, 'seguridad');
        
     }
     public function executeCambioClave(sfWebRequest $request) {
        $usuario_id = $this->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->usuariodescripcion = UsuarioQuery::create()->findOneById($usuario_id);
        $this->form = new cambioClaveForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('consulta'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                if ($valores['nueva'] <> $valores['verifica']) {
                    $this->getUser()->setFlash('error', 'Las claves no conciden');
                    $this->redirect("inicio/cambioClave");
                }
                $Usuario = UsuarioQuery::create()->findOneById($usuario_id);
                $Usuario->setClave(sha1($valores['nueva']));
                $Usuario->save();
                $this->getUser()->setFlash('exito', 'Cambio de Clave Efectuado Exitosamente');
                $this->redirect("inicio/index");
            }
        }
    }

      public function executeCambio(sfWebRequest $request) {
        $this->id = $request->getParameter("id");
        $variable = $request->getParameter("id");
        sfContext::getInstance()->getUser()->setAttribute('valor', $variable, 'busca');
        die();
    }

    
    
    public function executeCorreo(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $UsuarioQuer = UsuarioQuery::create()->findOneById($usuarioId);
        $UsuarioQuer->setCorreo($id);
        $UsuarioQuer->save();
        
    }

    public function executeNombre(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $UsuarioQuer = UsuarioQuery::create()->findOneById($usuarioId);
        $UsuarioQuer->setNombreCompleto($id);
        $UsuarioQuer->save();
        
    }

    public function executeIndex(sfWebRequest $request) {
       
    }

    public function executeImagen(sfWebRequest $request) {
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $UsuarioQuer = UsuarioQuery::create()->findOneById($usuarioId);
        $this->UsuarioQuer = $UsuarioQuer;
        $carpetaArchivos = sfConfig::get('sf_upload_dir'); // $ParametroConexion['ruta']; 
        $this->form = new CargaImagenForm();
        $this->id = $request->getParameter('id');
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter("consulta"), $request->getFiles("consulta"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                if ($valores["archivo"]) {
                    $archivo = $valores["archivo"];
                    $nombre = $archivo->getOriginalName();
                    $nombre = str_replace(" ", "_", $nombre);
                    $nombre = str_replace(".", "", $nombre);
                    $filename = $usuarioId . "_" . $nombre . $archivo->getExtension($archivo->getOriginalExtension());
                    $archivo->save(sfConfig::get("sf_upload_dir") . DIRECTORY_SEPARATOR . 'empresas' . DIRECTORY_SEPARATOR . $filename);
                    $archivo->save($carpetaArchivos . 'empresas' . DIRECTORY_SEPARATOR . $filename);
                    sfContext::getInstance()->getUser()->setAttribute('usuario', $filename, 'imagen');
                    $UsuarioQuer->setImagen($filename);
                    $UsuarioQuer->setLogo($filename);
                    $UsuarioQuer->save();
                    $this->getUser()->setFlash('exito', ' Foto perfil actualizada con exito  ');
                    $this->redirect('inicio/index');
                }
            }
        }
    }

}
