
<?php $modulo = $sf_params->get('module'); ?>
<?php $modulo = $sf_params->get('module'); ?>
<?php $parametro = ParametroQuery::create()->findOne(); ?>
<?php  $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia')); ?>
<table style="width:720px">
    <tr>
        <td width="300px">    <img src="<?php echo '/uploads/segmento/'.$parametro->getLogo() ?>"  height="40px" ></td> 
        <td width="400px" style="text-align: left"><h2>Reporte Asistencia</h2> </td>
    </tr>
</table>



<table width="720px" >
    <tr width="720px" >
        <td width="100px"><h3>Nombre</h3></td>
        <td width="270px"><?php echo $Empleado->getNombreCompleto(); ?></td>
        <td width="100px"><h3>Pais</h3></td>
        <td width="220px"><?php echo $Empleado->getEmpresa(); ?></td>
    </tr>
    <tr width="720px" >
        <td width="100px"><h3>Periodo</h3></td>
        <td width="20px"><h4>Del</h4></td>
        <td width="100px"><?php echo $valores['fechaInicio']; ?></td>
        <td width="20px"><h4>Al</h4></td>
        <td width="130px"><?php echo $valores['fechaFin']; ?></td>
       <td width="100px"><h4>Codigo</h4></td>
        <td width="150px"><?php echo $Empleado->getCOdigo(); ?></td>
    </tr>    
