<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row" style="display: none;">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>150</h3>
                <p style="text-transform: uppercase;">New Consignment</p>
            </div>
            <div class="icon">
                <i class="fa fa-cart-plus"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>53</h3>
                <p style="text-transform: uppercase;">Pending Consignment</p>
            </div>
            <div class="icon">
                <i class="fa fa-cart-arrow-down"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>44</h3>
                <p style="text-transform: uppercase;">User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>5</h3>
                <p style="text-transform: uppercase;">AVAILABLE TRUCKS</p>
            </div>
            <div class="icon">
                <i class="fa fa fa-truck"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->
<div class="row">
    <!-- Left col -->
    <div class="col-md-12">
        <!-- MAP & BOX PANE -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Branches</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <div class="pad">
                            <!-- Map will be created here -->
                            <div id="world-map-markers" style="height: 325px;"></div>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-3 col-sm-4">
                        <div class="pad box-pane-right bg-green" style="min-height: 350px">
                            <div class="description-block margin-bottom">
                                <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                                <h5 class="description-header"><?php echo $t_m; ?></h5>
                                <span class="description-text">Mumbai</span>
                            </div><!-- /.description-block -->
                            <div class="description-block margin-bottom">
                                <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                <h5 class="description-header"><?php echo $t_b; ?></h5>
                                <span class="description-text">Belgaum</span>
                            </div><!-- /.description-block -->
                            <div class="description-block">

                            </div><!-- /.description-block -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </div><!-- /.col -->

    <div class="col-md-4" style="display: none;">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Browser Usage</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="chart-responsive">
                            <canvas id="pieChart" height="150"></canvas>
                        </div><!-- ./chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <ul class="chart-legend clearfix">
                            <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                            <li><i class="fa fa-circle-o text-green"></i> IE</li>
                            <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                            <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                            <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                            <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                        </ul>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.box-body -->
            <div class="box-footer no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">United States of America <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                    <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a></li>
                    <li><a href="#">China <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                </ul>
            </div><!-- /.footer -->
        </div><!-- /.box -->
        <!-- PRODUCT LIST -->

    </div><!-- /.row -->
</div>
<div class="row" >
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username">Mumbai</h3>
                <h5 class="widget-user-desc">Consignment Details</h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle" src="<?=base_url()?>/assets/img/box.PNG" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><?php echo $m_new; ?></h5>
                            <span class="description-text">New</span>
                        </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><?php echo $m_pen; ?></h5>
                            <span class="description-text">Pending</span>
                        </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header"><?php echo $m_del; ?></h5>
                            <span class="description-text">Delivered</span>
                        </div><!-- /.description-block -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.widget-user -->
    </div>
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
                <h3 class="widget-user-username">Belgaum</h3>
                <h5 class="widget-user-desc">Consignment Details</h5>
            </div>
            <div class="widget-user-image">

                  <img class="img-circle" src="<?=base_url()?>assets/img/box.PNG" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><?php echo $b_new; ?></h5>
                            <span class="description-text">New</span>
                        </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><?php echo $b_pen; ?></h5>
                            <span class="description-text">Pending</span>
                        </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header"><?php echo $b_del; ?></h5>
                            <span class="description-text">Delivered</span>
                        </div><!-- /.description-block -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.widget-user -->
    </div>
    <div class="col-md-4">
        <div class="col-lg-12 col-xs-6">

            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-person-add"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">USER REGISTRATIONS</span>
                    <span class="info-box-number"><?php echo $t_user; ?></span>
                </div><!-- /.info-box-content -->
            </div>
        </div><!-- ./col -->
        <div class="col-lg-12 col-xs-6" style="margin-top: 6%;">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-truck"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Available Trucks</span>
                    <span class="info-box-number"><?php echo $t_truck; ?></span>
                </div><!-- /.info-box-content -->
            </div>
        </div>

    </div>

</div>
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Monthly Recap Report</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <div class="btn-group">
                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-center">
                                <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                            </p>
                            <div class="chart">
                                <!-- Sales Chart Canvas -->
                                <canvas id="salesChart" style="height: 180px;"></canvas>
                            </div><!-- /.chart-responsive -->
                        </div><!-- /.col -->
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Goal Completion</strong>
                            </p>
                            <div class="progress-group">
                                <span class="progress-text">New Consignment</span>
                                <span class="progress-number"><b><?=$t_new_cons;?></b>/<?=$t_cons;?></span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-aqua" style="width: <?=$t_per_new;?>%"></div>
                                </div>
                            </div><!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Pending Consignment</span>
                                <span class="progress-number"><b><?=$t_pen_cons;?></b>/<?=$t_cons;?></span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-red" style="width: <?=$t_per_pen;?>%"></div>
                                </div>
                            </div><!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Delivered Consignment</span>
                                <span class="progress-number"><b><?=$t_del_cons;?></b>/<?=$t_cons;?></span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-green" style="width: <?=$t_per_del;?>%"></div>
                                </div>
                            </div><!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Canceled Consignment</span>
                                <span class="progress-number"><b><?=$t_cenc_cons;?></b>/<?=$t_cons;?></span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-yellow" style="width: <?=$t_per_canc;?>%"></div>
                                </div>
                            </div><!-- /.progress-group -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?=number_format($t_per_revenue_price,2);?>%</span>
                                <h5 class="description-header">Rs.<?=number_format($t_revenue_price);?></h5>
                                <span class="description-text">TOTAL REVENUE</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-3 col-xs-12">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo number_format($t_per_profit_price,2);?>%</span>
                                <h5 class="description-header">Rs.<?=number_format($t_profit_price);?></h5>
                                <span class="description-text">TOTAL PROFIT</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-3 col-xs-12">
                            <div class="description-block border-right">
                                <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo number_format($t_per_pending_price,2);?>%</span>
                                <h5 class="description-header">Rs.<?=number_format($t_pending_price);?></h5>
                                <span class="description-text">TOTAL PENDING</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-3 col-xs-12">
                            <div class="description-block">
                                <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo number_format($t_per_lost_price,2);?>%</span>
                                <h5 class="description-header">Rs.<?=number_format($t_lost_price);?></h5>
                                <span class="description-text">TOTAL LOST</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.box-footer -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row (main row) -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->



<?php $this->load->view('page_adders/right_sidebar'); ?>
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
    $(function () {
        $('#world-map-markers').vectorMap({
            map: 'world_mill_en',
            normalizeFunction: 'polynomial',
            hoverOpacity: 0.7,
            hoverColor: false,
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: 'rgba(210, 214, 222, 1)',
                    "fill-opacity": 1,
                    stroke: 'none',
                    "stroke-width": 0,
                    "stroke-opacity": 1
                },
                hover: {
                    "fill-opacity": 0.7,
                    cursor: 'pointer'
                },
                selected: {
                    fill: 'yellow'
                },
                selectedHover: {
                }
            },
            markerStyle: {
                initial: {
                    fill: '#00a65a',
                    stroke: '#111'
                }
            },
            markers: [
            <?php foreach($query as $row){?>
                {latLng: [<?php echo $row->gps?>], name: '<?php echo $row->name?>'},
            <?php }?>
            ]
        });
    });

    //------------Monthly Recap Report--------------------//
    $(function(){
        var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var salesChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Digital Goods",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };

        var salesChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            //
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };

        salesChart.Line(salesChartData, salesChartOptions);

    });

</script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/plugins/knob/jquery.knob.js"></script>


<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>



</body>
</html>
