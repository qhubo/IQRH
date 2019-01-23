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

    public function executeBitacora(sfWebRequest $request) {
        $usuarioId = $this->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->bitacoras = BitacoraUsuarioQuery::create()
                ->filterByUsuarioJefe($usuarioId)
                ->find();
    }

    public function executeAutorizado(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $usuarioId = $this->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->ausencia = SolicitudAusenciaQuery::create()->findOneById($id);
        //$this->bitacora = BitacoraUsuarioQuery::create()->findOneById($id);
        //$bitacora = BitacoraUsuarioQuery::create()->findOneById($id);       
        $this->id = $id;
        $this->form = new IngresaCampForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('consulta'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $motivo = $valores['motivo'];
                $ausencia = SolicitudAusenciaQuery::create()->findOneById($id);
                $ausencia->setUsuarioModero($usuarioId);
                $ausencia->setEstado('Autorizado');
                $ausencia->setComentarioModero($motivo);
                $ausencia->save();
                $bitacora = New BitacoraUsuario();
                $bitacora->setFecha(date('Y-m-d H:i'));
                $bitacora->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'));
                $bitacora->setTipo('Ausencia');
                $bitacora->setIdentificador($ausencia->getId());
                $bitacora->setUsuarioJefe($ausencia->getUsuarioId());
                $bitacora->setMotivo('Autorizado: ' . $valores['observaciones']);
                $bitacora->save();
                $this->getUser()->setFlash('exito', 'Ausencia Autorizada con exito');
                $this->redirect("inicio/notifica");
            }
        }
    }

    public function executeRechazo(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $usuarioId = $this->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->ausencia = SolicitudAusenciaQuery::create()->findOneById($id);
        // $this->bitacora = BitacoraUsuarioQuery::create()->findOneById($id);
        $this->id = $id;
        $this->form = new IngresaCampForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('consulta'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $motivo = $valores['motivo'];
                $ausencia = SolicitudAusenciaQuery::create()->findOneById($id);
                $ausencia->setUsuarioModero($usuarioId);
                $ausencia->setEstado('Rechazado');
                $ausencia->setComentarioModero($motivo);
                $ausencia->save();
                $bitacora = New BitacoraUsuario();
                $bitacora->setFecha(date('Y-m-d H:i'));
                $bitacora->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'));
                $bitacora->setTipo('Ausencia');
                $bitacora->setIdentificador($ausencia->getId());
                $bitacora->setUsuarioJefe($ausencia->getUsuarioId());
                $bitacora->setMotivo('Rechazado: ' . $valores['observaciones']);
                $bitacora->save();
                $this->getUser()->setFlash('error', 'Ausencia Rechazada con exito');
                $this->redirect("inicio/notifica");
            }
        }
    }

    public function executeAutorizadov(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $usuarioId = $this->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->vacacion = SolicitudVacacionQuery::create()->findOneById($id);
        //$this->bitacora = BitacoraUsuarioQuery::create()->findOneById($id);
        //$bitacora = BitacoraUsuarioQuery::create()->findOneById($id);       
        $this->id = $id;
        $this->form = new IngresaCampForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('consulta'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $motivo = $valores['motivo'];
                $ausencia = SolicitudVacacionQuery::create()->findOneById($id);
                $ausencia->setUsuarioModero($usuarioId);
                $ausencia->setEstado('Autorizado');
                $ausencia->setComentarioModero($motivo);
                $ausencia->save();
                $bitacora = New BitacoraUsuario();
                $bitacora->setFecha(date('Y-m-d H:i'));
                $bitacora->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'));
                $bitacora->setTipo('Vacacion');
                $bitacora->setIdentificador($ausencia->getId());
                $bitacora->setUsuarioJefe($ausencia->getUsuarioId());
                $bitacora->setMotivo('Autorizado: ' . $valores['observaciones']);
                $bitacora->save();
                $this->getUser()->setFlash('exito', 'Vacaciones Autorizada con exito');
                $this->redirect("inicio/notifica");
            }
        }
    }

    public function executeRechazov(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $usuarioId = $this->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->vacacion = SolicitudVacacionQuery::create()->findOneById($id);
        // $this->bitacora = BitacoraUsuarioQuery::create()->findOneById($id);
        $this->id = $id;
        $this->form = new IngresaCampForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('consulta'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $motivo = $valores['motivo'];
                $ausencia = SolicitudVacacionQuery::create()->findOneById($id);
                $ausencia->setUsuarioModero($usuarioId);
                $ausencia->setEstado('Autorizado');
                $ausencia->setComentarioModero($motivo);
                $ausencia->save();
                $bitacora = New BitacoraUsuario();
                $bitacora->setFecha(date('Y-m-d H:i'));
                $bitacora->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'));
                $bitacora->setTipo('Vacacion');
                $bitacora->setIdentificador($ausencia->getId());
                $bitacora->setUsuarioJefe($ausencia->getUsuarioId());
                $bitacora->setMotivo('Rechazado: ' . $valores['observaciones']);
                $bitacora->save();

                $this->getUser()->setFlash('error', 'Vacaciones rechazada con exito');
                $this->redirect("inicio/notifica");
            }
        }
    }

    public function executeNota(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $usuarioId = $this->getUser()->getAttribute('usuario', null, 'seguridad');

        $bitacora = BitacoraUsuarioQuery::create()->findOneById($id);
        $bitacora->setLeido(true);
        $bitacora->save();

        $bitacoras = BitacoraUsuarioQuery::create()->filterByUsuarioJefe($usuarioId)->filterByLeido(false)->find();
        $cantida = count($bitacoras);

        echo $cantida;
        die();
    }

    public function executeNotifica(sfWebRequest $request) {
        $usuarioId = $this->getUser()->getAttribute('usuario', null, 'seguridad');
        $bitacoras = BitacoraUsuarioQuery::create()->filterByUsuarioJefe($usuarioId)
                //->filterByLeido(false)
                ->find();
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');


        $usuarios = UsuarioQuery::create()
                ->filterByUsuarioJefe($usuarioId)
                ->find();

        $empleado[] = -99;
        foreach ($usuarios as $lista) {
            $empleado[] = $lista->getId();
        }

        $this->vacaciones = SolicitudVacacionQuery::create()
                ->filterByEstado('Pendiente')
                ->filterByUsuarioId($empleado, Criteria::IN)
                ->find();
        $this->ausencias = SolicitudAusenciaQuery::create()
                ->filterByEstado('Pendiente')
                ->filterByUsuarioId($empleado, Criteria::IN)
                ->find();

        $this->solicitudes = SolicitudUsuarioQuery::create()
                ->filterByEstado('Pendiente')
 //               ->filterByUsuarioId($empleado, Criteria::IN)
                ->find();

        
        
        
        $this->bitacoras = $bitacoras;
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
        $usuario_id = $this->getUser()->getAttribute('usuario', null, 'seguridad');
        $usuarioQ = UsuarioQuery::create()->findOneById($usuario_id);
        $this->usuario = UsuarioQuery::create()->findOneById($usuario_id);
        $this->empleados = UsuarioQuery::create()->filterByUsuarioJefe($usuario_id)->find();
        $this->vacaciones =UsuarioVacacionQuery::periodos($usuarioQ->getCodigo());
        $totalderecho=0;
        $totalpagado=0;
        foreach ($this->vacaciones as $reg) {
            $totalderecho =$totalderecho+$reg['derecho'];
            $totalpagado = $totalpagado+$reg['pagada'];
        }
        $this->pendientes = $totalderecho-$totalpagado;
       
    
        sfContext::getInstance()->getUser()->setAttribute('usuario','Empleado', 'tipo');
        sfContext::getInstance()->getUser()->setAttribute('usuario','Supervisor', 'tipo');

          
        AsistenciaUsuarioQuery::procesa();
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
                    //$UsuarioQuer->setLogo($filename);
                    $UsuarioQuer->save();
                    $this->getUser()->setFlash('exito', ' Foto perfil actualizada con exito  ');
                    $this->redirect('inicio/index');
                }
            }
        }
    }

    
        public function executeAutorizadoS(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $usuarioId = $this->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->ausencia = SolicitudUsuarioQuery::create()->findOneById($id);
        //$this->bitacora = BitacoraUsuarioQuery::create()->findOneById($id);
        //$bitacora = BitacoraUsuarioQuery::create()->findOneById($id);       
        $this->id = $id;
        $this->form = new IngresaCampForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('consulta'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $motivo = $valores['motivo'];
                $ausencia = SolicitudUsuarioQuery::create()->findOneById($id);
                $ausencia->setUsuarioModero($usuarioId);
                $ausencia->setEstado('Autorizado');
                $ausencia->setComentarioModero($motivo);
                $ausencia->save();
                $bitacora = New BitacoraUsuario();
                $bitacora->setFecha(date('Y-m-d H:i'));
                $bitacora->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'));
                $bitacora->setTipo('Solicitud');
                $bitacora->setIdentificador($ausencia->getId());
                $bitacora->setUsuarioJefe($ausencia->getUsuarioId());
                $bitacora->setMotivo('Autorizado: ' . $valores['observaciones']);
                $bitacora->save();
                $this->getUser()->setFlash('exito', 'Ausencia Autorizada con exito');
                $this->redirect("inicio/notifica");
            }
        }
    }

    public function executeRechazoS(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $usuarioId = $this->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->ausencia = SolicitudUsuarioQuery::create()->findOneById($id);
        // $this->bitacora = BitacoraUsuarioQuery::create()->findOneById($id);
        $this->id = $id;
        $this->form = new IngresaCampForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('consulta'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $motivo = $valores['motivo'];
                $ausencia = SolicitudUsuarioQuery::create()->findOneById($id);
                $ausencia->setUsuarioModero($usuarioId);
                $ausencia->setEstado('Rechazado');
                $ausencia->setComentarioModero($motivo);
                $ausencia->save();
                $bitacora = New BitacoraUsuario();
                $bitacora->setFecha(date('Y-m-d H:i'));
                $bitacora->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'));
                $bitacora->setTipo('Solicitud');
                $bitacora->setIdentificador($ausencia->getId());
                $bitacora->setUsuarioJefe($ausencia->getUsuarioId());
                $bitacora->setMotivo('Rechazado: ' . $valores['observaciones']);
                $bitacora->save();
                $this->getUser()->setFlash('error', 'Ausencia Rechazada con exito');
                $this->redirect("inicio/notifica");
            }
        }
    }
    
    
}
