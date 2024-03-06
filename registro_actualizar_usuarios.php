<?php  
  include("cabecera.php");
  include("menu.php");
  include("modelo/m_usuarios.php");
$modificar=new m_usuarios();
$mod= $modificar->leer_usuario_e($_REQUEST['id']);

?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
    <h1>Actualizar datos - Usuario</h1><br>
  <form action="controlador/c_usuarios.php" method="POST">
       <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>#</b></label>
          <input class="form-control border-success" type="hidden" required name="id_usuario" value="<?php echo $mod['id_usuario'];?>">
          <input class="form-control border-success" type="number" required name="id_usuario_n" value="<?php echo $mod['id_usuario'];?>">
       </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Tipo de usuario</b></label>
          <input class="form-control border-success" type="number" required name="tipo_usuario" value="<?php echo $mod['tipo_usuario'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b># Residente</b></label>
          <input class="form-control border-success" type="number" required name="id_persona" value="<?php echo $mod['id_persona'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Usuario</b></label>
          <input class="form-control border-success" type="text" required name="usuario" value="<?php echo $mod['usuario'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Contraseña</b></label>
          <input class="form-control border-success" type="text" required name="clave" value="<?php echo $mod['clave'];?>">
      </div><br><br>
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center ">
      <input class="btn btn-success" type="submit" name="accion" value="Actualizar">
      </div>
  </form>
  </article>


<?php 
include("piedepagina.php");
?>