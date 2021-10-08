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

if ($_SESSION['escritorio']==1 or $_SESSION['cliente_ofg']==1 )
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
                        
                        
                         <center><font face="arial" size="+3" color="green"><b>MODULO DE LOGISTICA</b></font></center>
                        
                        </br>
                      </div>


                    <div class="panel-body">

                      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="small-box bg-green">
                            <div class="inner">
                              <H3>HADWARE CONTROL</H3></br>
                              <div class="icon">
                           <i class="fa fa-database" aria-hidden="true"></i>
                         </div>

                         <h4 style="font-size:10;">
                                
                              </h4>
                            </div>
                            <div class="icon">
                              <i class="ion ion-bag"></i>
                            </div>
                            <a href="700hw.php" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
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
<script type="text/javascript" src="scripts/hadware.js"></script>

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
