<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "cashier";
$port = 3306;

$connection = new mysqli(
    $server,
    $username,
    $password,
    $database,
    $port
);

if($connection -> connect_error) {
    echo ("Bad connection");
} else {
    echo ("Connection successfully");
};


?>