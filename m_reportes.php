<?php

include_once('database.php');
class m_reportes extends database
{
	
	private $conn;
	private $link;
	function __construct()
	{
            $this->conn=new database();
            $this->link=$this->conn->conectarse();
	}

	public function insertar_reporte($id_gasto, $n_residentes, $n_residentes_solventes, $n_residentes_deudores, $n_casa_alquiler, $n_casa_oferta, $montototal_pagos_mes, $n_reclamos)
        {
            $query = "INSERT INTO reportes (id_reporte, id_gasto, n_residentes, n_residentes_solventes, n_residentes_deudores, n_casa_alquiler, n_casa_oferta, montototal_pagos_mes, n_reclamos) VALUES (NULL, $id_gasto, $n_residentes, $n_residentes_solventes, $n_residentes_deudores, $n_casa_alquiler, $n_casa_oferta, $montototal_pagos_mes, $n_reclamos)";
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
        
	public function eliminar_reporte($id_reporte)
        {	
            $query= "DELETE FROM reportes WHERE id_reporte=".$id_reporte;
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

	public function leer_reporte()
	{
            $query= "SELECT * FROM reportes";
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

	public function leer_reporte_e($id_reporte)
	{
            $query= "SELECT * FROM reportes WHERE id_reporte=".$id_reporte;
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
         
        public function leer_reporte_id()
        {

            $query = "SELECT id_reporte FROM reportes";
            $result = mysqli_query($this->link,$query);
            $id_reportes = array();
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $id_reportes[] = $row["id_reporte"];
                }
            }
                return $id_reportes;
         
        }
        public function leer_persona_id()
        {

            $query = "SELECT id_persona FROM personas WHERE casa!='0'";
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
        
        public function leer_persona_id_estado($estado)
        {

            $query = "SELECT id_persona FROM personas WHERE estado=".$estado;
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
        public function leer_casa_id_estado($estado_casa)
        {

            $query = "SELECT id_casa FROM casas WHERE estado_casa=".$estado_casa;
            $result = mysqli_query($this->link,$query);
            $id_personas = array();
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $id_personas[] = $row["id_casa"];
                }
            }
                return $id_personas;
         
        }
        public function leer_montos_pagos($id_gasto)
        {

            $query = "SELECT monto_pago FROM pagos WHERE id_gasto=".$id_gasto;
            $result = mysqli_query($this->link,$query);
            $montos = array();
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $montos[] = $row["monto_pago"];
                }
            }
                return $montos;
         
        }
        public function leer_id_pagos_mes($fecha1, $fecha2)
        {

            $query = "SELECT id_reclamo FROM reclamos WHERE fecha BETWEEN '".$fecha1."' AND '".$fecha2."'";
            $result = mysqli_query($this->link,$query);
            $montos = array();
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $montos[] = $row["id_reclamo"];
                }
            }
                return $montos;
         
        }
        
        public function leer_fechas_gasto($id_gasto)
	{
            $query= "SELECT fecha_inicio, fecha_corte FROM gastos WHERE id_gasto=".$id_gasto;
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

