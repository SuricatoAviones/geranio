<?php
session_start();
include_once('../modelo/m_reportes.php');

class c_reportes extends m_reportes
{
	
	private $conn;
	private $link;
	function __construct()
	{
		$this->conn=new database();
		$this->link=$this->conn->conectarse();
	}

	public function ejecuta_reportes()
	{
		$opcion=new m_reportes();
		
		$entrada=$_REQUEST['accion'];
		if ($entrada=='Generar')
		{
			$result = $opcion ->insertar_reporte($_POST['id_gasto'], $_POST['n_residentes'], $_POST['n_residentes_solventes'], $_POST['n_residentes_deudores'], $_POST['n_casa_alquiler'], $_POST['n_casa_oferta'], $_POST['montototal_pagos_mes'], $_POST['n_reclamos']);
                        
			if (($result==true)) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../reportes.php?id=0">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../reportes.php?id=1">';
			}	
		}

		elseif ($entrada=='eliminar') 
		{
			$result = $opcion ->eliminar_reporte($_REQUEST['id']);
			if ($result==true) 
			{
				echo '<meta http-equiv="refresh" content="0;url=../reportes.php?id=2">';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;url=../reportes.php?id=3">';
			}
		}

	
	}
			
	}

$estudia=new c_reportes();
$estudia->ejecuta_reportes();

?>

