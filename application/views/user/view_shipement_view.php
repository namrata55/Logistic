<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" xmlns="http://www.w3.org/1999/html"/>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><i class="fa " style="margin-right: 1%;"></i>
        OUTGOING CONSIGNMENT
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Outgoing Consignment</li>
    </ol>
</section>

<!-- Main content -->
<section class="content"  ng-app="myApp" ng-controller="shipment" id="shipment">

<div class="box" >
    <div class="box-header">

    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>LR No</th>
                <th>Date</th>
                <th>Consigner</th>
                <th>Consignee</th>
                <th>Destination</th>
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
                <td><?=$row->location_dest?></td>
                <td><?=$row->status?></td>
                <td><button class="btn btn-warning" data-toggle="modal" data-target="#edit-modal1" ng-click="view_shipment(<?php echo "'$row->booking_date'".","."'$row->status'".","."'$row->receipt_no'".","."'$row->shipper_name'".","."'$row->shipper_contact'".","."'$row->receiver_name'".","."'$row->address'".","."'$row->receiver_contact'".","."'$row->quantity'".","."'$row->shipping_date'".","."'$row->price'".","."'$row->h_charges'".","."'$row->total_amount'".","."'$row->location_org'".","."'$row->location_dest'";?>);"><i class="fa fa-eye"></i> View</button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal" ng-model="edit" onclick="edit_shipment(<?php echo "'$row->booking_date'".","."'$row->id'".","."'$row->status_id'".","."'$row->destination'".","."'$row->origin'".","."'$row->receipt_no'".","."'$row->shipper_name'".","."'$row->shipper_contact'".","."'$row->receiver_name'".","."'$row->address'".","."'$row->receiver_contact'".","."'$row->quantity'".","."'$row->shipping_date'".","."'$row->price'".","."'$row->h_charges'".","."'$row->total_amount'".","."'$row->location_org'".","."'$row->location_dest'";?>);"><i class="fa fa-edit""></i> Edit</button>
                    <button class="btn btn-danger" data-toggle="modal" onclick="delete_shipment(<?=$row->id?>)"><i class="fa fa-edit"></i> Delete</button>
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
                <th>Destination</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

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


