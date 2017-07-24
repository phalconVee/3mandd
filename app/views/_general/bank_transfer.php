<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$meta_title;?></title>

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
<?php $this->load->view($header);?>

<section>
    <div class="container">
        <div class="row">

            <div align="center">
                <h2 style="color: #272f6d;">That was great</h2>
                <p>Your order was received. Please check your mail for your order confirmation.</p>
                <p>You will receive updates as we process your order. Thank you for choosing 3mandd.</p>
            </div>

            <div>&nbsp;</div>
            <div>&nbsp;</div>

            <div class="col-sm-6">
                <div class='alert-success' style='padding: 10px;'>
                 <h3>Bank Transfer Request Received</h3>
                    <p>Your transaction reference is : <strong><?=$transaction_ref?></strong></p>
                    <p>Your order # is : <strong><?=$order_no?></strong></p>
                    <p>Amount due is : <strong>&#x20a6;<?=number_format($amount, 2);?></strong></p>
                    <p>Please notify us at info@3mandd.com once transfer has been completed to enable us process your order</p>
                </div>

            </div>

            <div class="col-sm-6">
                <div class='alert-info' style='padding: 10px;'>
                    <p>Pay into any of the following bank accounts</p>
                        <h3 style="color: #4168c6;">Stanbic IBTC Bank:</h3>
                        <p><strong>Account Name:</strong> 3mandd Ltd</p>
                        <p><strong>Account Number:</strong> xxx-xxx-xxxx</p>


                        <h3 style="color: rgb(204,51,0);">Guaranty Trust Bank:</h3>
                        <p><strong>Account Name:</strong> 3mandd Ltd</p>
                        <p><strong>Account Number:</strong> xxx-xxx-xxxx</p>

                </div>

            </div>


        </div>
    </div>
</section>


<div>&nbsp;</div>
<div>&nbsp;</div>

<?php $this->load->view($footer);?>
</body>
</html>