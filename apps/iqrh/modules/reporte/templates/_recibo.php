<?php $Parametro = ParametroQuery::create()->findOne(); ?>
<?php $usuarioQ = UsuarioQuery::create()->findOneByCodigo($encabezado->getCodigo()); ?>
<table style="width:720px">
    <tr>        
        <td style="width:5%"></td> 
        <td style="width:20%"><img src="<?php echo '/uploads/segmento/' . $Parametro->getLogo() ?>" height="35px" ></td>
        <td style="width:25%"></td> 
        <td style="width:55%"><font size="+2"><BR><?php echo $cabecera->getProyecto() ?> </font></td>
    </tr>
    <tr>
        <td style="width:10%"></td> 
        <td  colspan="4" style="width:90%;border-bottom: 1px solid black; " >
           
              <?php if ($cabecera->getInicio() == '01/07/2018') { ?>  <br><font size="+2"><strong>PAGO DE BONO 14</strong></font> <?php } else  { ?>
              <br><font size="+2"><strong>RECIBO DE PAGO DE SUELDOS Y SALARIOS COMPRENDIDOS:</strong></font> 
              <?php } ?>
        </td> 
    </tr>
    <tr>
        <td style="width:5%">   </td> 
        <td style="text-align: right;width:40%"><font size="+2">Del <?php echo $cabecera->getInicio(); ?> </font></td>
        <td style="text-align: right; width:35%" ><font size="+2">Al  <?php echo $cabecera->getFin(); ?> </font></td> 
        <td style="width:25%" ></td> 
    </tr> 
</table>


<table style="width:720px">
    <tr>
        <td style="width:5%">   </td> 
        <td style="width:15%"><strong>Departamento</strong></td>      
        <td style="width:35%"><?php echo $encabezado->getDepartamento(); ?> </td> 
        <td style="width:25%"></td>
        <td style="width:20%"></td>
    </tr>
     <tr>
        <td style="width:5%">   </td> 
        <td style="width:15%"><strong>Codigo</strong></td>      
        <td style="width:35%"><strong>Empleado</strong></td> 
        <td style="width:25%"><strong>Puesto</strong></td>
        <td style="width:20%"><strong>Dias Laborados</strong></td>
    </tr>
        <tr>
        <td style="width:5%">   </td> 
        <td style="width:15%"><?php echo $encabezado->getCodigo(); ?></td>      
        <td style="width:35%"><?php echo $encabezado->getEmpleado(); ?></td> 
        <td style="width:25%"><?php echo $encabezado->getPuesto(); ?></td>
        <td style="width:20%"><?php echo $encabezado->getLaborados(); ?></td>
    </tr>
    <tr><td  style="width:100%" colspan="4"><br></td> </tr>
       <tr>
        <td style="width:5%">   </td> 
        <td style="width:15%"><?php if ($cabecera->getInicio() == '01/07/2018') { ?> <strong>Fecha Alta</strong><?php } ?></td>      
        <td style="width:35%"><strong><?php if ($cabecera->getInicio() == '01/07/2018') { ?><?php if ($usuarioQ) { ?>  <strong><?php echo $usuarioQ->getFechaAlta('d/m/Y'); ?> </strong><?php } ?></strong><?php } ?> </td> 
        <td style="width:25%"><br><strong>Ingresos</strong></td>
        <td style="width:20%"><br><strong>Egresos</strong></td>
    </tr>
      <?php $count=0; ?>
    <?php $TotalIngreso=0 ?>
    <?php  $TotalEgreso=0 ?>

    <?php  foreach ($detalle as $data) { ?>
    <?php $montoIngreso=0; ?>
    <?php $montoEgreso=0; ?>
    <?php if ($data->getIdentificar()=='-') { ?>
            <?php $montoEgreso=$data->getMonto(); ?>
    <?php } else { ?>
    <?php $montoIngreso=$data->getMonto(); ?>     
    <?php } ?>
    <?php $TotalIngreso=$TotalIngreso+$montoIngreso ?>
    <?php  $TotalEgreso=$TotalEgreso+$montoEgreso ?>
      <?php $count++ ?>
    <tr>
        <td style="width:5%">   </td>  
        <td style="width:50%" colspan="2"><?php echo $data->getDescripcion() ?></td> 
        <td style="text-align: right; width:25%"><?php  if ($montoIngreso) { echo number_format($montoIngreso,2);  } ?></td>
        <td style="text-align: right; width:20%"><?php  if ($montoEgreso) { echo number_format($montoEgreso,2);  } ?> </td>
    </tr>
    <?php } ?>
    <?php if ($cabecera->getInicio() <> '01/07/2018') { ?>
    <?php for ($i =$count; $i <= 8; $i++) { ?>
    <tr><td  style="text-align: right; width:100%" colspan="4"><br></td> </tr>
    <?php } ?>
    <?php } else  { ?>
         <tr>
             
             <td  colspan="2" width="50%">
                 <p align="justify">
        Por este medio hago constar, que el monto indicado en esta boleta, corresponde al 100% de la prestación 
        de BONO 14 que me corresponde según mi fecha de ingreso por tal razón lo acepto como bueno,
        Tengo conocimiento tambien que cuento con 5 días para realizar algún
        reclamo respecto al monto depositado en mi cuenta monetaria,
        caso contrario se dará por correcto el pago realizado y en adelante no realizaré ningun reclamo
                 </p>
             </td>
             <td  colspan="2"></td>
         
         </tr>
    <?php } ?>
    
    <tr>
        <td style="width:5%;border-bottom: 1px solid black; ">   </td>  
        <td style="width:50%;border-bottom: 1px solid black; " colspan="2"></td> 
        <td style="text-align: right; width:25%;border-bottom: 1px solid black; "><font size="+2"> <?php   echo number_format($TotalIngreso,2);  ?></font> </td>
        <td style="text-align: right; width:20%;border-bottom: 1px solid black; "><font size="+2"> <?php   echo number_format($TotalEgreso,2);   ?></font> </td>
    </tr>
     <tr><td  style="width:100%" colspan="4"><br></td> </tr>
    <tr>
     <td style="width:5%; ">   </td>  
     <td style="width:50%;" colspan="2"><font size="+2"> Totales</font> </td> 
     <td style="width:25%;border-left: 1px solid black;border-bottom: 1px solid black;border-top: 1px solid black; ">&nbsp;&nbsp; Liquido a Recibir </td>
     <td style="text-align: right; width:20%;border-bottom: 1px solid black;border-right: 1px solid black;border-top: 1px solid black; "><font size="+2"> <?php   echo number_format($encabezado->getTotalSueldoLiquido(),2);   ?></font> </td>
 
    </tr>
    
</table>

