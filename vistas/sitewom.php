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
if ($_SESSION['admin']==1)
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
                  <?php require 'navegadorgsnwom.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">ESTACION BASE <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Auditor</th>
                            <th>Observaciones</th>
                            <th>Dco</th>
                            <th>Inventario</th>
                            <th>Pre-Atp</th>
                            <th>Atp</th>
                            <th>Acta De Instalacion</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Auditor</th>
                            <th>Observaciones</th>
                            <th>Dco</th>
                            <th>Inventario</th>
                            <th>Pre-Atp</th>
                            <th>Atp</th>
                            <th>Acta De Instalacion</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idsitewom" id="idsitewom">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre">
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo(*):</label>
                            <input type="text" class="form-control" name="codigo" id="codigo">
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Regional (*):</label>
                            <select class="form-control select-picker" name="regional" id="regional" >
                              <option value="CENTRO ORIENTE">CENTRO ORIENTE</option>
                              <option value="COSTA">COSTA</option>
                              <option value="NORORIENTE">NORORIENTE</option>
                              <option value="NOROCCIDENTE">NOROCCIDENTE</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Torrero(*):</label>
                            <input type="text" class="form-control" name="torrero" id="torrero" required>
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Auditor:</label>
                            <select class="form-control select-picker" name="auditor" id="auditor" >
                              <option value="CHRISTIAN BARRIGA">CHRISTIAN BARRIGA</option>
                              <option value="DIEGO CRISTANCHO">DIEGO CRISTANCHO</option>
                              <option value="JHONNATTAN ACOSTA">JHONNATTAN ACOSTA</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Observaciones:</label>
                          <textarea type="text" class="form-control" name="especialista" id="especialista" rows="3"></textarea>
                          </div>


                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <h3 class="text-primary">DOCUMENTOS</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <label>DCO:</label>

                        <input type="hidden" name="imagenactual" id="imagenactual">
                          <a id="archivo" href="#" target="_blank"> </br>
                            <img src="../public/images/pdf.png" alt="DCO" style="width:50px;height:40px;">
                            DCO.pdf
                          </a>
                        <input type="file" class="form-control" name="imagen" id="imagen" accept="application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/.pdf">
                      </div>

                     <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>INVENTARIO:</label>
                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            HW CONTROL.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>PRE-ATP:</label>
                            <input type="hidden" name="imagenactual3" id="imagenactual3">
                            <a id="archivo3" href="#"></br>
                            <img src="../public/images/excel.png" alt="PRE-ATP" style="width:50px;height:40px;">
                            PRE-ATP.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen3" id="imagen3" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                           <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>ATP:</label>
                            <input type="hidden" name="imagenactual4" id="imagenactual4">
                            <a id="archivo4" href="#"></br>
                            <img src="../public/images/excel.png" alt="ATP" style="width:50px;height:40px;">
                            ATP.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen4" id="imagen4" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>ACTA:</label>
                            <input type="hidden" name="imagenactual5" id="imagenactual5">
                            <a id="archivo5" href="#"></br>
                            <img src="../public/images/excel.png" alt="ACTA" style="width:50px;height:40px;">
                            ACTA.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen5" id="imagen5" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
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
elseif ($_SESSION['gsn_admin']==1)
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
                  <?php require 'navegadorgsnwom.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">ESTACION BASE </a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                   <!-- centro -->
                   <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Auditor</th>
                            <th>Observaciones</th>
                            <th>Dco</th>
                            <th>Inventario</th>
                            <th>Pre-Atp</th>
                            <th>Atp</th>
                            <th>Acta De Instalacion</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Auditor</th>
                            <th>Observaciones</th>
                            <th>Dco</th>
                            <th>Inventario</th>
                            <th>Pre-Atp</th>
                            <th>Atp</th>
                            <th>Acta De Instalacion</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idsitewom" id="idsitewom">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre">
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo(*):</label>
                            <input type="text" class="form-control" name="codigo" id="codigo">
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Regional (*):</label>
                            <select class="form-control select-picker" name="regional" id="regional" >
                              <option value="CENTRO ORIENTE">CENTRO ORIENTE</option>
                              <option value="COSTA">COSTA</option>
                              <option value="NORORIENTE">NORORIENTE</option>
                              <option value="NOROCCIDENTE">NOROCCIDENTE</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Torrero(*):</label>
                            <input type="text" class="form-control" name="torrero" id="torrero" required>
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Auditor:</label>
                            <select class="form-control select-picker" name="auditor" id="auditor" >
                              <option value="CHRISTIAN BARRIGA">CHRISTIAN BARRIGA</option>
                              <option value="DIEGO CRISTANCHO">DIEGO CRISTANCHO</option>
                              <option value="JHONNATTAN ACOSTA">JHONNATTAN ACOSTA</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Observaciones:</label>
                          <textarea type="text" class="form-control" name="especialista" id="especialista" rows="3"></textarea>
                          </div>


                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <h3 class="text-primary">DOCUMENTOS</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <label>DCO:</label>

                        <input type="hidden" name="imagenactual" id="imagenactual">
                          <a id="archivo" href="#" target="_blank"> </br>
                            <img src="../public/images/pdf.png" alt="DCO" style="width:50px;height:40px;">
                            DCO.pdf
                          </a>
                        <input type="file" class="form-control" name="imagen" id="imagen" accept="application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/.pdf">
                      </div>

                     <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>INVENTARIO:</label>
                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            HW CONTROL.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>PRE-ATP:</label>
                            <input type="hidden" name="imagenactual3" id="imagenactual3">
                            <a id="archivo3" href="#"></br>
                            <img src="../public/images/excel.png" alt="PRE-ATP" style="width:50px;height:40px;">
                            PRE-ATP.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen3" id="imagen3" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                           <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>ATP:</label>
                            <input type="hidden" name="imagenactual4" id="imagenactual4">
                            <a id="archivo4" href="#"></br>
                            <img src="../public/images/excel.png" alt="ATP" style="width:50px;height:40px;">
                            ATP.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen4" id="imagen4" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>ACTA:</label>
                            <input type="hidden" name="imagenactual5" id="imagenactual5">
                            <a id="archivo5" href="#"></br>
                            <img src="../public/images/excel.png" alt="ACTA" style="width:50px;height:40px;">
                            ACTA.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen5" id="imagen5" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
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
<script type="text/javascript" src="scripts/sitewom.js"></script>
<?php 
}
ob_end_flush();
?>