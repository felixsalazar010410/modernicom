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


<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12" >
                  <div class="box">
                  
                    <!-- /.box-header -->
                    <!-- centro -->
                       <div class="panel-body table-responsive" id="listadoregistros">
                       ​    
                       <div class="row">


                       
                         <div class="card v">
                         <!-- <h1 class="card-header">MODULO LOGISTICA</h1> -->
                         <center><font face="arial" size="+3" color="red"><b>MODULO LOGISTICA</b></font></center>
                        </br>
                      </div>
                      <div  class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4" >
                      <a href="articulo.php" title="BODEGA" style="text-decoration:none;">
                      <img src="../public/images/logistica01.png" class="card-img-top" alt="..."onmouseover="this.src='../public/images/logistica02.png'" onmouseout="this.src='../public/images/logistica01.png' " style="width:100px; height:100px;" >
                        <div class="card">
                          <div class="card-body">
                          <font face="arial" size="-1" color="black"><p margin-right="100px">&nbsp &nbsp BODEGA</p></font>
                            <!-- <h2 class="card-title">Articulos</h2> -->
                          </div>
                        </div>
                      </div>
                      <div  class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4" >
                      <a href="Herramienta.php" title="HERRAMIENTA" style="text-decoration:none;">
                      <img src="../public/images/herramienta02.png" class="card-img-top" alt="..."onmouseover="this.src='../public/images/herramienta01.png'" onmouseout="this.src='../public/images/herramienta02.png' " style="width:100px; height:100px;" >
                        <div class="card">
                          <div class="card-body">
                          <font face="arial" size="-1" color="black"><p margin-right="100px"> HERRAMIENTA</p></font>
                            <!-- <h2 class="card-title">Articulos</h2> -->
                          </div>
                        </div>
                      </div>

                      <div  class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4" >
                      <a href="hw700.php" title="TRANSPORTE" style="text-decoration:none;">
                      <img src="../public/images/transporte1.png" class="card-img-top" alt="..."onmouseover="this.src='../public/images/transporte2.png'" onmouseout="this.src='../public/images/transporte1.png' " style="width:100px; height:100px;" >
                        <div class="card">
                          <div class="card-body">
                          <font face="arial" size="-1" color="black"><p margin-right="100px"> TRANSPORTE</p></font>
                            <!-- <h2 class="card-title">Articulos</h2> -->
                          </div>
                        </div>
                      </div>

                      <!-- <div  class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4" >
                      <a href="hwsite.php" title="EQUIPOS" style="text-decoration:none;">
                      <img src="../public/images/CATEGORIA.png" class="card-img-top" alt="..."onmouseover="this.src='../public/images/CATEGORIA2.png'" onmouseout="this.src='../public/images/CATEGORIA.png' " style="width:100px; height:100px;" >
                        <div class="card">
                          <div class="card-body">
                          <font face="arial" size="-1" color="black"><p margin-right="100px">&nbsp  LTE 700 SITE Mhz</p></font>
                            <!-- <h2 class="card-title">Articulos</h2> -->
                          <!-- </div>
                        </div>
                      </div> --> 

                      <!-- <div  class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4" >
                      <a href="capex.php" title="CAPEX" style="text-decoration:none;">
                      <imcg src="../public/images/CATEGORIA.png" class="card-img-top" alt="..."onmouseover="this.src='../public/images/CATEGORIA2.png'" onmouseout="this.src='../public/images/CATEGORIA.png' " style="width:100px; height:100px;" >
                        <div class="card">
                          <div class="card-body">
                          <font face="arial" size="-1" color="black"><p margin-right="100px">&nbsp &nbsp &nbsp CAPEX</p></font>
                            <!-- <h2 class="card-title">Articulos</h2> -->
                          <!-- </div>
                        </div>
                      </div>
                      --> 

                    </div>
   
                       </div>

                  </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/indexLogistica.js"></script>

<!-- <script>
function prueba(){
  var elemento = document.getElementById("elemento").value;
  var cod_capex = document.getElementById("cod_capex");
  
    if (elemento == 'SMR') {
        cod_capex.value = "ssssss";
    } else if (elemento == 'LSM') {
        cod_capex.value = 8599;
    }
} </script> -->
<?php 
}
ob_end_flush();
?>






