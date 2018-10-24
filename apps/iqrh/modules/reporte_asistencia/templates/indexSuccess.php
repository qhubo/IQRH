<script src='/assets/global/plugins/jquery.min.js'></script>
<?php $modulo = $sf_params->get('module'); ?>

<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-green-jungle uppercase">Asistencia Personal</span> 
            <i class="fa fa-calendar-plus-o font-blue-steel"></i>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">

            </div>
        </div>
        <div class="inputs">
        </div>
    </div>
    <div class="portlet-body">
        
        
             <div class="row">
                <div class="col-md-1"> </div>        
                <label class="col-md-2 control-label font-green right ">Fecha Inicio </label>
                <div class="col-md-2 <?php if ($form['fechaInicio']->hasError()) echo "has-error" ?>">
                    <?php echo $form['fechaInicio'] ?>           
                    <span class="help-block form-error"> 
                        <?php echo $form['fechaInicio']->renderError() ?>  
                    </span>
                </div>
         
                <label class="col-md-2 control-label font-green right ">Fecha&nbsp;Fin</label>
                <div class="col-md-2 <?php if ($form['fechaFin']->hasError()) echo "has-error" ?>">
                    <?php echo $form['fechaFin'] ?>           
                    <span class="help-block form-error"> 
                        <?php echo $form['fechaFin']->renderError() ?>  
                    </span>
                </div>
            </div>
        
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1 font font-blue bold Bold">Empresa</div>
            <div class="col-md-4">
                <form action="<?php echo url_for('reporte_asistencia/index?id=0') ?>" method="post">
                    <select  xonchange="this.form.submit()" class="form-control" name="em" id="em">
                        <option value="">[Seleccione]</option>
                        <?php foreach ($empresas as $lista) { ?>
                        <option <?php if ($empresaseleccion== $lista->getEmpresa() ) { ?>selected="selected"  <?php } ?>  value="<?php echo $lista->getEmpresa(); ?>"><?php echo $lista->getEmpresa(); ?></option>
                        <?php } ?>
                    </select>
                </form>
            </div>
            <div class="col-md-1"> </div>
            <div class="col-md-2">
                <button type="submit"  class="btn btn-outline btn-block blue">
                <i class="fa fa-check"></i>
               Consultar
            </button>
             </div>
        </div>
        
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                 <a class="btn  btn grey-cascade  btn-block "  target="_blank"  href="<?php echo url_for('reporte/asistencia') ?>" ><i class="fa fa-list"></i>&nbsp;&nbsp;Reporte&nbsp;&nbsp;  <i class="fa fa-print"></i></a>
                
            </div>            
        </div>
          <div class="table-scrollable">

        <table class="table table-bordered  dataTable table-condensed flip-content" id="sample_2">
            <thead class="flip-content">
                <tr class="info">
                      <td>Dia</td>
                    <td>Codigo </td>
                    <td>Empleado</td>
                    <td>Marcas</td>
                    
                </tr> 
            </thead>
            <tbody>
                <?Php foreach ($asistencias as $lista) { ?>
                <?php $usuariQ= UsuarioQuery::create()->findOneByCodigo($lista->getUsuario()); ?>
                
                    <tr>
                        <td> <?php echo $lista->getDia('d/m/Y'); ?>           </td>
                        <td align="center"> <?php echo $usuariQ->getCodigo(); ?></td>
                        <td><?php echo $usuariQ->getNombreCompleto(); ?></td>
                        <td>  <?php echo AsistenciaUsuarioQuery::marcas($lista->getDia('Y-m-d'), $usuariQ->getUsuario())   ?>        </td>
                  </tr>
                <?php } ?>
            </tbody>
        </table>
                  </div>
    </div>
</div>

