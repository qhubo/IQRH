<?php $pendientes =0; // CampanaQuery::create()->filterByAutorizado(0)->count(); ?>
<?php //if (MenuSeguridadQuery::menuAcceso('PuntoVenta')) {  ?>
<!--<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark  " id="header_task_bar">
    <a href="<?php echo url_for("pos/index?inicio=1") ?>" class="dropdown-toggle font-green-jungle" >
        <i class="fa fa-money  font-green-turquoise"></i>&nbsp;Atajo  # 1

    </a>
</li>-->
<?php // } ?>
&nbsp;&nbsp;
<?php // if (MenuSeguridadQuery::menuAcceso('Pedido')) { ?>
<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark font-blue" id="header_task_bar">
    <a href="<?php echo url_for("modera/index?id=1") ?>" class="dropdown-toggle font-blue" >
        <i class="fa fa-search-plus font-yellow-saffron"></i>&nbsp;&nbsp;Monitor&nbsp;&nbsp;
        <?php if ($pendientes > 0) { ?>
            <span class="badge badge-danger"> <?php echo $pendientes ?>  </span>
        <?php } ?>
    </a>
</li>
<?php // } ?>
&nbsp;&nbsp;
<?php //if (MenuSeguridadQuery::menuAcceso('Entrega')) { ?>
<!--<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark  " id="header_task_bar">
    <a href="<?php echo url_for("crea_envio/index") ?>" class="dropdown-toggle font-purple-studio">
        <i class="fa fa-opencart font-purple-plum"></i>&nbsp;Atajo # 3

    </a>
</li>-->
<?php // } ?>
&nbsp;&nbsp;
<?php         $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'); ?>
<?php //$bitacoras = BitacoraCampanaQuery::create()->filterByRevisado(false)->filterByUsuarioNotifica($usuarioId)->find(); ?>
<?php $cantida = 0;  //count($bitacoras) ?>

<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="icon-bell"></i>
        <?php if ($cantida > 0) { ?>
            <span class="badge badge-default"><?php echo $cantida ?> </span>
        </a>
    <?php } ?>

    <ul class="dropdown-menu">
        <li class="external">
            <h3> Alerta <strong><?php echo $cantida ?>  </strong> campañas</h3>
            <a href="<?php echo url_for("inicio/notifica") ?>">Ver Mas</a>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                <?php foreach ($bitacoras as $re) { ?>
                    <?php $nota = '<span class="label label-sm label-icon label-info"><i class="fa fa-bullhorn"></i> </span>'; ?>
                    <?php if ($re->getTipo() == "Rechazo") { ?>
                        <?php $nota = '<span class="label label-sm label-icon label-danger"><i class="fa fa-flash"></i> </span>' ?>
                    <?php } ?>
                <?php if ($re->getTipo()=='Cancelado') { ?>
                        <?php $nota = '<span class="label label-sm label-icon label-warning"><i class="fa fa-bug"></i> </span>' ?>
                    <?php } ?>
                
                    <li>
                        <a href="javascript:;">
                            <span class="time"><?php echo $re->getTipo(); ?> </span>
                            <span class="details"><?php echo $nota ?> Campaña  <?php echo $re->getCampana()->getCodigo(); ?> </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    </ul>
</li>

<li class="dropdown dropdown-user dropdown-dark">
    &nbsp;&nbsp;&nbsp;&nbsp;
</li>
<?php $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'); ?>


<?php $imagen = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'imagen'); ?>


<li class="dropdown dropdown-user dropdown-dark">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

        <?php if ($imagen) { ?>
            <img alt="" class="img-circle" src="/uploads/empresas/<?php echo $imagen ?>">
        <?php } else { ?>
            <img alt="" class="img-circle" src="../assets/layouts/layout3/img/avatar9.jpg">
        <?php } ?>

        <span class="username username-hide-mobile">
            <font color="#97D700">
            <?php echo sfContext::getInstance()->getUser()->getAttribute('usuarioNombre', null, 'seguridad'); ?>
            </font>
        </span>
    </a>

    <ul class="dropdown-menu dropdown-menu-default">
        <li>
            <a href="<?php echo url_for("inicio/cambioClave"); ?>">
                <i class="icon-lock-open"></i> Cambiar Clave </a>
        </li>
        <li class="divider"> </li>
        <li>
            <a href="<?php echo url_for("inicio/imagen"); ?>">
                <i class="fa fa-user-secret"></i>  Perfil </a>
        </li>
    </ul>
</li>



<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark  " id="header_task_bar">
    <a href="<?php echo url_for("seguridad/logout"); ?>" class="dropdown-toggle font-purple-studio">
        <i class="icon-logout"></i>

    </a>
</li>

