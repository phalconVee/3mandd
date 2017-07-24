<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout</title>

    <script type="text/javascript">
        var domain = "<?php echo base_url();?>";
    </script>

    <script src="<?=base_url();?>assets/theme/js/jquery.js"></script>

    <script>
        jQuery(function(){
            jQuery('#submit').click();
        });
    </script>


    <link href="<?=base_url();?>assets/theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/price-range.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/animate.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/main.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/responsive.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/theme/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="<?=base_url();?>assets/theme/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url();?>assets/theme/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url();?>assets/theme/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url();?>assets/theme/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url();?>assets/theme/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="<?=base_url();?>"><img src="<?=base_url();?>assets/theme/images/icon/checkout_icon.png" alt="checkout-icon" /></a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>
                                    <b style="font-size: 18px;">NEED HELP? CALL US!</b> <span>0700 600 0000/01 460 4400</span>

                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-star"></i>Secure Payment</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->


</header><!--/header-->


<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-12">

                <div class="alert-danger">
                    <h2>Your payment Failed to process.</h2>
                    <p>Please go back to cart and try again .</p>
                    <p><a class="btn btn-primary" href="<?=base_url();?>">Go back to store</a> </p>
                </div>

            </div>

        </div>
    </div>
</section>

<div>&nbsp;</div>
<div>&nbsp;</div>


</body>
</html>