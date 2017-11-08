<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" xmlns="http://www.w3.org/1999/html"/>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><i class="fa " style="margin-right: 1%;"></i>
        INCOMING CONSIGNMENT
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Consignment</li>
    </ol>
</section>

<!-- Main content -->
<section class="content"  ng-app="myApp" ng-controller="shipment" id="shipment">

<div class="box" >
    <div class="box-header">

    </div><!-- /.box-header -->
    <div class="box-body" >

        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>LR No</th>
                <th>Date</th>
                <th>Consigner</th>
                <th>Consignee</th>
                <th>Origin</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($query as $row) {?>
            <tr>
                <td><?=$i?></td>
                <td><?=$row->receipt_no?></td>
                <td><?php $date_f = explode("-",$row->booking_date);

                        echo $date_f[2]."-".$date_f[1]."-".$date_f[0];

                    ?></td>
                <td><?=$row->shipper_name?></td>
                <td><?=$row->receiver_name?></td>
                <td><?=$row->location_org?></td>
                <td><?=$row->status?></td>
                <td>
                    <button class="btn btn-block btn-warning" data-toggle="modal" data-target="#edit-modal1" ng-click="view_shipment(<?php echo "'$row->status'".","."'$row->receipt_no'".","."'$row->shipper_name'".","."'$row->shipper_contact'".","."'$row->receiver_name'".","."'$row->address'".","."'$row->receiver_contact'".","."'$row->quantity'".","."'$row->shipping_date'".","."'$row->price'".","."'$row->h_charges'".","."'$row->total_amount'".","."'$row->location_org'".","."'$row->location_dest'";?>);"><i class="fa fa-eye"></i> View</button>
                 <button class="btn btn-block btn-info" data-toggle="modal" data-target="#edit-modal" ng-click="update_status(<?php echo "'$row->receipt_no'".","."'$row->id'".","."'$row->status_id'"; ?>);"><i class="fa fa-refresh"></i> Update Status</button>
                 </td>
            </tr>
            <?php $i++; } ?>

            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>LR No</th>
                <th>Date</th>
                <th>Consigner</th>
                <th>Consignee</th>
                <th>Origin</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

    <!--update Status-->
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="width: 50%;">
            <div class="modal-content">
                <div class="modal-header" >
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-arrow-right"></i> Update Status</h4>
                </div>
                <div class="modal-body">
                <form action="<?=site_url('user/list_shipment/update_status')?>" method="POST" />

                   <input type="hidden" name="ship_id" id="ship_id" value="0">

                    <input type="hidden" name="user_id" id="user_id" value="<?php print_r($user_id); ?>">

                   <div class="row" style="margin-bottom: 2%;">
                        <div class="col-xs-12">
                            <strong>LR No:</strong> {{sc_r_no}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group" id="sandbox-container">
                                <label>Date</label>

                                <input type="text" id="sc_date" name="sc_date"  class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">

                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Time</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control timepicker" name="sc_time">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div><!-- /.input group -->
                                </div><!-- /.form group -->
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status_id" id="status" class="form-control" style="width: 100%;">
                                    <option value="0">Select Status</option>
                                    <?php foreach ($status as $row) { ?>
                                    <option value="<?=$row->id?>"><?php echo ($row->status); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="row ">
                            <div class="col-xs-12" id="show_status">

                            </div>


                            <div class="col-xs-12">

                            </div>
                        </div><!-- /.box-body -->


                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Update</button>
                </div>
                </form>
             </div>
        </div>
    </div>

<!--view Content-->
<div class="modal fade" id="edit-modal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 50%;">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                <h4 class="modal-title"><i class="fa fa-arrow-right"></i> View</h4>
            </div>
            <div class="modal-body">

                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header text-center">
                            <i class="fa fa-globe pull-left" style="margin-right: 2%;"></i> <strong>MUJAWAR TRANSPORT</strong>
                            <small class="pull-right">Date: {{s_date}}</small>
                            <small class="text-center" style="display: none;">
                                20,FORT ROAD,BELGAUM.PHONE: 2452844, 4212233<br/>
                                H.O. NEHARU NAGAR, P. B. ROAD, BELGAUM PHONE:2472786,2470943<BR/>
                                Manzil Saifya, Carmac Bridge Crawford MArket,</br>
                                Mumbai ,ph: 23420, 23443389
                            </small>
                        </h2>
                    </div><!-- /.col -->
                    <div class="col-xs-12">

                    </div><!-- /.col -->
                </div>


                <div class="row invoice-info" style="margin-bottom: 2%;">
                    <div class="col-sm-4 invoice-col">
                        <Lable>LR No : </Lable> <strong>{{r_no}}</strong>
                    </div>
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>{{s_name}}</strong><br>
                            Phone: {{s_con}}<br>

                        </address>
                    </div><!-- /.col -->
                    <div class="col-sm-4 invoice-col pull-right">
                        To
                        <address>
                            <strong>{{r_name}}</strong><br>
                            {{r_add}} <br/>
                            Phone: {{r_con}}<br>
                        </address>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <!-- info row -->
                <div class="row invoice-info" style="margin-bottom: 3%;">
                    <div class="col-sm-4 invoice-col">
                        <strong> Quantity :</strong> {{qty}}
                    </div><!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <strong> Origin : </strong> {{loc_or}}
                    </div><!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <strong> Destination : </strong>{{loc_dest}}<br>
                    </div><!-- /.col -->

                </div><!-- /.row -->

                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-6 invoice-col" style="margin-bottom: 5%;" >
                        <strong> Status : </strong> {{ship_status}}
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-xs-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Freight Charges:</th>
                                    <td>{{price}}</td>
                                </tr>
                                <tr>
                                    <th>Handlink Charges:</th>
                                    <td>{{h_charges}}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>{{total}}</td>
                                </tr>
                            </table>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-6 text-center" style="margin-top: 15%;">
                        <strong>For MUJAWAR TRANSPORT</strong>
                    </div>
                </div><!-- /.row -->


            </div>

            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php $this->load->view('user/page_adders/right_sidebar'); ?>

<link id="bsdp-css" href="<?php echo base_url();?>assets/date/dist/css/bootstrap-datepicker3.css" rel="stylesheet">

<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>


<script src="<?php echo base_url();?>assets/js/moment.js"></script>
<script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>

<!-- InputMask -->
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>



<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url();?>/assets/js/angular.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/ui-bootstrap-tpls-0.9.0.js"></script>



<script>
    var app = angular.module('myApp', ['ui.bootstrap']);

    app.controller('shipment', function($scope, $http) {



        $scope.view_shipment = function (ship_st,r_no,s_namea,s_cona,r_name,r_add,r_con,qty,s_date,price,h_charges,total,loc_or,loc_dest) {

            $scope.ship_status = ship_st;
            $scope.r_no = r_no;
            $scope.s_name = s_namea;
            $scope.s_con = s_cona;
            $scope.r_name = r_name;
            $scope.r_add = r_add;
            $scope.r_con = r_con;
            $scope.qty = qty;

            var s_date_f = s_date.split("-");
            $scope.s_date = s_date_f[2]+"/"+s_date_f[1]+"/"+s_date_f[0];
            $scope.price = price;
            $scope.h_charges = h_charges;
            $scope.total = total;

            $scope.loc_or = loc_or;
            $scope.loc_dest = loc_dest;


        };


        $scope.update_status = function (r_no,sh_id,status_id){

            $scope.sc_r_no = r_no;
            $('#ship_id').val(sh_id);
            $('#status').val(status_id);

            params = {
                param1: sh_id
            };

            var config = {
                params: params
            };

            $http({
                method: 'POST',
                url: '<?php echo site_url("user/list_shipment/get_shipment_status"); ?>',
                headers: {'Content-Type': 'application/json'},
                data: JSON.stringify({ship_id: params})
            }).success(function (data) {

                       /* $scope.show_status = $scope.trustAsHtml(data);*/
                        $('#show_status').html(data);

                    });
        };

    });

</script>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable({
            "iDisplayLength": 50,
            "aLengthMenu": [[50, 100, 200, 250,300,500], [50, 100, 200, 250,300,500]]

        });
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });


        $(".paginate_button").click(function(){

            change_dropdown();

        });
        $("#example1_paginate").click(function(){

            change_dropdown();

        });

        $("#example1_length").change(function(){
            change_dropdown();
        });

        function change_dropdown()
        {
            $('input[type="checkbox"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

        }
    });
</script>


<script src="<?php echo base_url();?>assets/date/dist/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/date/dist/js/bootstrap-datepicker.min.js"></script>


<script>
    $(function(){
        $('#sandbox-container input').datepicker({
            todayBtn: "linked",
            orientation: "bottom auto",
            autoclose: true,
            format: "dd/mm/yyyy"
        });


        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});

        $("#sc_date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $('#sc_date').datepicker('update', new Date());


    });

</script>


</body>
</html>

