<div class="card text-center">
              <div class="card-header">
                     <ul class="nav nav-pills nav-fill" id="myTab">
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pIndexProyecto" href="indexProyecto.php">PROYECTOS</a>
                       </li>
                       <?php if($_SESSION['proyecto_asecones'] == 1){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pInicio" href="inicioAsecones.php">INICIO</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pWom" href="sitewom.php">WOM</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['proyecto_asecones'] == 1){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pEscuelas" href="siteEscuelas.php">ESCUELAS</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pBTS" href="sitebts.php">CLARO BTS/MW</a>
                       </li>
                       <?php } ?>
                     </ul>

    </div>
</div>