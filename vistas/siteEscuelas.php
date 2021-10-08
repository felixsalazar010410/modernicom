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


if ($_SESSION['asecones_escuelas_coordinador']==1)
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
                  <?php require 'navegadorNokia.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title"  </strong> informacion </br> </br> <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>

                   
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" cellspacing="2">
                          <thead>
                            <th>Opciones</th>
                            <th>Proyecto</th>
                            <th>ID_Beneficiario</th>
                            <th>Nombre_Sede</th>
                            <th>Departamento</th>
                            <th>Tecnico</th>
                            <th>Fecha_Visita</th>
                            <th>documentador</th>
                            <th>Estado Sitio</th>
                            <th>Estidio Campo</th>
                            <th>Estidio Campo 2</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Proyecto</th>
                            <th>ID_Beneficiario</th>
                            <th>Nombre_Sede</th>
                            <th>Departamento</th>
                            <th>Tecnico</th>
                            <th>Fecha_Visita</th>
                            <th>documentador</th>
                            <th>Estado Sitio</th>
                            <th>Estidio Campo</th>
                            <th>Estidio Campo 2</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ID_Beneficiario:</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="256" placeholder="Id Beneficiario">
                          </div>


                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre Sede(*):</label>
                            <input type="hidden" name="idsite" id="idsite">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                          </div>

                         
                         
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Proyecto(*):</label>
                            <select id="idproyecto" name="idproyecto" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Departamento(*):</label>
                            <select class="form-control select-picker"  data-live-search="true" name="regional" id="regional"   required>
                              <option value="Amazonas">Amazonas</option>
                              <option value="Antioquía">Antioquía</option>
                              <option value="Arauca">Arauca</option>
                              <option value="Atlántico">Atlántico</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Boyacá">Boyacá</option>
                              <option value="Caldas">Caldas</option>
                              <option value="Caquetá">Caquetá</option>
                              <option value="Casanare">Casanare</option>
                              <option value="Cauca">Cauca</option>
                              <option value="Cesar">Cesar</option>
                              <option value="Chocó">Chocó</option>
                              <option value="Córdoba">Córdoba</option>
                              <option value="Cundinamarca">Cundinamarca</option>
                              <option value="Guainía">Guainía</option>
                              <option value="Guaviare">Guaviare</option>
                              <option value="Huila">Huila</option>
                              <option value="La Guajira">La Guajira</option>
                              <option value="Magdalena">Magdalena</option>
                              <option value="Meta">Meta</option>
                              <option value="Nariño">Nariño</option>
                              <option value="Norte de Santander">Norte de Santander</option>
                              <option value="Putumayo">Putumayo</option>
                              <option value="Quindío">Quindío</option>
                              <option value="Risaralda">Risaralda</option>
                              <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                              <option value="Santander">Santander</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Tolima">Tolima</option>
                              <option value="Valle del Cauca">Valle del Cauca</option>
                              <option value="Vaupés">Vaupés</option>
                              <option value="Vichada">Vichada</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Direccion(*):</label>
                              <input type="text" class="form-control" name="direccion" id="direccion" maxlength="100" placeholder="Direccion" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tecnico(*):</label>
                            <select id="lider_cuadrilla" name="lider_cuadrilla" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Visita:</label>
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Documentador(*):</label>
                            <select id="documentador" name="documentador" class="form-control selectpicker" data-live-search="true" required></select>
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
                            </br>&nbsp
                            </br>&nbsp
                          <div class="box-header with-border">
                          <i><h1 class="box-title" DOCUMENTOS </br> </br></h1></i>
                             <div class="box-tools pull-right">
                              </div>
                           </div>

                         

                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            
                            <label>Estudio Campo:</label>

                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#"></br>
                            <img src="../public/images/excel.png" alt="DESCARGAR ESTUDIO DE CAMPO" style="width:50px;height:40px;">
                              ESTUDIO DE CAMPO.xls
                            </a>
                          
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Estado:</label>
                            <select class="form-control select-picker" name="estado1" id="estado1" required>
                              <option value="APROBADO">APROBADO</option>
                              <option value="RECHAZADO">RECHAZADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                              <option value="C4">C4</option>
                             
                            </select>
                            <select class="form-control select-picker" name="correcion1" id="correcion1" required>
                              <option value="C1">C1</option>
                              <option value="C2">C2</option>
                              <option value="C3">C3</option>
                              <option value="C4">C4</option>
                             
                            </select>
                           
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Comentario:</label>

                          
                         
                            <textarea name="comentario1" id="comentario1" class="form-control" rows="3"></textarea>
                          </div>
                         

                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Estudio Campo 2:</label>
                          
                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#"></br>
                            <img src="../public/images/pdf.png" alt="DESCARGAR ESTUCIO DE CAMPO" style="width:50px;height:40px;">
                            ESTUDIO DE CAMPO.pdf
                            </a>

                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/msword,image/gif,image/jpeg,application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.zip">
                           
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Estado:</label>
                            <select class="form-control select-picker" name="estado_sitio_1" id="estado_sitio_1" required>
                              <option value="APROBADO">APROBADO</option>
                              <option value="RECHAZADO">RECHAZADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                              <option value="C4">C4</option>
                             
                            </select>
                             <select class="form-control select-picker" name="estado_sitisssss" id="estado_sitisssss" required>
                              <option value="C1">C1</option>
                              <option value="C2">C2</option>
                              <option value="C3">C3</option>
                              <option value="C4">C4</option>
                             
                            </select>
                           
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Comentario:</label>

                          
                         
                            <textarea name="comentario2" id="comentario2" class="form-control" rows="3"></textarea>
                          </div>


                          <!-- <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>ACTA DE COMPROMISO:</label>
                          
                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#"></br>
                            <img src="../public/images/pdf.png" alt="DESCARGAR ACTA DE COMPRIMISO" style="width:50px;height:40px;">
                            ACTA DE COMPROMISO.pdf
                            </a>

                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/msword,image/gif,image/jpeg,application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.zip">
                           
                          </div>

                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                          <label>Estado:</label>
                            <select class="form-control select-picker" name="estado_sitio" id="estado_sitio" required>
                              <option value="APROBADO">APROBADO</option>
                              <option value="RECHAZADO">RECHAZADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                              <option value="C4">C4</option>
                             
                            </select>
                            <select class="form-control select-picker" name="estado_sitio" id="estado_sitio" required>
                              <option value="C1">C1</option>
                              <option value="C2">C2</option>
                              <option value="C3">C3</option>
                              <option value="C4">C4</option>
                             
                            </select>
                           
                          </div>

                          <div class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <label>Comentario:</label>

                          
                         
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
                          </div>
                          

                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>DIAGRAMA DE INFLUENCIA:</label>
                          
                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#"></br>
                            <img src="../public/images/pdf.png" alt="DESCARGAR ESTUCIO DE CAMPO" style="width:50px;height:40px;">
                            DIAGRAMA DE INFLUENCIA.pdf
                            </a>

                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/msword,image/gif,image/jpeg,application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.zip">
                           
                          </div> -->

                         
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

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 65% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">BASE DE DATOS A BENEFICIAR MINTIC</h4>
        </div>
        <div class="modal-body table-responsive">
          <table id="tblarticulos" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="2" width="100%">
          <thead>
                            <th>Consecutivo</th>
                            <th>ID_Beneficiario</th>
                            <th>Matricula</th>
                            <th>Dane_Depart</th>
                            <th>Departamento</th>
                            <th>Dane_Municipio</th>
                            <th>Municipio</th>
                            <th>Regional</th>
                            <th>Centro_Poblado</th>
                            <th>Dane Institucion</th>
                            <th>Institucion</th>
                            <th>Dane Sede</th>
                            <th>Sede</th>
                            <th>Tipo Sitio</th>
                            <th>Detalle_Sitio</th>
                            <th>Emergencia</th>
                            <th>Region</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Consecutivo</th>
                            <th>ID_Beneficiario</th>
                            <th>Matricula</th>
                            <th>Dane_Depart</th>
                            <th>Departamento</th>
                            <th>Dane_Municipio</th>
                            <th>Municipio</th>
                            <th>Regional</th>
                            <th>Centro_Poblado</th>
                            <th>Dane Institucion</th>
                            <th>Institucion</th>
                            <th>Dane Sede</th>
                            <th>Sede</th>
                            <th>Tipo Sitio</th>
                            <th>Detalle_Sitio</th>
                            <th>Emergencia</th>
                            <th>Region</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
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
else if ($_SESSION['asecones_escuelas_documentador']==1)
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
                          <h1 class="box-title"  </strong> Estaciones Base </br> </br></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>ID_Beneficiario</th>
                            <th>Estado_Sitio</th>
                            <th>ACTA DE COMPROMISO</th>
                            <th>DIAGRAMA DE INFLUENCIA</th>
                            <th>ESQUEMA DE INSTALACION</th>
                            <th>FORMATO ESTUDIO DE CAMPO</th>
                            <th>FORMATO ESTUDIO DE CAMPO-2</th>
                            <th>ESTUDIO DE CLARO</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                              
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>ID_Beneficiario</th>
                            <th>Estado_Sitio</th>
                            <th>ACTA DE COMPROMISO</th>
                            <th>DIAGRAMA DE INFLUENCIA</th>
                            <th>ESQUEMA DE INSTALACION</th>
                            <th>FORMATO ESTUDIO DE CAMPO</th>
                            <th>FORMATO ESTUDIO DE CAMPO-2</th>
                            <th>ESTUDIO DE CLARO</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                    <form name="formulario" id="formulario" method="POST">

