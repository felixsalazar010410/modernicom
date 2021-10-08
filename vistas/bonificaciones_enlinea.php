<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
if ($_SESSION['almacen']==1)
{
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><font color="red">Bienvenidos a HOGAR</font></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
      <div class="container-fluid">

      <?php 
      if($_SESSION['almacen']==1){

              include('BONIFICACIONES/bonificaciones_enlinea_BOGOTA.php');
              include('BONIFICACIONES/bonificaciones_enlinea_SABANA.php');
              include('BONIFICACIONES/bonificaciones_enlinea_CALI.php');
              include('BONIFICACIONES/bonificaciones_enlinea_PASTO.php');

      }else{
      if($_SESSION['almacen']==1){

              include('BONIFICACIONES/bonificaciones_enlinea_BOGOTA.php');
              include('BONIFICACIONES/bonificaciones_enlinea_SABANA.php');

      }else{
      if($_SESSION['almacen']==1){

              include('BONIFICACIONES/bonificaciones_enlinea_CALI.php');
              include('BONIFICACIONES/bonificaciones_enlinea_PASTO.php');


      }}}

      ?>


       </div>
    </section>



   <!-- /.content -->
  </div>


  <?php
}
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/herramienta.js"></script>
<?php 
}
ob_end_flush();
?>