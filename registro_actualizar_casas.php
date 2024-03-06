<?php  
  include("cabecera.php");
  include("menu.php");
  include("modelo/m_casas.php");
$modificar=new m_casas();
$mod= $modificar->leer_casa_e($_REQUEST['id']);

?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
    <h1>Actualizar datos - Vivienda</h1><br>
  <form action="controlador/c_casas.php" method="POST">
      <div class="col-11 col-md-6 mx-auto">
          <input class="form-control border-success" type="hidden" required name="id_casa" value="<?php echo $mod['id_casa'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b># Residente</b></label>
          <input class="form-control border-success" type="number" required name="id_persona" value="<?php echo $mod['id_persona'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b># Habitaciones</b></label>
          <input class="form-control border-success" type="number" required name="habitaciones" value="<?php echo $mod['habitaciones'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b># Baños</b></label>
          <input class="form-control border-success" type="number" required name="baños" value="<?php echo $mod['baños'];?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>¿Cocina?</b></label>
          <select required name="cocina" class="form-select border-success" aria-label="Default select example">
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
      </div><br>
        <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>¿Sala de estar?</b></label>
          <select required name="sala_estar" class="form-select border-success" aria-label="Default select example">
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>¿Comedor?</b></label>
          <select required name="comedor" class="form-select border-success" aria-label="Default select example">
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>¿Patio delantero?</b></label>
          <select required name="patio_delantero" class="form-select border-success" aria-label="Default select example">
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>¿Patio trasero?</b></label>
          <select required name="patio_trasero" class="form-select border-success" aria-label="Default select example">
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
      </div><br>
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center ">
          <input class="btn btn-success" type="submit" name="accion" value="Actualizar">
      </div>
  </form>
 </article>


<?php 
include("piedepagina.php");
?>