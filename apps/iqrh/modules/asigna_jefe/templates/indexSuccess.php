<script src='/assets/global/plugins/jquery.min.js'></script>
<?php $modulo = $sf_params->get('module'); ?>

<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-yellow-casablanca uppercase">Asignación Supervisor</span> 
            <i class="fa fa-list font-yellow-crusta"></i>
            <span class="caption-helper">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <div class="portlet-input input-inline input-small">

            </div>
        </div>
        <div class="inputs">
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1 font font-blue bold Bold">Empresa</div>
            <div class="col-md-4">
                <form action="<?php echo url_for('asigna_jefe/index?id=0') ?>" method="post">
                    <select  onchange="this.form.submit()" class="form-control" name="em" id="em">
                        <option value="">[Seleccione]</option>
                        <?php foreach ($empresas as $lista) { ?>
                        <option <?php if ($empresaseleccion== $lista->getEmpresa() ) { ?>selected="selected"  <?php } ?>  value="<?php echo $lista->getEmpresa(); ?>"><?php echo $lista->getEmpresa(); ?></option>
                        <?php } ?>
                    </select>
                </form>
            </div>
        </div>

        <table class="table table-bordered  dataTable table-condensed flip-content" id="sample_2">
            <thead class="flip-content">
                <tr class="info">
                    <td>Codigo </td>
                    <td>Empleado</td>
                    <td>Jefe</td>
                    <td>Supervisor Web</td>
                </tr> 
            </thead>
            <tbody>
                <?Php foreach ($usuarios as $lista) { ?>
                    <tr>
                        <td align="center"> <?php echo $lista->getCodigo(); ?></td>
                        <td><?php echo $lista->getNombreCompleto(); ?></td>
                        <td><?php echo $lista->getJefe(); ?></td>
                        <td>           <?php echo $form['empleado_' . $lista->getId()] ?>    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?Php foreach ($usuarios as $lista) { ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#consulta_empleado_<?php echo $lista->getId(); ?>").on('change', function () {
                var id = <?php echo $lista->getId(); ?>;
                var idv = $("#consulta_empleado_<?php echo $lista->getId(); ?>").val();
                $.get('<?php echo url_for("asigna_jefe/jefe") ?>', {id: id, idv: idv}, function (response) {

                });
            });
        });
    </script>
<?php } ?>