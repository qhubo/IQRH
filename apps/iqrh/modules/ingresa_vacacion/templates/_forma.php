<div class="row">
    <div class="col-md-1"> </div>  
    <div class="col-md-1">Empleado </div>  
    <div class="col-md-4 <?php if ($form['empleado']->hasError()) echo "has-error" ?>">
        <?php echo $form['empleado'] ?>           
        <span class="help-block form-error"> 
            <?php echo $form['empleado']->renderError() ?>  
        </span>
    </div>
       
    <div class="col-md-3 font-green bold Bold"   name="respuesta" id="respuesta"> 
    
<?php echo  sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'Dia') ?>
    </div>
       
</div>


<div class="row">
    <div class="col-md-1"> </div>  

    <label class="col-md-1 control-label right ">Inicio </label>
    <div class="col-md-2 <?php if ($form['diaInicio']->hasError()) echo "has-error" ?>">
        <?php echo $form['diaInicio'] ?>           
        <span class="help-block form-error"> 
            <?php echo $form['diaInicio']->renderError() ?>  
        </span>
    </div>
    <label class="col-md-1 control-label right ">Fin</label>
    <div class="col-md-2 <?php if ($form['diaFin']->hasError()) echo "has-error" ?>">
        <?php echo $form['diaFin'] ?>           
        <span class="help-block form-error"> 
            <?php echo $form['diaFin']->renderError() ?>  
        </span>
    </div>
    <label class="col-md-1 control-label right ">Dias </label>
    <div class="col-md-1 <?php if ($form['dia']->hasError()) echo "has-error" ?>">
        <?php echo $form['dia'] ?>           
        <span class="help-block form-error"> 
            <?php echo $form['dia']->renderError() ?>  
        </span>    
    </div>

</div>





<div class="row">
    <div class="col-md-1"> </div>  
    <div class="col-md-1"> </div>
    <div class="col-md-3">
       
    </div>
<!--    <div class="col-md-1 font-green-jungle">Dias Pendientes </div>
    <div class="col-md-1  font-green-jungle Bold bold"><?php echo $pendientes; ?> </div>-->

    <div class="col-md-2">
        <div id="procesar" name="procesar" >

<!--            <button class="btn btn-primary btn-block  btn-block"
                    procesa="procesa"
                    type="submit">
                <i class="fa fa-check "></i>
                Procesar
            </button>-->
        </div>

    </div>
</div>