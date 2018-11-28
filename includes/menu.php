<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

  <!-- Brand demo (see assets/css/demo/demo.css) -->
  <div class="app-brand demo">
   <img src="assets/img/avatars/5.png" width="40px">
   <a href="index.html" class="app-brand-text demo sidenav-text font-weight-normal ml-2"><?=$assistente[0]['assistente_name']; ?></a>
   <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
    <i class="ion ion-md-menu align-middle"></i>
  </a>
</div>

<div class="sidenav-divider m-0" style="padding: 10px" align="center">
<div>COINS</div> <i class="fas fa-coins text-warning"></i> <b class="text-success"> <?=$system_user[0]['user_points'] ?> </b>
</div>

<!-- Links -->
<ul class="sidenav-inner py-1">

  <!-- Dashboards -->

  <li class="sidenav-item active">
    <a href="inicio" class="sidenav-link">
      <div>INICIO</div>
    </a>
  </li>

  <li class="sidenav-item">
    <a href="configuracoes" class="sidenav-link">
      <div>CONFIGURAÇÕES</div>
    </a>
  </li>

    <li class="sidenav-item">
    <a href="perguntas_status" class="sidenav-link">
      <div>PEGUNTAS STATUS</div>
    </a>
  </li>




</ul>


<!-- Layouts -->


</ul>
</div>