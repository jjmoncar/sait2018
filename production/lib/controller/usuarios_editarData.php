<?php
session_start();
error_reporting(0);

require('../model/modeloUsuarios.class.php');
	$objUsuarios = new Usuarios();

	$usuario = trim($_POST['usuario']);
        $pass = trim($_POST['pass']);
        $nivel = trim($_POST['nivel']);
        $estatus = trim($_POST['estatus']);
        $id_persona = trim($_POST['id_persona']);
	
	if( $objUsuarios->actualizar(array($pass,$nivel,$estatus,$id_persona),$usuario) == true){
		echo "<script type='text/javascript'>
				alert('Datos Editados');
				window.location='../view/usuarios_consultar.php';
                              </script>";
	}else{
		echo "<script type='text/javascript'>
				alert('Se produjo un error. Intente de Nuevo');
				window.location='../view/principal.php';
                              </script>";
	}

?>