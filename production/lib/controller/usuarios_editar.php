<?php
session_start();
error_reporting(0);
include ("controlaSesion.php");
header("Content-type: text/html; charset=utf-8");
//redifinir el formulario y dividirlo para que cargue en uno y edite en otro
include('../../base/base.php');
include('../../base/menu.php');
require('../model/modeloUsuarios.class.php');

$id_usuario = $_GET['id_usuario'];

$objUsuarios = new Usuarios();
$consulta = $objUsuarios->mostrar_usuario($id_usuario);
$usua = pg_fetch_array($consulta);
?>

<div class="container">
        <div class="row">
            <div class="col-sm-10" id="entorno">
                <div class="page-header">
                    <h2>Editar Usuarios</h2>
                </div>
                <form id="frmUsuariosEditar" class="form-horizontal" method="POST" action="usuarios_editarData.php">
                    <input type="hidden" name="usuario" id="usuario" value="<?php echo $usua['id_usuario'] ?>">
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cedula:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="cedula" id="cedula" maxlength="12" autocomplete="off" placeholder="Ej. 154785369" value="<?php echo $usua['cedula'] ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nombre:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="60" autocomplete="off" placeholder="Ej. Pedro Perez" value="<?php echo $usua['nombre'] ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contraseña:</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="pass" id="pass" required maxlength="12" 
                                   autocomplete="off" placeholder="Ej. Pedr0123" value="<?php echo $usua['clave'] ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Repetir Contraseña:</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="pass2" id="pass2" required maxlength="12" autocomplete="off" placeholder="Ej. Pedr0123" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Id Dpto:</label>
                        <div class="col-sm-4">
                            <input list="id_departa" id="id_dpto" name="id_dpto" class="form-control"/>
                                <datalist id="id_departa">
                                    <?php 
                                        require('../model/modeloDepartamentos.class.php');
                                        $objDepartamentos=new Departamentos();
                                        $consul = $objDepartamentos->mostrar_departamentos();
                                            while ($gra = pg_fetch_array($consul)){
                                                echo'<option value="'.$gra['id_dpto'].'" label="'.$gra['id_dpto']." ".strtoupper($gra['departamento']).'" />';
                                            }
                                    ?>
                                </datalist>
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
                                $valorEstatus=$usua['activo'];
                                echo "<input type='text' class='form-control' name='estatus' id='estatus' readonly value='$valorEstatus'>";
                            }
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <br>
                            <input type="submit" id="enviar" name="enviar" class="btn btn-primary" value="Enviar">
                            <input type="button" id="rgresar" name="regresar" class="btn btn-danger" value="Cancelar" onclick="$('#entorno').hide();">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
            $("#frmUsuariosEditar").validate({
                rules:{
                    cedula:{
                        required:true,
                        number:true
                    },
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
                    email: "Ingrese un correo Valido",
                    email2: "Ingrese un correo Valido",
                    cedula:{
                        required:"Campo Requerido",
                        number:"Solo Numeros!"
                    },
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