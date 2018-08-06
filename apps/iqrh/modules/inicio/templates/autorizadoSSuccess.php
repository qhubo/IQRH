<?php $modulo = $sf_params->get('module'); ?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-tasks font-blue"></i>
            <span class="caption-subject bold font-blue uppercase">#<?php echo $ausencia->getId(); ?>- Confirmar </span>
            <span class="caption-subject bold font-yellow-crusta uppercase">Solicitud </span>
   <span class="caption-subject bold font-blue-hoki uppercase"><?php echo $ausencia->getUsuario()->getCodigo(); ?> </span>
         
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">

            </div>
        </div>
        <div class="inputs">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
        </div>
    </div>
    <div class="portlet-body">
        <?php $modulo = $sf_params->get('module'); ?>
        <?php echo $form->renderFormTag(url_for($modulo . '/autorizadoS?id=' . $id), array('class' => 'form-horizontal"')) ?>
        <?php echo $form->renderHiddenFields() ?>

   <div class="row">
        <div class="col-md-2"></div>   
       <div class="col-md-2 bold Bold font-green-turquoise"></div>   
            
   </div>

           <div class="row">
            <div class="col-md-2"></div>   

            <label class="col-md-2 control-label right font-blue-steel bold Bold  ">Motivo </label>
            <div class="col-md-6 <?php if ($form['motivo']->hasError()) echo "has-error" ?>">
                <?php echo $form['motivo'] ?>           
                <span class="help-block form-error"> 
                    <?php echo $form['motivo']->renderError() ?>  
                </span>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4"></div>   
            <div class="col-md-2">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancelar</button>
            </div>


            <div class="col-md-2">
                <button type="submit" class="btn    btn-outline font blue">
                    <i class="fa fa-check"></i> Aceptar     
                </button>
            </div>
        </div>

    </div>
</div>