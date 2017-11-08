<!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>PRONTO</title>

            <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/img/favicon.ico"/>
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Bootstrap 3.3.5 -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">

            <!--Angularjs -->
           <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.1/angular.min.js"></script>-->
            <div class="loader">
                <div class="img"></div>
            </div>

            <style>
                .loader {
                    position: fixed;
                    left: 0px;
                    top: 0px;
                    width: 100%;
                    height: 100%;
                    z-index: 9999;
                    /* background: url('<?=base_url()?>assets/img/page-loader.gif') 50% 50% no-repeat rgb(249,249,250);*/
                    background-color: rgba(255, 255, 255,0.60);
                    text-align: center;
                }
                .img{
                    background: url('<?=base_url()?>assets/img/page-loader.gif') 50% 50% no-repeat;
                    width: 100%;
                    height: 100%;
                }
            </style>

            <script src="<?=base_url()?>assets/js/jquery.min.js"></script>

            <script type="text/javascript">
                $(window).load(function() {
                    $(".loader").fadeOut("slow");
                });
            </script>

            <!-- Font Awesome Icons -->
           <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->

            <!-- Ionicons -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">

            <!-- Ionicons -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ionicons.min.css">
            <!-- Ionicons -->
           <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
            <!-- Theme style -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">

            <!-- AdminLTE Skins. Choose a skin from the css/skins
                 folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">

            <link href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
            <!-- iCheck -->
            <link href="<?php echo base_url();?>assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />


            <!-- Morris chart -->
            <link href="<?php echo base_url();?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />

            <!-- jvectormap -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
            <!-- Date Picker -->
            <link href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
            <!-- Daterange picker -->
            <link href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
            <!-- bootstrap wysihtml5 - text editor -->
            <link href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

            <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
            <!-- iCheck for checkboxes and radio inputs -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/all.css">

            <!-- daterange picker -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
            <!-- iCheck -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/flat/blue.css">
            <!-- Select2 -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/select2.min.css">
            <!-- Bootstrap time Picker -->
            <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="<?php echo base_url();?>assets/ajax/html5shiv.min.js"></script>
            <script src="<?php echo base_url();?>assets/ajax/respond.min.js"></script>



            <![endif]-->
        </head>
        <body class="hold-transition skin-black sidebar-mini" ng-app="myApp" >
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="../../index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">PRONTO</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b><img src="<?=base_url()?>/assets/img/pronto_logo.png" style="width: 55%;"/></b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">

                        <ul class="nav navbar-nav">

                            <!-- User Account: style can be found in dropdown.less -->

                            <!-- Control Sidebar Toggle Button -->
                             <li class="user user-menu" style=" padding-right: 12px; padding-top: 5%;">
                                 <div class='time-frame hidden-xs' style="float: left; font-weight: 500; ">
                                     <span id='date-part' style="float: left;"></span>
                                     <span id='time-part'></span>
                                 </div>
                             </li>
                            <li>
                                <a href="<?php echo site_url('login/logout'); ?>" ><i class="fa fa-power-off"></i></a>
                            </li>

                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <script>
                $(function() {
                    var interval = setInterval(function() {
                        var momentNow = moment();
                        $('#date-part').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' '+ momentNow.format('DD MMM YYYY  ')
                                );
                        $('#time-part').html("&nbsp" + momentNow.format('hh:mm:ss A'));
                    }, 100);

                });
            </script>
      