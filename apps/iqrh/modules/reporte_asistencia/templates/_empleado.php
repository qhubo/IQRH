<?php  $horamensual =160; ?>
<table class="table table-bordered  dataTable table-condensed flip-content" >
    <tr width="100%"  style="background-color: #E9C171">
        <td  style=" xborder: 1px solid black;" xwidth="150px" >&nbsp;<font size="-2"><strong>NOMBRE COMPLETO</strong></font>  </td>
        <td  style="xborder: 1px solid black;" xwidth="170px" >&nbsp;<font size="-2"><strong>PUESTO</strong></font>   </td>
        <td  style="xborder: 1px solid black;" xwidth="70px" >&nbsp;<font size="-2"><strong>DIAS<br>&nbsp;LABORADOS</strong></font>  </td>
        <td  style="xborder: 1px solid black;" xwidth="70px" >&nbsp;<font size="-2"><strong>LLEGADAS<br>&nbsp;TARDE</strong></font>  </td>
        <td  style="xborder: 1px solid black;" xwidth="75px" >&nbsp;<font size="-2"><strong>%<br>PUNTUALIDAD</strong></font>  </td>
        <td  style="xborder: 1px solid black;" xwidth="70px" >&nbsp;<font size="-2"><strong>HORAS<br>&nbsp; MENSUALES</strong></font>  </td>
        <td  style="xborder: 1px solid black;" xwidth="70px" >&nbsp;<font size="-2"><strong>HORAS<br>&nbsp; REALES</strong></font> </td>      
        <td  style="xborder: 1px solid black;" xwidth="50px" >&nbsp;<font size="-2"><strong>% HORAS</strong></font></td>
        <td></td>
    </tr>
<?php foreach ($Listado as $regi) { ?>
    <?php $puntualidad =0; ?>
        <tr>
            <td  style=" xborder: 1px solid black;" xwidth="150px"  >&nbsp;<font size="-2"><?php echo $regi->getNombreCompleto(); ?></font>  </td>
            <td  style="xborder: 1px solid black;" xwidth="170px"   >&nbsp;<font size="-2"><?php echo $regi->getPuesto(); ?></font>   </td>
            <td  style="xborder: 1px solid black;" xwidth="70px" align="center" >&nbsp;<font size="-1"><?php echo  $dias= AsistenciaUsuarioQuery::laborados($inicio, $fin, $regi->getUsuario());  ?></font>&nbsp;&nbsp;&nbsp;  </td>
            <td  style="xborder: 1px solid black;" xwidth="70px" align="center" >&nbsp;<font size="-1"><?php echo $tardes= AsistenciaUsuarioQuery::tardes($inicio, $fin, $regi->getUsuario());  ?></font>  </td>
            <?php if ($dias >0) { ?>
            <?php $puntualidad =(($tardes *100) /$dias); ?>
            <?php } ?>
            <td  style="xborder: 1px solid black;" xwidth="75px"  align="center" ><font size="-1">&nbsp; <?php echo  round($puntualidad,2); ?>%  </font></td>
            <td  style="xborder: 1px solid black;" xwidth="70px" align="center">&nbsp;<font size="-1"><?php echo $horamensual; ?> </font>  </td>
            <td  style="xborder: 1px solid black;" xwidth="70px" align="center">&nbsp;<font size="-1"><?php echo AsistenciaUsuarioQuery::Reales($inicio, $fin, $regi->getUsuario());  ?></font> </td>      
            <td  style="xborder: 1px solid black;" xwidth="50px" >&nbsp;<font size="-2"></font></td>
            <td>   <a class="btn  btn-xs blue-steel  btn-block "  target="_blank"  href="#<?php echo url_for('reporte/asistencia') ?>" >&nbsp;Reporte&nbsp;&nbsp;  <i class="fa fa-print"></i></a>

     
                
            </td>
        </tr>
<?php } ?>
</table>