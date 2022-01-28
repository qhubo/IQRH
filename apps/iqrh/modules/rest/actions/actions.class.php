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

    public function executeFotos(sfWebRequest $request) {
     
        $usuarios = UsuarioQuery::create()
                ->filterByImagen(null)
                ->find();
        $cant=0;
        foreach ($usuarios as $usuarioQ) {
            $cant++;
            $usuario = UsuarioQuery::create()->findOneById($usuarioQ->getId());
            $dpi = $usuarioQ->getDpi();
            $filename = $this->procesafoto($dpi);
            $usuario->setImagen($filename);
            $usuario->setLogo($filename);
            $usuario->save();
        }
        echo "actualizados " .$cant;
        die();
    }

    public function procesafoto($dpi) {
        $imagen = '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';
        $imagen = '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';
        $BaseImagen = $imagen;
        $carpetaArchivos = sfConfig::get('sf_upload_dir');
        $Base64Img = base64_decode($BaseImagen);
        $filename = $dpi . '.png';
        $urlImagen = $carpetaArchivos . DIRECTORY_SEPARATOR . 'empresas' . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($urlImagen, $Base64Img);
        return $filename;
    }

    public function executeOnline(sfWebRequest $request) {
        echo "online";
        die();
    }

    public function executeProyecto(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $this->getResponse()->setContentType('charset=utf-8');
        $codigo = $request->getParameter('codigo');
        $nombre = $request->getParameter('nombre');
        $interno = $request->getParameter('interno');
        $telefono = $request->getParameter('telefono');
        $contacto = $request->getParameter('contacto');
        $created_by = $request->getParameter('created_by');
        $created_at = $request->getParameter('created_at');
        $updated_by = $request->getParameter('updated_by');
        $updated_at = $request->getParameter('updated_at');
        $nit_proyecto = $request->getParameter('nit_proyecto');
        $razon_social = $request->getParameter('razon_social');
        $nombreclatura = $request->getParameter('nomenclatura');
        $ubicacion_geografica = $request->getParameter('ubicacion_geografica');
        $documento_representa = $request->getParameter('documento_representante');
        $representante_legal = $request->getParameter('representante_legal');
        $gerente = $request->getParameter('gerente');
        $residente = $request->getParameter('residente');
        $departamento = $request->getParameter('departamento');
        $municipio = $request->getParameter('municipio');
        $dpi = $request->getParameter('dpi');
        $proyecto = ProyectoQuery::create()->findOneByInterno($interno);
        $resultado['CODIGO'] = '0';
        $resultado['NOMBRE'] = 'ERROR DEBE COMPLETAR INFORMACION';
//        echo $codigo;
//        echo "<br>";
//        echo strlen($codigo);
//        echo "<br>";
//        echo strlen($nombre);
//        die();
        //   if ((strlen($nombre) > 5)) {
        if (!$proyecto) {
            $proyecto = new Proyecto();
            $proyecto->setInterno($interno);
        }
        $proyecto->setCodigo($codigo);
        $proyecto->setNombre($nombre);
        $proyecto->setTelefono($telefono);
        $proyecto->setContacto($contacto);
        $proyecto->setCreatedBy($created_by);
        $proyecto->setCreatedAt($created_at);
        $proyecto->setUpdatedBy($updated_by);
        $proyecto->setUpdatedAt($updated_at);
        $proyecto->setNitProyecto($nit_proyecto);
        $proyecto->setRazonSocial($razon_social);
        $proyecto->setNomenclatura($nombreclatura);
        $proyecto->setUbicacionGeografica($ubicacion_geografica);
        $proyecto->setDocumentoRepresentante($documento_representa);
        $proyecto->setRepresentanteLegal($representante_legal);
        $proyecto->setGerente($gerente);
        $proyecto->setResidente($residente);  //= $request->getParameter('residente');
        $proyecto->setDepartamento($departamento);  // = $request->getParameter('departamento');
        $proyecto->setMunicipio($municipio);  /// = $request->getParameter('municipio');
        $proyecto->save();
        $resultado['CODIGO'] = '1';
        $resultado['NOMBRE'] = 'ACTUALIZACION ACEPTADA';
        //  }
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
        echo "online";
        die();
    }

    public function executeUsuarioDesactiva(sfWebRequest $request) {
        $codigo = $request->getParameter('codigo');
        $codigo_proyecto = $request->getParameter('codigo_proyecto');
        $fechaBaja = $request->getParameter('fecha');
        $usuarioQ = UsuarioQuery::create()->filterByCodigo($codigo)->find();
        $mensaje = "Usuario no encontrado";
        if ($usuarioQ) {
            $cantidadU = count($usuarioQ);
            if ($cantidadU == 1) {
                $usuario = UsuarioQuery::create()->findOneByCodigo($codigo);
                $usuario->setActivo(FALSE);
                $usuario->setFechaBaja($fechaBaja);
                $usuario->save();
            }
            $usuario = UsuarioQuery::create()
                    ->filterByCodigo($codigo)
                    ->filterByCodigoProyecto($codigo_proyecto)
                    ->findOne();
            if ($usuario) {
                $usuario = UsuarioQuery::create()->findOneByCodigo($codigo);
                $usuario->setActivo(FALSE);
                $usuario->setFechaBaja($fechaBaja);
                $usuario->save();
            }
            $mensaje = 'Usuario actualizado';
        }
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

    public function executeUsuarioVacacion(sfWebRequest $request) {
        $id_c = $request->getParameter('id_c');
        $codigo = $request->getParameter('codigo');
        $periodo = $request->getParameter('periodo');
        $pagado = $request->getParameter('pagado');
        $derecho = $request->getParameter('derecho');
        $empleado = UsuarioVacacionQuery::create()
                ->filterByUsuario($codigo)
                ->filterByPeriodo($periodo)
                ->findOne();
        if (!$empleado) {
            $empleado = new UsuarioVacacion();
            $empleado->setUsuario($codigo);
            $empleado->setPeriodo($periodo);
            $empleado->save();
        }
        $empleado->setPagado($pagado);
        $empleado->setDerecho($derecho);
        $empleado->save();
        $linea['ID'] = 1;
        $linea['IDACTUA'] = 1;
        $linea['enviado'] = 1;
        $linea['codigo'] = $codigo;
        $linea['mensaje'] = 'actualizado';
        $resultado['LINEA'] = 1;
        $resultado['RESULTADO'][] = $linea;
        $resultado['LINEA'] = 1;
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
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
        $planillaRe->setEnviadoCorreo(false);
        $planillaRe->save();
        $resultado['detalle'] = 'ok';
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeResumenData(sfWebRequest $request) {
        $data = $request->getParameter('data');
        $data = str_replace("?", "", $data);
        $array = explode("|||", $data);
        $LISTADO = NULL;
        foreach ($array as $lista) {
            $detalle = explode("___", $lista);
            foreach ($detalle as $linea) {
                $linea = trim($linea);
                $datos = explode("=", $linea);
                $campo = $datos[0];
                $valor = $datos[1];
                $DAT[$campo] = $valor;
            }
            $LISTADO[] = $DAT;
        }
        foreach ($LISTADO as $DataQ) {
            $Planilla_Resumen_id = $DataQ['Planilla_Resumen_id'];
            $empleado = $DataQ['empleado'];
            $empleado_proyecto_id = $DataQ['empleado_proyecto_id'];
            $sueldo_base = $DataQ['sueldo_base'];
            $bonificacion_base = $DataQ['bonificacion_base'];
            $dias_ausencias = $DataQ['dias_ausencias'];
            $dias_suspendido = $DataQ['dias_suspendido'];
            $septimos = $DataQ['septimos'];
            $total_descuentos = $DataQ['total_descuentos'];
            $total_ingresos = $DataQ['total_ingresos'];
            $total_extras = $DataQ['total_extras'];
            $total_sueldo_liquido = $DataQ['total_sueldo_liquido'];
            $alta = $DataQ['alta'];
            $baja = $DataQ['baja'];
            $codigo = $DataQ['codigo'];
            $puesto = $DataQ['puesto'];
            $departamento = $DataQ['departamento'];
            $dias_base = $DataQ['dias_base'];
            $bloque = $DataQ['bloque'];
            $inicio = $DataQ['inicio'];
            $fin = $DataQ['fin'];
            $numero = $DataQ['numero'];
            $laborados = $DataQ['laborados'];
            $cabecera_in = $DataQ['cabecera_in'];

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
            $planillaRe->setEnviadoCorreo(false);
            $planillaRe->setLaborados($laborados);
            $planillaRe->setEnviadoCorreo(false);
            $planillaRe->save();
        }
        $resultado['detalle'] = 'ok';

        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeDetalleData(sfWebRequest $request) {
        $data = $request->getParameter('data');
        $data = str_replace("?", "", $data);
        $array = explode("|||", $data);
        $LISTADO = NULL;
        foreach ($array as $lista) {
            $detalle = explode("___", $lista);
            foreach ($detalle as $linea) {
                $linea = trim($linea);
                $datos = explode("=", $linea);
                $campo = $datos[0];
                $valor = $datos[1];
                $DAT[$campo] = $valor;
            }
            $LISTADO[] = $DAT;
        }
        foreach ($LISTADO as $DataQ) {
            $id_c = $DataQ['id_c'];
            $planilla_resumen_id = $DataQ['planilla_resumen_id'];
            $tipo = $DataQ['tipo'];
            $afeca_ss = $DataQ['afeca_ss'];
            $descripcion = trim($DataQ['descripcion']);
            $monto = $DataQ['monto'];
            $debe = $DataQ['debe'];
            $haber = $DataQ['haber'];
            $identificar = $DataQ['identificar'];
            $cabecera_in = $DataQ['cabecera_in'];

            $planillaDeta = ReciboDetalleQuery::create()
                    ->filterByCabeceraIn($cabecera_in)
                    ->filterByIdC($id_c)
                    ->filterByDescripcion($descripcion)
                    ->filterByPlanillaResumenId($planilla_resumen_id)
                    ->findOne();
//                ->findOneByIdC($id_c);
            if (!$planillaDeta) {
                $planillaDeta = new ReciboDetalle();
                $planillaDeta->setIdC($id_c);
                $planillaDeta->setCabeceraIn($cabecera_in);
                $planillaDeta->setPlanillaResumenId($planilla_resumen_id);
                $planillaDeta->save();
            }

            $planillaDeta->setTipo($tipo);
            $planillaDeta->setAfecaSs($afeca_ss);
            $planillaDeta->setDescripcion($descripcion);
            $planillaDeta->setMonto($monto);
            $planillaDeta->setDebe($debe);
            $planillaDeta->setHaber($haber);
            $planillaDeta->setIdentificar($identificar);
            
            $planillaDeta->save();
        }
        $resultado['detalle'] = 'ok';
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeDetalle(sfWebRequest $request) {
        $id_c = $request->getParameter('id_c');
        $planilla_resumen_id = $request->getParameter('planilla_resumen_id');
        $tipo = $request->getParameter('tipo');
        $afeca_ss = $request->getParameter('afeca_ss');
        $descripcion = trim($request->getParameter('descripcion'));
        $monto = $request->getParameter('monto');
        $debe = $request->getParameter('debe');
        $haber = $request->getParameter('haber');
        $identificar = $request->getParameter('identificar');
        $cabecera_in = $request->getParameter('cabecera_in');
        $planillaDeta = ReciboDetalleQuery::create()
                ->filterByCabeceraIn($cabecera_in)
                ->filterByIdC($id_c)
                ->filterByDescripcion($descripcion)
                ->filterByPlanillaResumenId($planilla_resumen_id)
                ->findOne();
//                ->findOneByIdC($id_c);
        if (!$planillaDeta) {
            $planillaDeta = new ReciboDetalle();
            $planillaDeta->setIdC($id_c);
            $planillaDeta->setCabeceraIn($cabecera_in);
            $planillaDeta->setPlanillaResumenId($planilla_resumen_id);
            $planillaDeta->save();
        }

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
        $ReSum = ReciboCabeceraQuery::create()
                ->filterByCabeceraIn($cabecera_in)
                ->findOne();
        if (!$ReSum) {
            $ReSum = new ReciboCabecera();
            $ReSum->setCabeceraIn($cabecera_in);
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
            $estado = $request->getParameter('estado') . "RH";
        }

        $ausencia = SolicitudVacacionQuery::create()->findOneById($id);
        if ($ausencia) {
            $ausencia->setEstado($estado);
            $ausencia->save();
        }
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
            $estado = $request->getParameter('estado') . "RH";
        }
        $ausencia = SolicitudFinquitoQuery::create()->findOneById($id);
        if ($ausencia) {
            $ausencia->setEstado($estado);
            $ausencia->save();
        }
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
        $dpi = $request->getParameter('dpi');
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
        $sueldo = $request->getParameter('sueldo');
        $fecha_alta = $request->getParameter('fecha_alta');
        $id_interno = $request->getParameter('id_interno');
        $id_interno_proyecto = $request->getParameter('id_interno_proyecto');
        $codigo_proyecto = $request->getParameter('codigo_proyecto');
        $multi = $request->getParameter('multi');
        $derecho_vaca= $request->getParameter('derecho_vaca');
        if ($multi == 1) {
            if ($id_interno_proyecto <> 1) {
                $usuario = $id_interno_proyecto . "_" . $usuario;
            }
        }

        $mensaje = 'Codigo No enviado';
        if ($codigo) {
            $usuarioQ = UsuarioQuery::create()->findOneByUsuario($usuario);
            if (!$usuarioQ) {
                $mensaje = "Creado";
                $usuarioQ = new Usuario();
                $usuarioQ->setUsuario($usuario);
                $usuarioQ->setActivo(true);
                $usuarioQ->setClave($clave);
                $filename = $this->procesafoto($dpi);
               $usuarioQ->setImagen($filename);
            $usuarioQ->setLogo($filename);
            }
            $mensaje = 'Actualizado';
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
            $usuarioQ->setDpi($dpi);
            $usuarioQ->setIdInterno($id_interno);
            $usuarioQ->setDerechoVaca($derecho_vaca);
            $usuarioQ->setCodigoProyecto($codigo_proyecto);
            $usuarioQ->setIdInternoProyecto($id_interno_proyecto);
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
