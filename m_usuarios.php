<?php  

include_once('database.php');

class m_usuarios extends database
{
	private $conn;
	private $link;
	
	function __construct()
	{
            $this->conn   = new database();
            $this->link   = $this->conn->conectarse();
	}
//valida
public function validar_usuarios_admin($usuario, $clave)
	{
            $query= "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave' AND tipo_usuario='1'";
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return true;
            }
            else
            {
                return false;
            }
	}
        
public function validar_usuarios_habitantes($usuario, $clave)
	{
            $query= "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave' AND tipo_usuario='2'";
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return true;
            }
            else
            {
                return false;
            }
	}

public function crear_usuarios($id_usuario, $tipo_usuario, $id_persona, $usuario, $clave)
	{
            $query= "INSERT INTO usuarios (id_usuario, tipo_usuario, id_persona, usuario, clave) VALUES ($id_usuario, $tipo_usuario, $id_persona, UPPER('$usuario'), '$clave')";
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return true;
            }
            else
            {
                return false;
            }
	}
        
public function leer_usuario()
	{
            $query= "SELECT * FROM usuarios";
            $result =mysqli_query($this->link,$query);
            $data   =array();
            if(mysqli_affected_rows($this->link)>0)
            {
                while ($data[]=mysqli_fetch_assoc($result));
                    array_pop($data);
                    return $data;
            }
            else
            {
                return false;
            }
	}

	public function leer_usuario_e($id_usuario)
	{
            $query= "SELECT * FROM usuarios WHERE id_usuario=".$id_usuario;
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return mysqli_fetch_assoc($result);
            }
            else
            {
                return false;
            }
	}
        public function leer_usuario_usuario($id_persona)
	{
            $query= "SELECT cedula FROM personas WHERE id_persona=".$id_persona;
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return mysqli_fetch_assoc($result);
            }
            else
            {
                return false;
            }
	}
        
        public function leer_usuario_e2($usuario)
	{
            $query= "SELECT * FROM usuarios WHERE usuario=".$usuario;
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return mysqli_fetch_assoc($result);
            }
            else
            {
                return false;
            }
	}
        public function leer_usuario_e3($id_persona)
	{
            $query= "SELECT * FROM usuarios WHERE id_persona=".$id_persona;
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return mysqli_fetch_assoc($result);
            }
            else
            {
                return false;
            }
	}
        
        public function leer_usuario_idp($usuario)
	{
            $query= "SELECT id_persona FROM usuarios WHERE usuario=".$usuario;
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return mysqli_fetch_assoc($result);
            }
            else
            {
                return false;
            }
	}
        public function leer_datos_usuario($id_persona)
	{
            $query= "SELECT nombres, apellidos FROM personas WHERE id_persona=".$id_persona;
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return mysqli_fetch_assoc($result);
            }
            else
            {
                return false;
            }
	}

	public function modificar_usuarios($id_usuario, $id_usuario_n, $tipo_usuario, $id_persona, $usuario, $clave)
	{
            $query= "UPDATE usuarios SET id_usuario=$id_usuario_n, tipo_usuario='$tipo_usuario', id_persona='$id_persona', usuario=('$usuario'), clave='$clave' WHERE id_usuario=".$id_usuario;
            $result =mysqli_query($this->link,$query);
            if ($result=== TRUE) 
            {
		return true;
            }
            else
            {
                return false;
            }
			
	}
        
        public function recuperar_contraseña($id_usuario, $clave)
	{
            $query= "UPDATE usuarios SET clave='$clave' WHERE id_usuario=".$id_usuario;
            $result =mysqli_query($this->link,$query);
            if ($result=== TRUE) 
            {
		return true;
            }
            else
            {
                return false;
            }
			
	}
        public function recuperar_contraseña2($id_persona, $clave)
	{
            $query= "UPDATE usuarios SET clave='$clave' WHERE id_persona=".$id_persona;
            $result =mysqli_query($this->link,$query);
            if ($result=== TRUE) 
            {
		return true;
            }
            else
            {
                return false;
            }
			
	}
        
        public function modificar_usuarios_c($id_persona, $usuario)
	{
            $query= "UPDATE usuarios SET usuario='$usuario' WHERE id_persona=".$id_persona;
            $result =mysqli_query($this->link,$query);
            if ($result=== TRUE) 
            {
		return true;
            }
            else
            {
                return false;
            }
			
	}
        

	public function eliminar_usuarios($id_usuario)
	{
	$query= "DELETE FROM usuarios WHERE id_usuario=".$id_usuario;
	 		$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				
        		return true;
			}
                        else
                        {	
			return false;
			}
	}
        public function leer_usuario_n($id_persona)
	{
            $query= "SELECT nombres FROM personas WHERE id_persona=".$id_persona;
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return mysqli_fetch_assoc($result);
            }
            else
            {
                return false;
            }
	}
        
        public function leer_usuario_pyr($id_persona)
	{
            $query= "SELECT usuario, pregunta_1, pregunta_2, pregunta_3, pregunta_4, respuesta_1, respuesta_2, respuesta_3, respuesta_4 FROM usuarios WHERE id_persona=".$id_persona;
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return mysqli_fetch_assoc($result);
            }
            else
            {
                return false;
            }
	}
        
        public function crear_preguntas($id_persona, $pregunta_1, $pregunta_2, $pregunta_3, $pregunta_4, $respuesta_1, $respuesta_2, $respuesta_3, $respuesta_4)
	{
            $query= "UPDATE usuarios SET pregunta_1='$pregunta_1', pregunta_2='$pregunta_2', pregunta_3='$pregunta_3', pregunta_4='$pregunta_4', respuesta_1='$respuesta_1', respuesta_2='$respuesta_2', respuesta_3='$respuesta_3', respuesta_4='$respuesta_4' WHERE id_persona=".$id_persona;
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return true;
            }
            else
            {
                return false;
            }
	}
        
        public function leer_usuario_preguntas($usuario)
	{
            $query="SELECT usuario, pregunta_1, pregunta_2, pregunta_3, pregunta_4, respuesta_1, respuesta_2, respuesta_3, respuesta_4 FROM usuarios WHERE usuario=".$usuario;
            $result =mysqli_query($this->link,$query);
            if(mysqli_affected_rows($this->link)>0)
            {
                return mysqli_fetch_assoc($result);
            }
            else
            {
                return false;
            }
	}
}
?>

