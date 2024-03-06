<?php
include_once('cabecera.php');
include_once('menu_residente.php');
include_once('modelo/m_gastos.php');

$pre = new m_gastos();
$obj = $pre->leer_servicio();
if ($obj === FALSE) {
    ?>
    <article class="main4 redimension"> 
        <h1 id="focus"><b>Servicios y gastos</b></h1><br>
        <h10>No existen registros en la base de datos.</h10><br>
        <?php
    } else {
        ?>
        <article class="main4 redimension dimensionTablas p-3">
            <h1 id="focus"><b>Servicios y gastos</b></h1><br>
            <table class="table table-hover border border-success tablas tablita m-auto">
                <thead>
                    <tr>
                        <th scope="col">Servicio</th>
                        <th scope="col">Monto (Bs)</th>
                        <th scope="col">Monto ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($obj as $column => $value) {
                        $dola = new m_gastos();
                        $dolar = $dola->leer_gasto_dolar($value['id_gasto']);
                        ?>
                        <tr>
                            <td><?php echo $value['nombre']; ?></td>
                            <td><?php $monto_bs = $value['monto_dolar'] * $dolar['precio_dolar'];
                echo $monto_bs;
                        ?></td>
                            <td><?php echo $value['monto_dolar']; ?></td>

                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
        $acumulador2 = 0;
        $x2 = new m_gastos();
        $a2 = $x2->leer_gasto_id();
        for ($i = 0; $i < count($a2); $i++) {
            $acumulador2++;
        }

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
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                # Cuota actual: <b>' . $acumulador2 . '</b>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-2">
                
                Monto total a pagar (Bs): <b>' . $monto_total_bs . '</b>            
            </div>            
            
        </div>';

        $z = new m_gastos();
        $o = $x->insertar_monto_gasto($value['id_gasto'], $monto_total_bs);
        ?>
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
