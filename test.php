<?php

include("modelo/m_reportes.php");
?>
 
<?php
$x=new m_reportes();
$n6=$x -> leer_fechas_gasto('1'); $n7=$x -> leer_id_pagos_mes($n6['fecha_inicio'], $n6['fecha_corte']); echo count($n7);
//$n7=$x -> leer_id_pagos_mes($n6['fecha'], $mod_fecha); echo count($n7);   ?>
