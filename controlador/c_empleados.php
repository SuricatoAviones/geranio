<?php
include_once('../modelo/m_empleados.php');

class c_empleados extends m_empleados
{
	
	private $conn;
	private $link;
	function __construct()
	{
		$this->conn=new database();
		$this->link=$this->conn->conectarse();
	}

	public function ejecuta_empleados()
	{
		$opcion=new m_empleados();
		
		$entrada=$_REQUEST['accion'];
		if ($entrada=='Registrar')
		{
                        $result2 = $opcion ->insertar_empleado_d($_POST['id_persona'], $_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['telefono'], $_POST['correo_electronico']);
			$result1 = $opcion ->insertar_empleado_e($_POST['id_empleado'], $_POST['id_persona'], $_POST['cargo'], $_POST['rif']);
			if (($result1==true)AND($result2==true)) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../empleados.php?id=0">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../empleados.php?id=1">';
			}	
		}

		elseif ($entrada=='eliminar') 
		{
			$result = $opcion ->eliminar_empleado($_REQUEST['id']);
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../empleados.php?id=2">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../empleados.php?id=3">';
			}
		}

		elseif ($entrada=='leer') 
		{
				$result = $opcion ->leer_empleado();
				
		}

		elseif ($entrada=='Actualizar')
		{
                        $result1 = $opcion ->modificar_empleado_d($_POST['id_persona'], $_POST['id_persona_n'], $_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['telefono'], $_POST['correo_electronico']);
			$result2 = $opcion ->modificar_empleado_e($_POST['id_empleado'], $_POST['id_empleado_n'], $_POST['id_persona'], $_POST['cargo'], $_POST['rif']);
                        if (($result1==true)AND($result2==true)) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../empleados.php?id=4">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../empleados.php?id=5">';
			}	

		}

	
	}
			
	}

$estudia=new c_empleados();
$estudia->ejecuta_empleados();

?>

