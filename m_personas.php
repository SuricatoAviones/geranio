<?php

include_once('database.php');
class m_personas extends database
{
	
	private $conn;
	private $link;
	function __construct()
	{
            $this->conn=new database();
            $this->link=$this->conn->conectarse();
	}

	public function insertar_persona($id_persona, $nombres, $apellidos, $cedula, $telefono, $correo_electronico, $casa, $estado)
        {
            $query = "INSERT INTO personas (id_persona, nombres, apellidos, cedula, telefono, correo_electronico, casa, estado) VALUES ($id_persona, UPPER('$nombres'), UPPER('$apellidos'), UPPER('$cedula'), '$telefono', '$correo_electronico', '$casa', '$estado')";
            $result=mysqli_query($this->link, $query);
            if (mysqli_affected_rows($this->link)>0) 
		{
                    return true;
		}
		else
                {
                    return false;
		}
	}
        
	public function eliminar_persona($id_persona)
        {	
            $query= "DELETE FROM personas WHERE id_persona=".$id_persona;
            $result=mysqli_query($this->link, $query);
            if ($result=== TRUE) 
            {
                return true;
            }
            else
            {
                return false;
            }
	}

	public function leer_persona()
	{
            $query= "SELECT * FROM personas WHERE id_persona<'100'";
            $result =mysqli_query($this->link,$query);
            $data   = array();
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

	public function leer_persona_e($id_persona)
	{
            $query= "SELECT * FROM personas WHERE id_persona=".$id_persona;
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
        public function leer_persona_clave($id_persona)
	{
            $query= "SELECT clave FROM usuarios WHERE id_persona=".$id_persona;
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
        
        public function leer_persona_id()
        {

            $query = "SELECT id_persona FROM personas";
            $result = mysqli_query($this->link,$query);
            $id_personas = array();
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $id_personas[] = $row["id_persona"];
                }
            }
                return $id_personas;
         
            }
            
            
        public function leer_persona_estado($id_persona)
	{
            $query= "SELECT estado FROM personas WHERE id_persona=".$id_persona;
            $result =mysqli_query($this->link,$query);
            if($result) 
            {
                $fila = mysqli_fetch_assoc($result);
                $estado = $fila['estado'];

                // Liberar el resultado y cerrar la conexión a la base de datos
                mysqli_free_result($result);

                // Retornar el valor del estado
                return $estado;
            } 
            else 
            {
                // En caso de error, puedes manejarlo de acuerdo a tus necesidades
                return "Error al leer el estado de la persona";
            }
	}
            

	public function modificar_persona($id_persona, $id_persona_n, $nombres, $apellidos, $cedula, $telefono, $correo_electronico, $casa)
	{
            $query= "UPDATE personas SET id_persona=$id_persona_n, nombres=UPPER('$nombres'), apellidos=UPPER('$apellidos'), cedula=UPPER('$cedula'), telefono='$telefono', correo_electronico='$correo_electronico', casa='$casa' WHERE id_persona=".$id_persona;
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
        public function modificar_estado($id_persona, $estado)
	{
            $query= "UPDATE personas SET estado=$estado WHERE id_persona=".$id_persona;
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
}

