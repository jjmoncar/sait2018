<?php
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
include_once("../controller/conexion.php");

class SolicitudesUsuario{
 //constructor
 	var $conex;
 	function SolicitudesUsuario(){
 		$this->conex=new Conectar;
 	}
 	
 	
////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////// PERSONAL UPTP ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

 	
 	//Muestra las solicitudes usuario según los distintos estados: En espera, En Proceso, Atendida y Resuelta
	function mostrar_solicitudes_usuario($estado,$cedula_usuario){
		if($this->conex->con()==true){
			return pg_query("SELECT a.*, b.cedula, b.nombre, b.usuario, c.departamento FROM solicitud a JOIN usuario b ON (a.ced_usuario = b.cedula) JOIN departamento c ON (b.id_dpto = c.id_dpto) WHERE estado_solic = '".$estado."' and ced_usuario = '".$cedula_usuario."' ORDER BY id_solicitud ASC");
		}
	} 	
	
	//Muestra las solicitudes usuario según los distintos estados cuando el usario es Administrador ($tipo_usuario == 1): En espera, En Proceso, Atendida y Resuelta
	function mostrar_solicitudes_usuario_adm($estado,$cedula_usuario){
		if($this->conex->con()==true){
			return pg_query("SELECT a.*, b.cedula, b.nombre, b.usuario, c.departamento FROM solicitud a JOIN usuario b ON (a.ced_usuario = b.cedula) JOIN departamento c ON (b.id_dpto = c.id_dpto) WHERE estado_solic = '".$estado."' ORDER BY '".$condicion."' ASC");
		}
	} 	

	//Buscamos la última respuesta en la tabla solicitud_detalle	
	function resp_solicitud_detalle($solicitud){
		if($this->conex->con()==true){
			return pg_query("SELECT observacion FROM solicitud_detalle WHERE id_solicitud='".$solicitud."' and fecha_sol_det = (select max(fecha_sol_det) FROM solicitud_detalle FROM id_solicitud='".$solicitud."') and hora_sol_det  = (select max(hora_sol_det) FROM solicitud_detalle WHERE id_solicitud= '".$solicitud."')");
		}
	} 		
	

	
	function procesar_solic_por_responder($estado,$fecha_resuelta,$solicitud){
		if($this->conex->con()==true){
			return pg_query("UPDATE solicitud SET estado_solic='".$estado."' '".$fecha_resuelta."' WHERE id_solicitud='".$solicitud."'");
		}
	} 		
	
	
////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////// USUARIOS DIT /////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
 	//Muestra las solicitudes usuario DIT según los distintos estados: En espera, En Proceso, Atendida y Resuelta
	function mostrar_solicitudes_usuariodit($estado,$cedula_usuario,$condicion){
		if($this->conex->con()==true){
			return pg_query("SELECT a.*, b.cedula, b.nombre, b.usuario, c.departamento FROM solicitud a join usuario b ON (a.ced_usuario = b.cedula) JOIN departamento c ON (b.id_dpto = c.id_dpto) WHERE estado_solic = '".$estado."' and ced_personal = '".$cedula_usuario."' ORDER BY '".$condicion."' ASC");
		}
	} 		
	
	
	function solicitudes_resueltas_7dias($cedula_usuario){
		if($this->conex->con()==true){
			return pg_query("SELECT id_solicitud FROM solicitud WHERE estado_solic = 'Resuelta' and ced_personal = '".$cedula_usuario."' and (fecha_resuelta - (to_date(fecha_asig, 'DD/MM/YYYY')) < 7)");
		}
	} 	
 }
?>
