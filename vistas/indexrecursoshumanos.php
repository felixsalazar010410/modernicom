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

if ($_SESSION['escritorio']==1)
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
                       <div class="row">
                         <div class="card v">
                         <center><font face="arial" size="+3" color="red"><b>MODULO RECURSOS HUMANOS</b></font></center>
                        </br>
                      </div>
                      <div  class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4" >
                      <a href="personal.php" title="PERSONAL" style="text-decoration:none;">
                      <img src="../public/images/person1.png" class="card-img-top" alt="..."onmouseover="this.src='../public/images/person2.png'" onmouseout="this.src='../public/images/person1.png' " style="width:100px; height:100px;">
                        <div class="card">
                          <div class="card-body">
                          <font face="arial" size="-1" color="black"><p margin-right="100px">&nbsp &nbsp PERSONAL</p></font>
                          </div>
                        </div>
                      </div>

                      <div  class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4" >
                      <a href="inicioAsecones.php" title="ASECONES" style="text-decoration:none;">
                      <img src="../public/images/proceso1.png" class="card-img-top" alt="..."onmouseover="this.src='../public/images/proceso2.png'" onmouseout="this.src='../public/images/proceso1.png' " style="width:100px; height:100px;" >
                        <div class="card">
                          <div class="card-body">
                          <font face="arial" size="-1" color="black"><p margin-right="100px">&nbsp &nbspPROCESOS<p></font>
                            <!-- <h2 class="card-title">Articulos</h2> -->
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
<script type="text/javascript" src="scripts/proyecto.js"></script>

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






