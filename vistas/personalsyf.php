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
        <div class="container-fluid">
            <div class="row" >
              <div class="col-md-12 " >
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Personal <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button><a href="../reportes/rptclientes.php" target="_blank"><button class="btn btn-info"><i class="fa fa-clipboard"></i> Reporte</button></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Cargo</th>
                            <th>estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Cargo</th>
                            <th>estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 100%;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                         <h3 class="text-primary">Información Personal</h3>

                        <!-- <hr style="color: #0056B2;" /> -->
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">

                        <div class="form-group col-lg-3 col-md-9 col-sm-9 col-xs-9" >

                          <input type="hidden" name="imagenactual" id="imagenactual" > 
                          <span class="border border-dark"></span>
                          <img src="" width="300px" height="240px" id="imagenmuestra"  class="img-rounded" >
                          <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
                          </div>
                          <!-- Tipo Documento -->
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12 ">
                            <label>Tipo Documento:</label>
                            <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required>
                              <option value="DNI">DNI</option>
                              <option value="RUC">RUC</option>
                              <option value="CEDULA">CEDULA</option>
                            </select>
                          </div>
                           <!-- Numero Documento -->
                          <div class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <label>Número Documento:</label>
                            <input type="text" class="form-control" name="num_documento" id="num_documento" maxlength="20" placeholder="Documento">
                          </div>
                          <!-- Fecha expedicion Documento-->
                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Fecha expedición Documento:</label>
                            <input type="date" class="form-control" name="fecha_expedicion" id="fecha_expedicion" maxlength="20" placeholder="Documento">
                          </div>
                          <!-- Ciudad expedicion Documento-->
                          <div class="form-group col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <label>Ciudad expedición Documento:</label>
                            <select class="form-control select-picker" id="ciudad_expedicion" name="ciudad_expedicion">
                            <option value="">Seleccione una ciudad...</option>
                                            <option value="Arauca">Arauca</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Barranquilla">Barranquilla</option>
                                            <option value="Bogotá">Bogotá</option>
                                            <option value="Bucaramanga">Bucaramanga</option>
                                            <option value="Cali">Cali</option>
                                            <option value="Cartagena">Cartagena</option>
                                            <option value="Cúcuta">Cúcuta</option>
                                            <option value="Florencia">Florencia</option>
                                            <option value="Ibagué">Ibagué</option>
                                            <option value="Leticia">Leticia</option>
                                            <option value="Manizales">Manizales</option>
                                            <option value="Medellín">Medellín</option>
                                            <option value="Mitú">Mitú</option>
                                            <option value="Mocoa">Mocoa</option>
                                            <option value="Montería">Montería</option>
                                            <option value="Neiva">Neiva</option>
                                            <option value="Pasto">Pasto</option>
                                            <option value="Pereira">Pereira</option>
                                            <option value="Popayán">Popayán</option>
                                            <option value="Puerto Carreño">Puerto Carreño</option>
                                            <option value="Puerto Inírida">Puerto Inírida</option>
                                            <option value="Quibdó">Quibdó</option>
                                            <option value="Riohacha">Riohacha</option>
                                            <option value="San Andrés">San Andrés</option>
                                            <option value="San José del Guaviare">San José del Guaviare</option>
                                            <option value="Santa Marta">Santa Marta</option>
                                            <option value="Sincelejo">Sincelejo</option>
                                            <option value="Tunja">Tunja</option>
                                            <option value="Valledupar">Valledupar</option>
                                            <option value="Villavicencio">Villavicencio</option>
                                            <option value="Yopal">Yopal</option>
                            </select>
                          </div>
                          <!-- Nommbre y Apellidos Documento-->
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombres y Apellidos:</label>
                            <input type="hidden" name="idpersona" id="idpersona">
                            <input type="hidden" name="tipo_persona" id="tipo_persona" value="Cliente">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre del proveedor" required>
                          </div>
                           <!-- Genero Documento-->
                          <div class="form-group col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <label>Genero:</label>
                            <select class="form-control select-picker" name="genero" id="genero">
                            <option value="">Seleccione Genero...</option>
                            <option value="Maculino">Maculino</option>
                            <option value="Femenino">Femenino</option>
                            </select>
                          </div>
                           <!-- Fecha Nacimiento Documento-->
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Nacimiento:</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento">
                          </div>
                            <!-- Ciudad Nacimiento Documento-->
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Ciudad de nacimiento:</label>
                            <select class="form-control select-picker" id="ciudad" name="ciudad">
                            <option value="">Seleccione una ciudad...</option>
                                            <option value="Arauca">Arauca</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Barranquilla">Barranquilla</option>
                                            <option value="Bogotá">Bogotá</option>
                                            <option value="Bucaramanga">Bucaramanga</option>
                                            <option value="Cali">Cali</option>
                                            <option value="Cartagena">Cartagena</option>
                                            <option value="Cúcuta">Cúcuta</option>
                                            <option value="Florencia">Florencia</option>
                                            <option value="Ibagué">Ibagué</option>
                                            <option value="Leticia">Leticia</option>
                                            <option value="Manizales">Manizales</option>
                                            <option value="Medellín">Medellín</option>
                                            <option value="Mitú">Mitú</option>
                                            <option value="Mocoa">Mocoa</option>
                                            <option value="Montería">Montería</option>
                                            <option value="Neiva">Neiva</option>
                                            <option value="Pasto">Pasto</option>
                                            <option value="Pereira">Pereira</option>
                                            <option value="Popayán">Popayán</option>
                                            <option value="Puerto Carreño">Puerto Carreño</option>
                                            <option value="Puerto Inírida">Puerto Inírida</option>
                                            <option value="Quibdó">Quibdó</option>
                                            <option value="Riohacha">Riohacha</option>
                                            <option value="San Andrés">San Andrés</option>
                                            <option value="San José del Guaviare">San José del Guaviare</option>
                                            <option value="Santa Marta">Santa Marta</option>
                                            <option value="Sincelejo">Sincelejo</option>
                                            <option value="Tunja">Tunja</option>
                                            <option value="Valledupar">Valledupar</option>
                                            <option value="Villavicencio">Villavicencio</option>
                                            <option value="Yopal">Yopal</option>
                            </select>
                          </div>
                           <!-- Pais Nacimiento Documento-->
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>País de nacimiento:</label>
                            <select class="form-control select-picker" name="pais" id="pais">

                             <option value="Elegir" id="AF">Elegir opción</option>
                            <option value="Afganistán" id="AF">Afganistán</option>
                            <option value="Albania" id="AL">Albania</option>
                            <option value="Alemania" id="DE">Alemania</option>
                            <option value="Andorra" id="AD">Andorra</option>
                            <option value="Angola" id="AO">Angola</option>
                            <option value="Anguila" id="AI">Anguila</option>
                            <option value="Antártida" id="AQ">Antártida</option>
                            <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                            <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                            <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
                            <option value="Argelia" id="DZ">Argelia</option>
                            <option value="Argentina" id="AR">Argentina</option>
                            <option value="Armenia" id="AM">Armenia</option>
                            <option value="Aruba" id="AW">Aruba</option>
                            <option value="Australia" id="AU">Australia</option>
                            <option value="Austria" id="AT">Austria</option>
                            <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
                            <option value="Bahamas" id="BS">Bahamas</option>
                            <option value="Bahrein" id="BH">Bahrein</option>
                            <option value="Bangladesh" id="BD">Bangladesh</option>
                            <option value="Barbados" id="BB">Barbados</option>
                            <option value="Bélgica" id="BE">Bélgica</option>
                            <option value="Belice" id="BZ">Belice</option>
                            <option value="Benín" id="BJ">Benín</option>
                            <option value="Bermudas" id="BM">Bermudas</option>
                            <option value="Bhután" id="BT">Bhután</option>
                            <option value="Bielorrusia" id="BY">Bielorrusia</option>
                            <option value="Birmania" id="MM">Birmania</option>
                            <option value="Bolivia" id="BO">Bolivia</option>
                            <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
                            <option value="Botsuana" id="BW">Botsuana</option>
                            <option value="Brasil" id="BR">Brasil</option>
                            <option value="Brunei" id="BN">Brunei</option>
                            <option value="Bulgaria" id="BG">Bulgaria</option>
                            <option value="Burkina Faso" id="BF">Burkina Faso</option>
                            <option value="Burundi" id="BI">Burundi</option>
                            <option value="Cabo Verde" id="CV">Cabo Verde</option>
                            <option value="Camboya" id="KH">Camboya</option>
                            <option value="Camerún" id="CM">Camerún</option>
                            <option value="Canadá" id="CA">Canadá</option>
                            <option value="Chad" id="TD">Chad</option>
                            <option value="Chile" id="CL">Chile</option>
                            <option value="China" id="CN">China</option>
                            <option value="Chipre" id="CY">Chipre</option>
                            <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
                            <option value="Colombia" id="CO">Colombia</option>
                            <option value="Comores" id="KM">Comores</option>
                            <option value="Congo" id="CG">Congo</option>
                            <option value="Corea" id="KR">Corea</option>
                            <option value="Corea del Norte" id="KP">Corea del Norte</option>
                            <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
                            <option value="Costa Rica" id="CR">Costa Rica</option>
                            <option value="Croacia" id="HR">Croacia</option>
                            <option value="Cuba" id="CU">Cuba</option>
                            <option value="Dinamarca" id="DK">Dinamarca</option>
                            <option value="Djibouri" id="DJ">Djibouri</option>
                            <option value="Dominica" id="DM">Dominica</option>
                            <option value="Ecuador" id="EC">Ecuador</option>
                            <option value="Egipto" id="EG">Egipto</option>
                            <option value="El Salvador" id="SV">El Salvador</option>
                            <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
                            <option value="Eritrea" id="ER">Eritrea</option>
                            <option value="Eslovaquia" id="SK">Eslovaquia</option>
                            <option value="Eslovenia" id="SI">Eslovenia</option>
                            <option value="España" id="ES">España</option>
                            <option value="Estados Unidos" id="US">Estados Unidos</option>
                            <option value="Estonia" id="EE">Estonia</option>
                            <option value="c" id="ET">Etiopía</option>
                            <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
                            <option value="Filipinas" id="PH">Filipinas</option>
                            <option value="Finlandia" id="FI">Finlandia</option>
                            <option value="Francia" id="FR">Francia</option>
                            <option value="Gabón" id="GA">Gabón</option>
                            <option value="Gambia" id="GM">Gambia</option>
                            <option value="Georgia" id="GE">Georgia</option>
                            <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del                             Sur</option>
                            <option value="Ghana" id="GH">Ghana</option>
                            <option value="Gibraltar" id="GI">Gibraltar</option>
                            <option value="Granada" id="GD">Granada</option>
                            <option value="Grecia" id="GR">Grecia</option>
                            <option value="Groenlandia" id="GL">Groenlandia</option>
                            <option value="Guadalupe" id="GP">Guadalupe</option>
                            <option value="Guam" id="GU">Guam</option>
                            <option value="Guatemala" id="GT">Guatemala</option>
                            <option value="Guayana" id="GY">Guayana</option>
                            <option value="Guayana francesa" id="GF">Guayana francesa</option>
                            <option value="Guinea" id="GN">Guinea</option>
                            <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
                            <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
                            <option value="Haití" id="HT">Haití</option>
                            <option value="Holanda" id="NL">Holanda</option>
                            <option value="Honduras" id="HN">Honduras</option>
                            <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                            <option value="Hungría" id="HU">Hungría</option>
                            <option value="India" id="IN">India</option>
                            <option value="Indonesia" id="ID">Indonesia</option>
                            <option value="Irak" id="IQ">Irak</option>
                            <option value="Irán" id="IR">Irán</option>
                            <option value="Irlanda" id="IE">Irlanda</option>
                            <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                            <option value="Isla Christmas" id="CX">Isla Christmas</option>
                            <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
                            <option value="Islandia" id="IS">Islandia</option>
                            <option value="Islas Caimán" id="KY">Islas Caimán</option>
                            <option value="Islas Cook" id="CK">Islas Cook</option>
                            <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
                            <option value="Islas Faroe" id="FO">Islas Faroe</option>
                            <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                            <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
                            <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
                            <option value="Islas Marshall" id="MH">Islas Marshall</option>
                            <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
                            <option value="Islas Palau" id="PW">Islas Palau</option>
                            <option value="Islas Salomón" d="SB">Islas Salomón</option>
                            <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                            <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                            <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
                            <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
                            <option value="Israel" id="IL">Israel</option>
                            <option value="Italia" id="IT">Italia</option>
                            <option value="Jamaica" id="JM">Jamaica</option>
                            <option value="Japón" id="JP">Japón</option>
                            <option value="Jordania" id="JO">Jordania</option>
                            <option value="Kazajistán" id="KZ">Kazajistán</option>
                            <option value="Kenia" id="KE">Kenia</option>
                            <option value="Kirguizistán" id="KG">Kirguizistán</option>
                            <option value="Kiribati" id="KI">Kiribati</option>
                            <option value="Kuwait" id="KW">Kuwait</option>
                            <option value="Laos" id="LA">Laos</option>
                            <option value="Lesoto" id="LS">Lesoto</option>
                            <option value="Letonia" id="LV">Letonia</option>
                            <option value="Líbano" id="LB">Líbano</option>
                            <option value="Liberia" id="LR">Liberia</option>
                            <option value="Libia" id="LY">Libia</option>
                            <option value="Liechtenstein" id="LI">Liechtenstein</option>
                            <option value="Lituania" id="LT">Lituania</option>
                            <option value="Luxemburgo" id="LU">Luxemburgo</option>
                            <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
                            <option value="Madagascar" id="MG">Madagascar</option>
                            <option value="Malasia" id="MY">Malasia</option>
                            <option value="Malawi" id="MW">Malawi</option>
                            <option value="Maldivas" id="MV">Maldivas</option>
                            <option value="Malí" id="ML">Malí</option>
                            <option value="Malta" id="MT">Malta</option>
                            <option value="Marruecos" id="MA">Marruecos</option>
                            <option value="Martinica" id="MQ">Martinica</option>
                            <option value="Mauricio" id="MU">Mauricio</option>
                            <option value="Mauritania" id="MR">Mauritania</option>
                            <option value="Mayotte" id="YT">Mayotte</option>
                            <option value="México" id="MX">México</option>
                            <option value="Micronesia" id="FM">Micronesia</option>
                            <option value="Moldavia" id="MD">Moldavia</option>
                            <option value="Mónaco" id="MC">Mónaco</option>
                            <option value="Mongolia" id="MN">Mongolia</option>
                            <option value="Montserrat" id="MS">Montserrat</option>
                            <option value="Mozambique" id="MZ">Mozambique</option>
                            <option value="Namibia" id="NA">Namibia</option>
                            <option value="Nauru" id="NR">Nauru</option>
                            <option value="Nepal" id="NP">Nepal</option>
                            <option value="Nicaragua" id="NI">Nicaragua</option>
                            <option value="Níger" id="NE">Níger</option>
                            <option value="Nigeria" id="NG">Nigeria</option>
                            <option value="Niue" id="NU">Niue</option>
                            <option value="Norfolk" id="NF">Norfolk</option>
                            <option value="Noruega" id="NO">Noruega</option>
                            <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                            <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                            <option value="Omán" id="OM">Omán</option>
                            <option value="Panamá" id="PA">Panamá</option>
                            <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                            <option value="Paquistán" id="PK">Paquistán</option>
                            <option value="Paraguay" id="PY">Paraguay</option>
                            <option value="Perú" id="PE">Perú</option>
                            <option value="Pitcairn" id="PN">Pitcairn</option>
                            <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                            <option value="Polonia" id="PL">Polonia</option>
                            <option value="Portugal" id="PT">Portugal</option>
                            <option value="Puerto Rico" id="PR">Puerto Rico</option>
                            <option value="Qatar" id="QA">Qatar</option>
                            <option value="Reino Unido" id="UK">Reino Unido</option>
                            <option value="República Centroafricana" id="CF">República Centroafricana</option>
                            <option value="República Checa" id="CZ">República Checa</option>
                            <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
                            <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
                            <option value="República Dominicana" id="DO">República Dominicana</option>
                            <option value="Reunión" id="RE">Reunión</option>
                            <option value="Ruanda" id="RW">Ruanda</option>
                            <option value="Rumania" id="RO">Rumania</option>
                            <option value="Rusia" id="RU">Rusia</option>
                            <option value="Samoa" id="WS">Samoa</option>
                            <option value="Samoa occidental" id="AS">Samoa occidental</option>
                            <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
                            <option value="San Marino" id="SM">San Marino</option>
                            <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
                            <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
                            <option value="Santa Helena" id="SH">Santa Helena</option>
                            <option value="Santa Lucía" id="LC">Santa Lucía</option>
                            <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
                            <option value="Senegal" id="SN">Senegal</option>
                            <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                            <option value="Sychelles" id="SC">Seychelles</option>
                            <option value="Sierra Leona" id="SL">Sierra Leona</option>
                            <option value="Singapur" id="SG">Singapur</option>
                            <option value="Siria" id="SY">Siria</option>
                            <option value="Somalia" id="SO">Somalia</option>
                            <option value="Sri Lanka" id="LK">Sri Lanka</option>
                            <option value="Suazilandia" id="SZ">Suazilandia</option>
                            <option value="Sudán" id="SD">Sudán</option>
                            <option value="Suecia" id="SE">Suecia</option>
                            <option value="Suiza" id="CH">Suiza</option>
                            <option value="Surinam" id="SR">Surinam</option>
                            <option value="Svalbard" id="SJ">Svalbard</option>
                            <option value="Tailandia" id="TH">Tailandia</option>
                            <option value="Taiwán" id="TW">Taiwán</option>
                            <option value="Tanzania" id="TZ">Tanzania</option>
                            <option value="Tayikistán" id="TJ">Tayikistán</option>
                            <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</                           option>
                            <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
                            <option value="Timor Oriental" id="TP">Timor Oriental</option>
                            <option value="Togo" id="TG">Togo</option>
                            <option value="Tonga" id="TO">Tonga</option>
                            <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                            <option value="Túnez" id="TN">Túnez</option>
                            <option value="Turkmenistán" id="TM">Turkmenistán</option>
                            <option value="Turquía" id="TR">Turquía</option>
                            <option value="Tuvalu" id="TV">Tuvalu</option>
                            <option value="Ucrania" id="UA">Ucrania</option>
                            <option value="Uganda" id="UG">Uganda</option>
                            <option value="Uruguay" id="UY">Uruguay</option>
                            <option value="Uzbekistán" id="UZ">Uzbekistán</option>
                            <option value="Vanuatu" id="VU">Vanuatu</option>
                            <option value="Venezuela" id="VE">Venezuela</option>
                            <option value="Vietnam" id="VN">Vietnam</option>
                            <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                            <option value="Yemen" id="YE">Yemen</option>
                            <option value="Zambia" id="ZM">Zambia</option>
                            <option value="Zimbabue" id="ZW">Zimbabue</option>

                                                        </select>
                                                      </div>

                                                      <h3 class="text-primary">Información Bancaria</h3>
                                                      <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                                      <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">


                                                        <label>Número de cuenta:</label>
                                                        <input type="text" class="form-control" name="numero_cuenta" id="numero_cuenta" maxlength="50" placeholder="Empresa">
                            
                          </div>
                          <!-- Tipo cuenta Bancaria-->
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo de cuenta:</label>
                            <select class="form-control select-picker" name="tipo_cuenta" id="tipo_cuenta">
                              <option value="Ahorros">Ahorros</option>
                              <option value="Corriente">Corriente</option>
                            </select>
                          </div>
                          <!-- Banco Bancaria-->
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Banco:</label>
                            <select class="form-control select-picker" name="banco" id="banco">
                              <option value="Bancolombia">Bancolombia</option>
                              <option value="Davivienda">Davivienda</option>
                              <option value="Daviplata">Daviplata</option>
                              <option value="Nequi">Nequi</option>
                            </select>
                          </div>
                          
                          <h3 class="text-primary">Contacto</h3>
                          <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                           <!-- Email-->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email">
                          </div>
                          <!-- Telefono Celular-->
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Teléfono Celular:</label>
                            <input type="text" class="form-control" name="celular" id="celular" maxlength="20">
                          </div>
                          <!-- Telefono Residencia-->
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Teléfono Residencia:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="20">
                          </div>

                           <!-- Correo Empresarial-->
                          <div class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12 p-3 mb-2  bg-gradient-secondary text-secondary">
                            
                          <h3 class="text-primary">Correo Empresarial</h3>
                          <hr style="height:2px;border-width:5;color:gray;background-color:gray">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email_empresarial" id="email_empresarial" maxlength="50" placeholder="Email">
                            </br>
                            </br>
                          </div>
                          </br>
                          </br>

                          <!-- <h3 class="text-primary">Emergencia</h3>
                          <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Teléfono Celular:</label>
                            <input type="text" class="form-control" name="celular1" id="celular1" maxlength="20" placeholder="Teléfono">
                          </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Teléfono Residencia:</label>
                            <input type="text" class="form-control" name="telefono1" id="telefono1" maxlength="20" placeholder="Teléfono">
                          </div>
                          <div class="form-group col-lg-9 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Ingreso:</label>
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                          </div>
                          <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Finalizacion:</label>
                            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                          </div>
                          
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Dirección:</label>
                            <input type="text" class="form-control" name="direccion2" id="direccion2" maxlength="70" placeholder="Dirección">
                          </div>
                         
                          <div class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <label>Empresa:</label>
                            <input type="text" class="form-control" name="empresa" id="empresa" maxlength="50" placeholder="Empresa">
                            </br>
                            </br>
                          </div>
                         </br> -->
                          
