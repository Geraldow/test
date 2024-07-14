<?php
require('fpdf/fpdf.php');

$cliente = $_POST ['cliente'];
list($prenda, $precio) = explode('|', $_POST['prenda']);
$dni = $_POST ['dni'];
$cantidad = $_POST ['cantidad'];
$precio_pen = $precio * 3.80;
$monto = $cantidad * $precio_pen;
$date = $_POST['date'];

if($monto <= 100){
    $descuento = 0.02;
} else if ($monto <= 500){
    $descuento = 0.04;
} else if ($monto <= 1000){
    $descuento = 0.06;
} else if ($monto <= 1500   ){
    $descuento = 0.08;
} else {
    $descuento = 0.20;
}

$descuentoPorcentaje = $descuento * 100;
$descuentoMontoInicial = $monto *$descuento;
$descuentoMontoFinal = $monto - $descuentoMontoInicial;


$igv = 0.18;
$igvPorcentaje = $igv * 100;
$igvMontoPrenda = $descuentoMontoFinal * $igv;
$valorFinal = $descuentoMontoFinal + $igvMontoPrenda;

# FIRST STEP: WE CREATE PDF
$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> SetFont('Arial', 'B', 24);

# SECOND STEP: WE DESIGN TITLE
$pdf -> Cell(0, 10, 'Boleta de Venta', 0, 1, 'C',);

# THIRD STEP: WE CAPTURE DATA ENTRIES
$pdf -> SetFont('Arial', 'I', 12);
$pdf -> Cell(0, 10, "Cliente: $cliente", 0, 1, 'L');
$pdf -> Cell(0, 10, "DNI: $dni", 0, 1, 'L');
$pdf -> Cell(0, 10, "Prenda: $prenda", 0, 1, 'L');
$pdf -> Cell(0, 10, "Cantidad: $cantidad", 0, 1, 'L');
$pdf -> Cell(0, 10, "Precio: $precio", 0, 1, 'L');
$pdf -> Cell(0, 10, "Fecha de compra: $date", 0, 1, 'L');

# FOURTH STEP: WE DESIGN HEADER
$pdf -> SetFont('Arial', 'I', 12);
$pdf -> SetTextColor(255, 0, 0);
$pdf -> SetFillColor(0,0,0);
$pdf -> Cell(50, 10, 'Concepto', 1, 0, 'C', true);
$pdf -> SetFillColor(0,0,0);
$pdf -> Cell(50, 10, 'Detalle', 1, 0, 'C', true);
$pdf -> SetFillColor(0,0,0);
$pdf -> Cell(50, 10, 'Monto', 1, 1, 'C', true);

# STEP: WE DESIGN BODY OF THE TABLE
$pdf -> Cell(50, 10, 'Prenda', 1, 0, 'C');
$pdf -> Cell(50, 10, "$prenda ", 1, 0, 'C');
$pdf -> Cell(50, 10, "$precio dolares", 1, 1, 'C');

$pdf -> Cell(50, 10, 'Cantidad vendida', 1, 0, 'C');
$pdf -> Cell(50, 10, "$cantidad", 1, 0, 'C');
$pdf -> Cell(50, 10, "$monto soles", 1, 1, 'C');

$pdf -> Cell(50, 10, 'Descuento', 1, 0, 'C');
$pdf -> Cell(50, 10, "$descuentoPorcentaje% descuento", 1, 0, 'C');
$pdf -> Cell(50, 10, '-'."$descuentoMontoInicial soles", 1, 1, 'C');

$pdf -> Cell(50, 10, 'Subtotal con descuento', 1, 0, 'C');
$pdf -> Cell(50, 10, "", 1, 0, 'C');
$pdf -> Cell(50, 10, "$descuentoMontoFinal soles", 1, 1, 'C');

$pdf -> Cell(50, 10, 'IGV', 1, 0, 'C');
$pdf -> Cell(50, 10, "$igvPorcentaje%", 1, 0, 'C');
$pdf -> Cell(50, 10, "$igvMontoPrenda soles", 1, 1, 'C');

$pdf -> Cell(50, 10, 'Valor neto', 1, 0, 'C');
$pdf -> Cell(50, 10, "", 1, 0, 'C');    
$pdf -> Cell(50, 10, "$valorFinal soles", 1, 1, 'C');

# FINAL STEP: WE GENERATE PDF
$pdf -> Output('D','boleta_de_venta.pdf');
?>