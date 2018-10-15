<?php $Parametro = ParametroQuery::create()->findOne(); ?>

<table style="width:720px">
    <tr>        
        <td style="width:5%"></td> 
        <td style="width:40%"><img src="<?php echo '/uploads/segmento/' . $Parametro->getLogo() ?>" height="35px" ></td>
        <td style="width:35%"></td> 
        <td style="width:25%"><font size="+2"><BR><?php echo $cabecera->getProyecto() ?> </font></td>
    </tr>
    <tr>
        <td style="width:10%"></td> 
        <td  colspan="4" style="width:90%;border-bottom: 1px solid black; " >
            <br><font size="+2"><strong>RECIBO DE PAGO DE SUELDOS Y SALARIOS COMPRENDIDOS:</strong></font>
        </td> 
    </tr>
    <tr>
        <td style="width:5%">   </td> 
        <td style="text-align: right;width:40%"><font size="+2">Del <?php echo $cabecera->getInicio(); ?> </font></td>
        <td style="text-align: right; width:35%" ><font size="+2">Al  <?php echo $cabecera->getFin(); ?> </font></td> 
        <td style="width:25%" ></td> 
    </tr> 
</table>
