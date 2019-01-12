<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMBS -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Bienvenido</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">
            <div class="row">
                <div class="col-md-8 col-sm-8">

                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab">
                                <span class="caption-subject font-green uppercase bold">Información  </span>
                            </a>
                        </li>
                         <li>
                            <a href="#tab_1_3" data-toggle="tab">Vacaciones</a>
                        </li>
                        <?php if (count($empleados) >0) { ?>
                        <li>
                            <a href="#tab_1_2" data-toggle="tab">Empleados</a>
                        </li>
                        <?php } ?>
                    </ul>

                    <div class="tab-content">
                        <!-- PERSONAL INFO TAB -->
                        <div class="tab-pane active" id="tab_1_1">
                            <div class="portlet light ">
                                <div class="portlet-body">

                                    <ul class="list-group">
                                        <li class="list-group-item"> 

                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-4 font-blue-hoki bold Bold uppercase">Nombre Completo</div>
                                                <div class="col-md-6"><?php echo $usuario->getNombreCompleto(); ?></div>                                
                                            </div>
                                        </li>
                                        <li class="list-group-item"> 

                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-4 font-blue-hoki bold Bold uppercase">Puesto</div>
                                                <div class="col-md-6"><?php echo $usuario->getPuesto(); ?></div>                                
                                            </div>
                                        </li>
                                        <li class="list-group-item">

                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-4 font-blue-hoki bold Bold uppercase">Departamento</div>
                                                <div class="col-md-6"><?php echo $usuario->getDepartamento(); ?></div>                                
                                            </div>
                                        </li>
                                        <li class="list-group-item"> 

                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-4 font-blue-hoki bold Bold uppercase">Jefe Inmediato</div>
                                                <div class="col-md-6"><?php echo $usuario->getJefe(); ?></div>                                
                                            </div> 
                                        </li>

                                    </ul>
                                    <?php //include_partial('inicio/total') ?> 
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="tab_1_2">
                            <div class="portlet light ">
                                <div class="portlet-body">
                                    <table class="table table-bordered  dataTable table-condensed flip-content" >
                                        <thead class="flip-content">
                                            <tr class="success">
                                               
                                                <td>Codigo </td>
                                                <td>Empleado</td>
                                                <td>Puesto</td>
                                                <td>Fecha Alta</td>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            <?php foreach($empleados as $lista) { ?>
                                            <tr>
                                                <td><?php echo $lista->getCodigo(); ?></td>
                                                <td><?php echo $lista->getNombreCompleto(); ?></td>
                                                <td><?php echo $lista->getPuesto(); ?></td>
                                                <td><?php echo $lista->getFechaAlta('d/m/Y'); ?></td>
                                                
                                            </tr>
                                           <?php  } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="tab_1_3">
                                                              <table class="table table-bordered  dataTable table-condensed flip-content" >
                                        <thead class="flip-content">
                                            <tr class="info">
                                                <td>Periodo</td>
                                                <td>Dias Derecho</td>
                                                <td>Dias Pagado</td>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            <?php foreach ($vacaciones as $reg) { ?>
                                            <tr>
                                                <td align="center" ><?php echo $reg['periodo']; ?></td>
                                                <td align="right"><?php echo $reg['derecho']; ?></td>
                                                <td  align="right"><?php echo $reg['pagada']; ?></td>
                                                
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                                              </table>
                                        
                                            
                        </div>
                    </div>

                    
                    

                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="mt-element-ribbon bg-grey-steel">
                        <div class="ribbon ribbon-shadow ribbon-color-success uppercase"><?php echo $usuario->getCodigo(); ?> </div>
                        <p class="ribbon-content bold Bold">
                        <div class="row">
                            <div class="col-md-1"><li class="fa fa-calendar-plus-o font-blue-steel"></li> </div>
                            <div class="col-md-4 font-blue-hoki bold Bold uppercase">Ingreso</div>
                            <div class="col-md-6"> <?php echo $usuario->getFechaAlta('d/m/Y'); ?></div>                                
                        </div> 
                        </p>
                        <div class="row">
                            <div class="col-md-1"><li class="fa fa-trophy font-yellow-crusta"></li> </div>
                            <div class="col-md-7 font-blue-sharp bold Bold uppercase">Vacaciones Pendientes</div>
                            <div class="col-md-3"> <?php echo $pendientes ?><font size="-2"> Dias </font></div>                                
                        </d
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <img src="<?php echo $usuario->getLogo(); ?>" height="150px"  alt="">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
