<?php

include_once('database.php');
class m_empleados extends database
{
	
	private $conn;
	private $link;
	function __construct()
	{
            $this->conn=new database();
            $this->link=$this->conn->conectarse();
	}
        
        public function insertar_empleado_d($id_persona, $nombres, $apellidos, $cedula, $telefono, $correo_electronico)
        {
            $query = "INSERT INTO personas (id_persona, nombres, apellidos, cedula, telefono, correo_electronico, estado) VALUES ($id_persona, UPPER('$nombres'), UPPER('$apellidos'), UPPER('$cedula'), '$telefono', '$correo_electronico','2')";
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
	public function insertar_empleado_e($id_empleado, $id_persona, $cargo, $rif)
        {
            $query = "INSERT INTO empleados (id_empleado, id_persona, cargo, rif) VALUES ($id_empleado, $id_persona, UPPER('$cargo'), UPPER('$rif'))";
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
        
	public function eliminar_empleado($id_empleado)
        {	
            $query1= "DELETE FROM personas WHERE id_persona=".$id_empleado+100;
            $query2= "DELETE FROM empleados WHERE id_empleado=".$id_empleado;
            $result1=mysqli_query($this->link, $query1);
            $result2=mysqli_query($this->link, $query2);
            if (($result1=== TRUE)AND($result2=== TRUE)) 
            {
                return true;
            }
            else
            {
                return false;
            }
	}

	public function leer_empleado()
	{
            $query= "SELECT * FROM empleados";
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
        public function leer_datos_empleado($id_persona)
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

	public function leer_empleado_e($id_persona)
	{
            $query= "SELECT * FROM empleados WHERE id_persona=".$id_persona;
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
        
        public function leer_empleado_id()
        {

            $query = "SELECT id_empleado FROM empleados";
            $result = mysqli_query($this->link,$query);
            $id_empleados = array();
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $id_empleados[] = $row["id_empleado"];
                }
            }
                return $id_empleados;
         
            }
            
               

	public function modificar_empleado_e($id_empleado, $id_empleado_n, $id_persona, $cargo, $rif)
	{
            $query= "UPDATE empleados SET id_empleado=$id_empleado_n, id_persona=$id_persona, cargo=UPPER('$cargo'), rif=UPPER('$rif') WHERE id_empleado=".$id_empleado;
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
        public function modificar_empleado_d($id_persona, $id_persona_n, $nombres, $apellidos, $cedula, $telefono, $correo_electronico)
	{
            $query= "UPDATE personas SET id_persona=$id_persona_n, nombres=UPPER('$nombres'), apellidos=UPPER('$apellidos'), cedula=UPPER('$cedula'), telefono='$telefono', correo_electronico=$correo_electronico WHERE id_persona=".$id_persona;
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

