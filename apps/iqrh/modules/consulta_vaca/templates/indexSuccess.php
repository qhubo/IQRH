<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-purple-plum uppercase">Consulta de  Vacaciones </span> 
            <i class="fa fa-ship font-yellow-saffron"></i>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">

            </div>
        </div>
        <div class="inputs">
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-bordered  dataTable table-condensed flip-content" id="sample_1">
            <thead class="flip-content">
                <tr class="info">
                    <td>Fecha Inicio</td>
                    <td>Fecha Fin</td>
                    <td>Dias</td>
                    <td>Motivo</td>
                    <td>Estado</td>
      <td>Observaciones</td>
                </tr> 
            </thead>
            <tbody>
                <?Php foreach ($registros as $lista) { ?>
                <tr>
                    <td align="center"> <?php echo $lista->getFechaInicio('d/m/Y'); ?></td>
                    <td align="center"><?php echo $lista->getFechaFin('d/m/Y'); ?></td>
                    <td align="right"><?php echo $lista->getDia() ?></td>
                    <td><?php echo $lista->getMotivo(); ?></td>
                    <td><?php echo $lista->getEstado(); ?></td>
                    <td><?php echo $lista->getObservaciones(); ?></td>
                    
                </tr>
                    
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>