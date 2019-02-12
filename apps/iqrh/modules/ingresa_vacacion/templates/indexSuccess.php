<script src='/assets/global/plugins/jquery.min.js'></script>
<?php $modulo = $sf_params->get('module'); ?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-calendar-check-o font-yellow-crusta"></i>
            <span class="caption-subject bold font-blue-steel uppercase">Ingreso Proyección Vacaciones </span>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">

            </div>
        </div>
    </div>
    <div class="portlet-body">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_1_1" data-toggle="tab">
                    <span class="caption-subject font-green bold"> Vacaciones </span>
                </a>
            </li>
            <!--            <li>
                            <a href="#tab_1_2" data-toggle="tab">Listado</a>
                        </li>-->
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1_1">
                <?php echo $form->renderFormTag(url_for($modulo . '/index'), array('class' => 'form-horizontal"')) ?>
                <?php echo $form->renderHiddenFields() ?>
                <?php include_partial('ingresa_vacacion/forma', array('form' => $form)) ?> 


                <div class="row">
                    <div class="col-md-1"> </div>  
                    <div class="col-md-1">Periodo </div>
                       <div class="col-md-2 <?php if ($form['periodo']->hasError()) echo "has-error" ?>">
                           
        <?php echo $form['periodo'] ?>           
        <span class="help-block form-error"> 
            <?php echo $form['periodo']->renderError() ?>  
        </span>    
    </div>
                        <div class="col-md-3 font-green bold Bold"   name="respuestaP" id="respuestaP"> </div>
                    <div class="col-md-3"> </div>
                    <div class="col-md-2">
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
                  <div class="row">
               <div class="col-md-9"><br><br><br><br> </div> 
           </div>
        
                <table class="table table-bordered  dataTable table-condensed flip-content" id='sample_1'>
                    <thead class="flip-content">
                        <tr class="success">
    <!--                        <th align="center" width="20px"></th>-->
                            <th align="center" width="50px"><font size='-1'>Codigo</font></th>
                            <th align="center" ><font size='-1'> Empleado</font> </th>
                            <th align="center" width="50px"><font size='-1'>Inicio</font></th>
                            <th align="center" width="50px"><font size='-1'>Fin</font></th>
                            <th align="center" width="100px"><font size='-1'>Dias Vacaciones</font></th>
                            <th align="center" width="100px"><font size='-1'>Creación</font></th>
                            <th align="center" width="10px"><font size='-1'></font></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listado as $reg) { ?>
                        <?php $usuarioQ = UsuarioQuery::create()->findOneByCodigo($reg->getUsuario()); ?>

                            <tr>
                                <td><font size='-1'> <?php echo $usuarioQ->getCodigo(); ?> </font></td>
                                <td><font size='-1'> <?php echo $usuarioQ->getNombreCompleto(); ?> </font></td>
                                <td><font size='-1'> <?php echo $reg->getFechaInicio('d/m/Y'); ?> </font></td>
                                <td><font size='-1'> <?php echo $reg->getFechaFin('d/m/Y'); ?> </font></td>
                                <td align='right'><font size='-1'> <?php echo $reg->getDiaVacacion(); ?> </font></td>
                                <td><font size='-2'> <?php echo $reg->getUsuarioCreo(); ?> <br> <?php echo $reg->getFechaCrea('d/m/Y'); ?> </font></td>
                                <td align='center'><li class="fa fa-trash  font-red-flamingo"></li> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
        </div>

    </div>
</div>


    <script type="text/javascript">
        $(document).ready(function () {
            $("#consulta_empleado").on('change', function () {
           //     alert('llega');
             
                var id = $("#consulta_empleado").val();
                $.get('<?php echo url_for("ingresa_vacacion/dia") ?>', {id: id}, function (response) {
                    $("#respuesta").html(response);
                });
                $.get('<?php echo url_for("ingresa_vacacion/diaP") ?>', {id: id}, function (response) {
                    $("#respuestaP").html(response);
                });
            });
        });
    </script>