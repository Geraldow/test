<?php

$totalMan = 255;
$totalWoman = 85;

$total = $totalMan + $totalWoman;

$totalPercentMan = round(($totalMan / $total) * 100) ;
$totalPercentWoman = round(($totalWoman / $total) *100);
echo "El total de hombres y mujeres es: " .$total. "\n";
echo "El porcentaje de hombre es: " .number_format($totalPercentMan,2). "\n";
echo "El porcentaje de mujeres es: " .number_format($totalPercentWoman,2). "\n";
?>