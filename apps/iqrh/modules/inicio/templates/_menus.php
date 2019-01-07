<?php $opciones = MenuSeguridadQuery::menu(); ?>

<div class="container">
    <div class="hor-menu  ">
        <ul class="nav navbar-nav">
            <li class="menu-dropdown classic-menu-dropdown active">
                <a href="<?php echo url_for("inicio/index"); ?>"> 
                    <i class="fa fa-home"></i>  
                    Inicio
                </a>
            </li>
            <?php foreach ($opciones as $menu) { ?>
                 <?php $image= $menu['imagen'] ?>
    <?php $image= str_replace("li", "i", $image); ?>
                <li class="menu-dropdown classic-menu-dropdown active">
                    <a href="javascript:;">

 <?php echo $image ?> <?php echo $menu['titulo'] ?>
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <?php foreach ($menu['submenu'] as $opcion) { ?>   
                            <li class=" ">
                                <a href="<?php echo url_for($opcion['modulo']."/index"); ?>" class="nav-link"><?php echo $opcion['titulo'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>