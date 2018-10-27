<?php $Parametro = ParametroQuery::create()->findOne(); ?>
<table style="width:720px">
    <tr>
        <td style="width:100%">    <img src="<?php echo '/images/banner.PNG' ?>" width="720px" ></td> 
    </tr>
</table>
<table style="width:720px">
    <tr>
        <td style="width:100px">&nbsp;</td>
        <td style="width:520px;text-align: center"><font size="+2"> <strong> Reporte de asistencia y puntualidad </strong> </font></td> 
    </tr>
</table>
<table style="width:720px">
    <tr>
        <td style="width:40px">&nbsp;</td>
        <td style="width:640px;text-align: left"><font size="+2"> <strong> INTRODUCCION </strong> </font></td> 
        <td style="width:40px">&nbsp;</td>

    </tr>
    <tr>
        <td style="width:40px">&nbsp;</td>
        <td style="width:640px; text-align: left">
            El presente documento muestra de forma gráfica y descriptiva el cumplimiento de la asistencia y puntualidad
            de los colaboradores en las oficinas de Guatemala durante el mes de <?php echo $mes; ?> del año en curso. A la vez
            busca promover el cumplimiento de las normas y procedimientos establecidos en el reglamento interno de
            la empresa
        </td> 
        <td style="width:40px">&nbsp;</td>

    </tr>
    <tr>
        <td style="width:40px">&nbsp;</td>
        <td style="width:640px; text-align: left"><font size="+2"> <strong> DESCRIPCION DE RESULTADOS</strong> </font></td> 
        <td style="width:40px">&nbsp;</td>

    </tr>
    <tr>
        <td style="width:40px">&nbsp;</td>
        <td style="width:640px;text-align: left">
            A continuación, se presenta un análisis del comportamiento de los colaboradores en relación con los días
            laborados, llegadas tarde, porcentaje de puntualidad, horas reales trabajadas y porcentaje de estas.     
        </td> 
        <td style="width:40px">&nbsp;</td>

    </tr>

</table>
<br>

<table cellpadding="3" > 
    <tr width="720px"  style="background-color: #E9C171">
        <td  style=" border: 1px solid black;" width="150px" >&nbsp;<font size="-2"><strong>NOMBRE COMPLETO</strong></font>  </td>
        <td  style="border: 1px solid black;" width="170px" >&nbsp;<font size="-2"><strong>PUESTO</strong></font>   </td>
        <td  style="border: 1px solid black;" width="70px" >&nbsp;<font size="-2"><strong>DIAS<br>&nbsp;LABORADOS</strong></font>  </td>
        <td  style="border: 1px solid black;" width="70px" >&nbsp;<font size="-2"><strong>LLEGADAS<br>&nbsp;TARDE</strong></font>  </td>
        <td  style="border: 1px solid black;" width="75px" >&nbsp;<font size="-2"><strong>%<br>PUNTUALIDAD</strong></font>  </td>
        <td  style="border: 1px solid black;" width="70px" >&nbsp;<font size="-2"><strong>HORAS<br>&nbsp; MENSUALES</strong></font>  </td>
        <td  style="border: 1px solid black;" width="70px" >&nbsp;<font size="-2"><strong>HORAS<br>&nbsp; REALES</strong></font> </td>      
        <td  style="border: 1px solid black;" width="50px" >&nbsp;<font size="-2"><strong>% HORAS</strong></font></td>
    </tr>
