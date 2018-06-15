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
                    <li class=" ">
                        <a href="<?php echo url_for("crea_usuario/index"); ?>" 
                           class="nav-link  ">Crear Usuario </a>
                    </li>  

                    <li class=" ">
                        <a href="<?php echo url_for("edita_usuario/index"); ?>" 
                           class="nav-link  ">Editar Usuario </a>
                    </li>  

                
                </ul>

            </li>
   
            <li class="menu-dropdown classic-menu-dropdown active">
                <a href="javascript:;">  <i class="icon-notebook font-grey-cararra"></i> Solicitudes
                    <span class="arrow"></span>
                </a>
                <ul class="dropdown-menu pull-left">
                    <li class=" ">
                        <a href="<?php echo url_for("modera/index"); ?>" 
                           class="nav-link  ">Autorizar Campaña</a>

                        <a href="<?php echo url_for("toda_campana/index"); ?>" 
                           class="nav-link  ">Campañas Activas </a>
                    </li>
                </ul>   
            </li>
            <li class="menu-dropdown classic-menu-dropdown active">
                <a href="javascript:;"> <i class="icon-magnifier font-blue"></i> Consultas
                    <span class="arrow"></span>
                </a>
                <ul class="dropdown-menu pull-left">
                    <li class=" ">
                        <a href="#<?php echo url_for("consulta_campa/index"); ?>" 
                           class="nav-link  ">Consulta </a>

                        <a href="#<?php echo url_for("consulta_todacamp/index"); ?>" 
                           class="nav-link  ">Consulta </a>
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