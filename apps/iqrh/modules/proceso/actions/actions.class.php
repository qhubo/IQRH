<?php

/**
 * proceso actions.
 *
 * @package    plan
 * @subpackage proceso
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class procesoActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $Asistencia = AsistenciaUsuarioQuery::create()
                ->filterByEmpresa(null)
                ->find();
        $actualizados = 0;
        foreach ($Asistencia as $registro) {
            $usuario = UsuarioQuery::create()->findOneByCodigo($registro->getUsuario());
            if ($usuario) {
                $actualizados++;
                $empresa = $usuario->getEmpresa();
                $HorarioQ = EmpresaHorarioQuery::create()->findOneByEmpresa($empresa);
                if ($HorarioQ) {
                    $llegoTarde = false;
                    $Entrada = $HorarioQ->getHora24();
                    $Salida = $HorarioQ->getHoraFin24();
                    $IngresoActual = $registro->getHora();
                    $IngresoActual = (int) str_replace(":", "", $IngresoActual);
                    $hora = substr($IngresoActual, 0, strlen($IngresoActual) - 2);
                    $minuto = substr($IngresoActual, -2);
                    $HORAMIN = ($hora * 60) + $minuto;
                    $horaEntrada = substr($Entrada, 0, strlen($Entrada) - 2);
                    $minutoEntrada = substr($Entrada, -2);
                    $HORAMINEntrada = ($horaEntrada * 60) + $minutoEntrada;
                    $diferenica = $HORAMIN - $HORAMINEntrada;
                    $horaDifecnia = $diferenica / 60;
                    if ($diferenica > 0) {
                        $llegoTarde = true;
                    }
                    echo "INGRESO " . $IngresoActual . " horario entrada " . $Entrada;
                    $horario = explode(".", $horaDifecnia);
                    $horaTarde = $horario[0];

                    $minutoTarde = 0;
                    if (count($horario) > 1) {
                        $minuto = '0.' . $horario[1];
                        if ($minuto) {
                            $minutoTarde = $minuto * 60;
                        }
                    }
                    $AsistenciaQ = AsistenciaUsuarioQuery::create()->findOneById($registro->getId());
                    $AsistenciaQ->setEmpresa($empresa);
                    $AsistenciaQ->setHoraTarde($horaTarde);
                    $AsistenciaQ->setTarde($llegoTarde);
                    $AsistenciaQ->setMinutoTarde($minutoTarde);
                    $AsistenciaQ->save();
                    // echo "<br>";
                    // echo " hora tarde ".$hora." minuto  ".$minuto." minuto tarde ".$minutoTarde;
                } else {
                    //    echo "NO TIENE HORARIO " . $empresa;
                    //  echo "<br>";
                }
            }
        }
        echo "registro actualizados " . $actualizados;
        die();
    }

    public function executeEnvio(sfWebRequest $request) {
        $url = 'http://iqrh:8080/iqrh_dev.php/rest_asiste/asiste';
        $usuarioQ = UsuarioQuery::create()
                ->setlimit(10)
                ->where("Usuario.Codigo not like '%INPRO%'")
                ->find();
        $cantida = 0;
        foreach ($usuarioQ as $usuario) {
            $cantida++;
            $dia = date('Y-m-13');
            $hora = '11:00'; // date('H:i');
            $postData['token'] = 'bbba722f948709955de06b9e2a7e703e3bc15996';
            $postData['usuario'] = $usuario->getCodigo();
            $postData['fecha'] = $dia . " " . $hora;
            $postData['hora'] = $hora;
            $postData['dia'] = $dia;
            $handler = curl_init();
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($handler, CURLOPT_URL, $url);
            curl_setopt($handler, CURLOPT_POST, true);
            curl_setopt($handler, CURLOPT_POSTFIELDS, $postData);
            $resultado = curl_exec($handler);
            curl_close($handler);
            $resultado = json_decode($resultado);
        }
        echo "cantidad " . $cantida;
        die();
    }

}
