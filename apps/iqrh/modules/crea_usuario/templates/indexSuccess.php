<script src='/assets/global/plugins/jquery.min.js'></script>
<?php $modulo = $sf_params->get('module'); ?>
<?php echo $form->renderFormTag(url_for('crea_usuario/index?id=1'), array('class' => 'form-horizontal"')) ?>
<?php echo $form->renderHiddenFields() ?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-plus font-blue"></i>
            <span class="caption-subject bold font-blue uppercase">Crea un nuevo usuario </span>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;Completa toda los datos solicitados&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">
            </div>
        </div>
        <div class="inputs">
<!--                     <a class="btn  btn green-meadow " href="<?php echo url_for($modulo . '/index') ?>" ><i class="fa fa-plus"></i> Nuevo </a>
            -->
        </div>
    </div>
    <div class="portlet-body">

        <div class="form-body">      
  <div class="row">
                <div class="col-md-1"> </div>        
                <label class="col-md-1 control-label font-blue-steel right ">Nombre  </label>
                <div class="col-md-9 <?php if ($form['nombre_completo']->hasError()) echo "has-error" ?>">
                    <?php echo $form['nombre_completo'] ?>           
                    <span class="help-block form-error"> 
                        <?php echo $form['nombre_completo']->renderError() ?>  
                    </span>
                </div>
                <div class="col-md-1">  </div>
            </div>

            <div class="row">
                <div class="col-md-1"> </div>        
                <label class="col-md-1 control-label font-blue-steel right ">Usuario  </label>
                <div class="col-md-4 <?php if ($form['usuario']->hasError()) echo "has-error" ?>">
                    <?php echo $form['usuario'] ?>           
                    <span class="help-block form-error"> 
                        <?php echo $form['usuario']->renderError() ?>  
                    </span>
                </div>
                <div class="col-md-1">  </div>
                <label class="col-md-1 control-label font-blue-steel right ">Clave  </label>
                <div class="col-md-3 <?php if ($form['clave']->hasError()) echo "has-error" ?>">
                    <?php echo $form['clave'] ?>           
                    <span class="help-block form-error"> 
                        <?php echo $form['clave']->renderError() ?>  
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4" id="vali" style="display: none;"> <font color="red" size="-2"> Usuario Ya existe</font>
                    <input  type="text" class="form-control" id="te" name="te" readonly="" >
                </div>


            </div>


            <div class="row">
                <div class="col-md-1"> </div>        
                <label class="col-md-1 control-label font-blue-steel right ">Correo  </label>
                <div class="col-md-4 <?php if ($form['correo']->hasError()) echo "has-error" ?>">
                    <?php echo $form['correo'] ?>           
                    <span class="help-block form-error"> 
                        <?php echo $form['correo']->renderError() ?>  
                    </span>
                </div>
                <div class="col-md-1">  </div>
                <label class="col-md-1 control-label font-blue-steel right ">Tipo&nbsp;Usuario</label>
                <div class="col-md-3 <?php if ($form['tipo']->hasError()) echo "has-error" ?>">
                    <?php echo $form['tipo'] ?>           
                    <span class="help-block form-error"> 
                        <?php echo $form['tipo']->renderError() ?>  
                    </span>
                </div>
            </div>    
            <div class="row">
                <div class="col-md-1"> </div>        
                <label class="col-md-1 control-label font-blue-steel right ">Empresa  </label>
                <div class="col-md-9 <?php if ($form['empresa']->hasError()) echo "has-error" ?>">
                    <?php echo $form['empresa'] ?>           
                    <span class="help-block form-error"> 
                        <?php echo $form['empresa']->renderError() ?>  
                    </span>
                </div>
                <div class="col-md-1">  </div>
            </div>
            <div class="row">
                <div class="col-md-1"> </div>        
                <label class="col-md-1 control-label font-blue-steel right ">Observaciones  </label>
                <div class="col-md-9 <?php if ($form['observaciones']->hasError()) echo "has-error" ?>">
                    <?php echo $form['observaciones'] ?>           
                    <span class="help-block form-error"> 
                        <?php echo $form['observaciones']->renderError() ?>  
                    </span>
                </div>
                <div class="col-md-1">  </div>
            </div>
            <div class="row">
                <div class="col-md-9"> </div> 
                <div class="col-md-2">

                    <button class="btn blue-steel btn-block btn-outline" type="submit">
                        <i class="fa fa-save "></i>
                        Grabar
                    </button>
                </div> 
            </div>
        </div>

    </div>
</div>
<?php echo '</form>'; ?>




<script type="text/javascript">
    $(document).ready(function () {
        $("#consulta_usuario").on('change', function () {
            var id = $("#consulta_usuario").val();
            var idv = $("#sec").val();
            $.get('<?php echo url_for("crea_usuario/codigo") ?>', {id: id, idv: idv}, function (response) {
                if (response == 1) {
                    $("#vali").slideToggle(250);
                    $("#consulta_usuario").val('');
                    $("#te").val(id);
                }
                if (response == 0) {
                    $("#vali").hide();

                }
            });

        });

    });
</script>