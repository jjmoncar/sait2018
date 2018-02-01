<?php
session_start();
error_reporting(0);
include ("../controller/controlaSesion.php");
include("../base/base.php");
//include('../base/menu.php');
?>
<head>
<meta charset="UTF-8" />

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10" id="entorno">
                <div class="page-header">
                    <h2>Agregar Usuarios</h2>
                </div>
                <form id="frmUsuarioAgregar" class="form-horizontal" method="POST" action="lib/controller/usuarios_guardar.php">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cedula:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="cedula" id="cedula" placeholder="Ej. 10547896" autocomplete="off" data-msg="La Cedula es Requerida">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nombres:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ej. Pedro Perez" autocomplete="off">
                        </div>
                    </div>

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
                        <label class="col-sm-3 control-label">Id. Dpto:</label>
                        <div class="col-sm-4">
                            <input list="id_dpto" id="id_departa" name="id_departa" class="form-control"/>
                                <datalist id="id_dpto">
                                    <?php require('../model/modeloDepartamentos.class.php');
                                        $objDepartamentos=new Departamentos();
                                        $consul = $objDepartamentos->mostrar_departamentos();
                                            while ($gra = pg_fetch_array($consul)){
                                                echo'<option value="'.$gra['id_dpto'].'" label="'.strtoupper($gra['departamento'])." ".strtoupper($gra['ext_dpto']).'" />';
                                            }
                                    ?>
                                </datalist>
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
                            <select name="activo" id="activo" class="form-control">
                                <option value="t">Activo</option>
                                <option value="f">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Categoria:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="categoria" id="categoria" min="0" max="3" autocomplete="off" placeholder="Ej. 1 - 3">
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
    //Revisar la codificacion de la validacion de este formulario. No esta validando
    /* Incluimos un método para validar los campos nombre y apellido */
    jQuery.validator.addMethod("nombre", function(value, element) {
        return this.optional(element) || /^[A-Za-záéóóúàèìòùäëïöüñÑ\s]+$/i.test(value);
    });

            $("#frmUsuarioAgregar").validate({

                rules: {
                    cedula:{
                        required: true,
                        number: true,
                        minlength: 6,
                        maxlength:8
                    },
                    nombre:{
                        required: true,
                        nombre: true,
                        minlength: 3,
                        maxlength: 30
                    },
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
                    cedula:{
                        number:"Este campo solo acepta Numeros",
                        minlength: "Minimo 6 caracteres",
                        maxlength: "Maximo 8 caracteres"
                    },
                    nombre{
                        nombre:"Solo Puede Ingresar Letras",
                        minlength:"Minimo 3 Caracteres",
                        maxlength: "Maximo 30 Caracteres"
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
</body>