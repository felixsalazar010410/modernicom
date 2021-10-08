<div class="card text-center">
              <div class="card-header">
                     <ul class="nav nav-pills nav-fill" id="myTab">
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pIndexProyecto" href="indexHadware.php">HADWARE</a>
                       </li>
                       <?php if($_SESSION['almacen'] == 1 or $_SESSION['cliente_ofg']==1 ) {?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pInventario" href="700hw.php">INVENTARIO HW</a> 
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1 or $_SESSION['cliente_ofg']==1 ){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pDelivery" href="delivery.php">DELIVERY</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1 or $_SESSION['cliente_ofg']==1 ){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pFailury" href="failure.php">FAILURY REPORT</a>
                       </li>
                       <?php } ?>
                     </ul>

    </div>
</div>