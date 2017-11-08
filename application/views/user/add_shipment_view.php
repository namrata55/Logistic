<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa  fa-truck" style="margin-right: 1%;"></i>
            ADD CONSIGNMENT
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Consignment</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" >
        <div class="row" ng-app="myApp">

            <div class=" clearfix">
                <div class="col-lg-12">
                    <div class="box box-success">

                        <div class="box-body" ng-controller="shipment" id="shipment">
                            <h4 class="box-title">Consigner Info</h4>
                            <hr  style="border-top: 1px solid #adff2f;"/>
                            <div class="alert alert-danger alert-dismissable" style="display:none; background-color: white;" id="alert_dng">

                            </div>
                            <!--onsubmit="return insert_validate();"-->
                        <form name="form1" id="form1" method="post" action="<?=site_url('user/add_shipment/insert_shipment')?>"  onsubmit="return validate();">

                            <input type="hidden" name="status" value="7" />

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
                                            <option value="<?=$row->locid?>" selected="true" readonly><?=$row->city?>(<?=$row->area?>)</option>
                                            <?php } ?>
                                        </select>
                                        </select>

                                    </div>
                                </div>


                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Consigner </label>

                                        <input type="text" name="s_name" id="s_name" class="form-control" placeholder="Enter Consigner Name" ng-model="name">

                                  </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Contact No</label>

                                     <input type="number" name="s_contact" id="s_contact" class="form-control" placeholder="Enter Contact No">


                                    </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Quantity/Boxes</label>

                                        <input type="number" name="qty" id="qty" class="form-control" placeholder="Quantity/Boxes">

                                </div>
                            </div>
                        <h4>Consignee Info</h4>
                        <hr  style="border-top: 1px solid #00C0EF;"/>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Consignee</label>

                                    <input type="text" name="r_name" id="r_name" class="form-control" placeholder="Enter Receiver Name">

                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Contact No</label>

                                    <input type="number" name="r_cont" id="r_cont" class="form-control" placeholder="Enter Contact No">

                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="r_add" id="r_add" rows="3" placeholder="Receiver Address"></textarea>
                                </div>
                            </div>

                            <h4>Conisgnment Info</h4>
                            <hr style="border-top: 1px solid red;"/>
                            <div class="col-xs-4">
                                <div class="form-group" id="sandbox-container">
                                    <label>Consignment Date</label>

                                            <input type="text" id="r_date" name="r_date"  class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">

                                </div>
                            </div>

                             <div class="col-xs-4">
                                 <div class="form-group">
                                     <label>Material/Items</label>

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

                                           <select name="dest" id="dest" class="form-controlv select2" style="width: 100%;">
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

                                        <input type="number" name="price" id="price" class="form-control" placeholder="Enter Amount" ng-model="price" >

                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Handling Charges</label>

                                        <input type="number" name="h_charges" id="h_charges" class="form-control" placeholder="Enter Amount" ng-model="h_charges" >

                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Total</label>
                                        <input type="text" name="total" id="total" class="form-control" placeholder="" value="{{ price + h_charges }}" readonly="true" >
                                    </div>
                            </div>

                        </div><!-- /.box-body -->
                        <div class="box-footer text-right">

                                <button type="button" class="btn btn btn-danger pull-left" data-dismiss="modal" style="width: 20%;" onclick="reset()"><i class="fa fa-times"></i> Cancel</button>
                                <button type="submit" class="btn btn btn-primary"style="width: 20%;" ><i class="fa fa-save"></i> Save</button>

                        </div>
                        </form>
                        <div class="overlay" style="display: none;" id="over_lay">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div><!-- ./col -->
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php $this->load->view('user/page_adders/right_sidebar'); ?>



<link id="bsdp-css" href="<?php echo base_url();?>assets/date/dist/css/bootstrap-datepicker3.css" rel="stylesheet">

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
<script src="<?php echo base_url();?>assets/js/moment.js"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url();?>/assets/js/angular.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/ui-bootstrap-tpls-0.9.0.js"></script>

<script>
    var app = angular.module('myApp', ['ui.bootstrap']);

    app.controller('shipment', function($scope, $http) {

        var params;

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
                        /*$('#driver').val(data);*/
                    });


        };


    });



</script>

<!-- page script -->
<script type="text/javascript">
    $(function () {


        $(".select2").select2();

        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });

        lr_no = parseInt("<?=$id[0]->receipt_no?>");
        lr_no = lr_no + 1;

        if(lr_no < 10)
        {
            lr_no = "000" + lr_no;
            $('#r_no').val(lr_no);
        }
        else
        if (lr_no > 10 && lr_no < 100)
        {
            lr_no = "00" + lr_no;
            $('#r_no').val(lr_no);
        }
        else
        if (lr_no > 100 && lr_no < 1000)
        {
            lr_no = "0" + lr_no;
            $('#r_no').val(lr_no);
        }
        else
        if (lr_no > 1000)
        {
            $('#r_no').val(lr_no);
        }


    });
</script>




<script>
    $('#form1').submit(function(evnt){
        evnt.preventDefault();

        $('#over_lay').show();

        if(validate() == true)
        {
            $.ajax({
                type: 'post',
                url: '<?=site_url('user/add_shipment/insert_shipment')?>',
                data: $('#form1').serialize(),
                beforeSend: function() {
                    $('#over_lay').css("display", "block");
                },
                success: function () {
                    $('#over_lay').css("display", "none");
                 /*   $(location).attr('href','<?=site_url('user/add_shipment/print_shipment')?>');*/
                    var lr_value = $('#r_no').val();
                    myRedirect("<?=site_url('user/add_shipment/print_shipment')?>",lr_value);

                }
            });

        }
        else
        {
            $('#over_lay').css("display", "none");
        }
    });

    var myRedirect = function(redirectUrl, value) {
        var form = $('<form action="' + redirectUrl + '" method="post" target="_blank">' +
                '<input type="hidden" name="lr_no" value="' + value + '"></input>' + '</form>');
        $('body').append(form);
        $(form).submit();

        setTimeout(function () {
            location.reload();
        }, 2);

    };
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

        var d = new Date();
        var strDate = d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear();

        $('#b_date').val(strDate);
    });

</script>

<script>

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
        if($('#truck_no').val() == "0" || $('#truck_no').val() == "")
        {
            $('#truck_no').focus();
            $("#alert_dng").html("Please Select Truck Number");
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

        return true;
    }


    function reset()
    {
        $('#price').val("");
        $('#status').val(0);
        $('#truck_no').val(0);
        $('#dest').val(0);
        $('#origin').val(0);
        $('#r_date').val("");
        $('#r_add').val("");
        $('#r_cont').val("");
        $('#r_name').val("");
        $('#total').val("");
        $('#driver').val("");

    }
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

