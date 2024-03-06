<?php
include_once('cabecera.php');
include("menu.php");
include_once('modelo/m_empleados.php');

$pre = new m_empleados();
$obj = $pre->leer_empleado();
if (($obj === FALSE)) {
    ?>
    <article class="main4 redimension"> 
        <h1 id="focus"><b>Empleados</b></h1><br>
        <h10>No existen registros en la base de datos.</h10><br><br>
        <?php
    } else {
        ?>
        <article class="main4 redimension dimensionTablas">
            <h1 id="focus"><b>Empleados</b></h1><br>
            <table class="table table-hover border border-success tablas">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Rif</th>
                        <th scope="col" colspan="2">Accion</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    foreach ($obj as $column => $value) {
        ?>
                        <tr>
                            <td scope="row"><?php echo $value['id_empleado']; ?></td>
                            <td><?php $x = new m_empleados();
                $a = $x->leer_datos_empleado($value['id_persona']);
                echo $a['nombres']; ?></td>
                            <td><?php echo $a['apellidos']; ?></td>
                            <td><?php echo $a['cedula']; ?></td>
                            <td><?php echo $a['telefono']; ?></td>
                            <td><?php echo $a['correo_electronico']; ?></td>
                            <td><?php echo $value['cargo']; ?></td>
                            <td><?php echo $value['rif']; ?></td>
                            <td><a href="registro_actualizar_empleados.php?id=<?php echo $value['id_persona']; ?>&accion=modificar"><img src="images/modificar.png" alt="modificarr" width="20" height="20"></a></td>
                            <td><a href="controlador/c_empleados.php?id=<?php echo $value['id_empleado']; ?>&accion=eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id_empleado']; ?> "><img src="images/eliminar.png" alt="eliminarr" width="20" height="20"></a></td>
                        </tr>
                        <?php include("modales/modal_empleados.php");
                    }
                }
                ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="registro_empleados.php">Agregar</a><br><br>
<?php
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    if ($id == 0) {
        echo '<div class="alert alert-success col-12 mx-auto" role="alert"> Se ha registrado correctamente</div>';
    } elseif ($id == 1) {
        echo '<div class="alert alert-danger col-12 mx-auto" role="alert"> Ha ocurrido un error al registrar</div>';
    } elseif ($id == 2) {
        echo '<div class="alert alert-success col-12 mx-auto" role="alert"> Se ha eliminado correctamente</div>';
    } elseif ($id == 3) {
        echo '<div class="alert alert-danger col-12 mx-auto" role="alert"> Ha ocurrido un error al eliminar</div>';
    } elseif ($id == 4) {
        echo '<div class="alert alert-success col-12 mx-auto" role="alert"> Se ha actualizado correctamente</div>';
    } elseif ($id == 5) {
        echo '<div class="alert alert-danger col-12 mx-auto" role="alert"> Ha ocurrido un error al actualizar</div>';
    } elseif ($id == 6) {
        echo '<div class="alert alert-success col-12 mx-auto" role="alert"> Se ha cambiado el estado correctamente</div>';
    } elseif ($id == 7) {
        echo '<div class="alert alert-danger col-12 mx-auto" role="alert"> Ha ocurrido un error al cambiar el estado</div>';
    }
}
?>
    </article>
        <?php
        include("piedepagina.php");
        ?>