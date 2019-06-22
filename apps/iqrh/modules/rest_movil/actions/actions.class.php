<?php

/**
 * rest_movil actions.
 *
 * @package    plan
 * @subpackage rest_movil
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class rest_movilActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeLogin(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $this->getResponse()->setContentType('charset=utf-8');
        $key = $request->getParameter('key');
        if ($key <> "bbba722f948709955de06b9e2a7e703e3bc15996") {
            $resultado['valido'] = 0;
            $resultado['token'] = '';
            $resultado['mensaje'] = 'KEY NO VALIDO';
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
        }
        $usuario = $request->getParameter('usuario');
        $clave = $request->getParameter('clave');
        $clave = sha1($clave);
        $resultado['valido'] = 0;
        $resultado['token'] = '';
        $resultado['mensaje'] = 'USUARIO NO VALIDO';
        $usuarioQ = UsuarioQuery::create()
                ->filterByUsuario($usuario)
                ->filterByClave($clave)
                ->findOne();
        if ($usuarioQ) {
            $token = sha1(date('YmdH') . rand(1, 10) . $usuarioQ->getId());
            $usuarioQ->setToken($token);
            $usuarioQ->save();
            $resultado['valido'] = 1;
            $resultado['token'] = $token;
            $resultado['mensaje'] = 'BIENVENIDO USUARIO ';
        }
        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeProyecto(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $this->getResponse()->setContentType('charset=utf-8');
        $test = $request->getParameter('test');
        $key = $request->getParameter('key');
        $codigo = $request->getParameter('codigo');
        if ($key <> "bbba722f948709955de06b9e2a7e703e3bc15996") {
            $resultado['valido'] = 0;
            $resultado['token'] = '';
            $resultado['mensaje'] = 'KEY NO VALIDO';
            $resultado['data'] = null;
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
        }
        $token = 'abc';
        if ($request->getParameter('token')) {
            $token = $request->getParameter('token');
        }
        $usuarioQ = UsuarioQuery::create()
                ->filterByToken($token)
                ->findOne();
        if (!$usuarioQ) {
            $resultado['valido'] = 0;
            $resultado['token'] = '';
            $resultado['mensaje'] = 'TOKEN NO VALIDO';
            $resultado['data'] = null;
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
        }
//D0
        $proyecto = ProyectoQuery::create()->findOneByCodigo($codigo);
        if (!$proyecto) {
            $resultado['valido'] = 0;
            $resultado['token'] = '';
            $resultado['mensaje'] = 'CODIO PROYECTO NO VALIDO';
            $resultado['data'] = null;
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
        }

        $data['codigo'] = $proyecto->getCodigo();
        $data['nombre'] = $proyecto->getNombre();
        $data['telefono'] = $proyecto->getTelefono();
        $data['contacto'] = $proyecto->getContacto();
        $data['created_by'] = $proyecto->getCreatedBy();
        $data['created_at'] = $proyecto->getCreatedAt();
        $data['updated_by'] = $proyecto->getUpdatedBy();
        $data['updated_at'] = $proyecto->getUpdatedAt();
        $data['nit_proyecto'] = $proyecto->getNitProyecto();
        $data['razon_social'] = $proyecto->getRazonSocial();
        $data['nomenclatura'] = $proyecto->getNomenclatura();
        $data['ubicacion_geografica'] = $proyecto->getUbicacionGeografica();
        $data['documento_representante'] = $proyecto->getDocumentoRepresentante();
        $data['representante_legal'] = $proyecto->getRepresentanteLegal();
        $data['gerente'] = $proyecto->getGerente();
        $data['residente'] = $proyecto->getResidente();
        $data['departamento'] = $proyecto->getDepartamento();
        $data['municipio'] = $proyecto->getMunicipio();
        $data['interno'] = $proyecto->getInterno();

        $resultado['valido'] = 1;
        $resultado['token'] = $token;
        $resultado['mensaje'] = 'PROYECTO ENCONTRADO CON EXITO';
        $resultado['data'] = $data;
        if ($test == 1) {
            echo "<pre>";
            print_r($resultado);
            die();
        }

        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

    public function executeListaEmpleado(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $this->getResponse()->setContentType('charset=utf-8');
        $test = $request->getParameter('test');
        $key = $request->getParameter('key');
        $codigo = $request->getParameter('codigo');
        if ($key <> "bbba722f948709955de06b9e2a7e703e3bc15996") {
            $resultado['valido'] = 0;
            $resultado['token'] = '';
            $resultado['mensaje'] = 'KEY NO VALIDO';
            $resultado['data'] = null;
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
        }
        $token = 'abc';
        if ($request->getParameter('token')) {
            $token = $request->getParameter('token');
        }
        $usuarioQ = UsuarioQuery::create()
                ->filterByToken($token)
                ->findOne();
        if (!$usuarioQ) {
            $resultado['valido'] = 0;
            $resultado['token'] = '';
            $resultado['mensaje'] = 'TOKEN NO VALIDO';
            $resultado['data'] = null;
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
        }
//D0
        $proyecto = ProyectoQuery::create()->findOneByCodigo($codigo);
        if (!$proyecto) {
            $resultado['valido'] = 0;
            $resultado['token'] = '';
            $resultado['mensaje'] = 'CODIO PROYECTO NO VALIDO';
            $resultado['data'] = null;
            $data_json = json_encode($resultado);
            return $this->renderText($data_json);
        }
        $empleados = UsuarioQuery::create()->filterByCodigoProyecto('', Criteria::NOT_EQUAL)->find();

        foreach ($empleados as $empleado) {
            $data['fecha_alta'] = $empleado->getFechaAlta(); // 2016-04-01
            $data['codigo'] = $empleado->getCodigo(); // PCRPN02
            $data['primer_nombre'] = $empleado->getPrimerNombre(); // VERONICA
            $data['segundo_nombre'] = $empleado->getSegundoNombre(); // JISNETH
            $data['primer_apellido'] = $empleado->getPrimerApellido(); // MIRANDA
            $data['segundo_apellido'] = $empleado->getSegundoApellido(); // MORALES
            $data['puesto'] = $empleado->getPuesto(); // ASISTENTE ADMINISTRATIVA
            $data['departamento'] = $empleado->getDepartamento(); // GERENCIA PAIS
            $data['codigo_proyecto'] = $empleado->getCodigoProyecto(); // 
            $data['id_interno'] = $empleado->getIdInterno(); //      
            $data['activo'] = 'Retirado';
            if ($empleado->getActivo()) {
                $data['activo'] = 'Activo';
            }
            $data['fecha_baja'] = '';
            $lista[] = $data;
        }

        $resultado['valido'] = 1;
        $resultado['token'] = $token;
        $resultado['mensaje'] = 'LISTADO EMPLEADOS DE PROYECTO ' . $codigo;
        $resultado['data'] = $lista;
        if ($test == 1) {
            echo "<pre>";
            print_r($resultado);
            die();
        }

        $data_json = json_encode($resultado);
        return $this->renderText($data_json);
    }

}
