<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-bookmark" style="margin-right: 1%;"></i>
            Consignment Status
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">Consignment Status</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class=" clearfix">
                <div class="col-lg-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Add Consignment Status</h3>

                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="alert alert-danger alert-dismissable" style="display:none; background-color: white;" id="alert_dng">

                            </div>

                            <form name="form1" method="post" action="<?=site_url('admin/status_cont/insert_status')?>" onsubmit="return validate();">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Consignment Status</label>
                                        <input type="text" name="status" id="status" class="form-control" placeholder="In Transit">
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="action_status" id="action_status" class="form-control" style="width: 100%;">
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
                        <th>Status</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($query as $row) {?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$row->status?></td>
                        <td><?php if($row->action_status == '0') {

                            echo '<span class="label label-success">Active</span>';

                        } else {
                            echo '<span class="label label-danger">In-Active</span>';

                        }?></td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal" onclick="edit_status(<?php echo "'$row->id'".","."'$row->status'".","."'$row->action_status'"; ?>);" ><i class="fa fa-edit"></i> Edit</button>

                        </td>
                    </tr>
                        <?php $i++; } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
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


                    <form name="form1" method="post" action="<?=site_url('admin/status_cont/insert_status')?>" onsubmit="return validate_edit();" >

                        <input type="hidden" name="action" id="action" value="1" />

                        <div class="modal-body">
                            <!-- Edit or insert-->

                            <input type="hidden" value="0" id="id" name="id">


                            <div class="alert alert-danger alert-dismissable" style="display: none; background-color: white;" id="alert_dng_">

                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" style="padding-right: 40px;">Status</span>
                                        <input type="text" name="status" id="status_" class="form-control" placeholder="In Transit">
                                 </div>
                             </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" style="padding-right: 40px;">Status</span>
                                    <select name="action_status" id="action_status_" class="form-control" style="width: 100%;">
                                        <option value="0">Active</option>
                                        <option value="1">In-Active</option>
                                    </select>
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
    });
</script>

<script>

    function edit_status(id,status,a_status)
    {
        $('#id').val(id);
        $('#status_').val(status);
        $('#action_status_').val(a_status);
    }

    function validate()
    {
        if($('#status').val() == "")
        {
            $('#status_').focus();
            $("#alert_dng").html("Please Enter Status");
            $("#alert_dng").show().delay(3000).fadeOut();
            return false;
        }
    }

    /*edit function*/
    function validate_edit()
    {
        if($('#status_').val() == "")
        {
            $('#status_').focus();
            $("#alert_dng_").html("Please Enter Status");
            $("#alert_dng_").show().delay(3000).fadeOut();
            return false;
        }
    }
</script>



</body>
</html>

