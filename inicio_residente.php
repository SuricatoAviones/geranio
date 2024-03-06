<?php
include("cabecera.php");
include("menu_residente.php");
include("modelo/m_usuarios.php");
?>
  <!--======================Texto del main==========================-->
  <article class="main redimension">
      <h1><b>Condominio geranio</b></h1><br>
      <p> 
        <?php 
        if (isset($_REQUEST['id']))
         {
            $id= $_REQUEST['id'];
            $pre= new m_usuarios();
            $nom= $pre->leer_usuario_n($id);
            echo 'Te damos la bienvenida ' .$nom['nombres'].'.';
         }
        ?>
        Aquí podrás encontrar campos informativos muy utiles que te ayudarán a gestionar todo de una mejor manera. Puedes utilizar la barra superior para navegar entre los diferentes módulos informativos.
      </p>
  <br>

  </article>

<?php 
include("piedepagina.php");
?>