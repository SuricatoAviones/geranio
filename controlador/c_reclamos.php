<?php
session_start();
include_once('../modelo/m_reclamos.php');


class c_reclamos extends m_reclamos
{
	
	private $conn;
	private $link;
	function __construct()
	{
		$this->conn=new database();
		$this->link=$this->conn->conectarse();
	}

	public function ejecuta_reclamos()
	{
		$opcion=new m_reclamos();
		
		$entrada=$_REQUEST['accion'];
		if ($entrada=='Registrar')
		{
			$result = $opcion ->insertar_reclamo($_SESSION['id_persona'], $_POST['asunto'], $_POST['contenido']);
                        
			if ($result==true){
                            if($_SESSION['id_persona']<100)
                            {
                            echo '<meta http-equiv="refresh" content="0;url=../reclamos_residente.php?id=0">';
                            }else{
                            echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=0">';    
                            }
                        }
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=1">';
			}	
		}

		elseif ($entrada=='eliminar') 
		{
			$result = $opcion ->eliminar_reclamo($_REQUEST['id']);
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=2">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=3">';
			}
		}

		elseif ($entrada=='leer') 
		{
				$result = $opcion ->leer_reclamo();
				
		}

		elseif ($entrada=='Actualizar')
		{
			$result = $opcion ->modificar_reclamo($_POST['id_reclamo'], $_POST['respuesta']);
                        if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=4">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=5">';
			}	

		}
                elseif ($entrada=='Responder')
		{
			$result = $opcion ->responder_reclamo($_POST['id_reclamo'], $_POST['respuesta']);
                        if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=4">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=5">';
			}	

		}
                elseif ($entrada=='cambiar_estado')
		{
                    $result = $opcion ->leer_reclamo_estado($_REQUEST['id']);
                    $opcion2=new m_reclamos();
                    
                    if($result=='Por revisar')
                    {
                    $result2 = $opcion2 ->modificar_estado($_REQUEST['id'], 'Revisado');
			if ($result2==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=6">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=7">';
			}	
                    }
                    else
                    {
                    $result2 = $opcion2 ->modificar_estado($_REQUEST['id'], 'Por revisar');
			if ($result2==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=6">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../reclamos.php?id=7">';
			}	
                    }
		}

	}
			
}

$estudia=new c_reclamos();
$estudia->ejecuta_reclamos();

?>

