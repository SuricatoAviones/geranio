<?php
include('modelo/m_reportes.php');
$x=new m_reportes();

$id_gasto=$_POST['id_gasto'];
$n1=$x->leer_persona_id();
$n_residentes= count($n1);
$n2=$x->leer_persona_id_estado('0');
$n_residentes_solventes= count($n2);
$n3=$x->leer_persona_id_estado('1');
$n_residentes_deudores= count($n3);
$n4=$x->leer_casa_id_estado('0'); 
$n_casa_alquiler= count($n4);
$n5=$x->leer_casa_id_estado('1'); 
$n_casa_oferta= count($n5);
$n6=$x->leer_montos_pagos($_POST['id_gasto']); 
$montototal_pagos_mes=0; 
for($i=0; $i < count($n6); $i++)
{ 
    $montototal_pagos_mes=$montototal_pagos_mes+$n6[$i]; 
} 
$n7=$x -> leer_fechas_gasto($_POST['id_gasto']); 
$n8=$x -> leer_id_pagos_mes($n7['fecha_inicio'], $n7['fecha_corte']); 
$n_reclamos= count($n8);

$result = $x ->insertar_reporte($id_gasto, $n_residentes, $n_residentes_solventes, $n_residentes_deudores, $n_casa_alquiler, $n_casa_oferta, $montototal_pagos_mes, $n_reclamos);
                        
if (($result==true)) 
{
    echo '<meta http-equiv="refresh" content="0;url=reportes.php?id=0">';
}
else
{
    echo '<meta http-equiv="refresh" content="0;url=reportes.php?id=1">';
}

?>