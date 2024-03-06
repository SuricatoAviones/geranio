<?php
include("cabeza.php");

?>
<article class="main">
	<h1>Recuperar contraseña</h1>

<?php
if (isset($_REQUEST['id']))
      {
      $id= $_REQUEST['id'];
      	if ($id==0) 
      	{
      		echo "<br><h10>Se ha cambiado su contraseña con exito</h10>";
                echo '<meta http-equiv="refresh" content="2;url=index.php?">';
      	}
      	elseif ($id==1) 
      	{
      		echo "<br><h10>Ha ocurrido un error al cambiar contraseña</h10>";
                echo '<meta http-equiv="refresh" content="2;url=index.php?">';
      	}
      	
    	}

?>
</article>
<?php
  include("piedepagina.php");
?>