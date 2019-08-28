<?php
require_once("controller/system.php");
$busca->VerifyLogin();
?>

<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>Login - Assistente</title>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
<link rel="icon" href="assets/favicon.ico" type="image/x-icon">

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
  <link rel="stylesheet" href="assets/css/demo.css">

  <script src="assets/vendor/js/material-ripple.js"></script>
  <script src="assets/vendor/js/layout-helpers.js"></script>

  <!-- Theme settings -->
  <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
    <script src="assets/vendor/js/theme-settings.js"></script>

    <!-- Core scripts -->
    <script src="assets/vendor/js/pace.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Libs -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/authentication.css">
  </head>

  <body>
    <div class="page-loader">
      <div class="bg-primary"></div>
    </div>

    <!-- Content -->

    <div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4" style="background-image: url('assets/img/bg/1.jpg');">
      <div class="ui-bg-overlay bg-dark opacity-25"></div>

      <div class="authentication-inner py-5">

        <div class="card">
          <div class="p-4 p-sm-5">
            <!-- Logo -->
            <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
              <div class="ui-w-50">
                <img src="assets/img/avatars/5.png" width="100%">
              </div>
            </div>
            <!-- / Logo -->

            <h5 class="text-center text-muted font-weight-normal mb-4">INFORME SEUS DADOS</h5>

            <!-- Form -->
            <form action="exe/verify.php" method="post">
              <div class="form-group">
                <label class="form-label">Email</label>
                <input required type="email" name="user_mail" id="user_mail" class="form-control">
              </div>
              <div class="form-group">
                <label class="form-label d-flex justify-content-between align-items-end">
                  <div>Senha</div>
                </label>
                <input required name="user_pass" id="user_pass" type="password" class="form-control">
              </div>
              <div class="d-flex justify-content-between align-items-center m-0">
                <label class="custom-control custom-checkbox m-0">
                </label>
                <button type="submit" class="btn btn-primary">Entrar</button>
              </div>
            </form>
            <!-- / Form -->

          </div>
          <div class="card-footer py-3 px-4 px-sm-5">
            <div class="text-center text-muted">
              Não tem uma conta ainda? <a href="register.php">Criar Conta</a>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- / Content -->

    <!-- Core scripts -->
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/js/sidenav.js"></script>

    <!-- Libs -->
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <!-- Demo -->
    <script src="assets/js/demo.js"></script>

  </body>

  </html>