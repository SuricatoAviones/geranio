<?php
require('fpdf.php');
include("../modelo/m_pagos.php");

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('Logo.png', 15, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'BI', 25); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(25, 135, 84); //color
      //creamos una celda o fila
      $this->Cell(100, 15, utf8_decode('Condominio Geranio'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(170);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : Tipuro, Maturín, Monagas"), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(170);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : 0424-137-5555"), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(170);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : condominiogeranio@gmail.com"), 0, 0, '', 0);
      $this->Ln(15);



      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(1, 1, 1);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 20);
      $this->Cell(90, 10, utf8_decode("Reporte de pago"), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(25, 135, 84); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(15, 10, utf8_decode('#'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Cuota'), 1, 0, 'C', 1);
      $this->Cell(65, 10, utf8_decode('Realizado por'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Fecha del pago'), 1, 0, 'C', 1);
      $this->Cell(50, 10, utf8_decode('Banco emisor'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Referencia'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Monto (Bs)'), 1, 1, 'C', 1);
      
      
      
   }
   
    // Pie de página
   function Footer()
   {  
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}
   


$sql = new m_pagos();
$value= $sql->leer_pago_e($_REQUEST['id']);
$value2= $sql->leer_pago_persona($value['id_persona']);
$pdf = new PDF();
$pdf->AddPage("landscape");/* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$pdf->Cell(15, 10, utf8_decode($value['id_pago']), 1, 0, 'C', 0);
$pdf->Cell(25, 10, utf8_decode($value['id_gasto']), 1, 0, 'C', 0);
$pdf->Cell(65, 10, utf8_decode($value2['nombres'].' '.$value2['apellidos']), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($value['fecha_pago']), 1, 0, 'C', 0);
$pdf->Cell(50, 10, utf8_decode($value['banco_emisor']), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($value['referencia']), 1, 0, 'C', 0);
$pdf->Cell(35, 10, utf8_decode($value['monto_pago']), 1, 1, 'C', 0);


$pdf->Output('ReportePago-'.$value['fecha_pago'].'.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
