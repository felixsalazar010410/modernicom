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

if ($_SESSION['almacen']==1)
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
                  <?php require 'navegadorbodega.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">Detalle Salidas <button class="btn btn-info" id="btnagregar" onclick="listar()"><i class="fa fa-search" aria-hidden="true"></i> TODO</button> <a href="../reportes/rptcategorias.php" target="_blank"></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">

                    <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    
                          <label>Proyecto</label>
                          <select name="idproyecto" id="idproyecto" class="form-control selectpicker" data-live-search="true" onchange="enviar(this.value)" required>                         	
                          </select>                          
                        </div>
                        <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Sitio</label>
                          <select name="idsite" id="idsite" class="form-control selectpicker" data-live-search="true" required>                         	
                          </select>                          
                          <button class="btn btn-success" onclick="listar2()">Mostrar</button>
                        </div>
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>ID</th>
                            <th>Fecha Solicitud</th>
                            <th>Solicitante</th>
                            <th>Adicional</th>
                            <th>Fecha Despacho</th>
                            <th>Proyecto</th>
                            <th>Sitio</th>
                            <th>Item</th>
                            <th>Cantidad</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>ID</th>
                            <th>Fecha Solicitud</th>
                            <th>Solicitante</th>
                            <th>Adicional</th>
                            <th>Fecha Despacho</th>
                            <th>Proyecto</th>
                            <th>Sitio</th>
                            <th>Item</th>
                            <th>Cantidad</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="idcategoria" id="idcategoria">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
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
<script type="text/javascript" src="scripts/detalle_venta.js"></script>
<?php 
}
ob_end_flush();
?>


