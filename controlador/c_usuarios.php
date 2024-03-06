<?php
include_once('../modelo/m_usuarios.php');

class c_usuarios extends m_usuarios
{
	
	private $conn;
	private $link;
	function __construct()
	{
		$this->conn=new database();
		$this->link=$this->conn->conectarse();
	}

	public function maneja_usuarios()
	{
            $opcion=new m_usuarios();
            $apcion=new m_usuarios();
            $epcion=new m_usuarios();
            $comp = new m_usuarios();
            $entrada=$_REQUEST['accion'];
            if ($entrada=='Eliminar') 
            {
                $result = $opcion ->eliminar_usuarios($_REQUEST['id']);
		if ($result==true) 
		{
                    echo '<meta http-equiv="refresh" content="0;url=../usuarios.php?id=2">';
		}
		else
		{
                    echo '<meta http-equiv="refresh" content="0;url=../usuarios.php?id=3">';
		}
            }
            elseif ($entrada=='Registrar')
            {
		
                $usuario= $opcion -> leer_usuario_usuario($_POST['id_persona']);
                $result = $opcion ->crear_usuarios($_POST['id_usuario'], $_POST['tipo_usuario'], $_POST['id_persona'], $usuario['cedula'], $_POST['clave']);
		if ($result==true) 
		{
                    echo '<meta http-equiv="refresh" content="0;url=../usuarios.php?id=0">';
		}
		else
		{
                    echo '<meta http-equiv="refresh" content="0;url=../usuarios.php?id=1">';
		}	

		}
            
            
            elseif ($entrada=='Actualizar')
            {
		$result = $opcion ->modificar_usuarios($_POST['id_usuario'], $_POST['id_usuario_n'], $_POST['tipo_usuario'], $_POST['id_persona'], $_POST['usuario'], $_POST['clave']);
		if ($result==true) 
		{
                    echo '<meta http-equiv="refresh" content="0;url=../usuarios.php?id=4">';
		}
		else
		{
                    echo '<meta http-equiv="refresh" content="0;url=../usuarios.php?id=5">';
		}	

		}
            elseif ($entrada=="Ingresar")
            {
		$x = $opcion -> validar_usuarios_admin($_POST['usuario'], $_POST['clave']);
                $y = $apcion -> validar_usuarios_habitantes($_POST['usuario'], $_POST['clave']);
		$z = $epcion -> leer_usuario_idp($_POST['usuario']);
                if (($x==true)OR($y==true))
                {
                    //Iniciar una sesion de PHP
                    session_start();
                    $_SESSION['id_persona']    = $z['id_persona'];				        
                    //Crear una variable para indicar que se ha autenticado
                    $_SESSION['autenticado']    = 'SI';
                    $pyr = $comp -> leer_usuario_pyr($z['id_persona']);
                    if($pyr['pregunta_1']==="")
                    {
                        echo '<meta http-equiv="refresh" content="0;url=../registro_preguntas.php?id='.$z['id_persona'].'">';
                    }
                    else
                    {
                        if($_SESSION['id_persona']<100){
                            echo '<meta http-equiv="refresh" content="0;url=../inicio_residente.php?id='.$z['id_persona'].'">';
                        }else{
                            echo '<meta http-equiv="refresh" content="0;url=../inicio.php?id='.$z['id_persona'].'">';
                        }

                    }
                    die(); 
		}
		else 
                {
                    echo '<meta http-equiv="refresh" content="0;url=../index.php?id=0">';
		}
                
            }
            elseif ($entrada=="Cargar")
            {
                $result = $comp -> crear_preguntas($_POST['id_persona'], $_POST['pregunta_1'], $_POST['pregunta_2'], $_POST['pregunta_3'], $_POST['pregunta_4'], $_POST['respuesta_1'], $_POST['respuesta_2'], $_POST['respuesta_3'], $_POST['respuesta_4']);
                if ($result==true) 
		{
                    echo '<meta http-equiv="refresh" content="0;url=../inicio_residente.php?id='.$_POST['id_persona'].'">';
		}
		else
		{
                    echo '<meta http-equiv="refresh" content="0;url=../registro_preguntas.php?id='.$_POST['id_persona'].'">';
		}	

		
                
            }
            elseif ($entrada=="Comprobar")
            {
                $result = $comp -> leer_usuario_preguntas($_POST['usuario']);
                if (($result['respuesta_1']===$_POST['respuesta_1'])AND($result['respuesta_2']===$_POST['respuesta_2'])AND($result['respuesta_3']===$_POST['respuesta_3'])AND($result['respuesta_4']===$_POST['respuesta_4'])) 
		{
                    echo '<meta http-equiv="refresh" content="0;url=../registro_nueva_contraseña.php?id='.$_POST['usuario'].'">';
		}
		else
		{
                    echo '<meta http-equiv="refresh" content="0;url=../comprobar_preguntas.php?id='.$result['usuario'].'">';
		}	

		
                
            }
            
            elseif ($entrada=='Finalizar')
            {
		if ($_POST['clave']===$_POST['c_clave'])
                {
                    $result = $opcion ->recuperar_contraseña($_POST['id_usuario'], $_POST['clave']);
                    if ($result==true) 
                    {
                        echo '<meta http-equiv="refresh" content="0;url=../mensaje_recuperacion.php?id=0">';
                    }
                    else
                    {
                        echo '<meta http-equiv="refresh" content="0;url=../mensaje_recuperacion.php?id=1">';
                    }	
                }
                else
                {
                    echo '<meta http-equiv="refresh" content="0;url=../registro_nueva_contraseña.php?id=0">';
                }
            }
            elseif ($entrada=='Actualizar contraseña')
            {
		if ($_POST['clave']===$_POST['c_clave'])
                {
                    $result = $opcion ->recuperar_contraseña2($_POST['id_persona'], $_POST['clave']);
                    if ($result==true) 
                    {
                        echo '<meta http-equiv="refresh" content="0;url=../personas_residente.php?id=0">';
                    }
                    else
                    {
                        echo '<meta http-equiv="refresh" content="0;url=../personas_residente.php?id=1">';
                    }	
                }
                else
                {
                    echo '<meta http-equiv="refresh" content="0;url=../actualizar_contraseña.php?id=0">';
                }
            }
	
	}
			
}

$usua=new c_usuarios();
$usua->maneja_usuarios();

?>
