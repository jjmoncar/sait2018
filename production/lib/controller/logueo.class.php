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
                   echo "<script type='text/javascript'>
                    alert('Datos Erroneos!');
                    window.location='../../../index.php';
                  </script>";
                }
            }
        }

    }

?>