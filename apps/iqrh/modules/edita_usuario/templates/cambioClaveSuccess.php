<?php $modulo = $sf_params->get("module"); ?>



<!--<div class="panel panel-piluku">
    <div class="panel-heading">
        <h3 class="panel-title"> <i class="fa fa-search primary-info"> </i>
            Cambio de Clave Usuario  (<?php echo $usuariodescripcion->getUsuario(); ?>)
            <span class="panel-options">
                <a href="#" class="panel-refresh">
                    <i class="icon ti-reload"></i>
                </a>
                <a href="#" class="panel-minimize">
                    <i class="icon ti-angle-up"></i>
                </a>
                <a href="#" class="panel-close">
                    <i class="icon ti-close"></i>
                </a>
            </span>
        </h3>
    </div>-->

  <div class="col-md-12">
    <div class="portlet box green-meadow ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-tasks"></i>
         Cambio de Clave
            </div>
              <div class="actions">
                <a class="btn btn-circle btn-info" href="<?php echo url_for($modulo . '/index') ?>" ><i class="fa fa-hand-o-left"></i> Retornar</a>                                </div>
    
        </div>

    <div class="portlet-body form">
         <div class="panel-heading">
                <b>Usuario <?php echo $usuariodescripcion->getUsuario() ?> </b>
            </div>
    <div class="panel-body">

 
        <?php echo $form->renderFormTag(url_for($modulo . "/cambioClave?id=".$usuariodescripcion->getId()), array("class" => "form ",));
        ?>
        <?php echo $form; ?>
        <br/><br/>
        <div class="form-actions">
<!--            <a href="<?php echo url_for($modulo . '/index') ?>" class="btn btn-green">
                <i class="fa fa-hand-o-left"></i>
                Retorno
            </a>-->
            <button type="submit" class="btn btn-info">
                <i class="fa fa-save"></i>
                Guardar
            </button>
        </div>
        <?php echo "</FORM>"; ?>
    </div>

</div>