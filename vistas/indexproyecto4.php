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

if ($_SESSION['escritorio']==1 or $_SESSION['cliente_ultratel']==1 )
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
                        
                        
                         <center><font face="arial" size="+3" color="red"><b>MODULO PROYECTOS</b></font></center>
                        
                        </br>
                      </div>

                      <!-- <div  class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4" >
                      <a href="inicio700.php" title="LTE 700" style="text-decoration:none;">
                      <img src="../public/images/700LTE01.png" class="card-img-top" alt="..."onmouseover="this.src='../public/images/700LTE02.png'" onmouseout="this.src='../public/images/700LTE01.png' " style="width:100px; height:100px;" >
                        <div class="card">
                          <div class="card-body">
                          <font face="arial" size="-1" color="black"><p margin-right="100px">&nbsp &nbsp &nbsp LTE 700</p></font>
                          </div>
                        </div>
                      </div> -->


                    <div class="panel-body">


                    <div  class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4" >
                      <a href="iniciogsnwom.php" title="WOM" style="text-decoration:none;">
                      <img src="../public/images/wom01.png" class="card-img-top" alt="..."onmouseover="this.src='../public/images/wom2.png'" onmouseout="this.src='../public/images/wom01.png' " style="width:100px; height:100px;" >
                        <div class="card">
                          <div class="card-body">
                          <font face="arial" size="-1" color="black"><p margin-right="100px">&nbsp  &nbsp &nbsp  &nbsp WOM<p></font>
                            <!-- <h2 class="card-title">Articulos</h2> -->
                          </div>
                        </div>
                      </div>


                    <div  class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4" >
                      <a href="iniciosyf2.php" title="CLARO" style="text-decoration:none;">
                      <img src="../public/images/claro01.png" class="card-img-top" alt="..."onmouseover="this.src='../public/images/claro02.png'" onmouseout="this.src='../public/images/claro01.png' " style="width:100px; height:100px;" >
                        <div class="card">
                          <div class="card-body">
                          <font face="arial" size="-1" color="black"><p margin-right="100px">&nbsp &nbsp &nbsp &nbsp CLARO</p></font>
                            <!-- <h2 class="card-title">Articulos</h2> -->
                          </div>
                        </div>
                      </div>

                     
                      </div>
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
<script type="text/javascript" src="scripts/proyecto4.js"></script>

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






