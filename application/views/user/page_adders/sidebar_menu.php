<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php
               $menu_m = explode(",",$main_menu);

            if( $menu_m[0] == "dashboard" && $menu_m[1] == "dash") {?>

                                <li class="treeview active">
                                    <a href="<?=site_url('user/dashboard')?>">
                                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                </li>

                                <li class="treeview">
                                    <a href="<?=site_url('user/add_shipment')?>">
                                        <i class="fa fa-cart-plus"></i> <span>New Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-level-up"></i> <span>Outgoing Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">

                                        <li><a href="<?=site_url('user/view_shipment')?>"><i class="fa fa-circle-o"></i> Outgoing Consignment</a></li>
                                        <li><a href="<?=site_url('user/out_shipment_status_cntl')?>"><i class="fa fa-circle-o"></i> Outgoing Consignment Status</a></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-level-down"></i> <span>Incoming Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">

                                        <li><a href="<?=site_url('user/list_shipment')?>"><i class="fa fa-circle-o"></i> Incoming Consignment</a></li>
                                        <li><a href="<?=site_url('user/shipment_status_cntl')?>"><i class="fa fa-circle-o"></i> Incoming Consignment Status</a></li>

                                    </ul>
                                </li>

                    <?php } else if($menu_m[0] == "add" && $menu_m[1] == "add_ship") { ?>

                            <li class="treeview">
                                <a href="<?=site_url('user/dashboard')?>">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                            </li>

                            <li class="treeview active">
                                <a href="<?=site_url('user/add_shipment')?>">
                                    <i class="fa fa-cart-plus"></i> <span>New Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="fa fa-level-up"></i> <span>Outgoing Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">

                                    <li><a href="<?=site_url('user/view_shipment')?>"><i class="fa fa-circle-o"></i> Outgoing Consignment</a></li>
                                    <li><a href="<?=site_url('user/out_shipment_status_cntl')?>"><i class="fa fa-circle-o"></i> Outgoing Consignment Status</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-level-down"></i> <span>Incoming Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">

                                    <li><a href="<?=site_url('user/list_shipment')?>"><i class="fa fa-circle-o"></i> Incoming Consignment</a></li>
                                    <li><a href="<?=site_url('user/shipment_status_cntl')?>"><i class="fa fa-circle-o"></i> Incoming Consignment Status</a></li>

                                </ul>
                            </li>

            <?php } else if($menu_m[0] == "out") { ?>

            <li class="treeview">
                <a href="<?=site_url('user/dashboard')?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="<?=site_url('user/add_shipment')?>">
                    <i class="fa fa-cart-plus"></i> <span>New Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

              <?php if($menu_m[1] == "view_ship") {?>
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-level-up"></i> <span>Outgoing Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">

                            <li class="active"><a href="<?=site_url('user/view_shipment')?>"><i class="fa fa-circle-o"></i> Outgoing Consignment</a></li>
                            <li><a href="<?=site_url('user/out_shipment_status_cntl')?>"><i class="fa fa-circle-o"></i> Outgoing Consignment Status</a></li>

                        </ul>
                    </li>
                <?php } else { ?>

                    <li class="active">
                        <a href="#">
                            <i class="fa fa-level-up"></i> <span>Outgoing Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu active">

                            <li><a href="<?=site_url('user/view_shipment')?>"><i class="fa fa-circle-o"></i> Outgoing Consignment</a></li>
                            <li class="active"><a href="<?=site_url('user/out_shipment_status_cntl')?>"><i class="fa fa-circle-o"></i> Outgoing Consignment Status</a></li>

                        </ul>
                    </li>
                    <?php } ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-level-down"></i> <span>Incoming Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">

                                    <li><a href="<?=site_url('user/list_shipment')?>"><i class="fa fa-circle-o"></i> Incoming Consignment</a></li>
                                    <li><a href="<?=site_url('user/shipment_status_cntl')?>"><i class="fa fa-circle-o"></i> Incoming Consignment Status</a></li>

                                </ul>
                            </li>

           <?php } else if($menu_m[0] == "in") { ?>

            <li class="treeview">
                <a href="<?=site_url('user/dashboard')?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="<?=site_url('user/add_shipment')?>">
                    <i class="fa fa-cart-plus"></i> <span>New Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>


                            <li class="">
                                <a href="#">
                                    <i class="fa fa-level-up"></i> <span>Outgoing Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">

                                    <li><a href="<?=site_url('user/view_shipment')?>"><i class="fa fa-circle-o"></i> Outgoing Consignment</a></li>
                                    <li><a href="<?=site_url('user/out_shipment_status_cntl')?>"><i class="fa fa-circle-o"></i> Outgoing Consignment Status</a></li>

                                </ul>
                            </li>

                            <li class="active">
                                <a href="#">
                                    <i class="fa fa-level-down"></i> <span>Incoming Consignment</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                     <?php   if($menu_m[1] == "list_ship") { ?>

                                   <li  class="active"><a href="<?=site_url('user/list_shipment')?>"><i class="fa fa-circle-o"></i> Incoming Consignment</a></li>
                                    <li><a href="<?=site_url('user/shipment_status_cntl')?>"><i class="fa fa-circle-o"></i> Incoming Consignment Status</a></li>


                    <?php } else if($menu_m[1] == "ship_stat") { ?>

                                    <li ><a href="<?=site_url('user/list_shipment')?>"><i class="fa fa-circle-o"></i> Incoming Consignment</a></li>
                                    <li class="active"><a href="<?=site_url('user/shipment_status_cntl')?>"><i class="fa fa-circle-o"></i> Incoming Consignment Status</a></li>



                    <?php } ?>

                                </ul>

                    </li>
                <?php   } ?>

    </section>
    <!-- /.sidebar -->
</aside>