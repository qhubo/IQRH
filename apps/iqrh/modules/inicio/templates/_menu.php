<div class="container">

    <div class="hor-menu  ">
        <ul class="nav navbar-nav">
            <li class="menu-dropdown classic-menu-dropdown active">
                <a href="<?php echo url_for("inicio/index"); ?>"> 
                    <i class="fa fa-home"></i>  
                    Inicio
                </a>
            </li>
            <li class="menu-dropdown classic-menu-dropdown ">
                <a href="javascript:;">  <i class="icon-wrench font-green-turquoise"></i>  Administración
                    <span class="arrow"></span>
                </a>
                <ul class="dropdown-menu pull-left">
<!--                    <li class=" ">
                        <a href="<?php echo url_for("crea_usuario/index"); ?>" 
                           class="nav-link  ">Crear Usuario </a>
                    </li>  -->

                    <li class=" ">
                        <a href="<?php echo url_for("edita_usuario/index"); ?>" 
                           class="nav-link  ">Editar Usuario </a>
                    </li>  
   <li class=" ">
                        <a href="<?php echo url_for("asigna_jefe/index"); ?>" 
                           class="nav-link  "> Supervisores </a>
                    </li> 
   <li class=" ">
                        <a href="<?php echo url_for("catalogo_solicitud/index"); ?>" 
                           class="nav-link  "> Catálogo Solicitud </a>
                    </li> 
   <li class=" ">
                        <a href="<?php echo url_for("tipo_ausencia/index"); ?>" 
                           class="nav-link  "> Catálogo Ausencias </a>
                    </li>              
                    
                     <li class=" ">
                        <a href="<?php echo url_for("empresa_horario/index"); ?>" 
                           class="nav-link  "> Horario</a>
                    </li>      
                          <li class=" ">
                        <a href="<?php echo url_for("dia_feriado/index"); ?>" 
                           class="nav-link  "> Dias Feriado</a>
                    </li>
                    
                           <li class=" ">
                        <a href="<?php echo url_for("usuario_horario/index"); ?>" 
                           class="nav-link  "> Horario Empleado</a>
                    </li>  
                </ul>

            </li>
   
            <li class="menu-dropdown classic-menu-dropdown active">
                <a href="javascript:;"> 
                    <i class="fa fa-rocket font-grey-cararra"></i>
                    Solicitudes
                    <span class="arrow"></span>
                </a>
                <ul class="dropdown-menu pull-left">
                    <li class=" ">
                        <a href="<?php echo url_for("ausencia/index"); ?>" 
                           class="nav-link  ">Permiso Ausencia</a>
                    </li>
                    <li class=" ">
                        <a href="<?php echo url_for("vacaciones/index"); ?>" 
                           class="nav-link  ">Vacaciones</a>
                 </li>
                      <?Php $super=  sfContext::getInstance()->getUser()->getAttribute('supervisa', null, 'seguridad'); ?>
                            <?PHP if ($super >0) { ?>
                    <li class=" ">
                        <a href="<?php echo url_for("finiquito/index"); ?>" 
                           class="nav-link  ">Finiquito</a>
                 </li>
                            <?php  } ?>
                 
                     <li class=" ">
                        <a href="<?php echo url_for("crea_solicitud/index"); ?>" 
                           class="nav-link  ">Solicitud</a>
                 </li>
                </ul>   
            </li>
            <li class="menu-dropdown classic-menu-dropdown active">
                <a href="javascript:;"> <i class="icon-magnifier font-blue"></i> Consultas
                    <span class="arrow"></span>
                </a>
                <ul class="dropdown-menu pull-left">
                    <li class=" ">
                        <a href="<?php echo url_for("consulta_vaca/index"); ?>" 
                           class="nav-link  ">Mis Vacaciones </a>

                        <a href="<?php echo url_for("consulta_ausencia/index"); ?>" 
                           class="nav-link  ">Mis Ausencias  </a>
                           
                                <a href="<?php echo url_for("consulta_finiquito/index"); ?>" 
                           class="nav-link  ">Finiquitos  </a>
                    </li>
                </ul>   
            </li>

               <li class="menu-dropdown classic-menu-dropdown active">
                <a href="javascript:;"> <i class="fa fa-print font-yellow-casablanca"></i> Reportes
                    <span class="arrow"></span>
                </a>
                <ul class="dropdown-menu pull-left">
                    <li class=" ">
                              <a href="<?php echo url_for("reporte_asistencia/index"); ?>" 
                           class="nav-link  ">Asistencia </a>
                           
                        <a href="<?php echo url_for("reporte_recibo/index"); ?>" 
                           class="nav-link  ">Recibos </a>

                        <a href="<?php echo url_for("reporte_aumento/index"); ?>" 
                           class="nav-link  ">Aumentos</a>
                        <a href="<?php echo url_for("reporte_traslado/index"); ?>" 
                           class="nav-link  ">Traslados</a>
                           
                    </li>
                </ul>   
            </li>
            
            
            <li class="menu-dropdown classic-menu-dropdown active">
                <a href="javascript:;">  <i class="icon-settings font-grey-steel "></i> Configuración
                    <span class="arrow"></span>
                </a>
                <ul class="dropdown-menu pull-left">
                    <li class=" ">
                        <a href="<?php echo url_for("parametro/index"); ?>" 
                           class="nav-link  ">Parametros </a>
                    </li>
        
                </ul>   
            </li>


        </ul>
    </div>
</div>