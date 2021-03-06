<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" xmlns="http://www.w3.org/1999/html"/>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><i class="fa " style="margin-right: 1%;"></i>
        CONSIGNMENT STATUS
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Consignment Status</li>
    </ol>

</section>


<!-- Main content -->
<!-- Main content -->
<section class="content"  ng-app="myApp" ng-controller="shipment" id="shipment">

    <div class="row">
        <div class="col-md-6 pull-right">
            <div class="box"><div class="box-body ">
                <form action="<?=site_url('user/out_shipment_status_cntl/get_by_date');?>" method="post" onsubmit="return validate_booking()">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group" id="res">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="date_f" id="reservation" PLACEHOLDER="Booking Date" onchange="print_add()">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button class="btn  btn-info " type="submit" style="float: left; margin-right: 2%;"><i class="fa fa-search"></i> Search</button>
                                </form>
                            <form action="<?=site_url('user/out_shipment_status_cntl/print_all_consignment')?>" method="post" onsubmit="return print_validate()" target="_blank">
                                <input type="hidden" name="date_t" id="date_t" value="0">
                                <button class="btn btn-warning" type="submit" ><i class="fa fa-print"></i> Print</button>
                            </form>
                        </div>
                    </div>

            </div></div>
        </div>

        <div class="col-md-6">
            <div class="box">
                <div class="box-body ">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="mailbox-controls" style="padding: 0;">
                                    <!-- Check all button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm checkbox-toggle" onclick="test()" ><i class="fa fa-square-o" ></i></button>
                                    </div><!-- /.btn-group -->
                                </div>
                            </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-info"  data-toggle="modal" data-target="#edit-modal">Load Consignment</button>
                        </div>
                    </div>
                    </div>
            </div>
        </div>

    </div>


    <div class="box" >
        <div class="box-header">

        </div><!-- /.box-header -->
        <div class="box-body mailbox-messages" >
            <form name="form1" action="<?=site_url('user/out_shipment_status_cntl/load_truck')?>" method="POST">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th><div class="btn-group">
                        <!--<button class="btn btn-default btn-sm checkbox-toggle" onclick="test()" ><i class="fa fa-square-o" ></i></button>-->
                    </div><!-- /.btn-group --></th>
                    <th>#</th>
                    <th>LR No</th>
                    <th>Date</th>
                    <th>Consigner</th>
                    <th>Consignee</th>
                    <th>Destination</th>
                    <th>Quantity</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($query as $row) {?>
                <tr>
                    <td><input type="checkbox" class="flat-red" name="shipping_id[]" value="<?=$row->id?>"></td>
                    <td><?=$i?></td>
                    <td><?=$row->receipt_no?></td>
                    <td><?php $date_f = explode("-",$row->booking_date);

                        echo $date_f[2]."-".$date_f[1]."-".$date_f[0];

                        ?></td>
                    <td><?=$row->shipper_name?></td>
                    <td><?=$row->receiver_name?></td>
                    <td><?=$row->location_dest?></td>
                    <td><?=$row->quantity?></td>
                    <td><?=$row->status?></td>

                </tr>
                    <?php $i++; } ?>

                </tbody>
                </table><!-- /.table -->

            </div><!-- /.mail-box-messages -->
        </div><!-- /.box-body -->



    </div><!-- /. box -->

    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-arrow-right"></i>Ship Consignment</h4>
                </div>

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
                                        <label>Truck No</label>
                                       <select name="truck_no" class="form-control">
                                           <option value="0" >Select Truck No</option>
                                           <?php foreach ($trucks as $row) {?>
                                           <option value="<?=$row->id?>"><?=$row->truck_no?></option>
                                           <?php } ?>
                                       </select>
                                    </div>

                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group" ng-class="{ 'has-error' : userForm.r_no.$invalid && !userForm.r_no.$pristine }">
                                        <label>Driver Name</label>
                                        <select name="driver" class="form-control">
                                            <option value="0" >Select Truck No</option>
                                            <?php foreach ($driver as $row) {?>
                                            <option value="<?=$row->id?>"><?=$row->name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group" ng-class="{ 'has-error' : userForm.r_no.$invalid && !userForm.r_no.$pristine }">
                                        <label>Consignment Status</label>
                                        <select name="status" class="form-control">
                                            <option value="0" >Consignment Status</option>
                                            <?php foreach ($status as $row) {?>
                                            <option value="<?=$row->id?>"><?=$row->status?></option>
                                            <?php } ?>
                                        </select>
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



<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>



<script src="<?php echo base_url();?>assets/js/moment.js"></script>
<script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>


<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable({
                    "iDisplayLength": 50,
                    "aLengthMenu": [[50, 100, 200, 250,300], [50, 100, 200, 250,300]]

        });
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});



    });
</script>
<!-- Page Script -->
<script>
    $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs


        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
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

   function test()
    {
        var clicks = $(this).data('clicks');
        if (clicks) {
            //Uncheck all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
        } else {
            //Check all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
        }
        $(this).data("clicks", !clicks);
    }

    function validate_booking()
    {
        if($('#reservation').val() == "")
        {
            $('#res').addClass('has-error');
            return false;
        }
    }
    function print_validate()
    {
        if($('#date_t').val() == '0')
        {

            $('#res').addClass('has-error');
            return false;
        }
    }

    function print_add()
    {
        var val = $('#reservation').val();

        $('#date_t').val(val);
    }
</script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
