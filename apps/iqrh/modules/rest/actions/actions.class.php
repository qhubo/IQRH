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
        if ((strlen($nombre) > 5)) {
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
        }
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
        echo "online";
        die();
    }

    public function executeUsuarioDesactiva(sfWebRequest $request) {
        $codigo = $request->getParameter('codigo');
        $codigo_proyecto = $request->getParameter('codigo_proyecto'); 
        $fechaBaja =$request->getParameter('fecha'); 
        $usuarioQ = UsuarioQuery::create()->filterByCodigo($codigo)->find();
        $mensaje="Usuario no encontrado";
        if ($usuarioQ) {
            $cantidadU = count($usuarioQ);
            if ($cantidadU==1) {
                $usuario = UsuarioQuery::create()->findOneByCodigo($codigo);
                $usuario->setActivo(FALSE);
                $usuario->setFechaBaja($fechaBaja);
                $usuario->save();
            }
            $usuario= UsuarioQuery::create()
                    ->filterByCodigo($codigo)
                    ->filterByCodigoProyecto($codigo_proyecto)
                    ->findOne();
            if ($usuario) {
                     $usuario = UsuarioQuery::create()->findOneByCodigo($codigo);
                $usuario->setActivo(FALSE);
                $usuario->setFechaBaja($fechaBaja);
                $usuario->save(); 
            }
            $mensaje='Usuario actualizado';
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
            $planillaRe->setLaborados($laborados);
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
            $usuarioQ->setDpi($dpi);
            $usuarioQ->setIdInterno($id_interno);
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
