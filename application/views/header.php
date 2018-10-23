<!DOCTYPE html>
<html lang="en">
  <head>
     <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Concremag
  </title>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Concremag</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"></a>
      <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?php echo base_url()?>usuario/editar/<?php  ?>"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url()?>login/cerrar"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">



     <ul class="app-menu">
      <li class="treeview"><a class="app-menu__item <?php if($selected=="Muestras") echo "active"?>" href="#" data-toggle="treeview">      <i class="app-menu__icon fa fa-database fa-lg"></i><span class="app-menu__label">Muestras</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu ">
            <li><a class="treeview-item" href="<?php echo base_url();?>muestra/listar"><i class="icon fa fa-circle-o"></i> Buscar</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>muestra/nuevo/hormigon"><i class="icon fa fa-circle-o"></i> Ingresar Muestra Hormigón</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>muestra/nuevo/prefabricado"><i class="icon fa fa-circle-o"></i> Ingresar Muestra Prefabricado</a></li>
        </ul>
      </li>
      <li><a class="app-menu__item <?php if($selected=="prefabricado") echo "active"?>" href="<?php echo base_url();?>prefabricado\listar">   
        <i class="app-menu__icon fa fa-calendar fa-lg"></i><span class="app-menu__label">Informes</span></a>
      </li>
        <li class="treeview"><a class="app-menu__item <?php if($selected=="Administración") echo "active"?>" href="#" data-toggle="treeview">      <i class="app-menu__icon fa fa-cog fa-lg"></i><span class="app-menu__label">Administración</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu ">
            <li><a class="treeview-item" href="<?php echo base_url();?>aditivo/listar"><i class="icon fa fa-circle-o"></i> Aditivos</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>camion/listar"><i class="icon fa fa-circle-o"></i> Camiones</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>cemento/listar"><i class="icon fa fa-circle-o"></i> Cementos</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>cliente/listar"><i class="icon fa fa-circle-o"></i> Clientes</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>hormigon/listar"><i class="icon fa fa-circle-o"></i> Hormigones</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>obra/listar"><i class="icon fa fa-circle-o"></i> Obras</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>planta/listar"><i class="icon fa fa-circle-o"></i> Plantas</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>prensa/listar"><i class="icon fa fa-circle-o"></i> Prensas</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>usuario/listar"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
            
          </ul>
        </li>
      </ul>
    </aside>