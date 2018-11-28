<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">

          <!-- Brand demo (see assets/css/demo/demo.css) -->
          <a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
            <span class="app-brand-logo demo bg-primary">
             <img src="assets/img/avatars/5.png" width="40px">
            </span>
            <span class="app-brand-text demo font-weight-normal ml-2"><?=$assistente[0]['assistente_name']; ?></span>
          </a>

          <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
          <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
            <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:void(0)">
              <i class="ion ion-md-menu text-large align-middle"></i>
            </a>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="navbar-collapse collapse" id="layout-navbar-collapse">
            <!-- Divider -->
            <hr class="d-lg-none w-100 my-2">

            

            <div class="navbar-nav align-items-lg-center ml-auto">
              

          

              <div class="demo-navbar-user nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                  <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                    <img src="assets/img/avatars/1.png" alt class="d-block ui-w-30 rounded-circle">
                    <span class="px-1 mr-lg-2 ml-2 ml-lg-0"><?=$system_user['0']['user_name']; ?></span>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="javascript:void(0)" class="dropdown-item"><i class="ion ion-ios-person text-lightest"></i> &nbsp; My profile</a>
                  <a href="javascript:void(0)" class="dropdown-item"><i class="ion ion-ios-mail text-lightest"></i> &nbsp; Messages</a>
                  <a href="javascript:void(0)" class="dropdown-item"><i class="ion ion-md-settings text-lightest"></i> &nbsp; Account settings</a>
                  <div class="dropdown-divider"></div>
                  <a href="sair.php" class="dropdown-item"><i class="ion ion-ios-log-out text-danger"></i> &nbsp; SAIR</a>
                </div>
              </div>
            </div>
          </div>
        </nav>