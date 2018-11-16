<?php



/**
 * Skeleton subclass for performing query and update operations on the 'aumento_usuario' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 06/17/18 04:35:04
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AumentoUsuarioQuery extends BaseAumentoUsuarioQuery
{
        static public function fines($fechaInicio, $fechaFin) {
                         $datetime1 = new DateTime($fechaInicio);
        $datetime2 = new DateTime($fechaFin);
        $interval = $datetime1->diff($datetime2);
        $dias = str_replace("+", "", $interval->format('%R%a'));
        $SEMANA = NULL;
        $fines =0;
        for ($i = 0; $i <= $dias; $i++) {
            $fecha = $fechaInicio;
            $nuevafecha = strtotime('+' . $i . ' day', strtotime($fecha));
            $fecha = date('Y-m-d', $nuevafecha);
            $diaSemana = date('N', $nuevafecha);
            if ($diaSemana ==7) {
                $fines = $fines+1;       
            }
      
            if ($diaSemana ==6) {
              $fines = $fines+1;               
            }
        }
        return $fines;
        }
}
