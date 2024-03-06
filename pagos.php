<?php
include_once('cabecera.php');
include_once('menu.php');
include_once('modelo/m_pagos.php');

$pre = new m_pagos();
$obj = $pre->leer_pago();
if ($obj === FALSE) {
    ?>
    <article class="main4 redimension"> 
        <h1 id="focus"><b>Pagos</b></h1><br>
        <h10>No existen registros en la base de datos.</h10><br>
        <?php
    } else {
        ?>
        <article class="main4 redimension dimensionTablas">
            <h1 id="focus"><b>Pagos</b></h1><br>

            <table class="table table-hover border border-success tablas">
                <thead>
                    <tr>
                        <th scope="col"># Pago</th>
                        <th scope="col"># Cuota</th>
                        <th scope="col">Residente</th>
                        <th scope="col">Fecha pago</th>
                        <th scope="col">Banco emisor</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Estado</th>
                        <th colspan="3">Accion</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    foreach ($obj as $column => $value) {
        ?>
                        <tr>
                            <td scope="row"><?php echo $value['id_pago']; ?></td>
                            <td><?php echo $value['id_gasto']; ?></td>
                            <td><?php $x = new m_pagos();
                $a = $x->leer_pago_persona($value['id_persona']);
                echo $a['nombres'] . " " . $a['apellidos']; ?></td>
                            <td><?php echo $value['fecha_pago']; ?></td>
                            <td><?php echo $value['banco_emisor']; ?></td>
                            <td><?php echo $value['referencia']; ?></td>
                            <td><?php echo $value['monto_pago']; ?></td>
                            <td><?php echo $value['estado_pago']; ?></td>
                            <td><a href="controlador/c_pagos.php?id=<?php echo $value['id_pago']; ?>&accion=cambiar_estado"><img src="images/cambiarestado.png" alt="cambiare" width="20" height="20"></a></td>
                            <td><a href="registro_actualizar_pagos.php?id=<?php echo $value['id_pago']; ?>&accion=modificar"><img src="images/modificar.png" alt="modificarr" width="20" height="20"></a></td>
                            <td><a href="controlador/c_pagos.php?id=<?php echo $value['id_pago']; ?>&accion=eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id_pago']; ?> "><img src="images/eliminar.png" alt="eliminarr" width="20" height="20"></a></td>
                        </tr>
                        <?php include("modales/modal_pagos.php");
                    }
                }
                ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="registro_pagos.php">Agregar</a><br><br>
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