<?php

/**
 * Skeleton subclass for performing query and update operations on the 'asistencia_usuario' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 10/07/18 01:28:07
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AsistenciaUsuarioQuery extends BaseAsistenciaUsuarioQuery {

    static public function laboradosReales($fechaInicio, $fechaFin) {

        $datetime1 = new DateTime($fechaInicio);
        $datetime2 = new DateTime($fechaFin);
        
        $interval = $datetime1->diff($datetime2);
        $dias = str_replace("+", "", $interval->format('%R%a'));
        $SEMANA = NULL;
        $fines = 0;
        $diasOk =0;
        for ($i = 0; $i <= $dias; $i++) {
            $fecha = $fechaInicio;
            $nuevafecha = strtotime('+' . $i . ' day', strtotime($fecha));
            $fecha = date('Y-m-d', $nuevafecha);
         //   echo "<strong>".$fecha."</strong> ";
            $diaSemana = date('N', $nuevafecha);
            if (($diaSemana <>7) && ($diaSemana <> 6)) {
                $diasOk = $diasOk+1;
             //   echo $fecha." ";
            //    echo $diaSemana;
            //    echo "<br>";
            }
//            if ($diaSemana == 7) {
//                $fines = $fines + 1;
//            }
//            if ($diaSemana == 6) {
//                $fines = $fines + 1;
//            }
        }
        return $diasOk;
    }

    static public function diferencia($inicio, $salida) {
        $arrayInicio = explode(":", $inicio);
        $MinutosInicio = ($arrayInicio[0] * 60) + $arrayInicio[1];

        $arrayFin = explode(":", $salida);
        $MinutosFin = ($arrayFin[0] * 60) + $arrayFin[1];
//        echo "<br>";
//        echo $MinutosInicio." ".$MinutosFin;
//        echo "<br>"; 
        $minutos = $MinutosFin - $MinutosInicio;

        $horaDifecnia = $minutos / 60;
        $horario = explode(".", $horaDifecnia);
        $horaTarde = $horario[0];
        $minutoTarde = 0;
        if (count($horario) > 1) {
            $minuto = '0.' . $horario[1];
            if ($minuto) {
                $minutoTarde = $minuto * 60;
            }
        }
        $minutoTarde = round($minutoTarde, 0);
        // $retorna = $horaTarde." ".$minutoTarde;
        $retorna['hora'] = $horaTarde;
        $retorna['minuto'] = $minutoTarde;
        $retorna['muestra'] = $horaTarde . " " . $minutoTarde;
        $retorna['minutos'] = $minutos;
        return $retorna;
    }

    static public function procesa() {
        $Asistencia = AsistenciaUsuarioQuery::create()
                ->filterByEmpresa(null)
                //  ->filterByDia('2018-10-10')
                ->find();
//       echo "cantidad "; 
//      echo count($Asistencia);
//        
        
        $actualizados = 0;
        $horaTarde = 0;
        foreach ($Asistencia as $registro) {

            $usuario = UsuarioQuery::create()->findOneByCodigo($registro->getUsuario());
            if ($usuario) {
                $actualizados++;
                $empresa = $usuario->getEmpresa();
//                echo  $usuario->getCodigo()." ".$registro->getUsuario()." empresa ".$empresa;
//                echo "<br>";
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
                    // *****SUMA 10 DE BUENA ONDA
                    $HORAMINEntrada=$HORAMINEntrada + $HorarioQ->getMinutoProrroga();
                    $diferenica = $HORAMIN - $HORAMINEntrada;
                    $horaDifecnia = $diferenica / 60;
                    /// encontro diferencia
                    if ($diferenica > 0) {
                        $Ingresos = AsistenciaUsuarioQuery::create()
                                ->filterByUsuario($registro->getUsuario())
                                ->filterByDia($registro->getDia())
                                ->count();
                        $llegoTarde = true;
                        /// busca si hay mas ingresos
                        if ($Ingresos > 0) {
                            $primeroIngreo = AsistenciaUsuarioQuery::create()
                                    ->filterByUsuario($registro->getUsuario())
                                    ->filterByDia($registro->getDia())
                                    ->orderByHora('Asc')
                                    ->findOne();
                            $llegoTarde = false;
                            /// verificar primer ingreso
                            if ($registro->getId() == $primeroIngreo->getId()) {
                                $llegoTarde = true;
                            }
                        }
                    }
                    if ($llegoTarde) {
                        //     echo $registro->getUsuario() . " INGRESO EN DIA  " . $registro->getDia('d/m/Y') . " " . $IngresoActual . " Horario " . $Entrada . " -->  Llego tarde  " . $diferenica . "  minutos ";
                        //   echo "<br>";
                    }
                    //echo "INGRESO " . $IngresoActual . " horario entrada " . $Entrada;
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
                     echo "<br>";
                     echo " hora tarde ".$hora." minuto  ".$minuto." minuto tarde ".$minutoTarde;
                } else {
                        echo "NO TIENE HORARIO " . $empresa;
                      echo "<br>";
                }
            }
        }
        //    die();
    }

    static public function marcas($dia, $usuario) {
        $retorna = '';
        $asistenciaUu = AsistenciaUsuarioQuery::create()
                ->orderByHora()
                ->filterByDia($dia)
                ->filterByUsuario($usuario)
                ->find();
        $hora = null;
        foreach ($asistenciaUu as $regi) {
            $hora[] = $regi->getHora();
        }
        if ($hora) {
            $retorna = implode("<br>", $hora);
        }
        return $retorna;
    }

    static public function laborados($inicio, $fin, $usuario) {
        $laborados = AsistenciaUsuarioQuery::create()
                ->filterByUsuario($usuario)
                ->where("AsistenciaUsuario.Dia >= '" . $inicio . " 00:00:00" . "'")
                ->where("AsistenciaUsuario.Dia <= '" . $fin . " 23:59:00" . "'")
                ->groupByDia()
                ->count();
        return $laborados;
    }

    static public function tardes($inicio, $fin, $usuario) {
        $laborados = AsistenciaUsuarioQuery::create()
                ->filterByUsuario($usuario)
                ->filterByTarde(true)
                ->where("AsistenciaUsuario.Dia >= '" . $inicio . " 00:00:00" . "'")
                ->where("AsistenciaUsuario.Dia <= '" . $fin . " 23:59:00" . "'")
                ->groupByDia()
                ->count();
        return $laborados;
    }

    static public function horas($dia, $usuario) {
        $asistenciaUu = AsistenciaUsuarioQuery::create()
                ->withColumn('min(AsistenciaUsuario.Hora)', 'Min')
                ->withColumn('max(AsistenciaUsuario.Hora)', 'Max')
                ->filterByDia($dia)
                ->filterByUsuario($usuario)
                ->findOne();
        $entro = $asistenciaUu->getMin();
        $salio = $asistenciaUu->getMax();
        $entro = (int) str_replace(":", "", $entro);
        $salio = (int) str_replace(":", "", $salio);
        $empresa = EmpresaHorarioQuery::create()->findOneByEmpresa($asistenciaUu->getEmpresa());
         $horaEntra =0;
         $horaSalida =0;
        if ($empresa) {
            $horaEntra = $empresa->getHora24();
            $horaSalida = $empresa->getHoraFin24();
        }
        $retorna['HORARIO']['ENTRADA'] = $horaEntra;
        $retorna['HORARIO']['SALIDA'] = $horaSalida;

        $retorna['MARCA']['ENTRADA'] = $entro;
        $retorna['MARCA']['SALIDA'] = $salio;
        $horaEntraOk = $horaEntra;
        if ($entro > $horaEntra) {
            $horaEntraOk = $entro;
        }
        $horaSalidaOk = $horaSalida;
        if ($salio < $horaSalida) {
            $horaSalidaOk = $salio;
        }
        $hora = substr($horaEntraOk, 0, strlen($horaEntraOk) - 2);
        $minuto = substr($horaEntraOk, -2);
        $retorna['REALES']['ENTRADA']['MARCA'] = $horaEntraOk;
        $retorna['REALES']['ENTRADA']['HORA'] = $hora;
        $retorna['REALES']['ENTRADA']['MINUTO'] = $minuto;
        $retorna['REALES']['ENTRADA']['COMPLETO'] = ($hora * 60) + $minuto;

        $hora = substr($horaSalidaOk, 0, strlen($horaSalidaOk) - 2);
        $minuto = substr($horaSalidaOk, -2);
        $retorna['REALES']['SALIDA']['MARCA'] = $horaSalidaOk;
        $retorna['REALES']['SALIDA']['HORA'] = $hora;
        $retorna['REALES']['SALIDA']['MINUTO'] = $minuto;
        $retorna['REALES']['SALIDA']['COMPLETO'] = ($hora * 60) + $minuto;

        $retorna['HORARIO_EFECTIVO']['DIFERENCIA'] = $retorna['REALES']['SALIDA']['COMPLETO'] - $retorna['REALES']['ENTRADA']['COMPLETO'];
        $resultado = $retorna['HORARIO_EFECTIVO']['DIFERENCIA'] / 60;

        $horario = explode(".", $resultado);
        $hora = $horario[0];
        $retorna['HORARIO_EFECTIVO']['HORA'] = $hora;
        $minutoCalculo = 0;
        if (count($horario) > 1) {
            $minuto = '0.' . $horario[1];
            // echo $minuto;

            if ($minuto) {
                $minutoCalculo = $minuto * 60;
            }
        }
        $retorna['HORARIO_EFECTIVO']['MINUTO'] = round($minutoCalculo, 0);




        return $retorna;
    }

    static public function horasTotal($dia, $usuario,$entro=null,$salio=null, $estricto=false) {
        if (!$entro) {
        $asistenciaUu = AsistenciaUsuarioQuery::create()
                ->withColumn('min(AsistenciaUsuario.Hora)', 'Min')
                ->withColumn('max(AsistenciaUsuario.Hora)', 'Max')
                ->filterByDia($dia)
                ->filterByUsuario($usuario)
                ->findOne();
        $entro = $asistenciaUu->getMin();
        $salio = $asistenciaUu->getMax();
        $empresa = EmpresaHorarioQuery::create()->findOneByEmpresa($asistenciaUu->getEmpresa());
        }
        $empresa = EmpresaHorarioQuery::create()->findOne();
        
        $entro = (int) str_replace(":", "", $entro);
        $salio = (int) str_replace(":", "", $salio);
        
        $estricto=false;
          $horaEntra = 0;
         $horaSalida = 0;
        if ($empresa) {
            $horaEntra = $empresa->getHora24();
            $horaSalida = $empresa->getHoraFin24();
                    $estricto = $empresa->getEstricto();

        }
        $retorna['HORARIO']['ENTRADA'] = $horaEntra;
        $retorna['HORARIO']['SALIDA'] = $horaSalida;

        $retorna['MARCA']['ENTRADA'] = $entro;
        $retorna['MARCA']['SALIDA'] = $salio;
        $horaEntraOk = $horaEntra;
        if ($estricto){
         if ($entro > $horaEntra) {
            $horaEntraOk = $entro;
        }
        }
        
        $horaSalidaOk = $horaSalida;
        if ($estricto) {
        if ($salio < $horaSalida) {
            $horaSalidaOk = $salio;
        }
        }
        $hora = substr($horaEntraOk, 0, strlen($horaEntraOk) - 2);
        $minuto = substr($horaEntraOk, -2);
        $retorna['REALES']['ENTRADA']['MARCA'] = $horaEntraOk;
        $retorna['REALES']['ENTRADA']['HORA'] = $hora;
        $retorna['REALES']['ENTRADA']['MINUTO'] = $minuto;
        $retorna['REALES']['ENTRADA']['COMPLETO'] = ($hora * 60) + $minuto;

        $hora = substr($horaSalidaOk, 0, strlen($horaSalidaOk) - 2);
        $minuto = substr($horaSalidaOk, -2);
        $retorna['REALES']['SALIDA']['MARCA'] = $horaSalidaOk;
        $retorna['REALES']['SALIDA']['HORA'] = $hora;
        $retorna['REALES']['SALIDA']['MINUTO'] = $minuto;
        $retorna['REALES']['SALIDA']['COMPLETO'] = ($hora * 60) + $minuto;

        $retorna['HORARIO_EFECTIVO']['DIFERENCIA'] = $retorna['REALES']['SALIDA']['COMPLETO'] - $retorna['REALES']['ENTRADA']['COMPLETO'];
        $resultado = $retorna['HORARIO_EFECTIVO']['DIFERENCIA'] / 60;

        $horario = explode(".", $resultado);
        $hora = $horario[0];
        $retorna['HORARIO_EFECTIVO']['HORA'] = $hora;
        $minutoCalculo = 0;
        if (count($horario) > 1) {
            $minuto = '0.' . $horario[1];
            // echo $minuto;

            if ($minuto) {
                $minutoCalculo = $minuto * 60;
            }
        }
        $retorna['HORARIO_EFECTIVO']['MINUTO'] = round($minutoCalculo, 0);
        return $retorna;
    }

    static public function Reales($inicio, $fin, $usuario) {
        $laborados = AsistenciaUsuarioQuery::create()
                ->filterByUsuario($usuario)
                ->withColumn('min(AsistenciaUsuario.Hora)', 'Min')
                ->withColumn('max(AsistenciaUsuario.Hora)', 'Max')
                ->where("AsistenciaUsuario.Dia >= '" . $inicio . " 00:00:00" . "'")
                ->where("AsistenciaUsuario.Dia <= '" . $fin . " 23:59:00" . "'")
                ->groupByDia()
                ->find();
        $minutos = 0;
        foreach ($laborados as $reg) {
            $dia = $reg->getDia('Y-m-d');
                 $entro = $reg->getMin();
        $salio = $reg->getMax();
            //   $resultado = AsistenciaUsuarioQuery::horas($dia, $usuario);
            $resultado = AsistenciaUsuarioQuery::horasTotal($dia, $usuario,$entro,$salio);
            $DIA_MINUTO = $resultado['HORARIO_EFECTIVO']['DIFERENCIA'];
            $minutos = $DIA_MINUTO + $minutos;
        }

        $retorna = round($minutos / 60, 0);
        return $retorna;
    }

}
