<?php

/**
 * Skeleton subclass for performing query and update operations on the 'proyecto' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 06/17/19 18:03:37
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class ProyectoQuery extends BaseProyectoQuery {

    static public function reporteasistencia($Empleado, $fechaInicio, $fechaFin) {
        $empresaHorario = EmpresaHorarioQuery::create()->findOneByEmpresa($Empleado->getEmpresa());
        $horario = $empresaHorario->getHora24();
        $horarioSalio = $empresaHorario->getHoraFin24();
        $horaIngreso = $empresaHorario->getHora24();
        $HORARIOemPLEADO = UsuarioHorarioQuery::create()->filterByUsuario($Empleado->getUsuario())->findOne();
        $minutoex = 0;
        if ($HORARIOemPLEADO) {
            $horario = $HORARIOemPLEADO->getHora();
            $horario = str_replace(":","", $horario);
            $horario = str_replace("AM","", $horario);
            $horario = TRIM($horario);            
            $horarioSalio = $HORARIOemPLEADO->getHoraFin();
            $horarioSalio = str_replace(":","", $horarioSalio);
            $horarioSalio = str_replace("PM","", $horarioSalio);
            $horarioSalio = TRIM($horarioSalio)+1200;     
            $minutoex = $HORARIOemPLEADO->getMinutoProrroga();
            
        }
        $minuPe =substr($horario, - 2) ; 
        $horaIngreso = substr($horario, 0, strlen($horario) - 2) * 60;
        $horaIngreso = $horaIngreso+$minuPe+$minutoex;
        $minuPeS =substr($horarioSalio, - 2) ; 
        $horaSalio = $horarioSalio;
        $horaSalio = substr($horaSalio, 0, strlen($horaSalio) - 2) * 60;
        $horaSalio = $horaSalio+$minuPeS;
        $fechaInicio = explode('/', $fechaInicio);
        $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
        $fechaFin = explode('/', $fechaFin);
        $fechaFin = $fechaFin[2] . '-' . $fechaFin[1] . '-' . $fechaFin[0];
        $date1 = new DateTime($fechaInicio);
        $date2 = new DateTime($fechaFin);
        $diff = $date1->diff($date2);
        $dias = $diff->days;
        $suma = 0;
        $DATE = $fechaInicio;
        $lista = null;
        $feriados = '0,7,6';
        $feriadosD = explode(",", $feriados);
        $feriados = null;
        foreach ($feriadosD as $fe) {
            $feriados[$fe] = $fe;
        }
        for ($suma = 0; $suma <= $dias; $suma++) {
            $ausencia = '';
            $fechaMuestra = date('Y-m-d', strtotime($DATE . ' + ' . $suma . ' days'));
            $DiaMuestra = date('N', strtotime($DATE . ' + ' . $suma . ' days'));
            $asistenciaUu = AsistenciaUsuarioQuery::create()
                    ->withColumn('min(AsistenciaUsuario.Hora)', 'Min')
                    ->withColumn('max(AsistenciaUsuario.Hora)', 'Max')
                    ->withColumn('max(AsistenciaUsuario.MinutoTarde)', 'TardeMax')
                    ->filterByDia($fechaMuestra)
                    ->filterByUsuario($Empleado->getUsuario())
                    ->findOne();
            $entroHora = 0;
            $entroMin = 0;
            $entro = $asistenciaUu->getMin();
            $salio = $asistenciaUu->getMax();

            $ingresado = 0;
            if ($entro) {
                $arrayEntro = explode(":", $entro);
                $entroHora = $arrayEntro[0] * 60;
                $entroMin = (int) $arrayEntro[1];
                $ingresado = $entroHora + $entroMin;
            }
            $diferencia = $ingresado - $horaIngreso;

       
            $salido = 0;
            if ($salio) {
                $arraySalio = explode(":", $salio);
                $entroHora = $arraySalio[0] * 60;
                $entroMin = (int) $arraySalio[1];
                $salido = $entroHora + $entroMin;
            }
            $horasTrabajado = $salido - $ingresado;
            $diferenciaSalida = $salido - $horaSalio;
            $salioTemprano = 0;
            $minutoExtra = 0;
            if ($diferenciaSalida < 0) {
                $salioTemprano = $diferenciaSalida * -1;
            }

            if ($diferenciaSalida > 0) {
                $minutoExtra = $diferenciaSalida;
                if ($diferencia > 0) {
                    $minutoExtra = $minutoExtra - $diferencia;
                    if ($minutoExtra < 0) {
                        $minutoExtra = '';
                    }
                }
            }
            if (!array_key_exists($DiaMuestra, $feriados)) {
                // verificamos que no marco
                if ((trim($entro) == "" ) && (trim($salio) == "" )) {
                    if (date('Y-m-d') > $fechaMuestra)
                        $ausencia = 1;
                }
            }

            $solicitudAusencia = SolicitudAusenciaQuery::create()
                    ->where("SolicitudAusencia.Fecha <= '" . $fechaMuestra . " 00:00:00" . "'")
                    ->where("SolicitudAusencia.FechaFin >= '" . $fechaMuestra . " 23:59:00" . "'")
                    ->filterByUsuarioId($Empleado->getId())
                    ->count();
//              
            $data['fecha'] = $fechaMuestra;
            $data['dia'] = $DiaMuestra;
            $data['diaNombre'] = ProyectoQuery::semana($DiaMuestra);
            $data['entrada'] = $entro;
            $data['HoraIngreso'] = '';
            $data['MinTarde'] = '';
            if ($entro) {
                $data['HoraIngreso'] = $horaIngreso;
                if ($diferencia > 0) {
                    $data['MinTarde'] = $diferencia;
                }
            }
            $data['horastrabajo'] = '';
            $data['salida'] = '';
            $data['HoraSalida'] = '';
            $data['DifSalida'] = '';
            $data['SalidaTemprano'] = '';
            $data['MinutoExtra'] = '';
            $data['Ausencia'] = $ausencia;
            //$data['feriados'] = $feriados;  
            $data['justifica'] = '';
            if ($solicitudAusencia > 0) {
                $data['justifica'] = 8;
            }


            if ($salio) {
                $data['salida'] = $salio;
                $data['HoraSalida'] = $horarioSalio;
                $data['DifSalida'] = $diferenciaSalida;
                if ($salioTemprano) {
                    $data['SalidaTemprano'] = $salioTemprano;
                }
                if ($minutoExtra) {
                    $data['MinutoExtra'] = $minutoExtra;
                }
            }
            if ($horasTrabajado > 0) {
                $data['horastrabajo'] = round($horasTrabajado / 60, 0);
            }
            $lista[] = $data;
        }

        return $lista;
    }

    static public function semana($nu) {
        $data[1] = 'Lun';
        $data[2] = 'Mar';
        $data[3] = 'Mie';
        $data[4] = 'Juv';
        $data[5] = 'Vie';
        $data[6] = 'Sab';
        $data[7] = 'Dom';
        $dia = $data[$nu];
        return $dia;
    }
static public function tardes($Empleado, $fechaInicio, $fechaFin){
    
//    echo $fechaInicio;
//    die();
    $TotalTarde=0;
      $empresaHorario = EmpresaHorarioQuery::create()->findOneByEmpresa($Empleado->getEmpresa());
        $horario = $empresaHorario->getHora24();
        $horarioSalio = $empresaHorario->getHoraFin24();
        $horaIngreso = $empresaHorario->getHora24();
        $HORARIOemPLEADO = UsuarioHorarioQuery::create()->filterByUsuario($Empleado->getUsuario())->findOne();
        $minutoex = 0;
        if ($HORARIOemPLEADO) {
            $horario = $HORARIOemPLEADO->getHora();
            $horario = str_replace(":","", $horario);
            $horario = str_replace("AM","", $horario);
            $horario = TRIM($horario);            
            $horarioSalio = $HORARIOemPLEADO->getHoraFin();
            $horarioSalio = str_replace(":","", $horarioSalio);
            $horarioSalio = str_replace("PM","", $horarioSalio);
            $horarioSalio = TRIM($horarioSalio)+1200;     
            $minutoex = $HORARIOemPLEADO->getMinutoProrroga();
            
        }
        $minuPe =substr($horario, - 2) ; 
        $horaIngreso = substr($horario, 0, strlen($horario) - 2) * 60;
        $horaIngreso = $horaIngreso+$minuPe+$minutoex;
        $minuPeS =substr($horarioSalio, - 2) ; 
        $horaSalio = $horarioSalio;
        $horaSalio = substr($horaSalio, 0, strlen($horaSalio) - 2) * 60;
        $horaSalio = $horaSalio+$minuPeS;
      //  $fechaInicio = explode('/', $fechaInicio);
      //  $fechaInicio = $fechaInicio[2] . '-' . $fechaInicio[1] . '-' . $fechaInicio[0];
      //  $fechaFin = explode('/', $fechaFin);
      //  $fechaFin = $fechaFin[2] . '-' . $fechaFin[1] . '-' . $fechaFin[0];
        $date1 = new DateTime($fechaInicio);
        $date2 = new DateTime($fechaFin);
        $diff = $date1->diff($date2);
        $dias = $diff->days;
        $suma = 0;
        $DATE = $fechaInicio;
        $lista = null;
        $feriados = '0,7,6';
        $feriadosD = explode(",", $feriados);
        $feriados = null;
        foreach ($feriadosD as $fe) {
            $feriados[$fe] = $fe;
        }
        for ($suma = 0; $suma <= $dias; $suma++) {
            $ausencia = '';
            $fechaMuestra = date('Y-m-d', strtotime($DATE . ' + ' . $suma . ' days'));
            $DiaMuestra = date('N', strtotime($DATE . ' + ' . $suma . ' days'));
            $asistenciaUu = AsistenciaUsuarioQuery::create()
                    ->withColumn('min(AsistenciaUsuario.Hora)', 'Min')
                    ->withColumn('max(AsistenciaUsuario.Hora)', 'Max')
                    ->withColumn('max(AsistenciaUsuario.MinutoTarde)', 'TardeMax')
                    ->filterByDia($fechaMuestra)
                    ->filterByUsuario($Empleado->getUsuario())
                    ->findOne();
            $entroHora = 0;
            $entroMin = 0;
            $entro = $asistenciaUu->getMin();
            $salio = $asistenciaUu->getMax();

            $ingresado = 0;
            if ($entro) {
                $arrayEntro = explode(":", $entro);
                $entroHora = $arrayEntro[0] * 60;
                $entroMin = (int) $arrayEntro[1];
                $ingresado = $entroHora + $entroMin;
            }
            $diferencia = $ingresado - $horaIngreso;

       
            $salido = 0;
            if ($salio) {
                $arraySalio = explode(":", $salio);
                $entroHora = $arraySalio[0] * 60;
                $entroMin = (int) $arraySalio[1];
                $salido = $entroHora + $entroMin;
            }
            $horasTrabajado = $salido - $ingresado;
            $diferenciaSalida = $salido - $horaSalio;
            $salioTemprano = 0;
            $minutoExtra = 0;
            if ($diferenciaSalida < 0) {
                $salioTemprano = $diferenciaSalida * -1;
            }

            if ($diferenciaSalida > 0) {
                $minutoExtra = $diferenciaSalida;
                if ($diferencia > 0) {
                    $minutoExtra = $minutoExtra - $diferencia;
                    if ($minutoExtra < 0) {
                        $minutoExtra = '';
                    }
                }
            }
            if (!array_key_exists($DiaMuestra, $feriados)) {
                // verificamos que no marco
                if ((trim($entro) == "" ) && (trim($salio) == "" )) {
                    if (date('Y-m-d') > $fechaMuestra)
                        $ausencia = 1;
                }
            }
            $solicitudAusencia = SolicitudAusenciaQuery::create()
                    ->where("SolicitudAusencia.Fecha <= '" . $fechaMuestra . " 00:00:00" . "'")
                    ->where("SolicitudAusencia.FechaFin >= '" . $fechaMuestra . " 23:59:00" . "'")
                    ->filterByUsuarioId($Empleado->getId())
                    ->count();
//              
            $data['fecha'] = $fechaMuestra;
            $data['dia'] = $DiaMuestra;
            $data['diaNombre'] = ProyectoQuery::semana($DiaMuestra);
            $data['entrada'] = $entro;
            $data['HoraIngreso'] = '';
            $data['MinTarde'] = '';
            if ($entro) {
                $data['HoraIngreso'] = $horaIngreso;
                if ($diferencia > 0) {
                    $TotalTarde = $TotalTarde+1;
                    $data['MinTarde'] = $diferencia;
                }
            }
         
        }
return $TotalTarde;
}
    
    
}
