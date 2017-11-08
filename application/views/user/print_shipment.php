<?php error_reporting(0); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRONTO</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets//bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
    <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ionicons.min.css">
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
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
              <h2 class="page-header text-center">
                  <i class="fa fa-globe pull-left" style="margin-right: 2%;"></i> <strong>MUJAWAR TRANSPORT</strong>
                  <small class="pull-right">Date: <?php $dt = explode("-",$query[0]->booking_date); echo $dt[2]."/".$dt[1]."/".$dt[0]; ?></small>
                  <small class="text-center">
                      20,FORT ROAD,BELGAUM.PHONE: 2452844, 4212233<br/>
                      H.O. NEHARU NAGAR, P. B. ROAD, BELGAUM PHONE:2472786,2470943<BR/>
                      Manzil Saifya, Carmac Bridge Crawford MArket,Mumbai ,ph: 23420, 23443389
                  </small>
              </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong><?=$query[0]->shipper_name?></strong><br>
                Ph: <?=$query[0]->shipper_contact?>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
              <strong><?=$query[0]->receiver_name?></strong><br>
                Ph: <?=$query[0]->receiver_contact?><br>
                Address : <?=$query[0]->address?>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col pull-right">
            <b>LR No # <?php $lr = $query[0]->receipt_no;

                if($lr < 10)
                {
                    echo "000".$lr;
                }
                else if($lr >10 && $lr <100)
                {
                    echo "00".$lr;
                }
                else if($lr >100 && $lr <1000)
                {
                    echo "0".$lr;
                }
                else {
                    echo $lr;
                }
                ?></b><br>
              <b>Qty : <?=$query[0]->quantity?> </b> </br>
              <b>Destination  : <?=$query[0]->dest?> </b>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">

          <div class="col-xs-6">
              <p></p>
           <!-- <p class="lead">Amount Due 2/22/2014</p>-->
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Freight Charges :</th>
                  <td>Rs. <?=$query[0]->price?></td>
                </tr>
                <tr>
                  <th>Handling Charges :</th>
                  <td>Rs. <?=$query[0]->h_charges?></td>
                </tr>
                <tr>
                   <th>Total :</th>
                    <td>Rs. <?=$query[0]->total_amount?></td>
                </tr>
              </table>
            </div>
          </div><!-- /.col -->
          <div class="col-xs-6 text-center" style="margin-top: 15%;">
               <strong>For MUJAWAR TRANSPORT</strong>
            </div>
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>

  </body>
</html>
