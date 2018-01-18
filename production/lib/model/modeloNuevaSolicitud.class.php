<?php
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
include_once("../controller/conexion.php");

class NuevaSolicitud{
 //constructor
 	var $conex;
 	function NuevaSolicitud(){
 		$this->conex=new Conectar;
 	}
        
   function insertar_solicitud($campos){
            if($this->conex->con()==true){
                //print_r($campos);
                return pg_query("INSERT INTO solicitud (ced_usuario, fecha_solic, hora_solic, motivo_solic, subcateg, estado_solic) VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[4]."','".$campos[5]."' )");
            }
	}
}
?>
