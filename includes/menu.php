<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

  <!-- Brand demo (see assets/css/demo/demo.css) -->
  <div class="app-brand demo">
   <img src="assets/img/avatars/5.png" width="40px">
   <a href="inicio" class="app-brand-text demo sidenav-text font-weight-normal ml-2"><?=$assistente[0]['assistente_name']; ?></a>
   <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
    <i class="ion ion-md-menu align-middle"></i>
  </a>
</div>

<div class="sidenav-divider m-0" style="padding: 10px" align="center">
<div>MOEDAS</div> <img src="assets/img/gold.png" width="20px"> <b class="text-success"> <?=$system_user[0]['user_points'] ?> </b>
</div>

<!-- Links -->
<ul class="sidenav-inner py-1">

  <!-- Dashboards -->

  <li class="sidenav-item active">
    <a href="inicio" class="sidenav-link">
      <i class="sidenav-icon far fa-comments"></i><div>INICIO</div>
    </a>
  </li>

  <li class="sidenav-item">
    <a href="configuracoes" class="sidenav-link">
      <i class="sidenav-icon fas fa-cog"></i><div>CONFIGURAÇÕES</div>
    </a>
  </li>

    <li class="sidenav-item">
    <a href="votacao" class="sidenav-link">
      <i class="sidenav-icon far fa-thumbs-up"></i><div>VOTAÇÃO</div>
    </a>
  </li>

    <li class="sidenav-item">
    <a href="perguntas_status" class="sidenav-link">
      <i class="sidenav-icon fas fa-stream"></i><div>PEGUNTAS STATUS</div>
    </a>
  </li>




</ul>


<!-- Layouts -->


</ul>
</div>