<?php  
include("cabecera.php");
include("menu.php");
include("modelo/m_gastos.php");
?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
    <h1>Nuevo servicio</h1><br>
  <form action="controlador/c_gastos.php" method="POST">
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b># Servicio  <h11>*</h11></b></label>
          <input class="form-control border-success" type="number" required name="id_servicio" value="<?php if (isset($_POST['id_servicio'])) {echo $_POST['id_servicio'];}?>"><br>
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b># Cuota  <h11>*</h11></b></label>
          <input class="form-control border-success" type="number" required name="id_gasto" value="<?php if (isset($_POST['id_gasto'])) {echo $_POST['id_gasto'];}?>"><br>
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Nombre  <h11>*</h11></b></label>
          <input class="form-control border-success" type="text" required name="nombre" value="<?php if (isset($_POST['nombre'])) {echo $_POST['nombre'];}?>"><br>
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Monto ($)  <h11>*</h11></b></label>
          <input class="form-control border-success" type="number" required name="monto_dolar" value="<?php if (isset($_POST['monto_idv'])) {echo $_POST['monto_idv'];}?>"><br>
      </div> 
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center">
      <input class="btn btn-success" type="submit" name="accion" value="Registrar">
      </div>
  </form>

  </article>
  
<?php  
include("piedepagina.php");
?>

