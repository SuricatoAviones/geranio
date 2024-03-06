<?php

include_once('database.php');
class m_gastos extends database
{
	
	private $conn;
	private $link;
	function __construct()
	{
            $this->conn=new database();
            $this->link=$this->conn->conectarse();
	}

	public function insertar_servicio($id_servicio, $id_gasto, $nombre, $monto_dolar)
        {
            $query = "INSERT INTO servicios (id_servicio, id_gasto, nombre, monto_dolar) VALUES ('$id_servicio', '$id_gasto', UPPER('$nombre'), '$monto_dolar')";
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
        
	public function eliminar_servicio($id_servicio)
        {	
            $query= "DELETE FROM servicios WHERE id_servicio=".$id_servicio;
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

	public function leer_servicio()
	{
            $query= "SELECT * FROM servicios";
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

	public function leer_servicio_e($id_servicio)
	{
            $query= "SELECT * FROM servicios WHERE id_servicio=".$id_servicio;
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
        
        public function leer_servicio_monto()
        {

            $query = "SELECT monto_dolar FROM servicios";
            $result = mysqli_query($this->link,$query);
            $montos = array();
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $montos[] = $row["monto_dolar"];
                }
            }
                return $montos;
         
            }
        
            
	public function modificar_servicio($id_servicio, $id_servicio_n, $id_gasto, $nombre, $monto_dolar)
	{
            $query= "UPDATE servicios SET id_servicio='$id_servicio_n', id_gasto='$id_gasto', nombre=UPPER('$nombre'), monto_dolar='$monto_dolar' WHERE id_servicio=".$id_servicio;
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
        
        public function insertar_gasto($id_gasto, $fecha_inicio, $fecha_corte, $precio_dolar)
        {
            $query = "INSERT INTO gastos (id_gasto, fecha_inicio, fecha_corte, precio_dolar) VALUES ($id_gasto, '$fecha_inicio', '$fecha_corte', $precio_dolar)";
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
        public function modificar_gasto($id_gasto, $fecha_inicio, $fecha_corte, $precio_dolar)
	{
            $query= "UPDATE gastos SET fecha_inicio='$fecha_inicio', fecha_corte='$fecha_corte', precio_dolar=$precio_dolar WHERE id_gasto=".$id_gasto;
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
        
        
        public function leer_gasto_id()
        {

            $query = "SELECT id_gasto FROM gastos";
            $result = mysqli_query($this->link,$query);
            $id_gastos = array();
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $id_gastos[] = $row["id_gasto"];
                }
            }
                return $id_gastos;
         
        }
        
        public function leer_gasto()
	{
            $query= "SELECT * FROM gastos";
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
        public function leer_gasto_e($id_gasto)
	{
            $query= "SELECT * FROM gastos WHERE id_gasto=".$id_gasto;
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
        public function leer_gasto_dolar($id_gasto)
	{
            $query= "SELECT precio_dolar FROM gastos WHERE id_gasto=".$id_gasto;
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
        
        public function insertar_monto_gasto($id_gasto, $monto)
        {
            $query = "UPDATE gastos SET monto='$monto' WHERE id_gasto=".$id_gasto;
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
        
        public function eliminar_gasto($id_gasto)
        {	
            $query= "DELETE FROM gastos WHERE id_gasto=".$id_gasto;
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
}