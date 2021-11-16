<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-pills nav-fill" id="myTab">
            <li class="nav-item">
                <a class="nav-link disabled" id="pIndexProyecto" href="indexproyecto3.php">PROYECTOS</a>
            </li>
            <?php if ($_SESSION['admin'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link disabled" id="pInicio" href="iniciosyf.php">INICIO</a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['admin'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" id="pPermisos" data-toggle="dropdown" href="siteEscuelas.php" role="button" aria-haspopup="true" aria-expanded="false">PERMISOS &nbsp<i class="fa fa-sort-desc"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Costa</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="siteNokia.php">Centro</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Oriente</a>
                    </div>
                </li>
            <?php } ?>
            <?php if ($_SESSION['gsn_admin'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" id="pSite" data-toggle="dropdown" href="siteEscuelas.php" role="button" aria-haspopup="true" aria-expanded="false">SITES &nbsp<i class="fa fa-sort-desc"></i></a>
                    <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#">Seguimiento</a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="sitewom.php">Documentacion</a>
                        <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Herramientas</a> -->
                    </div>
                </li>
            <?php } ?>
            <?php if ($_SESSION['admin'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" id="pSite" data-toggle="dropdown" href="siteEscuelas.php" role="button" aria-haspopup="true" aria-expanded="false">HARDWARE &nbsp<i class="fa fa-sort-desc"></i></a>
                    <div class="dropdown-menu">
                        
                        <a class="dropdown-item" href="#">Delivery</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="siteNokia.php">Inventario HW</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Failury Report</a>
                    </div>
                </li>
            <?php } ?>
            <?php if ($_SESSION['admin'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" data-toggle="dropdown" href="siteEscuelas.php" role="button" aria-haspopup="true" aria-expanded="false">ESTANDARES &nbsp<i class="fa fa-sort-desc"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="iniciosyf.php">Instalacion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Documentacion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logistica</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>