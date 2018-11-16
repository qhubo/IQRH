<?php $usaurioQ = UsuarioQuery::create()->findOneByCodigo($UsuarioHorario->getUsuario()); ?>
<?php if ($usaurioQ) { ?>
<?php echo $usaurioQ->getNombreCompleto(); ?>

<?php } ?>

