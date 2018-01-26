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
                return pg_query("INSERT INTO usuario (cedula,nombre,usuario,clave,id_dpto,nivel,activo,categoria) VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."','".$campos[6]."','".$campos[7]."')");
            }
	}

	function actualizar($campos,$id){
		if($this->conex->con()==true){
            //echo $id;
			//print_r($campos);
			return pg_query("UPDATE usuario SET cedula = '".$campos[0]."', nombre = '".$campos[1]."',"
            . "usuario = '".$campos[2]."', clave = '".$campos[3]."',id_dpto = '".$campos[4]."',nivel = '".$campos[5]."',activo = '".$campos[6]."',categoria = ".$campos[7]." WHERE id_usuario = '".$id."'");
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
