<?php
include_once('database.php');
class m_pagos extends database
{
	
	private $conn;
	private $link;
	function __construct()
	{
            $this->conn=new database();
            $this->link=$this->conn->conectarse();
	}

	public function insertar_pago($id_gasto, $id_persona, $fecha_pago, $banco_emisor, $referencia, $monto_pago, $estado_pago)
        {
            $query = "INSERT INTO pagos (id_pago, id_gasto, id_persona, fecha_pago, banco_emisor, referencia, monto_pago, estado_pago) VALUES (NULL, $id_gasto, $id_persona, '$fecha_pago', UPPER('$banco_emisor'), UPPER('$referencia'), '$monto_pago', '$estado_pago')";
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
        
	public function eliminar_pago($id_pago)
        {	
            $query= "DELETE FROM pagos WHERE id_pago=".$id_pago;
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

	public function leer_pago()
	{
            $query= "SELECT * FROM pagos";
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
    public function leer_pago_e($id_pago)
    {
            $query= "SELECT * FROM pagos WHERE id_pago=".$id_pago;
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

	public function leer_pago_residente($id_persona)
	{
            $query= "SELECT * FROM pagos WHERE id_persona=".$id_persona;
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
        
        public function leer_pago_id()
        {

            $query = "SELECT id_pago FROM pagos";
            $result = mysqli_query($this->link,$query);
            $id_pagos = array();
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $id_pagos[] = $row["id_pago"];
                }
            }
                return $id_pagos;
         
        }
        public function leer_pago_estado($id_pago)
	{
            $query= "SELECT estado_pago FROM pagos WHERE id_pago=".$id_pago;
            $result =mysqli_query($this->link,$query);
            if($result) 
            {
                $fila = mysqli_fetch_assoc($result);
                $estado = $fila['estado_pago'];

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
        public function leer_pago_persona($id_persona)
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
            

	public function modificar_pago($id_pago, $id_gasto, $fecha_pago, $banco_emisor, $referencia, $monto_pago)
	{
            $query= "UPDATE pagos SET id_gasto='$id_gasto', fecha_pago='$fecha_pago', banco_emisor=UPPER('$banco_emisor'), referencia=UPPER('$referencia'), monto_pago='$monto_pago' WHERE id_pago=".$id_pago;
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
        public function modificar_estado($id_pago, $estado_pago)
	{
            $query= "UPDATE pagos SET estado_pago='$estado_pago' WHERE id_pago=".$id_pago;
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

