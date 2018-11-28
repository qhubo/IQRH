<!--<script src='/assets/global/plugins/jquery.min.js'></script>-->
<?php $modulo = $sf_params->get('module'); ?>
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
            <a class="btn  btn green-meadow " href="<?php echo url_for($modulo . '/index') ?>" ><i class="fa fa-hand-o-left"></i> Retornar </a>

        </div>
    </div>
    <div class="portlet-body">


        <div class="row">
            <div class="col-md-1"> </div>        
            <label class="col-md-2 control-label font-green right ">Fecha Inicio </label>
            <div class="col-md-2 ">
                <?php echo $valores['fechaInicio'] ?>           

            </div>

            <label class="col-md-2 control-label font-green right ">Fecha&nbsp;Fin</label>
            <div class="col-md-2 ">
                <?php echo $valores['fechaFin'] ?>           

            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1 font font-blue bold Bold">Empresa</div>
            <div class="col-md-4"> 
                <?php echo $valores['empresa'] ?>           


            </div>
            <div class="col-md-1"> </div>

        </div>

        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <a class="btn  btn red-flamingo btn-outline  btn-block "  target="_blank"  href="<?php echo url_for('reporte/asistencia') ?>" ><i class="fa fa-list"></i>&nbsp;&nbsp;Reporte&nbsp;&nbsp;  <i class="fa fa-file-pdf-o "></i></a>

            </div>            
        </div> 
        <div class="row">
            <div class="col-md-12"><br><br></div>
        </div>



        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_1_1" data-toggle="tab">
                    <span class="caption-subject font-green uppercase bold">Dashboard </span>
                </a>
            </li>
            <li>
                <a href="#tab_1_2" data-toggle="tab">Resumen</a>
            </li>
            <li>
                <a href="#tab_1_3" data-toggle="tab">Detalle de dias</a>
            </li>
        </ul>
        <?php $port = ''; ?>   
        <?php if ($_SERVER['SERVER_NAME'] == 'iqrh') { ?>
            <?php $port = ':8080'; ?>   
        <?php } ?>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1_1">
                <div class="row">
                    <div class="col-md-12">      
                        <table width="900px" height="530px" cellpadding="0" cellspacing="0" border="0">
                            <tr style='height:100%;background:white;'>
                                <td>
                                    <iframe id="pes_frame"  src="http://<?php echo $_SERVER['SERVER_NAME']; ?><?php echo $port; ?>/grafica.php?empresa=<?php echo trim($valores['empresa']) ?>"  frameborder="0"
                                            style="width:900px; height:100%; overflow-x:hidden;" vspace="0" hspace="0"></iframe>
                                </td>
                            </tr>
                        </table>                
                    </div>  
                    <div class="row">
                                              
                           <div class="col-md-9 ">
                    <?php echo $form['texto'] ?>           

                </div>
                    </div>
                    <div class="col-md-12">   

                        <table width="1100px" height="500px" cellpadding="0" cellspacing="0" border="0">
                            <tr style='height:100%;background:white;'>
                                <td width="200px">
                                    <table>
                                        <?php $li = 0; ?>
                                        <?php foreach ($dataGra as $reg) { ?>
                                            <?php $li++; ?>
                                            <tr>
                                                <td width="15%"><strong><font size="-2"> <?php echo ($li * 5); ?></font></strong>&nbsp;&nbsp;</td>
                                                <td><font size="-2"><?php echo $reg ?></font></td>

                                            </tr>
                                        <?php } ?>
                                    </table>
                                </td>  
                                <td  width="900px">
                                    <iframe id="pes_frame"  src="http://<?php echo $_SERVER['SERVER_NAME']; ?><?php echo $port; ?>/graficaX.php?empresa=<?php echo trim($valores['empresa']) ?>"  frameborder="0"
                                            style="width:900px; height:100%; overflow-x:hidden;" vspace="0" hspace="0"></iframe>
                                </td>
                            </tr>
                        </table>



                    
                    </div> 
                   <div class="row">
                       <div class="col-md-2 "> </div>        
                           <div class="col-md-9 ">
                    <?php echo $form['texto2'] ?>           

                </div>
                    </div>
            </div>

                
            </div>
            <div class="tab-pane " id="tab_1_2">
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        <a class="btn  btn green-jungle btn-outline  btn-block "    href="<?php echo url_for('reporte/resumenAsiste') ?>" >&nbsp;&nbsp;Reporte&nbsp;&nbsp; <i class="fa fa-file-excel-o"></i> </a>

                    </div>            
                </div>
                <?php include_partial('reporte_asistencia/empleado', array('Listado' => $Listado, 'inicio' => $inicio, 'fin' => $fin)) ?> 

            </div>
            <div class="tab-pane " id="tab_1_3">

                <!--                <div class="table-scrollable">-->

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
                            <?php $usuariQ = UsuarioQuery::create()->findOneByCodigo($lista->getUsuario()); ?>

                            <tr>
                                <td>
                                    <font color="white">                        
                                    <?php echo $lista->getDia('Ymd'); ?> 
                                    </font>
                                    <br>
                                    <font size="-1">   <?php echo $lista->getDia('d/m/Y'); ?></font>
                                </td>
                                <td align="center">
                                    <font size="-1"> <?php echo $usuariQ->getCodigo(); ?></font></td>
                                <td>
                                    <font size="-1"><?php echo $usuariQ->getNombreCompleto(); ?></font></td>
                                <td> 
                                    <font size="-1"> <?php echo AsistenciaUsuarioQuery::marcas($lista->getDia('Y-m-d'), $usuariQ->getUsuario()) ?>    </font>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!--                </div>-->
            </div>
        </div>



    </div>
</div>

<?php echo '</form>'; ?>