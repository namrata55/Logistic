<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-users" style="margin-right: 1%;"></i>
            Driver
            <small>Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">Create Driver</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class=" clearfix">
                <div class="col-lg-3 col-xs-6 pull-right text-right " style="padding-right: 7%;" >
                    <a data-target="#edit-modal" role="button" class="btn" data-toggle="modal" onclick="reset();">
                        <i class="ion ion-person-add" style="font-size: 100px;" title="Add Driver" data-toggle="tooltip" data-placement="left"></i>
                    </a>
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
                        <th>Full Name</th>
                        <th>Contact No</th>
                        <th>Contact No 2</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($query as $row) {?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$row->name?></td>
                        <td><?=$row->contact_no?></td>
                        <td><?=$row->contact_no1?></td>
                        <td><?=$row->address?></td>
                        <td><?php if($row->status == '0') {

                            echo '<span class="label label-success">Active</span>';

                        } else {
                            echo '<span class="label label-danger">In-Active</span>';

                        }?></td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal" onclick="edit_driver(<?php echo "'$row->id'".","."'$row->name'".","."'$row->contact_no'".","."'$row->contact_no1'".","."'$row->address'".","."'$row->img'";?>);" ><i class="fa fa-edit"></i> Edit</button>
                                  </td>
                    </tr>
                        <?php $i++; } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Contact No</th>
                        <th>Contact No 2</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->


        <!-- pop up for the insert bank details-->
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" ng-controller="autocompleteController" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-arrow-right"></i>Edit/Add</h4>
                    </div>


                    <form name="form1" method="post" action="<?=site_url()?>/admin/driver_cont/insert_drivers" onsubmit="return validate_driver();" enctype="multipart/form-data">
                        <input type="hidden" name="action_type" id="action_type" value="0" />

                        <div class="modal-body">
                       <div class="row">
                           <div class="col-md-6">
                            <!-- Edit or insert-->
                            <input type="hidden" value="0" id="action" name="action">

                            <input type="hidden" value="0" id="driver_id" name="driver_id">

                            <!--Member id -->
                            <input type="hidden" value="0" id="member_id" name="member_id">

                            <div class="alert alert-danger alert-dismissable" style="display: none; background-color: white;" id="alert_dng">

                            </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Driver Name &nbsp;</label>
                                        <input type="text" name="name" id="name" class="form-control" ng-model="name" placeholder="Driver Name">
                                </div>
                            </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contact No &nbsp;</label>
                                    <input type="text" name="c_no" id="c_no" class="form-control" placeholder="Contact No">

                                </div>
                            </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contact No 2&nbsp;</label>
                                    <input type="text" name="c_no1" id="c_no1" class="form-control" placeholder="Contact No">

                                </div>
                            </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label>Status &nbsp;</label>
                                       <select name="status" id="status" class="form-control">
                                           <option value="0">Active</option>
                                           <option value="1">In-Active</option>
                                       </select>
                                   </div>
                               </div>

                    </div>
                    <div class="col-md-6">


                            <div class="col-md-12 text-center" style="margin-bottom: 5%;">

                                <img id="output" height="210" width="180" src="<?=base_url()?>assets/img/user1.png"/>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Driver Image &nbsp;</label>
                                    <input type="file" name="driver_img" class="form-control" id="imgInp" onchange="loadFile(event)">
                                </div>
                            </div>


                     </div>

                      <div class="col-md-12">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Address &nbsp;</label>
                                  <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter Address"></textarea>

                              </div>

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
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<?php $this->load->view('page_adders/right_sidebar'); ?>

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

<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

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

        $('#c_no').keyup(function() {
            if (this.value.match(/[^0-9-]/g)) {
                this.value = this.value.replace(/[^0-9]/g, '');
            }
        });

        $('#c_no1').keyup(function() {
            if (this.value.match(/[^0-9-]/g)) {
                this.value = this.value.replace(/[^0-9]/g, '');
            }
        });

        $('[data-toggle="tooltip"]').tooltip();


    });
</script>

<script>
    function edit_driver(id,name,c_no,c_no1,address,img)
    {
        $('#name').val(name);
        $('#c_no').val(c_no);
        $('#c_no1').val(c_no1);
        $('#address').val(address);

        $('#driver_id').val(id);

        $('#action').val(1);

        $('#output').attr('src',"<?=base_url()?>/"+img);
        $('#driver_img').val(img);

    }

    function reset()
    {
        $('#name').val("");
        $('#c_no').val("");
        $('#c_no1').val("");
        $('#address').val("");

        $('#action').val(0);
    }

    function validate_driver()
    {

        if($('#name').val() == "")
        {
            $('#name').focus();

            $("#alert_dng").html("Please Enter Driver Name");
            $("#alert_dng").show().delay(3000).fadeOut();

            return false;
        }

        if($('#c_no').val() == "")
        {
            $('#c_no').focus();

            $("#alert_dng").html("Please Enter Contact No");
            $("#alert_dng").show().delay(3000).fadeOut();
            return false;
        }

        if($('#address').val() == "")
        {
            $('#address').focus();
            $("#alert_dng").html("Please Enter Adress");
            $("#alert_dng").show().delay(3000).fadeOut();
            return false;
        }


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

