<?php
    error_reporting(0);
    require('../model/modeloUsuarios.class.php');
	
    $usuario = trim($_POST['usuario']);
    $pass = trim($_POST['pass']);
    $nivel = trim($_POST['nivel']);
    $estatus = trim($_POST['estatus']);
    $id_persona = trim($_POST['id_persona']);

	$objUsuarios = new Usuarios();
            
            if ( $objUsuarios->insertar(array($usuario,$pass,$nivel,$estatus,$id_persona)) == true){
		echo "<script type='text/javascript'>
				alert('Datos Registrados con Exito!');
				window.location='../view/usuarios_consultar.php';
                              </script>";
            }else{
		echo "<script type='text/javascript'>
				alert('Error en los Datos!');
				window.location='../view/usuarios_agregar.php';
                              </script>";
            }
?>
