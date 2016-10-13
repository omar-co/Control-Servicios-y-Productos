<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <!-- heder -->
    <?php $this->load->view('base/header_view'); ?>
    <!-- header end -->
</head>
<body id="pixel" class="appWrapper">
<!-- Begin page -->
    <div id="wrap" class="animsition">
            <?php

            $this->load->view('base/navbar_view');

            if ($this->ion_auth->logged_in()) {
                $this->load->view('base/menu_view');
            }
            ?>

            <!-- content -->
            <?php  $this->load->view($view); ?>
            <!-- content end -->

    </div>
    <!-- footer -->
    <?php $this->load->view('base/footer_view'); ?>
    <!-- footer end -->


</body>
</html>