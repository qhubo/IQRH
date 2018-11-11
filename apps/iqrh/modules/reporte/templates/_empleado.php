<?php $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia')); ?>

<table style="width:720px">
    <tr>
        <td style="width:100%">    <img src="<?php echo '/images/banner.PNG' ?>" width="720px" ></td> 
    </tr>
</table>
<table style="width:720px">
    <tr>
        <td style="width:100px">&nbsp;</td>
        <td style="width:720px;text-align: left"><font size="+2"> <strong> DETALLE COLABORADOR </strong> </font></td> 
    </tr>
</table>

<table style="width:720px">
    <tr>
        <td style="width:150px " rowspan="6">&nbsp; <img src="<?php echo '/images/banner.PNG' ?>" height="150px" width="120px" > </td>
        <td style="width:180px;text-align: left"></td> 
        <td style="width:520px;text-align: left"></td> 
    </tr>
    <tr>
        <td style="width:180px;text-align: left"><strong>NOMBRE COMPLETO</strong> </td> 
        <td style="width:520px;text-align: left"><?php echo $empleado->getPrimerNombre(); ?> <?php echo $empleado->getPrimerApellido(); ?></td> 
    </tr>
    <tr>
        <td style="width:180px;text-align: left"><strong>PUESTO:</strong> </td> 
        <td style="width:520px;text-align: left"><?php echo $empleado->getPuesto(); ?> </td> 
    </tr>
    <tr>
        <td style="width:180px;text-align: left"><strong>JORNADA</strong> </td> 
        <td style="width:520px;text-align: left">LUNES A VIERNES  <?php echo $horario->getHora(); ?>   <?php echo $horario->getHoraFin(); ?></td> 
    </tr>
    <tr>
        <td style="width:180px;text-align: left"> </td> 
        <td style="width:520px;text-align: left">  </td> 
    </tr>
    <tr>
        <td style="width:180px;text-align: left"><strong>PERIODO</strong> </td> 
        <td style="width:520px;text-align: left"><?php echo $valores['fechaInicio'] ?>  al  <?php echo $valores['fechaFin'] ?>  </td> 
    </tr>
</table>




<table cellpadding="0" > 
    <tr width="724px"  style="background-color: #E9C171">
        <td  style=" border: 1px solid black;" width="150px" >&nbsp;<font size="-2"><strong>NOMBRE COMPLETO</strong></font>  </td>
        <td  style="border: 1px solid black;" width="190px" >&nbsp;<font size="-2"><strong>PUESTO</strong></font>   </td>
        <td  style="border: 1px solid black;" width="65px" >&nbsp;<font size="-2"><strong>FECHA</strong></font>  </td>
        <td  style="border: 1px solid black;" width="75px" >&nbsp;<font size="-2"><strong>HORA&nbsp;ENTRADA</strong></font>  </td>
        <td  style="border: 1px solid black;" width="75px" >&nbsp;<font size="-2"><strong>HORA&nbsp;SALIDA</strong></font>  </td>
        <td  style="border: 1px solid black;" width="75px" >&nbsp;<font size="-2"><strong>HORAS&nbsp;DIARIAS</strong></font>  </td>
        <td  style="border: 1px solid black;" width="100px" >&nbsp;<font size="-2"><strong>HORAS POR SEMANA</strong></font> </td>      
    </tr>
    <?php $bandera = 0; ?>
