<?php $modulo = $sf_params->get('module'); ?>
<?php $imagen = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'imagen'); ?>
<script src='/assets/global/plugins/jquery.min.js'></script>

<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-newspaper-o font-purple-studio"></i>
            <span class="caption-subject bold font-purple-plum uppercase"> Datos  Perfil</span>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

        </div>
        <div class="inputs"></div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2 font-green-jungle bold Bold">Nombre Completo</div>
            <div class="col-md-6">
                <input class="form-control" placeholder="Ingreso Nombre" type="text" name="consulta[nombre_completo]"  value="<?php echo $UsuarioQuer->getNombreCompleto() ?>" id="consulta_nombre_completo">
            </div>
        </div>
        <div class="row"><br></div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2  font-blue-steel bold Bold">Correo Electronico</div>
            <div class="col-md-6"><input class="form-control" type="email" name="consulta[correo]" value="<?php echo $UsuarioQuer->getCorreo() ?>"  id="consulta_correo"></div>
        </div>
        <div class="row"><br></div>
        
        <?php echo $form->renderFormTag(url_for($modulo . '/imagen'), array('class' => 'form')) ?>
        <?php echo $form->renderHiddenFields() ?>
        <div class="panel-heading">
            <b> Cambia tu Foto de Perfil </b>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <span class="font-blue bold Bold" >Actual</span><br>
                <?php if ($imagen) { ?>
                    <img alt=""   class="img-circle" src="/uploads/empresas/<?php echo $imagen ?>">
                <?php } else { ?>
                    <img alt="" class="img-circle" src="../assets/layouts/layout3/img/avatar9.jpg">
                <?php } ?>
 
            </div>
            <div   class="col-md-5  <?php if ($form['archivo']->hasError()) echo "has-error" ?>">
                <span class="font-blue bold Bold" >Nueva</span>
                <br>
                <?php echo $form['archivo'] ?>           
                <span class="help-block form-error"> 
                    <?php echo $form['archivo']->renderError() ?>  
                </span>
                <br>

                <button class="btn btn-primary " type="submit">
                    <i class="fa fa-check"></i>
                    <span>Guardar</span>
                </button>
            </div>
        </div>
        <?php echo '</form>'; ?>

    </div>


</div>



<script type="text/javascript">
    $(document).ready(function () {
        $("#consulta_nombre_completo").on('change', function () {
            var id = $("#consulta_nombre_completo").val();
       //     alert(id);
            var idv = $("#sec").val();
            $.get('<?php echo url_for("inicio/nombre") ?>', {id: id, idv: idv}, function (response) {
            });

        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#consulta_correo").on('change', function () {
            var id = $("#consulta_correo").val();
         //   alert(id);
            var idv = $("#sec").val();
            $.get('<?php echo url_for("inicio/correo") ?>', {id: id, idv: idv}, function (response) {
            });

        });

    });
</script>