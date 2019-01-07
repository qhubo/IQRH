<?php  $menu = MenuSeguridadQuery::create()->findOneById($MenuSeguridad->getSuperior());
if ($menu){
    echo $menu->getDescripcion();
    
}


