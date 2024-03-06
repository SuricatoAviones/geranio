<?php  
include("cabecera.php");
include('modelo/m_usuarios.php');
?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
    <h1>Preguntas de seguridad</h1><br>
    <p>Por favor, seleccione dos preguntas y escriba las respectivas respuestas. Se recomienda anotarlas en algún lugar. <p>
    <form action="controlador/c_usuarios.php" method="POST">
  <input type="hidden" required name="id_persona" value="<?php if (isset($_SESSION['id_persona'])) {echo $_SESSION['id_persona'];}?>"><br>
  <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Primera pregunta <h11>*</h11></b></label>
            <select name="pregunta_1" class="form-select border-success" aria-label="Default select example">
                <option selected>Seleccione por favor</option>
                <option value="Primer nombre de madre">Primer nombre de madre</option>
                <option value="Segundo nombre de madre">Segundo nombre de madre</option>
                <option value="Primer nombre de padre">Primer nombre de padre</option>
                <option value="Segundo nombre de padre">Segundo nombre de padre</option>
                <option value="Primer nombre de hermano">Primer nombre de hermano</option>
                <option value="Segundo nombre de hermano">Segundo nombre de hermano</option>
                <option value="Primer nombre de hermana">Primer nombre de hermana</option>
                <option value="Segundo nombre de hermana">Segundo nombre de hermana</option>
                <option value="Primer nombre de hijo">Primer nombre de hijo</option>
                <option value="Segundo nombre de hijo">Segundo nombre de hijo</option>
                <option value="Primer nombre de hija">Primer nombre de hija</option>
                <option value="Segundo nombre de hija">Segundo nombre de hija</option>
                <option value="Nombre de mascota">Nombre de mascota</option>
                <option value="Marca de motocicleta favorita">Marca de motocicleta favorita</option>
                <option value="Marca de automovil favorita">Marca de auto favorita</option>
                <option value="Deporte favorito">Deporte favorito</option>
                <option value="Color favorito">Color favorito</option>
                <option value="Lugar de nacimiento">Lugar de nacimiento</option>
            </select>
        </div><br>
        <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Respuesta <h11>*</h11></b></label>
          <input class="form-control border-success" type="text" required name="respuesta_1"><br>
        </div>
        <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Segunda pregunta <h11>*</h11></b></label>
            <select name="pregunta_2" class="form-select border-success" aria-label="Default select example">
                <option selected>Seleccione por favor</option>
                <option value="Primer nombre de madre">Primer nombre de madre</option>
                <option value="Segundo nombre de madre">Segundo nombre de madre</option>
                <option value="Primer nombre de padre">Primer nombre de padre</option>
                <option value="Segundo nombre de padre">Segundo nombre de padre</option>
                <option value="Primer nombre de hermano">Primer nombre de hermano</option>
                <option value="Segundo nombre de hermano">Segundo nombre de hermano</option>
                <option value="Primer nombre de hermana">Primer nombre de hermana</option>
                <option value="Segundo nombre de hermana">Segundo nombre de hermana</option>
                <option value="Primer nombre de hijo">Primer nombre de hijo</option>
                <option value="Segundo nombre de hijo">Segundo nombre de hijo</option>
                <option value="Primer nombre de hija">Primer nombre de hija</option>
                <option value="Segundo nombre de hija">Segundo nombre de hija</option>
                <option value="Nombre de mascota">Nombre de mascota</option>
                <option value="Marca de motocicleta favorita">Marca de motocicleta favorita</option>
                <option value="Marca de automovil favorita">Marca de auto favorita</option>
                <option value="Deporte favorito">Deporte favorito</option>
                <option value="Color favorito">Color favorito</option>
                <option value="Lugar de nacimiento">Lugar de nacimiento</option>
            </select>
        </div><br>
        <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Respuesta <h11>*</h11></b></label>
          <input class="form-control border-success" type="text" required name="respuesta_2"><br>
        </div>
        <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Tercera pregunta <h11>*</h11></b></label>
            <select name="pregunta_3" class="form-select border-success" aria-label="Default select example">
                <option selected>Seleccione por favor</option>
                <option value="Primer nombre de madre">Primer nombre de madre</option>
                <option value="Segundo nombre de madre">Segundo nombre de madre</option>
                <option value="Primer nombre de padre">Primer nombre de padre</option>
                <option value="Segundo nombre de padre">Segundo nombre de padre</option>
                <option value="Primer nombre de hermano">Primer nombre de hermano</option>
                <option value="Segundo nombre de hermano">Segundo nombre de hermano</option>
                <option value="Primer nombre de hermana">Primer nombre de hermana</option>
                <option value="Segundo nombre de hermana">Segundo nombre de hermana</option>
                <option value="Primer nombre de hijo">Primer nombre de hijo</option>
                <option value="Segundo nombre de hijo">Segundo nombre de hijo</option>
                <option value="Primer nombre de hija">Primer nombre de hija</option>
                <option value="Segundo nombre de hija">Segundo nombre de hija</option>
                <option value="Nombre de mascota">Nombre de mascota</option>
                <option value="Marca de motocicleta favorita">Marca de motocicleta favorita</option>
                <option value="Marca de automovil favorita">Marca de auto favorita</option>
                <option value="Deporte favorito">Deporte favorito</option>
                <option value="Color favorito">Color favorito</option>
                <option value="Lugar de nacimiento">Lugar de nacimiento</option>
            </select>
        </div><br>
        <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Respuesta <h11>*</h11></b></label>
          <input class="form-control border-success" type="text" required name="respuesta_3"><br>
        </div>
        <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Cuarta pregunta <h11>*</h11></b></label>
            <select name="pregunta_4" class="form-select border-success" aria-label="Default select example">
                <option selected>Seleccione por favor</option>
                <option value="Primer nombre de madre">Primer nombre de madre</option>
                <option value="Segundo nombre de madre">Segundo nombre de madre</option>
                <option value="Primer nombre de padre">Primer nombre de padre</option>
                <option value="Segundo nombre de padre">Segundo nombre de padre</option>
                <option value="Primer nombre de hermano">Primer nombre de hermano</option>
                <option value="Segundo nombre de hermano">Segundo nombre de hermano</option>
                <option value="Primer nombre de hermana">Primer nombre de hermana</option>
                <option value="Segundo nombre de hermana">Segundo nombre de hermana</option>
                <option value="Primer nombre de hijo">Primer nombre de hijo</option>
                <option value="Segundo nombre de hijo">Segundo nombre de hijo</option>
                <option value="Primer nombre de hija">Primer nombre de hija</option>
                <option value="Segundo nombre de hija">Segundo nombre de hija</option>
                <option value="Nombre de mascota">Nombre de mascota</option>
                <option value="Marca de motocicleta favorita">Marca de motocicleta favorita</option>
                <option value="Marca de automovil favorita">Marca de auto favorita</option>
                <option value="Deporte favorito">Deporte favorito</option>
                <option value="Color favorito">Color favorito</option>
                <option value="Lugar de nacimiento">Lugar de nacimiento</option>
            </select>
        </div><br>
        <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Respuesta <h11>*</h11></b></label>
          <input class="form-control border-success" type="text" required name="respuesta_4"><br>
        </div>
        <div class="d-grid gap-2 col-2 mx-auto justify-content-center">
            <input class="btn btn-success" type="submit" name="accion" value="Cargar">
        </div>
  </form>
  </article>
  
<?php  
include("piedepagina.php");
?>