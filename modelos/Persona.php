<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Persona
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($tipo_persona,$nombre,$tipo_documento,$num_documento,$fecha_expedicion,$genero,$ciudad_expedicion,$fecha_nacimiento,$ciudad,$pais,$numero_cuenta,$tipo_cuenta,$banco,$direccion,$telefono,$celular,$email,$email_empresarial,$cargo,$imagen,$empresa,$zona,$fecha_inicio,$fecha_fin)
	{
		$sql="INSERT INTO persona (tipo_persona,nombre,tipo_documento,num_documento,fecha_expedicion,genero,ciudad_expedicion,fecha_nacimiento,ciudad,pais,numero_cuenta,tipo_cuenta,banco,direccion,telefono,celular,email,email_empresarial,cargo,imagen,empresa,zona,fecha_inicio,fecha_fin,estado)
		VALUES ('$tipo_persona','$nombre','$tipo_documento','$num_documento','$fecha_expedicion','$genero','$ciudad_expedicion','$fecha_nacimiento','$ciudad','$pais','$numero_cuenta','$tipo_cuenta','$banco','$direccion','$telefono','$celular','$email','$email_empresarial','$cargo','$imagen','$empresa','$zona','$fecha_inicio','$fecha_fin','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idpersona,$tipo_persona,$nombre,$tipo_documento,$num_documento,$fecha_expedicion,$genero,$ciudad_expedicion,$fecha_nacimiento,$ciudad,$pais,$numero_cuenta,$tipo_cuenta,$banco,$direccion,$telefono,$celular,$email,$email_empresarial,$cargo,$imagen,$empresa,$zona,$fecha_inicio,$fecha_fin)
	{
		$sql="UPDATE persona SET tipo_persona='$tipo_persona',nombre='$nombre',tipo_documento='$tipo_documento',num_documento='$num_documento',fecha_expedicion='$fecha_expedicion',genero='$genero',ciudad_expedicion='$ciudad_expedicion',fecha_nacimiento='$fecha_nacimiento',ciudad='$ciudad',pais='$pais',numero_cuenta='$numero_cuenta',tipo_cuenta='$tipo_cuenta',banco='$banco',direccion='$direccion',fecha_expedicion='$fecha_expedicion',telefono='$telefono',celular='$celular',email='$email',email_empresarial='$email_empresarial',cargo='$cargo',imagen='$imagen',empresa='$empresa',zona='$zona',fecha_inicio='$fecha_inicio',fecha_fin='$fecha_fin' WHERE idpersona='$idpersona'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para eliminar categorías
	public function eliminar($idpersona)
	{
		$sql="DELETE FROM persona WHERE idpersona='$idpersona'";
		return ejecutarConsulta($sql);
	}
	
	//Implementamos un método para desactivar registros
	public function desactivar($idpersona)
	{
		$sql="UPDATE persona SET estado='0' WHERE idpersona='$idpersona'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idpersona)
	{
		$sql="UPDATE persona SET estado='1' WHERE idpersona='$idpersona'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idpersona)
	{
		$sql="SELECT * FROM persona WHERE idpersona='$idpersona'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listarp()
	{
		$sql="SELECT * FROM persona WHERE tipo_persona='Proveedor'";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros 
	public function listarc()
	{
		$sql="SELECT * FROM persona WHERE tipo_persona='Cliente' and  empresa='MODERNICOM'";
		return ejecutarConsulta($sql);		
	}

	public function listarsyf()
	{
		$sql="SELECT * FROM persona WHERE tipo_persona='Cliente' and  empresa='SYF'";
		return ejecutarConsulta($sql);		
	}


	public function selectPersona()
	{
		$sql="SELECT * FROM persona where estado='1'";
		return ejecutarConsulta($sql);		
	}
	public function select()
	{
		$sql="SELECT * FROM persona where cargo='SUPERVISOR'and estado=1 ";
		return ejecutarConsulta($sql);		
	}

	public function selectDocumentador()
	{
		$sql="SELECT * FROM persona where cargo='DOCUMENTADOR'and estado=1 ";
		return ejecutarConsulta($sql);		
	}

	public function selectsyf_supurvisor()
	{
		$sql="SELECT * FROM persona where empresa='SYF' and cargo='SUPERVISOR'and estado=1 ";
		return ejecutarConsulta($sql);		
	}

	public function selectsyf_documentador()
	{
		$sql="SELECT * FROM persona where empresa='SYF' and cargo='DOCUMENTADOR'and estado=1 ";
		return ejecutarConsulta($sql);		
	}
}

?>