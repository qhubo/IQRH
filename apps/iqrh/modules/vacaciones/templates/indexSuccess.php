<?php $modulo = $sf_params->get('module'); ?>
<?php //include_partial('soporte/avisos')       ?>
<?php $bodegaId = sfContext::getInstance()->getUser()->getAttribute("usuario", null, 'bodega'); ?>
<script src='/assets/global/plugins/jquery.min.js'></script>
<?php $muestrabusqueda = sfContext::getInstance()->getUser()->getAttribute('muestrabusqueda', null, 'busqueda'); ?>
<?php $linea = unserialize(sfContext::getInstance()->getUser()->getAttribute('carga', null, 'busqueda')); ?>
<?php echo $form->renderFormTag(url_for($modulo . '/index'), array('class' => 'form-horizontal"')) ?>
<?php echo $form->renderHiddenFields() ?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">

            <span class="caption-subject bold font-yellow-crusta uppercase"> Solicitud de Vacaciones </span> 

            <i class="fa fa-ship font-purple-plum"></i>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp; Ingresa el dia que te ausentarás&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">

            </div>
        </div>
        <div class="inputs">
        </div>
    </div>
    <div class="portlet-body">
        <div class="form-body">

            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1_1" data-toggle="tab">
                        <span class="caption-subject font-green uppercase bold">Ingreso  </span>
                    </a>
                </li>
                <li>
                    <a href="#tab_1_3" data-toggle="tab">Periodos</a>
                </li>
            </ul>

            <div class="tab-content">
                <!-- PERSONAL INFO TAB -->
                <div class="tab-pane active" id="tab_1_1">
                    <?php include_partial('vacaciones/forma', array('pendientes'=>$pendientes, 'form' => $form, 'usuario' => $usuario)) ?> 
                </div>


                <div class="tab-pane " id="tab_1_3">
                    <table class="table table-bordered  dataTable table-condensed flip-content" >
                        <thead class="flip-content">
                            <tr class="info">
                                <td>Periodo</td>
                                <td>Dias Derecho</td>
                                <td>Dias Pagado</td>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php foreach ($vacaciones as $reg) { ?>
                                <tr>
                                    <td align="center" ><?php echo $reg['periodo']; ?></td>
                                    <td align="right"><?php echo $reg['derecho']; ?></td>
                                    <td  align="right"><?php echo $reg['pagada']; ?></td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>


                </div>


            </div>
        </div>
        <?php echo '</form>'; ?>      
    </div>

</div>