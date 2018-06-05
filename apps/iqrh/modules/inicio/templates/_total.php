<?php $usuarioId = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'); ?>
<?php $totalRedMax = 0; ?>
<?php $totalRedPre = 0; ?>
<?php $totalPagMax = 0; ?>
<?php $totalPagUtilizado = 0; ?>

<?php
$campanasPagi = CampanaQuery::create()
        ->filterByTipoCampanaId(1)
        ->filterByUsuarioId($usuarioId)
        ->filterByEstado('Rechazado', Criteria::NOT_IN)
        ->withColumn('sum(Campana.PresupuestoUtilizado)', 'TotalUtilizado')
        ->withColumn('sum(Campana.PresupuestoMaximo)', 'TotalMaximo')
        ->groupByUsuarioId()
        ->findOne();
?>
<?php
$campanasRed = CampanaQuery::create()
        ->filterByTipoCampanaId(2)
        ->filterByUsuarioId($usuarioId)
        ->filterByEstado('Rechazado', Criteria::NOT_IN)
        ->withColumn('sum(Campana.PresupuestoUtilizado)', 'TotalUtilizado')
        ->withColumn('sum(Campana.PresupuestoMaximo)', 'TotalMaximo')
        ->groupByUsuarioId()
        ->findOne();
?>
<?php if ($campanasPagi) { ?>
    <?php $totalPagMax = $campanasPagi->getTotalMaximo(); ?>
    <?php $totalPagUtilizado = $campanasPagi->getTotalUtilizado(); ?>
<?php } ?>
<?php if ($campanasRed) { ?>
    <?php $totalRedMax = $campanasRed->getTotalMaximo(); ?>
    <?php $totalRedPre = $campanasRed->getTotalUtilizado(); ?>
<?php } ?>
<?php $totalMax = $totalPagMax + $totalRedMax; ?>
<?php $totalPresu = $totalPagUtilizado + $totalRedPre; ?>

<?php $porcentaje = ($totalPresu * 100) / $totalMax; ?>
<?php $porcentaje = round($porcentaje,2); ?>
<div class="row">
    <div class="col-md-12 bold Bold font font-green-jungle ">Valor Presupuestado</div>
</div>
<div class="row list-separated">
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="font-grey-mint font-sm"> Total Redes Social </div>
        <div class="uppercase font-hg theme-font"> <?php echo number_format($totalRedMax, 2) ?>
            <span class="font-lg font-grey-mint">Q</span>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="font-grey-mint font-sm"> Total Paginas </div>
        <div class="uppercase font-hg font-purple"> <?php echo number_format($totalPagMax, 2) ?>
            <span class="font-lg font-grey-mint">Q</span>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="font-grey-mint font-sm"> Inversión Total </div>
        <div class="uppercase font-hg font-blue-sharp"> <?php echo number_format($totalMax, 2) ?>
            <span class="font-lg font-grey-mint">Q</span>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 bold Bold font font-blue-sharp">Valor Total Utilizado
        
    </div>
    <div class="col-md-6">

    <div id="bar" class="progress progress-striped" role="progressbar">
        <div class="progress-bar progress-bar-success" style="width: <?php echo $porcentaje ?>%;"> </div>
    </div>
</div>

</div>

<div class="row list-separated">
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="font-grey-mint font-sm"> Total Redes Social </div>
        <div class="uppercase font-hg theme-font"> <?php echo number_format($totalRedPre, 2) ?>
            <span class="font-lg font-grey-mint">Q</span>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="font-grey-mint font-sm"> Total Paginas </div>
        <div class="uppercase font-hg font-purple"> <?php echo number_format($totalPagUtilizado, 2) ?>
            <span class="font-lg font-grey-mint">Q</span>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="font-grey-mint font-sm"> Inversión Total </div>
        <div class="uppercase font-hg font-blue-sharp"> <?php echo number_format($totalPresu, 2) ?>
            <span class="font-lg font-grey-mint">Q</span>
        </div>
    </div>
</div>

