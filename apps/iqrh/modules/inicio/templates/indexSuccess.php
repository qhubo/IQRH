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
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <i class="fa fa-pencil-square font-green"></i>
                                <span class="caption-subject font-green uppercase bold">Información  </span>
                                <span class="caption-helper">Lista de datos ..</span>

                            </div>
                            <div class="actions">

                            </div>
                        </div>
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
