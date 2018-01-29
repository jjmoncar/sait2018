<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
session_start();
    error_reporting(0);
    require('../model/modeloUsuarios.class.php');
	
    $cedula = trim($_POST['cedula']);
    $nombre = trim($_POST['nombre']);
    $usuario = trim($_POST['usuario']);
    $pass = trim($_POST['pass']);
    $id_dpto = trim($_POST['id_departa']);
    $nivel = trim($_POST['nivel']);
    $estatus = trim($_POST['activo']);
    $categoria = trim($_POST['categoria']);

	$objUsuarios = new Usuarios();
            
        if ( $objUsuarios->insertar(array($cedula,$nombre,$usuario,$pass,$id_dpto,$nivel,$estatus,$categoria)) == true){
		echo "<div class='alert alert-success col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
              <strong><h1><center>Datos Guardados con Exito!</center></h1></strong>
             </div>";
            header("Refresh: 2; URL=../../principal.php");
        }else{
		echo "<div class='alert alert-danger col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
                <strong><h1><center>Error al Procesar los Datos!</center></h1></strong>
              </div>";
              header("Refresh: 2; URL=../../principal.php");
        }
?>
