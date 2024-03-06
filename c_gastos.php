<?php
include_once('../modelo/m_gastos.php');

class c_gastos extends m_gastos
{
	
	private $conn;
	private $link;
	function __construct()
	{
		$this->conn=new database();
		$this->link=$this->conn->conectarse();
	}

	public function ejecuta_gastos()
	{
		$opcion=new m_gastos();
		
		$entrada=$_REQUEST['accion'];
// SERVICIOS                
		if ($entrada=='Registrar')
		{
			$result = $opcion ->insertar_servicio($_POST['id_servicio'], $_POST['id_gasto'], $_POST['nombre'], $_POST['monto_dolar']);
                       
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../servicios.php?id=0">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../servicios.php?id=1">';
			}	
		}

		elseif ($entrada=='eliminar') 
		{
			$result = $opcion ->eliminar_servicio($_REQUEST['id']);
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../servicios.php?id=2">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../servicios.php?id=3">';
			}
		}

		elseif ($entrada=='leer') 
		{
				$result = $opcion ->leer_servicio();
				
		}

		elseif ($entrada=='Actualizar')
		{
			$result = $opcion ->modificar_servicio($_POST['id_servicio'], $_POST['id_servicio_n'], $_POST['id_gasto'], $_POST['nombre'], $_POST['monto_dolar']);
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../servicios.php?id=4">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../servicios.php?id=5">';
			}	

		}
// GASTOS
                elseif ($entrada=='Añadir')
		{
			$result = $opcion ->insertar_gasto($_POST['id_gasto'], $_POST['fecha_inicio'], $_POST['fecha_corte'], $_POST['precio_dolar']);
                       
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../gastos.php?id=0">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../gastos.php?id=1">';
			}	
		}
                elseif ($entrada=='eliminar_gasto') 
		{
			$result = $opcion ->eliminar_gasto($_REQUEST['id']);
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../gastos.php?id=2">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../gastos.php?id=3">';
			}
		}
                elseif ($entrada=='Confirmar')
		{
			$result = $opcion ->modificar_gasto($_POST['id_gasto'], $_POST['fecha_inicio'], $_POST['fecha_corte'], $_POST['precio_dolar']);
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../gastos.php?id=4">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../gastos.php?id=5">';
			}	

		}

	}
			
	}

$estudia=new c_gastos();
$estudia->ejecuta_gastos();

?>

