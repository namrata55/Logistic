<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-cubes" style="margin-right: 1%;"></i>
            Add Material
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">Material</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="row">
                <div class=" clearfix">
                    <div class="col-lg-3 col-xs-6 pull-right text-right " style="padding-right: 7%;" >
                        <a data-target="#edit-modal" role="button" class="btn" data-toggle="modal" onclick="reset();">
                            <img src="<?=base_url()?>assets/img/cubs1.png" width="auto" height="100" title="Add Material" data-toggle="tooltip" data-placement="left" id="imgchange" />
                        </a>
                    </div>
                </div><!-- ./col -->
            </div>
        </div>
        <div class="box">
            <div class="box-header">
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Material</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($query as $row) {?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$row->material?></td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal" onclick="edit_mat(<?php echo "'$row->id'".","."'$row->material'";?>);" ><i class="fa fa-edit"></i> Edit</button>
                            &nbsp;<button type="button" class="btn btn-danger" onclick="delete_mat(<?=$row->id?>);" > <i class="fa fa-times"></i> Delete</button></td>
                    </tr>
                        <?php $i++; } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Material</th>
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


                    <form name="form1" method="post" action="<?=site_url('admin/materials_cntl/insert_material')?>" onsubmit="return validate_edit();" >

                        <input type="hidden" name="action" id="action" value="0" />

                        <div class="modal-body">
                            <!-- Edit or insert-->

                            <input type="hidden" value="0" id="id" name="id">


                            <div class="alert alert-danger alert-dismissable" style="display: none; background-color: white;" id="alert_dng_">

                            </div>
                            <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Material</label>
                                    <input type="text" name="material" id="material" class="form-control" placeholder="Ex : Liquid">
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


        $('#imgchange').mouseover(function(){
            $('#imgchange').attr("src", "<?=base_url()?>/assets/img/cubs.png");

        });

        $('#imgchange').mouseout(function(){
            $('#imgchange').attr("src", "<?=base_url()?>/assets/img/cubs1.png");

        });

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

    function edit_mat(id,mat)
    {
        $('#id').val(id);
        $('#material').val(mat);
        $('#action').val('1');
    }

    function reset()
    {
        $('#material').val("");
        $('#action').val('0');
    }

    function delete_mat(id)
    {
        var postData = {
            'id': id,
            'html' : 'PASS'
        };

        $.post("<?=site_url('admin/materials_cntl/delete_mat')?>",postData, function(data){
            location.reload();
        });
    }
</script>



</body>
</html>

