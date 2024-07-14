<?php

require('fpdf/fpdf.php');

$client = $_POST['cliente'];
list($product, $price) = explode('|', $_POST['producto']);
$quantity = $_POST['cantidad'];
$mount = $quantity * $price;

if ($mount < 400) {
    $discount = 0.03;
} else if ($mount <= 700) {
    $discount = 0.06;
} else if ($mount <= 1000) {
    $discount = 0.09;
} else if ($mount <= 1400) {
    $discount = 0.12;
} else {
    $discount = 0.15;
}

$discountPercentage = $discount * 100;  // Convertir descuento a porcentaje
$mountDiscountInit = $mount * $discount;
$mountDiscountFinal = $mount - $mountDiscountInit;

$igv = 0.18;
$igvPercentage = $igv * 100;  // Convertir IGV a porcentaje
$igvMountProduct = $mountDiscountFinal * $igv;
$finalValue = $mountDiscountFinal + $igvMountProduct;

# Crear PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

# Título
$pdf->SetTextColor(33, 37, 41);
$pdf->Cell(0, 10, 'Boleta de Venta', 0, 1, 'C');

# Datos del Cliente
$pdf->SetFont('Arial', 'I', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(0, 10, "Cliente: $client", 0, 1, 'L');
$pdf->Cell(0, 10, "Producto: $product", 0, 1, 'L');
$pdf->Cell(0, 10, "Cantidad: $quantity", 0, 1, 'L');

# Encabezado de la Tabla
$pdf->SetFont('Arial', 'I', 12);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(52, 58, 64);
$pdf->Cell(50, 10, 'Concepto', 1, 0, 'C', true);
$pdf->Cell(70, 10, 'Detalle', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Monto', 1, 1, 'C', true);

# Cuerpo de la Tabla
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(248, 249, 250);

$pdf->Cell(50, 10, 'Precio unitario', 1, 0, 'C', true);
$pdf->Cell(70, 10, "$quantity unidades", 1, 0, 'C', true);
$pdf->Cell(50, 10, "$price soles", 1, 1, 'C', true);

$pdf->Cell(50, 10, 'Subtotal', 1, 0, 'C');
$pdf->Cell(70, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "$mount soles", 1, 1, 'C');

$pdf->Cell(50, 10, 'Descuento', 1, 0, 'C', true);
$pdf->Cell(70, 10, "$discountPercentage% descuento", 1, 0, 'C', true);
$pdf->Cell(50, 10, '-'."$mountDiscountInit soles", 1, 1, 'C', true);

$pdf->Cell(50, 10, 'Subtotal con descuento', 1, 0, 'C');
$pdf->Cell(70, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "$mountDiscountFinal soles", 1, 1, 'C');

$pdf->Cell(50, 10, 'IGV', 1, 0, 'C', true);
$pdf->Cell(70, 10, "$igvPercentage%", 1, 0, 'C', true);
$pdf->Cell(50, 10, "$igvMountProduct soles", 1, 1, 'C', true);

$pdf->Cell(50, 10, 'Neto', 1, 0, 'C');
$pdf->Cell(70, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "$finalValue soles", 1, 1, 'C');

# Generar PDF
$pdf->Output('D', 'boleta_de_venta.pdf');
?>
