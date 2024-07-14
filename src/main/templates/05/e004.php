<?php
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $name = $_POST['name'];
    $hours = $_POST['hours'];
    $fee = $_POST['fee'];

    $salary1 = $hours * $fee;
    $tax = $salary1 * 0.10;
    $salary2 = $salary1 - $tax;

    echo "<h1> BOLETA DE PAGO </h1>";
    echo "Nombre de empleado: " .$name. "<br>";
    echo "Horas trabajadas: " .$hours. "<br>";
    echo "Tarifa: " .$fee. "<br>";
    echo "Salario bruto: " .$salary1. "<br>";
    echo "Impuesto: " .$tax. "<br>";
    echo "Salario neto: " .$salary2. "<br>";
}   
?>