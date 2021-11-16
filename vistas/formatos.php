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
if ($_SESSION['gsn_admin']==1)
{
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                  <!doctype html>
      <html>
      <head>



      <title>Cargar Ficheros</title>

      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>
  

      <style>
    
    /* .panel-primary {
      background-color: #194719;
      } */
    
      
      </style>
      </head>
      <body>


      <div class="container">
    
          <h4>Descargar Formatos Wom 2021</h4>
          <hr style="margin-top:5px;margin-bottom: 5px;">
        
          <!-- <div class="panel panel-primary">
            <div class="panel-heading" >
              <h3 class="panel-title">Cargar Ficheros</h3>
            </div>
            <div class="panel-body">
              <div class="col-lg-6">
                <form method="POST" action="CargarFicheros_2.php" enctype="multipart/form-data">
          <div class="form-group">
                        <label class="btn btn-primary" for="my-file-selector">
                          <input required="" type="file" name="file" id="exampleInputFile">
                        </label>
                        
          </div>
                    <button class="btn btn-primary" type="submit">Cargar BTS</button>
                    </form>
                  </div>
                  <div class="col-lg-3"> </div>
                </div>
              </div> -->
            
          <!--tabla-->
              <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Formatos en Excel</h3>
            </div>
    <div class="panel-body">
        
      <table class="table">
        <thead>
          <tr>
            <th width="67%">Nombre del Archivo</th>
            <th width="13%">Descargar</th>
            <!-- <th width="10%">Eliminar</th> -->
          </tr>
        </thead>
        <tbody>
      <?php
      $archivos = scandir("formatos");
      $num=0;
      for ($i=2; $i<count($archivos); $i++)
      {$num++;
      ?>
      <p>  
      </p>
              
          <tr>
            <td><?php echo $archivos[$i]; ?></td>
            <td><a title="Descargar Archivo" href="formatos/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: gren; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a></td>
            <!-- <td><a title="Eliminar Archivo" href="Eliminar.php?name=bts/<?php echo $archivos[$i]; ?>" style="color: red; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a></td> -->
          </tr>
      <?php }?> 

      

        </tbody>

        
      </table>
      </div>

      


      
      </div>
      <!-- Fin tabla--> 


      
        </div>


        
      </div>
      <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
      </body>
      </html>
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

<?php 
}
ob_end_flush();
?>



