<div class="card text-center">
              <div class="card-header">
                     <ul class="nav nav-pills nav-fill" id="myTab">
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pIndexProyecto" href="indexproyecto2.php">PROYECTOS</a>
                       </li>
                       <!-- <?php if($_SESSION['almacen'] == 1 or $_SESSION['cliente_ofg']==1 ) {?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pInicio" href="inicio700.php">INICIO</a>
                       </li>
                       <?php } ?> -->
                       <?php if($_SESSION['admin'] == 1 ){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pProyecto" href="proyecto2.php">PROYECTO</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1 or $_SESSION['cliente_ofg']==1 ){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="p700" href="site700.php">SITIOS</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1 or $_SESSION['cliente_ofg']==1 ){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pradiante" href="radiante.php">REPORTE RADIANTE</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1 or $_SESSION['cliente_ofg']==1 ){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pvideos" href="videos.php">VIDEOS</a>
                       </li>
                       <?php } ?>
                      
                     </ul>

    </div>
</div>