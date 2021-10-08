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
                  <?php require 'navegadorHadware.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">Failure Report <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> <a href="../reportes/rptfailures.php" target="_blank"><button class="btn btn-info"><i class="fa fa-clipboard"></i> Reporte</button></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Site Name</th>
                            <th>Failure Report</th>
                            <th>RMA</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Site Name</th>
                            <th>Failure Report</th>
                            <th>RMA</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 600px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Site:</label>
                            <input type="hidden" name="idfailure" id="idfailure">
                            <input type="text" class="form-control" name="site" id="site" maxlength="50" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Proyecto:</label>
                            <input type="text" class="form-control" name="proyecto" id="proyecto" maxlength="256">
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Equipo:</label>
                            <input type="text" class="form-control" name="equipo" id="equipo" maxlength="256" >
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Seial:</label>
                            <input type="text" class="form-control" name="serial" id="serial" maxlength="256" >
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo:</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="256" >
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Version:</label>
                            <input type="text" class="form-control" name="version" id="version" maxlength="256" >
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Falla:</label>
                            <input type="date" class="form-control" name="fecha_falla" id="fecha_falla" maxlength="256" >
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Envio:</label>
                            <input type="date" class="form-control" name="fecha_envio" id="fecha_envio" maxlength="256" >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripcion:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Devolver:</label>
                            <input type="text" class="form-control" name="devolver" id="devolver" maxlength="256" >
                          </div>
                       
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Failure Report:</label></br>

                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#">
                            <img src="../public/images/excel.png" alt="TSS" style="width:50px;height:40px;">
                            Failure Repost.xmls

                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>RMA:</label>

                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#" target="_blank"> </br>
                            <img src="../public/images/pdf.png" alt="RMA" style="width:50px;height:40px;">
                            RMA.pdf
                            </a>
                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/.pdf">
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
elseif ($_SESSION['cliente_ofg']==1)
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
                  <?php require 'navegadorHadware.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">Failure Report</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Site Name</th>
                            <th>Failure Report</th>
                            <th>RMA</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Site Name</th>
                            <th>Failure Report</th>
                            <th>RMA</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 600px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Site:</label>
                            <input type="hidden" name="idfailure" id="idfailure">
                            <input type="text" class="form-control" name="site" id="site" maxlength="50" placeholder="Nombre" readonly>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Proyecto:</label>
                            <input type="text" class="form-control" name="proyecto" id="proyecto" maxlength="256"readonly>
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Equipo:</label>
                            <input type="text" class="form-control" name="equipo" id="equipo" maxlength="256" readonly>
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Seial:</label>
                            <input type="text" class="form-control" name="serial" id="serial" maxlength="256" readonly>
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo:</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="256" readonly>
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Version:</label>
                            <input type="text" class="form-control" name="version" id="version" maxlength="256" readonly>
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Falla:</label>
                            <input type="date" class="form-control" name="fecha_falla" id="fecha_falla" maxlength="256" readonly>
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Envio:</label>
                            <input type="date" class="form-control" name="fecha_envio" id="fecha_envio" maxlength="256" readonly>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripcion:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" readonly>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Devolver:</label>
                            <input type="text" class="form-control" name="devolver" id="devolver" maxlength="256" readonly>
                          </div>
                       
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Failure Report:</label></br>

                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#">
                            <img src="../public/images/excel.png" alt="TSS" style="width:50px;height:40px;">
                            Failure Repost.xmls
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">

                           
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>RMA:</label>

                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#" target="_blank"> </br>
                            <img src="../public/images/pdf.png" alt="RMA" style="width:50px;height:40px;">
                            RMA.pdf
                            </a>
                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/.pdf">
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
<script type="text/javascript" src="scripts/failure_1.js"></script>
<?php 
}
ob_end_flush();
?>


