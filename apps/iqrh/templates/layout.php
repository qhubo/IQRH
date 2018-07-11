<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>IQ SOFT</title>
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
        <link rel="shortcut icon" href="/images/favicon.png" /> 
        <link href="/css/kunesStyle.css" rel="stylesheet" type="text/css"/>
    </head>
        <?php $modulo = $sf_params->get('module'); ?>
    <!-- END HEAD -->
    <?php $empresaId = sfContext::getInstance()->getUser()->getAttribute("usuario", null, 'empresa'); ?>

    <?php $proveedorId = sfContext::getInstance()->getUser()->getAttribute("proveedor_id", null, 'seguridad'); ?>


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
                                <?php if ($Parametro) { ?>
                                    <img src="<?php echo '/uploads/segmento/' . $Parametro->getLogo() ?>" height="48px" >
                                    <img src="<?php // echo  '/uploads/empresas/'. $empresquery->getLogo()  ?>"  height="48px" />
                                <?php } ?>
                                   <img src="/images/logo.png"  height="48px" />

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


                            <?php //include_partial('inicio/notificacion') ?>     
                            <!-- END TODO DROPDOWN -->
                            <li class="droddown dropdown-separator">
                                <span class="separator"></span>
                            </li>

                            <?php include_partial('inicio/logueo') ?> 
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>

            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">

                <?php include_partial('inicio/menu') ?> 
                <?php //include_partial('inicio/menus') ?> 
                <div class="row">
                    <div class="col-md-1"> </div>  

                    <div class="col-md-8">

                        <span class="caption-subject bold font-green uppercase">
                            &nbsp;&nbsp;&nbsp; <i class="fa fa-gift font font-yellow-saffron"></i> 
                            <?Php $super=  sfContext::getInstance()->getUser()->getAttribute('supervisa', null, 'seguridad'); ?>
                            <?PHP if ($super >0) { ?>
                            SUPERVISOR
                            <?php } ?>

                            
                            
                        </span> 
                        <span class="caption-subject bold font-blue  uppercase">
                            &nbsp;&nbsp;  Gestión de Personal de Nomina
                        </span>
                        <!-- END HEADER MENU -->
                    </div>
                </div>
            </div>
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
                        <?php $label = ''; ?>
                        <?php $logo = ''; ?>
                        <?php $imagen = ''; ?>

                        <?php include_partial('soporte/avisos') ?>
                        <?php echo $sf_content ?>






                    </div>
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>
        <?php include_partial('inicio/footer') ?>



        <?php $excepcion = 0; ?>
        <?php if (($modulo <> 'banner') or ( $modulo <> 'baner')) { ?>
            <?php $excepcion = 1; ?>
        <?php } ?>
        <?php if ($sf_request->getParameter('action') == 'baner') { ?>
            <?php $excepcion = 0; ?>
        <?php } ?>

        <?php if ($sf_request->getParameter('action') == 'baners') { ?>
            <?php $excepcion = 0; ?>
        <?php } ?>

        <?php if ($modulo == 'banner') { ?>
            <?php $excepcion = 0; ?>
        <?php } ?>

        <?php if ($sf_request->getParameter('action') == 'banner') { ?>
            <?php $excepcion = 0; ?>
        <?php } ?>        
        <?php if ($sf_request->getParameter('action') == 'banners') { ?>
            <?php $excepcion = 0; ?>
        <?php } ?>        

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
        <?php $oculta = 0; ?>
        <?php if (($sf_request->getParameter('module') == 'video') && ($sf_request->getParameter('action') == 'edit')) { ?>
            <?php $oculta = 1; ?> 
        <?php } ?>
        <?php if (($sf_request->getParameter('module') == 'video') && ($sf_request->getParameter('action') == 'new')) { ?>
            <?php $oculta = 1; ?> 
        <?php } ?>
        <?php if ($oculta == 0) { ?>
            <?php if ($excepcion == 1) { ?>
                <?php if (($modulo <> 'pagina_online')) { ?>
                    <script src="/js/kenScript.js" type="text/javascript"></script>
                <?php } ?> 
            <?php } ?> 
        <?php } ?> 
        <script src="/assets/pages/scripts/components-color-pickers.min.js" type="text/javascript"></script>
    </body>
</html>