<?php  
  include("cabecera.php");
  include("menu.php");
  include("modelo/m_gastos.php");
$modificar=new m_gastos();
$mod= $modificar->leer_servicio_e($_REQUEST['id']);

?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
    <h1>Actualizar datos - Servicio</h1><br>
  <form action="controlador/c_gastos.php" method="POST">
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>#</b></label>
          <input class="form-control border-success" type="hidden" required name="id_servicio" value="<?php echo $mod['id_servicio'];?>">
          <input class="form-control border-success" type="number" required name="id_servicio_n" value="<?php echo $mod['id_servicio'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b># Gasto</b></label>
          <input class="form-control border-success" type="number" required name="id_gasto" value="<?php echo $mod['id_gasto'];?>">
      </div><br>
            <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Nombre</b></label>
          <input class="form-control border-success" type="text" required name="nombre" value="<?php echo $mod['nombre'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Monto $</b></label>
          <input class="form-control border-success" type="number" required name="monto_dolar" value="<?php echo $mod['monto_dolar'];?>"><br>
      </div><br>
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center">
      <input class="btn btn-success" type="submit" name="accion" value="Actualizar">
      </div>
  </form>
 </article>
<?php 
include("piedepagina.php");
?>