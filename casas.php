<?php
include_once('cabecera.php');
include('menu.php');
include_once('modelo/m_casas.php');

$pre = new m_casas();
$obj = $pre->leer_casa();
if ($obj === FALSE) {
    ?>
    <article class="main4 redimension"> 
        <h1 id="focus"><b>Viviendas</b></h1><br>
        <h10>No existen registros en la base de datos.</h10><br><br>
        <?php
    } else {
        ?>
        <article class="main4 redimension dimensionTablas">
            <h1 id="focus"><b>Viviendas</b></h1><br>
            <table class="table table-hover border border-success tablas">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Residente</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Habitaciones</th>
                        <th scope="col">Baños</th>
                        <th scope="col">Cocina</th>
                        <th scope="col">Sala estar</th>
                        <th scope="col">Comedor</th>                
                        <th scope="col">Patio delantero</th>
                        <th scope="col">Patio trasero</th>
                        <th scope="col" colspan="3">Accion</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    foreach ($obj as $column => $value) {
        ?>
                        <tr>
                            <td scope="row"><?php echo $value['id_casa']; ?></td>
                            <td><?php $x = new m_casas();
                $a = $x->leer_casa_residente($value['id_persona']);
                echo $a['nombres'] . " " . $a['apellidos']; ?></td>
                            <td><?php switch ($value['estado_casa']) {
                    case 0: echo "En venta";
                        break;
                    case 1: echo "En alquiler";
                        break;
                } ?></td>
                            <td><?php echo $value['habitaciones']; ?></td>
                            <td><?php echo $value['baños']; ?></td>
                            <td><?php echo $value['cocina']; ?></td>
                            <td><?php echo $value['sala_estar']; ?></td>
                            <td><?php echo $value['comedor']; ?></td>
                            <td><?php echo $value['patio_delantero']; ?></td>        
                            <td><?php echo $value['patio_trasero']; ?></td>        
                            <td><a href="controlador/c_casas.php?id=<?php echo $value['id_casa']; ?>&accion=cambiar_estado"><img src="images/cambiarestado.png" alt="cambiare" width="20" height="20"></a></td>
                            <td><a href="registro_actualizar_casas.php?id=<?php echo $value['id_casa']; ?>&accion=modificar"><img src="images/modificar.png" alt="modificarr" width="20" height="20"></a></td>
                            <td><a href="controlador/c_casas.php?id=<?php echo $value['id_casa']; ?>&accion=eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id_casa']; ?> "><img src="images/eliminar.png" alt="eliminarr" width="20" height="20"></a></td>

                        </tr>
                        <?php include("modales/modal_casas.php");
                    }
                }
                ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="registro_casas.php">Agregar</a><br><br>
        <?php
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            if ($id == 0) {
                echo '<div class="alert alert-success col-12 mx-auto" role="alert"> Se ha registrado correctamente</div>';
            } elseif ($id == 1) {
                echo '<div class="alert alert-danger col-12 mx-auto" role="alert"> Se ha registrado correctamente</div>';
            } elseif ($id == 2) {
                echo '<div class="alert alert-success col-12 mx-auto" role="alert"> Se ha eliminado correctamente</div>';
            } elseif ($id == 3) {
                echo '<div class="alert alert-danger col-12 mx-auto" role="alert"> Se ha registrado correctamente</div>';
            } elseif ($id == 4) {
                echo '<div class="alert alert-success col-12 mx-auto" role="alert"> Se ha actualizado correctamente</div>';
            } elseif ($id == 5) {
                echo '<div class="alert alert-danger col-12 mx-auto" role="alert"> Se ha registrado correctamente</div>';
            } elseif ($id == 6) {
                echo '<div class="alert alert-success col-12 mx-auto" role="alert"> Se ha cambiado el estado correctamente</div>';
            } elseif ($id == 7) {
                echo '<div class="alert alert-danger col-12 mx-auto" role="alert"> Se ha registrado correctamente</div>';
            }
        }
        ?>
    </article>
        <?php
        include("piedepagina.php");
        ?>