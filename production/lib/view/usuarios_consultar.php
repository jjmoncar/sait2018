<?php 
session_start();
error_reporting(0);
include ("../controller/controlaSesion.php");

require_once("../model/modeloUsuarios.class.php");
$obj=new Usuarios;
$consulta=$obj->mostrar_usuarios();
?>


<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
        responsive:true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
} );
</script>

<div class="col-md-12">
      <div class="card">
        <div class="card-header">
          
        </div>
        <div class="card-body no-padding">
        
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" lang="es">
    <thead>

    <center><h3><b>Usuarios</b></h3></center>
        <tr>
            <th>
                <span class='modi'>
                    <a href='usuarios_agregar.php'>
                        <i class='fa fa-save' aria-hidden='true' title='Agregar Usuarios'></i>
                    </a>
                </span>
            </th>
            <th>#</th>
            <th><i class="fa fa-user-secret" aria-hidden="true"></i> Cedula</th>
            <th><i class="fa fa-desktop" aria-hidden="true"></i> Nombre</th>
            <th><i class="fa fa-edge" aria-hidden="true"></i> Usuario</th>
            <th><i class="fa fa-mail-reply" aria-hidden="true"></i> Nivel</th>
            <th><i class="fa fa-user-circle" aria-hidden="true"></i> Estatus</th>
            <!-- <th>CARGO</th> -->
            <th><i class="fa fa-gear" aria-hidden="true"></i></th>
        </tr>
    </thead>
<tbody>

<?php 
$a=0;
while ($datos=pg_fetch_array($consulta))
{
    $a++;
    $id_usuario=trim($datos["id_usuario"]);
    $cedula=trim($datos["cedula"]);
    $nombre=trim($datos["nombre"]);
    $usuario=trim($datos["usuario"]);
    $nivel=trim($datos["nivel"]);
    $activo=trim($datos["activo"]);
?>
       <tr id="fila-<?php echo $id_usuario ?>">
           <td></td>
            <td><b><?php echo $a; ?></b></td>
            <td><b><?php echo $cedula; ?></b></td>
            <td><?php echo $nombre; ?></td>
            <td><?php echo $usuario; ?></td>
            <td><?php echo $nivel; ?></td>
            <td><?php echo $activo; ?></td>
            <td>
                <span class="modi"><a href="../controller/usuarios_editar.php?id_usuario=<?php echo $datos["id_usuario"] ?>">
                        <i class="fa fa-edit" aria-hidden="true" title="Editar Usuarios"></i></a></span>
            </td>
       	</tr>
  <?php
}
    ?>
    </tbody>
</table> 
        </div>
      </div>
</div>