</table>
<br>

        <table width="720px" >
            <tr width="700px"  xstyle="background-color: #E9C171">
                <td align="center"  style="border: 1px solid black;background-color: #E9C171" width="80px" >&nbsp;<font size="-1"><strong></strong></font>  </td>
                <td align="center"  style="border: 1px solid black;background-color: #E9C171" width="60px" >&nbsp;<font size="-1"><strong></strong></font>  </td>
                <td align="center"  style="border: 1px solid black;background-color: #E9C171" width="140px" colspan="2">&nbsp;<font size="-1"><strong>Turno 1</strong></font>  </td>
                <td align="center"  style="border: 1px solid black;background-color: #E9C171" width="60px" >&nbsp;<font size="-1"><strong>Llegada Tarde</strong></font> </td>      
                <td align="center"  style="border: 1px solid black;background-color: #E9C171" width="60px" >&nbsp;<font size="-1"><strong>Salida Temprano</strong></font></td>
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="60px" >&nbsp;<font size="-1"><strong>Tiempo extra</strong></font></td>
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="60px" >&nbsp;<font size="-1"><strong>Ausente</strong></font></td>
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="60px" >&nbsp;<font size="-1"><strong>Trabajados</strong></font></td>
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="140px" colspan="2" >&nbsp;<font size="-1"><strong>Justificación</strong></font></td>
                <td></td>
            </tr>
            <tr width="720px"  xstyle="background-color: #E9C171">
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="80px" >&nbsp;<font size="-1"><strong>Fecha</strong></font>  </td>
                <td align="center"  style="border: 1px solid black;background-color: #E9C171" width="60px" >&nbsp;<font size="-1"><strong>Dia</strong></font>  </td>
                <td align="center"  style="border: 1px solid black;background-color: #E9C171" width="70px" >&nbsp;<font size="-1"><strong>Entrada</strong></font>  </td>
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="70px" >&nbsp;<font size="-1"><strong>Salida</strong></font>  </td>
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="60px" >&nbsp;<font size="-1"><strong>Minutos</strong></font> </td>      
                <td align="center"  style="border: 1px solid black; background-color: #E9C171 " width="60px" >&nbsp;<font size="-1"><strong>Minutos</strong></font></td>
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="60px" >&nbsp;<font size="-1"><strong>Horas</strong></font></td>
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="60px" >&nbsp;<font size="-1"><strong>Dias</strong></font></td>
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="60px" >&nbsp;<font size="-1"><strong>Horas</strong></font></td>
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="70px" >&nbsp;<font size="-1"><strong>Duración</strong></font></td>
                <td align="center"  style="border: 1px solid black; background-color: #E9C171" width="70px" >&nbsp;<font size="-1"><strong>Hora</strong></font></td>
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
                    <td align="center"  style="border: 1px solid black;" width="80px"  >&nbsp;<font size="-1"><?php echo $reg['fecha']; ?></font>  </td>
                    <td align="center" style="border: 1px solid black;" width="60px"   >&nbsp;<font size="-1"><?php echo $reg['diaNombre']; ?></font>   </td>
                    <td align="center" style="border: 1px solid black;" width="70px"   >&nbsp;<font size="-1"><?php echo $reg['entrada']; ?></font>   </td>
                    <td align="center"  style="border: 1px solid black;" width="70px"   >&nbsp;<font size="-1"><?php echo $reg['salida']; ?></font>   </td>
                    <td align="center"  style="border: 1px solid black;" width="60px"   >&nbsp;<font size="-1"><?php echo $reg['MinTarde']; ?></font>   </td>
                    <td align="center"  style="border: 1px solid black;" width="60px"   >&nbsp;<font size="-1"><?php echo $reg['SalidaTemprano']; ?></font>   </td>
                    <td align="center"  style="border: 1px solid black;" width="60px"   >&nbsp;<font size="-1"><?php echo $reg['MinutoExtra']; ?></font>   </td>
                    <td align="center"  style="border: 1px solid black;" width="60px"   >&nbsp;<font size="-1"><?php echo $reg['Ausencia']; ?></font>   </td>
                    <td align="center"  style="border: 1px solid black;" width="60px"   >&nbsp;<font size="-1"><?php echo $reg['horastrabajo']; ?></font>   </td>
                    <td style="border: 1px solid black;" width="70px"></td>
                    <td align="center"  style="border: 1px solid black;" width="70px"   >&nbsp;<font size="-1"><?php echo $reg['justifica']; ?></font>   </td>
                    <td></td>
                </tr>
            <?php } ?>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td  width="140px"colspan="3" style="background-color:#DEDEDF "><font size="-1">Totales:</font></td>
                    <td colspan="8"></td>
                </tr>
                 <tr  >
                    <td  style="background-color:#DEDEDF " colspan="2" width="140px"><font size="-1">Dias Trabajados:</font></td>
                    <td style="background-color:#DEDEDF; text-align: center " width="70px"><?php echo $totaltrabajados ?></td>
                    <td style="background-color:#DEDEDF" width="120px"><font size="-1">Veces Salida Tarde:</font></td>
                    <td style="background-color:#DEDEDF; text-align: center " width="60px" colspan="1"><?php echo $salidatarde; ?></td>
                    <td style="background-color:#DEDEDF " width="120px"  colspan="2"><font size="-1">Veces Salida Temprano:</font></td>
                    <td  style="background-color:#DEDEDF " width="60px" colspan="1"></td>
                    <td style="background-color:#DEDEDF " width="140px" colspan="2"><font size="-1">Horas Salida trabajo:</font></td>
                    <td style="background-color:#DEDEDF " width="10px" colspan="1"></td>
                </tr>
                <tr  >
                    <td colspan="2"  style="background-color:#DEDEDF " width="140px" ><font size="-1">Dias ausente:</font></td>
                    <td colspan="1"  style="background-color:#DEDEDF; text-align: center " width="70px" ><?php echo $totalausencias ?></td>
                    <td colspan="2"  style="background-color:#DEDEDF " width="120px" ><font size="-1">LLegada Tarde:</font></td>
                    <td colspan="1"  style="background-color:#DEDEDF; text-align: center " width="60px" ><?php echo  $llegadatarde ?></td>
                    <td colspan="2"  style="background-color:#DEDEDF " width="120px" ><font size="-1">Salida Temprano:</font></td>
                    <td colspan="1"  style="background-color:#DEDEDF; text-align: center " width="60px" ><?php echo  $salidatemprano ?></td>
                    <td colspan="2"  style="background-color:#DEDEDF " width="140px" ><font size="-1">Horas Salidas :</font></td>
                    <td colspan="1" style="background-color:#DEDEDF " width="10px" ></td>
                </tr>
        </table>

