<?php
include_once('cabecera.php');
include("menu.php");
include_once('modelo/m_reportes.php');

$pre = new m_reportes();
$obj = $pre->leer_reporte();
if ($obj === FALSE) {
    ?>
    <article class="main4 redimension"> 
        <h1><b>Reportes</b></h1><br>
        <h10>No existen registros en la base de datos.</h10><br><br>
        <?php
    } else {
        ?>
        <article class="main4 redimension dimensionTablas">
            <h1><b>Reportes</b></h1><br>
            <table class="table table-hover border border-success tablas">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col"># Cuota</th>
                        <th scope="col" colspan="3">Accion</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    foreach ($obj as $column => $value) {
        ?>
                        <tr>
                            <td scope="row"><?php echo $value['id_reporte']; ?></td>
                            <td><?php echo $value['fecha']; ?></td>
                            <td><?php echo $value['id_gasto']; ?></td>
                            <td><a href="ver_detalles_reporte.php?id=<?php echo $value['id_reporte']; ?>"><img src="images/detalles.png" alt="detallesr" width="20" height="20"></a></td>
                            <td><a href="controlador/c_reportes.php?id=<?php echo $value['id_reporte']; ?>&accion=eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id_reporte']; ?> "><img src="images/eliminar.png" alt="eliminarr" width="20" height="20"></a></td>
                        </tr>
        <?php include("modales/modal_reportes.php");
    }
}
?>
            </tbody>
        </table>
        <a class="btn btn-success" href="registro_reportes.php">Agregar</a><br><br>
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
    } elseif ($id == 8) {
        echo '<div class="alert alert-success col-12 mx-auto" role="alert"> Se ha registrado la respuesta correctamente</div>';
    } elseif ($id == 9) {
        echo '<div class="alert alert-danger col-12 mx-auto" role="alert"> Ha ocurrido un error al registrar la respuesta</div>';
    }
}
?>
    </article>
        <?php
        include("piedepagina.php");
        ?>