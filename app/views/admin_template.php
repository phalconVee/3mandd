<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$meta_title?></title>

    <script type="text/javascript">
        var domain = "<?php echo base_url();?>";
    </script>

    <!-- Bootstrap -->
    <link href="<?=base_url();?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url();?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url();?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=base_url();?>assets/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?=base_url();?>assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?=base_url();?>assets/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?=base_url();?>assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="<?=base_url();?>assets/admin/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/admin/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/admin/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url();?>assets/admin/build/css/custom.min.css" rel="stylesheet">
</head>

<style>
    .privacy_loader {
        background: url('<?=base_url();?>assets/theme/images/gif/fs-boxer-loading.gif') no-repeat;
        background-size: 15px;
        float: right;
        width: 15px;
        height: 15px;
        margin-top: 1px;
    }
</style>


<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!--add sidebar here-->
        <?php $this->load->view($sidebar);?>
        <!--end sidebar-->

        <!--add top navigation here-->
        <?php $this->load->view($top_nav);?>
        <!--end top nav-->

        <!-- page content -->
        <?php $this->load->view($page_content);?>
        <!--end page content -->

        <!--add footer here -->
        <?php $this->load->view($footer);?>
        <!--end footer -->

    </div>
</div>

</body>
</html>