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
                         <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->

                    

                    <div class="panel-body table-responsive" id="listadoregistros">

                    <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Sitio</label>
                          <select name="idsite2" id="idsite2" class="form-control selectpicker" data-live-search="true" required>                         	
                          </select>                          
                          <button class="btn btn-success" onclick="listar2()">Mostrar</button>
                        </br>
                        </br>
                        </div>
                        <table id="tbllistado" class="stripe row-border order-column" width="100%" style="width: 0px;" border="1">
                        </br>
                        </br>
                        <tr align="center" bgcolor="#f7e842">
                          <thead>
                            <th>Opciones</th>
                            <th>Estacion</br>Base</th>
                            <th>Documento</br>SMR/LSM</th>
                            <th>Numero</br>Documento</th>
                            <th>Codigo</br>Capex</th>
                            <th>Descripcion</th>
                            <th>Serial</th>
                            <th>Cantidad</br>Despachado</th>
                            <th>Cantidad</br>Instalado</th>
                            <th>Cantidad</br>En Bodega</th>
                            <th>Cantidad</br>Movido</th>
                            <th>Cantidad</br>Devuelto</th>
                            <th>Estado</br>Final</th>
                            <th>Ubicacion</th>
                            <th>Sitio_Final</th>
                            <th>Evidencia</br>Serial</th>
                            <th>Evidencia</br>BTS</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          </tr>
                        </table>
                    </div>

                    
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                         
                        <div class="form-group col-lg-6 col-md-1 col-sm-2 col-xs-16">
                            <label>Documento:</label>
                            <select class="form-control selectpicker"  name="documento" id="documento" >
                                <option value="DCO">DCO</option>
                                <option value="SMR">SMR</option>
                                <option value="LSM">LSM</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-6 col-md-4 col-sm-4 col-xs-12">
                            <label>Numero Documento:</label>
                            <input type="text" class="form-control" name="num_documento" id="num_documento" maxlength="256" placeholder="Descripción">
                          </div>

                        <div class="form-group col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <label>Codigo (*):</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="256" placeholder="Ingresar Codigo">
                          </div>
                       

                          <div class="form-group col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <label>Elemento (*):</label>
                            <input type="text" class="form-control" name="elemento" id="elemento" maxlength="256" placeholder="Ingresar el elemento">
                          </div>

                          <div class="form-group col-lg-6 col-md-4 col-sm-4 col-xs-12">
                            <label>Serial (*):</label>
                            <input type="text" class="form-control" name="serial" id="serial" maxlength="256" placeholder="Serial">
                          </div>

                          
                      

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                           <label>Estacion Base(*):</label>
                            <input type="hidden" name="idwomhw" id="idwomhw">
                            <select id="idsite" name="idsite" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                         
                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Despachado (*):</label>
                            <input type="number" class="form-control" name="despachado" id="despachado" maxlength="256">
                          </div>

                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Instalado(*):</label>
                            <input type="number" class="form-control" name="instalado" id="instalado" maxlength="256">
                          </div>


                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Movido (*):</label>
                            <input type="number" class="form-control" name="movido" id="movido" maxlength="256">
                          </div>

                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Devuelto (*):</label>
                            <input type="number" class="form-control" name="devuelto" id="devuelto" maxlength="256">
                          </div>

                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Bodega (*):</label>
                            <input type="number" class="form-control" name="bodega" id="bodega" maxlength="256">
                          </div>


                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Estado Final (*):</label>
                            <select class="form-control selectpicker"  name="estado" id="estado" >
                                <option value="INSTALADO">INSTALADO</option>
                                <option value="DEVOLUCION">DEVOLUCION</option>
                                <option value="DESMONTADO">DESMONTADO</option>
                                <option value="BAJA">BAJA</option>
                                <option value="FAILIRE REPORT">FAILIRE REPORT</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label>Ubicacion (*):</label>
                            <select class="form-control selectpicker"  name="ubicacion" id="ubicacion" >
                                <option value="Sitio">Sitio</option>
                                <option value="Bodega-Bogota">Bodega-Bogota</option>
                                <option value="Bodega-Bucaramanga">Bodega-Bucaramanga</option>
                                <option value="Bodega-Almagrario">Bodega Almagrario</option>
                                <option value="Bodega-Almaviva">Bodega Almaviva</option>
                                <option value="Bodega-Panalpina">Bodega Panalpina</option>
                            </select>
                          </div>


                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                           <label>Estacion Base Final(*):</label>
                            <select id="sitiofinal" name="sitiofinal" class="form-control selectpicker" data-live-search="true"></select>
                          </div>

                          <div class="form-group col-lg-12 col-md-4 col-sm-4 col-xs-12">
                            <label>Observacion (*):</label>
                            <textarea id="observacion" class="form-control" name="observacion" rows="2"></textarea>
                          </div>


                          <div class="form-group col-lg-6 col-md-2 col-sm-4 col-xs-9">
                            <label>Imagen del Serial:</label></br>
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <span class="border border-dark"></span>
                            <img src="" width="600px" height="350px" id="imagenmuestra" >
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
                            </br>
                          </div>


                           
                          <div class="form-group col-lg-6 col-md-2 col-sm-4 col-xs-9">
                            <label>Imagen de BTS:</label></br>
                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <span class="border border-dark"></span>
                            <img src="" width="600px" height="350px" id="imagenmuestra2" >
                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="image/x-png,image/gif,image/jpeg">
                            </br>
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
if ($_SESSION['cliente_ofg']==1)
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
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->

                    

                    <div class="panel-body table-responsive" id="listadoregistros">

                    <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Sitio</label>
                          <select name="idsite2" id="idsite2" class="form-control selectpicker" data-live-search="true" required>                         	
                          </select>                          
                          <button class="btn btn-success" onclick="listar2()">Mostrar</button>
                        </br>
                        </br>
                        </div>
                        <table id="tbllistado" class="stripe row-border order-column" width="100%" style="width: 0px;" border="1">
                        </br>
                        </br>
                        <tr align="center" bgcolor="#f7e842">
                          <thead>
                            <th>Opciones</th>
                            <th>Estacion</br>Base</th>
                            <th>Documento</br>SMR/LSM</th>
                            <th>Numero</br>Documento</th>
                            <th>Codigo</br>Capex</th>
                            <th>Descripcion</th>
                            <th>Serial</th>
                            <th>Cantidad</br>Despachado</th>
                            <th>Cantidad</br>Instalado</th>
                            <th>Cantidad</br>En Bodega</th>
                            <th>Cantidad</br>Movido</th>
                            <th>Cantidad</br>Devuelto</th>
                            <th>Estado</br>Final</th>
                            <th>Ubicacion</th>
                            <th>Sitio_Final</th>
                            <th>Evidencia</br>Serial</th>
                            <th>Evidencia</br>BTS</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          </tr>
                        </table>
                    </div>

                    
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                         
                        <div class="form-group col-lg-6 col-md-1 col-sm-2 col-xs-16">
                            <label>Documento:</label>
                            <select class="form-control selectpicker"  name="documento" id="documento" >
                                <option value="DCO">DCO</option>
                                <option value="SMR">SMR</option>
                                <option value="LSM">LSM</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-6 col-md-4 col-sm-4 col-xs-12">
                            <label>Numero Documento:</label>
                            <input type="text" class="form-control" name="num_documento" id="num_documento" maxlength="256" placeholder="Descripción">
                          </div>

                        <div class="form-group col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <label>Codigo (*):</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="256" placeholder="Ingresar Codigo">
                          </div>
                       

                          <div class="form-group col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <label>Elemento (*):</label>
                            <input type="text" class="form-control" name="elemento" id="elemento" maxlength="256" placeholder="Ingresar el elemento">
                          </div>

                          <div class="form-group col-lg-6 col-md-4 col-sm-4 col-xs-12">
                            <label>Serial (*):</label>
                            <input type="text" class="form-control" name="serial" id="serial" maxlength="256" placeholder="Serial">
                          </div>

                          
                      

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                           <label>Estacion Base(*):</label>
                            <input type="hidden" name="idwomhw" id="idwomhw">
                            <select id="idsite" name="idsite" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                         
                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Despachado (*):</label>
                            <input type="number" class="form-control" name="despachado" id="despachado" maxlength="256">
                          </div>

                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Instalado(*):</label>
                            <input type="number" class="form-control" name="instalado" id="instalado" maxlength="256">
                          </div>


                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Movido (*):</label>
                            <input type="number" class="form-control" name="movido" id="movido" maxlength="256">
                          </div>

                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Devuelto (*):</label>
                            <input type="number" class="form-control" name="devuelto" id="devuelto" maxlength="256">
                          </div>

                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Bodega (*):</label>
                            <input type="number" class="form-control" name="bodega" id="bodega" maxlength="256">
                          </div>


                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Estado Final (*):</label>
                            <select class="form-control selectpicker"  name="estado" id="estado" >
                                <option value="INSTALADO">INSTALADO</option>
                                <option value="DEVOLUCION">DEVOLUCION</option>
                                <option value="DESMONTADO">DESMONTADO</option>
                                <option value="BAJA">BAJA</option>
                                <option value="FAILIRE REPORT">FAILIRE REPORT</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label>Ubicacion (*):</label>
                            <select class="form-control selectpicker"  name="ubicacion" id="ubicacion" >
                                <option value="Sitio">Sitio</option>
                                <option value="Bodega-Bogota">Bodega-Bogota</option>
                                <option value="Bodega-Bucaramanga">Bodega-Bucaramanga</option>
                                <option value="Bodega-Almagrario">Bodega Almagrario</option>
                                <option value="Bodega-Almaviva">Bodega Almaviva</option>
                                <option value="Bodega-Panalpina">Bodega Panalpina</option>
                            </select>
                          </div>


                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                           <label>Estacion Base Final(*):</label>
                            <select id="sitiofinal" name="sitiofinal" class="form-control selectpicker" data-live-search="true"></select>
                          </div>

                          <div class="form-group col-lg-12 col-md-4 col-sm-4 col-xs-12">
                            <label>Observacion (*):</label>
                            <textarea id="observacion" class="form-control" name="observacion" rows="2"></textarea>
                          </div>


                          <div class="form-group col-lg-6 col-md-2 col-sm-4 col-xs-9">
                            <label>Imagen del Serial:</label></br>
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <span class="border border-dark"></span>
                            <img src="" width="600px" height="350px" id="imagenmuestra" >
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
                            </br>
                          </div>


                           
                          <div class="form-group col-lg-6 col-md-2 col-sm-4 col-xs-9">
                            <label>Imagen de BTS:</label></br>
                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <span class="border border-dark"></span>
                            <img src="" width="600px" height="350px" id="imagenmuestra2" >
                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="image/x-png,image/gif,image/jpeg">
                            </br>
                          </div>

                         
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Volver</button>
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
<script type="text/javascript" src="scripts/had700.js"></script>

<style type="text/css">
  .horizontal{writing-mode: vertical-lr;
    transform: rotate(180deg);
    font-size: 20px;
    width: inherit !important;
    
     }

     table.dataTable thead {background-color:red}

     table.dataTable thead th {
    text-align: center;
    background-color: lightslategray;
    font-weight: bold;
    color: black;
     }


    table.dataTable tfoot th {
    background-color:rd ;
    text-align: center;
    font-weight: bold;
    color: black;


    
}

    
</style>
<?php 
}
ob_end_flush();
?>