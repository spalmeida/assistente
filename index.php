<!DOCTYPE html>
<?php 
require_once("controller/system.php");
$busca->VerifySession();


 ?>


<html lang="en" class="default-style">

<head>
  <title><?=$assistente[0]['assistente_name']; ?></title>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta name="description" content="Responsive Admin Template" />
  <meta name="author" content="SmartUniversity" />

  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

  <!-- Icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css">
  <link rel="stylesheet" href="assets/vendor/fonts/ionicons.css">
  <link rel="stylesheet" href="assets/vendor/fonts/linearicons.css">
  <link rel="stylesheet" href="assets/vendor/fonts/open-iconic.css">
  <link rel="stylesheet" href="assets/vendor/fonts/pe-icon-7-stroke.css">

  <!-- Core stylesheets -->
  <link rel="stylesheet" href="assets/vendor/css/rtl/bootstrap.css" class="theme-settings-bootstrap-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/appwork.css" class="theme-settings-appwork-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/theme-corporate.css" class="theme-settings-theme-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/colors.css" class="theme-settings-colors-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/uikit.css">

  <!--css/demo/-->
  <link rel="stylesheet" href="assets/css/demo.css">

    <!-- Libs -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="assets/vendor/libs/datatables/datatables.css">
  <link rel="stylesheet" href="assets/vendor/libs/bootstrap-markdown/bootstrap-markdown.css">
  <link rel="stylesheet" href="assets/vendor/libs/quill/typography.css">
  <link rel="stylesheet" href="assets/vendor/libs/quill/editor.css">
  <link rel="stylesheet" href="assets/vendor/libs/nouislider/nouislider.css">
  <link rel="stylesheet" href="assets/vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.css">
  <link rel="stylesheet" href="assets/vendor/libs/smartwizard/smartwizard.css">
  <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css">
  <link rel="stylesheet" href="assets/vendor/css/pages/chat.css">
  <link rel="stylesheet" href="assets/vendor/libs/swiper/swiper.css">
  <link rel="stylesheet" href="assets/vendor/libs/spinkit/spinkit.css">


</head>

<body>
  <div class="page-loader">
    <div class="bg-primary"></div>
  </div>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-2">
    <div class="layout-inner">

      <!-- Layout sidenav -->
      <?php require_once("includes/menu.php"); ?>
      <!-- / Layout sidenav -->

      <!-- Layout container -->
      <div class="layout-container">
        <!-- Layout navbar -->
        <?php require_once("includes/header.php"); ?>
        <!-- / Layout navbar -->

    <?php
    $url = (isset($_GET['url'])) ? $_GET['url']:'page/inicio';
    $url = array_filter(explode('/',$url));

    $file = 'page/'.$url[0].'.php';

    if(is_file($file)){
        require_once($file);
    }else{
        require_once("page/inicio.php");
    }            
    ?>

      </div>
      <!-- / Layout container -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-sidenav-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

    <!-- Core scripts -->
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/js/sidenav.js"></script>
  <script src="assets/vendor/js/theme-settings.js"></script>
  <script src="assets/vendor/js/pace.js"></script>



    <!-- Libs -->
  <script src="assets/vendor/libs/datatables/datatables.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="assets/vendor/libs/chartjs/chartjs.js"></script>
  <script src="assets/vendor/libs/numeral/numeral.js"></script>
  <script src="assets/vendor/libs/nouislider/nouislider.js"></script>
  <script src="assets/vendor/libs/bootbox/bootbox.js"></script>
  <script src="assets/vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.js"></script>
  <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="assets/vendor/libs/block-ui/block-ui.js"></script>
  <script src="assets/vendor/libs/swiper/swiper.js"></script>
  <script src="assets/vendor/libs/autosize/autosize.js"></script>
  <script src="assets/vendor/js/layout-helpers.js"></script>

  <!-- Demo -->
  <script src="assets/js/demo.js"></script>
  <script src="assets/js/tables_datatables.js"></script>
  <script src="assets/js/ui_modals.js"></script>
  <script src="assets/js/forms_wizard.js"></script>
  <script src="assets/vendor/libs/smartwizard/smartwizard.js"></script>
  <script src="assets/vendor/libs/validate/validate.js"></script>
  <script src="assets/js/pages_chat.js"></script>
  <script src="assets/js/misc_blockui.js"></script>  
  <script src="assets/js/ui_carousel.js"></script>
  <script src="assets/vendor/js/material-ripple.js"></script>
  <script src="assets/js/forms_extras.js"></script>
  <script src="assets/vendor/libs/markdown/markdown.js"></script>
  <script src="assets/vendor/libs/bootstrap-markdown/bootstrap-markdown.js"></script>
  <script src="assets/js/forms_editors.js"></script>
  <script src="assets/js/dashboards_dashboard-1.js"></script>
  <script src="assets/assistente/db.js"></script>

</body>

</html>