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


if ($_SESSION['asecones_escuelas_coordinador']==1 )
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
                     <?php require 'navegador2600.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">EVENTOS// <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button><a>
                            </a></br></br>
                         <button class="btn btn-success" id="btndocumentos" onclick="myInformacion()">   DOCUMENTOS</button>
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
                            <th>ESTACION</br>BASE</th>
                            <th>SMP</th>
                            <th>DOCUMENTADOR</th>
                            <th>OBSERVACIONES</th>
                            <th>LIDER DE</br>CUADRILLA</th>
                            <th>TSS</th>
                            <th>PACKING LIST</th>
                            <th>INVENTARIO </br>DE HADWARE CONTROL</th>
                            <th>FORMATO FOTOGRAFICO</br>DE SERIALES</th>
                            <th>ARCHIVOS DE</br>COMISIONAMIENTO</br>PRE</th>
                            <th>FORMATO REPORTE RADIANTE</br>PRE</th>
                            <th>ACTA HFD</th>
                            <th>ACTA HFNI</th>
                            <th>ACTA HB</th>
                            <th>FORMATO REPORTE RADIANTE</br>POST</th>
                            <th>ARCHIVOS DE</br>COMISIONAMIENTO</br>POST</th>
                            <th>REGISTRO</br>FOTOGRAFICO BTS</th>
                            <th>PRUEBAS DE </br>VOZ & DATOS</th>
                            <th>ESTADO</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          </tr>
                        </table>
                </div>


  
             <div class="panel-body" id="formularioregistros">
                <form name="formulario" id="formulario" method="POST">

                  <!--Campos Informacion-->
      <div id="divInformacion">
                  
                     <!-- Informacion del sito -->
                        <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                           <h3 class="text-primary">Información del Sitio  </h3>
                           <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        </div>
                      <!-- Campo ID Sitio -->
                    <div id="MyI1" class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="idsite" id="idsite">
                             <label>ID del Sitio:(*):</label>
                             <input type="text" class="form-control" name="codigo" id="codigo" maxlength="100" placeholder="Nombre" >
                    </div>
                     <!-- Campo Nombre del Sitio -->
                          <div id="MyI2" class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre del Sitio:(*):</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" >
                          </div>
                    <!-- Proyecto -->
                          <div id="MyI3" class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Proyecto(*):</label>
                            <select id="idproyecto" name="idproyecto" class="form-control selectpicker" data-live-search="true" ></select>
                          </div>


                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                           <h3 class="text-primary">RESPONSABLE EN CAMPO</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>


                           <!--Carrier -->
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Lider Cuadrilla(*):</label>
                          <select class="form-control select-picker" 
                          data-live-search="true" name="lider_cuadrilla" id="lider_cuadrilla"></select>
                      </div>

                            <!--Torrero -->
                            <div id="MyI5" class="form-group col-lg-3 col-md-1 col-sm-6 col-xs-12">
                            <label>Estado en Campo:(*):</label>
                            <select class="form-control select-picker" name="estado_campo" id="estado_campo" >
                              <option value="DETENIDO">DETENIDO</option>
                              <option value="EN PROCESO">EN PROCESO</option>
                              <option value="FINALIZADO">FINALIZADO</option>
                            </select>
                          </div>


                           <!--Torrero -->
                           <div id="MyI5" class="form-group col-lg-3 col-md-1 col-sm-6 col-xs-12">
                            <label>Actividad:(*):</label>
                            <select class="form-control select-picker" name="actividad" id="actividad" >
                              <option value="INSTALACION">INSTALACION</option>
                              <option value="INTEGRACION">INTEGRACION</option>
                              <option value="INTEGRACION">DESMONTE</option>
                              <option value="DOCUMENTACION">DOCUMENTACION</option>
                            </select>
                          </div>


                   <!-- Codigo y nombre para el torrero -->
                          <div id="MyI4" class="form-group col-lg-12 col-md-1 col-sm-6 col-xs-12">
                              <label>Observaciones:(*):</label>
                              <textarea name="observaciones_campo" id="observaciones_campo" class="form-control" rows="3"></textarea>
                          </div>
                          
                   <!--Tipo Ubicacion -->
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                           <h3 class="text-primary">RESPONSABLE EN DOCUMENTACION</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                      <!--Regional -->
                          <div id="myU1" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                          <!-- <hr style="height:2px;border-width:0;color:gray;background-color:gray"> -->
                              <label>Documentador(*):</label>
                          <select class="form-control select-picker"  data-live-search="true" name="documentador" id="documentador"></select>
                          </div>
                        <!--Departamento -->
                          <div  id="myU2" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Documentacion Pre(*):</label>
                            <select class="form-control select-picker"  data-live-search="true" name="doc_pre" id="doc_pre"   >
                            <option value="PENDIENTE">PENDIENTE</option>
                            <option value="APROBADO">APROBADO</option>
                            </select>
                          </div>

                                      <!--Categoria -->
                        <div id="myU4" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Documentacion Post(*):</label>
                            <select class="form-control select-picker" name="doc_post" id="doc_post" >
                            <option value="PENDIENTE">PENDIENTE</option>
                            <option value="APROBADO">APROBADO</option>
                            </select>
                          </div>
                        <!--Cabecera Municipal Dane -->
                          <div id="myU3" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <label>Observaciones:(*):</label>
                              <textarea name="observaciones_doc" id="observaciones_doc" class="form-control" rows="3"></textarea>
                          </div>

                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                           <h3 class="text-primary">RESPONSABLE EN NOKIA</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>
          
                      <!--Direccion -->
                          <div id="myU5" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Auditor (*):</label>
                                <select class="form-control select-picker" name="auditor" id="auditor" >
                                <option value="Angie">Angie</option>
                                <option value="Freddy">Freddy</option>
                                <option value="Jenny">Jenny</option>
                                <option value="Luz Ceny">Luz Ceny</option>
                                </select>
                          </div>
                          <div id="myU7" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado(*):</label>
                            <select class="form-control select-picker" name="estado_nokia" id="estado_nokia" >
                            <option value="PENDIENTE">PENDIENTE</option>
                            <option value="APROBADO">APROBADO</option>
                            </select>
                          </div>
                      <!--Latitud -->
                          <div id="myU6" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion Nokia(*):</label>
                            <textarea name="observaciones_nokia" id="observaciones_nokia" class="form-control" rows="3"></textarea>
                          </div>
                      <!--Longitud -->
                      </div>



                <div class="panel-body table-responsive" id="listadoregistros2">
                        <table id="tbllistado2">
                          <thead>
                          <tr></tr>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Numero</th>
                            <th>Elmento</th>
                            <th>Modelo</th>
                            <th>Serial</th>
                            <th>Estado</th>
                            <th>Ubicacion</th>
                            <th>Sitio_Final</th>
                            <th>Observacion</th>
                            <th>Imagen</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Numero</th>
                            <th>Modelo</th>
                            <th>Elemento</th>
                            <th>Serial</th>
                            <th>Estado</th>
                            <th>Ubicacion</th>
                            <th>Sitio_Final</th>
                            <th>Observacion</th>
                            <th>Imagen</th>
                          </tfoot>
                        </table>
                    </div>
                   
                      <div id="divDocumentos">
                      
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <h3 class="text-primary">DOCUMENTACION PRE</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>TSS:</label></br>

                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#">
                            <img src="../public/images/excel.png" alt="TSS" style="width:50px;height:40px;">
                            TSS.xmls

                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>
                          
                    <!--Adjunto Packing List -->
                    
                       <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>PACKING LIST:</label>

                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#" target="_blank"> </br>
                            <img src="../public/images/pdf.png" alt="PACKING LIST" style="width:50px;height:40px;">
                            PACKING LIST.pdf
                            </a>
                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/.pdf">
                       </div>


                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>Hadware Control:</label>
                            <input type="hidden" name="imagenactual3" id="imagenactual3">
                            <a id="archivo3" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            HW CONTROL.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen3" id="imagen3" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>


                          <div class="form-group col-lg-8 col-md-8 col-sm-6 col-xs-12">
                            <label>Formato Registro Fotografico de Seriales:</label>
                            <input type="hidden" name="imagenactual4" id="imagenactual4">
                            <a id="archivo4" href="#"></br>
                            <img src="../public/images/excel.png" alt="SERIALES" style="width:50px;height:40px;">
                            SERIALES.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen4" id="imagen4" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>


                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>Archivos de Comisionamiento PRE:</label>
                            <input type="hidden" name="imagenactual5" id="imagenactual5">
                            <a id="archivo5" href="#"></br>
                              <img src="../public/images/winrar.png" alt="Comisionamiento PRE" style="width:50px;height:40px;">
                              COMISIONAMIENTO_PRE.rar
                              </a>
                            <input type="file" class="form-control" name="imagen5" id="imagen5" accept="application/zip,.rar">
                          </div>


                          <div class="form-group col-lg-8 col-md-2 col-sm-6 col-xs-12">
                            <label>Reporte Radiante PRE:</label>
                            <input type="hidden" name="imagenactual6" id="imagenactual6">
                            <a id="archivo6" href="#"></br>
                            <img src="../public/images/excel.png" alt="REPORTE RADIENTE PRE" style="width:50px;height:40px;">
                            REPORTE RADIANTE PRE.xml
                            </a>
                            <input type="file" class="form-control" name="imagen6" id="imagen6" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div> 

                          </<br>
                         
                      <!-- Registro Fotografico BTS -->

                      <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                          
                          <h3 class="text-info">ACTAS</h3>
                          <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>
                   
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>ACTA HFD</label>
                            <input type="hidden" name="imagenactual7" id="imagenactual7">
                            <a id="archivo7" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            ACTAS..XML
                            </a>
                            <input type="file" class="form-control" name="imagen7" id="imagen7" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>


                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>ACTA HFNI</label>
                            <input type="hidden" name="imagenactual8" id="imagenactual8">
                            <a id="archivo8" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            ACTAS..XML
                            </a>
                            <input type="file" class="form-control" name="imagen8" id="imagen8" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">

                          </div>

                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>ACTA HB</label>
                            <input type="hidden" name="imagenactual9" id="imagenactual9">
                            <a id="archivo9" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            ACTAS..XML
                            </a>
                            <input type="file" class="form-control" name="imagen9" id="imagen9" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </br>
                          </div> 
                         </br>

                        </<br>
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                          
                          <h3 class="text-info">DOCUMENTACION POST</h3>
                          <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>


                          <div class="form-group col-lg-6 col-md-8 col-sm-6 col-xs-12">
                            <label>Reporte Radiante POST:</label>
                            <input type="hidden" name="imagenactual10" id="imagenactual10">
                            <a id="archivo10" href="#"></br>
                            <img src="../public/images/excel.png" alt="REPORTE RADIENTE" style="width:50px;height:40px;">
                            RADIANTE_POST.xml
                            </a>
                            <input type="file" class="form-control" name="imagen10" id="imagen10" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>Archivos de Comisionamiento POST:</label>
                            <input type="hidden" name="imagenactual11" id="imagenactual11">
                            <a id="archivo11" href="#"></br>
                           <img src="../public/images/winrar.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            COMISIONAMIENTO_POST.rar
                            </a>
                            <input type="file" class="form-control" name="imagen11" id="imagen11" accept="application/zip,.rar">
                          </div>

                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>Registro Fotografico BTS:</label>
                            <input type="hidden" name="imagenactual12" id="imagenactual12">
                            <a id="archivo12" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            REGISTRO BTS.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen12" id="imagen12" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>


                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>Pruebas De Voz y Datos:</label>
                            <input type="hidden" name="imagenactual13" id="imagenactual13">
                            <a id="archivo13" href="#"></br>
                            <img src="../public/images/excel.png" alt="Pruebas V&D" style="width:50px;height:40px;">
                            REGISTRO PREUBAS VOZ & DATOS.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen13" id="imagen13" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>


                    </div>
                    </br>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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
