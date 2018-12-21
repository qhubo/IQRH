<!--<script src='/assets/global/plugins/jquery.min.js'></script>-->
<?php $modulo = $sf_params->get('module'); ?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-ship font-yellow-saffron"></i>
            <span class="caption-subject bold font-blue ">Listado notifiaciones</span>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">
            </div>
        </div>
    </div>
    <div class="portlet-body">

      
        
        
           <table class="table table-bordered  dataTable table-condensed flip-content" id="sample_1">
            <thead class="flip-content">
                <tr class="info">
                     <td>#</td>
                    <td>Fecha </td>
                     <td>Codigo</td>
                    <td>Empleado</td>
                    <td>Tipo</td>
                    <td>Motivo</td>
                </tr> 
            </thead>
            <tbody>
                <?Php foreach ($bitacoras as $lista) { ?>
                <tr>
                    <td align="right"><?php echo $lista->getId() ?></td>
                    <td align="center"> <?php echo $lista->getFecha('d/m/Y'); ?></td>
                    <td align="center"><?php echo $lista->getUsuario()->getCodigo(); ?></td>
                     <td align="center"><?php echo $lista->getUsuario()->getNombreCompleto(); ?></td>
                    <td align="right"><?php echo $lista->getTipo(); ?></td>
                    <td><?php echo html_entity_decode($lista->getMotivo()); ?></td>
                    
                </tr>
                    
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
