<?php $Parametro = ParametroQuery::create()->findOne(); ?>
<?php $valores = unserialize(sfContext::getInstance()->getUser()->getAttribute('valores', null, 'Asistencia')); ?>

<table style="width:720px">
    <tr>
        <td style="width:100%">    <img src="<?php echo '/images/banner.PNG' ?>" width="720px" ></td> 
    </tr>
</table>
<table style="width:720px">
    <tr>
        <td style="width:100px">&nbsp;</td>
        <td style="width:520px;text-align: center"><br><br></td> 
    </tr>
    <tr>
        <td style="width:100px">&nbsp;</td>
        <td style="width:520px;text-align: center"><font size="+3"> <strong> Reporte Proyección de Vacaciones </strong> </font></td> 
    </tr>
    <tr>
        <td style="width:100px">&nbsp;</td>
        <td style="width:520px;text-align: center"><font size="+2"> <strong> <?php echo $empresa ?></strong> </font> <br></td> 
    </tr>

</table>

<table>

    <tr  style="background-color: #E9C171">
        <th style=" border: 1px solid black;  text-align: center" width="60px" >&nbsp;<font size='-1'>Inicio</font></th>
        <th style="border: 1px solid black; text-align: center" width="60px" >&nbsp;<font size='-1'>Fin</font></th>
        <th style="border: 1px solid black; text-align: center" width="80px" >&nbsp;<font size='-1'>Codigo</font></th>
        <th style="border: 1px solid black; text-align: center" width="220px" >&nbsp;<font size='-1'> Empleado</font> </th>
        <th style="border: 1px solid black; text-align: center" width="60px" >&nbsp;<font size='-1'> Periodo</font> </th>
        <th style="border: 1px solid black; text-align: center" width="80px" >&nbsp;<font size='-1'>Dias Vacaciones</font></th>
        <th style="border: 1px solid black; text-align: center" width="80px" >&nbsp;<font size='-1'>Creación</font></th>
        <th style="border: 1px solid black; text-align: center" width="80px" >&nbsp;<font size='-1'>Estatus</font></th>
    </tr>

    <?php foreach ($listado as $reg) { ?>
        <?php $lista = $reg; ?>
        <?php $usuarioQ = UsuarioQuery::create()->findOneByCodigo($reg->getUsuario()); ?>
        <tr>
            <th style=" border: 1px solid black; text-align: center" width="60px" >&nbsp;<font size='-1'> <?php echo $reg->getFechaInicio('d/m/Y'); ?></font></th>
            <th style="border: 1px solid black; text-align: center" width="60px" >&nbsp;<font size='-1'><?php echo $reg->getFechaFin('d/m/Y'); ?></font></th>
            <th style="border: 1px solid black; text-align: center" width="80px" >&nbsp;<font size='-1'><?php echo $usuarioQ->getCodigo(); ?></font></th>
            <th style="border: 1px solid black; " width="220px" >&nbsp;<font size='-1'> <?php echo $usuarioQ->getNombreCompleto(); ?> </font> </th>
            <th style="border: 1px solid black; text-align: right" width="60px"  >&nbsp;<font size='-1'><?php echo $reg->getPeriodo(); ?></font>&nbsp;&nbsp;&nbsp;</th>
         
            <th style="border: 1px solid black; text-align: right" width="80px"  >&nbsp;<font size='-1'><?php echo $reg->getDiaVacacion(); ?></font>&nbsp;&nbsp;&nbsp;</th>
            <th style="border: 1px solid black; text-align: center" width="80px" >&nbsp;<font size='-1'><?php echo $reg->getUsuarioCreo(); ?> <?php echo $reg->getFechaCrea('d/m/Y'); ?></font></th>
            <th style="border: 1px solid black;" width="80px" >&nbsp;<font size='-1'> <?php echo $reg->getEstatus() ?></font></th>
        </tr>
    <?php } ?>
</table>
<!--               