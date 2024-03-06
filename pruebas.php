<?php
include_once('modelo/m_usuarios.php');

$epcion=new m_usuarios();
$z = $epcion -> leer_usuario_idp(1111);
echo $z['id_persona'];;

?>