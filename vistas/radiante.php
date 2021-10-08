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

if ($_SESSION['asecones_escuelas_coordinador']==1 or $_SESSION['cliente_ofg']==1 )
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
                  <?php require 'navegador700.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">Radiante <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                      <table id="tbllistado"  class="stripe row-border order-column" width="100%" style="width: 0px;" border="1">
                          <tr align="center" bgcolor="#f7e842">
                          <thead>
                            <th>Opciones</th>
                            <th>Site</th>
                            <th>Auditor</th>
                            <th>Documentador</th>
                            <th>Observaciones</th>
                            <th>Auditoria Formato de Radiante</th>
                            <th>Reporte Radiante Final</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                       </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Site:</label>
                            <input type="hidden" name="idradiante" id="idradiante">
                            <input type="text" class="form-control" name="site" id="site">
                          
                           </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Dec:</label>
                            <select name="dec_nombre" id="dec_nombre" class="form-control selectpicker">
                              <option value="Angie Lopez">Angie Lopez</option>
                              <option value="Jhon Varela">Jhon Varela</option>
                              <option value="Oscar Romero">Oscar Romero</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Documentador:</label>
                            <select name="documentador" id="documentador" class="form-control selectpicker">
                              <option value="JUAN EDUARDO BORRERO ROLDAN">JUAN EDUARDO BORRERO ROLDAN</option>
                              <option value="JUAN SEBASTIAN ORTIZ OSPINA">JUAN SEBASTIAN ORTIZ OSPINA</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label> Auditoria Formato Reporte de radiante:</label></br>

                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#">
                            <img src="../public/images/correo.png" alt="video" style="width:50px;height:40px;">
                            correo.msg

                            <input type="file" class="form-control" name="imagen" id="imagen" accept="application/vnd.ms-outlook">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label> Formato de Reporte radiante:</label></br>

                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#">
                            <img src="../public/images/excel.png" alt="Reporte Radiante" style="width:50px;height:40px;">
                            correo.msg

                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <label>Observaciones:</label>
                            <textarea name="observaciones" id="observaciones" cols="30" rows="5" class="form-control"></textarea>
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

else if ($_SESSION['asecones_escuelas_documentador']==1 )
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
                  <?php require 'navegador700.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">Radiante</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                      <table id="tbllistado"  class="stripe row-border order-column" width="100%" style="width: 0px;" border="1">
                          <tr align="center" bgcolor="#f7e842">
                          <thead>
                            <th>Opciones</th>
                            <th>Site</th>
                            <th>Auditor</th>
                            <th>Documentador</th>
                            <th>Observaciones</th>
                            <th>Auditoria Formato de Radiante</th>
                            <th>Reporte Radiante Final</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                       </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Site:</label>
                            <input type="hidden" name="idradiante" id="idradiante">
                            <input type="text" class="form-control" name="site" id="site">
                          
                           </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Dec:</label>
                            <select name="dec_nombre" id="dec_nombre" class="form-control selectpicker">
                              <option value="Angie Lopez">Angie Lopez</option>
                              <option value="Jhon Varela">Jhon Varela</option>
                              <option value="Oscar Romero">Oscar Romero</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Documentador:</label>
                            <select name="documentador" id="documentador" class="form-control selectpicker">
                              <option value="JUAN EDUARDO BORRERO ROLDAN">JUAN EDUARDO BORRERO ROLDAN</option>
                              <option value="JUAN SEBASTIAN ORTIZ OSPINA">JUAN SEBASTIAN ORTIZ OSPINA</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label> Auditoria Formato Reporte de radiante:</label></br>

                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#">
                            <img src="../public/images/correo.png" alt="video" style="width:50px;height:40px;">
                            correo.msg

                            <input type="file" class="form-control" name="imagen" id="imagen" accept="application/vnd.ms-outlook">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label> Formato de Reporte radiante:</label></br>

                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#">
                            <img src="../public/images/excel.png" alt="Reporte Radiante" style="width:50px;height:40px;">
                            Reporte radiante

                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <label>Observaciones:</label>
                            <textarea name="observaciones" id="observaciones" cols="30" rows="5" class="form-control"></textarea>
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
<script type="text/javascript" src="scripts/radiante.js"></script>
<style type="text/css">
  .horizontal{writing-mode: vertical-lr;
    transform: rotate(180deg);
    font-size: 20px;
    width: inherit !important;
    
     }

     table.dataTable thead {background-color:green}

     table.dataTable thead th {
    text-align: center;
    background-color: green;
    font-weight: bold;
    color: white;
     }


    table.dataTable tfoot th {
    background-color:rd ;
    text-align: center;
    font-weight: bold;
    color: white;

    
}



</style>

<?php 
}
ob_end_flush();
?>


