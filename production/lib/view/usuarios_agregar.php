<?php
session_start();
error_reporting(0);
include ("../controller/controlaSesion.php");
include("../base/base.php");
include('../base/menu.php');
?>
<head>
<meta charset="UTF-8" />

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <div class="page-header">
                    <h2>Agregar Usuarios</h2>
                </div>
                <form id="frmUsuarioAgregar" class="form-horizontal" method="POST" action="../controller/usuarios_guardar.php">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Usuario:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ej. Pedrito124321" autocomplete="off" data-msg="Nombre de usuario Requerido">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contraseña:</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="pass" id="pass" required 
                                   autocomplete="off" placeholder="Ej. Pedr0123" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Repetir Contraseña:</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="pass2" id="pass2" required 
                                   autocomplete="off" placeholder="Ej. Pedr0123" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nivel:</label>
                        <div class="col-sm-4">
                        <select class="form-control" name="nivel" id="nivel">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Estatus:</label>
                        <div class="col-sm-4">
                            <select name="estatus" id="estatus" class="form-control">
                                <option value="t">Activo</option>
                                <option value="f">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cliente:</label>
                        <div class="col-sm-4">
                            <input list="id_clien" id="id_persona" name="id_persona" class="form-control"/>
                                <datalist id="id_clien">
                                    <?php require('../model/modeloPersonas.class.php');
                                        $objPersonas=new Personas();
                                        $consul = $objPersonas->mostrar_personas();
                                            while ($gra = pg_fetch_array($consul)){
                                                echo'<option value="'.$gra['id'].'" label="'.strtoupper($gra['nombres'])." ".
                                                        strtoupper($gra['apellidos']).'" />';
                                            }
                                    ?>
                                </datalist>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <br>
                            <input type="submit" id="enviar" name="enviar" class="btn btn-primary" value="Enviar">
                            <input type="button" id="rgresar" name="regresar" class="btn btn-danger" value="Cancelar" onclick="$('#frmUsuarioAgregar').hide();">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
            $("#frmUsuarioAgregar").validate({

                rules: {

                    usuario:{
                        required: true
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
</body>