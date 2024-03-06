<?php
include_once('cabecera.php');
include_once('menu.php');
include_once('modelo/m_gastos.php');

$pre = new m_gastos();
$obj = $pre->leer_servicio();
if ($obj === FALSE) {
    ?>
    <article class="main4 redimension"> 
        <h1 id="focus"><b>Servicios</b></h1><br>
        <h10>No existen registros en la base de datos.</h10><br>
        <?php
    } else {
        ?>
        <article class="main4 redimension dimensionTablas">
            <h1 id="focus"><b>Servicios</b></h1><br>
            <table class="table table-hover border border-success tablas">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Monto (Bs)</th>
                        <th scope="col">Monto ($)</th>
                        <th scope="col" colspan="2">Accion</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    foreach ($obj as $column => $value) {
        $dola = new m_gastos();
        $dolar = $dola->leer_gasto_dolar($value['id_gasto']);
        ?>
                        <tr>
                            <td scope="row"><?php echo $value['id_servicio']; ?></td>
                            <td><?php echo $value['nombre']; ?></td>
                            <td><?php $monto_bs = $value['monto_dolar'] * $dolar['precio_dolar'];
                echo $monto_bs; ?></td>
                            <td><?php echo $value['monto_dolar']; ?></td>
                            <td><a href="registro_actualizar_servicios.php?id=<?php echo $value['id_servicio']; ?>&accion=modificar"><img src="images/modificar.png" alt="modificarr" width="20" height="20"></a></td>
                            <td><a href="controlador/c_gastos.php?id=<?php echo $value['id_servicio']; ?>&accion=eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id_servicio']; ?>"><img src="images/eliminar.png" alt="eliminarr" width="20" height="20"></a></td>

                        </tr>
        <?php include("modales/modal_servicios.php");
    }
}
?>
            </tbody>
        </table>
<?php
$acumulador = 0;
$x = new m_gastos();
$a = $x->leer_servicio_monto();
for ($i = 0; $i < count($a); $i++) {
    $acumulador = $acumulador + $a[$i];
}
$monto_total_bs = $acumulador * $dolar['precio_dolar'];
echo '<div class="container text-center text-md-left">

        <div class="row text-center text-md-left">
               
            
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                 Precio $ (Bs): <b>' . $dolar['precio_dolar'] . '</b>
            </div>
            
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-2">
                
                Monto total (Bs): <b>' . $monto_total_bs . '</b>            
            </div>            
            
        </div>';

$z = new m_gastos();
$o = $x->insertar_monto_gasto($value['id_gasto'], $monto_total_bs);
?>

        <br><a class="btn btn-success"  href="registro_servicios.php">Agregar</a><br><br>
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
                echo '<div class="alert alert-success col-12 mx-auto" role="alert"> Se ha cambiado el precio correctamente</div>';
            } elseif ($id == 7) {
                echo '<div class="alert alert-danger col-12 mx-auto" role="alert"> Ha ocurrido un error al cambiar el precio</div>';
            }
        }
        ?>
    </article>
        <?php
        include("piedepagina.php");
        ?>
