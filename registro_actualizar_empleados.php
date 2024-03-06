<?php  
  include("cabecera.php");
  include("menu.php");
  include("modelo/m_empleados.php");
$modificar=new m_empleados();
$mod1= $modificar->leer_empleado_e($_REQUEST['id']);
$mod2= $modificar->leer_persona_e($_REQUEST['id']);

?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
    <h1>Actualizar datos - Empleado</h1><br>
  <form action="controlador/c_empleados.php" method="POST">
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>#</b></label>
          <input class="form-control border-success" type="number" required name="id_empleado_n" value="<?php echo $mod1['id_empleado'];?>">
          <input class="form-control border-success" type="hidden" required name="id_empleado" value="<?php echo $mod1['id_empleado'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b># Perfil</b></label>
          <input class="form-control border-success" type="number" required name="id_persona_n" value="<?php echo $mod1['id_persona'];?>">
          <input class="form-control border-success" type="hidden" required name="id_persona" value="<?php echo $mod1['id_persona'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Nombres</b></label>
          <input class="form-control border-success" type="text" required name="nombres" value="<?php echo $mod2['nombres'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Apellidos</b></label>
          <input class="form-control border-success" type="text" required name="apellidos" value="<?php echo $mod2['apellidos'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Cedula</b></label>
          <input class="form-control border-success" type="text" required name="cedula" value="<?php echo $mod2['cedula'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Telefono</b></label>
          <input class="form-control border-success" type="number" required name="telefono" value="<?php echo $mod2['telefono'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Correo</b></label>
          <input class="form-control border-success" type="email" required name="correo_electronico" value="<?php echo $mod2['correo_electronico'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Cargo</b></label>
          <input class="form-control border-success" type="text" required name="cargo" value="<?php echo $mod1['cargo'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Rif</b></label>
          <input class="form-control border-success" type="text" required name="rif" value="<?php echo $mod1['rif'];?>">
      </div><br>
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center">
      <input class="btn btn-success" type="submit" name="accion" value="Actualizar">
      </div>
  </form>
 </article>
<?php 
include("piedepagina.php");
?>