<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-users"></i><span style="margin-left: 1%;">User Profile</span>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">User Profile</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class=" clearfix">
                <div class="col-lg-3 col-xs-6 pull-right text-right " style="padding-right: 7%;" >
                    <a data-target="#edit-modal" role="button" class="btn" data-toggle="modal" >
                        <i class="ion ion-person-add" style="font-size: 100px;" title="Add User" data-toggle="tooltip" data-placement="left"></i>
                    </a>
                </div>
                <!--<div class="col-lg-3 col-xs-6 pull-right">-->
                    <!-- small box -->
                   <!-- <div class="small-box bg-aqua">
                    <a data-target="#edit-modal" role="button" class="btn" data-toggle="modal">

                            <h3>Add</h3>
                            <p>Create User</p>

                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </a>
                        <a href="#" class="small-box-footer"></a>
                    </div>
                </div>--><!-- ./col -->

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
                        <th>User ID</th>
                        <th>E-Mail</th>
                        <th>Location</th>
                        <th>User Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($query1 as $row) {?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$row->user_name?></td>
                        <td><?=$row->user_id?></td>
                        <td><?=$row->email?></td>
                        <td><?=$row->location?></td>
                        <td><?=$row->user_type?></td>
                        <td><?php if($row->status == '0') {

                            echo '<span class="label label-success">Active</span>';

                        } else {
                            echo '<span class="label label-danger">In-Active</span>';

                        }?></td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal1" onclick="edit_user(<?php echo "'$row->id'".","."'$row->user_name'".","."'$row->email'".","."'$row->user_id'".","."'$row->location'".","."'$row->user_type'".","."'$row->status'".","."'$row->c_id'" ; ?>);" ><i class="fa fa-edit"></i> Edit</button>
                        </td>
                    </tr>
                        <?php $i++; } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>User ID</th>
                        <th>E-Mail</th>
                        <th>Location</th>
                        <th>User Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->


        <!-- pop up for the insert bank details-->
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true" ng-app="myApp">
            <div class="modal-dialog" ng-controller="MyCtrl" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-arrow-right"></i>Edit/Add</h4>
                    </div>


                    <form name="form1" method="post" action="<?=site_url('admin/create_user/insert_user')?>" onsubmit="return validate_form();">
                        <input type="hidden" name="action_type" id="action_type" value="0" />

                        <div class="modal-body">
                            <!-- Edit or insert-->
                            <div class="alert alert-danger alert-dismissable" style="display: none; background-color: white;" id="alert_dng">

                            </div>
                            <div class="row">

                            <div class="col-xs-6">
                                <div class="from-group">
                                    <label>Full Name &nbsp;</label>
                                         <input type="text" name="full_name" id="full_name" class="form-control" ng-model="name">
                                    </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="from-group">
                                    <label>E-Mail &nbsp;</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                            </div>

                             <div class="col-xs-6">
                                <div class="from-group">
                                    <label>User ID &nbsp;</label>
                                            <input type="text" name="user_id" id="user_id" class="form-control">

                                </div>
                            </div>

                                <div class="col-xs-6">
                                    <div class="from-group">
                                        <label>Location</label>
                                        <select name="location" id="location" class="form-control">
                                            <option value="0">Select</option>
                                            <?php foreach ($query as $row) { ?>
                                            <option value="<?=$row->id?>"> <?=$row->name?> (<?=$row->area?>)</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            <div class="col-xs-6">
                                <div class="from-group">
                                    <label>Password &nbsp;</label>
                                    <input type="password" name="pass" id="pass" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="from-group">
                                    <label>Confirm Password &nbsp;</label>
                                        <input type="password" name="c_pass" id="c_pass" class="form-control">
                                </div>
                            </div>



                            <div class="col-xs-6">
                                <div class="from-group">
                                    <label>User Type</label>
                                    <select name="user_type" id="user_type" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="from-group">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0">Active</option>
                                        <option value="1">In-Active</option>
                                    </select>
                                </div>
                            </div>

                            </div>
                    </div>
                            <div class="modal-footer clearfix">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                            </div>

                    </form>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!--update user profile-->
<!-- pop up for the insert bank details-->
<div class="modal fade" id="edit-modal1" tabindex="-1" role="dialog" aria-hidden="true" ng-app="myApp">
    <div class="modal-dialog" ng-controller="MyCtrl" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                <h4 class="modal-title"><i class="fa fa-arrow-right"></i>Edit/Add</h4>
            </div>


            <form name="form1" method="post" action="<?=site_url('admin/create_user/update_user')?>" >

                <div class="modal-body">


                    <input type="hidden" value="0" id="e_u_id" name="u_id">

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding-right: 62px;">Full Name &nbsp;</span>
                            <input type="text" name="e_full_name" id="e_full_name" class="form-control" ng-model="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding-right: 84px;">E-Mail &nbsp;</span>
                            <input type="text" name="e_email" id="e_email" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding-right: 78px;">User ID &nbsp;</span>
                            <input type="text" name="e_user_id" id="e_user_id" class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding-right: 74px !important;">Location</span>
                            <select name="e_location" id="e_location" class="form-control">
                                <option value="0">Select</option>
                                <?php foreach ($query as $row) { ?>
                                <option value="<?=$row->id?>"><?=$row->name?>(<?=$row->area?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding-right: 68px !important;">User Type</span>
                            <select name="e_user_type" id="e_user_type" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding-right: 86px !important;">Status</span>
                            <select name="e_status" id="e_status" class="form-control">
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

        $('#c_pass').blur(function() {

            if($('#pass').val() != $('#c_pass').val())
            {
                $('#pass').val("");
                $('#c_pass').val("");
                $("#alert_dng").html("Password are not the same Please re-enter password");
                $("#alert_dng").show().delay(3000).fadeOut();
            }

        });
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

    <script type="text/javascript">

        function edit_user(id,name,email,user_id,loc,type,status,c_id)
        {

            $('#e_full_name').val(name);
            $('#e_email').val(email);
            $('#e_user_id').val(user_id);
            $('#e_location').val(c_id);
            $('#e_user_type').val(type);
            $('#e_status').val(status);

            $('#e_u_id').val(id);
            $('#action').val(1);
        }


        function reset()
        {
            $('#full_name').val("");
            $('#email').val("");
            $('#user_id').val("");
            $('#location').val(0);
            $('#user_type').val(0);
            $('#status').val(0);

            $('#u_id').val(0);
            $('#action').val(0);
        }

        function validate_form()
        {

            if($('#full_name').val() == "")
            {
                $('#full_name').focus();

                $("#alert_dng").html("Please Enter User Name");
                $("#alert_dng").show().delay(3000).fadeOut();
                return false;
            }

            if($('#pass').val() == "" )
            {
                $('#pass').focus();

                $("#alert_dng").html("Please Enter Password");
                $("#alert_dng").show().delay(3000).fadeOut();
                return false;
            }

            /*Email validation*/
            if($('#email').val() == "")
            {
                $("#alert_dng").html("Please Enter Email ID");
                $("#alert_dng").show().delay(3000).fadeOut();

                return false;

            }
            else
            {
                var value;
                email = $('#email').val();

                var postData = {
                    'email': email,
                    'html' : 'PASS'
                };

                $.ajaxSetup({ async: false });
                $.post("<?=site_url('admin/create_user/validate_email')?>",postData, function(data){

                    value = data.trim();

                });

                if(value == "false")
                {
                    $('#email').focus();

                    $("#alert_dng").html("Email Id already exists Please Enter Differnt Email ID");
                    $("#alert_dng").show().delay(3000).fadeOut();

                   /* $('#email_c').addClass('has-error');*/
                    return false;
                }

            }

            if($('#user_id').val() == "")
            {
                return false;
            }
            else
            {
                user_id = $('#user_id').val();
                var valuea;

                var postData = {
                    'user_id': user_id,
                    'html' : 'PASS'
                };

                $.ajaxSetup({ async: false });
                $.post("<?=site_url('admin/create_user/validate_user')?>",postData, function(data){

                    valuea = data.trim();
                });

                if(valuea == "false")
                {
                    $('#user_id').focus();

                    $("#alert_dng").html("User Id already exists Please Enter Differnt User ID");
                    $("#alert_dng").show().delay(3000).fadeOut();

                    return false;
                }
            }


        }

        /*User email validate*/
        function validate_user()
        {
            email = $('#user_id').val();

            var postData = {
                'user_id': user_id,
                'html' : 'PASS'
            };

            $.post("<?=site_url('admin/create_user/validate_user')?>",postData, function(data){

                alert(data);
                if(data == "true")
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            });
        }
    </script>
