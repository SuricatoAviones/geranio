<?php

include_once('cabecera.php');
include("menu_residente.php");
include_once('modelo/m_personas.php');

$pre= new m_personas();
$mod= $pre->leer_persona_e($_SESSION['id_persona']);
$mad= $pre->leer_persona_clave($_SESSION['id_persona']);
if($mod===FALSE){
     ?>
<article class="main4 redimension"> 
    <h1 id="focus"><b>Mi perfil</b></h1><br>
    <h10>No existen registros en la base de datos.</h10><br><br>
<?php
}
else
{
?>
<article class="main redimension">
   <h1 id="focus"><b>Mi perfil</b></h1><br>
  <form action="controlador/c_personas.php" method="POST">
      <div class="col-11 col-md-6 mx-auto">
          <input class="form-control border-success" type="hidden" readonly required name="id_persona_n" value="<?php echo $mod['id_persona'];?>">
          <input class="form-control border-success" type="hidden" readonly required name="id_persona" value="<?php echo $mod['id_persona'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Nombres</b></label>
          <input class="form-control border-success" type="text" readonly required name="nombres" value="<?php echo $mod['nombres'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Apellidos</b></label>
          <input class="form-control border-success" type="text" readonly required name="apellidos" value="<?php echo $mod['apellidos'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Cedula</b></label>
          <input class="form-control border-success" type="text" readonly required name="cedula" value="<?php echo $mod['cedula'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Telefono</b></label>
          <input class="form-control border-success" type="number" readonly required name="telefono" value="<?php echo $mod['telefono'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Correo electronico</b></label>
          <input class="form-control border-success" type="email" readonly required name="correo_electronico" value="<?php echo $mod['correo_electronico'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Clave</b></label>
          <input class="form-control border-success" type="text" readonly required name="text" value="<?php echo $mad['clave'];?>">
      </div><br>
      <div class="container text-center text-md-left">

        <div class="row text-center text-md-left">
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
      <input class="btn btn-success" type="submit" name="accion" value="Actualizar datos">
      </div>
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
      <input class="btn btn-success" type="submit" name="accion" value="Cambiar clave">
      </div>
            </div>
          </div>
  </form>
</article>
<?php
}
  include("piedepagina.php");
?>