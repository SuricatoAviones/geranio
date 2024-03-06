<?php

include_once('database.php');
class m_casas extends database
{
	
	private $conn;
	private $link;
	function __construct()
	{
            $this->conn=new database();
            $this->link=$this->conn->conectarse();
	}

	public function insertar_casa($id_casa, $id_persona, $estado_casa, $habitaciones, $baños, $cocina, $sala_estar, $patio_delantero, $patio_trasero, $comedor)
        {
            $query = "INSERT INTO casas (id_casa, id_persona, estado_casa, habitaciones, baños, cocina, sala_estar, patio_delantero, patio_trasero, comedor) VALUES ($id_casa, $id_persona, '$estado_casa', $habitaciones, $baños, '$cocina', '$sala_estar', '$patio_delantero', '$patio_trasero', '$comedor')";
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
        
	public function eliminar_casa($id_casa)
        {	
            $query= "DELETE FROM casas WHERE id_casa=".$id_casa;
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

	public function leer_casa()
	{
            $query= "SELECT * FROM casas";
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

	public function leer_casa_e($id_casa)
	{
            $query= "SELECT * FROM casas WHERE id_casa=".$id_casa;
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
        
        public function leer_casa_residente($id_persona)
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
        
        
        public function leer_casa_id()
        {

            $query = "SELECT id_casa FROM casas";
            $result = mysqli_query($this->link,$query);
            $id_casas = array();
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $id_casas[] = $row["id_casa"];
                }
            }
                return $id_casas;
         
        }
        public function leer_casa_estado($id_casa)
	{
            $query= "SELECT estado_casa FROM casas WHERE id_casa=".$id_casa;
            $result =mysqli_query($this->link,$query);
            if($result) 
            {
                $fila = mysqli_fetch_assoc($result);
                $estado = $fila['estado_casa'];

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
            
            
	public function modificar_casa($id_casa, $id_persona, $habitaciones, $baños, $cocina, $sala_estar, $patio_delantero, $patio_trasero, $comedor)
	{
            $query= "UPDATE casas SET id_persona=$id_persona, habitaciones=$habitaciones, baños=$baños, cocina='$cocina', sala_estar='$sala_estar', patio_delantero='$patio_delantero', patio_trasero='$patio_trasero', comedor='$comedor' WHERE id_casa=".$id_casa;
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
        public function modificar_estado($id_casa, $estado_casa)
	{
            $query= "UPDATE casas SET estado_casa='$estado_casa' WHERE id_casa=".$id_casa;
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

