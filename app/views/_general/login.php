<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$meta_title?></title>

    <script type="text/javascript">
        var domain = "<?php echo base_url();?>";
    </script>

    <link href="<?=base_url();?>assets/theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/price-range.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/animate.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/main.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/theme/css/responsive.css" rel="stylesheet">

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

<?php $this->load->view($menu); ?>

<br/>

<h1 style="text-align: center;">Login/Register</h1>

<br/>

<!-- display global alert messages -->
<?php if(!empty($notice)) { ?><div class="alert-danger"><?php echo $notice; ?></div> <?php } ?>
<!--end global message-->

<?php if(!empty($error_msg)) { echo  "<div class='alert-danger' style='text-align: center; padding: 10px;'>$error_msg</div>"; } ?>

<?php echo validation_errors('<div class=\'alert-danger\' style=\'text-align: center; padding: 10px;\'>', '</div>'); ?>


<section id="form" style="margin-top: 10px;"><!--form-->
    <div class="container">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->

                    <h2>Login to your account</h2>

                    <form action="<?=base_url('login');?>" method="post" id="form1">

                        <input type="email" name="usr_email" placeholder="Email Address" value="<?php echo set_value('usr_email'); ?>"/> <span class="help-block"></span>
                        <input type="password" name="usr_password" placeholder="Password" /> <span class="help-block"></span>

                        <button type="submit" class="btn btn-default">Login</button>

                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>

                    <form action="<?=base_url('login/signup/');?>" method="post" id="form2">
                        <input type="text" name="u_name" placeholder="Username"/>
                        <input type="email" name="u_email" placeholder="Email Address"/>
                        <input type="password" name="u_password" placeholder="Password"/>
                        <!--<button type="submit" class="btn btn-default">Signup</button>-->

                        <input type="submit" class="btn btn-default" value="Signup"/>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->


<?php $this->load->view($footer);?>

</body>
</html>