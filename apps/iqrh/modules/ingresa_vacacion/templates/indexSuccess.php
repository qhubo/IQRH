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

            <form action="<?php echo url_for($modulo . '/index?id=0') ?>" method="post">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-1 font font-blue bold Bold">Empresa</div>
                    <div class="col-md-4">
                        <?php if (!$edit) { ?>
                        <select  onchange="this.form.submit()" class="form-control" name="em" id="em">
                            <option value="">[Seleccione]</option>
                            <?php foreach ($empresas as $lista) { ?>
                                <option <?php if ($empresaseleccion == $lista->getEmpresa()) { ?>selected="selected"  <?php } ?>  value="<?php echo $lista->getEmpresa(); ?>"><?php echo $lista->getEmpresa(); ?></option>
                            <?php } ?>
                        </select>
                        <?php } else { ?>
                        <?php echo $empresaseleccion; ?>
                        <?php } ?>
                    </div>
                </div>
            </form>

            <div class="tab-pane active" id="tab_1_1">
                <?php echo $form->renderFormTag(url_for($modulo . '/index?t=1&em='.$empresaseleccion."&edit=".$q), array('class' => 'form-horizontal"')) ?>
                <?php echo $form->renderHiddenFields() ?>
                <?php include_partial('ingresa_vacacion/forma', array('edit'=>$edit,'form' => $form)) ?> 




                <div class="row">
                    <div class="col-md-1"> </div>  
                    <div class="col-md-1"><font size="-1"> Observaciones </font> </div>
                    <div class="col-md-6 <?php if ($form['observaciones']->hasError()) echo "has-error" ?>">

                        <?php echo $form['observaciones'] ?>           
                        <span class="help-block form-error"> 
                            <?php echo $form['observaciones']->renderError() ?>  
                        </span>    
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-1"> </div>  
                    <div class="col-md-1">Periodo </div>
                    <div class="col-md-2 <?php if ($form['periodo']->hasError()) echo "has-error" ?>">

                        <?php echo $form['periodo'] ?>           
                        <span class="help-block form-error"> 
                            <?php echo $form['periodo']->renderError() ?>  
                        </span>    
                    </div>
                    <div class="col-md-3 font-green bold Bold"   name="respuestaP" id="respuestaP"> 
                        <?php echo sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'Diap') ?>

                    </div>

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
                <div class="row">
                    <div class="col-md-9"> </div>
                     <div class="col-md-2">
                         <a class="btn  btn green-jungle btn-outline  btn-block "  target="_blank"  href="<?php echo url_for('ingresa_vacacion/reporte?id='.$empresaseleccion) ?>" >&nbsp;&nbsp;Reporte&nbsp;&nbsp; <i class="fa fa-file-pdf-o"></i> </a>
                     </div>
                     </div>
                <table class="table table-bordered  dataTable table-condensed flip-content" id='sample_x2'>
                    <thead class="flip-content">
                        <tr class="success">
                            <th align="center" width="50px"><font size='-1'>Inicio</font></th>
                            <th align="center" width="50px"><font size='-1'>Fin</font></th>
                            <th align="center" width="50px"><font size='-1'>Codigo</font></th>
                            <th align="center" ><font size='-1'> Empleado</font> </th>

                            <th align="center" width="100px"><font size='-1'>Dias Vacaciones</font></th>
                            <th align="center" width="100px"><font size='-1'>Creación</font></th>
                            <th align="center" width="5px"><font size='-1'></font></th>
                            <th align="center" width="5px"><font size='-1'></font></th>
                            <th align="center" width="10px"><font size='-1'></font></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listado as $reg) { ?>
                            <?php $lista = $reg; ?>
                            <?php $usuarioQ = UsuarioQuery::create()->findOneByCodigo($reg->getUsuario()); ?>

                            <tr>
                                <td><font color="white" size='-5'> <?php echo $reg->getFechaInicio('Ymd'); ?> </font> <font size='-1'> <?php echo $reg->getFechaInicio('d/m/Y'); ?> </font></td>
                                <td><font size='-1'><br> <?php echo $reg->getFechaFin('d/m/Y'); ?> </font></td>
                                <td><font size='-1'><br> <?php echo $usuarioQ->getCodigo(); ?> </font></td>
                                <td><font size='-1'><br> <?php echo $usuarioQ->getNombreCompleto(); ?> </font></td>

                                <td align='right'> <strong> <?php echo $reg->getDiaVacacion(); ?> </strong>
                                    <br> <font size="-2"> <?php echo $reg->getEstatus() ?> </font>
                                </td>
                                <td><font size='-2'> <?php echo $reg->getUsuarioCreo(); ?> <br> <?php echo $reg->getFechaCrea('d/m/Y'); ?> </font></td>
                                <td align='center'>
                                    <a class="btn btn-xs btn-info" data-toggle="modal" href="#staticIN<?php echo $reg->getId() ?>"><i class="fa fa-info-circle"></i>   </a>
                                </td>
                                <td>
                                  <a class="btn  btn-xs yellow btn-outline"  href="<?php echo url_for($modulo . '/index?edit=' . $reg->getId()) ?>" ><i class="fa fa-edit"></i> </a>  
                                   
                                </td>

                                
                                <td align='center'>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" href="#static<?php echo $reg->getId() ?>"><i class="fa fa-trash"></i>   </a>
                                </td>
                            </tr>


                        <div id="staticIN<?php echo $lista->getId() ?>" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <li class="fa fa-list font-yellow-crusta"></li>
                                        <span class="caption-subject bold font-blue-steel uppercase"> Observaciones</span>
                                    </div>
                                    <div class="modal-body">
                                        <p> 
                                            <?php echo $lista->getObservaciones(); ?>
                                        </p>
                                    </div>
                                    <?php $token = md5($lista->getId()); ?>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancelar</button>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div id="static<?php echo $lista->getId() ?>" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <li class="fa fa-cogs"></li>
                                        <span class="caption-subject bold font-yellow-casablanca uppercase"> Eliminar Ingreso</span>
                                    </div>
                                    <div class="modal-body">
                                        <p> Esta seguro de eliminar Vacación
                                            <span class="caption-subject font-green bold uppercase"> 
                                                <?php echo $usuarioQ->getNombreCompleto() ?>
                                            </span> ?
                                        </p>
                                    </div>
                                    <?php $token = md5($lista->getId()); ?>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancelar</button>
                                        <a class="btn  btn green " href="<?php echo url_for($modulo . '/elimina?token=' . $token . '&id=' . $lista->getId()) ?>" >
                                            <i class="fa fa-trash-o "></i> Confirmar</a> 
                                    </div>
                                </div>
                            </div>
                        </div> 

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