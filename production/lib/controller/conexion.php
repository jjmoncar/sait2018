<?php
session_start();
class Conectar 
{
	function con()
	{
		$user = 'jjmoncar';
                $passwd = 'jjmc1021';
                $db = 'sait_desarrollo';
                $port = 5432;
                $host = 'localhost';
                $conexion = "host=$host port=$port dbname=$db user=$user password=$passwd";
                $con = pg_connect($conexion) or die ("Error de conexion. ". pg_last_error());
		return $con;
	}
}
?>