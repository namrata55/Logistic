<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-truck" style="margin-right: 1%;"></i>
            Trucks
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">Trucks</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" ng-app="myApp" ng-controller="truck" id="truck">
        <div class="row">

            <div class=" clearfix">
                <div class="col-lg-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Add Trucks</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="alert alert-danger alert-dismissable" style="display:none; background-color: white;" id="alert_dng_">

                            </div>

                        <form name="form1" id="form1" method="post" action="<?=site_url('admin/truck_cont/insert_tucks')?>" onsubmit="return insert_validate();">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Truck No</label>
                                    <input type="text" name="truck_no" id="truck_no" class="form-control" placeholder="Ex : KA 22 S 1234">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Model</label>
                                    <input type="text" name="model_no" id="model_no" class="form-control" placeholder="2015" maxlength="4">
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                        <label>Driver Name</label>
                                        <select name="driver" id="driver" class="form-control" style="width: 100%;">
                                            <option value="0">Select Driver</option>
                                            <?php foreach ($query as $row) { ?>
                                            <option value="<?=$row->id?>"><?=$row->name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group" id="sandbox-container">
                                    <label>Tax Expiry Date</label>
                                    <input type="text" name="exp_date" id="exp_date" class="form-control" placeholder="dd/mm/yyyy" readonly>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group" id="sandbox-container1">
                                    <label>PUC Expiry Date</label>
                                    <input type="text" name="puc_exp_date" id="puc_exp_date" class="form-control datepicker" placeholder="dd/mm/yyyy" readonly>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group" id="sandbox-container2">
                                    <label>Permit Expiry Date</label>
                                    <input type="text" name="per_exp_date" id="per_exp_date" class="form-control" placeholder="dd/mm/yyyy" readonly>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group" id="sandbox-container3">
                                    <label>Insurance Expiry Date</label>
                                    <input type="text" name="inc_exp_date" id="inc_exp_date" class="form-control" placeholder="dd/mm/yyyy" readonly>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group" id="sandbox-container4">
                                    <label>Fitness Expiry Date</label>
                                    <input type="text" name="fit_exp_date" id="fit_exp_date" class="form-control" placeholder="dd/mm/yyyy" readonly>
                                </div>
                            </div>


                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control" style="width: 100%;">
                                        <option value="0">Active</option>
                                        <option value="1">In-Active</option>
                                    </select>
                                </div>
                            </div>


                        </div><!-- /.box-body -->
                        <div class="box-footer text-right">

                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right: 1%;"><i class="fa fa-times"></i> Cancel</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div><!-- ./col -->
        </div>



        <div class="box">
            <div class="box-header">
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Truck No</th>
                        <th>Driver Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($query1 as $row) {?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$row->truck_no?></td>
                        <td><?=$row->driver_name?></td>
                        <td><?php if($row->status == '0') {

                            echo '<span class="label label-success">Active</span>';

                        } else {
                            echo '<span class="label label-danger">In-Active</span>';

                        }?></td>
                        <td><button class="btn btn-warning" data-toggle="modal" data-target="#edit-modal1"  ng-click="view_truck(<?php echo "'$row->id'".","."'$row->truck_no'".","."'$row->driver_name'".","."'$row->status'".","."'$row->model'".","."'$row->tax_expiry'".","."'$row->puc_expiry'".","."'$row->permit_expiry'".","."'$row->insur_expiry'".","."'$row->fit_expiry'"; ?>);" ><i class="fa fa-eye"></i> View</button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal" onclick="edit_truck(<?php echo "'$row->id'".","."'$row->truck_no'".","."'$row->driver_id'".","."'$row->status'".","."'$row->model'".","."'$row->tax_expiry'".","."'$row->puc_expiry'".","."'$row->permit_expiry'".","."'$row->insur_expiry'".","."'$row->fit_expiry'"; ?>);" ><i class="fa fa-edit"></i> Edit</button>

                        </td>
                    </tr>
                        <?php $i++; } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Truck No</th>
                        <th>Driver Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

        <!--View model-->
        <!-- pop up for the insert bank details-->
        <div class="modal fade " id="edit-modal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-arrow-right"></i> View Truck</h4>
                    </div>

                        <div class="modal-body">
                            <!-- Edit or insert-->

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Truck No</label>
                                            <h4 class="timeline-header"><a href="#">{{truck_no}}</a></h4>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Model</label>
                                        <h4 class="timeline-header"><a href="#">{{model}}</a></h4>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Driver Name</label>
                                        <h4 class="timeline-header"><a href="#">  {{driver}}</a></h4>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group" id="">
                                        <label>Tax Expiry Date</label>
                                        <h4 class="timeline-header"><a href="#">{{exp_date}}</a></h4>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group" id="">
                                        <label>PUC Expiry Date</label>
                                        <h4 class="timeline-header"><a href="#">{{puc}}</a></h4>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group" id="">
                                        <label>Permit Expiry Date</label>
                                        <h4 class="timeline-header"><a href="#">{{permit}}</a></h4>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group" id="">
                                        <label>Insurance Expiry Date</label>
                                        <h4 class="timeline-header"><a href="#"> {{insur}}</a></h4>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group" id="">
                                        <label>Fitness Expiry Date</label>
                                        <h4 class="timeline-header"><a href="#"> {{fit}}</a></h4>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <h4 class="timeline-header"><a href="#">  {{status}}</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer clearfix">
                                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>

                            </div>

                        </div>
                    </form>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- pop up for the insert bank details-->
        <div class="modal fade " id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-arrow-right"></i>Edit Truck</h4>
                    </div>


                    <form name="form1" method="post" action="<?=site_url('admin/truck_cont/insert_tucks')?>" onsubmit="return validate_edit();">
                        <input type="hidden" name="action_type" id="action_type" value="0" />

                        <div class="modal-body">
                            <!-- Edit or insert-->
                            <input type="hidden" value="1" id="action" name="action">

                            <input type="hidden" value="0" id="truck_id" name="truck_id">


                            <div class="alert alert-danger alert-dismissable" style="background-color: white;" id="alert_dng">

                            </div>
                        <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Truck No</label>
                                        <input type="text" name="truck_no" id="truck_no_" class="form-control" placeholder="KA 22 S 1234">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Model</label>
                                        <input type="text" name="model_no" id="model_no_" class="form-control" placeholder="2015" maxlength="4">
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Driver Name</label>
                                        <select name="driver" id="driver_" class="form-control" style="width: 100%;">
                                            <option value="0">Select Driver</option>
                                            <?php foreach ($query as $row) { ?>
                                            <option value="<?=$row->id?>"><?=$row->name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group" id="sandbox-container_">
                                        <label>Tax Expiry Date</label>
                                        <input type="text" name="exp_date" id="exp_date_" class="form-control" placeholder="dd/mm/yyyy" readonly>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-group" id="sandbox-container1_">
                                        <label>PUC Expiry Date</label>
                                        <input type="text" name="puc_exp_date" id="puc_exp_date_" class="form-control" placeholder="dd/mm/yyyy" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group" id="sandbox-container2_">
                                        <label>Permit Expiry Date</label>
                                        <input type="text" name="per_exp_date" id="per_exp_date_" class="form-control" placeholder="dd/mm/yyyy" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group" id="sandbox-container3_">
                                        <label>Insurance Expiry Date</label>
                                        <input type="text" name="inc_exp_date" id="inc_exp_date_" class="form-control" placeholder="dd/mm/yyyy" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group" id="sandbox-container4_">
                                        <label>Fitness Expiry Date</label>
                                        <input type="text" name="fit_exp_date" id="fit_exp_date_" class="form-control" placeholder="dd/mm/yyyy" readonly>
                                    </div>
                                </div>


                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status_" class="form-control" style="width: 100%;">
                                            <option value="0">Active</option>
                                            <option value="1">In-Active</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                            <div class="modal-footer clearfix">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                            </div>

                        </div>
                    </form>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php $this->load->view('page_adders/right_sidebar'); ?>
<link id="bsdp-css" href="<?php echo base_url();?>assets/date/dist/css/bootstrap-datepicker3.css" rel="stylesheet">
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/js/moment.js"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>


<script type="text/javascript" src="<?php echo base_url();?>/assets/js/angular.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/ui-bootstrap-tpls-0.9.0.js"></script>

<script>
    var app = angular.module('myApp', ['ui.bootstrap']);

    app.controller('truck', function($scope, $http) {

            $scope.view_truck = function (id,truck_no,driver,status,model,tax,puc,permit,insur,fit)
            {

                $scope.truck_no = truck_no;
                $scope.model = model;
                $scope.driver = driver;
                $scope.exp_date = change_date(tax);
                $scope.puc = change_date(puc);
                $scope.permit = change_date(permit);
                $scope.insur = change_date(insur);
                $scope.fit = change_date(fit);

                var st ;
                if(status == "0")
                {
                     st = "Active";
                }
                else
                {
                    st = "In-Active";
                }
                $scope.status = st;

            };

            $scope.change_date = function (datea)
            {
                $dt = datea.split("-");
                return $dt[2]+"/"+$dt[1]+"/"+$dt[0];
            };

    });


</script>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });

        $('#truck_no').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });

        $('#truck_no_').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });

        $("#model_no").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });

       /* $('#form1').submit(function(evnt){
            evnt.preventDefault();
            $.post("<?=site_url('admin/truck_cont/insert_tucks')?>",
                    $("#form1").serialize(),
                    function (data) {
                            location.reload();
                    })
                    .done(function() {
                        alert( "second success" );
                        $('#edit-modal').modal('show');
                    })
                    .fail(function() {
                        alert( "error" );
                    })
        });*/
    });
