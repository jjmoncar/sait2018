<?php
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
include_once("../controller/conexion.php");

class Solicitudes{
 //constructor
 	var $conex;
 	function Solicitudes(){
 		$this->conex=new Conectar;
 	}
 	
 	//Muestra las solicitudes según los distintos estados: En espera, En Proceso, Atendida y Resuelta
	function mostrar_solicitudes($estado,$condicion){
		if($this->conex->con()==true){
			return pg_query("SELECT a.*, b.cedula, b.nombre, b.usuario, c.departamento, d.id_categ FROM solicitud a JOIN usuario b ON (a.ced_usuario = b.cedula) JOIN departamento c ON (b.id_dpto = c.id_dpto) JOIN sub_categoria d ON (a.subcateg = d.id_subcateg)  WHERE estado_solic = '".$estado."' ORDER BY '".$condicion."'");
		}
	} 	
 	
	function mostrar_usuario_solicitudes($id_categ){
		if($this->conex->con()==true){
			return pg_query("SELECT * FROM usuario WHERE activo = 'true' and (nivel='1' or nivel='2') and (categoria = '".$id_categ."' or  categoria = 0)");
		}
	} 	
        
	function procesar_asignacion($usuario,$fecha,$hora,$solicitud){
		if($this->conex->con()==true){
			return pg_query("UPDATE solicitud SET estado_solic='En Proceso', ced_personal = '".$usuario."', fecha_asig = '".$fecha."', hora_asig = '".$hora."' WHERE id_solicitud='".$solicitud."'");
		}
	} 	
	

	function mostrar_usuarios_asignados($id_categ){
		if($this->conex->con()==true){
			return pg_query("SELECT * FROM usuario WHERE id_dpto = 1 and nivel = 2 and activo = 'true' and (categoria = '".$id_categ."' or  categoria = 0)");
		}
	} 			
	
	function procesar_modificar_asignada($ced_nueva, $solicitud){
		if($this->conex->con()==true){
			return pg_query("UPDATE solicitud SET ced_personal = '".$ced_nueva."' WHERE id_solicitud = '".$solicitud."'");
		}
	} 		
	
	function responder_solicitud($condicion){
		if($this->conex->con()==true){
			return pg_query("SELECT a.*, b.cedula, b.nombre, b.usuario, c.departamento FROM solicitud a JOIN usuario b ON (a.ced_usuario = b.cedula) JOIN departamento c ON (b.id_dpto = c.id_dpto) WHERE estado_solic = 'En Proceso' ORDER BY '".$condicion."'");
		}
	} 	
}
?>
