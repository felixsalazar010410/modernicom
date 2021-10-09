<?php
if (strlen(session_id()) < 1) 
  session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MODERNICOM | www.modernicom.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/fondom.png">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

<style type="text/css">

      @media (max-width: 767px) {
        .skin-black .main-header>.logo {
    background-color: #FFF !important;
}

      }
  
  
     </style> 

  </head>
  
  <body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>MOD</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="../public/images/modernicom-6.png" style="width:185px; height:40px;"></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">


          
          

<ul class="nav navbar-nav">
    <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-users"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
         
            <button type="button" class="btn btn-white" data-toggle="modal" data-target="#myModalh">
            <i class="fa fa-user" aria-hidden="true"></i> &nbsp  BASE DE PERSONAL
              </button>
          </a>
       
      </li> -->

       

      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-sitemap"></i>
        </a>





        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
         
            <button type="button" class="btn btn-white" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-map-o"></i> &nbsp   BASE DE DATOS-SITIOS
            </button>
          </a>

      
         
      </li> -->


              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
                </a>
                
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">
                    <p>
                      <small><?php echo $_SESSION['cargo']; ?></span></small>
                    </p>
                    <p>
                      <small><?php echo $_SESSION['email']; ?></span></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                  <div class="pull-left">
                      <!-- <a href="../Vistas/usuarioC.php" class="btn btn-default btn-flat">Config</a> -->
                      <a href="../vistas/usuarioC.php" class="btn btn-default btn-flat">Config</a>
                    </div>
                    <div class="pull-right">
                      <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->

          <div class="user-panel">
                <div class="pull-left image">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" style="width: 50px; height: 50px;" alt="User Image">
                </div>
                <div class="pull-left info">
                  <p><?php echo $_SESSION['login']; ?></p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
          </div>
          <ul class="sidebar-menu">
            <li class="header"></li>
            <?php 
            if ($_SESSION['escritorio']==1)
            {
              echo '<li id="mEscritorio">
              <a href="escritorio.php">
                <i class="fa fa-tachometer"></i> <span>Escritorio</span>
              </a>
            </li>';
            }
            ?>

          
              <?php 
            if ($_SESSION['escritorio']==1 or $_SESSION['cliente_ofg']==1  )
            {
              echo '<li id="mOFG" class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>OFG</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li id="lProyecto"><a href="indexproyecto2.php"><i class="fa fa-circle-o"></i> Proyectos</a></li>
              <li id="lHadwarede"><a href="indexHadware.php"><i class="fa fa-circle-o"></i> Hardware</a></li>
              <li id="lPersonal"><a href="personal.php"><i class="fa fa-circle-o"></i> Personal</a></li>
              </ul>
            </li>';
            }
            ?>

          <?php 
            if ($_SESSION['escritorio']==1 or  $_SESSION['cliente_ultratel']==1  )
            {
              echo '<li id="mULTRATEL" class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>ULTRATEL</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li id="lProyecto2"><a href="indexproyecto3.php"><i class="fa fa-circle-o"></i> Proyectos</a></li>
              </ul>
            </li>';
            }
            ?>

      

            <?php 
            if ($_SESSION['admin']==1)
            {
              echo '<li id="mAlmacen" class="treeview">
              <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Logistica</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lArticulos"><a href="indexlogistica.php"><i class="fa fa-circle-o"></i> Almacen</a></li>
              </ul>
            </li>';
            }
            ?>


           
                        
            <?php 
            if ($_SESSION['acceso']==1)
            {
              echo '<li id="mAcceso" class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lUsuarios"><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li id="lPermisos"><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
                
              </ul>
            </li>';
            }
            ?>



            <?php  
            if ($_SESSION['acceso']==1)
            {
              echo ' <li id="mFormatoswom">
              <a href="formatos.php">
                <i class="fa fa-plus-square"></i> <span>Formatos WOM</span>
                <small class="label pull-right bg-green">Excel</small>
              </a>
            </li>
            <li>';
            }
            ?>



            <?php  
            if ($_SESSION['almacen']==1)
            {
              echo ' <li id="mFormatosnokia" >
              <a href="formatosnokia.php">
                <i class="fa fa-plus-square"></i> <span>Formatos NOKIA</span>
                <small class="label pull-right bg-green">Excel</small>
              </a>
            </li>
            <li>
            
            <a href="bts.php">
            <i class="fa fa-info-circle"></i> <span>Comisionamientos</span>
            <small class="label pull-right bg-blue">BTS</small>
          </a>
        </li>
                    
      </ul>';
            }
            ?>

         
            
             
        </section>
        <!-- /.sidebar -->
      </aside>
