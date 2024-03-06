<?php
include_once('../modelo/m_casas.php');


class c_casas extends m_casas
{
	
	private $conn;
	private $link;
	function __construct()
	{
		$this->conn=new database();
		$this->link=$this->conn->conectarse();
	}

	public function ejecuta_casas()
	{
		$opcion=new m_casas();
		
		$entrada=$_REQUEST['accion'];
		if ($entrada=='Registrar')
		{
			$result = $opcion ->insertar_casa($_POST['id_casa'], $_POST['id_persona'], $_POST['estado_casa'], $_POST['habitaciones'], $_POST['baños'], $_POST['cocina'], $_POST['sala_estar'], $_POST['patio_delantero'], $_POST['patio_trasero'], $_POST['comedor']);
                        
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../casas.php?id=0">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../casas.php?id=1">';
			}	
		}

		elseif ($entrada=='eliminar') 
		{
			$result = $opcion ->eliminar_casa($_REQUEST['id']);
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../casas.php?id=2">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../casas.php?id=3">';
			}
		}

		elseif ($entrada=='leer') 
		{
				$result = $opcion ->leer_casa();
				
		}

		elseif ($entrada=='Actualizar')
		{
			$result = $opcion ->modificar_casa($_POST['id_casa'], $_POST['id_persona'], $_POST['habitaciones'], $_POST['baños'], $_POST['cocina'], $_POST['sala_estar'], $_POST['patio_delantero'], $_POST['patio_trasero'], $_POST['comedor']);
                        if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../casas.php?id=4">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../casas.php?id=5">';
			}	

		}
                elseif ($entrada=='cambiar_estado')
		{
                    $result = $opcion ->leer_casa_estado($_REQUEST['id']);
                    $opcion2=new m_casas();
                    
                    if($result=='0')
                    {
                    $result2 = $opcion2 ->modificar_estado($_REQUEST['id'], '1');
			if ($result2==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../casas.php?id=6">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../casas.php?id=7">';
			}	
                    }
                    else
                    {
                    $result2 = $opcion2 ->modificar_estado($_REQUEST['id'], '0');
			if ($result2==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../casas.php?id=6">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../casas.php?id=7">';
			}	
                    }
		}

	}
			
}

$estudia=new c_casas();
$estudia->ejecuta_casas();

?>

