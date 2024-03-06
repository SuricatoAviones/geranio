<?php
include("cabecera.php");
include("menu.php");
include("modelo/m_usuarios.php");

$pre = new m_usuarios();
$obj = $pre->leer_usuario();
if ($obj === FALSE) {
    ?>
    <article class="main4 redimension"> 
        <h1 id="focus"><b>Usuarios</b></h1><br>
        <h10>No existen registros en la base de datos.</h10><br>
        <?php
    } else {
        ?>
        <article class="main4 redimension dimensionTablas">
            <h1 id="focus"><b>Usuarios</b></h1><br>
            <table class="table table-hover border border-success tablas">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo de usuario</th>
                        <th scope="col">Nombres y apellidos</th>
                        <th scope="col">Usuario</th>
                        <th scope="col" colspan="2">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($obj as $column => $value) {
                        ?>
                        <tr>
                            <td scope="row"><?php echo $value['id_usuario']; ?></td>
                            <td><?php
                                if ($value['tipo_usuario'] === '1') {
                                    echo "Administrador";
                                } else {
                                    echo "Residente";
                                }
                                ?></td>
                            <td><?php
                                $x = new m_usuarios();
                                $a = $x->leer_datos_usuario($value['id_persona']);
                                echo $a['nombres'] . " " . $a['apellidos'];
                                ?></td>
                            <td><?php echo $value['usuario']; ?></td>
                            <td><a href="registro_actualizar_usuarios.php?id=<?php echo $value['id_usuario']; ?>&accion=modificar"><img src="images/modificar.png" alt="modificarr" width="20" height="20"></a></td>
                            <td><a href="controlador/c_usuarios.php?id=<?php echo $value['id_usuario']; ?>&accion=Eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id_usuario']; ?> "><img src="images/eliminar.png" alt="eliminarr" width="20" height="20"></a></td>
                        </tr>
                        <?php include("modales/modal_usuarios.php");
                    }
                }
                ?>
            </tbody>
        </table>

        <a class="btn btn-success" href="registro_usuarios.php">Agregar</a><br><br>
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
            }
        }
        ?>
    </article>
    <?php
    include("piedepagina.php");
    ?>