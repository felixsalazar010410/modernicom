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

if ($_SESSION['ventas']==1)
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
                          <h1 class="box-title">CENTRO DE COSTOS <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> <a href="../reportes/rptventas.php" target="_blank"><button class="btn btn-info"><i class="fa fa-clipboard"></i> Reporte</button></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Fecha Soliciud</th>
                            <th>Solicitante</th>
                            <th>Adicional</th>
                            <th>Proyecto</th>
                            <th>Sitio</th>
                            <th>Catidad</th>
                            <th>Usuario</th>
                            <th>Fecha Despacho</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Fecha Soliciud</th>
                            <th>Solicitante</th>
                            <th>Adicional</th>
                            <th>Proyecto</th>
                            <th>Sitio</th>
                            <th>Catidad</th>
                            <th>Usuario</th>
                            <th>Fecha Despacho</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 100%;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <label>Solicitante(*):</label>
                            <input type="hidden" name="idventa" id="idventa">
                            <select name="solicitante" id="solicitante" class="form-control selectpicker" required="">
                               <option value="RINSON JAWER RIVERA GONZALEZ">RINSON JAWER RIVERA GONZALEZ</option>
                               <option value="MARIA LUCIA TOVAR">MARIA LUCIA TOVAR</option>
                               <option value="MARCO FERNEY ROZO NIEVES">MARCO FERNEY ROZO NIEVES</option>
                               <option value="LUIS ALEJANDRO PINZON QUIJANO">LUIS ALEJANDRO PINZON QUIJANO</option>
                            </select>
                          </div>


                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Fecha de Solicitud(*):</label>
                            <input type="date" class="form-control" name="fecha_solicitud" id="fecha_solicitud" required="">
                          </div>

                        
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Proyecto(*):</label>
                            <select name="proyecto" id="proyecto" onchange="enviar(this.value)" class="form-control selectpicker" required="">
                               <option value="10">PROYECT</option>
                               <option value="1">NOKIA-SRAN</option>
                               <option value="2">NOKIA-PABIS</option>
                               <option value="3">NOKIA-5G DSS</option>
                               <option value="4">NOKIA-LTE700Mhz</option>
                               <option value="5">ASECONES - WOM</option>
                               <option value="6">ASECONES - ESCUELAS</option>
                               <option value="7">ASECONES - CLARO BTS/MW</option>
                               <option value="8">ZTE</option>
                               <option value="9">CLARO</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-4 col-sm-8 col-xs-12">
                            <label>Centro De Costo(*):</label>
                            <select id="idsite" name="idsite" class="form-control selectpicker" data-live-search="true" required>
                            </select>
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>ADICIONAl(*):</label>
                            <select name="adicional" id="adicional" class="form-control selectpicker" required="">
                               <option value="SI">SI</option>
                               <option value="NO">NO</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <label>Recibe(*):</label>
                            <select id="idpersona" name="idpersona" class="form-control selectpicker" data-live-search="true" required>
                            </select>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Fecha de Despacho(*):</label>
                            <input type="date" class="form-control" name="fecha_hora" id="fecha_hora" required="">
                          </div>

                        
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Comprobante(*):</label>
                            <select name="tipo_comprobante" id="tipo_comprobante" class="form-control selectpicker">
                               <option value="Factura">Factura</option>
                            </select>
                          </div>

                        
                         
                          <div class="form-group col-lg-8 col-md-2 col-sm-6 col-xs-12">
                            <label>Comentario:</label>
                          <textarea id="comentario" class="form-control" name="comentario" rows="3"></textarea>
                          </div>

                         
                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a data-toggle="modal" href="#myModal">           
                              <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fa fa-plus"></span> Agregar Artículos</button>
                            </a>
                          </div>


                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                              <thead style="background-color:#A9D0F5">
                                    <th>Opciones</th>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">Σ/ 0</h4><input type="hidden" name="total_venta" id="total_venta"></th> 
                                </tfoot>
                                <tbody>
                                  
                                </tbody>
                            </table>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button id="btnCancelar" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 65% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione un Artículo</h4>
        </div>
        <div class="modal-body table-responsive">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>Opciones</th>
                <th>Categoría</th>
                <th>Articulo</th>
                <th>Stock</th>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
              <th>Opciones</th>
                <th>Categoría</th>
                <th>Articulo</th>
                <th>Stock</th>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  
  <!-- Fin modal -->
<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/venta.js"></script>
<?php 
}
ob_end_flush();
?>


