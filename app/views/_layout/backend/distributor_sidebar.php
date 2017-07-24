<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?=base_url('distributor');?>distributor/" class="site_title"><img src="<?=base_url();?>assets/theme/images/icon/icon.png" alt="" /> <span>3mandd</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?=base_url();?>assets/admin/production/images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$_SESSION['w3_admin_fname']?>&nbsp; <?=$_SESSION['w3_admin_lname'];?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Warehouse</h3>
                <ul class="nav side-menu">
                    <li class="<?php echo ($navigation == 'dashboard') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>distributor/warehouse"><i class="fa fa-home"></i> Home</a>
                    </li>

                    <li><a><i class="fa fa-users"></i> My Customers <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="<?php echo ($navigation == 'my_customers') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>distributor/distributor_customer/">View Customers</a></li>
                            <li class="<?php echo ($navigation == 'add_customers') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>distributor/distributor_customer/add_customers">Add New Customer</a></li>

                        </ul>
                    </li>

                    <li><a><i class="fa fa-table"></i> My Store <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="<?php echo ($navigation == 'my_store') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>distributor/distributor_products/">View Warehouse</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-list-alt"></i> Sales <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="<?php echo ($navigation == 'orders_request') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>distributor/message/">Order requests</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-envelope"></i> Mail <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=base_url();?>distributor/products/">Inbox</a></li>
                            <li><a href="<?=base_url();?>distributor/products/add_products/">Compose</a></li>
                        </ul>
                    </li>

                </ul>
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a href="<?=base_url();?>distributor/settings" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a href="<?=base_url();?>admin/logout" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>