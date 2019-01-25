<?php $Parametro = ParametroQuery::create()->findOne(); ?>
<?php $urlH = "http://" . $_SERVER['SERVER_NAME']; ?>
<?php $PortA = $_SERVER['SERVER_PORT']; ?>
<?php $port = ''; ?>
<?php if ($PortA == '8080') { ?>
    <?php $port = ':8080'; ?>
<?php } ?>
<?php $url = $urlH . $port ?>
<p><strong>Respuesta  a  Solicitud de N&oacute;mina</strong>&nbsp;:</p>
<?php if ($empleado) { ?> <p>Empleado:&nbsp; &nbsp; <strong><?php echo $empleado; ?></strong></p> <?php } ?>
<p>Fecha:&nbsp; &nbsp; <strong><?php echo $fecha; ?></strong></p>
<p>Estimado usuario tiene una nueva notificacici&oacute;n&nbsp;</p>
<p>La Solicitud de:&nbsp; &nbsp;<strong><?php echo $tipo; ?> </strong> &nbsp; &nbsp; ha sido <strong>
    <?php if (strtoupper($califica)=="RECHAZADA") { ?><font color="red"> <?php } ?>    
    <?php echo $califica; ?> 
    <?php if (strtoupper($califica)=="RECHAZADA") { ?></font> <?php } ?>    
    
    </strong></p>

<p>por el superior:&nbsp; &nbsp;<strong><?php echo $jefe; ?> </strong> </p>

<p>Motivo:&nbsp; &nbsp;<strong><?php echo $observacion; ?></strong></p>
<p>&nbsp;</p>
<!--<p>Por favor&nbsp; finalizar la solicitud en el sistema&nbsp; <a href="<?php echo $url; ?>/index.php"> INGRESAR AL SISTEMA</a></p>-->
<p>&nbsp;</p>
<p><img src="http://iqrh.viasagt.com/images/logo.png"  width="125" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
    <img src="<?php echo $url; ?><?php echo '/uploads/segmento/' . $Parametro->getLogo() ?>" alt="" width="125" height="74" /></p>
