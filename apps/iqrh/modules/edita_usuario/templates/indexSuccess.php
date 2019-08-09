<script src='/assets/global/plugins/jquery.min.js'></script>
<?php $modulo = $sf_params->get('module'); ?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-tasks font-blue"></i>
            <span class="caption-subject bold font-blue uppercase">Listado de usuarios </span>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">

            </div>
        </div>
        <!--        <div class="inputs">
                    <a class="btn  btn green-meadow " href="<?php echo url_for($modulo . '/nuevo') ?>" ><i class="fa fa-plus"></i> Nuevo </a>
        
                </div>-->
    </div>
    <div class="portlet-body">
        
        <?php $modulo = $sf_params->get('module'); ?>
<?php echo $form->renderFormTag(url_for($modulo.'/index'), array('class' => 'form-horizontal"')) ?>
<?php echo $form->renderHiddenFields() ?>
          <div class="row">
                <div class="col-md-1"> </div>        
                <label class="col-md-2 control-label font-green right ">Todas Las  Empresas  </label>
                <div class="col-md-8 <?php if ($form['empresa']->hasError()) echo "has-error" ?>">
                    <?php echo $form['empresa'] ?>           
                    <span class="help-block form-error"> 
                        <?php echo $form['empresa']->renderError() ?>  
                    </span>
                </div>
            </div> 
        
          <div class="row">
                <div class="col-md-1"> </div>        
                <label class="col-md-2 control-label font-green right ">Texto Busqueda  </label>
                <div class="col-md-6 <?php if ($form['nombre']->hasError()) echo "has-error" ?>">
                    <?php echo $form['nombre'] ?>           
                    <span class="help-block form-error"> 
                        <?php echo $form['nombre']->renderError() ?>  
                    </span>
                </div>
                   <div class="col-md-2">

                    <button class="btn blue-steel btn-block btn-outline" type="submit">
                        <i class="fa fa-search "></i>
                  Buscar
                    </button>
                </div> 
            </div> 
        
        
   
        
        
           <div class="row">
               <div class="col-md-9"><br><br><br><br> </div> 
           </div>
        
        
        
        

        <div class="form-body">     
                      <div class="table-scrollable">
            <table class="table table-bordered  dataTable table-condensed flip-content" id="sample_2">
                <thead class="flip-content">
                    <tr class="info">
<!--                        <th align="center" width="20px"></th>-->
                        <th align="center" width="75px">Imagen</th>
                        <th align="center" width="20px"> Código</th>
                        <th align="center" width="20px">Usuario</th>
                        <th  align="center"> Nombre Completo</th>
                        <th  align="center">Correo</th>
                        <th  align="center"><font size="-2"> Derecho Vacaciones</font></th>
<!--                         <th  width="125px" align="center">Codigo</th>-->
                        <th  align="center"> Activo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $lis) { ?>
                        <?php $imagen = $lis->getImagen(); ?>
                        <tr>
                            <td>
                                <font size="-2" color="white"><?php echo $lis->getPrimerApellido() ?> </font>
                              <?php if ($lis->getImagen()) { ?>
                <img alt=""  width="100px"  src="/uploads/empresas/<?php echo $lis->getImagen() ?>">
                              <?php } ?>    
                            </td>
<!--                            <td>
                                <img alt="" width="75px" src="<?php echo $imagen ?>">
                           </td>-->
                            <td><?php echo $lis->getCodigo() ?></td>
                            <td><?php echo $lis->getUsuario() ?></td>
                            <td><?php echo $lis->getNombreCompleto() ?></td>
                            <td>
                            
                            <input type="text" name="correo_usuario<?php echo $lis->getId(); ?>" 
                                   value="<?php echo $lis->getCorreo(); ?>" class="form-control input-medium" id="correo_usuario<?php echo $lis->getId(); ?>">
                            <div class="labelactua<?php echo $lis->getId(); ?>" id="labelactua<?php echo $lis->getId(); ?>">
                            </div>
                            </td>
                            <td><?php echo $lis->getDerechoVaca() ?></td>
                   
<!--                                <td>
                            
                            <input type="text" name="codigo_usuario<?php echo $lis->getId(); ?>" 
                                   value="<?php echo $lis->getCodigo(); ?>" class="form-control input-medium" id="codigo_usuario<?php echo $lis->getId(); ?>">
                            <div class="labelactuaC<?php echo $lis->getId(); ?>" id="labelactuaC<?php echo $lis->getId(); ?>">
                            </div>
                            </td>-->
                            <td align="center"><?php if ($lis->getActivo()) { ?>
                        <li class="fa fa-hand-o-up font-blue-steel "></li>
                    <?php } else { ?>
                        <li class="fa fa-hand-o-down font-red-flamingo "></li> 
                    <?php } ?>
                    </td>
                    <td>
                        <a class="btn  btn-info"  href="<?php echo url_for($modulo . '/muestra?id=' . $lis->getId()) ?>" ><i class="fa fa-pencil"></i> Editar&nbsp;&nbsp;&nbsp;&nbsp;</a>  
                
        <?php if ($usuarioId <> $lis->getId()) { ?>
                        <a class="btn btn-xs btn-danger" data-toggle="modal" href="#static<?php echo $lis->getId() ?>"><i class="fa fa-trash"></i>  Eliminar </a>
                        <?php }  else { ?>
                        <a class="btn btn-xs btn-danger disabled"  href="#"><i class="fa fa-trash"></i>  Eliminar </a>
                            
                      <?php  } ?>
                        <a class="btn  btn-xs yellow btn-outline"  href="<?php echo url_for($modulo . '/cambioClave?id=' . $lis->getId()) ?>" ><i class="fa fa-lock"></i> Cambiar Clave</a>  
                  
                    </td>      
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
  </div>
    </div>
</div>
<?php echo '</form>'; ?>


<?php foreach ($usuarios as $lista) { ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#correo_usuario<?php echo $lista->getId(); ?>").on('change', function () {
            var id = $("#correo_usuario<?php echo $lista->getId(); ?>").val();
            var idv = <?php echo $lista->getId(); ?>;
            $.get('<?php echo url_for("edita_usuario/correo") ?>', {id: id, idv: idv}, function (response) {
                $("#labelactua<?php echo $lista->getId(); ?>").html(response);
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#codigo_usuario<?php echo $lista->getId(); ?>").on('change', function () {
            var id = $("#codigo_usuario<?php echo $lista->getId(); ?>").val();
            var idv = <?php echo $lista->getId(); ?>;
           
            $.get('<?php echo url_for("edita_usuario/codigo") ?>', {id: id, idv: idv}, function (response) {
                $("#labelactuaC<?php echo $lista->getId(); ?>").html(response);
            });
        });
    });
</script>


    <div id="static<?php echo $lista->getId() ?>" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <li class="fa fa-cogs"></li>
                    <span class="caption-subject bold font-yellow-casablanca uppercase"> Eliminar Usuario</span>
                </div>
                <div class="modal-body">
                    <p> Esta seguro de eliminar Usuario
                        <span class="caption-subject font-green bold uppercase"> 
                            <?php echo $lista->getUsuario() ?>
                        </span> ?
                    </p>
                </div>
                <?php $token = md5($lista->getUsuario()); ?>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancelar</button>
                    <a class="btn  btn green " href="<?php echo url_for($modulo . '/elimina?token=' . $token . '&id=' . $lista->getId()) ?>" >
                        <i class="fa fa-trash-o "></i> Confirmar</a> 
                </div>
            </div>
        </div>
    </div> 
<?php } ?>