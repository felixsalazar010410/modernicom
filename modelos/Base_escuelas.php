<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Base_escuelas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($consecutivo,$id_beneficiario,$matricula,$dane_departamento,$departamento,$dane_municipio,$municipio,$regional,$centro_poblado,$dane_institucion,$institucion,$dane_sede,$sede,$tipo_sitio,$detalle_sitio,$emergencia,$region,$latitud,$longitud)
	{
		$sql="INSERT INTO base_sitios_escuelas(consecutivo,id_beneficiario,matricula,dane_departamento,departamento,dane_municipio,municipio,regional,centro_poblado,dane_institucion,institucion,dane_sede,sede,tipo_sitio,detalle_sitio,emergencia,region,latitud,longitud)
		VALUES ('$consecutivo','$id_beneficiario','$matricula','$dane_departamento','$departamento','$dane_municipio','$municipio','$regional','$centro_poblado','$dane_institucion','$institucion','$dane_sede','$tipo_sitio','$sede','$detalle_sitio','$emergencia,','$region','$latitud','$longitud')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id,$consecutivo,$id_beneficiario,$matricula,$dane_departamento,$departamento,$dane_municipio,$municipio,$regional,$centro_poblado,$dane_institucion,$institucion,$dane_sede,$sede,$tipo_sitio,$detalle_sitio,$emergencia,$region,$latitud,$longitud)
	{
		$sql="UPDATE base_sitios_escuelas SET consecutivo='$consecutivo',id_beneficiario='$id_beneficiario',matricula='$matricula',dane_departamento='$dane_departamento',departamento='$departamento',dane_municipio='$dane_municipio',municipio='$municipio',regional='$regional',centro_poblado='$centro_poblado',dane_institucion='$dane_institucion',institucion='$institucion',dane_sede='$dane_sede',sede='$sede',tipo_sitio='$tipo_sitio',
        detalle_sitio='$detalle_sitio',emergencia='$emergencia',region='$region',latitud='$latitud' longitud='$longitud' WHERE id='$id'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{
		$sql="SELECT * FROM base_sitios_escuelas WHERE id='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM base_sitios_escuelas";
		return ejecutarConsulta($sql);		
	}
	
}

?>