<!-- 
                          <div class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                          <h3 class="text-primary">Dirección</h3>
                          <hr style="height:2px;border-width:0;color:gray;background-color:gray">

                          <div class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <label>Dirección:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="70" placeholder="Dirección">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Barrio:</label>
                            <input type="text" class="form-control" name="zona" id="zona" maxlength="50" placeholder="Zona">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Ciudad:</label>
                            <input type="text" class="form-control" name="ciudad1" id="ciudad1" maxlength="50" placeholder="Zona">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo Postal:</label>
                            <input type="text" class="form-control" name="zona" id="zona" maxlength="50" placeholder="Zona">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Pais:</label>
                            <input type="text" class="form-control" name="ciudad1" id="ciudad1" maxlength="50" placeholder="Zona">
                            </br>
                            </br>
                          </div> -->
                      
                          <h3 class="text-primary">Otros datos</h3>
                          <hr style="height:2px;border-width:0;color:gray;background-color:gray">

                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Empresa:</label>
                            <select class="form-control select-picker" name="empresa" id="empresa" required>
                              <option value="DOMINION">DOMINION</option>
                              <option value="MODERNICOM">MODERNICOM</option>
                              <option value="OFG">OFG</option>
                              <option value="SYF">SYF</option>
                              <option value="TRANSCOM">TRANSCOM</option>
                              <option value="WOM">WOM</option>
                            </select>


                          </div>


                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Cargo:</label>
                            <select class="form-control select-picker" name="cargo" id="cargo" required>
                              <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                              <option value="AUXILIAR CONTABLE">AUXILIAR CONTABLE</option>
                              <option value="COORDINADOR">COORDINADOR</option>
                              <option value="DOCUMENTADOR">DOCUMENTADOR</option>
                              <option value="GESTOR CHG y TX">GESTOR CHG y TX</option>
                              <option value="INSTALADOR">INSTALADOR</option>
                              <option value="INTEGRADOR">INTEGRADOR</option>
                              <option value="LIDER CUADRILLA">LIDER CUADRILLA</option>
                              <option value="SUPERVISOR">SUPERVISOR</option>
                            </select>
                            
                          </div>
                        
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado:</label>
                            <select class="form-control select-picker" name="estado" id="estado" required>
                              <option value="1">Activo</option>
                              <option value="0">Inactivo</option>
                            </select>
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
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else if ($_SESSION['admin']==1)
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
                          <h1 class="box-title">Personal <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> <a href="../reportes/rptclientes.php" target="_blank"><button class="btn btn-info"><i class="fa fa-clipboard"></i> Reporte</button></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Cargo</th>
                            <th>estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Cargo</th>
                            <th>estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 100%;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-7 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="idpersona" id="idpersona">
                            <input type="hidden" name="tipo_persona" id="tipo_persona" value="Cliente">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre del proveedor" required>
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Ingreso:</label>
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Finalizacion:</label>
                            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                          </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Documento:</label>
                            <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required>
                              <option value="DNI">DNI</option>
                              <option value="RUC">RUC</option>
                              <option value="CEDULA">CEDULA</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Número Documento:</label>
                            <input type="text" class="form-control" name="num_documento" id="num_documento" maxlength="20" placeholder="Documento">
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Dirección:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="70" placeholder="Dirección">
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="20" placeholder="Teléfono">
                          </div>
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email">
                          </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Empresa:</label>
                            <input type="text" class="form-control" name="empresa" id="empresa" maxlength="50" placeholder="Empresa">
                          </div>
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Zona:</label>
                            <input type="text" class="form-control" name="zona" id="zona" maxlength="50" placeholder="Zona">
                          </div>

                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Cargo:</label>
                            <select class="form-control select-picker" name="cargo" id="cargo" required>
                              <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                              <option value="AUXILIAR CONTABLE">AUXILIAR CONTABLE</option>
                              <option value="COORDINADOR">COORDINADOR</option>
                              <option value="DOCUMENTADOR">DOCUMENTADOR</option>
                              <option value="GESTOR CHG y TX">GESTOR CHG y TX</option>
                              <option value="INSTALADOR">INSTALADOR</option>
                              <option value="INTEGRADOR">INTEGRADOR</option>
                              <option value="LIDER CUADRILLA">LIDER CUADRILLA</option>
                              <option value="SUPERVISOR">SUPERVISOR</option>
                            </select>
                          </div>
                        
                          <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado:</label>
                            <input type="text" class="form-control" name="estado" id="estado" maxlength="50" placeholder="Estado">
                          </div>

                       
                      
                          <div class="form-group col-lg-3 col-md-9 col-sm-9 col-xs-9">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <span class="border border-dark"></span>
                            <img src="" width="250px" height="200px" id="imagenmuestra" >
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
<script type="text/javascript" src="scripts/cliente2.js"></script>
<?php 
}
ob_end_flush();
?>