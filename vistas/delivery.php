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
                          <h1 class="box-title">Delivey <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> <a href="../reportes/rptdeliverys.php" target="_blank"><button class="btn btn-info"><i class="fa fa-clipboard"></i> Reporte</button></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                    <table id="tbllistado"  class="stripe row-border order-column" width="100%"  border="3">
                    <tr align="center" bgcolor="#4A4513">
                          <thead>
                            <th>Opciones</th>
                            <th>Site Name</th>
                            <th>Proceso</th>
                            <th>SMP</th>
                            <th>SMR</th>
                            <th>Cantidad</br>Equipos PL</th>
                            <th>Observaciones</th>
                            <th>Packing</th>
                            <th>Estado</th>
                          </thead>
                          </tr>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 500px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Site Name:</label>
                            <input type="hidden" name="iddelivery" id="iddelivery">
                            <input type="text" class="form-control" name="sitename" id="sitename" maxlength="50" placeholder="Site Name" required>
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo:</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="256" placeholder="Codigo">
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Proceso:</label>
                            <select class="form-control selectpicker" name="proceso" id="proceso">
                              <option value="Normal">Normal</option>
                              <option value="Adicional">Adicional</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>SMP:</label>
                            <input type="text" class="form-control" name="smp" id="smp" maxlength="256" placeholder="Codigo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>SMR:</label>
                            <input type="text" class="form-control" name="smr" id="smr" maxlength="256" placeholder="Codigo">
                          </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>EL Delivery</label>
                            <input type="text" class="form-control" name="el_delivery" id="el_delivery" maxlength="256" placeholder="Codigo">
                          </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>EL Inventario</label>
                            <input type="text" class="form-control" name="el_inventario" id="el_inventario" maxlength="256" placeholder="Codigo">
                          </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado</label>
                            <select class="form-control selectpicker" name="estado" id="estado">
                              <option value="OK">OK</option>
                              <option value="INCOMPLETO">INCOMPLETO</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Observaciones</label>
                            <input type="text" class="form-control" name="equipo" id="equipo">
                          </div>
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="text-info">ADJUNTOS</h4>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                        <div class="panel panel-default">
                          <div class="panel-body">
                          <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#" target="_blank"> </br>
                            <img src="../public/images/pdf.png" alt="PACKING LIST" style="width:50px;height:40px;">
                            PACKING LIST.pdf
                            </a>
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/.pdf">
                          </div>
                        </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                          
                       </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </br>
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
                          <h1 class="box-title">Delivery </a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                    <table id="tbllistado"  class="stripe row-border order-column" width="100%"  border="3">
                    <tr align="center" bgcolor="#4A4513">
                          <thead>
                            <th>Opciones</th>
                            <th>Site Name</th>
                            <th>Proceso</th>
                            <th>SMP</th>
                            <th>SMR</th>
                            <th>Cantidad</br>Equipos PL</th>
                            <th>El_Inventario</th>
                            <th>Estado</th>
                            <th>Equipo</th>
                            <th>Cantidad</th>
                            <th>Packing</th>
                            <th>Estado</th>
                          </thead>
                          </tr>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 500px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Site Name:</label>
                            <input type="hidden" name="iddelivery" id="iddelivery">
                            <input type="text" class="form-control" name="sitename" id="sitename" maxlength="50" placeholder="Site Name" required>
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo:</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="256" placeholder="Codigo">
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Proceso:</label>
                            <select class="form-control selectpicker" name="proceso" id="proceso">
                              <option value="Normal">Normal</option>
                              <option value="Adicional">Adicional</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>SMP:</label>
                            <input type="text" class="form-control" name="smp" id="smp" maxlength="256" placeholder="Codigo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>SMR:</label>
                            <input type="text" class="form-control" name="smr" id="smr" maxlength="256" placeholder="Codigo">
                          </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>EL Delivery</label>
                            <input type="text" class="form-control" name="el_delivery" id="el_delivery" maxlength="256" placeholder="Codigo">
                          </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>EL Inventario</label>
                            <input type="text" class="form-control" name="el_inventario" id="el_inventario" maxlength="256" placeholder="Codigo">
                          </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado</label>
                            <select class="form-control selectpicker" name="estado" id="estado">
                              <option value="OK">OK</option>
                              <option value="INCOMPLETO">INCOMPLETO</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Cantidad</label>
                            <input type="text" class="form-control" name="cantidad" id="cantidad" maxlength="256" placeholder="Codigo">
                          </div>
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="text-info">ADJUNTOS</h4>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                        <div class="panel panel-default">
                          <div class="panel-body">
                          <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#" target="_blank"> </br>
                            <img src="../public/images/pdf.png" alt="PACKING LIST" style="width:50px;height:40px;">
                            PACKING LIST.pdf
                            </a>
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/.pdf">
                          </div>
                        </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                          
                       </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </br>
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
<script type="text/javascript" src="scripts/delivery_1.js"></script>
<style type="text/css">


     table.dataTable thead th {
    text-align: center;
    background-color: burlywood;
    font-weight: bold;
    color: black;
     }

     

</style>
<?php 
}
ob_end_flush();
?>


