<?php
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
include_once("../controller/conexion.php");

class Departamentos{
 //constructor
 	var $conex;
 	function Departamentos(){
 		$this->conex=new Conectar;
 	}
        
   function insertar($campos){
            if($this->conex->con()==true){
                //print_r($campos);
                return pg_query("INSERT INTO departamento (departamento, ext_dpto) VALUES ('".$campos[0]."','".$campos[1]."')");
            }
	}

	function actualizar($campos,$id){
		if($this->conex->con()==true){
                        //echo $id;
			//print_r($campos);
			return pg_query("UPDATE departamento SET departamento = '".$campos[0]."', ext_dpto = '".$campos[1]."' WHERE id_dpto = '".$id."'");
		}
	}
        
   function mostrar_departamentos(){
		if($this->conex->con()==true){
			return pg_query("SELECT * FROM departamento WHERE activo_dpto = 'true' order by departamento");
		}
	}


	function buscar_departamento_nom_id($nom_dpto, $id){
		if($this->conex->con()==true){
			return pg_query("SELECT * FROM departamento departamento = '$nom_dpto' and id_dpto <> '".$id."'");
		}
	}
	
	function buscar_departamento_ext_id($ext_dpto, $id){
		if($this->conex->con()==true){
			return pg_query("SELECT * FROM departamento ext_dpto = '$ext_dpto' and id_dpto <> '".$id."'");
		}
	}
	
	function buscar_departamento_nom($nom_dpto){
		if($this->conex->con()==true){
			return pg_query("SELECT * FROM departamento departamento = '$nom_dpto'");
		}
	}
	
	function buscar_departamento_ext($ext_dpto){
		if($this->conex->con()==true){
			return pg_query("SELECT * FROM departamento ext_dpto = '$ext_dpto'");
		}
	}
}
?>
