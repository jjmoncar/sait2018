<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
session_start();
header("Content-type: text/html; charset=utf-8");
error_reporting(0);
require_once("conexion.php");

class Usuarios 
{
	
    public function logueo()
    {
        if (empty($_POST["usuario"]) or empty($_POST["pass"]))
        {
            echo "<script type='text/javascript'>
                    alert('Ud debe llenar los campos');
                    window.location='../../index.php';
                  </script>";
        }else
        {
            $sql="select * from usuario where usuario ='".trim(strtoupper($_POST["usuario"]))."' and clave='".$_POST["pass"]."' AND activo='t'";
            //$sql="SELECT a.usuario, a.pass, a.id_persona, a.nivel,a.estatus, b.nombres,b.apellidos FROM usuarios "
            // . "a JOIN personas b ON a.id_persona=b.id WHERE a.usuario ='".$_POST["usuario"]."' AND pass='".$_POST["pass"]."'";
            $row=pg_query(Conectar::con(),$sql);
            $consulta=pg_fetch_array($row);
            if($consulta>0)
            {
                //$_SESSION["session_user"]=$_POST["usuario"];
                $_SESSION["session_cedula"]=$consulta["cedula"];
                $_SESSION["session_nombre"]=$consulta["nombre"];
                $_SESSION["session_user"]=$consulta["usuario"];
                $_SESSION["session_iddpto"]=$consulta["id_dpto"];
                $_SESSION["session_nivel"]=$consulta["nivel"];
                $_SESSION["session_activo"]=$consulta["activo"];
                $_SESSION["session_categoria"]=$consulta["categoria"];
                
                header("Location:../../principal.php");
                
            }
            else
                {
                   //echo "<script type='text/javascript'>
                   // alert('Datos Erroneos!');
                   // window.location='../../../index.php';
                  //</script>";

                    echo "<div class='alert alert-danger col-md-6 col-sm-6 col-xs-12'>
                        <strong><h1>Error al Procesar los Datos!</h1></strong>
                    </div>";
                    header("Refresh: 3; URL=../../../index.php");
                }
            }
        }

    }

?>