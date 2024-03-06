<?php
include_once('cabecera.php');
include("menu.php");
include_once('modelo/m_personas.php');

$pre = new m_personas();
$obj = $pre->leer_persona();
if ($obj === FALSE) {
    ?>
    <article class="main4 redimension"> 
        <h1 id="focus"><b>Residentes</b></h1><br>
        <h10>No existen registros en la base de datos.</h10><br><br>
        <?php
    } else {
        ?>
        <article class="main4 redimension dimensionTablas">
            <h1 id="focus"><b>Residentes</b></h1><br>

            <table class="table table-hover border border-success tablas">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Casa</th>
                        <th scope="col">Estado</th>
                        <th scope="col" colspan="3">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($obj as $column => $value) {
                        ?>
                        <tr>
                            <td scope="row"><?php echo $value['id_persona']; ?></td>
                            <td><?php echo $value['nombres']; ?></td>
                            <td><?php echo $value['apellidos']; ?></td>
                            <td><?php echo $value['cedula']; ?></td>
                            <td><?php echo $value['telefono']; ?></td>
                            <td><?php echo $value['correo_electronico']; ?></td>
                            <td><?php echo $value['casa'];
                        ?></td>
                            <td><?php
                                if ($value['estado'] === '2') {
                                    echo "Empleado";
                                } else {
                                    switch ($value['estado']) {
                                        case 0: echo "Solvente";
                                            break;
                                        case 1: echo "Deudor";
                                            break;
                                    }
                                }
                                ?></td>
                            <td><a href="controlador/c_personas.php?id=<?php echo $value['id_persona']; ?>&accion=cambiar_estado"><img src="images/cambiarestado.png" alt="cambiare" width="20" height="20"></a></td>
                            <td><a href="registro_actualizar_personas.php?id=<?php echo $value['id_persona']; ?>&accion=modificar"><img src="images/modificar.png" alt="modificarr" width="20" height="20"></a></td>
                            <td><a href="controlador/c_personas.php?id=<?php echo $value['id_persona']; ?>&accion=eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id_persona']; ?> "><img src="images/eliminar.png" alt="eliminarr" width="20" height="20"></a></td>
                <?php include("modales/modal_personas.php"); } ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div>
            <a class="btn btn-success" href="registro_personas.php">Agregar</a><br><br>
        </div>
        <?php
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            if ($id == 0) {
                echo '<div class="alert alert-success col-12 col-md-6 mx-auto" role="alert"> Se ha registrado correctamente</div>';
            } elseif ($id == 1) {
                echo '<div class="alert alert-danger col-12 col-md-6 mx-auto" role="alert"> Ha ocurrido un error al registrar</div>';
            } elseif ($id == 2) {
                echo '<div class="alert alert-success col-12 col-md-6 mx-auto" role="alert"> Se ha eliminado correctamente</div>';
            } elseif ($id == 3) {
                echo '<div class="alert alert-danger col-12 col-md-6 mx-auto" role="alert"> Ha ocurrido un error al eliminar</div>';
            } elseif ($id == 4) {
                echo '<div class="alert alert-success col-12 col-md-6 mx-auto" role="alert"> Se ha actualizado correctamente</div>';
            } elseif ($id == 5) {
                echo '<div class="alert alert-danger col-12 col-md-6 mx-auto" role="alert"> Ha ocurrido un error al actualizar</div>';
            } elseif ($id == 6) {
                echo '<div class="alert alert-success col-12 col-md-6 mx-auto" role="alert"> Se ha cambiado el estado correctamente</div>';
            } elseif ($id == 7) {
                echo '<div class="alert alert-danger col-12 col-md-6 mx-auto" role="alert"> Ha ocurrido un error al cambiar el estado</div>';
            }
        }
        ?>
    </article>
    <?php
    include("piedepagina.php");
    ?>