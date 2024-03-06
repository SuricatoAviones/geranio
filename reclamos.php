<?php
include_once('cabecera.php');
include("menu.php");
include_once('modelo/m_reclamos.php');

$pre = new m_reclamos();
$obj = $pre->leer_reclamo();
if ($obj === FALSE) {
    ?>
    <article class="main4 redimension"> 
        <h1 id="focus"><b>Reclamos</b></h1><br>
        <h10>No existen registros en la base de datos.</h10><br><br>
        <?php
    } else {
        ?>
        <article class="main4 redimension dimensionTablas">
            <h1 id="focus"><b>Reclamos</b></h1><br>
            <table class="table table-hover border border-success tablas">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Estado</th>
                        <th scope="col" colspan="3">Accion</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    foreach ($obj as $column => $value) {
        ?>
                        <tr>
                            <td scope="row"><?php echo $value['id_reclamo']; ?></td>
                            <td><?php echo $value['fecha']; ?></td>
                            <td><?php $x = new m_reclamos();
                $a = $x->leer_nombre_perfil($value['id_persona']);
                echo $a['nombres'] . " " . $a['apellidos']; ?></td>
                            <td><?php echo $value['asunto']; ?></td>
                            <td><?php echo $value['estado_reclamo']; ?></td>
                            <td><a href="controlador/c_reclamos.php?id=<?php echo $value['id_reclamo']; ?>&accion=cambiar_estado"><img src="images/cambiarestado.png" alt="cambiare" width="20" height="20"></a></td>
                            <td><a href="ver_detalles_reclamo.php?id=<?php echo $value['id_reclamo']; ?>"><img src="images/detalles.png" alt="detallesr" width="20" height="20"></a></td>
                            <td><a href="controlador/c_reclamos.php?id=<?php echo $value['id_reclamo']; ?>&accion=eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id_reclamo']; ?> "><img src="images/eliminar.png" alt="eliminarr" width="20" height="20"></a></td>
                        </tr>
                        <?php include("modales/modal_reclamos.php");
                    }
                }
                ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="registro_reclamos.php">Agregar</a><br><br>
        <?php
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            if ($id == 0) {
                echo '<div class="alert alert-success w-50 mx-auto" role="alert"> Se ha registrado correctamente</div>';
            } elseif ($id == 1) {
                echo '<div class="alert alert-danger w-50 mx-auto" role="alert"> Ha ocurrido un error al registrar</div>';
            } elseif ($id == 2) {
                echo '<div class="alert alert-success w-50 mx-auto" role="alert"> Se ha eliminado correctamente</div>';
            } elseif ($id == 3) {
                echo '<div class="alert alert-danger w-50 mx-auto" role="alert"> Ha ocurrido un error al eliminar</div>';
            } elseif ($id == 4) {
                echo '<div class="alert alert-success w-50 mx-auto" role="alert"> Se ha actualizado correctamente</div>';
            } elseif ($id == 5) {
                echo '<div class="alert alert-danger w-50 mx-auto" role="alert"> Ha ocurrido un error al actualizar</div>';
            } elseif ($id == 6) {
                echo '<div class="alert alert-success w-50 mx-auto" role="alert"> Se ha cambiado el estado correctamente</div>';
            } elseif ($id == 7) {
                echo '<div class="alert alert-danger w-50 mx-auto" role="alert"> Ha ocurrido un error al cambiar el estado</div>';
            } elseif ($id == 8) {
                echo '<div class="alert alert-success w-50 mx-auto" role="alert"> Se ha registrado la respuesta correctamente</div>';
            } elseif ($id == 9) {
                echo '<div class="alert alert-danger w-50 mx-auto" role="alert"> Ha ocurrido un error al registrar la respuesta</div>';
            }
        }
        ?>
    </article>
        <?php
        include("piedepagina.php");
        ?>