else if ($_SESSION['asecones_escuelas_documentador']==1 or $_SESSION['logistica']==1 ) 
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
                  <?php require 'navegador2600.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title"></br>
                         <button class="btn btn-success" id="btndocumentos" onclick="myInformacion()">   DOCUMENTOS</button>
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
                            <th>ESTACION</br>BASE</th>
                            <th>SMP</th>
                            <th>LIDER DE</br>CUADRILLA</th>
                            <th>PENDIENTES</br>DOCUMENTACION</th>
                            <th>TSS</th>
                            <th>PACKING LIST</th>
                            <th>INVENTARIO </br>DE HADWARE CONTROL</th>
                            <th>FORMATO FOTOGRAFICO</br>DE SERIALES</th>
                            <th>ARCHIVOS DE</br>COMISIONAMIENTO</br>PRE</th>
                            <th>FORMATO REPORTE RADIANTE</br>PRE</th>
                            <th>ACTA HFD</th>
                            <th>ACTA HFNI</th>
                            <th>ACTA HB</th>
                            <th>FORMATO REPORTE RADIANTE</br>POST</th>
                            <th>ARCHIVOS DE</br>COMISIONAMIENTO</br>POST</th>
                            <th>REGISTRO</br>FOTOGRAFICO BTS</th>
                            <th>PRUEBAS DE </br>VOZ & DATOS</th>
                            <th>ESTADO</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          </tr>
                        </table>
                </div>


  
             <div class="panel-body" id="formularioregistros">
                <form name="formulario" id="formulario" method="POST">

                  <!--Campos Informacion-->
      <div id="divInformacion">
                  
                     <!-- Informacion del sito -->
                        <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                           <h3 class="text-primary">Información del Sitio  </h3>
                           <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        </div>
                      <!-- Campo ID Sitio -->
                    <div id="MyI1" class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="idsite" id="idsite">
                             <label>ID del Sitio:(*):</label>
                             <input type="text" class="form-control" name="codigo" id="codigo" maxlength="100" placeholder="Nombre" >
                    </div>
                     <!-- Campo Nombre del Sitio -->
                          <div id="MyI2" class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre del Sitio:(*):</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" >
                          </div>
                    <!-- Proyecto -->
                          <div id="MyI3" class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Proyecto(*):</label>
                            <select id="idproyecto" name="idproyecto" class="form-control selectpicker" data-live-search="true" ></select>
                          </div>


                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                           <h3 class="text-primary">RESPONSABLE EN CAMPO</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>


                           <!--Carrier -->
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Lider Cuadrilla(*):</label>
                          <select class="form-control select-picker" 
                          data-live-search="true" name="lider_cuadrilla" id="lider_cuadrilla"></select>
                      </div>

                            <!--Torrero -->
                            <div id="MyI5" class="form-group col-lg-3 col-md-1 col-sm-6 col-xs-12">
                            <label>Estado en Campo:(*):</label>
                            <select class="form-control select-picker" name="estado_campo" id="estado_campo" >
                              <option value="DETENIDO">DETENIDO</option>
                              <option value="EN PROCESO">EN PROCESO</option>
                              <option value="FINALIZADO">FINALIZADO</option>
                            </select>
                          </div>


                           <!--Torrero -->
                           <div id="MyI5" class="form-group col-lg-3 col-md-1 col-sm-6 col-xs-12">
                            <label>Actividad:(*):</label>
                            <select class="form-control select-picker" name="actividad" id="actividad" >
                              <option value="INSTALACION">INSTALACION</option>
                              <option value="INTEGRACION">INTEGRACION</option>
                              <option value="INTEGRACION">DESMONTE</option>
                              <option value="DOCUMENTACION">DOCUMENTACION</option>
                            </select>
                          </div>


                   <!-- Codigo y nombre para el torrero -->
                          <div id="MyI4" class="form-group col-lg-12 col-md-1 col-sm-6 col-xs-12">
                              <label>Observaciones:(*):</label>
                              <textarea name="observaciones_campo" id="observaciones_campo" class="form-control" rows="3"></textarea>
                          </div>
                          
                   <!--Tipo Ubicacion -->
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                           <h3 class="text-primary">RESPONSABLE EN DOCUMENTACION</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                      <!--Regional -->
                          <!-- <div id="myU1" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                              <label>Documentador(*):</label>
                          <select class="form-control select-picker"  data-live-search="true" name="documentador" id="documentador"></select>
                          </div> -->
                        <!--Departamento -->
                          <div  id="myU2" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Documentacion Pre(*):</label>
                            <select class="form-control select-picker"  data-live-search="true" name="doc_pre" id="doc_pre"   >
                            <option value="PENDIENTE">PENDIENTE</option>
                            <option value="APROBADO">APROBADO</option>
                            </select>
                          </div>

                                      <!--Categoria -->
                        <div id="myU4" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Documentacion Post(*):</label>
                            <select class="form-control select-picker" name="doc_post" id="doc_post" >
                            <option value="PENDIENTE">PENDIENTE</option>
                            <option value="APROBADO">APROBADO</option>
                            </select>
                          </div>
                        <!--Cabecera Municipal Dane -->
                          <div id="myU3" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <label>Observaciones:(*):</label>
                              <textarea name="observaciones_doc" id="observaciones_doc" class="form-control" rows="3"></textarea>
                          </div>

                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                           <h3 class="text-primary">RESPONSABLE EN NOKIA</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>
          
                      <!--Direccion -->
                          <div id="myU5" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Auditor (*):</label>
                                <select class="form-control select-picker" name="auditor" id="auditor" >
                                <option value="Angie">Angie</option>
                                <option value="Freddy">Freddy</option>
                                <option value="Jenny">Jenny</option>
                                <option value="Luz Ceny">Luz Ceny</option>
                                </select>
                          </div>
                          <div id="myU7" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado(*):</label>
                            <select class="form-control select-picker" name="estado_nokia" id="estado_nokia" >
                            <option value="PENDIENTE">PENDIENTE</option>
                            <option value="APROBADO">APROBADO</option>
                            </select>
                          </div>
                      <!--Latitud -->
                          <div id="myU6" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion Nokia(*):</label>
                            <textarea name="observaciones_nokia" id="observaciones_nokia" class="form-control" rows="3"></textarea>
                          </div>
                      <!--Longitud -->
                      </div>



                <div class="panel-body table-responsive" id="listadoregistros2">
                        <table id="tbllistado2">
                          <thead>
                          <tr></tr>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Numero</th>
                            <th>Elmento</th>
                            <th>Modelo</th>
                            <th>Serial</th>
                            <th>Estado</th>
                            <th>Ubicacion</th>
                            <th>Sitio_Final</th>
                            <th>Observacion</th>
                            <th>Imagen</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Numero</th>
                            <th>Modelo</th>
                            <th>Elemento</th>
                            <th>Serial</th>
                            <th>Estado</th>
                            <th>Ubicacion</th>
                            <th>Sitio_Final</th>
                            <th>Observacion</th>
                            <th>Imagen</th>
                          </tfoot>
                        </table>
                    </div>
                   
                      <div id="divDocumentos">
                      
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <h3 class="text-primary">DOCUMENTACION PRE</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>TSS:</label></br>

                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#">
                            <img src="../public/images/excel.png" alt="TSS" style="width:50px;height:40px;">
                            TSS.xmls

                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>
                          
                    <!--Adjunto Packing List -->
                    
                       <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>PACKING LIST:</label>

                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#" target="_blank"> </br>
                            <img src="../public/images/pdf.png" alt="PACKING LIST" style="width:50px;height:40px;">
                            PACKING LIST.pdf
                            </a>
                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/.pdf">
                       </div>


                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>Hadware Control:</label>
                            <input type="hidden" name="imagenactual3" id="imagenactual3">
                            <a id="archivo3" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            HW CONTROL.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen3" id="imagen3" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>


                          <div class="form-group col-lg-8 col-md-8 col-sm-6 col-xs-12">
                            <label>Formato Registro Fotografico de Seriales:</label>
                            <input type="hidden" name="imagenactual4" id="imagenactual4">
                            <a id="archivo4" href="#"></br>
                            <img src="../public/images/excel.png" alt="SERIALES" style="width:50px;height:40px;">
                            SERIALES.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen4" id="imagen4" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>


                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>Archivos de Comisionamiento PRE:</label>
                            <input type="hidden" name="imagenactual5" id="imagenactual5">
                            <a id="archivo5" href="#"></br>
                              <img src="../public/images/winrar.png" alt="Comisionamiento PRE" style="width:50px;height:40px;">
                              COMISIONAMIENTO_PRE.rar
                              </a>
                            <input type="file" class="form-control" name="imagen5" id="imagen5" accept="application/zip,.rar">
                          </div>


                          <div class="form-group col-lg-8 col-md-2 col-sm-6 col-xs-12">
                            <label>Reporte Radiante PRE:</label>
                            <input type="hidden" name="imagenactual6" id="imagenactual6">
                            <a id="archivo6" href="#"></br>
                            <img src="../public/images/excel.png" alt="REPORTE RADIENTE PRE" style="width:50px;height:40px;">
                            REPORTE RADIANTE PRE.xml
                            </a>
                            <input type="file" class="form-control" name="imagen6" id="imagen6" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div> 

                          </<br>
                         
                      <!-- Registro Fotografico BTS -->

                      <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                          
                          <h3 class="text-info">ACTAS</h3>
                          <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>
                   
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>ACTA HFD</label>
                            <input type="hidden" name="imagenactual7" id="imagenactual7">
                            <a id="archivo7" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            ACTAS..XML
                            </a>
                            <input type="file" class="form-control" name="imagen7" id="imagen7" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>


                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>ACTA HFNI</label>
                            <input type="hidden" name="imagenactual8" id="imagenactual8">
                            <a id="archivo8" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            ACTAS..XML
                            </a>
                            <input type="file" class="form-control" name="imagen8" id="imagen8" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">

                          </div>

                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>ACTA HB</label>
                            <input type="hidden" name="imagenactual9" id="imagenactual9">
                            <a id="archivo9" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            ACTAS..XML
                            </a>
                            <input type="file" class="form-control" name="imagen9" id="imagen9" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </br>
                          </div> 
                         </br>

                        </<br>
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                          
                          <h3 class="text-info">DOCUMENTACION POST</h3>
                          <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>


                          <div class="form-group col-lg-6 col-md-8 col-sm-6 col-xs-12">
                            <label>Reporte Radiante POST:</label>
                            <input type="hidden" name="imagenactual10" id="imagenactual10">
                            <a id="archivo10" href="#"></br>
                            <img src="../public/images/excel.png" alt="REPORTE RADIENTE" style="width:50px;height:40px;">
                            RADIANTE_POST.xml
                            </a>
                            <input type="file" class="form-control" name="imagen10" id="imagen10" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>Archivos de Comisionamiento POST:</label>
                            <input type="hidden" name="imagenactual11" id="imagenactual11">
                            <a id="archivo11" href="#"></br>
                           <img src="../public/images/winrar.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            COMISIONAMIENTO_POST.rar
                            </a>
                            <input type="file" class="form-control" name="imagen11" id="imagen11" accept="application/zip,.rar">
                          </div>

                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>Registro Fotografico BTS:</label>
                            <input type="hidden" name="imagenactual12" id="imagenactual12">
                            <a id="archivo12" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            REGISTRO BTS.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen12" id="imagen12" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>


                          <div class="form-group col-lg-8 col-md-6 col-sm-6 col-xs-12">
                            <label>Pruebas De Voz y Datos:</label>
                            <input type="hidden" name="imagenactual13" id="imagenactual3">
                            <a id="archivo13" href="#"></br>
                            <img src="../public/images/excel.png" alt="Pruebas V&D" style="width:50px;height:40px;">
                            REGISTRO PREUBAS VOZ & DATOS.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen13" id="imagen13" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>


                    </div>
                    </br>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary"  type="submit" id="btnGuardar"><i class="fa fa-save"></i> ACTUALIZAR</button>
                            <button class="btn btn-danger" onclick="cancelarform()" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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