</script>

<script>

    function insert_validate()
    {
        if($('#truck_no').val() == "")
        {
            $('#truck_no').focus();
            $("#alert_dng_").html("Please Add Truck No");
            $("#alert_dng_").show().delay(3000).fadeOut();
            return false;
        }

        if($('#driver').val() == "0")
        {
            $('#driver').focus();
            $("#alert_dng_").html("Please Select Driver");
            $("#alert_dng_").show().delay(3000).fadeOut();
            return false;
        }
    }

   function edit_truck(id,truck_no,driver_id,status,model,tax,puc,permit,insur,fit)
   {
        $('#truck_no_').val(truck_no);
        $('#model_no_').val(model);


        $('#exp_date_').val(change_date(tax));
        $('#puc_exp_date_').val(change_date(puc));
        $('#per_exp_date_').val(change_date(permit));
        $('#inc_exp_date_').val(change_date(insur));
        $('#fit_exp_date_').val(change_date(fit));
        $('#driver_').val(driver_id);
        $('#status_').val(status);
        $('#truck_id').val(id);
        $("#alert_dng").hide();

   }

    function change_date(datea)
    {
        $dt = datea.split("-");
        return $dt[2]+"/"+$dt[1]+"/"+$dt[0];
    }


    function validate_edit()
    {
        if($('#truck_no_').val() == "")
        {
            $('#truck_no_').focus();
            $("#alert_dng").html("Please Add Truck No");
            $("#alert_dng").show().delay(3000).fadeOut();
            return false;
        }

        if($('#driver_').val() == "0")
        {
            $('#driver').focus();
            $("#alert_dng").html("Please Select Driver");
            $("#alert_dng").show().delay(3000).fadeOut();
            return false;
        }
    }

