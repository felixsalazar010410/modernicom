<div class="card text-center">
              <div class="card-header">
                     <ul class="nav nav-pills nav-fill" id="myTab">
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pIndexProyecto" href="indexproyecto.php">PROYECTOS</a>
                       </li>
                       <?php if($_SESSION['proyecto_asecones'] == 1 or $_SESSION['cliente_wom'] == 1){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pInicio" href="inicioWom.php">INICIO</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1 ){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pProyecto" href="proyecto.php">PROYECTO</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1  or $_SESSION['cliente_wom'] == 1){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pSran" href="siteswom.php">SITIOS</a>
                       </li>
                       <?php } ?>
                      
                     
                     </ul>

    </div>
</div>