else if ($_SESSION['cliente_ofg']==1 ) 
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
                     <?php require 'navegador2600.php'; ?>
                    <div class="box-header with-border">
                          
                    <button class="btn btn-danger" id="btnhw" onclick="myInfo()">HADWARE</button></h1>

                    
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
                            <th>ESTACION</br>BASE</th>
                            <th>SMP</th>
                            <th>DOCUMENTADOR</th>
                            <th>OBSERVACIONES</th>
                            <th>LIDER DE</br>CUADRILLA</th>
                            <th>TSS</th>
                            <th>PACKING LIST</th>
                            <th>INVENTARIO </br>DE HADWARE CONTROL</th>
                            <th>FORMATO FOTOGRAFICO</br>DE SERIALES</th>
                            <th>ARCHIVOS DE</br>COMISIONAMIENTO</br>PRE</th>
                            <th>FORMATO REPORTE RADIANTE</br>PRE</th>
                            <th>ACTA HFD</th>
                            <th>ACTA HFNI</th>
                            <th>ACTA HB</th>
                            <th>FORMATO REPORTE RADIANTE</br>POST</th>
                            <th>ARCHIVOS DE</br>COMISIONAMIENTO</br>POST</th>
                            <th>FORMATO REGISTRO BTS</br>O FORMATO ATP</th>
                            <th>PRUEBAS V&D</br>O PRUEBAS KPI</th>
                            <th>ESTADO</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          </tr>
                        </table>
                    
                </div>
                    
  
             <div class="panel-body" id="formularioregistros">
                <form name="formulario" id="formulario" method="POST">

                  <!--Campos Informacion-->
      <div id="divInformacion">
                  
                     <!-- Informacion del sito -->
                        <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                           <h3 class="text-primary">Información del Sitio  </h3>
                           <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        </div>
                      <!-- Campo ID Sitio -->
                    <div id="MyI1" class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="idsite" id="idsite">
                             <label>ID del Sitio:(*):</label>
                             <input type="text" class="form-control" name="codigo" id="codigo" maxlength="100" placeholder="Nombre" >
                    </div>
                     <!-- Campo Nombre del Sitio -->
                          <div id="MyI2" class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre del Sitio:(*):</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" >
                          </div>
                    <!-- Proyecto -->
                          <div id="MyI3" class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Proyecto(*):</label>
                            <select id="idproyecto" name="idproyecto" class="form-control selectpicker" data-live-search="true" ></select>
                          </div>

                            <!--Torrero -->
                            <div id="MyI5" class="form-group col-lg-6 col-md-1 col-sm-6 col-xs-12">
                            <label>Tipo De Sitio:(*):</label>
                            <select class="form-control select-picker" name="torrero" id="torrero" >
                              <option value="Administrativo">Administrativo</option>
                              <option value="Sitio Propio">Sitio Propio</option>
                              <option value="Movil">Movil</option>
                              <option value="Cosite">Cosite</option>
                              <option value="Poste Concreto">Poste Concreto</option>
                              <option value="Poste Metalico">Poste Metalico</option>
                              <option value="FastSite">FastSite</option>
                              <option value="Valla Publicitaria">Valla Publicitaria</option>
                            </select>
                          </div>

                   <!-- Codigo y nombre para el torrero -->
                   <div id="MyI4" class="form-group col-lg-7 col-md-1 col-sm-6 col-xs-12">
                              <label>Observaciones:(*):</label>
                              <textarea name="nombre2" id="nombre2" class="form-control" rows="3"></textarea>
                          </div>
                          
                
                          <!-- <button class="btn btn-primary" onclick="myUbicacion()"><i class="fa fa-plus-circle"></i>Ubicacion</button>
                  </br>
                  </br> -->
                          <!-- <h3 class="text-primary">Ubicacion</h3> -->
       
                   <!--Tipo Ubicacion -->
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                           <h3 class="text-primary">Ubicacion</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                      <!--Regional -->
                          <div id="myU1" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <!-- <hr style="height:2px;border-width:0;color:gray;background-color:gray"> -->
                            <label>Regional(*):</label>
                            <select class="form-control select-picker" name="regional" id="regional" >
                              <option value="CENTRO ORIENTE">CENTRO ORIENTE</option>
                              <option value="COSTA">COSTA</option>
                              <option value="NORIENTE">NORIENTE</option>
                              <option value="NOROCCIDENTE">NOROCCIDENTE</option>
                            </select>
                          </div>
                        <!--Departamento -->
                          <div  id="myU2" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Departamento(*):</label>
                            <select class="form-control select-picker"  data-live-search="true" name="departamento" id="departamento"   >
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
                        <!--Cabecera Municipal Dane -->
                          <div id="myU3" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Documentacion PRE(*):</label>
                            <input type="text" class="form-control" name="municipal_dane" id="municipal_dane" maxlength="100" placeholder="CABECERA MUNICIPAL DANE" >
                          </div>
                      <!--Categoria -->
                          <div id="myU4" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Categoria(*):</label>
                            <select class="form-control select-picker" name="categoria" id="categoria" >
                              <option value="RURAL">RURAL</option>
                              <option value="URBANO">URBANO</option>
                            </select>
                          </div>
                      <!--Direccion -->
                          <div id="myU5" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Direccion(*):</label>
                              <input type="text" class="form-control" name="direccion" id="direccion" maxlength="100" placeholder="Direccion" >
                          </div>
                      <!--Latitud -->
                          <div id="myU6" class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Latitud:(*):</label>
                              <input type="text" class="form-control" name="latitud" id="latitud" maxlength="100" placeholder="Latitud" >
                          </div>
                      <!--Longitud -->
                          <div id="myU7" class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Longitud:(*):</label>
                              <input type="text" class="form-control" name="longitud" id="longitud" maxlength="100" placeholder="Longitud" >
                          </div>

                           <div class="form-group col-lg-1 col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control" name="documentador" id="documentador" maxlength="100" placeholder="Longitud" readonly>
                         
                            </div>

                   
                      </div>


                <div class="panel-body table-responsive" id="listadoregistros2">
                        <table id="tbllistado2" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Numero</th>
                            <th>Elmento</th>
                            <th>Modelo</th>
                            <th>Serial</th>
                            <th>Estado</th>
                            <th>Ubicacion</th>
                            <th>Sitio_Final</th>
                            <th>Observacion</th>
                            <th>Imagen</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Numero</th>
                            <th>Modelo</th>
                            <th>Elemento</th>
                            <th>Serial</th>
                            <th>Estado</th>
                            <th>Ubicacion</th>
                            <th>Sitio_Final</th>
                            <th>Observacion</th>
                            <th>Imagen</th>
                          </tfoot>
                        </table>
                    </div>
                   
                      <div id="divDocumentos">
                      
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <h3 class="text-primary">Documentos</h3>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>


                         
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>TSS:</label>

                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#"></br>
                            <img src="../public/images/excel.png" alt="TSS" style="width:50px;height:40px;">
                            TSS.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>
                          

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Estado:</label>
                          <select class="form-control select-picker" name="banda12" id="banda12">
                              <option value="CARGADO">CARGADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                            </select>
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga2" id="fecha_carga2" maxlength="100" placeholder="Direccion">
                         
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>

                            <textarea name="observacion2" id="observacion2" class="form-control" rows="5"></textarea>
                            &nbsp
                            &nbsp
                          </div>


                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                          
                       
                    <!--Adjunto Packing List -->
                    
                       <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>PACKING LIST:</label>

                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#" target="_blank"> </br>
                            <img src="../public/images/pdf.png" alt="PACKING LIST" style="width:50px;height:40px;">
                            PACKING LIST.pdf
                            </a>
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/.pdf">
                       </div>

                       <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                           <label>Estado:</label>
                          <select class="form-control select-picker" name="banda11" id="banda11">
                              <option value="CARGADO">CARGADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                            </select>
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga" id="fecha_carga" maxlength="100" placeholder="Direccion">
                          
                        
                      </div>

                       <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>
                            <textarea name="observacion" id="observacion" class="form-control" rows="5"></textarea>
                      </div>
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>
                          
                      
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Estado:</label>
                          <select class="form-control select-picker" name="banda13" id="banda13">
                              <option value="CARGADO">CARGADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                            </select>
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga3" id="fecha_carga3" maxlength="100">
                          
                        
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>
                            <textarea name="observacion3" id="observacion3" class="form-control" rows="3"></textarea>
                            &nbsp
                            &nbsp
                            </div>

                            <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Formato Registro Fotografico de Seriales:</label>
                            <input type="hidden" name="imagenactual4" id="imagenactual4">
                            <a id="archivo4" href="#"></br>
                            <img src="../public/images/excel.png" alt="SERIALES" style="width:50px;height:40px;">
                            SERIALES.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen4" id="imagen4" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Estado:</label>
                          <select class="form-control select-picker" name="banda21" id="banda21" >
                              <option value="CARGADO">CARGADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                            </select>
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga4" id="fecha_carga4" maxlength="100" placeholder="Direccion">
                         
                        
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>


                            <textarea name="observacion4" id="observacion4" class="form-control" rows="3"></textarea>


                          </div>

                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>


                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Reporte Radiante PRE-POST:</label>
                            <input type="hidden" name="imagenactual5" id="imagenactual5">
                            <a id="archivo5" href="#"></br>
                            <img src="../public/images/winrar.png" alt="Reporte Radiante" style="width:50px;height:40px;">
                            RADIANTE_PRE_POST.rar
                            </a>
                            <input type="file" class="form-control" name="imagen5" id="imagen5" accept="application/zip,.rar">
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Estado:</label>
                          <select class="form-control select-picker" name="banda22" id="banda22">
                              <option value="CARGADO">CARGADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                            </select>
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga5" id="fecha_carga5" maxlength="100" placeholder="Direccion">
                         
                        
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>


                            <textarea name="altura11" id="altura11" class="form-control" rows="3"></textarea>


                          </div>





                        <!-- Acta de Desmonte -->
                          
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Actas:</label>
                            <input type="hidden" name="imagenactual6" id="imagenactual6">
                            <a id="archivo6" href="#"></br>
                            <img src="../public/images/winrar.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            ACTAS.rar
                            </a>
                            <input type="file" class="form-control" name="imagen7" id="imagen7" accept="application/zip,.rar">

                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Estado:</label>
                          <select class="form-control select-picker" name="banda23" id="banda23">
                              <option value="CARGADO">CARGADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                            </select>
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga6" id="fecha_carga6" maxlength="100" >
                         
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>

                            <textarea name="altura12" id="altura12" class="form-control" rows="3"></textarea>


                          </div>


                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>


                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Archivos de comisionamiento PRE-POST:</label>
                            <input type="hidden" name="imagenactual7" id="imagenactual7">
                            <a id="archivo7" href="#"></br>
                            <img src="../public/images/winrar.png" alt="Comisionamiento" style="width:50px;height:40px;">
                            COMISIONAMIENTO.rar
                            </a>
                            <input type="file" class="form-control" name="imagen7" id="imagen7" accept="application/zip,.rar">
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Estado:</label>
                          <select class="form-control select-picker" name="banda31" id="banda31" >
                              <option value="CARGADO">CARGADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                            </select>
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga7" id="fecha_carga7" maxlength="100" >
                         
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>

                            <textarea name="altura13" id="altura13" class="form-control" rows="3"></textarea>


                          </div>

                      <!-- Registro Fotografico BTS -->
                        
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Registro Fotografico BTS:</label>
                            <input type="hidden" name="imagenactual8" id="imagenactual8">
                            <a id="archivo8" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            REGISTRO BTS.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen8" id="imagen8" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Estado:</label>
                          <select class="form-control select-picker" name="banda32" id="banda32" >
                              <option value="CARGADO">CARGADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                            </select>
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga8" id="fecha_carga8" maxlength="100" >
                         
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>

                            <textarea name="altura21" id="altura21" class="form-control" rows="3"></textarea>
                          </div>

                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>



                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Pruebas De Voz y Datos:</label>
                            <input type="hidden" name="imagenactual9" id="imagenactual9">
                            <a id="archivo9" href="#"></br>
                            <img src="../public/images/excel.png" alt="Acta Desmonte" style="width:50px;height:40px;">
                            PRUBAS V&D.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen9" id="imagen9" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Estado:</label>
                          <select class="form-control select-picker" name="banda33" id="banda33" >
                              <option value="CARGADO">CARGADO</option>
                              <option value="PENDIENTE">PENDIENTE</option>
                            </select>
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga9" id="fecha_carga9" maxlength="100" >
                         
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>

                            <textarea name="altura22" id="altura22" class="form-control" rows="3"></textarea>
                          </div>



                    </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>


                    <div class="panel-body" id="formularioregistros2">
                        <form name="formulario2" id="formulario2" method="POST">
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                           <label>Estacion Base(*):</label>
                            <input type="hidden" name="idwomhw" id="idwomhw">
                            <select id="idsite" name="idsite" class="form-control selectpicker" data-live-search="true" ></select>
                          </div>
                          <div class="form-group col-lg-1 col-md-1 col-sm-2 col-xs-16">
                            <label>Documento:</label>
                            <select class="form-control selectpicker"  name="documento" id="documento" >
                                <option value="DCO">DCO</option>
                                <option value="SMR">SMR</option>
                                <option value="LSM">LSM</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label>Numero Documento:</label>
                            <input type="text" class="form-control" name="num_documento" id="num_documento" maxlength="256" placeholder="Descripción">
                          </div>

                          <div class="form-group col-lg-1 col-md-4 col-sm-4 col-xs-12">
                            <label>Indicador:</label>
                            <input type="text" class="form-control" name="indicador" id="indicador" maxlength="256" placeholder="Indicador">
                          </div>
                          <div class="form-group col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <label>Elemento (*):</label>
                            <select id="idcapex" name="idcapex" class="form-control selectpicker" data-live-search="true" ></select>
                          </div>

                          <div class="form-group col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <label>Serial (*):</label>
                            <input type="text" class="form-control" name="serial" id="serial" maxlength="256" placeholder="Serial">
                          </div>

                          <div class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label>Estado (*):</label>
                            <select class="form-control selectpicker"  name="estado" id="estado" >
                                <option value="Nuevo">Nuevo</option>
                                <option value="Desmontado">Desmontado</option>
                                <option value="Baja">Baja</option>
                                <option value="Failure Report">Failure Report</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-3 col-md-4 col-sm-4 col-xs-12">
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

                      
                          <div class="form-group col-lg-5 col-md-4 col-sm-4 col-xs-12">
                            <label>Observacion (*):</label>
                            <textarea id="observacion" class="form-control" name="observacion" rows="3"></textarea>
                          </div>

                          
                          <div class="form-group col-lg-5 col-md-9 col-sm-9 col-xs-9">
                            <label>Imagen del Serial:</label></br>
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <span class="border border-dark"></span>
                            <img src="" width="570px" height="350px" id="imagenmuestra" >
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
                            </br>
                          </div>


                          
                         
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- <button class="btn btn-primary" type="submit" id="btnGuardar2"><i class="fa fa-save"></i> Guardar</button> -->
                            <button class="btn btn-danger" onclick="cancelarform2()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>

                          
                        </form>




                    
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
<script type="text/javascript" src="scripts/site2600.js"></script>
<style type="text/css">
  .horizontal{writing-mode: vertical-lr;
    transform: rotate(180deg);
    font-size: 20px;
    width: inherit !important;
    
     }

     table.dataTable thead {background-color:red}

     table.dataTable thead th {
    text-align: center;
    background-color: red;
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


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<?php 
}

ob_end_flush();
?>