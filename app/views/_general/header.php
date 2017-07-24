
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +234 816 660 1864</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@3m&amp;d.ng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-globe"></i>Become a Distributor</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?=base_url();?>"><img src="<?=base_url('assets/theme/images/icon/brand-icon.png');?>" alt="" /></a>
                    </div>


                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="<?=base_url('customers/account/');?>"><i class="fa fa-user"></i> Account</a></li>

                            <li><a href="javascript:void(0);" class="view_cart" ><i class="fa fa-shopping-cart"></i> Cart (<span id="total_items"><?=count($this->cart->contents()); ?></span>) </a></li>

                            <?php if(!empty($_SESSION['w3_user_id'])) { ?>
                                <li><a href="<?=base_url('login/logout');?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                <li><button class="btn btn-default cart"> Hi! <?=$_SESSION['w3_uname'];?></button></li>
                            <?php }else{ ?>
                                <li><a href="<?=base_url('login/');?>"><i class="fa fa-lock"></i> Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?=base_url();?>" class="active">Home</a></li>

                            <li class="dropdown"><a href="#">Lager<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=base_url();?>">Star</a></li>
                                    <li><a href="<?=base_url();?>">Gulder</a></li>
                                    <li><a href="<?=base_url();?>">Life</a></li>
                                    <li><a href="<?=base_url();?>">Heineken</a></li>
                                    <li><a href="<?=base_url();?>">Star Tripplex</a></li>
                                    <li><a href="<?=base_url();?>">33 Lager</a></li>
                                    <li><a href="<?=base_url();?>">Goldberg</a></li>
                                </ul>
                            </li>

                            <li class="dropdown"><a href="#">Stout<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=base_url();?>">Legend</a></li>
                                    <li><a href="<?=base_url();?>">Turbo King</a></li>

                                </ul>
                            </li>

                            <li class="dropdown"><a href="#">Malt<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=base_url();?>">Maltina</a></li>
                                    <li><a href="<?=base_url();?>">Amstel Malta</a></li>
                                    <li><a href="<?=base_url();?>">Hi-Malt</a></li>
                                    <li><a href="<?=base_url();?>">Maltex</a></li>

                                </ul>
                            </li>


                            <li class="dropdown"><a href="#">Cider<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=base_url();?>">Strongbow</a></li>
                                    <li><a href="<?=base_url();?>">Breezer</a></li>

                                </ul>
                            </li>

                            <li class="dropdown"><a href="#">Carbonated Drink<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=base_url();?>">Fayrouz</a></li>

                                </ul>
                            </li>

                            <li class="dropdown"><a href="#">Energy Drink<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=base_url();?>">Climax</a></li>
                                    <li><a href="<?=base_url();?>">Ace-rhythm</a></li>
                                </ul>
                            </li>

                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=base_url();?>">Blog List</a></li>
                                    <li><a href="<?=base_url();?>">Blog Single</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->