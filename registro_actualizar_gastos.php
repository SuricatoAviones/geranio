<?php  
  include("cabecera.php");
  include("menu.php");
  include("modelo/m_gastos.php");
$modificar=new m_gastos();
$mod= $modificar->leer_gasto_e($_REQUEST['id']);

?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
    <h1>Actualizar datos - Cuota</h1><br>
  <form action="controlador/c_gastos.php" method="POST">
      <div class="col-11 col-md-6 mx-auto">
          <input class="form-control border-success" type="hidden" required name="id_gasto" value="<?php echo $mod['id_gasto'];?>">
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Fecha inicio</b></label>
          <input class="form-control border-success" type="date" required name="fecha_inicio" value="<?php echo $mod['fecha_inicio'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Fecha corte</b></label>
          <input class="form-control border-success" type="date" required name="fecha_corte" value="<?php echo $mod['fecha_corte'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Precio dolar</b></label>
          <input class="form-control border-success" type="float" required name="precio_dolar" value="<?php echo $mod['precio_dolar'];?>">
      </div><br>
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center ">
      <input class="btn btn-success" type="submit" name="accion" value="Confirmar">
      </div>
  </form>
 </article>
<?php 
include("piedepagina.php");
?>