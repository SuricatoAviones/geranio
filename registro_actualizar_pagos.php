<?php  
  include("cabecera.php");
  include("menu.php");
  include("modelo/m_pagos.php");
$modificar=new m_pagos();
$mod= $modificar->leer_pago_e($_REQUEST['id']);

?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
    <h1>Actualizar datos - Pago</h1><br>
  <form action="controlador/c_pagos.php" method="POST">
      <div class="col-11 col-md-6 mx-auto">
          <input class="form-control border-success" type="hidden" required name="id_pago" value="<?php echo $mod['id_pago'];?>">
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b># Cuota</b></label>
          <input class="form-control border-success" type="number" required name="id_gasto" value="<?php echo $mod['id_gasto'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Fecha</b></label>
          <input class="form-control border-success" type="date" required name="fecha_pago" value="<?php echo $mod['fecha_pago'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Banco emisor</b></label>
          <input class="form-control border-success" type="text" required name="banco_emisor" value="<?php echo $mod['banco_emisor'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Referencia</b></label>
          <input class="form-control border-success" type="text" required name="referencia" value="<?php echo $mod['referencia'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Monto (Bs)</b></label>
          <input class="form-control border-success" type="float" required name="monto_pago" value="<?php echo $mod['monto_pago'];?>">
      </div><br>
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center">
      <input class="btn btn-success" type="submit" name="accion" value="Actualizar">
      </div>
  </form>
 </article>
<?php 
include("piedepagina.php");
?>