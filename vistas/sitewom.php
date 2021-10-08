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
                  <?php require 'navegadornokia.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title"  </strong> Estaciones Base </br> </br> <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
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
                            <th>Proyecto</th>
                            <th>Regional</th>
                            <th>Lider Cuadrilla</th>
                            <th>Estado Sitio</th>
                            <th>TSS </th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Proyecto</th>
                            <th>Regional</th>
                            <th>Lider Cuadrilla</th>
                            <th>Estado Sitio</th>
                            <th>TSS </th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idsite" id="idsite">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Proyecto(*):</label>
                            <select id="idproyecto" name="idproyecto" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Regional(*):</label>
                            <select class="form-control select-picker" name="regional" id="regional" required>
                              <option value="CENTRO">CENTRO</option>
                              <option value="COSTA">COSTA</option>
                              <option value="ORIENTE">ORIENTE</option>
                              <option value="OCCIDENTE">OCCIDENTE</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Direccion(*):</label>
                              <input type="text" class="form-control" name="direccion" id="direccion" maxlength="100" placeholder="Direccion" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Lider Cuadrilla(*):</label>
                            <select id="lider_cuadrilla" name="lider_cuadrilla" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado Sitio(*):</label>
                            <select class="form-control select-picker" name="estado_sitio" id="estado_sitio" required>
                              <option value="1.Sin PO">1.Sin PO</option>
                              <option value="2. Detenido Por la Regional">2. Detenido Por la Regional</option>
                              <option value="3. Ejecutado">3. Ejecutado</option>
                              <option value="4. Falla TX">4. Falla TX</option>
                              <option value="5. No asignado NDP">5. No asignado NDP</option>
                              <option value="6. No viable">6. No viable</option>
                              <option value="7. Viable">7. Viable</option>
                              <option value="8. Problema con CHG">8. Problema con CHG</option>
                              <option value="9. ID VM">9. ID VM</option>
                              <option value="10. Acceso">10. Acceso</option>
                              <option value="11. En proceso">11. En proceso</option>
                              <option value="13. Detenido Cluster">13. Detenido Cluster</option>
                              <option value="14. Detenido BSC">14. Detenido BSC</option>
                              <option value="15. Pte CHG">15. Pte CHG</option>
                              <option value="17. CHG Entregado">17. CHG Entregado</option>
                              <option value="18. Pte DF">18. Pte DF</option>
                              <option value="19. Pte Notificar">19. Pte Notificar</option>
                              <option value="20. Notificado">20. Notificado</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Archivo:</label>
                            
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#"></br>
                            <img src="../public/img/exceldescarga.png" alt=" DESCARGAR TSS" style="width:50px;height:40px;">
                            </a>

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
else if ($_SESSION['temwok']==1)
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
                      <div class="box-header with-border">
                            <h1 class="box-title">Sitios</h1>
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
                              <th>Proyecto</th>
                              <th>Regional</th>
                              <th>Lider Cuadrilla</th>
                              <th>Estado Sitio</th>
                              <th>Imagen</th>
                              <th>Estado</th>
                            </thead>
                            <tbody>                            
                            </tbody>
                            <tfoot>
                              <th>Opciones</th>
                              <th>Nombre</th>
                              <th>Proyecto</th>
                              <th>Regional</th>
                              <th>Lider Cuadrilla</th>
                              <th>Estado Sitio</th>
                              <th>Imagen</th>
                              <th>Estado</th>
                            </tfoot>
                          </table>
                      </div>
                      <div class="panel-body" id="formularioregistros">
                          <form name="formulario" id="formulario" method="POST">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Nombre(*):</label>
                              <input type="hidden" name="idsite" id="idsite">
                              <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre"  readonly>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Proyecto(*):</label>
                              <select id="idproyecto" name="idproyecto" class="form-control selectpicker" data-live-search="true" disabled></select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Regional(*):</label>
                               <input type="text" class="form-control" name="regional" id="regional" readonly>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Lider Cuadrilla(*):</label>
                              <input type="text" class="form-control" name="lider_cuadrilla" id="lider_cuadrilla" readonly>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Estado Sitio(*):</label>
                              <select class="form-control select-picker" name="estado_sitio" id="estado_sitio" required>
                                <option value="1.Sin PO">1.Sin PO</option>
                                <option value="2. Detenido Por la Regional">2. Detenido Por la Regional</option>
                                <option value="3. Ejecutado">3. Ejecutado</option>
                                <option value="4. Falla TX">4. Falla TX</option>
                                <option value="5. No asignado NDP">5. No asignado NDP</option>
                                <option value="6. No viable">6. No viable</option>
                                <option value="7. Viable">7. Viable</option>
                                <option value="8. Problema con CHG">8. Problema con CHG</option>
                                <option value="9. ID VM">9. ID VM</option>
                                <option value="10. Acceso">10. Acceso</option>
                                <option value="11. En proceso">11. En proceso</option>
                                <option value="13. Detenido Cluster">13. Detenido Cluster</option>
                                <option value="14. Detenido BSC">14. Detenido BSC</option>
                                <option value="15. Pte CHG">15. Pte CHG</option>
                                <option value="17. CHG Entregado">17. CHG Entregado</option>
                                <option value="18. Pte DF">18. Pte DF</option>
                                <option value="19. Pte Notificar">19. Pte Notificar</option>
                                <option value="20. Notificado">20. Notificado</option>
                              </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Descripción:</label>
                              <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Imagen:</label>
                              <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
                              <input type="hidden" name="imagenactual" id="imagenactual">
                              <img src="" width="150px" height="120px" id="imagenmuestra">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
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
<script type="text/javascript" src="scripts/sitewom.js"></script>
<?php 
}

ob_end_flush();
?>