<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>ID_Beneficiario:</label>
    <input type="text" class="form-control" name="codigo" id="codigo" maxlength="256" placeholder="Id Beneficiario" readonly>
  </div>


  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Nombre Sede(*):</label>
    <input type="hidden" name="idsite" id="idsite">
    <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" readonly>
  </div>

 
 
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Proyecto(*):</label>
    <select id="idproyecto" name="idproyecto" class="form-control selectpicker" data-live-search="true"></select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Departamento(*):</label>
    <select class="form-control select-picker"  data-live-search="true" name="regional" id="regional">
      <option value="Amazonas">Amazonas</option>
      <option value="Antioquía">Antioquía</option>
      <option value="Arauca">Arauca</option>
      <option value="Atlántico">Atlántico</option>
      <option value="Bolívar">Bolívar</option>
      <option value="Boyacá">Boyacá</option>
      <option value="Caldas">Caldas</option>
      <option value="Caquetá">Caquetá</option>
      <option value="Casanare">Casanare</option>
      <option value="Cauca">Cauca</option>
      <option value="Cesar">Cesar</option>
      <option value="Chocó">Chocó</option>
      <option value="Córdoba">Córdoba</option>
      <option value="Cundinamarca">Cundinamarca</option>
      <option value="Guainía">Guainía</option>
      <option value="Guaviare">Guaviare</option>
      <option value="Huila">Huila</option>
      <option value="La Guajira">La Guajira</option>
      <option value="Magdalena">Magdalena</option>
      <option value="Meta">Meta</option>
      <option value="Nariño">Nariño</option>
      <option value="Norte de Santander">Norte de Santander</option>
      <option value="Putumayo">Putumayo</option>
      <option value="Quindío">Quindío</option>
      <option value="Risaralda">Risaralda</option>
      <option value="San Andrés y Providencia">San Andrés y Providencia</option>
      <option value="Santander">Santander</option>
      <option value="Sucre">Sucre</option>
      <option value="Tolima">Tolima</option>
      <option value="Valle del Cauca">Valle del Cauca</option>
      <option value="Vaupés">Vaupés</option>
      <option value="Vichada">Vichada</option>
    </select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Tecnico(*):</label>
    <select id="lider_cuadrilla" name="lider_cuadrilla" class="form-control selectpicker" data-live-search="true" required></select>
  </div>

  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Fecha Visita:</label>
    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
  </div>

  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Documentador(*):</label>
    <select id="documentador" name="documentador" class="form-control selectpicker" data-live-search="true"></select>
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
    </br>&nbsp
    </br>&nbsp
  <div class="box-header with-border">
  <h1 class="box-title"  </strong> <u>DOCUMENTOS</u> </br> </br></h1>


     <div class="box-tools pull-right">
      </div>
   </div>

 

  <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
    
    <label>Acta De Compromiso:</label>

    <input type="hidden" name="imagenactual" id="imagenactual">
    <a id="archivo" href="#"></br>
    <img src="../public/images/pdf.png" alt="DESCARGAR ESTUDIO DE CAMPO" style="width:50px;height:40px;">
      <u>ACTA DE COMPROMISO.pdf</u>
    </a>
    <input type="file" class="form-control" name="imagen" id="imagen" accept=" application/pdf">
  </div>

  <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
  <label>Estado:<p id="demo"></p></label>
    <select class="form-control select-picker" name="estado1" id="estado1" onchange="cambio()"required>
      <option value="APROBADO">APROBADO</option>
      <option value="RECHAZADO">RECHAZADO</option>
      <option value="PENDIENTE">PENDIENTE</option>
      <option value="C4">C4</option>
    </select>
    <!-- <input type="text" onchange="cambio(this)" class="form-control" name="estado1" id="estado1" maxlength="256" placeholder="Id Beneficiario" > -->

    <select class="form-control select-picker" name="correcion1" id="correcion1" required>
      <option value="C1">C1</option>
      <option value="C2">C2</option>
      <option value="C3">C3</option>
      <option value="C4">C4</option>
    </select>
  </div>

  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Comentario:</label>
    <textarea name="comentario2" id="comentario2" class="form-control" rows="5"></textarea>
  </div>

  
  <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <label>Estudio Campo 2:</label>
    <input type="hidden" name="imagenactual2" id="imagenactual2">
    <a id="archivo2" href="#"></br>
    <img src="../public/images/pdf.png" alt="DESCARGAR ESTUCIO DE CAMPO" style="width:50px;height:40px;">
    <u>DIAGRAMA DE INFLUENCIA.pdf</u>
    </a>
    <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/pdf">

  </div>

  <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
  <label>Estado:</label>
    <select class="form-control select-picker" name="estado_sitio_1" id="estado_sitio_1" required>
      <option value="APROBADO">APROBADO</option>
      <option value="RECHAZADO">RECHAZADO</option>
      <option value="PENDIENTE">PENDIENTE</option>
      <option value="C4">C4</option>
     
    </select>
     <select class="form-control select-picker" name="estado_sitisssss" id="estado_sitisssss" required>
      <option value="C1">C1</option>
      <option value="C2">C2</option>
      <option value="C3">C3</option>
      <option value="C4">C4</option>
    </select>
   
  </div>

  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Comentario:</label>
    <textarea name="comentario2" id="comentario2" class="form-control" rows="5"></textarea>
  </div>


  <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <label>ESQUEMA DE INSTALACION:</label>
  
    <input type="hidden" name="imagenactual3" id="imagenactual3">
    <a id="archivo3" href="#"></br>
    <img src="../public/images/pdf.png" alt="DESCARGAR ESTUCIO DE CAMPO" style="width:50px;height:40px;">
    <u>ESQUEMA DE INSTALACION.pdf</u>
    </a>

    <input type="file" class="form-control" name="imagen3" id="imagen3" accept="application/pdf">
   
  </div>

  <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
  <label>Estado:</label>
    <select class="form-control select-picker" name="estado_sitio_3" id="estado_sitio_3" required>
      <option value="APROBADO">APROBADO</option>
      <option value="RECHAZADO">RECHAZADO</option>
      <option value="PENDIENTE">PENDIENTE</option>
      <option value="C4">C4</option>
    </select>

     <select class="form-control select-picker" name="estado_sitisssss" id="estado_sitisssss" required>
      <option value="C1">C1</option>
      <option value="C2">C2</option>
      <option value="C3">C3</option>
      <option value="C4">C4</option>
    </select>
  </div>

  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Comentario:</label>
    <textarea name="comentario3" id="comentario3" class="form-control" rows="5"></textarea>
  </div>


  <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <label>FORMATO ESTUDIO DE CAMPO:</label>
  
    <input type="hidden" name="imagenactual4" id="imagenactual4">
    <a id="archivo4" href="#"></br>
    <img src="../public/images/pdf.png" alt="DESCARGAR ESTUCIO DE CAMPO" style="width:50px;height:40px;">
    <u>FORMATO ESTUDIO DE CAMPO.pdf</u>
    </a>


    <input type="file" class="form-control" name="imagen4" id="imagen4" accept="application/pdf">

    
   
  </div>

  <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
  <label>Estado:</label>
    <select class="form-control select-picker" name="estado_sitio_3" id="estado_sitio_3" required>
      <option value="APROBADO">APROBADO</option>
      <option value="RECHAZADO">RECHAZADO</option>
      <option value="PENDIENTE">PENDIENTE</option>
      <option value="C4">C4</option>
    </select>

     <select class="form-control select-picker" name="estado_sitisssss" id="estado_sitisssss" required>
      <option value="C1">C1</option>
      <option value="C2">C2</option>
      <option value="C3">C3</option>
      <option value="C4">C4</option>
    </select>
  </div>

  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Comentario:</label>
    <textarea name="comentario4" id="comentario4" class="form-control" rows="5"></textarea>
  </div>


  <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <label>FORMATO ESTUDIO DE CAMPO:</label>
  
    <input type="hidden" name="imagenactual5" id="imagenactual5">
    <a id="archivo5" href="#"></br>
    <img src="../public/images/excel.png" alt="DESCARGAR ESTUCIO DE CAMPO" style="width:50px;height:40px;">
    <u>FORMATO ESTUDIO DE CAMPO.xml</u>
    </a>

    <input type="file" class="form-control" name="imagen5" id="imagen5" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
   
  </div>

  <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
  <label>Estado:</label>
    <select class="form-control select-picker" name="estado_sitio_3" id="estado_sitio_3" required>
      <option value="APROBADO">APROBADO</option>
      <option value="RECHAZADO">RECHAZADO</option>
      <option value="PENDIENTE">PENDIENTE</option>
      <option value="C4">C4</option>
    </select>

     <select class="form-control select-picker" name="estado_sitisssss" id="estado_sitisssss" required>
      <option value="C1">C1</option>
      <option value="C2">C2</option>
      <option value="C3">C3</option>
      <option value="C4">C4</option>
    </select>
  </div>

  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Comentario:</label>
    <textarea name="comentario4" id="comentario4" class="form-control" rows="5"></textarea>
  </div>


  <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <label>FORMATO CLARO:</label>
  
    <input type="hidden" name="imagenactual6" id="imagenactual6">
    <a id="archivo6" href="#"></br>
    <img src="../public/images/excel.png" alt="DESCARGAR ESTUCIO DE CAMPO" style="width:50px;height:40px;">
    <u>FORMATO CLARO</u>
    </a>

    <input type="file" class="form-control" name="imagen6" id="imagen6" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
   
  </div>

  <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
  <label>Estado:</label>
    <select class="form-control select-picker" name="estado_sitio_3" id="estado_sitio_3" required>
      <option value="APROBADO">APROBADO</option>
      <option value="RECHAZADO">RECHAZADO</option>
      <option value="PENDIENTE">PENDIENTE</option>
      <option value="C4">C4</option>
    </select>

     <select class="form-control select-picker" name="estado_sitisssss" id="estado_sitisssss" required>
      <option value="C1">C1</option>
      <option value="C2">C2</option>
      <option value="C3">C3</option>
      <option value="C4">C4</option>
    </select>
  </div>

  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Comentario:</label>
    <textarea name="comentario4" id="comentario4" class="form-control" rows="5"></textarea>
  </div>


  

  <!-- <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <label>ACTA DE COMPROMISO:</label>
  
    <input type="hidden" name="imagenactual2" id="imagenactual2">
    <a id="archivo2" href="#"></br>
    <img src="../public/images/pdf.png" alt="DESCARGAR ACTA DE COMPRIMISO" style="width:50px;height:40px;">
    ACTA DE COMPROMISO.pdf
    </a>

    <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/msword,image/gif,image/jpeg,application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.zip">
   
  </div>

  <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
  <label>Estado:</label>
    <select class="form-control select-picker" name="estado_sitio" id="estado_sitio" required>
      <option value="APROBADO">APROBADO</option>
      <option value="RECHAZADO">RECHAZADO</option>
      <option value="PENDIENTE">PENDIENTE</option>
      <option value="C4">C4</option>
     
    </select>
    <select class="form-control select-picker" name="estado_sitio" id="estado_sitio" required>
      <option value="C1">C1</option>
      <option value="C2">C2</option>
      <option value="C3">C3</option>
      <option value="C4">C4</option>
     
    </select>
   
  </div>

  <div class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
    <label>Comentario:</label>

  
 
    <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
  </div>
  

  <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <label>DIAGRAMA DE INFLUENCIA:</label>
  
    <input type="hidden" name="imagenactual2" id="imagenactual2">
    <a id="archivo2" href="#"></br>
    <img src="../public/images/pdf.png" alt="DESCARGAR ESTUCIO DE CAMPO" style="width:50px;height:40px;">
    DIAGRAMA DE INFLUENCIA.pdf
    </a>

    <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/msword,image/gif,image/jpeg,application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.zip">
   
  </div> -->

 
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

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 65% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">BASE DE DATOS A BENEFICIAR MINTIC</h4>
        </div>
        <div class="modal-body table-responsive">
          <table id="tblarticulos" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="2" width="100%">
          <thead>
                            <th>Consecutivo</th>
                            <th>ID_Beneficiario</th>
                            <th>Matricula</th>
                            <th>Dane_Depart</th>
                            <th>Departamento</th>
                            <th>Dane_Municipio</th>
                            <th>Municipio</th>
                            <th>Regional</th>
                            <th>Centro_Poblado</th>
                            <th>Dane Institucion</th>
                            <th>Institucion</th>
                            <th>Dane Sede</th>
                            <th>Sede</th>
                            <th>Tipo Sitio</th>
                            <th>Detalle_Sitio</th>
                            <th>Emergencia</th>
                            <th>Region</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Consecutivo</th>
                            <th>ID_Beneficiario</th>
                            <th>Matricula</th>
                            <th>Dane_Depart</th>
                            <th>Departamento</th>
                            <th>Dane_Municipio</th>
                            <th>Municipio</th>
                            <th>Regional</th>
                            <th>Centro_Poblado</th>
                            <th>Dane Institucion</th>
                            <th>Institucion</th>
                            <th>Dane Sede</th>
                            <th>Sede</th>
                            <th>Tipo Sitio</th>
                            <th>Detalle_Sitio</th>
                            <th>Emergencia</th>
                            <th>Region</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
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
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/siteescuelas.js"></script>
<?php 
}

ob_end_flush();
?>