<!-- pop up for the insert bank details-->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                <h4 class="modal-title"><i class="fa fa-arrow-right"></i> Edit Shipment</h4>
            </div>


            <form name="form1" method="post" action="<?=site_url('user/add_shipment/insert_shipment')?>"  onsubmit="return validate();">

                <input type="hidden" name="action_type" id="action_type" value="1" />
                <input type="hidden" name="shipment_id" id="shipment_id" value="0">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="alert alert-danger alert-dismissable" style="display:none; background-color: white;" id="alert_dng">

                        </div>

                        <!--onsubmit="return insert_validate();"-->
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group" ng-class="{ 'has-error' : userForm.r_no.$invalid && !userForm.r_no.$pristine }">
                                    <label>LR No</label>
                                    <input type="text" name="r_no" id="r_no" class="form-control" placeholder="Loading Receipt Number" value="" ng-model="lr_no" readonly>
                                </div>

                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Booking Date</label>

                                    <input type="text" id="b_date" name="b_date"  class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" readonly>

                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Origin</label>
                                    <select name="origin" id="origin" class="form-control" style="width: 100%;" readonly>
                                        <?php foreach ($origin_p as $row) { ?>
                                        <option value="<?=$row->locid?>"><?=$row->city?>(<?=$row->area?>)</option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>

                        </div>

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Consigner</label>
                                        <input type="text" name="s_name" id="s_name" class="form-control" placeholder="Enter Shiper Name" ng-model="name">
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Contact No</label>
                                        <input type="number" name="s_contact" id="s_contact" class="form-control" placeholder="Enter Shipper Contact No">
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Quantity/Boxes</label>

                                        <input type="number" name="qty" id="qty" class="form-control" placeholder="Quantity/Boxes">

                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Consignee</label>
                                        <input type="text" name="r_name" id="r_name" class="form-control" placeholder="Enter Receiver Name">
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Contact No</label>
                                        <input type="number" name="r_cont" id="r_cont" class="form-control" placeholder="Enter Receiver Contact No">
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="r_add" id="r_add" rows="3" placeholder="Receiver Address"></textarea>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group" id="sandbox-container">
                                        <label>Consignment Date</label>
                                        <input type="text" id="r_date" name="r_date"  class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">

                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Material/Item</label>

                                        <select name="mat" id="mat" class="form-control select2" style="width: 100%;" readonly>
                                            <?php foreach ($materials as $row) { ?>
                                            <option value="<?=$row->material?>"><?=$row->material?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>


                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Destination</label>

                                        <select name="dest" id="dest" class="form-control" style="width: 100%;">
                                            <option value="0">Select Place</option>
                                            <?php foreach ($loc as $row) { ?>
                                            <option value="<?=$row->locid?>"><?=$row->city?>(<?=$row->area?>)</option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>


                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Freight Charges</label>
                                        <input type="number" name="price" id="price" class="form-control" placeholder="Enter Amount" ng-model="price" onkeyup="add_total()" >
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Handling Charges</label>
                                        <input type="number" name="h_charges" id="h_charges" class="form-control" placeholder="Enter Amount" ng-model="h_charges" onkeyup="add_total()">
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input type="number" name="total" id="total" class="form-control" placeholder="" value="" readonly="true">
                                    </div>
                                </div>
                            </div><!--row-->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-right">

                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" style="margin-right: 1%;"><i class="fa fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Save</button>

                    </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php $this->load->view('user/page_adders/right_sidebar'); ?>

<link id="bsdp-css" href="<?php echo base_url();?>assets/date/dist/css/bootstrap-datepicker3.css" rel="stylesheet">

<script src="<?php echo base_url();?>assets/js/moment.js"></script>
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>

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
<script src="<?php echo base_url();?>assets/js/moment.js"></script>
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>


<script>
    var app = angular.module('myApp', ['ui.bootstrap']);

    app.controller('shipment', function($scope, $http) {

        $scope.view_shipment = function (b_date,ship_st,r_no,s_namea,s_cona,r_name,r_add,r_con,qty,s_date,price,h_charges,total,loc_or,loc_dest) {


            $scope.ship_status =ship_st;
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


        $scope.get_driver = function (data) {

            params = {
                param1: data
            };

            var config = {
                params: params
            };

            $http({
                method: 'POST',
                url: '<?php echo site_url("user/add_shipment/get_driver"); ?>',
                headers: {'Content-Type': 'application/json'},
                data: JSON.stringify({name: params})
                }).success(function (data) {
                            $scope.driver = data;

            });


        };

    });

    /*Edit shipment*/

    function edit_shipment(b_date,ship_id,s_id,destini,origin,r_no,s_namea,s_cona,r_name,r_add,r_con,qty,s_date,price,h_charges,total,loc_or,loc_dest)
    {

        $('#shipment_id').val(ship_id);
        $('#action_type').val('1');

        $('#r_no').val(r_no);
        $('#s_name').val(s_namea);
        $('#s_contact').val(s_cona);
        $('#qty').val(qty);
        $('#r_name').val(r_name);
        $('#r_cont').val(r_con);
        $('#r_add').val(r_add);

        var s_date_f = s_date.split("-");
        var s_date = s_date_f[2]+"/"+s_date_f[1]+"/"+s_date_f[0];
        $('#r_date').val(s_date);

        var b_date_f = b_date.split("-");
        var ba_date = b_date_f[2]+"/"+b_date_f[1]+"/"+b_date_f[0];
        $('#b_date').val(ba_date);


        $('#origin').val(origin);
        $('#dest').val(destini);

        $('#price').val(price);
        $('#h_charges').val(h_charges);
        $('#total').val(total);
        $('#status').val(s_id);
    }


    /*validate shipment*/
    function validate()
    {
        if($('#r_no').val() == "")
        {
            $('#r_no').focus();
            $("#alert_dng").html("Please Enter Receipt  No");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
        if($('#s_name').val() == "")
        {
            $('#s_name').focus();
            $("#alert_dng").html("Please Enter Shiper Name");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
        if($('#s_contact').val() == "")
        {
            $('#s_contact').focus();
            $("#alert_dng").html("Please Enter Shiper Contact No");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
        if($('#qty').val() == "")
        {
            $('#s_contact').focus();
            $("#alert_dng").html("Please Specify Quantity");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
        if($('#r_name').val() == "")
        {
            $('#r_name').focus();
            $("#alert_dng").html("Please Enter Receiver Name");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
        if($('#r_cont').val() == "")
        {
            $('#r_cont').focus();
            $("#alert_dng").html("Please Enter Receiver Contact No");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
        if($('#r_add').val() == "")
        {
            $('#r_add').focus();
            $("#alert_dng").html("Please Enter Receiver Address");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
        if($('#r_date').val() == "")
        {
            $('#r_date').focus();
            $("#alert_dng").html("Please Give valide date");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
        if($('#origin').val() == "0")
        {
            $('#origin').focus();
            $("#alert_dng").html("Please Origin ");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
        if($('#dest').val() == "0")
        {
            $('#dest').focus();
            $("#alert_dng").html("Please Destination");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
        if($('#status').val() == "0")
        {
            $('#status').focus();
            $("#alert_dng").html("Please Select Shipment Status");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
        if($('#price').val() == "0")
        {
            $('#price').focus();
            $("#alert_dng").html("Please Enter Price");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }
    }

    function add_total()
    {
       $price = parseFloat($('#price').val());
       $h_charges = parseFloat($('#h_charges').val());

       if($('#h_charges').val() == "")
       {

           $('#total').val($price);
       }
        else
       {
           $('#total').val($price+$h_charges);
       }
    }


    function delete_shipment(ship_id)
    {

        var r = confirm("Are Sure You Want to Delete Shipment!");
        if (r == true) {
            var postData = {
                'ship_id': ship_id,
                'html' : 'PASS'
            };

            $.post("<?=site_url('user/add_shipment/delte_shipment')?>",postData, function(data){
                location.reload();
            });txt = "You pressed OK!";

        }

    }
</script>

<!-- page script -->
<script type="text/javascript">
    $(function () {


        $(".select2").select2();

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

        $("#r_date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $('#r_date').datepicker('update', new Date());
    });

</script>


</body>
</html>

