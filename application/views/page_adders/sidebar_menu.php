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

            if($menu_m[0] == "dashboard") {?>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">

                     <?php switch($menu_m[1]) {
                        case "dash" :    echo "<li class=\"active\"><a href=\"".site_url('admin/dashboard')."\"><i class=\"fa fa-circle-o text-red\"></i> Dashboard</a></li>";
                                         echo "<li><a href=\"".site_url('admin/create_user')."\"><i class=\"fa fa-circle-o\"></i>Create User</a></li>";
                                         break;
                        case "user" :    echo "<li ><a href=\"".site_url('admin/dashboard')."\"><i class=\"fa fa-circle-o\"></i> Dashboard</a></li>";
                                         echo "<li class=\"active\"><a href=\"".site_url('admin/create_user')."\"><i class=\"fa fa-circle-o text-red\"></i>Create User</a></li>";
                                         break;

                    }
                    ?>

                    </ul>
                </li>

                <!-- Settomgs -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-gears"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=site_url('admin/location_cont')?>"><i class="fa fa-circle-o"></i> Location</a></li>
                        <li><a href="<?=site_url('admin/driver_cont')?>"><i class="fa fa-circle-o"></i>Create Driver</a></li>
                        <li><a href="<?=site_url('admin/truck_cont')?>"><i class="fa fa-circle-o"></i>Add Truck</a></li>
                        <li><a href="<?=site_url('admin/status_cont')?>"><i class="fa fa-circle-o"></i>Consignment Status</a></li>
                        <li><a href="<?=site_url('admin/materials_cntl')?>"><i class="fa fa-circle-o"></i>Add Materials</a></li>
                    </ul>
                </li>

            <?php } else {?>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="<?=site_url('admin/dashboard')?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                        <li><a href="<?=site_url('admin/create_user')?>"><i class="fa fa-circle-o"></i>Create User</a></li>

                    </ul>
                </li>

                <!-- Settomgs -->
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-gears"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php switch($menu_m[1]) {

                        case "loc" :    echo "<li class=\"active\"><a href=\"".site_url('admin/location_cont')."\"><i class=\"fa fa-circle-o text-red\"></i> Location</a></li>";
                                        echo "<li><a href=\"".site_url('admin/driver_cont')."\"><i class=\"fa fa-circle-o\"></i> Create Driver</a></li>";
                                        echo "<li><a href=\"".site_url('admin/truck_cont')."\"><i class=\"fa fa-circle-o\"></i> Add Truck</a></li>";
                                        echo "<li><a href=\"".site_url('admin/status_cont')."\"><i class=\"fa fa-circle-o\"></i> Consignment Status</a></li>";
                                        echo "<li><a href=\"".site_url('admin/materials_cntl')."\"><i class=\"fa fa-circle-o\"></i> Add Materials</a></li>";
                                        break;

                        case "driver" :   echo "<li ><a href=\"".site_url('admin/location_cont')."\"><i class=\"fa fa-circle-o\"></i> Location</a></li>";
                                          echo "<li class=\"active\"><a href=\"".site_url('admin/driver_cont')."\"><i class=\"fa fa-circle-o text-red\"></i> Create Driver</a></li>";
                                          echo "<li><a href=\"".site_url('admin/truck_cont')."\"><i class=\"fa fa-circle-o\"></i> Add Truck</a></li>";
                                          echo "<li><a href=\"".site_url('admin/status_cont')."\"><i class=\"fa fa-circle-o\"></i> Consignment Status</a></li>";
                                          echo "<li><a href=\"".site_url('admin/materials_cntl')."\"><i class=\"fa fa-circle-o\"></i> Add Materials</a></li>";
                                          break;

                        case "truck" :    echo "<li ><a href=\"".site_url('admin/location_cont')."\"><i class=\"fa fa-circle-o\"></i> Location</a></li>";
                                          echo "<li ><a href=\"".site_url('admin/driver_cont')."\"><i class=\"fa fa-circle-o\"></i> Create Driver</a></li>";
                                          echo "<li class=\"active\"><a href=\"".site_url('admin/truck_cont')."\"><i class=\"fa fa-circle-o text-red\"></i> Add Truck</a></li>";
                                         echo "<li><a href=\"".site_url('admin/status_cont')."\"><i class=\"fa fa-circle-o\"></i> Consignment Status</a></li>";
                                         echo "<li><a href=\"".site_url('admin/materials_cntl')."\"><i class=\"fa fa-circle-o\"></i> Add Materials</a></li>";
                                        break;

                        case "status" :  echo "<li ><a href=\"".site_url('admin/location_cont')."\"><i class=\"fa fa-circle-o\"></i> Location</a></li>";
                                         echo "<li ><a href=\"".site_url('admin/driver_cont')."\"><i class=\"fa fa-circle-o\"></i> Create Driver</a></li>";
                                         echo "<li><a href=\"".site_url('admin/truck_cont')."\"><i class=\"fa fa-circle-o\"></i> Add Truck</a></li>";
                                         echo "<li class=\"active\"><a href=\"".site_url('admin/status_cont')."\"><i class=\"fa fa-circle-o text-red\"></i> Consignment Status</a></li>";
                                         echo "<li><a href=\"".site_url('admin/materials_cntl')."\"><i class=\"fa fa-circle-o\"></i> Add Materials</a></li>";
                                          break;

                        case "mat" :     echo "<li ><a href=\"".site_url('admin/location_cont')."\"><i class=\"fa fa-circle-o\"></i> Location</a></li>";
                                         echo "<li ><a href=\"".site_url('admin/driver_cont')."\"><i class=\"fa fa-circle-o\"></i> Create Driver</a></li>";
                                         echo "<li><a href=\"".site_url('admin/truck_cont')."\"><i class=\"fa fa-circle-o\"></i> Add Truck</a></li>";
                                         echo "<li><a href=\"".site_url('admin/status_cont')."\"><i class=\"fa fa-circle-o\"></i> Consignment Status</a></li>";
                                         echo "<li class=\"active\"><a href=\"".site_url('admin/materials_cntl')."\"><i class=\"fa fa-circle-o text-red\"></i> Add Materials</a></li>";

                                          break;
                    }
                        ?>



                    </ul>
                </li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>