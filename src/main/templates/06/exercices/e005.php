<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $garments = $_POST['garments'];

    function calculateSalary($name, $garments) {
        $rate_per_garment = 20;
        $gross_salary = $rate_per_garment * $garments;

        // Apply discounts
        $tax_discount = 0.03 * $gross_salary;
        $insurance_discount = 0.02 * $gross_salary;
        $solidarity_discount = 0.01 * $gross_salary;

        // Bonus
        $bonus = 0.08 * $gross_salary;

        // Calculate net salary
        $net_salary = $gross_salary - $tax_discount - $insurance_discount - $solidarity_discount + $bonus;

        return [
            'name' => $name,
            'garments' => $garments,
            'gross_salary' => $gross_salary,
            'tax_discount' => $tax_discount,
            'insurance_discount' => $insurance_discount,
            'solidarity_discount' => $solidarity_discount,
            'bonus' => $bonus,
            'net_salary' => $net_salary
        ];
    }

    $result = calculateSalary($name, $garments);

    echo "<h1>PAY SLIP</h1>";
    echo "Employee Name: " . $result['name'] . "<br>";
    echo "Number of Garments: " . $result['garments'] . "<br>";
    echo "Gross Salary: S/ " . $result['gross_salary'] . "<br>";
    echo "Tax Discount: S/ " . $result['tax_discount'] . "<br>";
    echo "Insurance Discount: S/ " . $result['insurance_discount'] . "<br>";
    echo "Solidarity Discount: S/ " . $result['solidarity_discount'] . "<br>";
    echo "Bonus: S/ " . $result['bonus'] . "<br>";
    echo "Net Salary: S/ " . $result['net_salary'] . "<br>";
}
?>
