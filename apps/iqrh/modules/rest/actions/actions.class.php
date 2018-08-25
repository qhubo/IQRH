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

    public function executeOnline(sfWebRequest $request) {
        echo "online";
        die();
    }

    public function executeResumen(sfWebRequest $request) {
        $Planilla_Resumen_id = $request->getParameter('Planilla_Resumen_id');
        $empleado = $request->getParameter('empleado');
        $empleado_proyecto_id = $request->getParameter('empleado_proyecto_id');
        $sueldo_base = $request->getParameter('sueldo_base');
        $bonificacion_base = $request->getParameter('bonificacion_base');
        $dias_ausencias = $request->getParameter('dias_ausencias');
        $dias_suspendido = $request->getParameter('dias_suspendido');
        $septimos = $request->getParameter('septimos');
        $total_descuentos = $request->getParameter('total_descuentos');
        $total_ingresos = $request->getParameter('total_ingresos');
        $total_extras = $request->getParameter('total_extras');
        $total_sueldo_liquido = $request->getParameter('total_sueldo_liquido');
        $alta = $request->getParameter('alta');
        $baja = $request->getParameter('baja');
        $codigo = $request->getParameter('codigo');
        $puesto = $request->getParameter('puesto');
        $departamento = $request->getParameter('departamento');
        $dias_base = $request->getParameter('dias_base');
        $bloque = $request->getParameter('bloque');
        $inicio = $request->getParameter('inicio');
        $fin = $request->getParameter('fin');
        $numero = $request->getParameter('numero');
        $laborados = $request->getParameter('laborados');
        $cabecera_in = $request->getParameter('cabecera_in');
        $planillaRe = ReciboEncabezadoQuery::create()
                ->filterByPlanillaResumenId($Planilla_Resumen_id)
                ->findOne();
        if (!$planillaRe) {
            $planillaRe = new ReciboEncabezado();
            $planillaRe->setPlanillaResumenId($Planilla_Resumen_id);
            $planillaRe->save();
        }
        $planillaRe->setCabeceraIn($cabecera_in);
        $planillaRe->setEmpleado($empleado);
        $planillaRe->setEmpleadoProyectoId($empleado_proyecto_id);
        $planillaRe->setSueldoBase($sueldo_base);
        $planillaRe->setBonificacionBase($bonificacion_base);
        $planillaRe->setDiasAusencias($dias_ausencias);
        $planillaRe->setDiasSuspendido($dias_ausencias);
        $planillaRe->setSeptimos($septimos);
        $planillaRe->setTotalDescuentos($total_descuentos);
        $planillaRe->setTotalIngresos($total_ingresos);
        $planillaRe->setTotalExtras($total_extras);
        $planillaRe->setTotalSueldoLiquido($total_sueldo_liquido);
        $planillaRe->setDiasSuspendido($dias_suspendido);
        $planillaRe->setAlta($alta);
        $planillaRe->setBaja($baja);
        $planillaRe->setCodigo($codigo);
        $planillaRe->setPuesto($puesto);
        $planillaRe->setDepartamento($departamento);
        $planillaRe->setDiasBase($dias_base);
        $planillaRe->setBloque($bloque);
        $planillaRe->setInicio($inicio);
        $planillaRe->setFin($fin);
        $planillaRe->setNumero($numero);
        $planillaRe->setLaborados($laborados);
        $planillaRe->save();
        $resultado['detalle'] = 'ok';
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeDetalle(sfWebRequest $request) {
        $id_c = $request->getParameter('id_c');
        $planilla_resumen_id = $request->getParameter('planilla_resumen_id');
        $tipo = $request->getParameter('tipo');
        $afeca_ss = $request->getParameter('afeca_ss');
        $descripcion = $request->getParameter('descripcion');
        $monto = $request->getParameter('monto');
        $debe = $request->getParameter('debe');
        $haber = $request->getParameter('haber');
        $identificar = $request->getParameter('identificar');
        $cabecera_in = $request->getParameter('cabecera_in');

        $planillaDeta = ReciboDetalleQuery::create()->findOneByIdC($id_c);
        if (!$planillaDeta) {
            $planillaDeta = new ReciboDetalle();
            $planillaDeta->setIdC($id_c);
            $planillaDeta->save();
        }
        $planillaDeta->setCabeceraIn($cabecera_in);
        $planillaDeta->setPlanillaResumenId($planilla_resumen_id);
        $planillaDeta->setTipo($tipo);
        $planillaDeta->setAfecaSs($afeca_ss);
        $planillaDeta->setDescripcion($descripcion);
        $planillaDeta->setMonto($monto);
        $planillaDeta->setDebe($debe);
        $planillaDeta->setHaber($haber);
        $planillaDeta->setIdentificar($identificar);
        $planillaDeta->save();
        $resultado['detalle'] = 'ok';
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeCabecera(sfWebRequest $request) {
        $planilla = $request->getParameter('planilla');
        $inicio = $request->getParameter('inicio');
        $fin = $request->getParameter('fin');
        $proyecto = $request->getParameter('proyecto');
        $empresa = $request->getParameter('empresa');
        $razon_social = $request->getParameter('razon_social');
        $direccion = $request->getParameter('direccion');
        $email = $request->getParameter('email');
        $telefono = $request->getParameter('telefono');
        $nombre_comercial = $request->getParameter('nombre_comercial');
        $texto = $request->getParameter('texto');
        $cabecera_in = $request->getParameter('cabecera_in');
        $Resum = ReciboCabeceraQuery::create()->findOneByCabeceraIn($cabecera_in);
        if ($Resum) {
            $ReSum = new ReciboCabecera();
            $ReSum->setCabeceraIn($cabecera_in);
            $Resum->save();
        }
        $ReSum->setPlanilla($planilla);
        $ReSum->setFin($fin);
        $ReSum->setInicio($inicio);
        $ReSum->setProyecto($proyecto);
        $ReSum->setEmpresa($empresa);
        $ReSum->setRazonSocial($razon_social);
        $ReSum->setDireccion($direccion);
        $ReSum->setEmail($email);
        $ReSum->setTelefono($telefono);
        $ReSum->setNombreComercial($nombre_comercial);
        $ReSum->setTexto($texto);
        $ReSum->save();
        $resultado['detalle'] = 'ok';
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeOkAusencia(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $estado = 'AutorizadoRH';
        if ($request->getParameter('estado')) {
            $estado = $request->getParameter('estado');
        }
        $ausencia = SolicitudAusenciaQuery::create()->findOneById($id);
        $ausencia->setEstado($estado);
        $ausencia->save();
        die();
    }

    public function executeAusencia(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $ausencia = SolicitudAusenciaQuery::create()
                ->filterByEstado('Autorizado')
                ->findOne();
        $resultado['LINEA'] = 0;
        $lista = null;
        if ($ausencia) {
            $linea['ID'] = $ausencia->getId();
            $linea['IDACTUA'] = $ausencia->getId();
            $linea['EMPLEADO'] = ParametroQuery::limpiezaCaracter($ausencia->getUsuario()->getCodigo());
            $linea['FECHA'] = $ausencia->getFecha('Ymd');
            $linea['MOTIVO'] = ParametroQuery::limpiezaCaracter($ausencia->getMotivo());
            $linea['OBSERVACIONES'] = ParametroQuery::limpiezaCaracter($ausencia->getObservaciones());
            $resultado['RESULTADO'][] = $linea;
            $resultado['LINEA'] = 1;

            if ($id == 1) {
                echo "<pre>";
                print_r($resultado);
                die();
            }
        }
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeOkVacacion(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $estado = 'EnviadoRH';
        if ($request->getParameter('estado')) {
            $estado = $request->getParameter('estado');
        }
        $ausencia = SolicitudVacacionQuery::create()->findOneById($id);
        $ausencia->setEstado($estado);
        $ausencia->save();
        die();
    }

    public function executeVacacion(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $vacacion = SolicitudVacacionQuery::create()
                ->filterByEstado('Autorizado')
                ->findOne();
        $resultado['LINEA'] = 0;
        $lista = null;
        if ($vacacion) {
            $linea['ID'] = $vacacion->getId();
            $linea['IDACTUA'] = $vacacion->getId();
            $linea['EMPLEADO'] = ParametroQuery::limpiezaCaracter($vacacion->getUsuario()->getCodigo());
            $UsuAuto = UsuarioQuery::create()->findOneById($vacacion->getUsuarioModero());
            $linea['AUTORIZO'] = $UsuAuto->getCodigo();

            $linea['FECHA_INICIO'] = $vacacion->getFechaInicio('Ymd');
            $linea['FECHA_FIN'] = $vacacion->getFechaFin('Ymd');
            $linea['DIA'] = $vacacion->getDia();
            $linea['MOTIVO'] = ParametroQuery::limpiezaCaracter($vacacion->getMotivo());
            $linea['OBSERVACIONES'] = ParametroQuery::limpiezaCaracter($vacacion->getObservaciones());
            $linea['COMENTARIO_APROBO'] = ParametroQuery::limpiezaCaracter($vacacion->getComentarioModero());
            //  $linea['JEFE'] = ParametroQuery::limpiezaCaracter($vacacion->getJefe());

            $resultado['RESULTADO'][] = $linea;
            $resultado['LINEA'] = 1;

            if ($id == 1) {
                echo "<pre>";
                print_r($resultado);
                die();
            }
        }
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeOkFiniquito(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $estado = 'EnviadoRH';
        if ($request->getParameter('estado')) {
            $estado = $request->getParameter('estado');
        }
        $ausencia = SolicitudFinquitoQuery::create()->findOneById($id);
        $ausencia->setEstado($estado);
        $ausencia->save();
        die();
    }

    public function executeFiniquito(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $solicitud = SolicitudFinquitoQuery::create()
                ->filterByEstado('Pendiente')
                ->findOne();
        $resultado['LINEA'] = 0;
        $lista = null;
        $lista = null;
        if ($solicitud) {
            $usuarioRetiro = UsuarioQuery::create()->findOneById($solicitud->getUsuarioRetiro());
            $usuarioSoli = UsuarioQuery::create()->findOneById($solicitud->getUsuarioGraba());
            $linea['ID'] = $solicitud->getId();
            $linea['IDACTUA'] = $solicitud->getId();
            $linea['AUTORIZO'] = ParametroQuery::limpiezaCaracter($usuarioRetiro->getCodigo());
            $linea['EMPLEADO'] = ParametroQuery::limpiezaCaracter($usuarioSoli->getCodigo());
            $linea['FECHA_RETIRO'] = $solicitud->getFechaRetiro('Ymd');
            $linea['MOTIVO'] = ParametroQuery::limpiezaCaracter($solicitud->getMotivo());
            $linea['OBSERVACIONES'] = ParametroQuery::limpiezaCaracter($solicitud->getObservaciones());
            $linea['JEFE'] = ParametroQuery::limpiezaCaracter($solicitud->getJefe());

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
