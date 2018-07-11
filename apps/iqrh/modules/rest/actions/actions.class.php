<?php

/**
 * rest actions.
 *
 * @package    plan
 * @subpackage rest
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class restActions extends sfActions {

    public function executeAusencia(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $ausencia = SolicitudAusenciaQuery::create()->findOne();
        $resultado['LINEA'] = 0;
        $lista = null;
        if ($ausencia) {
            $linea['ID'] = 1;
            $linea['IDACTUA'] = 1;
            $linea['EMPLEADO'] = ParametroQuery::limpiezaCaracter($ausencia->getUsuario()->getCodigo());
            $linea['FECHA'] = $ausencia->getFecha('Ymd');
            $linea['MOTIVO'] = ParametroQuery::limpiezaCaracter($ausencia->getMotivo());
            $linea['OBSERVACIONES'] = ParametroQuery::limpiezaCaracter($ausencia->getObservaciones());
            $resultado['RESULTADO'][] = $linea;
            $resultado['LINEA'] = 1;
            $data_json = json_encode($resultado);
            if ($id == 1) {
                echo "<pre>";
                print_r($resultado);
                die();
            }
        }
        return $this->renderText($data_json);
    }

    public function executeVacacion(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $vacacion = SolicitudVacacionQuery::create()->findOne();
        $resultado['LINEA'] = 0;
        $lista = null;
        if ($vacacion) {
            $linea['ID'] = 1;
            $linea['IDACTUA'] = 1;
            $linea['EMPLEADO'] = ParametroQuery::limpiezaCaracter($vacacion->getUsuario()->getCodigo());
            $linea['FECHA_INICIO'] = $vacacion->getFechaInicio('Ymd');
            $linea['FECHA_FIN'] = $vacacion->getFechaFin('Ymd');
            $linea['DIA'] = $vacacion->getDia('Ymd');
            $linea['MOTIVO'] = ParametroQuery::limpiezaCaracter($vacacion->getMotivo());
            $linea['OBSERVACIONES'] = ParametroQuery::limpiezaCaracter($vacacion->getObservaciones());
            $linea['JEFE'] = ParametroQuery::limpiezaCaracter($vacacion->getJefe());
            $linea['AUTORIZO'] = '';
            $resultado['RESULTADO'][] = $linea;
            $resultado['LINEA'] = 1;
            $data_json = json_encode($resultado);
            if ($id == 1) {
                echo "<pre>";
                print_r($resultado);
                die();
            }
        }
        return $this->renderText($data_json);
    }

    public function executeFiniquito(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $solicitud = SolicitudFinquitoQuery::create()->findOne();
        $resultado['LINEA'] = 0;
        $lista = null;
           $lista = null;
        if ($solicitud) {
            $usuarioRetiro = UsuarioQuery::create()->findOneById($solicitud->getUsuarioRetiro());
            $usuarioSoli = UsuarioQuery::create()->findOneById($solicitud->getUsuarioGraba());
            
            $linea['ID'] = 1;
            $linea['IDACTUA'] = 1;
            $linea['EMPLEADO_SOLICITA'] = ParametroQuery::limpiezaCaracter($usuarioRetiro->getCodigo());
            $linea['EMPLEADO'] = ParametroQuery::limpiezaCaracter($usuarioSoli->getCodigo());
            $linea['FECHA_RETIRO'] = $solicitud->getFechaRetiro('Ymd');
            $linea['MOTIVO'] = ParametroQuery::limpiezaCaracter($solicitud->getMotivo());
            $linea['OBSERVACIONES'] = ParametroQuery::limpiezaCaracter($solicitud->getObservaciones());
            $linea['JEFE'] = ParametroQuery::limpiezaCaracter($solicitud->getJefe());
            $linea['AUTORIZO'] = '';
            $resultado['RESULTADO'][] = $linea;
            $resultado['LINEA'] = 1;
            $data_json = json_encode($resultado);
            if ($id == 1) {
                echo "<pre>";
                print_r($resultado);
                die();
            }
        }
             return $this->renderText($data_json);
    }

    public function executeUsuario(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $actualizaFoto = $request->getParameter('actualiaFoto');
        $usuario = $request->getParameter('usuario');
        $correo = $request->getParameter('correo');
        $logo = $request->getParameter('logo');
        $codigo = $request->getParameter('codigo');
        $urlLogo = '';
        if ($logo) {
            $extension = 'jpg';
            $exitePng = explode("PNG", strtoupper($logo));
            if ($exitePng > 1) {
                $extension = 'png';
            }
            $codigoL = trim($codigo);
            $codigoL = str_replace("-", "", $codigoL);
            $filename = $codigoL . '.' . $extension;
            $urlLogo = ParametroQuery::convierteImagen($logo, $filename);
        }
        $genero = $request->getParameter('genero');
        $clave = $request->getParameter('clave');
        $fecha_nacimiento = $request->getParameter('fecha_nacimiento');
        $empresa = $request->getParameter('empresa');
        $tipo_usuario = $request->getParameter('tipo_usuario');
        $primer_nombre = $request->getParameter('primer_nombre');
        $segundo_nombre = $request->getParameter('segundo_nombre');
        $primer_apellido = $request->getParameter('primer_apellido');
        $segundo_apellido = $request->getParameter('segundo_apellido');
        $puesto = $request->getParameter('puesto');
        $departamento = $request->getParameter('departamento');
        $jefe = $request->getParameter('jefe');
        $fecha_alta = $request->getParameter('fecha_alta');
        $sueldo = $request->getParameter('sueldo');

        $mensaje = 'Codigo No enviado';
        if ($codigo) {
            $usuarioQ = UsuarioQuery::create()->findOneByUsuario($usuario);
            if (!$usuarioQ) {
                $mensaje = "Creado";
                $usuarioQ = new Usuario();
                $usuarioQ->setActivo(true);
                $usuarioQ->setClave($clave);
            }
            $mensaje = 'Actualizado';
            $usuarioQ->setUsuario($usuario);
            $usuarioQ->setCodigo($codigo);
            $usuarioQ->setCorreo($correo);
            $usuarioQ->setGenero($genero);
            $usuarioQ->setFechaNacimiento($fecha_nacimiento);
            $usuarioQ->setTipoUsuario($tipo_usuario);
            $usuarioQ->setPrimerNombre($primer_nombre);
            $usuarioQ->setPrimerApellido($primer_apellido);
            $usuarioQ->setSegundoNombre($segundo_nombre);
            $usuarioQ->setSegundoApellido($segundo_apellido);
            $usuarioQ->setPuesto($puesto);
            $usuarioQ->setDepartamento($departamento);
            $usuarioQ->setJefe($jefe);
            $usuarioQ->setFechaAlta($fecha_alta);
            $usuarioQ->setSueldo($sueldo);
            $usuarioQ->setEmpresa($empresa);
            $usuarioQ->setLogo($urlLogo);
            $usuarioQ->save();
//            $usuarioQ->setLogo($v)
        }
        //$linea = null;

        $linea['ID'] = 1;
        $linea['IDACTUA'] = 1;
        $linea['enviado'] = 1;
        $linea['codigo'] = $codigo;
        $linea['mensaje'] = $mensaje;
        $resultado['LINEA'] = 1;
        $resultado['RESULTADO'][] = $linea;
        $resultado['LINEA'] = 1;
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

}
