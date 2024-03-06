<?php  
include("cabecera.php");
include("menu.php");
?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
    <h1>Precio dolar</h1><br>
  <form action="controlador/c_gastos.php" method="POST">
       <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Precio actual</b></label>
          <input class="form-control border-success" type="float" required name="precio_dolar"><br>
          La forma adecuada para escribir el precio es por ejemplo: 11.11
      </div>
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center">
      <input class="btn btn-success" type="submit" name="accion" value="Cambiar">
      </div>
  </form>

  </article>
  
<?php  
include("piedepagina.php");
?>

