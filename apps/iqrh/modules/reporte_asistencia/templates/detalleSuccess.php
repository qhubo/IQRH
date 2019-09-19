<script src='/assets/global/plugins/jquery.min.js'></script>
<?php $modulo = $sf_params->get('module'); ?>
<?php $modulo = $sf_params->get('module'); ?>
<?php  $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia')); ?>

<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-green-jungle uppercase">REPORTE ASISTENCIA</span> 
            <i class="fa fa-calendar-plus-o font-blue-steel"></i>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">

            </div>
        </div>
        <div class="inputs">
            <a class="btn  btn green-meadow " href="<?php echo url_for($modulo . '/muestra') ?>" ><i class="fa fa-hand-o-left"></i> Retornar </a>

        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1 bold Bold">Nombre</div>
            <div class="col-md-8"><?php echo $Empleado->getNombreCompleto(); ?></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1 bold Bold">Pais</div>
            <div class="col-md-3"><?php echo $Empleado->getEmpresa(); ?></div>
            <div class="col-md-1 bold Bold">Periodo</div>
            <div class="col-md-2">Del  <?php echo $valores['fechaInicio']; ?></div>
            <div class="col-md-2">Al <?php echo $valores['fechaFin']; ?></div>
            
             <div class="col-md-2">
                <a class="btn  btn red-flamingo btn-outline  btn-block "  target="_blank"  href="<?php echo url_for('reporte_asistencia/reporte?id='.$id) ?>" ><i class="fa fa-list"></i>&nbsp;&nbsp;Reporte&nbsp;&nbsp;  <i class="fa fa-file-pdf-o "></i></a>

            </div>    
        </div>

        <table class="table table-bordered  dataTable table-condensed flip-content" >
            <tr width="100%"  style="background-color: #E9C171">
                <td align="center"  style="xborder: 1px solid black;" xwidth="70px" >&nbsp;<font size="-1"><strong></strong></font>  </td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="70px" >&nbsp;<font size="-1"><strong></strong></font>  </td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="75px" colspan="2">&nbsp;<font size="-1"><strong>Turno 1</strong></font>  </td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Llegada Tarde</strong></font> </td>      
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Salida Temprano</strong></font></td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Tiempo extra</strong></font></td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Ausente</strong></font></td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Trabajados</strong></font></td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" colspan="2" >&nbsp;<font size="-1"><strong>Justificación</strong></font></td>
                <td></td>
            </tr>
            <tr width="100%"  style="background-color: #E9C171">
                <td align="center"  style="xborder: 1px solid black;" xwidth="70px" >&nbsp;<font size="-1"><strong>Fecha</strong></font>  </td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="70px" >&nbsp;<font size="-1"><strong>Dia</strong></font>  </td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="75px" >&nbsp;<font size="-1"><strong>Entrada</strong></font>  </td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="70px" >&nbsp;<font size="-1"><strong>Salida</strong></font>  </td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Minutos</strong></font> </td>      
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Minutos</strong></font></td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Horas</strong></font></td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Dias</strong></font></td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Horas</strong></font></td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Duración</strong></font></td>
                <td align="center"  style="xborder: 1px solid black;" xwidth="90px" >&nbsp;<font size="-1"><strong>Hora</strong></font></td>
                <td></td>
            </tr>
            <?php $totaltrabajados = 0 ; ?>
            <?php $totalausencias = 0 ; ?>
            <?php $salidatarde = 0 ; ?>
            <?php $llegadatarde = 0 ; ?>
            <?php $salidatemprano = 0 ; ?>
            <?php foreach ($lista as $reg) { ?>
            <?php if ($reg['horastrabajo']) { ?>
             <?php $totaltrabajados ++ ; ?>
            <?php } ?>
            <?php if ($reg['Ausencia']) { ?>
            <?php $totalausencias++ ; ?>
            <?php } ?>
            <?php if ($reg['MinutoExtra']) { ?>
            <?php $salidatarde++; ?>
            <?php } ?>
            <?php if ($reg['MinTarde']) { ?>
            <?php $llegadatarde++; ?>
            <?php } ?>
            <?php if ($reg['SalidaTemprano']) { ?>
            <?php $salidatemprano++; ?>
            <?php } ?>

            <tr>
                    <td align="center"  style=" xborder: 1px solid black;" xwidth="150px"  >&nbsp;<font size="-1"><?php echo $reg['fecha']; ?></font>  </td>
                    <td align="center" style="xborder: 1px solid black;" xwidth="170px"   >&nbsp;<font size="-1"><?php echo $reg['diaNombre']; ?></font>   </td>
                    <td align="center" style="xborder: 1px solid black;" xwidth="170px"   >&nbsp;<font size="-1"><?php echo $reg['entrada']; ?></font>   </td>
                    <td align="center"  style="xborder: 1px solid black;" xwidth="170px"   >&nbsp;<font size="-1"><?php echo $reg['salida']; ?></font>   </td>
                    <td align="center"  style="xborder: 1px solid black;" xwidth="170px"   >&nbsp;<font size="-1"><?php echo $reg['MinTarde']; ?></font>   </td>
                    <td align="center"  style="xborder: 1px solid black;" xwidth="170px"   >&nbsp;<font size="-1"><?php echo $reg['SalidaTemprano']; ?></font>   </td>
                    <td align="center"  style="xborder: 1px solid black;" xwidth="170px"   >&nbsp;<font size="-1"><?php echo $reg['MinutoExtra']; ?></font>   </td>
                    <td align="center"  style="xborder: 1px solid black;" xwidth="170px"   >&nbsp;<font size="-1"><?php echo $reg['Ausencia']; ?></font>   </td>
                    <td align="center"  style="xborder: 1px solid black;" xwidth="170px"   >&nbsp;<font size="-1"><?php echo $reg['horastrabajo']; ?></font>   </td>
                    <td></td>
                    <td align="center"  style="xborder: 1px solid black;" xwidth="170px"   >&nbsp;<font size="-1"><?php echo $reg['justifica']; ?></font>   </td>
                    <td></td>
                </tr>
            <?php } ?>
                <tr>
                    <td colspan="3" style="background-color:#DEDEDF "><font size="-1">Totales:</font></td>
                    <td colspan="8"></td>
                </tr>
                 <tr  style="background-color:#DEDEDF ">
                    <td colspan="2"><font size="-1">Dias Trabajados:</font></td>
                    <td colspan="1"><?php echo $totaltrabajados ?></td>
                    <td colspan="2"><font size="-1">Veces Salida Tarde:</font></td>
                    <td colspan="1"> <?php echo $salidatarde; ?></td>
                    <td colspan="2"><font size="-1">Veces Salida Temprano:</font></td>
                    <td colspan="1"></td>
                    <td colspan="2"><font size="-1">Horas Salida trabajo:</font></td>
                    <td colspan="1"></td>
                </tr>
                <tr  style="background-color:#DEDEDF ">
                    <td colspan="2"><font size="-1">Dias ausente:</font></td>
                    <td colspan="1"> <?php echo $totalausencias ?></td>
                    <td colspan="2"><font size="-1">LLegada Tarde:</font></td>
                    <td colspan="1"><?php echo  $llegadatarde ?></td>
                    <td colspan="2"><font size="-1">Salida Temprano:</font></td>
                    <td colspan="1"><?php echo  $salidatemprano ?></td>
                    <td colspan="2"><font size="-1">Horas Salidas :</font></td>
                    <td colspan="1"></td>
                </tr>
        </table>

    </div>
</div>