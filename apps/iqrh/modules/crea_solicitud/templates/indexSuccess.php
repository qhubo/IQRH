<?php $modulo = $sf_params->get('module'); ?>
<?php //include_partial('soporte/avisos')    ?>
<?php $bodegaId = sfContext::getInstance()->getUser()->getAttribute("usuario", null, 'bodega'); ?>
<script src='/assets/global/plugins/jquery.min.js'></script>
<?php $muestrabusqueda = sfContext::getInstance()->getUser()->getAttribute('muestrabusqueda', null, 'busqueda'); ?>
<?php $linea = unserialize(sfContext::getInstance()->getUser()->getAttribute('carga', null, 'busqueda')); ?>
<?php echo $form->renderFormTag(url_for($modulo . '/index'), array('class' => 'form-horizontal"')) ?>
<?php echo $form->renderHiddenFields() ?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">

            <span class="caption-subject bold font-blue uppercase"> Solicitudes de Empleado </span> 
            
            <i class="fa fa-hourglass-half font-grey-salsa"></i>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp; Ingresa el dia que te ausentarás&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">

            </div>
        </div>
        <div class="inputs">
        </div>
    </div>
    <div class="portlet-body">
        <div class="form-body">

            <div class="row">
                <div class="col-md-1"> </div>  
                <div class="col-md-1">Empleado </div>  
               
              
                 <div class="col-md-4 <?php if ($form['empleado']->hasError()) echo "has-error" ?>">
     <span class="help-block form-error"> 
                        <?php echo $form['empleado']->renderError() ?>  
                    </span>               
     <?php echo $form['empleado'] ?>           
               
                </div>
              
                
                <label class="col-md-1 control-label right ">Dia </label>
                <div class="col-md-2">
                    <input class="form-control"  readonly="true" type="text"  value="<?php echo date('d/m/Y') ?>">       
                 
                </div>
            </div>

                 <div class="row">
                <div class="col-md-1"> </div>        
                <label class="col-md-1 control-label right ">Motivo </label>
                <div class="col-md-7 <?php if ($form['motivo']->hasError()) echo "has-error" ?>">
     <span class="help-block form-error"> 
                        <?php echo $form['motivo']->renderError() ?>  
                    </span>               
     <?php echo $form['motivo'] ?>           
               
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-md-1"> </div>        
                <label class="col-md-1 control-label right ">Observaciones </label>
                <div class="col-md-7 <?php if ($form['observaciones']->hasError()) echo "has-error" ?>">
     <span class="help-block form-error"> 
                        <?php echo $form['observaciones']->renderError() ?>  
                    </span>               
     <?php echo $form['observaciones'] ?>           
               
                </div>
            </div>
 <div class="row">
                <div class="col-md-1"> </div>
                <div class="col-md-1">Jefe</div>  
                <div class="col-md-4"> 
                    <input class="form-control"  value="<?php echo $usuario->getJefe() ?>" type="text" readonly="true" name="jefe" id="jefe">
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"> </div>  
                <div class="col-md-1">Archivo </div>
                <div class="col-md-4">
                     <?php echo $form['archivo'] ?>    
                </div>
                <div class="col-md-1"> </div>
                
                <div class="col-md-2">
                    <br><br><br><br>
                    <div id="procesar" name="procesar" >

                        <button class="btn btn-primary btn-block  btn-block"
                                procesa="procesa"
                                type="submit">
                            <i class="fa fa-check "></i>
                            Procesar
                        </button>
                    </div>

                </div>
            </div>

        </div>
<?php echo '</form>'; ?>      
    </div>

</div>