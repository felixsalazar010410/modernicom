<div class="card text-center">
              <div class="card-header">
                     <ul class="nav nav-pills nav-fill" id="myTab">
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pIndexProyecto" href="indexproyecto3.php">PROYECTOS</a>
                       </li>
                       <!-- <?php if($_SESSION['almacen'] == 1 or $_SESSION['cliente_ofg']==1 ) {?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pInicio" href="inicio700.php">INICIO</a>
                       </li>
                       <?php } ?> -->
                       
                       <?php if($_SESSION['almacen'] == 1 or $_SESSION['cliente_ofg']==1 ){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="p700" href="ultratel_site700.php">SITIOS</a>
                       </li>
                       <?php } ?>
                      
                     </ul>

    </div>
</div>