</script>

<script src="<?php echo base_url();?>assets/date/dist/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/date/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function(){
        $('#sandbox-container input').datepicker({
            todayBtn: "linked",
            viewMode: 'years',
            orientation: "bottom auto",
            viewMode: 'years',
            autoclose: true,
            format: "dd/mm/yyyy"
        });
        $('#sandbox-container1 input').datepicker({
            todayBtn: "linked",
            orientation: "bottom auto",
            viewMode: 'years',
            autoclose: true,
            format: "dd/mm/yyyy"
        });$('#sandbox-container2 input').datepicker({
            todayBtn: "linked",
            orientation: "bottom auto",
            viewMode: 'years',
            autoclose: true,
            format: "dd/mm/yyyy"
        });$('#sandbox-container3 input').datepicker({
            todayBtn: "linked",
            orientation: "bottom auto",
            viewMode: 'years',
            autoclose: true,
            format: "dd/mm/yyyy"
        });$('#sandbox-container4 input').datepicker({
            todayBtn: "linked",
            orientation: "bottom auto",
            viewMode: 'years',
            autoclose: true,
            format: "dd/mm/yyyy"
        });
        $('#sandbox-container_ input').datepicker({
            todayBtn: "linked",
            orientation: "bottom auto",
            viewMode: 'years',
            autoclose: true,
            format: "dd/mm/yyyy"
        });
        $('#sandbox-container1_ input').datepicker({
            todayBtn: "linked",
            orientation: "bottom auto",
            viewMode: 'years',
            autoclose: true,
            format: "dd/mm/yyyy"
        });$('#sandbox-container2_ input').datepicker({
            todayBtn: "linked",
            orientation: "bottom auto",
            viewMode: 'years',
            autoclose: true,
            format: "dd/mm/yyyy"
        });$('#sandbox-container3_ input').datepicker({
            todayBtn: "linked",
            orientation: "bottom auto",
            autoclose: true,
            format: "dd/mm/yyyy"
        });$('#sandbox-container4_ input').datepicker({
            todayBtn: "linked",
            orientation: "bottom auto",
            viewMode: 'years',
            autoclose: true,
            format: "dd/mm/yyyy"
        });
        /*$("#r_date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $('#r_date').datepicker('update', new Date());*/
    });

</script>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }
</style>

</body>
</html>

