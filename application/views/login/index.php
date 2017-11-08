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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#" STYLE="COLOR: white;"><b><img src="<?=base_url()?>/assets/img/pronto_logo.png" style="width: 52%;"/></b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body" style="box-shadow: 0px 0px 15px #545454; margin-top: 15%;">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?=site_url('login/validate')?>" method="POST" id="form1">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Email" name="username">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>
        </form>
        <div style="text-align: center; margin-top: 2%;">
            <a href="#">I forgot my password</a><br>
        </div>


    </div><!-- /.login-box-body -->

</div><!-- /.login-box -->
<div class="login_fotter text-center">
    <div class="copy-left">
        Powered by <strong><a href="http://credenceis.com">CREDENCEIS</a></strong>
    </div>
    <div class="copy-right">
        For <b>PRONTO</b> support please call: 09741358211
    </div>
</div>
<style>
    .login_fotter{
        background-color: #34586C;
        width: 100%;
        padding: 1%;
        color: white;
        font-size: 14px;
        bottom: 0%;
        /* margin-top: 15%; */
        min-height: 5%;
        position: absolute;
        letter-spacing: 0.6px;
    }
    .login_fotter .copy-right {
        float: right;
        margin-right: 2%;
    }
    .login_fotter .copy-left {
        float: left;
        margin-left: 2%;
    }
    .copy-right p {
        color: white;
    }

    .login_fotter .copy-left a {
        color: #A2A5A7;
    }
    .copy-left a:hover {
        color: #ffffff;
    }

</style>

<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
