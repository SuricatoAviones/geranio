<?php  
include("cabecera.php");
include("menu.php");
include('modelo/m_reclamos.php');
?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
      <h1><b>Nuevo reclamo  </b></h1><br>
  <form action="controlador/c_reclamos.php" method="POST">
     <div class="col-11 col-md-6 mx-auto">
          <input class="form-control border-success" type="hidden" required name="id_reclamo" value="<?php if (isset($_POST['id_reclamo'])) {echo $_POST['id_reclamo'];}?>"><br>
     </div>
     <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Asunto</b></label>
          <input class="form-control border-success" type="text" readonly required name="asunto" value="<?php if (isset($_POST['asunto'])) {echo $_POST['asunto'];}?>"><br>
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Respuesta <h11>*</h11></b></label>
          <textarea class="form-control border-success" type="text" rows="10" required name="respuesta" value="<?php if (isset($_POST['respuesta'])) {echo $_POST['respuesta'];}?>"></textarea>
      </div><br>
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center">
      <input class="btn btn-success" type="submit" name="accion" value="Responder">
      </div>
  </form>
    
    
    
    
    
  </article>
  
<?php
include("menu.php");
include("piedepagina.php");
?>