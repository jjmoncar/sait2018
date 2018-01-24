<?php
session_start();
require_once("logueo.class.php");

$obj=new Usuarios();
$obj->logueo();
?>
