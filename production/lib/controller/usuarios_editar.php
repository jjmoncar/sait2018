<?php
session_start();
error_reporting(0);
include ("controlaSesion.php");
header("Content-type: text/html; charset=utf-8");
//redifinir el formulario y dividirlo para que cargue en uno y edite en otro
include('../base/base.php');
include('../base/menu.php');
require('../model/modeloUsuarios.class.php');

$id_usuario = $_GET['usuario'];

$objUsuarios = new Usuarios();
$consulta = $objUsuarios->mostrar_usuario($id_usuario);
$usua = pg_fetch_array($consulta);
?>

<div class="container">
        <div class="row">
            <div class="col-sm-10">
                <div class="page-header">
                    <h2>Editar Usuarios</h2>
                </div>
                <form id="frmPersonaAgregar" class="form-horizontal" method="POST" action="usuarios_editarData.php">
                    <input type="hidden" name="usuario" id="usuario" value="<?php echo $usua['usuario'] ?>">
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contraseña:</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="pass" id="pass" required maxlength="12" 
                                   autocomplete="off" placeholder="Ej. Pedr0123" value="<?php echo $usua['pass'] ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Repetir Contraseña:</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="pass2" id="pass2" required maxlength="12" autocomplete="off" placeholder="Ej. Pedr0123" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nivel:</label>
                        <div class="col-sm-4">
                            <?php
                                if($_SESSION["session_nivel"]=='1'){
                                echo "<select class='form-control' name='nivel' id='nivel'>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                </select>";
                                }else{
                                    $valorNivel=$usua['nivel'];
                                    echo "<input type='text' class='form-control' name='nivel' id='nivel' readonly value='$valorNivel'>";
                                }
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Estatus:</label>
                        <div class="col-sm-4">
                            <?php 
                            if($_SESSION["session_nivel"]=='1'){
                            echo "<select name='estatus' id='estatus' class='form-control'>
                                <option value='t'>Activo</option>
                                <option value='f'>Inactivo</option>
                            </select>";
                            }else{
                                $valorEstatus=$usua['estatus'];
                                echo "<input type='text' class='form-control' name='estatus' id='estatus' readonly value='$valorEstatus'>";
                            }
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cliente:</label>
                        <div class="col-sm-4">
                            <?php
                                if($_SESSION["session_nivel"]=='1'){
                                    echo "<input list='id_clien' id='id_persona' name='id_persona' class='form-control'/>
                                <datalist id='id_clien'>";
                                ?>
                                    <?php require('../model/modeloPersonas.class.php');
                                        $objPersonas=new Personas();
                                        $consul = $objPersonas->mostrar_personas();
                                            while ($gra = pg_fetch_array($consul)){
                                                echo'<option value="'.$gra['id'].'" label="'.strtoupper($gra['nombres'])." ".strtoupper($gra['apellidos']).'" />';
                                            }
                                    ?>
                                    <?php
                                echo "</datalist>"; ?>
                                <?php
                                }else{
                                    $valorCedula = $_SESSION['session_cedula'];
                                    echo "<input id='id_persona' name='id_persona' value='$valorCedula' class='form-control' readonly />";
                                }
                                ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <br>
                            <input type="submit" id="enviar" name="enviar" class="btn btn-primary" value="Enviar">
                            <input type="button" id="rgresar" name="regresar" class="btn btn-danger" value="Cancelar" onclick="history.back()">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
            $("#frmPersonaAgregar").validate({
                rules:{
                    pass:{
                        required: true, 
                        minlength: 6, 
                        maxlength: 12
                    },
                    pass2:{
                        required: true,
                        equalTo:"#pass"
                    }
                },
                messages: {
                    id: "Ingrese un valor valido",
                    nombres: "Debe introducir su nombre.",
                    apellidos: "Debe introducir su apellido.",
                    email: "Ingrese un correo Valido",
                    email2: "Ingrese un correo Valido",
                    pass: {
                        required:"Campo Requerido", 
                        minlength:"Minimo 6 caracteres", 
                        maxlength:"Maximo 12 caracteres"
                    },
                    pass2: {
                        required:"Campo Requerido",
                        equalTo: "Ingrese el mismo valor anterior"
                    }
                }
            });
</script>