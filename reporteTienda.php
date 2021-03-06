<?php 

include_once "logica/TiendaProducto.php";
include_once "logica/Tienda.php";
include_once "fpdf/fpdf.php";

$idTienda =  $_GET['idTienda'];

$tienda = new Tienda($idTienda);
$tienda -> getInfo();

$pdf = new FPDF('P','mm','Letter');
$pdf -> addPage();
$pdf -> setFont('Helvetica', 'B', '18');
/**
 * Ancho, Alto, Texto, Borde, Posición, Alineación, dibujar el fondo de la celda, link
 */
$pdf->Cell(216,10,'Inventario Tienda', 0, 1, 'C');
$pdf->Cell(216,10,$tienda -> getNombre(), 0, 1, 'C');
$pdf->Cell(216,10,$tienda -> getDireccion(), 0, 1, 'C');
//$pdf->Cell(216,10,'Productor', 0, 1, 'C');

$pdf -> ln();

$tienda = new TiendaProducto("", $idTienda);
$resProd = $tienda -> consultarReporte();

$cabecera = Array("Nombre", "Cantidad");

$pdf -> setFont('Helvetica', 'B', '13');
$pdf -> SetTextColor(255);
$pdf -> SetFillColor(0, 119, 204);


$pdf -> Cell(98,10, "Nombre", 1,0, 'C',true);
$pdf -> Cell(98,10, "Cantidad", 1,1, 'C',true);

$pdf -> SetTextColor(0);
$pdf -> setFont('Helvetica', '', '13');
$pdf -> SetFillColor(232,240, 254);

for($i = 0; $i < count($resProd); $i++){
    $pdf -> Cell(98,20, $resProd[$i] -> getIdProducto(), 1,0, 'C');
    $pdf -> Cell(98,20, $resProd[$i] -> getCantidad(), 1,1, 'C');
}
$pdf-> ln();

$pdf -> Output();

?>