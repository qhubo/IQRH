<script src='/assets/global/plugins/jquery.min.js'></script>
<?php      $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'); ?>
<?php 
  $usuarios = UsuarioQuery::create()
                ->filterByUsuarioJefe($usuarioId)
                ->find();
       
        $empleado[]=-99;
        foreach ($usuarios as $lista){
            $empleado[]=$lista->getId();
        }
        ?>


    <?php $pend1 = SolicitudVacacionQuery::create()->filterByEstado('Pendiente')
            ->filterByUsuarioId($empleado, Criteria::IN)->count(); ?>
    <?php $pend2 = SolicitudAusenciaQuery::create()->filterByEstado('Pendiente')
            ->filterByUsuarioId($empleado, Criteria::IN)->count(); ?>

<?php $pendientes = $pend1+$pend2; ?>
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
    <a href="<?php echo url_for("inicio/notifica?id=1") ?>" class="dropdown-toggle font-blue" >
        <i class="fa fa-gavel font-yellow-crusta"></i>&nbsp;&nbsp;Autorizar&nbsp;&nbsp;
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

<?php $bitacoras = BitacoraUsuarioQuery::create()->filterByUsuarioJefe($usuarioId)->filterByLeido(false)->find(); ?>
<?php $cantida = count($bitacoras) ?>

<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="icon-bell"></i>
        <?php if ($cantida > 0) { ?>
        <span class="badge badge-default"  ><div id="can" name="can"> <?php echo $cantida ?></div> </span>
        </a>
    <?php } ?>

    <ul class="dropdown-menu">
        <li class="external">
            <h3> Alerta <strong>  </strong> Notificaciones</h3>
            <a href="<?php echo url_for("inicio/bitacora") ?>">Ver Mas</a>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                <?php $cat=0; ?>
                <?php foreach ($bitacoras as $re) { ?>
                <?php $cat++; ?>                
                <?php $nota = '<span class="label label-sm label-icon label-danger"><i class="fa fa-bullhorn"></i> </span>'; ?>
                 <?php if ($re->getTipo() == "Vacacion") { ?>
                        <?php $nota = '<span class="label label-sm label-icon label-info"><i class="fa fa-bullhorn"></i> </span>' ?>
                    <?php } ?>
                <?php if ($re->getTipo()=='Ausencia') { ?>
                        <?php $nota = '<span class="label label-sm label-icon label-warning"><i class="fa fa-flash"></i> </span>' ?>
                    <?php } ?>
                
                <li id="not<?php echo $cat; ?>" name="not<?php echo $cat; ?>">
                        <a id="Nactivar<?php echo $cat; ?>" dat="<?php echo $re->getId(); ?>">
                            <span class="time"><?php echo $re->getTipo(); ?> </span>
                            <span class="details"><?php echo $nota ?> Empleado  <?php echo $re->getUsuario()->getCodigo(); ?> </span>
                        </a>
                    </li>
                
                              <script type="text/javascript">
        $(document).ready(function () {
            $('#Nactivar<?php echo $cat; ?>').click(function () {
               $('#not<?php echo $cat; ?>').hide();
                var id = <?php echo $re->getId(); ?>;
               //  alert('activa');
              //  alert(id);
                $.ajax({
                    type: 'POST',
                    url: '/iqrh_dev.php/inicio/Nota',
                    data: {'id': id},
                    success: function (data) {
                           $('#can').html(data);
                    }
                });
            });
        });
    </script>
                          <?php } ?>
            </ul>
        </li>
    </ul>
</li>

<li class="dropdown dropdown-user dropdown-dark">
    &nbsp;&nbsp;&nbsp;&nbsp;
</li>
<?php $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'); ?>
<?php $usuarioQ = UsuarioQuery::create()->findOneById($usuarioId); ?>


<?php $imagen = $usuarioQ->getLogo(); ?>


<li class="dropdown dropdown-user dropdown-dark">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

        <?php if ($imagen) { ?>
            <img alt="" class="img-circle" src="<?php echo $imagen ?>">
        <?php } else { ?>
            <img alt="" class="img-circle" src="../assets/layouts/layout3/img/avatar9.jpg">
        <?php } ?>

        <span class="username username-hide-mobile">
            <font color="#97D700">
            <?php echo $usuarioQ->getNombreCompleto(); ?>
            <?php //echo sfContext::getInstance()->getUser()->getAttribute('usuarioNombre', null, 'seguridad'); ?>
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




<?php $cat=0; ?>
<?php foreach($bitacoras as $lista) { ?>
<?php $cat++ ?>
<!--    <script type="text/javascript">
        $(document).ready(function () {
            $('#Nactivar<?php echo $cat; ?>').click(function () {
               $('#not<?php echo $cat; ?>').hide();
                var id = <?php echo $lista->getId(); ?>;
               //  alert('activa');
                alert(id);
                $.ajax({
                    type: 'POST',
                    url: '/gthoy_dev.php/inicio/activaPortada',
                    data: {'id': id},
                    success: function (data) {
                    }
                });
            });
        });
    </script>-->

<?php } ?>
