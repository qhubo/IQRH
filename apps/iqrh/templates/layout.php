<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Drone D4A</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
         <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
     
       
        
        <link href="/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/dropify-master/dist/css/dropify.css" rel="stylesheet" type="text/css"/>

        <link href="/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="/images/favicon.ico" />
        <link href="/css/kunesStyle.css" rel="stylesheet" type="text/css"/>
                <?php $modulo = $sf_params->get('module'); ?>
        
    </head>
    <!-- END HEAD -->
     <?php $empresaId= sfContext::getInstance()->getUser()->getAttribute("usuario", null, 'empresa'); ?>
    
     <?php $proveedorId= sfContext::getInstance()->getUser()->getAttribute("proveedor_id", null, 'seguridad'); ?>
    
    
    <body class="page-container-bg-solid page-boxed page-header-menu-fixed">
        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
<!--                            <font size="-1" color="#307FE2" ><br>    &nbsp;&nbsp;Administrador de Contenido</font> -->
                    <div class="page-logo">
                        <div class="row">
                                     <div class="col-md-2"></div>
                            <div class="col-md-2">
                       
                                <br>
                                <?php $Parametro = ParametroQuery::create()->findOne(); ?>
                                   <?php  if ($Parametro){ ?>
                                <img src="<?php echo  '/uploads/segmento/'. $Parametro->getLogo() ?>" height="48px" >
                        <img src="<?php // echo  '/uploads/empresas/'. $empresquery->getLogo()?>"  height="48px" />
                         <?php  } ?>
                        <img src="/images/Logo_trafico_.png"  height="48px" />
                        
                            </div>
                                                        <div class="col-md-1  font-yellow-crusta">
                             <?php //echo  sfContext::getInstance()->getUser()->getAttribute("usuario", null, 'NombreBodega'); ?>    
                                                        </div>
                            <div class="col-md-1"></div>
                            
                       
                       
                        </div>
                           
                    </div>
                 
                       
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                  
<!--                         <img alt="" class="img-circlex" src="/images/logo.png">
                         
                         
                         -->
                         
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
       
                        
                       <?php  //include_partial('inicio/notificacion') ?>     
                            <!-- END TODO DROPDOWN -->
                            <li class="droddown dropdown-separator">
                                <span class="separator"></span>
                            </li>
                            <!-- BEGIN INBOX DROPDOWN -->
                                      <?php  //include_partial('inicio/bloque') ?>    
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <?php  include_partial('inicio/logueo') ?> 
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                
                 <?php  include_partial('inicio/menu') ?> 
                <?php  //include_partial('inicio/menus') ?> 
         <div class="row">
                    <div class="col-md-1"> </div>  
                    
                    <div class="col-md-8">
                        
                        <span class="caption-subject bold font-green uppercase">
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-car font font-blue-hoki"></i> 
                        </span> 
                        <span class="caption-subject bold font-red-flamingo uppercase">
                        Trafico  502
                        </span>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container-fluid">
                        <!-- BEGIN PAGE TITLE -->
                       <ul class="page-breadcrumb breadcrumb">
                               </ul>
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                                            <?php $label=''; ?>
                         <?php $logo=''; ?>
                         <?php $imagen=''; ?>
                                    <?php if (($modulo == 'tipo_aparato') or ( $modulo == 'marca') or ( $modulo == 'modelo') or ( $modulo == 'departamento_producto')) { ?>
                       
    <?php if ((trim($sf_request->getParameter('action')) == 'edit')) { ?>
                        <?php $id=$sf_request->getParameter('id'); ?>
                                <?php if ($modulo == 'tipo_aparato') { ?>
                                    <?php $query = TipoAparatoQuery::create()->findOneById($id); ?>
                                    <?php $imagen = '/uploads/tipos/' . $query->getImagen(); ?>
                                    <?php $logo = '/uploads/tipos/' . $query->getLogo(); ?>

                                <?php } ?>
                                <?php if ($modulo == 'marca') { ?>
                                    <?php $query = MarcaQuery::create()->findOneById($id); ?>
                                    <?php $imagen = '/uploads/marcas/' . $query->getImagen(); ?>
                                    <?php $logo = '/uploads/marcas/' . $query->getLogo(); ?>
                                <?php } ?>
                                <?php if ($modulo == 'modelo') { ?>
                                    <?php $query = ModeloQuery::create()->findOneById($id); ?>
                                    <?php $imagen = '/uploads/modelos/' . $query->getImagen(); ?>
                                    <?php $logo = '/uploads/modelos/' . $query->getLogo(); ?>

                                <?php } ?>
                         <?php if ($modulo == 'departamento_producto') { ?>
                                    <?php $query = DepartamentoProductoQuery::create()->findOneById($id); ?>
                                   <?php $label='Departamento'; ?>
                                    <?php $imagen = '/uploads/departamento/' . $query->getImagen(); ?>
                                    <?php $logo = '/uploads/departamento/' . $query->getLogo(); ?>

                                <?php } ?>
                        
                            <?php } ?>
                            <?php if ((trim($sf_request->getParameter('action')) == 'edit') or ( trim($sf_request->getParameter('action')) == 'new')) { ?>
           
           
                             <?php if ($modulo == 'departamento_producto') $label = 'Departamento' ?>
                                <div class="portlet box yellowLight ">
                                    <div class="portlet-body form">
                                        <div class="row">
                                            <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;  <i class=" icon-pin font-green"></i> <font color="#32c5d2" size="+2"> <?php echo $label ?> </font>   </div>
                                            <div class="col-md-1">
                                          <?php if ($logo) { ?>       <span class="caption-subject font-green bold uppercase">Logo </span>    <?php } ?> 
                                            </div>
                                            <div class="col-md-1">
                                                <?php if ($logo) { ?>
                                                    <img src="<?php echo $logo ?>" width="75px"/>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-1">
                                            <?php if ($imagen) { ?>    <span class="caption-subject font-grey-cascade bold uppercase">Imagen</span>  <?php } ?>  
                                            </div>
                                            <div class="col-md-1">
                                                <?php if ($imagen) { ?>
                                                    <img src="<?php echo $imagen ?>" width="75px"/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?> 

                        <?php } ?>
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <?php if ($modulo == 'empresa') { ?>
                            <?php if (trim($sf_request->getParameter('action')) == 'edit') { ?>
                                <?php $id = $sf_request->getParameter('id') ?>
                                <?php $Empresa = EmpresaQuery::create()->findOneById($id); ?>
                                <div class="portlet box yellowLight ">
                                    <div class="portlet-body form">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2">
                                                <span class="caption-subject font-green bold uppercase">Logo Actual</span>    
                                            </div>
                                            <div class="col-md-1">
                                                <img src="<?php echo '/uploads/empresas/' . $Empresa->getLogo() ?>" width="75px"/>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2">
                                                <span class="caption-subject font-grey-cascade bold uppercase">Icono Actual</span>    
                                            </div>
                                            <div class="col-md-1">
                                                <br><br>
                                                <img src="<?php echo '/uploads/empresas/' . $Empresa->getFavicon() ?>" width="15px"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        <?php } ?>    
                        <?php include_partial('soporte/avisos') ?>
                        <?php echo $sf_content ?>
                          <?php if ($modulo == 'empresa') { ?>
                            <?php if (trim($sf_request->getParameter('action')) == 'edit') { ?>
                                <?php $id = $sf_request->getParameter('id') ?>
                                <?php $Empresa = EmpresaQuery::create()->findOneById($id); ?>
                                <div class="portlet box yellowLight ">
                                    <div class="portlet-body form">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2">
                                                <h3>Logo Actual</h3>    
                                            </div>
                                            <div class="col-md-1">
                                                <img src="<?php echo '/uploads/empresas/' . $Empresa->getLogo() ?>" width="75px"/>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2">
                                                <h3>Icono Actual</h3>    
                                            </div>
                                            <div class="col-md-1">
                                         
                                                <img src="<?php echo '/uploads/empresas/' . $Empresa->getFavicon() ?>" width="15px"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        <?php } ?>
           <div class="modal fade" id="ajaxmodalbusca" tabindex="-1"  data-toggle="modal" data-target="#responsivemodal"
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 920px">
        <div class="modal-content" style=" width: 920px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
                <h4 class="modal-title" id="myModalLabel6">Buscador de Producto</h4>
            </div>
        </div>
    </div>
</div>

                                <div class="modal fade" id="ajaxmodaltienda" tabindex="-1"  data-toggle="modal" data-target="#responsivemodal"
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 920px">
        <div class="modal-content" style=" width: 920px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ti-close"></span></button>
                <h4 class="modal-title" id="myModalLabel6">Seleccionador Tienda</h4>
            </div>
        </div>
    </div>
</div>
                        
                        
  
                        
                        
                    </div>
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>
        
        
<!--                                           <div style="visibility: hidden; height: 10px"  >
           <input name="image" type="file" id="upload" class="hidden" onchange="">
           </div>-->
         
        <div class="page-prefooter">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12  bold Bold footer-block">
                        <h2><?php //echo $empresquery->getNombre() ?> </h2>
                       </div>
                    <div class="col-md-6 col-sm-6 col-xs12 footer-block">
<!--                        <h2></h2>
                        <p><?php //echo $empresquery->getMensajeCompraLinea() ?>  </p>-->
<!--                        <div class="subscribe-form">
                            <form action="javascript:;">
                                <div class="input-group">
                                    <input type="text" placeholder="mail@email.com" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn" type="submit">Submit</button>
                                    </span>
                                </div>
                            </form>
                        </div>-->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>Redes Sociales</h2>
                        <ul class="social-icons">
                            <li>
                                <a href="javascript:;" data-original-title="rss" class="rss"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="facebook" class="facebook"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="twitter" class="twitter"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="googleplus" class="googleplus"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="linkedin" class="linkedin"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="youtube" class="youtube"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="vimeo" class="vimeo"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
<!--                        <h2>Contacto</h2>
                        <address class="margin-bottom-40"> Telefono:  <?php //echo $empresquery->getTelefono() ?>
                            <br> Email:
                           </address>-->
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="page-footer">
            <div class="container"> <?php echo date("Y") ?> &copy; Aplicaciones Drone
            </div>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
        
     
            <?php $excepcion =0; ?>
          <?php if (($modulo <> 'banner') or ($modulo <> 'baner') ) { ?>
           <?php $excepcion =1; ?>
           <?php } ?>
        <?php if ($sf_request->getParameter('action') =='baner'){ ?>
            <?php $excepcion =0; ?>
      <?php  } ?>
      
          <?php if ($sf_request->getParameter('action') =='baners'){ ?>
            <?php $excepcion =0; ?>
      <?php  } ?>
        
          <?php if ($modulo == 'banner'){ ?>
            <?php $excepcion =0; ?>
      <?php  } ?>
        
        <?php if ($sf_request->getParameter('action') =='banner'){ ?>
            <?php $excepcion =0; ?>
      <?php  } ?>        
        <?php if ($sf_request->getParameter('action') =='banners'){ ?>
            <?php $excepcion =0; ?>
      <?php  } ?>        

        <?php if ($excepcion == 1) { ?>
         <script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <?php } ?>
        <script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>


        <script src="/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
       
        <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>        
        <script src="/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>

     
       <?php if ($excepcion == 1) { ?>
        <script src="/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
     
          <script src="/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <?php } ?>
        
        
        <script src="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
       <script src="/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
   
       <script src="/assets/plugins/dropify-master/dist/js/dropify.js" type="text/javascript"></script>

        <script src="/js/tinymce/tinymce.min.js" type="text/javascript"></script>
<!--        <script src="/assets/global/scripts/app.min.js" type="text/javascript"></script>-->
       
              <?php if ($excepcion == 1) { ?>
       
        <script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>

        <script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
      <?php } ?>
        
        
        <script src="/assets/global/scripts/app.min.js" type="text/javascript"></script>
        
         <?php if ($excepcion == 1) { ?>
       <script src="/assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
                 <?php } ?>     
       
        <script src="/assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="/assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
   <?php $oculta=0; ?>
         <?php if (($sf_request->getParameter('module') =='video') && ($sf_request->getParameter('action') =='edit')){ ?>
           <?php $oculta =1; ?> 
        <?php } ?>
                <?php if (($sf_request->getParameter('module') =='video') && ($sf_request->getParameter('action') =='new')){ ?>
           <?php $oculta =1; ?> 
        <?php } ?>
        <?php if ($oculta==0) { ?>
        
                  <?php if ($excepcion == 1) { ?>
             <?php if (($modulo <> 'pagina_online')) { ?>
        
                <script src="/js/kenScript.js" type="text/javascript"></script>
        
  <?php } ?> 

             <?php } ?> 
        <?php } ?> 
        
                       <script src="/assets/pages/scripts/components-color-pickers.min.js" type="text/javascript"></script>
                 
    
                
                        <?php if ($modulo=='modelo') { ?>
      <?php if ((trim($sf_request->getParameter('action')) == 'edit') or (trim($sf_request->getParameter('action')) == 'new')) { ?>
<script src='/assets/global/plugins/jquery.min.js'></script> 
<script>

    $(document).ready(function () {
        $("#modelo_aparato").on('change', function () {
            //      alert('cambio');
            $('#consulta_nombrebuscar').val('');
            $("#modelo_marca_id").empty();
            $.getJSON('<?php echo url_for("soporte/tipoMarca") ?>?id=' + $("#modelo_aparato").val(), function (data) {
                console.log(JSON.stringify(data));
                $.each(data, function (k, v) {
                    $("#modelo_marca_id").append("<option value=\"" + k + "\">" + v + "</option>");
                }).removeAttr("disabled");
            });
        });
            });
        </script>
        
               <?php } ?>
        <?php } ?>
        
        <script>

    $(document).ready(function () {
        $("#consulta_tipo").on('change', function () {
            //      alert('cambio');
            $('#consulta_nombrebuscar').val('');
            $("#consulta_marca").empty();
            $.getJSON('<?php echo url_for("soporte/tipoMarca") ?>?id=' + $("#consulta_tipo").val(), function (data) {
                console.log(JSON.stringify(data));
                $.each(data, function (k, v) {
                    $("#consulta_marca").append("<option value=\"" + k + "\">" + v + "</option>");
                }).removeAttr("disabled");
            });
        });
        
         $("#consulta_marca").on('change', function () {
            //      alert('cambio');
            $('#consulta_modelo').val('');
            $("#consulta_modelo").empty();
            $.getJSON('<?php echo url_for("soporte/marcaModelo") ?>?id=' + $("#consulta_marca").val(), function (data) {
                console.log(JSON.stringify(data));
                $.each(data, function (k, v) {
                    $("#consulta_modelo").append("<option value=\"" + k + "\">" + v + "</option>");
                }).removeAttr("disabled");
            });
        });
        
    });



</script>


<script>
    $(document).ready(function () {
        $("#cargo_envio_departamento_id").on('change', function () {
            $("#cargo_envio_municipio_id").empty();
            $.getJSON('<?php echo url_for("soporte/dptoMunicipio") ?>?id=' + $("#cargo_envio_departamento_id").val(), function (data) {
                console.log(JSON.stringify(data));
                $.each(data, function (k, v) {
                    $("#cargo_envio_municipio_id").append("<option value=\"" + k + "\">" + v + "</option>");
                }).removeAttr("disabled");
            });
        });
    });
</script>

    </body>

</html>