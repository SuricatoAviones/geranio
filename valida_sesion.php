<?php 
session_start();
if (!isset($_SESSION['id_persona']))
{
    echo '<meta http-equiv="refresh" content="0;url=index.php?id=1">';
exit;	
}
?>

