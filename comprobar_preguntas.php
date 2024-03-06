<?php  
  include("cabeza.php");
  include("modelo/m_usuarios.php");

$comprobar=new m_usuarios();
if(isset($_POST['usuario'])){
$mod= $comprobar ->leer_usuario_preguntas($_POST['usuario']);
}
elseif(isset($_REQUEST['id'])){
$mod= $comprobar ->leer_usuario_preguntas($_REQUEST['id']);    
}

?>
  <!--======================Texto del main==========================-->
  <article class="main redimension dimensionTablas">
    <h1>Recuperación de contraseña - Segundo paso</h1><br>
    <form action="controlador/c_usuarios.php" method="POST" class="tablas">
        <input class="form-control border-success" type="hidden" required name="usuario" value="<?php if (isset($_POST['usuario'])) {echo $_POST['usuario'];}?>"><br>
        <div class="col-12 col-md-6 mx-auto">
          <label class="form-label"><b>¿<?php echo $mod['pregunta_1'];?>?</b></label>
          <input class="form-control border-success" type="text" required name="respuesta_1"><br>
        </div>
        <div class="col-12 col-md-6 mx-auto">
          <label class="form-label"><b>¿<?php echo $mod['pregunta_2'];?>?</b></label>
          <input class="form-control border-success" type="text" required name="respuesta_2"><br>
        </div>
        <div class="col-12 col-md-6 mx-auto">
          <label class="form-label"><b>¿<?php echo $mod['pregunta_3'];?>?</b></label>
          <input class="form-control border-success" type="text" required name="respuesta_3"><br>
        </div>
        <div class="col-12 col-md-6 mx-auto">
          <label class="form-label"><b>¿<?php echo $mod['pregunta_4'];?>?</b></label>
          <input class="form-control border-success" type="text" required name="respuesta_4"><br>
        </div>
        <div class="d-grid gap-2 col-2 mx-auto justify-content-center">
            <input class="btn btn-success" type="submit" name="accion" value="Comprobar">
        </div>
    </form>
<?php
    if(isset($_REQUEST['id']))
    {
    echo "<br><h5>Las respuestan no son correctas</h5>";
    }
?>
  </article>


<?php
include("piedepagina.php");
?>