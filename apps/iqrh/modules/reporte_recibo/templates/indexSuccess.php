<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-blue-steel uppercase">Mis recibos de Pago </span> 
            <i class="fa fa-sticky-note font-yellow-saffron"></i>
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
                    <td>Planilla</td>
                    <td>Codigo</td>
                    <td>Empleado</td>
                    
                    <td>Fecha Inicio </td>
                    <td>Fecha Fin</td>     
                    <td>Departamento</td>
                    <td>Laborados</td>
                    <td>Total Sueldo</td>
                    <td></td>
                </tr> 
            </thead>
            <tbody>
                <?Php foreach ($encabezados as $lista) { ?>
                <?php $cabecera = ReciboCabeceraQuery::create()->findOneByCabeceraIn($lista->getCabeceraIn()); ?>
<?php if ($cabecera) { ?>            
   <?php $cod =trim($lista->getCodigo()); ?>
                <tr>
                    <td align="center"><?php echo $cabecera->getPlanilla(); ?></td>
                     <td><?php echo $lista->getCodigo(); ?></td>
                      <td><?php echo $lista->getEmpleado(); ?></td>
                    <td><?php echo $cabecera->getInicio(); ?></td>
                    <td><?php echo $cabecera->getFin(); ?></td>
                    <td align="center"> <?php echo $lista->getDepartamento(); ?></td>
                    <td align="right"><?php  echo number_format($lista->getLaborados(),0) ?></td>
                    <td align="right"><?php echo number_format($lista->getTotalSueldoLiquido(),2); ?></td>
                    <td>        <a class="btn btn-block btn-xs  btn-outline blue-soft " target="_blank"  href="<?php echo url_for('reporte/recibo?id='.$lista->getCabeceraIn()."&cod=".$cod);?>">
                            <i class="fa fa-print"></i> Recibo </a>
                         </td>
                        
                    
                </tr>
                          
                <?php } ?>   
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>