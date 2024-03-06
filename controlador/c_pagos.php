<?php
session_start();
include_once('../modelo/m_pagos.php');

class c_pagos extends m_pagos
{
	
	private $conn;
	private $link;
	function __construct()
	{
		$this->conn=new database();
		$this->link=$this->conn->conectarse();
	}

	public function ejecuta_pagos()
	{
		$opcion=new m_pagos();
		
		$entrada=$_REQUEST['accion'];
		if ($entrada=='Registrar')
		{
                $result = $opcion ->insertar_pago($_POST['id_gasto'], $_SESSION['id_persona'], $_POST['fecha_pago'], $_POST['banco_emisor'], $_POST['referencia'], $_POST['monto_pago'], $_POST['estado_pago']);
                       
			if ($result==true) 
			{
                            if($_SESSION['id_persona']<100)
                            {
                            echo '<meta http-equiv="refresh" content="0;url=../pagos_residente.php?id=0">';
                            }else{
                            echo '<meta http-equiv="refresh" content="0;url=../pagos.php?id=0">';    
                            }
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../pagos.php?id=1">';
			}	
		}

		elseif ($entrada=='eliminar') 
		{
			$result = $opcion ->eliminar_pago($_REQUEST['id']);
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../pagos.php?id=2">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../pagos.php?id=3">';
			}
		}

		elseif ($entrada=='Actualizar')
		{
			$result = $opcion ->modificar_pago($_POST['id_pago'], $_POST['id_gasto'], $_POST['fecha_pago'], $_POST['banco_emisor'], $_POST['referencia'], $_POST['monto_pago']);
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../pagos.php?id=4">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../pagos.php?id=5">';
			}	

		}
                elseif ($entrada=='cambiar_estado')
		{
                    $result = $opcion ->leer_pago_estado($_REQUEST['id']);
                    $opcion2=new m_pagos();
                    
                    if($result=='Por confirmar')
                    {
                    $result2 = $opcion2 ->modificar_estado($_REQUEST['id'], 'Confirmado');
			if ($result2==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../pagos.php?id=6">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../pagos.php?id=7">';
			}	
                    }
                    else
                    {
                    $result2 = $opcion2 ->modificar_estado($_REQUEST['id'], 'Por confirmar');
			if ($result2==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../pagos.php?id=6">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../pagos.php?id=7">';
			}	
                    }
		}
  

	}
			
	}

$estudia=new c_pagos();
$estudia->ejecuta_pagos();

?>

