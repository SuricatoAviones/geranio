<?php  
include("cabecera.php");
include("menu.php");
include("modelo/m_gastos.php");
include("modelo/m_usuarios.php");
//<b>N° de Residente: </b><input type="number" required name="id_persona" value="<?php $x=new m_usuarios(); $a= $x ->leer_usuario_idp($_SESSION['cedula']); echo $_SESSION['cedula'];?>"><br>
?>
  <!--======================Texto del main==========================-->
  <article class="main redimension p-3">
    <h1>Nuevo pago</h1><br>
  <form action="controlador/c_pagos.php" method="POST">
 
  <b class="d-flex">N° de Gasto: </b><input type="number" required name="id_gasto"  class="col-12 col-md-4" value="<?php $acumulador=0; $x=new m_gastos(); $a= $x ->leer_gasto_id(); for($i = 0; $i < count($a); $i++) { $acumulador++;} echo $acumulador;?>"><br>
  <b class="d-flex">Banco emisor: </b><input type="text" class="col-12 col-md-4" required name="banco_emisor" value="<?php if (isset($_POST['banco_emisor'])) {echo $_POST['banco_emisor'];}?>"><br>
  <b class="d-flex">Referencia: </b><input type="text" class="col-12 col-md-4" required name="referencia" value="<?php if (isset($_POST['referencia'])) {echo $_POST['referencia'];}?>"><br>
  <b class="d-flex">Monto (Bs): </b><input type="number"  class="col-12 col-md-4" required name="monto" value="<?php if (isset($_POST['monto'])) {echo $_POST['monto'];}?>"><br>
  <div class="d-flex justify-content-center">
  <input class="btn btn-success m-2" type="submit" name="accion" value="Registrar">
  </div>
  </form>

  </article>
  
<?php  
include("piedepagina.php");
?>