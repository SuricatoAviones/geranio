<?php

include_once('database.php');
class m_reclamos extends database
{
	
	private $conn;
	private $link;
	function __construct()
	{
            $this->conn=new database();
            $this->link=$this->conn->conectarse();
	}

	public function insertar_reclamo($id_persona, $asunto, $contenido)
        {
            $query = "INSERT INTO reclamos (id_reclamo, id_persona, asunto, estado_reclamo, contenido) VALUES (NULL, $id_persona, '$asunto', 'Por revisar', '$contenido')";
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
        
	public function eliminar_reclamo($id_reclamo)
        {	
            $query= "DELETE FROM reclamos WHERE id_reclamo=".$id_reclamo;
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

	public function leer_reclamo()
	{
            $query= "SELECT * FROM reclamos";
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
        public function leer_reclamo_residente($id_persona)
	{
            $query= "SELECT * FROM reclamos WHERE id_persona=".$id_persona;
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

	public function leer_reclamo_e($id_reclamo)
	{
            $query= "SELECT * FROM reclamos WHERE id_reclamo=".$id_reclamo;
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
        
        public function leer_reclamo_id()
        {

            $query = "SELECT id_reclamo FROM reclamos";
            $result = mysqli_query($this->link,$query);
            $id_reclamos = array();
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $id_reclamos[] = $row["id_reclamo"];
                }
            }
                return $id_reclamos;
         
            }
            
            
        public function leer_reclamo_estado($id_reclamo)
	{
            $query= "SELECT estado_reclamo FROM reclamos WHERE id_reclamo=".$id_reclamo;
            $result =mysqli_query($this->link,$query);
            if($result) 
            {
                $fila = mysqli_fetch_assoc($result);
                $estado = $fila['estado_reclamo'];

                // Liberar el resultado y cerrar la conexión a la base de datos
                mysqli_free_result($result);

                // Retornar el valor del estado
                return $estado;
            } 
            else 
            {
                // En caso de error, puedes manejarlo de acuerdo a tus necesidades
                return "Error al leer el estado de la reclamo";
            }
	}
                public function leer_nombre_perfil($id_persona)
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
            

	public function modificar_reclamo($id_reclamo, $respuesta)
	{
            $query= "UPDATE reclamos SET respuesta='$respuesta' WHERE id_reclamo=".$id_reclamo;
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
        public function responder_reclamo($id_reclamo, $respuesta)
	{
            $query= "UPDATE reclamos SET respuesta='$respuesta' WHERE id_reclamo=".$id_reclamo;
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
        
        public function modificar_estado($id_reclamo, $estado_reclamo)
	{
            $query= "UPDATE reclamos SET estado_reclamo='$estado_reclamo' WHERE id_reclamo=".$id_reclamo;
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

