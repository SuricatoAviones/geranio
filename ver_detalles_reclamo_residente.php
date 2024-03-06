<?php  
  include("cabecera.php");
  include("menu_residente.php");
  include("modelo/m_reclamos.php");
$modificar=new m_reclamos();
$mod= $modificar->leer_reclamo_e($_REQUEST['id']);

?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
    <h1>Ver detalles - Reclamo</h1><br>
  <form action="reclamos_residente.php" method="POST">
      <div class="col-11 col-md-6 mx-auto">
          <input class="form-control border-success" type="hidden" required name="id_reclamo" value="<?php echo $mod['id_reclamo'];?>">
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <input class="form-control border-success" type="hidden" required name="id_persona" value="<?php echo $mod['id_persona'];?>">
      </div>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Asunto</b></label>
          <input class="form-control border-success" type="text" readonly name="asunto" value="<?php echo $mod['asunto'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Contenido</b></label>
          <textarea class="form-control border-success" type="text" rows="10" readonly name="contenido"><?php echo $mod['contenido'];?></textarea>
      </div><br>
          <?php if($mod['respuesta']!==""){ ?>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Respuesta </b><td><a href="registro_actualizar_respuesta.php?id=<?php echo $mod['id_reclamo']; ?>&accion=modificar"><img src="images/modificar.png" alt="modificarr" width="20" height="20"></a></td></label>
          <textarea class="form-control border-success" type="text" rows="10" required name="respuesta"><?php echo $mod['respuesta'];?></textarea>
      </div><br>
          <?php } ?>
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center ">
      <input class="btn btn-success" type="submit" name="accion" value="Volver">
      </div>
  </form>
 </article>
<?php 
include("piedepagina.php");
?>