<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?=base_url();?>admin/" class="site_title"><i class="fa fa-paw"></i> <span>3m&amp;d</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?=base_url();?>assets/admin/production/images/img.jpg" alt="..." class="img-circle profile_img">
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
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li class="<?php echo ($navigation == 'dashboard') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>admin/"><i class="fa fa-home"></i> Home</a>
                    </li>

                    <li><a><i class="fa fa-users"></i> Customers <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="<?php echo ($navigation == 'customers') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>admin/admin_customer/">View All Customers</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-truck"></i>Distributors <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="<?php echo ($navigation == 'distributors') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>admin/admin_distributor/">View All Distributor</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-clone"></i> Categories <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="<?php echo ($navigation == 'categories') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>admin/admin_categories">View Categories</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-desktop"></i> Brands <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li  class="<?php echo ($navigation == 'brands') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>admin/admin_brands/">View Brands</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-table"></i> Products <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="<?php echo ($navigation == 'products') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>admin/admin_products/">View All Products</a></li>
                            <li class="<?php echo ($navigation == 'add_products') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>admin/admin_products/create/">Add New Products</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-list-alt"></i> Sales <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="<?php echo ($navigation == 'orders') ? 'active' : 'not_active'?>"><a href="<?=base_url();?>admin/admin_orders/">Order</a></li>
                            <li><a href="<?=base_url();?>admin/products/add_products/">Invoices</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-envelope"></i> Mail <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=base_url();?>admin/products/">Inbox</a></li>
                            <li><a href="<?=base_url();?>admin/products/add_products/">Compose</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-cog"></i> All Settings <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="e_commerce.html">E-commerce</a></li>
                            <li><a href="projects.html">Projects</a></li>
                            <li><a href="project_detail.html">Project Detail</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="profile.html">Profile</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> System <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="page_403.html">403 Error</a></li>
                            <li><a href="page_404.html">404 Error</a></li>
                            <li><a href="page_500.html">500 Error</a></li>
                            <li><a href="plain_page.html">Plain Page</a></li>
                            <li><a href="login.html">Login Page</a></li>
                            <li><a href="pricing_tables.html">Pricing Tables</a></li>
                        </ul>
                    </li>


                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a href="<?=base_url();?>admin/settings" data-toggle="tooltip" data-placement="top" title="Settings">
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