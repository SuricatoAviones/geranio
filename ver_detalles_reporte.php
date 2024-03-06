<?php
  include("cabecera.php");
  include("menu.php");
  include("modelo/m_reportes.php");
$modificar=new m_reportes();
$value= $modificar->leer_reporte_e($_REQUEST['id']);

?>
  <!--======================Texto del main==========================-->
  <article class="main4 redimension dimensionTablas">
    <h1 id="focus">Ver reporte - Condominio Geranio</h1><br>
    <div class="row text-center text-md-left"> 
            <div class="col-md-3 col-lg-5 col-xl-5 mx-auto mt-3">
                 <b>Fecha de repote:</b> <?php echo $value['fecha']; ?>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-2">
                <a class="btn btn-success" href="fpdf/Reporte.php?id=<?php echo $value['id_reporte']; ?>" target="_black"><i class="fa-solid fa-file-pdf"></i> Generar PDF</a>          

            </div>               
        </div>
    <br>
    <table class="table table-hover border border-success tablas">
        <thead>
            <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cuota</th>
                    <th scope="col">Residentes</th>
                    <th scope="col">Residentes solventes</th>
                    <th scope="col">Residentes deudores</th>
                    <th scope="col">Casas en alquiler</th>
                    <th scope="col">Casas en oferta</th>
                    <th scope="col">Pagos Bs (Servicios)</th>
                    <th scope="col">Reclamos</th>   
            </tr>
        </thead>           
        <tbody>
            <tr>
                <td scope="row"><?php echo $value['id_reporte']; ?></td>
                <td><?php echo $value['id_gasto']; ?></td>
                <td><?php echo $value['n_residentes']; ?></td>
                <td><?php echo $value['n_residentes_solventes']; ?></td>
                <td><?php echo $value['n_residentes_deudores']; ?></td>
                <td><?php echo $value['n_casa_alquiler']; ?></td>
                <td><?php echo $value['n_casa_oferta']; ?></td>
                <td><?php echo $value['montototal_pagos_mes']; ?></td>
                <td><?php echo $value['n_reclamos']; ?></td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-success" href="reportes.php">Volver</a><br><br>
</article>
<?php 
include("piedepagina.php");
?>