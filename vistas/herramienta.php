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
                  <?php require 'navegadorherramienta.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">Almacen <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> <a href="../reportes/rptherramientas.php" target="_blank"></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Imagen</th>
                            <th>Categoría</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Stock</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Imagen</th>
                            <th>Categoría</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Stock</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Categoría(*):</label>
                            <select id="idcategoria_herramienta" name="idcategoria_herramienta" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idherramienta" id="idherramienta">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                          </div>
                         
                         
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                          </div>
                        
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo(*):</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" required>
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Stock(*):</label>
                            <input type="number" class="form-control" name="stock" id="stock" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-4 col-sm-4 col-xs-12">
                            <label>observacion (*):</label>
                            <input type="text" class="form-control" name="observacion" id="observacion" maxlength="256" placeholder="Observacion">
                          </div>

                         
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="250px" height="250px" id="imagenmuestra">
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
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
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/herramienta.js"></script>
<?php 
}
ob_end_flush();
?>