<?php  
include("cabecera.php");
include("menu.php");
include('modelo/m_personas.php');
?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
      <h1><b>Nuevo residente</b></h1><br>
  <form action="controlador/c_personas.php" method="POST">
     <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b># <h11>*</h11></b></label>
          <input class="form-control border-success" type="number" required name="id_persona" value="<?php if (isset($_POST['id_persona'])) {echo $_POST['id_persona'];}?>"><br>
     </div>
     <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Nombres <h11>*</h11></b></label>
          <input minlength="3" maxlength="50" class="form-control border-success" type="text" required name="nombres" value="<?php if (isset($_POST['nombres'])) {echo $_POST['nombres'];}?>"><br>
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Apellidos <h11>*</h11></b></label>
          <input minlength="0" maxlength="50" class="form-control border-success" type="text" required name="apellidos" value="<?php if (isset($_POST['cedula'])) {echo $_POST['cedula'];}?>"><br>
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Cedula <h11>*</h11></b></label>
          <input minlength="7" maxlength="8" class="form-control border-success" type="text" required name="cedula" value="<?php if (isset($_POST['apellidos'])) {echo $_POST['apellidos'];}?>"><br>
      </div>  
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Telefono</b></label>
          <input minlength="11" maxlength="13" class="form-control border-success" type="text" name="telefono" value="<?php if (isset($_POST['telefono'])) {echo $_POST['telefono'];}?>"><br>
      </div> 
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Correo electronico</b></label>
          <input minlength="10" maxlength="30" class="form-control border-success" type="email" name="correo_electronico" value="<?php if (isset($_POST['correo_electronico'])) {echo $_POST['correo_electronico'];}?>"><br>
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Casa <h11>*</h11></b></label>
          <input class="form-control border-success" type="number" relengthquired name="casa" value="<?php if (isset($_POST['casa'])) {echo $_POST['casa'];}?>"><br>
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <input class="form-control border-success" type="hidden" required name="estado" value="Solvente"><br>
        </div>
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center">
      <input class="btn btn-success" type="submit" name="accion" value="Registrar">
      </div>
  </form>
    
    
    
    
    
  </article>
  
<?php
include("menu.php");
include("piedepagina.php");
?>