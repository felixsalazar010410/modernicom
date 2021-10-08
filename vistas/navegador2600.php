<div class="card text-center">
              <div class="card-header">
                     <ul class="nav nav-pills nav-fill" id="myTab">
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pIndexProyecto" href="indexproyecto2.php">PROYECTOS</a>
                       </li>
                       <?php if($_SESSION['almacen'] == 1 or $_SESSION['cliente_ofg']==1 ){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="p2600" href="site2600.php">SITIOS 2600</a>
                       </li>
                       <?php } ?>
                     </ul>
    </div>
</div>