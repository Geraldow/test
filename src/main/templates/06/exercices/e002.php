<?php

$product = "Gucci shoes";
$price = 800;
$discount = 0.05;
$igv = 0.18;

$priceIgv = $price * $igv;
$priceDiscount = $price * $discount;
$totalNeto = ($price + $priceIgv) - $priceDiscount;

echo "Precio del producto: " .$price. "\n";
echo "IGV:" .number_format ($igv,2). "\n";
echo "Precio con descuento: " .number_format($priceDiscount, 2). "\n";
echo "Total neto a pagar: " .number_format($totalNeto, 2). "\n";


?>