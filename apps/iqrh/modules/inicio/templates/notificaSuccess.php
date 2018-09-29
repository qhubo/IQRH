<script src='/assets/global/plugins/jquery.min.js'></script>
<?php $modulo = $sf_params->get('module'); ?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-list font-blue-steel"></i>
            <span class="caption-subject bold font-green ">Vacaciones Aprobar / Rechazar </span>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">
            </div>
        </div>
    </div>
    <div class="portlet-body">




        <table class="table table-bordered  dataTable table-condensed flip-content" id="sample_1ZZ">
            <thead class="flip-content">
                <tr class="info">
                    <th width="4%" align="center">#</th>
                    <th width="8%" align="center"><div align="center"> Fecha Inicio</div></th>
                    <th width="20%" align="center"><div align="center"> Empleado </div></th>
                    <th align="center"><div align="center">Fecha Fin</div></th>
                    <th align="center"><div align="center">Dias</div></th>
                    <th align="center"><div align="center">Motivo</div></th>
                    <th align="center"><div align="center">Estado</div></th>
                    <th align="center"><div align="center">Observaciones</div></th>
                     <td width="10%"></td>
                    <td width="10%"></td>
                </tr> 
            </thead>
            <tbody>
                <?Php foreach ($vacaciones as $lista) { ?>
                    <tr>
                        <td align="right"><?php echo $lista->getId() ?></td>
                        <td align="center"> <?php echo $lista->getFechaInicio('d/m/Y'); ?></td>
                        <td><strong><?php echo $lista->getUsuario()->getCodigo(); ?></strong>
                            <br>
                            <?php echo $lista->getUsuario()->getNombreCompleto(); ?>
                        </td>
                        <td align="center"><?php echo $lista->getFechaFin('d/m/Y'); ?></td>
                        <td align="right"><?php echo $lista->getDia() ?></td>
                        <td><?php echo $lista->getMotivo(); ?></td>
                        <td><?php echo $lista->getEstado(); ?></td>
                        <td><?php echo $lista->getObservaciones(); ?></td>
                                                <td> <?php if ($lista->getArchivoUno()) { ?>
                            <a class="btn  btn-xs  blue btn-outline" target="_new"  href="/uploads/carga/<?php echo $lista->getArchivoUno(); ?>" > <li class="fa fa-download"></li> Archivo </a>  
                            <?php } ?></td>
                        <td> <a class="btn  blue-steel btn-xs btn-outline btn-block "   href="<?php echo url_for($modulo . '/autorizadov?id=' . $lista->getId()) ?>"  data-toggle="modal" data-target="#ajaxmodalV<?php echo $lista->getId() ?>"><i class="fa fa-check"></i> Aceptar</a>
                            <br>
                            <a class="btn  red btn-xs btn-outline btn-block "   href="<?php echo url_for($modulo . '/rechazov?id=' . $lista->getId()) ?>"  data-toggle="modal" data-target="#ajaxmodalVE<?php echo $lista->getId() ?>"><i class="fa fa-eraser"></i> Rechazar</a>



                        </td>

                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>




<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-list-ul font-green"></i>
            <span class="caption-subject bold font-blue-steel ">Ausencias Aprobar / Rechazar </span>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">
            </div>
        </div>
    </div>
    <div class="portlet-body">

        <div class="row">
            <div class="col-md-12 font font-grey-cararra" > </div>          
        </div>
        <table class="table table-bordered  dataTable table-condensed flip-content" id="sample_1ZZ">
            <thead class="flip-content">
                <tr class="success">
                    <td width="4%">#</td>
                    <th width="8%" align="center"><div align="center"> Fecha </div></th>
                    <th width="20%" align="center"><div align="center"> Empleado </div></th>
                    <th align="center"><div align="center"> Motivo </div></th>
                    <th align="center"><div align="center"> Estado </div></th>
                    <th align="center"><div align="center"> Observaciones </div></th>
                        <td width="10%"></td>
                    <td width="10%"></td>
                </tr> 
            </thead>
            <tbody>
                <?Php foreach ($ausencias as $lista) { ?>
                    <tr>
                        <td align="right"><?php echo $lista->getId() ?></td>
                        <td align="center"> <?php echo $lista->getFecha('d/m/Y'); ?></td>
                        <td><strong><?php echo $lista->getUsuario()->getCodigo(); ?></strong>
                            <br>
                            <?php echo $lista->getUsuario()->getNombreCompleto(); ?></td>
                        <td><?php echo $lista->getMotivo(); ?></td>
                        <td><?php echo $lista->getEstado(); ?></td>
                        <td><?php echo $lista->getObservaciones(); ?></td>
                        <td> <?php if ($lista->getArchivoUno()) { ?>
                            <a class="btn  btn-xs  blue btn-outline" target="_new"  href="/uploads/carga/<?php echo $lista->getArchivoUno(); ?>" > <li class="fa fa-download"></li> Archivo </a>  
                            <?php } ?></td>
                        <td>
                            <a class="btn  blue-steel btn-xs btn-outline btn-block "   href="<?php echo url_for($modulo . '/autorizado?id=' . $lista->getId()) ?>"  data-toggle="modal" data-target="#ajaxmodal<?php echo $lista->getId() ?>"><i class="fa fa-check"></i> Aceptar</a>
                            <br>
                            <a class="btn  red btn-xs btn-outline btn-block "   href="<?php echo url_for($modulo . '/rechazo?id=' . $lista->getId()) ?>"  data-toggle="modal" data-target="#ajaxmodalE<?php echo $lista->getId() ?>"><i class="fa fa-eraser"></i> Rechazar</a>



                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>






<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-th-list font-blue-hoki"></i>
            <span class="caption-subject bold font-blue ">Solicitudes Aprobar / Rechazar </span>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">
            </div>
        </div>
    </div>
    <div class="portlet-body">

        <div class="row">
            <div class="col-md-12 font font-grey-cararra" > </div>          
        </div>
        <table class="table table-bordered  dataTable table-condensed flip-content" id="sample_1ZZ">
            <thead class="flip-content">
                <tr class="warning">
                    <td width="4%">#</td>
                    <th width="8%" align="center"><div align="center"> Fecha </div></th>
                    <th width="20%" align="center"><div align="center"> Empleado </div></th>
                    <th align="center"><div align="center"> Motivo </div></th>
                    <th align="center"><div align="center"> Estado </div></th>
                    <th align="center"><div align="center"> Observaciones </div></th>
                        <td width="10%"></td>
                    <td width="10%"></td>
                </tr> 
            </thead>
            <tbody>
                <?Php foreach ($solicitudes as $lista) { ?>
                    <tr>
                        <td align="right"><?php echo $lista->getId() ?></td>
                        <td align="center"> <?php echo $lista->getFecha('d/m/Y'); ?></td>
                        <td><strong><?php echo $lista->getUsuario()->getCodigo(); ?></strong>
                            <br>
                            <?php echo $lista->getUsuario()->getNombreCompleto(); ?></td>
                        <td><?php echo $lista->getCatalogoSolicitud(); ?></td>
                        <td><?php echo $lista->getEstado(); ?></td>
                        <td><?php echo $lista->getObservaciones(); ?></td>
                        
                        <td>
                            <?php if ($lista->getArchivoUno()) { ?>
                            <a class="btn  btn-xs  blue btn-outline" target="_new"  href="/uploads/carga/<?php echo $lista->getArchivoUno(); ?>" > <li class="fa fa-download"></li> Archivo </a>  
                            <?php } ?>
                        </td>
                        <td>
                            <a class="btn  blue-steel btn-xs btn-outline btn-block "   href="<?php echo url_for($modulo . '/autorizadoS?id=' . $lista->getId()) ?>"  data-toggle="modal" data-target="#ajaxmodalSS<?php echo $lista->getId() ?>"><i class="fa fa-check"></i> Aceptar</a>
                            <br>
                            <a class="btn  red btn-xs btn-outline btn-block "   href="<?php echo url_for($modulo . '/rechazoS?id=' . $lista->getId()) ?>"  data-toggle="modal" data-target="#ajaxmodalSSR<?php echo $lista->getId() ?>"><i class="fa fa-eraser"></i> Rechazar</a>



                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>





               <?Php foreach ($solicitudes as $reg) { ?>

    <div class="modal fade" id="ajaxmodalSS<?php echo $reg->getId() ?>" tabindex="-1"  data-toggle="modal" data-target="#responsivemodal"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 950px">
            <div class="modal-content" style=" width: 950px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
                    <h4 class="modal-title" id="myModalLabel6">Aceptar Operación</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ajaxmodalSSR<?php echo $reg->getId() ?>" tabindex="-1"  data-toggle="modal" data-target="#responsivemodal"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 950px">
            <div class="modal-content" style=" width: 950px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
                    <h4 class="modal-title" id="myModalLabel6">Rechazar  Operación</h4>
                </div>
            </div>
        </div>
    </div>
<?php } ?>




<?php foreach ($vacaciones as $reg) { ?>

    <div class="modal fade" id="ajaxmodalV<?php echo $reg->getId() ?>" tabindex="-1"  data-toggle="modal" data-target="#responsivemodal"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 950px">
            <div class="modal-content" style=" width: 950px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
                    <h4 class="modal-title" id="myModalLabel6">Aceptar Operación</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ajaxmodalVE<?php echo $reg->getId() ?>" tabindex="-1"  data-toggle="modal" data-target="#responsivemodal"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 950px">
            <div class="modal-content" style=" width: 950px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
                    <h4 class="modal-title" id="myModalLabel6">Rechazar  Operación</h4>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php foreach ($ausencias as $reg) { ?>

    <div class="modal fade" id="ajaxmodal<?php echo $reg->getId() ?>" tabindex="-1"  data-toggle="modal" data-target="#responsivemodal"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 950px">
            <div class="modal-content" style=" width: 950px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
                    <h4 class="modal-title" id="myModalLabel6">Aceptar Operación</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ajaxmodalE<?php echo $reg->getId() ?>" tabindex="-1"  data-toggle="modal" data-target="#responsivemodal"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 950px">
            <div class="modal-content" style=" width: 950px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
                    <h4 class="modal-title" id="myModalLabel6">Rechazar  Operación</h4>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