<?php $cant=0;  ?>

    <?php foreach ($asistencia as $asite) { ?>
    <?php $cant++;  ?>

        <?php $semana = $asite->getDia('W'); ?>
        <?php $pinta = ''; ?>
        <?php $total = ''; ?>

        <?php if ($semana <> $bandera) { ?>
            <?php $bandera = $semana; ?>
            <?php $pinta = 'border-top: 1px solid black;'; ?>
            <?php $total = $RESUMEN[$semana]; ?>
        <?php } ?>
        <?php //$empleado = UsuarioQuery::create()->findOneByCodigo($asite->getUsuario()); ?>
        <?php $Hinicio = $asite->getEntrada(); ?>
        <?php $salida = $asite->getSalida(); ?>  
        <?php $retorna = AsistenciaUsuarioQuery::diferencia($Hinicio, $salida); ?>



        <tr>
            <td  style=" border: 1px solid black;" width="150px" >&nbsp;<font size="-3"><?php echo $empleado->getPrimerNombre(); ?>&nbsp;<?php echo $empleado->getPrimerApellido(); ?> </font>  </td>
            <td  style="border: 1px solid black;" width="190px" >&nbsp;<font size="-3"><?php echo $empleado->getPuesto(); ?> </font>   </td>
            <td  style="border: 1px solid black;text-align: center" width="65px" >&nbsp;<font size="-2"><?php echo $asite->getDia('d/m/Y'); ?>  </font>  </td>
            <td  style="border: 1px solid black;text-align: center" width="75px" >&nbsp;<font size="-2"><?php echo $asite->getEntrada(); ?>  </font>  </td>
            <td  style="border: 1px solid black;text-align: center" width="75px" >&nbsp;<font size="-2"><?php echo $asite->getSalida(); ?>  </font>  </td>
            <td  style="border: 1px solid black;text-align: center" width="75px" >&nbsp;<font size="-2"><?php echo $retorna['muestra']; ?> </font>  </td>
            <td  style="border-right: 1px solid black; <?php echo $pinta; ?>  text-align: center" width="100px" >&nbsp;<font size="-2"><?php echo $total; ?> </font> </td>      
        </tr>
    <?php } ?>
    <tr>
        <td colspan="7" width="724px"  style="border-top: 1px solid black;"  ></td>

    </tr>

</table>    


<br>
<br>



<table style="width:720px">
    <tr>
        <td style="width:100px;" >&nbsp; </td>
        <td style="width:150px;text-align: left;border: 1px solid black">HORAS AL MES</td> 
        <td style="width:80px;text-align: center;border: 1px solid black"> 160:00 </td> 
        <td style="width:120px;text-align: left;border: 1px solid black">% DE ASISTENCIA</td> 
        <td style="width:180px;text-align: left"></td> 
    </tr>
    <tr>
        <td style="width:100px " >&nbsp; </td>
        <td style="width:150px;text-align: left;border: 1px solid black"><strong>HORAS REALES</strong></td> 
        <td style="width:80px;text-align: center;border: 1px solid black"><strong><?php echo $HORA_REAL; ?></strong> </td>      
        <td style="width:120px;text-align: center;border: 1px solid black"> <?php echo $PORCENTAJE ?>%</td> 
        <td style="width:180px;text-align: left"></td> 
    </tr>
    <tr>
        <td style="width:100px " >&nbsp; </td>
        <td style="width:150px;text-align: left;border: 1px solid black">DIFERENCIA</td> 
        <td style="width:80px;text-align: center;border: 1px solid black"> </td> 
        <td style="width:120px;text-align: left"> </td> 
        <td style="width:180px;text-align: left"></td> 
    </tr>
    <tr>
        <td style="width:100px " >&nbsp; </td>
        <td style="width:150px;text-align: left;border: 1px solid black">DIAS TRABAJADOS</td> 
        <td style="width:80px;text-align: center;border: 1px solid black"> <?php echo AsistenciaUsuarioQuery::laborados($inicio, $fin, $empleado->getCodigo()); ?></td> 

        <td style="width:120px;text-align: left"> </td> 
        <td style="width:180px;text-align: left"></td> 
    </tr>
    <tr>
        <td style="width:100px " >&nbsp; </td>
        <td style="width:150px;text-align: left;border: 1px solid black">&nbsp;&nbsp;&nbsp;&nbsp;LLEGADAS TARDE</td> 
        <td style="width:80px;text-align: center;border: 1px solid black"><?php echo $tardes = AsistenciaUsuarioQuery::tardes($inicio, $fin, $empleado->getCodigo()); ?> </td> 

        <td style="width:120px;text-align: left"><?php //echo $inicio;  ?> </td> 
        <td style="width:180px;text-align: left"><?php //echo $fin;  ?></td> 
    </tr>


</table>


<?Php  for ($i =$cant; $i <= 26; $i++) {  ?>
<br>

<?Php } ?>



