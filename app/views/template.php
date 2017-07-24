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

<style>

    /* Pagination */
    div.pagination {
        padding:2px;
        margin: 20px 10px;
        float: right;
    }

    div.pagination a {
        margin: 2px;
        padding: 0.5em 0.64em 0.43em 0.64em;
        background-color: #272f6d;
        text-decoration: none; /* no underline */
        color: #fff;
    }
    div.pagination a:hover, div.pagination a:active {
        padding: 0.5em 0.64em 0.43em 0.64em;
        margin: 2px;
        background-color: #272f6d;
        color: #fff;
    }
    div.pagination span.current {
        padding: 0.5em 0.64em 0.43em 0.64em;
        margin: 2px;
        background-color: #f6efcc;
        color: #6d643c;
    }
    div.pagination span.disabled {
        display:none;
    }
    .pagination ul li{display: inline-block;}
    .pagination ul li a.active{opacity: .5;}

    /* loading */
    .loading{position: absolute;left: 0; top: 0; right: 0; bottom: 0;z-index: 2;background: rgba(255,255,255,0.7);}
    .loading .content {
        position: absolute;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        top: 50%;
        left: 0;
        right: 0;
        text-align: center;
        color: #555;

</style>
<body>

<!--1. add header here-->
<?php $this->load->view($header);?>
<!--end header-->

<!--2. add slider menu if exists-->
<?php if(!empty($slider)){ ?>

    <?php $this->load->view($slider);?>

<?php } ?>
<!--end slider menu-->

<section>
    <div class="container">
        <div class="row">
            <?php if(!empty($navigation) && !empty($page_content)){ ?>

            <?php if(!empty($left_sidebar)){ ?>

            <div class="col-sm-3">
                <!--Call sidebar (left sidebar or account sidebar) here if exists-->
                <?php $this->load->view($left_sidebar);?>
            </div>

                <?php } ?>

            <div class="col-sm-9 padding-right">
                <!--page content (featured_items)-->
                <?php $this->load->view($page_content);?>
                <!--end page content-->


                <!--recommended_items-->
                <?php if(!empty($recommended_items)){ ?>
                    <?php $this->load->view($recommended_items);?>
                <?php } ?>
               <!--end recommended items-->

            </div>

            <?php } ?>

        </div>
    </div>
</section>

<div>&nbsp;</div>
<div>&nbsp;</div>



<!--add footer here-->
<?php $this->load->view($footer);?>
<!--end footer-->

</body>
</html>