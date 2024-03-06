<?php
include_once('../modelo/m_personas.php');
include_once('../modelo/m_usuarios.php');

class c_personas extends m_personas
{
	
	private $conn;
	private $link;
	function __construct()
	{
		$this->conn=new database();
		$this->link=$this->conn->conectarse();
	}

	public function ejecuta_personas()
	{
		$opcion=new m_personas();
		
		$entrada=$_REQUEST['accion'];
		if ($entrada=='Registrar')
		{
			$result = $opcion ->insertar_persona($_POST['id_persona'], $_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['telefono'], $_POST['correo_electronico'], $_POST['casa'], $_POST['estado']);
                        
			if (($result==true)) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas.php?id=0">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas.php?id=1">';
			}	
		}

		elseif ($entrada=='eliminar') 
		{
			$result = $opcion ->eliminar_persona($_REQUEST['id']);
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas.php?id=2">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas.php?id=3">';
			}
		}

		elseif ($entrada=='leer') 
		{
				$result = $opcion ->leer_persona();
				
		}

		elseif ($entrada=='Actualizar')
		{
			$result = $opcion ->modificar_persona($_POST['id_persona'], $_POST['id_persona_n'], $_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['telefono'], $_POST['correo_electronico'], $_POST['casa']);
                        if (($result==true)) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas.php?id=4">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas.php?id=5">';
			}	

		}
                elseif ($entrada=='Finalizar')
		{
			$result = $opcion ->modificar_persona($_POST['id_persona'], $_POST['id_persona_n'], $_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['telefono'], $_POST['correo_electronico'], $_POST['casa']);
                        if (($result==true)) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas_residente.php?id=4">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas_residente.php?id=5">';
			}	

		}
                elseif ($entrada=='Actualizar datos')
		{
			
                    echo '<meta http-equiv="refresh" content="0;url=../registro_actualizar_personas_residentes.php">';

		}
                elseif ($entrada=='Cambiar clave')
		{
			
                    echo '<meta http-equiv="refresh" content="0;url=../actualizar_contraseña.php">';

		}
                elseif ($entrada=='cambiar_estado')
		{
                    $result = $opcion ->leer_persona_estado($_REQUEST['id']);
                    $opcion2=new m_personas();
                    
                    if($result==='0')
                    {
                    $result2 = $opcion2 ->modificar_estado($_REQUEST['id'], '1');
			if ($result2==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas.php?id=6">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas.php?id=7">';
			}	
                    }
                    else
                    {
                    $result2 = $opcion2 ->modificar_estado($_REQUEST['id'], '0');
			if ($result2==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas.php?id=6">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../personas.php?id=7">';
			}	
                    }
		}

	
	}
			
	}

$estudia=new c_personas();
$estudia->ejecuta_personas();

?>

