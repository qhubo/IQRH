<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-yellow-casablanca uppercase">Finiquitos </span> 
            <i class="fa fa-list font-yellow-crusta"></i>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">

            </div>
        </div>
        <div class="inputs">
        </div>
    </div>
    <div class="portlet-body">
            <div class="table-scrollable">
        <table class="table table-bordered  dataTable table-condensed flip-content" id="sample_1">
            <thead class="flip-content">
                <tr class="info">
                    <td>Fecha </td>
                    <td>Usuario Grabo</td>
                    <td>Empleado</td>
                    <td>Fecha Retiro</td>
                    <td>Motivo</td>
                    <td>Estado</td>                    
                    <td>Observaciones</td>                                        
                </tr> 
            </thead>
            <tbody>
                <?Php foreach ($registros as $lista) { ?>
                <?php $usuarioGra = UsuarioQuery::create()->findOneById($lista->getUsuarioGraba()); ?>   
                <?php $usuarioRet = UsuarioQuery::create()->findOneById($lista->getUsuarioRetiro()); ?>
                <tr>
                        <td align="center"> <?php echo $lista->getCreatedAt('d/m/Y'); ?></td>
                        <td><?php echo $usuarioGra->getNombreCompleto(); ?></td>
                        <td><?php echo $usuarioRet->getNombreCompleto(); ?></td>
                        <td align="center"> <?php echo $lista->getFechaRetiro('d/m/Y'); ?></td>
                        <td><?php echo html_entity_decode($lista->getMotivo()); ?></td>
                        <td><?php echo $lista->getEstado(); ?></td>
                         <td><?php echo $lista->getObservaciones(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
                </div>
    </div>
</div>