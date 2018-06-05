<script src='/assets/global/plugins/jquery.min.js'></script>
<?php $modulo = $sf_params->get('module'); ?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">

            <span class="caption-subject bold font-yellow-casablanca ">Notificaciones activas </span>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">
            </div>
        </div>
    </div>
    <div class="portlet-body">

        <div class="row">
            <div class="col-md-12 font font-grey-cararra" ><font size="-2"> </font> </div>          
        </div>
        <table class="table table-bordered  dataTable table-condensed flip-content" id="sample_2">
            <thead class="flip-content">
                <tr class="danger">
                    <th align="center" width="20px">Fecha</th>
                    <th align="center" width="45px">Tipo</th>
                    <th align="center" width="80px">Usuario</th>
                    <th align="center" >Comentario</th>
                    <th  align="center" width="20px">Check</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($bitacoras as $lista) { ?>
                    <?php $estiloUno = ''; ?>
                                    <?php $estiloDos = 'style="display:none;"'; ?>
                    <?php $activado = false; ?>
                    <?php $UsuarioQue = UsuarioQuery::create()->findOneById($lista->getUsuarioId()); ?>
                    <tr> 
                        <td class="" ><font size="-1"><?php echo $lista->getFechaCreacion('d/m/Y'); ?> </font></td>   
                        <td class="font font-grey-cascade bold Bold" ><font size="-1"><?php echo $lista->getTipo(); ?> </font></td>   
                        <td class="" ><font size="-1"><?php echo $UsuarioQue->getUsuario(); ?>  <?php echo $UsuarioQue->getNombreCompleto(); ?></font></td>   
                        <td><font size="-1"><?php echo $lista->getObservaciones(); ?></font></td>   
                        <td>

                            <?php if ($activado) { ?>
                                <?php $estiloDos = ''; ?>
                                <?php $estiloUno = 'style="display:none;"'; ?>
                            <?php } ?>
                            <div  id="btactiva<?php echo $lista->getId() ?>" <?php echo $estiloUno ?>  class="col-md-12" >
                                <a id="activar<?php echo $lista->getId() ?>" dat="<?php echo $lista->getId() ?>" class="btn btn-outline btn-block  btn-xs  blue-steel "><i class="fa fa-thumbs-up"></i></a>
                            </div>
                            <div  id="bNtactiva<?php echo $lista->getId() ?>" <?php echo $estiloDos ?>  class="col-md-12" >
                                <a id="Nactivar<?php echo $lista->getId() ?>" dat="<?php echo $lista->getId() ?>" class="btn  btn-xs blue-hoki "></a> 
                            </div>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>





<?php foreach($bitacoras as $Li) { ?>
<?php $i = $Li->getId(); ?>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#activar<?php echo $i ?>').click(function () {
                var id = $(this).attr('dat');
                // alert('xx');
                //alert(id);
                $.ajax({
                    type: 'POST',
                    url: '/grad_dev.php/inicio/nota',
                    data: {'id': id},
                    success: function (data) {
                    }
                });
            });
        });
    </script>


    
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#Nactivar<?php echo $i ?>').click(function () {
                $("#<?php echo $i ?>ca1").prop("readonly", true);
                $("#<?php echo $i ?>ca2").prop("readonly", true);
                $("#<?php echo $i ?>pre").prop("readonly", true);
                $('#<?php echo $i ?>ca1').attr('disabled', 'disabled');
                $('#<?php echo $i ?>ca2').attr('disabled', 'disabled');
                $('#<?php echo $i ?>pre').attr('disabled', 'disabled');
                $('#btactiva<?php echo $i ?>').slideToggle(250);
                $('#bNtactiva<?php echo $i ?>').hide();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#activar<?php echo $i ?>').click(function () {
                $("#<?php echo $i ?>ca1").prop("readonly", false);
                $("#<?php echo $i ?>ca2").prop("readonly", false);
                $("#<?php echo $i ?>pre").prop("readonly", false);
                $('#<?php echo $i ?>ca1').removeAttr('disabled');
                $('#<?php echo $i ?>ca2').removeAttr('disabled');
                $('#<?php echo $i ?>pre').removeAttr('disabled');
                $('#bNtactiva<?php echo $i ?>').slideToggle(250);
                $('#btactiva<?php echo $i ?>').hide();
            });
        });
    </script>

    

    
<?php } ?>
