<?php  
include("cabecera.php");
if($_SESSION['id_persona']<100){
	include("menu_residente.php");
}
else{
	include("menu.php");
}
include("modelo/m_gastos.php");
include("modelo/m_usuarios.php");
?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
    <h1>Nuevo pago</h1><br>
  <form action="controlador/c_pagos.php" method="POST">
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b># Cuota <h11>*</h11></b></label>
          <input class="form-control border-success" type="number" required name="id_gasto" value="<?php $acumulador=0; $x=new m_gastos(); $a= $x ->leer_gasto_id(); for($i = 0; $i < count($a); $i++) { $acumulador++;} echo $acumulador;?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Fecha <h11>*</h11></b></label>
          <input class="form-control border-success" type="date" required name="fecha_pago" value="<?php if (isset($_POST['fecha_pago'])) {echo $_POST['fecha_pago'];}?>">
      </div><br>
           <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Banco emisor <h11>*</h11></b></label>
          <select name="banco_emisor" required class="form-select border-success" aria-label="Default select example">
                <option selected></option>
                <option value="Banco de Venezuela">Banco de Venezuela</option>
                <option value="Banesco">Banesco</option>
                <option value="Mercantil Banco">Mercantil Banco</option>
                <option value="100% Banco">100% Banco</option>
                <option value="Bancamiga">Bancamiga</option>
                <option value="Bancaribe">Bancaribe</option>
                <option value="Banco Activo">Banco Activo</option>
                <option value="Banco Agricola de Venezuela">Banco Agricola de Venezuela</option>
                <option value="Banco Bicentenario del Pueblo">Banco Bicentenario del Pueblo</option>
                <option value="Banco Caroní">Banco Caroní</option>
                <option value="Banco del Tesoro">Banco del Tesoro</option>
                <option value="Banco Exterior">Banco Exterior</option>
                <option value="Banco Internacional de Desarrollo">Banco Internacional de Desarrollo</option>
                <option value="Banco Nacional de Crédito">Banco Nacional de Crédito</option>
                <option value="Banco Plaza">Banco Plaza</option>
                <option value="Banco Sofitasa">Banco Sofitasa</option>
                <option value="Banco Venezolano de Crédito">Banco Venezolano de Crédito</option>
                <option value="Bancrecer">Bancrecer</option>
                <option value="BANFANB">BANFANB</option>
                <option value="Bangente">Bangente</option>
                <option value="Banplus">Banplus</option>
                <option value="BBVA Provincial">BBVA Provincial</option>
                <option value="Banco Fondo Común">Banco Fondo Común</option>
                <option value="Banco del Sur">Banco del Sur</option>
                <option value="Mi Banco">Mi Banco</option>
            </select>
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Referencia <h11>*</h11></b></label>
          <input minlength="12" maxlength="12" class="form-control border-success" type="text" required name="referencia" value="<?php if (isset($_POST['referencia'])) {echo $_POST['referencia'];}?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <label class="form-label"><b>Monto (Bs) <h11>*</h11></b></label>
          <input class="form-control border-success" type="float" required name="monto_pago" value="<?php if (isset($_POST['monto'])) {echo $_POST['monto'];}?>">
      </div><br>
      <div class="col-11 col-md-6 mx-auto">
          <input class="form-control border-success" type="hidden" required name="estado_pago" value="Por confirmar">
      </div>
      <div class="d-grid gap-2 col-2 mx-auto justify-content-center">
      <input class="btn btn-success" type="submit" name="accion" value="Registrar">
      </div>
  </form>

  </article>
  
<?php  
include("piedepagina.php");
?>