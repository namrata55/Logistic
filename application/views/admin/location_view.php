<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-map-marker" style="margin-right: 1%;"></i>
            Location
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">Location</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class=" clearfix">
                <div class="col-lg-3 col-xs-6 pull-right text-right " style="padding-right: 7%;" >
                    <a data-target="#edit-modal" role="button" class="btn" data-toggle="modal" onclick="reset_loc();">
                        <img src="<?=base_url()?>/assets/img/location.png" width="auto" height="100" title="Add Location" data-toggle="tooltip" data-placement="left" id="imgchange" />

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
        <th>Branch</th>
        <th>City</th>
        <th>State</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach($query1 as $row) {?>
    <tr>
        <th><?=$i?></th>
        <td><?=$row->area?></td>
        <td><?=$row->state?></td>
        <td><?=$row->city?></td>
        <td><?php if($row->status == '0') {

            echo '<span class="label label-success">Active</span>';

        } else {
            echo '<span class="label label-danger">In-Active</span>';

        }?></td>
        <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal" onclick="edit_loc(<?php echo "'$row->id'".","."'$row->city'".","."'$row->s_id'".","."'$row->city_id'".","."'$row->area'";?>);" ><i class="fa fa-edit"></i> Edit</button>
            &nbsp;<button type="button" class="btn btn-danger" onclick="delete_loc(<?=$row->id?>);" > <i class="fa fa-times"></i> Delete</button>
        </td>
    </tr>
        <?php $i++; } ?>
    </tbody>
    <tfoot>
    <tr>
        <th>#</th>
        <th>Branch</th>
        <th>City</th>
        <th>State</th>
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


                    <form name="form1" method="post" action="<?=site_url('admin/location_cont/insert_location')?>" onsubmit="return validate_loc();">
                        <input type="hidden" name="action_type" id="action_type" value="0"  />

                        <div class="modal-body">
                            <!-- Edit or insert-->
                            <input type="hidden" value="0" id="action" name="action">

                            <input type="hidden" value="0" id="loc_id" name="loc_id">

                            <!--Member id -->
                            <input type="hidden" value="0" id="member_id" name="member_id">

                            <div class="alert alert-danger alert-dismissable" style="display: none;" id="alert_dng">

                            </div>

                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon" style="padding-right: 26px;">State &nbsp;</span>
                                    <select name="State" id="State" class="form-control">
                                        <option value="0">Select</option>
                                        <?php foreach ($query as $row) { ?>
                                        <option value="<?=$row->id?>"><?=$row->name?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" style="padding-right: 26px;">City &nbsp;</span>
                                        <div id="cities"><select name="city" id="city" class="form-control">
                                            <option value="0">Select</option>
                                            </select>
                                        </div>
                                </div>
                            </div>

                            <div class="form-group" style="margin-left: 15px;">
                                <div class="input-group">
                                    <span class="input-group-addon">Status &nbsp;</span>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0">Active</option>
                                        <option value="1">In-Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-group" id="area_">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="padding-right: 15px;">Branch &nbsp;</span>
                                        <input type="text" name="area" id="area" class="form-control" placeholder="Enter Area">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="padding-right: 15px;">GPS &nbsp;</span>
                                        <input type="text" name="gps" id="gps" class="form-control" placeholder="00.0000, 00.0000">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer clearfix">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                            </div></div>
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
    });
</script>

    <script type="text/javascript">
      $(function (){

          $('#imgchange').mouseover(function(){
              $('#imgchange').attr("src", "<?=base_url()?>/assets/img/location-1.png");

          });

          $('#imgchange').mouseout(function(){
              $('#imgchange').attr("src", "<?=base_url()?>/assets/img/location.png");

          });


          $('#State').change(function() {

              get_cities($('#State').val());

          });

         function get_cities(state)
          {

              var postData = {
                  'state': state,
                  'html' : 'PASS'
              };

              $.post("<?=site_url('admin/location_cont/get_cities')?>",postData, function(data){
                  $("#cities").html(data);
              });
          }
      });

      function edit_loc(loc_id , city , s_id , city_id , area)
      {
          $('#action_type').val('1');
          $('#loc_id').val(loc_id);
          $('#State').val(s_id);
          $('#area').val(area);
          $('#cities').html('<select name="city" id="city" class="form-control"><option value="'+ city_id +'">'+ city +'</option></select>');
      }

      function reset_loc()
      {
          $('#action_type').val('0');
          $('#State').val(0);
          $('#city').html('<select name="city" id="city" class="form-control"><option value="0">select</option></select>');
      }

      function delete_loc(loc_id)
      {
          var postData = {
              'loc_id': loc_id,
              'html' : 'PASS'
          };

          $.post("<?=site_url('admin/location_cont/delete_loc')?>",postData, function(data){
              location.reload();
          });
      }

      function validate_loc()
      {
         if($('#State').val() == "0")
         {
             $('#State').focus();

             $("#alert_dng").html("Please Select State");
             $("#alert_dng").show().delay(3000).fadeOut();
             return false;
         }

         if($('#city').val() == "0")
          {
              $('#city').focus();

              $("#alert_dng").html("Please Select City");
              $("#alert_dng").show().delay(3000).fadeOut();
              return false;
          }

          if($('#area').val() == "")
          {
              $('#area').focus();

              $("#alert_dng").html("Please Enter Area");
              $("#alert_dng").show().delay(3000).fadeOut();
              return false;
          }

          if($('#gps').val() == "")
          {
              $('#gps').focus();

              $("#alert_dng").html("Please Enter GPS");
              $("#alert_dng").show().delay(3000).fadeOut();
              return false;
          }

      }

    </script>
</body>
</html>

