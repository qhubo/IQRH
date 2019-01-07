<?php $modulo = $sf_params->get("module"); ?>
<?php //include_partial("soporte/avisos"); ?>
<div class="col-md-12">
    <div class="portlet box green-meadow ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-tasks"></i>
             Asignación de Accesos Perfil 
            </div>
              <div class="actions">
                <a class="btn btn-circle btn-info" href="<?php echo url_for($modulo . '/index') ?>" ><i class="fa fa-hand-o-left"></i> Retornar</a>                                </div>
    
        </div>

    <div class="portlet-body form">
    <div class="panel-body">
              <div class="panel-heading">
                <b>Perfil <?php echo $perfil->getDescripcion() ?> </b>
            </div>
        
        <?php echo $form->renderFormTag(url_for("perfil/accesos"), array("class" => "form",)); ?>
        <?php echo $form->renderHiddenFields() ?>  
        <?php foreach ($superiores as $registroSUP) : ?>

        <div class="form-group col-sm-12">
        <div class="col-sm-2">
            <span class="primary-info">    <strong>      <?php echo $registroSUP->getDescripcion()?>  </strong>
            </span>
          </div>
            <div class="col-sm-9">
            <?php
              $menus = MenuSeguridadQuery::create()
                ->orderByOrden()
                ->filterBySuperior($registroSUP->getId())
                ->find(); ?>
                <?php $contador =0 ?>
               <?php foreach ($menus as $registro) : ?>
                <?php $contador++ ?>
                <?php if ($contador==1){ ?>
                  <div class="form-group col-sm-12">
                      <div class="col-sm-2"> </div>
                  <div class="col-sm-4">   <span class="primary-info">    <strong>      <?php echo $registroSUP->getDescripcion()?>  </strong>
            </span>
                  </div>
                 </div>
                    
              <?php  } ?>
                <?php if ($registro->getDescripcion()<> "Empresa")  { ?> 
                <div class="form-group col-sm-12">
             <div class="col-sm-4">  <?php echo $registro->getDescripcion()?>   </div>
                <div class="col-sm-4">
              <?php echo $form['menu_'.$registro->getId()] ?>      
<label for="consulta_menu_<?php echo $registro->getId() ?>"><span></span></label>
                </div>
</div>
                <?php } ?>

     <?php endforeach; ?>
</div>
            </div>
        <?php endforeach; ?>
        <hr/>
        <div class="col-sm-12 pull-right-btn"></div>
        <div class="col-sm-12 pull-right-btn">
            <div class="col-sm-4"></div>
            <div class="col-sm-1">
                <button class="btn btn-primary btn-icon-primary btn-icon-block btn-icon-blockleft" type="submit">
                    <i class="fa fa-save"></i>
                    <span> Guardar</span>
                </button>
            </div>
<!--            <div class="col-sm-1"></div>
            <div class="col-sm-1">
                <a href="<?php echo url_for($modulo . '/index') ?>" class="btn btn-success">
                    <i class="fa fa-hand-o-left"></i>
                    Retornar
                </a>
            </div>-->
        </div>
        <?php echo '</form>'; ?>
    </div>
</div>
