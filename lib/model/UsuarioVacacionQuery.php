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
        $diaDe = $usuarioQ->getDerechoVaca();
        if ($usuarioQ->getFechaAlta()) {
            $fechaAlta = $usuarioQ->getFechaAlta('Y');
            
            $ano = $usuarioQ->getFechaAlta('Y');
            $datetime1 = new DateTime($usuarioQ->getFechaAlta('Y-m-d'));
            $datetime2 = new DateTime(date('Y-m-d'));
            $interval = $datetime1->diff($datetime2);

            $dias = $interval->format('%a');
            $dias = $dias+1;

            // echo $dias;
            // echo "<br>";
            $derechos = ($dias / 365) * $diaDe;
//            echo ($dias / 365);
//            echo "<br>";

            $derechos = round($derechos, 2);
            echo $derechos;
            echo "<br>";
            $saldo = $derechos;
            $totalPagado = 0;
            $saldo = 0;
            for ($periodo = $ano; $periodo < date('Y'); $periodo++) {
                $vacacioQ = UsuarioVacacionQuery::create()
                        ->filterByUsuario($codigo)
                        ->filterByPeriodo($periodo)
                        ->findOne();
                $derecho = 0;

                if ($periodo < date('Y')) {
                    $derecho = $diaDe;
                }
                $pagado = 0;
                if ($vacacioQ) {
                    echo "aqui ".$periodo;
                    echo "<br>";
                    $derecho = $vacacioQ->getDerecho();
                    $pagado = $vacacioQ->getPagado();
                }
                $totalPagado = $totalPagado + $derecho;
//                if ($derechos <= $totalPagado) {
//
//                    $derecho = $derechos - ($totalPagado - $diaDe);
//                }
                if ($derecho < $diaDe) {
                    $saldo = 1;
                }
                $data['periodo'] = $periodo;
                $data['derecho'] = $derecho;
                $data['pagada'] = $pagado;
                $data['TotalPagado'] = $totalPagado;
                $listado[$periodo] = $data;
//                     echo $totalPagado;
//            echo "<br>";
            }


            if ($derechos > $totalPagado) {
                if ($saldo == 0) {
$paga = 0;
                    $pq= UsuarioVacacionQuery::create()
                            ->filterByPeriodo(date('Y'))
                            ->filterByUsuario($codigo)
                            ->findOne();
                    if ($pq) {
                        $paga = $pq->getPagado();
                    }
                    $derec = $derechos - $totalPagado;
                    $data['periodo'] = date('Y');
                    $data['derecho'] = $derec;
                    $data['pagada'] = $paga;
                    $data['TotalPagado'] = $totalPagado;
                    $listado[date('Y')] = $data;
                }
                if ($saldo == 1) {
                    $derec = $derechos - $totalPagado;
                    $data['periodo'] = $periodo - 1;
                    $data['derecho'] = $derecho + $derec;
                    $data['pagada'] = $pagado;
                    $data['TotalPagado'] = $totalPagado;
                    $listado[$periodo - 1] = $data;
                }
            }
        }
        //    die();
        
        echo "<pre>";
        print_r($listado);
        die();
        return $listado;
    }

}
