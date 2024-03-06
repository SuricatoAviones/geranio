<?php
include_once('cabecera.php');
include_once('menu.php');
include_once('modelo/m_gastos.php');

$pre = new m_gastos();
$obj1 = $pre->leer_gasto();
$pri = new m_gastos();
$obg = $pre->leer_servicio();
foreach ($obg as $column => $value) {
    $dola = new m_gastos();
    $dolar = $dola->leer_gasto_dolar($value['id_gasto']);
    $monto_bs = $value['monto_dolar'] * $dolar['precio_dolar'];
}
$acumulador = 0;
$x = new m_gastos();
$a = $x->leer_servicio_monto();
for ($i = 0; $i < count($a); $i++) {
    $acumulador = $acumulador + $a[$i];
}
$monto_total_bs = $acumulador * $dolar['precio_dolar'];
$z = new m_gastos();
$o = $x->insertar_monto_gasto($value['id_gasto'], $monto_total_bs);

$obj2 = $pre->leer_gasto();

if ($obj2 === FALSE) {
    ?>
    <article class="main4 redimension"> 
        <h1 id="focus"><b>Cuotas</b></h1><br>
        <h10>No existen registros en la base de datos.</h10><br>
    <?php
} else {
    ?>
        <article class="main4 redimension dimensionTablas">
            <h1 id="focus"><b>Cuotas</b></h1><br>
            <table class="table table-hover border border-success tablas">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Inicio de pago</th>
                        <th scope="col">Fin de pago</th>
                        <th scope="col">Precio dolar</th>
                        <th scope="col">Monto Total</th>
                        <th scope="col" colspan="2">Accion</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    foreach ($obj2 as $column => $value) {
        ?>
                        <tr>
                            <td scope="row"><?php echo $value['id_gasto']; ?></td>
                            <td><?php echo $value['fecha_inicio']; ?></td>
                            <td><?php echo $value['fecha_corte']; ?></td>
                            <td><?php echo $value['precio_dolar']; ?></td>
                            <td><?php echo $value['monto']; ?></td>     
                            <td><a href="registro_actualizar_gastos.php?id=<?php echo $value['id_gasto']; ?>&accion=modificar"><img src="images/modificar.png" alt="modificarr" width="20" height="20"></a></td>
                            <td><a href="controlador/c_gastos.php?id=<?php echo $value['id_gasto']; ?>&accion=eliminar_gasto" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id_gasto']; ?> "><img src="images/eliminar.png" alt="eliminarr" width="20" height="20"></a></td>

                        </tr>
        <?php include("modales/modal_gastos.php");
    }
}
?>
            </tbody>
        </table>

        <a class="btn btn-success" href="registro_gastos.php">Agregar</a><br><br>
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
    }
}
?>
    </article>
        <?php
        include("piedepagina.php");
        ?>