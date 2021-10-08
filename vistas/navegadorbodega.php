<div class="card text-center">
              <div class="card-header">
                     <ul class="nav nav-pills nav-fill" id="myTab">
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pIndexLogistica" href="indexlogistica.php">LOGISTICA</a>
                       </li>
                       <?php if($_SESSION['admin'] == 1){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pInicio" href="inicioBodega.php">INICIO</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pArticulo" href="articulo.php">Almacen</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pIngreso" href="ingreso.php">Ingresos</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pSalida" href="venta.php">Salidas</a>
                       </li>
                       <?php } ?>
                       <?php if($_SESSION['almacen'] == 1){?>
                       <li class="nav-item">
                         <a class="nav-link disabled" id="pDSalidas" href="detalle_venta.php">Detalle Salidas</a>
                       </li>
                       <?php } ?>
                     </ul>

    </div>
</div>