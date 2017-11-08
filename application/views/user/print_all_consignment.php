<?php error_reporting(0); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cargo | Courier</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets//bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-bottom: 1px solid #ddd !important;
        }
        .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
            border-top: 0px;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {

            border-top: 0px;
        }
    </style>
</head>
<body   onload="//window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header text-center">
                    <i class="fa fa-globe pull-left" style="margin-right: 2%;"></i> <strong>MUJAWAR TRANSPORT</strong>
                    <small class="pull-right">Date: <?php

                        date_default_timezone_set('Asia/Kolkata');

                        echo date("d-m-Y"); ?></small>
                    <small class="text-center">
                        20,FORT ROAD,BELGAUM.PHONE: 2452844, 4212233<br/>
                        H.O. NEHARU NAGAR, P. B. ROAD, BELGAUM PHONE:2472786,2470943<BR/>
                        Manzil Saifya, Carmac Bridge Crawford MArket,Mumbai ,ph: 23420, 23443389
                    </small>
                </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info" style="margin-bottom: 2%;">
            <div class="col-sm-3 invoice-col">
                From :    <strong><?php $from = explode("-",$from);
                    echo $from[2].'-'.$from[1].'-'.$from[0];

                ?></strong><br>

            </div><!-- /.col -->
            <div class="col-sm-3 invoice-col">
                To : <strong><?php $to = explode("-",$to);
                echo $to[2].'-'.$to[1].'-'.$to[0]; ?></strong><br>

            </div><!-- /.col -->
            <div class="col-sm-3 invoice-col">
                <b>Truck No :</b>    <br>

            </div><!-- /.col -->
            <div class="col-sm-3 invoice-col">
                <b>Driver Name :</b>

            </div><!-- /.col -->

        </div><!-- /.row -->

        <div class="row">

            <div class="col-xs-12">

                <!-- <p class="lead">Amount Due 2/22/2014</p>-->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>LR.No</th>
                            <th>Consigner</th>
                            <th>Consignee</th>
                            <th>Destination</th>
                            <th>Quantity</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php $i=1; foreach($query as $row) { ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$row->receipt_no?></td>
                            <td><?=$row->shipper_name?></td>
                            <td><?=$row->receiver_name?></td>
                            <td><?=$row->location_dest?></td>
                            <td><?=$row->quantity?></td>
                            <td><?=$row->status?></td>
                        </tr>
                        <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- ./wrapper -->

<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>

</body>
</html>
