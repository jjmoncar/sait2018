<?php
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
include_once("../controller/conexion.php");

class Usuarios{
 //constructor
 	var $conex;
 	function Usuarios(){
 		$this->conex=new Conectar;
 	}
        
        function insertar($campos){
            if($this->conex->con()==true){
                //print_r($campos);
                return pg_query("INSERT INTO usuario (cedula, usuario, clave, nivel, nombre, id_dpto) VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[4]."')");
            }
	}

	function actualizar($campos,$id){
		if($this->conex->con()==true){
                        //echo $id;
			//print_r($campos);
			return pg_query("UPDATE usuario SET cedula = '".$campos[0]."', usuario = '".$campos[1]."',"
            . "clave = '".$campos[2]."', nivel = '".$campos[3]."',nombre = '".$campos[4]."',id_dpto = '".$campos[5]."',activo = '".$campos[6]."' WHERE id_usuario = '".$id."'");
		}
	}
        
    function mostrar_usuario($id){
		if($this->conex->con()==true){
			return pg_query("SELECT * FROM usuario WHERE id_usuario='".$id."'");
		}
	}


	function login_usuario($id,$clave){
		if($this->conex->con()==true){
			return pg_query("SELECT * FROM usuario WHERE id_usuario='".$id."' AND clave='".$clave."' AND activo='t'");
		}
	}

	function mostrar_usuarios(){
		if($this->conex->con()==true){
			return pg_query("SELECT * FROM usuario ORDER BY cedula DESC");
		}
	}
}
?>
