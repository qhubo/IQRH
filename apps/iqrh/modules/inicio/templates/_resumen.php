               
<?php $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'); ?>
<?php
$campanas = CampanaQuery::create()
        ->filterByTipoCampanaId(1)
        ->filterByUsuarioId($usuarioId)
        ->filterByEstado('Activo', Criteria::IN)
        ->find();
?>

<div class="table-scrollable table-scrollable-borderless">
                                <table class="table table-hover table-light">
                                    <thead>
                                        <tr class="uppercase">
                                            <th colspan="2"> Campaña </th>
                                            <th> Fecha Fin</th>
                                            <th> Click </th>
                                            <th align="center" >Q Maximo </th>
                                            <th  align="center">Q Utilizado</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($campanas as $list){ ?>
                                    <tr>
                                        <td class="fit"> <img class="user-pic rounded" src="<?php echo '/uploads/campa/'.$list->getBannerHorizontal() ?>"></td>                                        
                                        <td><a href="javascript:;" class="primary-link"><?php echo  $list->getNombre() ?> </a></td>
                                        <td> <?php echo $list->getFechaFin('d/m/y'); ?> </td>
                                        <td> <?php echo $list->getClick(); ?> </td>
                                        <td align="right"> <?php echo number_format($list->getPresupuestoMaximo(),2); ?> </td>
                                        <td align="right"><?php echo number_format($list->getPresupuestoUtilizado(),2); ?>
<!--                                            <span class="bold theme-font">80%</span>-->
                                        </td>
                                    </tr>
                                    <?php } ?>
                                  
                                </table>
                            </div>