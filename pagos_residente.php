<?php

include_once('cabecera.php');
include_once('menu_residente.php');
include_once('modelo/m_pagos.php');

$pre= new m_pagos();
$obj= $pre->leer_pago_residente($_SESSION['id_persona']);
if($obj===FALSE){
     ?>
<article class="main4 redimension p-3"> 
    <h1 id="focus"><b>Mis pagos</b></h1><br>
   <h10>No existen registros en la base de datos.</h10><br>
<?php
}
else
{
?>
<article class="main4 redimension dimensionTablas">
    <h1 id="focus"><b>Mis pagos</b></h1><br>
        
<table class="table table-hover border border-success tablas">
<thead>
	<tr>
		<th scope="col"># Cuota</th>
                <th scope="col">Fecha pago</th>
		<th scope="col">Banco emisor</th>
		<th scope="col">Referencia</th>
                <th scope="col">Monto</th>
                <th scope="col">Estado</th>
                <th scope="col">PDF</th>
	</tr>
</thead>
<tbody>
<?php
foreach ($obj as $column => $value) {
?>
<tr>
	<td><?php echo $value['id_gasto']; ?></td>
        <td><?php echo $value['fecha_pago']; ?></td>
        <td><?php echo $value['banco_emisor']; ?></td>
	<td><?php echo $value['referencia']; ?></td>
        <td><?php echo $value['monto_pago']; ?></td>
        <td><?php echo $value['estado_pago'];?></td>
        <td><a href="fpdf/Reporte_pago.php?id=<?php echo $value['id_pago']; ?>" target="_black"><img src="images/pdf.png" alt="cambiare" width="30" height="30"></a></td>	
</tr>
<?php
}
}
?>
</tbody>
</table>
    <a class="btn btn-success m-3" href="registro_pagos.php">Agregar</a><br><br>
    <?php
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            if ($id == 0) {
                echo '<div class="alert alert-success col-12 mx-auto" role="alert"> Se ha registrado correctamente</div>';
            } elseif ($id == 1) {
                echo '<div class="alert alert-danger col-12 mx-auto" role="alert"> Ha ocurrido un error al registrar</div>';
            }
        }
        ?>
</article>
<?php  
  include("piedepagina.php");
?>