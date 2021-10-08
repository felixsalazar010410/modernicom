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
                     <?php require 'navegadorcat.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">EVENTOS// <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button><a data-toggle="modal" href="#myModal">           
                            </a></br></br>
                          <button class="btn btn-primary" id="btnall" onclick="listar()"> ALL</button>
                    <button class="btn btn-success" id="btnaprobados" onclick="listarwomactivos()"><i class="fa fa-check"></i> APROBADOS</button>
                    <button class="btn btn-warning" id="btnrechazado" onclick="listarwomrechazados()"><i class="fa fa-spinner"></i> EN PROCESO</button>
                    <button class="btn btn-success" id="btndocumentos" onclick="myInformacion()">   DOCUMENTOS</button>
                    <button class="btn btn-danger" id="btnhw" onclick="myInfo()">HADWARE</button></h1>

                    
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                  
                    <!-- /.box-header -->
                    <!-- centro -->





              <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>ID</th>
                            <th>SITIO</th>
                            <th>PROYECTO</th>
                            <th>DEPARTAMENTO</th>
                            <th>DIRECCION</th>
                            <th>PL</th>
                            <th>PRE-ATP</th>
                            <th>INV-DESMONTE</th>
                            <th>ATP</th>
                            <th>ESTADO</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>ID</th>
                            <th>SITIO</th>
                            <th>PROYECTO</th>
                            <th>DEPARTAMENTO</th>
                            <th>DIRECCION</th>
                            <th>PL</th>
                            <th>PRE-ATP</th>
                            <th>INV-DESMONTE</th>
                            <th>ATP</th>
                            <th>ESTADO</th>
                          </tfoot>
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
                             <label>ID del sitio:(*):</label>
                             <input type="text" class="form-control" name="codigo" id="codigo" maxlength="100" placeholder="Nombre" required>
                    </div>
                     <!-- Campo Nombre del Sitio -->
                          <div id="MyI2" class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre del sitio WOM:(*):</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                          </div>
                    <!-- Proyecto -->
                          <div id="MyI3" class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Proyecto(*):</label>
                            <select id="idproyecto" name="idproyecto" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>

                   <!-- Codigo y nombre para el torrero -->
                          <div id="MyI4" class="form-group col-lg-4 col-md-1 col-sm-6 col-xs-12">
                              <label>Codigo y nombre para el torrero:(*):</label>
                              <input type="text" class="form-control" name="nombre2" id="nombre2" maxlength="100" placeholder="Direccion" required>
                          </div>
                          
                     <!--Torrero -->
                          <div id="MyI5" class="form-group col-lg-4 col-md-1 col-sm-6 col-xs-12">
                            <label>Torrero:(*):</label>
                            <select class="form-control select-picker" name="torrero" id="torrero" required>
                              <option value="ATC">ATC</option>
                              <option value="ATP">ATP</option>
                              <option value="QMC">QMC</option>
                              <option value="Por sustituir">Por sustituir</option>
                              <option value="Phoenix">Phoenix</option>
                              <option value="WOM">WOM</option>
                            </select>
                          </div>
                   <!--Tipo Instalacion -->
                          <div id="MyI6" class="form-group col-lg-4 col-md-1 col-sm-6 col-xs-12">
                            <label>Tipo Instalacion:(*):</label>
                            <select class="form-control select-picker" name="tipo_instalacion" id="tipo_instalacion" required>
                              <option value="NEW">NEW</option>
                              <option value="SWAP">SWAP</option>
                              <option value="JUNGLE SITE">JUNGLE SITE</option>
                            </select>
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
                            <select class="form-control select-picker" name="regional" id="regional" required>
                              <option value="CENTRO">CENTRO</option>
                              <option value="COSTA">COSTA</option>
                              <option value="ORIENTE">ORIENTE</option>
                              <option value="OCCIDENTE">OCCIDENTE</option>
                            </select>
                          </div>
                        <!--Departamento -->
                          <div  id="myU2" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Departamento(*):</label>
                            <select class="form-control select-picker"  data-live-search="true" name="departamento" id="departamento"   required>
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
                            <label>CABECERA MUNICIPAL DANE(*):</label>
                            <input type="text" class="form-control" name="municipal_dane" id="municipal_dane" maxlength="100" placeholder="CABECERA MUNICIPAL DANE" required>
                          </div>
                      <!--Categoria -->
                          <div id="myU4" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Categoria(*):</label>
                            <select class="form-control select-picker" name="categoria" id="categoria" required>
                              <option value="RURAL">RURAL</option>
                              <option value="URBANO">URBANO</option>
                            </select>
                          </div>
                      <!--Direccion -->
                          <div id="myU5" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Direccion(*):</label>
                              <input type="text" class="form-control" name="direccion" id="direccion" maxlength="100" placeholder="Direccion" required>
                          </div>
                      <!--Latitud -->
                          <div id="myU6" class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Latitud:(*):</label>
                              <input type="text" class="form-control" name="latitud" id="latitud" maxlength="100" placeholder="Latitud" required>
                          </div>
                      <!--Longitud -->
                          <div id="myU7" class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Longitud:(*):</label>
                              <input type="text" class="form-control" name="longitud" id="longitud" maxlength="100" placeholder="Longitud" required>
                          </div>

                
              
                <!-- <button class="btn btn-primary" onclick="myFunction()"><i class="fa fa-plus-circle"></i>Configuracion</button> -->
                <!--Configuracion -->
                <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <h3 class="text-primary">Configuracion General</h3>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                </div>
                         
               <!--Configuracion -->
                <div id="myDIV" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <label>Configuraion:(*):</label>
                            <select  class="form-control select-picker" name="configuracion" id="configuracion">
                            <option value="Site Type 1 - 700 MHz - a O1_8h autonomy">Site Type 1 - 700 MHz - a O1_8h autonomy</option>
                            <option value="Site Type 1 - 700 MHz - b S111_8h autonomy">Site Type 1 - 700 MHz - b S111_8h autonomy</option>
                            <option value="Site Type 2 – AWS + 2500 MHz - a BBU5900_4h autonomy">Site Type 2 – AWS + 2500 MHz - a BBU5900_4h autonomy</option>
                            <option value="Site Type 2 – AWS + 2500 MHz - b BBU5900A_4h autonomy">Site Type 2 – AWS + 2500 MHz - b BBU5900A_4h autonomy</option>
                            <option value="Site Type 4 – 700 MHz + AWS + 2500 MHz - a BBU5900_4h autonomy">Site Type 4 – 700 MHz + AWS + 2500 MHz - a BBU5900_4h autonomy</option>
                            <option value="Site Type 4 – 700 MHz + AWS + 2500 MHz - b BBU5900A_4h autonomy">Site Type 4 – 700 MHz + AWS + 2500 MHz - b BBU5900A_4h autonomy</option>
                            <option value="Site Type 5 – AWS - c BBU5900 + UBBPg2_4h autonomy (To be upgrade to AWS + 2500M)">Site Type 5 – AWS - c BBU5900 + UBBPg2_4h autonomy (To be upgrade to AWS + 2500M)</option>
                            <option value="Site Type 7 - AWS + 700 MHz - a BBU5900_4h autonomy(10 Urgent site )">Site Type 7 - AWS + 700 MHz - a BBU5900_4h autonomy(10 Urgent site )</option>
                            </select>
                          </div>
                <!--Carrier -->
                          <div id="myDIV2" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Carrier:(*):</label>
                              <input type="text" class="form-control" name="carrier" id="carrier" maxlength="100" placeholder="Direccion" required>
                          </div>
                    <!--Tipo de transmision -->
                          <div id="myDIV3" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo de transmision:(*):</label>
                              <input type="text" class="form-control" name="transmision" id="transmision" maxlength="100" placeholder="Direccion" required>
                          </div>


                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <h3 class="text-primary">Configuracion Sectorial</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                          <div id="myDIV3" class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <h3><label style="height:2px;border-width:0;color:#D8D06E">SECTOR 1</label></h3>
                          </div>

                          <div id="myDIV3" class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <h3><label style="height:2px;border-width:0;color:blue">SECTOR 2</label></h3>
                          </div>

                          <div id="myDIV3" class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <h3><label style="height:2px;border-width:0;color:red">SECTOR 3</label></h3>
                          </div>




                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>BANDA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp </label>
                             <input id="banda11" name="banda11" type="text" style="width : 73px">
                                  </div>
                                  <input id="banda12" name="banda12" type="text" style="width : 73px">
                                  <input id="banda13" name="banda13" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>BANDA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp </label>
                             <input id="banda21" name="banda21" type="text" style="width : 73px">
                                  </div>
                                  <input id="banda22" name="banda22" type="text" style="width : 73px">
                                  <input id="banda23" name="banda23" type="text" style="width : 73px">
                                 
                            </div>
                        </div>




                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>BANDA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp </label>
                             <input id="banda31" name="banda31" type="text" style="width : 73px">
                                  </div>
                                  <input id="banda32" name="banda32" type="text" style="width : 73px">
                                  <input id="banda33" name="banda33" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                      


                      

                    <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>ALTURA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="altura11" name="altura11" type="text" style="width : 73px">
                                  </div>
                                  <input id="altura12" name="altura12" type="text" style="width : 73px">
                                  <input id="altura13" name="altura13" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                        <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>ALTURA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="altura21" name="altura21" type="text" style="width : 73px">
                                  </div>
                                  <input id="altura22" name="altura22" type="text" style="width : 73px">
                                  <input id="altura23" name="altura23" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                        <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>ALTURA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input input id="altura31" name="altura31" type="text" style="width : 73px">
                                  </div>
                                  <input id="altura32" name="altura32" type="text" style="width : 73px">
                                  <input id="altura33" name="altura33" type="text" style="width : 73px">
                                 
                            </div>
                        </div>


                      <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>AZIMUT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="azimut11" name="azimut11" type="text" style="width : 73px">
                                  </div>
                                  <input id="azimut12" name="azimut12" type="text" style="width : 73px">
                                  <input id="azimut13" name="azimut13" type="text" style="width : 73px">
                                 
                            </div>
                        </div>


                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>AZIMUT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="azimut21" name="azimut21" type="text" style="width : 73px">
                                  </div>
                                  <input id="azimut22" name="azimut22" type="text" style="width : 73px">
                                  <input id="azimut23" name="azimut23" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>AZIMUT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="azimut31" name="azimut31" type="text" style="width : 73px">
                                  </div>
                                  <input id="azimut32" name="azimut32" type="text" style="width : 73px">
                                  <input id="azimut33" name="azimut33" type="text" style="width : 73px">
                                 
                            </div>
                        </div>


                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>TIL_ELT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input   id="electrico11" name="electrico11" type="text" style="width : 73px">
                                  </div>
                                  <input id="electrico12" name="electrico12" type="text" style="width : 73px">
                                  <input id="electrico13" name="electrico13" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                         <div class="col-sm-4">
                           <div class="form-inline">
                             <div class="form-group">
                             <label>TIL_ELT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="electrico21" name="electrico21" type="text" style="width : 73px">
                                  </div>
                                  <input id="electrico22" name="electrico22" type="text" style="width : 73px">
                                  <input id="electrico23" name="electrico23" type="text" style="width : 73px">
                            </div>
                        </div>

                      <div class="col-sm-4">
                        <div class="form-inline">
                             <div class="form-group">
                             <label>TIL_ELT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="electrico31" name="electrico31" type="text" style="width : 73px">
                                  </div>
                                  <input id="electrico32" name="electrico32" type="text" style="width : 73px">
                                  <input id="electrico33" name="electrico33" type="text" style="width : 73px">
                            </div>
                      </div>


                      <div class="col-sm-4">
                        <div class="form-inline">
                             <div class="form-group">
                             <label>TIL_MECANICO  &nbsp</label>
                             <input id="mecanico11" name="mecanico11" type="text" style="width : 73px">
                                  </div>
                                  <input id="mecanico12" name="mecanico12" type="text" style="width : 73px">
                                  <input id="mecanico13" name="mecanico13" type="text" style="width : 73px">
                            </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="form-inline">
                             <div class="form-group">
                             <label>TIL_MECANICO  &nbsp</label>
                             <input id="mecanico21" name="mecanico21" type="text" style="width : 73px">
                                  </div>
                                  <input  id="mecanico22" name="mecanico22" type="text" style="width : 73px">
                                  <input  id="mecanico23" name="mecanico23" type="text" style="width : 73px">
                            </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="form-inline">
                             <div class="form-group">
                             <label>TIL MECANICO  &nbsp &nbsp</label>
                             <input id="mecanico31" name="mecanico31" type="text" style="width : 73px">
                                  </div>
                                  <input id="mecanico32" name="mecanico32" type="text" style="width : 73px">
                                  <input id="mecanico33" name="mecanico33" type="text" style="width : 73px">
                            </div>
                            </br>
                            </br>
                            </br>
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
                       
                    <!--Adjunto Packing List -->
                       <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>PACKING LIST:</label>

                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#" target="_blank"> </br>
                            <img src="../public/images/pdf.png" alt="PACKING LIST" style="width:50px;height:40px;">
                            PACKING LIST.pdf
                            </a>
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="application/msword,image/gif,image/jpeg,application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.zip">
                       </div>

                       <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga" id="fecha_carga" maxlength="100" placeholder="Direccion">
                          <label>Responable:</label>
                            <select id="idusuario" name="idusuario" class="form-control selectpicker" data-live-search="true" required></select>
                        
                      </div>

                       <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>
                            <textarea name="observacion" id="observacion" class="form-control" rows="5"></textarea>
                      </div>
                          &nbsp
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>PRE-ATP:</label>

                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#"></br>
                            <img src="../public/images/excel.png" alt="PRE-ACTA" style="width:50px;height:40px;">
                            PRE-ATP.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>
                          

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga2" id="fecha_carga2" maxlength="100" placeholder="Direccion">
                          <label>Responable:</label>
                            <select id="idusuario2" name="idusuario2"></select>
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>

                            <textarea name="observacion2" id="observacion2" class="form-control" rows="3"></textarea>
                            &nbsp
                            &nbsp
                          </div>


                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>
                          

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>INVENTARIO DESMONTE:</label>

                            <input type="hidden" name="imagenactual3" id="imagenactual3">
                            <a id="archivo3" href="#"></br>
                            <img src="../public/images/excel.png" alt="INVENTARIO DESMONTE" style="width:50px;height:40px;">
                            INVENTARIO_DESMONTE.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen3" id="imagen3" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga3" id="fecha_carga3" maxlength="100" placeholder="Direccion">
                          <label>Responable:</label>
                            <select id="idusuario3" name="idusuario3" class="form-control selectpicker" data-live-search="true"></select>
                        
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
                            <label>ATP:</label>

                            <input type="hidden" name="imagenactual4" id="imagenactual4">
                            <a id="archivo4" href="#"></br>
                            <img src="../public/images/excel.png" alt="ATP" style="width:50px;height:40px;">
                            ATP.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen4" id="imagen4" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga4" id="fecha_carga4" maxlength="100" placeholder="Direccion">
                          <label>Responable:</label>
                            <select id="idusuario4" name="idusuario4" class="form-control selectpicker" data-live-search="true"></select>
                        
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>


                            <textarea name="observacion4" id="observacion4" class="form-control" rows="3"></textarea>


                          </div>



                           <!-- <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>ATP:</label>

                            <input type="hidden" name="imagenactual3" id="imagenactual3">
                            <a id="archivo" href="#"></br>
                            <img src="../public/images/excel.png" alt="DESCARGAR ESTUCIO DE CAMPO" style="width:50px;height:40px;">
                            ACTA.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen3" id="imagen3" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div> -->

                          
                          &nbsp
                          &nbsp

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
                            <select id="idsite" name="idsite" class="form-control selectpicker" data-live-search="true" required></select>
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
                            <select id="idcapex" name="idcapex" class="form-control selectpicker" data-live-search="true" required></select>
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
else if ($_SESSION['cliente_wom']==1)
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
                     <?php require 'navegadorcat.php'; ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">EVENTOS// <a data-toggle="modal" href="#myModal">           
                            </a></br></br>
                          <button class="btn btn-primary" id="btnall" onclick="listar()"> ALL</button>
                    <button class="btn btn-success" id="btnaprobados" onclick="listarwomactivos()"><i class="fa fa-check"></i> APROBADOS</button>
                    <button class="btn btn-warning" id="btnrechazado" onclick="listarwomrechazados()"><i class="fa fa-spinner"></i> EN PROCESO</button>
                    <button class="btn btn-success" id="btndocumentos" onclick="myInformacion()">   DOCUMENTOS</button>
                    <button class="btn btn-danger" id="btnhw" onclick="myInfo()">HADWARE</button></h1>

                    
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                  
                    <!-- /.box-header -->
                    <!-- centro -->





              <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>ID</th>
                            <th>SITIO</th>
                            <th>PROYECTO</th>
                            <th>DEPARTAMENTO</th>
                            <th>DIRECCION</th>
                            <th>PL</th>
                            <th>PRE-ATP</th>
                            <th>INV-DESMONTE</th>
                            <th>ATP</th>
                            <th>ESTADO</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>ID</th>
                            <th>SITIO</th>
                            <th>PROYECTO</th>
                            <th>DEPARTAMENTO</th>
                            <th>DIRECCION</th>
                            <th>PL</th>
                            <th>PRE-ATP</th>
                            <th>INV-DESMONTE</th>
                            <th>ATP</th>
                            <th>ESTADO</th>
                          </tfoot>
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
                             <label>ID del sitio:(*):</label>
                             <input type="text" class="form-control" name="codigo" id="codigo" maxlength="100" placeholder="Nombre" required>
                    </div>
                     <!-- Campo Nombre del Sitio -->
                          <div id="MyI2" class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre del sitio WOM:(*):</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                          </div>
                    <!-- Proyecto -->
                          <div id="MyI3" class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Proyecto(*):</label>
                            <select id="idproyecto" name="idproyecto" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>

                   <!-- Codigo y nombre para el torrero -->
                          <div id="MyI4" class="form-group col-lg-4 col-md-1 col-sm-6 col-xs-12">
                              <label>Codigo y nombre para el torrero:(*):</label>
                              <input type="text" class="form-control" name="nombre2" id="nombre2" maxlength="100" placeholder="Direccion" required>
                          </div>
                          
                     <!--Torrero -->
                          <div id="MyI5" class="form-group col-lg-4 col-md-1 col-sm-6 col-xs-12">
                            <label>Torrero:(*):</label>
                            <select class="form-control select-picker" name="torrero" id="torrero" required>
                              <option value="ATC">ATC</option>
                              <option value="ATP">ATP</option>
                              <option value="QMC">QMC</option>
                              <option value="Por sustituir">Por sustituir</option>
                              <option value="Phoenix">Phoenix</option>
                              <option value="WOM">WOM</option>
                            </select>
                          </div>
                   <!--Tipo Instalacion -->
                          <div id="MyI6" class="form-group col-lg-4 col-md-1 col-sm-6 col-xs-12">
                            <label>Tipo Instalacion:(*):</label>
                            <select class="form-control select-picker" name="tipo_instalacion" id="tipo_instalacion" required>
                              <option value="NEW">NEW</option>
                              <option value="SWAP">SWAP</option>
                              <option value="JUNGLE SITE">JUNGLE SITE</option>
                            </select>
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
                            <select class="form-control select-picker" name="regional" id="regional" required>
                              <option value="CENTRO">CENTRO</option>
                              <option value="COSTA">COSTA</option>
                              <option value="ORIENTE">ORIENTE</option>
                              <option value="OCCIDENTE">OCCIDENTE</option>
                            </select>
                          </div>
                        <!--Departamento -->
                          <div  id="myU2" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Departamento(*):</label>
                            <select class="form-control select-picker"  data-live-search="true" name="departamento" id="departamento"   required>
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
                            <label>CABECERA MUNICIPAL DANE(*):</label>
                            <input type="text" class="form-control" name="municipal_dane" id="municipal_dane" maxlength="100" placeholder="CABECERA MUNICIPAL DANE" required>
                          </div>
                      <!--Categoria -->
                          <div id="myU4" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Categoria(*):</label>
                            <select class="form-control select-picker" name="categoria" id="categoria" required>
                              <option value="RURAL">RURAL</option>
                              <option value="URBANO">URBANO</option>
                            </select>
                          </div>
                      <!--Direccion -->
                          <div id="myU5" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Direccion(*):</label>
                              <input type="text" class="form-control" name="direccion" id="direccion" maxlength="100" placeholder="Direccion" required>
                          </div>
                      <!--Latitud -->
                          <div id="myU6" class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Latitud:(*):</label>
                              <input type="text" class="form-control" name="latitud" id="latitud" maxlength="100" placeholder="Latitud" required>
                          </div>
                      <!--Longitud -->
                          <div id="myU7" class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Longitud:(*):</label>
                              <input type="text" class="form-control" name="longitud" id="longitud" maxlength="100" placeholder="Longitud" required>
                          </div>

                
              
                <!-- <button class="btn btn-primary" onclick="myFunction()"><i class="fa fa-plus-circle"></i>Configuracion</button> -->
                <!--Configuracion -->
                <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <h3 class="text-primary">Configuracion General</h3>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                </div>
                         
               <!--Configuracion -->
                <div id="myDIV" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <label>Configuraion:(*):</label>
                            <select  class="form-control select-picker" name="configuracion" id="configuracion">
                            <option value="Site Type 1 - 700 MHz - a O1_8h autonomy">Site Type 1 - 700 MHz - a O1_8h autonomy</option>
                            <option value="Site Type 1 - 700 MHz - b S111_8h autonomy">Site Type 1 - 700 MHz - b S111_8h autonomy</option>
                            <option value="Site Type 2 – AWS + 2500 MHz - a BBU5900_4h autonomy">Site Type 2 – AWS + 2500 MHz - a BBU5900_4h autonomy</option>
                            <option value="Site Type 2 – AWS + 2500 MHz - b BBU5900A_4h autonomy">Site Type 2 – AWS + 2500 MHz - b BBU5900A_4h autonomy</option>
                            <option value="Site Type 4 – 700 MHz + AWS + 2500 MHz - a BBU5900_4h autonomy">Site Type 4 – 700 MHz + AWS + 2500 MHz - a BBU5900_4h autonomy</option>
                            <option value="Site Type 4 – 700 MHz + AWS + 2500 MHz - b BBU5900A_4h autonomy">Site Type 4 – 700 MHz + AWS + 2500 MHz - b BBU5900A_4h autonomy</option>
                            <option value="Site Type 5 – AWS - c BBU5900 + UBBPg2_4h autonomy (To be upgrade to AWS + 2500M)">Site Type 5 – AWS - c BBU5900 + UBBPg2_4h autonomy (To be upgrade to AWS + 2500M)</option>
                            <option value="Site Type 7 - AWS + 700 MHz - a BBU5900_4h autonomy(10 Urgent site )">Site Type 7 - AWS + 700 MHz - a BBU5900_4h autonomy(10 Urgent site )</option>
                            </select>
                          </div>
                <!--Carrier -->
                          <div id="myDIV2" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Carrier:(*):</label>
                              <input type="text" class="form-control" name="carrier" id="carrier" maxlength="100" placeholder="Direccion" required>
                          </div>
                    <!--Tipo de transmision -->
                          <div id="myDIV3" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo de transmision:(*):</label>
                              <input type="text" class="form-control" name="transmision" id="transmision" maxlength="100" placeholder="Direccion" required>
                          </div>


                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <h3 class="text-primary">Configuracion Sectorial</h3>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>

                          <div id="myDIV3" class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <h3><label style="height:2px;border-width:0;color:#D8D06E">SECTOR 1</label></h3>
                          </div>

                          <div id="myDIV3" class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <h3><label style="height:2px;border-width:0;color:blue">SECTOR 2</label></h3>
                          </div>

                          <div id="myDIV3" class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <h3><label style="height:2px;border-width:0;color:red">SECTOR 3</label></h3>
                          </div>




                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>BANDA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp </label>
                             <input id="banda11" name="banda11" type="text" style="width : 73px">
                                  </div>
                                  <input id="banda12" name="banda12" type="text" style="width : 73px">
                                  <input id="banda13" name="banda13" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>BANDA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp </label>
                             <input id="banda21" name="banda21" type="text" style="width : 73px">
                                  </div>
                                  <input id="banda22" name="banda22" type="text" style="width : 73px">
                                  <input id="banda23" name="banda23" type="text" style="width : 73px">
                                 
                            </div>
                        </div>




                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>BANDA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp </label>
                             <input id="banda31" name="banda31" type="text" style="width : 73px">
                                  </div>
                                  <input id="banda32" name="banda32" type="text" style="width : 73px">
                                  <input id="banda33" name="banda33" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                      


                      

                    <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>ALTURA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="altura11" name="altura11" type="text" style="width : 73px">
                                  </div>
                                  <input id="altura12" name="altura12" type="text" style="width : 73px">
                                  <input id="altura13" name="altura13" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                        <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>ALTURA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="altura21" name="altura21" type="text" style="width : 73px">
                                  </div>
                                  <input id="altura22" name="altura22" type="text" style="width : 73px">
                                  <input id="altura23" name="altura23" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                        <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>ALTURA  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input input id="altura31" name="altura31" type="text" style="width : 73px">
                                  </div>
                                  <input id="altura32" name="altura32" type="text" style="width : 73px">
                                  <input id="altura33" name="altura33" type="text" style="width : 73px">
                                 
                            </div>
                        </div>


                      <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>AZIMUT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="azimut11" name="azimut11" type="text" style="width : 73px">
                                  </div>
                                  <input id="azimut12" name="azimut12" type="text" style="width : 73px">
                                  <input id="azimut13" name="azimut13" type="text" style="width : 73px">
                                 
                            </div>
                        </div>


                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>AZIMUT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="azimut21" name="azimut21" type="text" style="width : 73px">
                                  </div>
                                  <input id="azimut22" name="azimut22" type="text" style="width : 73px">
                                  <input id="azimut23" name="azimut23" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>AZIMUT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="azimut31" name="azimut31" type="text" style="width : 73px">
                                  </div>
                                  <input id="azimut32" name="azimut32" type="text" style="width : 73px">
                                  <input id="azimut33" name="azimut33" type="text" style="width : 73px">
                                 
                            </div>
                        </div>


                         <div class="col-sm-4">

                        <div class="form-inline">
                             <div class="form-group">
                             <label>TIL_ELT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input   id="electrico11" name="electrico11" type="text" style="width : 73px">
                                  </div>
                                  <input id="electrico12" name="electrico12" type="text" style="width : 73px">
                                  <input id="electrico13" name="electrico13" type="text" style="width : 73px">
                                 
                            </div>
                        </div>

                         <div class="col-sm-4">
                           <div class="form-inline">
                             <div class="form-group">
                             <label>TIL_ELT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="electrico21" name="electrico21" type="text" style="width : 73px">
                                  </div>
                                  <input id="electrico22" name="electrico22" type="text" style="width : 73px">
                                  <input id="electrico23" name="electrico23" type="text" style="width : 73px">
                            </div>
                        </div>

                      <div class="col-sm-4">
                        <div class="form-inline">
                             <div class="form-group">
                             <label>TIL_ELT  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp </label>
                             <input id="electrico31" name="electrico31" type="text" style="width : 73px">
                                  </div>
                                  <input id="electrico32" name="electrico32" type="text" style="width : 73px">
                                  <input id="electrico33" name="electrico33" type="text" style="width : 73px">
                            </div>
                      </div>


                      <div class="col-sm-4">
                        <div class="form-inline">
                             <div class="form-group">
                             <label>TIL_MECANICO  &nbsp</label>
                             <input id="mecanico11" name="mecanico11" type="text" style="width : 73px">
                                  </div>
                                  <input id="mecanico12" name="mecanico12" type="text" style="width : 73px">
                                  <input id="mecanico13" name="mecanico13" type="text" style="width : 73px">
                            </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="form-inline">
                             <div class="form-group">
                             <label>TIL_MECANICO  &nbsp</label>
                             <input id="mecanico21" name="mecanico21" type="text" style="width : 73px">
                                  </div>
                                  <input  id="mecanico22" name="mecanico22" type="text" style="width : 73px">
                                  <input  id="mecanico23" name="mecanico23" type="text" style="width : 73px">
                            </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="form-inline">
                             <div class="form-group">
                             <label>TIL MECANICO  &nbsp &nbsp</label>
                             <input id="mecanico31" name="mecanico31" type="text" style="width : 73px">
                                  </div>
                                  <input id="mecanico32" name="mecanico32" type="text" style="width : 73px">
                                  <input id="mecanico33" name="mecanico33" type="text" style="width : 73px">
                            </div>
                            </br>
                            </br>
                            </br>
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
                       
                    <!--Adjunto Packing List -->
                       <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>PACKING LIST:</label>

                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <a id="archivo" href="#" target="_blank"> </br>
                            <img src="../public/images/pdf.png" alt="PACKING LIST" style="width:50px;height:40px;">
                            PACKING LIST.pdf
                            </a>
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="application/msword,image/gif,image/jpeg,application/pdf,image/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.zip">
                       </div>

                       <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga" id="fecha_carga" maxlength="100" placeholder="Direccion">
                          <label>Responable:</label>
                            <select id="idusuario" name="idusuario" class="form-control selectpicker" data-live-search="true" required></select>
                        
                      </div>

                       <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>
                            <textarea name="observacion" id="observacion" class="form-control" rows="5"></textarea>
                      </div>
                          &nbsp
                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>PRE-ATP:</label>

                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <a id="archivo2" href="#"></br>
                            <img src="../public/images/excel.png" alt="PRE-ACTA" style="width:50px;height:40px;">
                            PRE-ATP.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen2" id="imagen2" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>
                          

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga2" id="fecha_carga2" maxlength="100" placeholder="Direccion">
                          <label>Responable:</label>
                            <select id="idusuario2" name="idusuario2"></select>
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>

                            <textarea name="observacion2" id="observacion2" class="form-control" rows="3"></textarea>
                            &nbsp
                            &nbsp
                          </div>


                          <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          </div>
                          

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>INVENTARIO DESMONTE:</label>

                            <input type="hidden" name="imagenactual3" id="imagenactual3">
                            <a id="archivo3" href="#"></br>
                            <img src="../public/images/excel.png" alt="INVENTARIO DESMONTE" style="width:50px;height:40px;">
                            INVENTARIO_DESMONTE.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen3" id="imagen3" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga3" id="fecha_carga3" maxlength="100" placeholder="Direccion">
                          <label>Responable:</label>
                            <select id="idusuario3" name="idusuario3" class="form-control selectpicker" data-live-search="true"></select>
                        
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
                            <label>ATP:</label>

                            <input type="hidden" name="imagenactual4" id="imagenactual4">
                            <a id="archivo4" href="#"></br>
                            <img src="../public/images/excel.png" alt="ATP" style="width:50px;height:40px;">
                            ATP.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen4" id="imagen4" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div>

                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                          <label>Fecha de Carga:</label>
                          <input type="date" class="form-control" name="fecha_carga4" id="fecha_carga4" maxlength="100" placeholder="Direccion">
                          <label>Responable:</label>
                            <select id="idusuario4" name="idusuario4" class="form-control selectpicker" data-live-search="true"></select>
                        
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>


                            <textarea name="observacion4" id="observacion4" class="form-control" rows="3"></textarea>


                          </div>



                           <!-- <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>ATP:</label>

                            <input type="hidden" name="imagenactual3" id="imagenactual3">
                            <a id="archivo" href="#"></br>
                            <img src="../public/images/excel.png" alt="DESCARGAR ESTUCIO DE CAMPO" style="width:50px;height:40px;">
                            ACTA.xmls
                            </a>
                            <input type="file" class="form-control" name="imagen3" id="imagen3" accept="image/x-png,image/gif,image/jpeg,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          </div> -->

                          
                          &nbsp
                          &nbsp

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
                            <select id="idsite" name="idsite" class="form-control selectpicker" data-live-search="true" required></select>
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
                            <select id="idcapex" name="idcapex" class="form-control selectpicker" data-live-search="true" required></select>
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
<script type="text/javascript" src="scripts/sitesran.js"></script>
<?php 
}

ob_end_flush();
?>