<?php

/**
 * Skeleton subclass for performing query and update operations on the 'usuario_vacacion' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 01/12/19 03:45:05
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class UsuarioVacacionQuery extends BaseUsuarioVacacionQuery {

    static public function periodos($codigo) {
        $listado = null;
        $usuarioQ = UsuarioQuery::create()
                ->findOneByCodigo($codigo);
        if ($usuarioQ->getFechaAlta()) {
            $fechaAlta = $usuarioQ->getFechaAlta('Y');
            $ano = $usuarioQ->getFechaAlta('Y');
            $datetime1 = new DateTime($usuarioQ->getFechaAlta('Y-m-d'));
            $datetime2 = new DateTime(date('Y-m-d'));
            $interval = $datetime1->diff($datetime2);

            $dias = $interval->format('%a');

//        echo $dias;
//        echo "<br>";
            $derechos = ($dias / 365) * 15;
//            echo ($dias / 365);
//            echo "<br>";

            $derechos = round($derechos, 2);
//            echo $derechos;
//            echo "<br>";
            $saldo = $derechos;
            $totalPagado = 0;

            for ($periodo = $ano; $periodo < date('Y'); $periodo++) {
                $vacacioQ = UsuarioVacacionQuery::create()
                        ->filterByUsuario($codigo)
                        ->filterByPeriodo($periodo)
                        ->findOne();
                $derecho = 0;

                if ($periodo < date('Y')) {
                    $derecho = 15;
                }
                $pagado = 0;
                if ($vacacioQ) {
                    $derecho = $vacacioQ->getDerecho();
                    $pagado = $vacacioQ->getPagado();
                }
                $totalPagado = $totalPagado + $derecho;
                if ($derechos < $totalPagado) {

                    $derecho = $derechos - ($totalPagado - 15);
                }
                $data['periodo'] = $periodo;
                $data['derecho'] = $derecho;
                $data['pagada'] = $pagado;
                $data['TotalPagado'] = $totalPagado;
                $listado[] = $data;
//                     echo $totalPagado;
//            echo "<br>";
            }
            
       
          //  echo $derechos." <br>";
            if ($derechos > $totalPagado) {
//                $derec = ($totalPagado + 15) - $derechos;
            $derec = $derechos-$totalPagado;

                $data['periodo'] = date('Y');
                $data['derecho'] = $derec;
               $data['pagada'] = 0;
                $data['TotalPagado'] = $totalPagado;
                $listado[] = $data;
            }
        }
    //    die();
        return $listado;
    }

}