<?php foreach ($Listado as $regi) { ?>
    <?php $puntualidad =0; ?>
        <tr>
            <td  style=" border: 1px solid black;" width="150px"  >&nbsp;<font size="-2"><?php echo $regi->getNombreCompleto(); ?></font>  </td>
            <td  style="border: 1px solid black;" width="170px"   >&nbsp;<font size="-2"><?php echo $regi->getPuesto(); ?></font>   </td>
            <td  style="border: 1px solid black;" width="70px" align="center" >&nbsp;<font size="-1"><?php echo  $dias= AsistenciaUsuarioQuery::laborados($inicio, $fin, $regi->getUsuario());  ?></font>&nbsp;&nbsp;&nbsp;  </td>
            <td  style="border: 1px solid black;" width="70px" align="center" >&nbsp;<font size="-1"><?php echo $tardes= AsistenciaUsuarioQuery::tardes($inicio, $fin, $regi->getUsuario());  ?></font>  </td>
            <?php if ($dias >0) { ?>
            <?php $puntualidad =(($tardes *100) /$dias); ?>
            <?php } ?>
            <td  style="border: 1px solid black;" width="75px"  align="center" ><font size="-1">&nbsp; <?php echo  round($puntualidad,2); ?>%  </font></td>
            <td  style="border: 1px solid black;" width="70px" align="center">&nbsp;<font size="-1"><?php echo $horamensual; ?> </font>  </td>
            <td  style="border: 1px solid black;" width="70px" align="center">&nbsp;<font size="-1"><?php echo AsistenciaUsuarioQuery::Reales($inicio, $fin, $regi->getUsuario());  ?></font> </td>      
            <td  style="border: 1px solid black;" width="50px" >&nbsp;<font size="-2"></font></td>

        </tr>
<?php } ?>
</table>
<?php for ($i = count($Listado); $i <= 20; $i++) { ?>

    <br><?php //echo GRAFICA ?><br>

<?php } ?>
<!--<table style="width:720px">
    <tr>
        <td style="width:100%">    <img src="<?php //echo '/images/banner.PNG' ?>" width="720px" ></td> 
    </tr>
</table>-->
<!--<table>
    <tr>
        <td style="width:40px">&nbsp;</td>
        <td style="width:640px;text-align: left">
            En este orden de ideas, se recomienda realizar una charla en general para promover el cumplimiento del
            reglamento interno y reforzar la puntualidad en los colaboradores.

        </td> 
        <td style="width:40px">&nbsp;</td>

    </tr>
    <tr>
        <td style="width:40px">&nbsp;</td>
        <td style="width:640px; text-align: left"><font size="+2"> <strong> HALLAZGOS</strong> </font></td> 
        <td style="width:40px">&nbsp;</td>

    </tr>
    <tr>
        <td style="width:40px">&nbsp;</td>
        <td style="width:640px;text-align: left">
            En el caso del colaborador Juan Fernando Diaz no se registraron marcas de salida, razón por la cual no se
            puede determinar la cantidad de horas trabajadas durante el mes. <Br>
            Ana Huertas únicamente cuenta con dos marcas los días 23 y 26 de marzo.<Br>
            Los colaboradores con mayor cantidad de entradas fuera del horario establecido son: Silvia Mendoza (12
            ingresos tarde), Karen González (12 ingresos tarde) y Xiomara Maldonado (11 ingresos tarde).<Br>

        </td> 
        <td style="width:40px">&nbsp;</td>

    </tr>
</table>-->
<!--GRFICA-->
<?php for ($i = count($Listado); $i <= 20; $i++) { ?>

    <br><?php //echo $i ?><br>

<?php } ?>

<!--<table>

    <tr>
        <td style="width:40px">&nbsp;</td>
        <td style="width:640px;text-align: left">
            Como se puede observar en la gráfica solamente el 23% de los colaboradores cumple con 160 horas de
            trabajo mensual, dejando al 77% por debajo del rendimiento en horas esperado por la empresa, cabe
            resaltar que existen dos colaboradores que no presentan un dato real de las horas laboradas al mes, el
            primero de ellos es Ana Huertas con dos marcas de ingreso y salida en marzo y Juan Fernando Diaz con
            marcas de ingreso pero no de salida, estos dos casos impactan de forma negativa el desempeño del grupo

        </td> 
        <td style="width:40px">&nbsp;</td>

    </tr>

    <tr>
        <td style="width:40px">&nbsp;</td>
        <td style="width:640px;text-align: left">
            En base a lo anterior se recomienda promover el cumplimiento de la jornada laboral, por medio de una
            charla donde se refuerce de forma positiva es responsabilidad.
        </td> 
        <td style="width:40px">&nbsp;</td>

    </tr>
</table>-->