<?php

require '../auth/database.php';

$sql="SELECT balance_pen, balance_usd 
        FROM accounts 
        WHERE  id = 1"; //se almacenan los registros
// muestra los registros       registros
$result = $connection->query($sql);

//si la variable resultado (cantidad de filas, si existen registros) es mayor a 0
if($result && $result -> num_rows > 0){
    //                     lista
    $account = $result->fetch_assoc();
}else{
    $account= null;
}

?>


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Consulta de Saldo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .sidebar {
            background-color: #2c3e50;
            min-height: 100vh;
            color: #ecf0f1;
            padding: 20px;
        }
        .sidebar h1 {
            color: #ecf0f1;
            padding-bottom: 20px;
        }
        .nav-button {
            color: #ecf0f1;
            background-color: #34495e;
            border: none;
            width: 100%;
            text-align: left;
            padding: 15px 30px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
        }
        .nav-button:hover {
            background-color: #1abc9c;
        }
        .contenido {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .right {
            background-color: #ecf0f1;
            padding: 20px;
            width: 100%;
        }
        .saldo {
            font-size: 1.5em;
            color: #27ae60;
        }
        .obtn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .obtn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <h1>System</h1>
                <button id="deposit-button" class="nav-button">Deposit</button>
                <button id="query-button" class="nav-button">Query</button>
                <button id="withdraw-button" class="nav-button">Withdraw</button>
                <button id="clue-button" class="nav-button">Clue</button>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="contenido">
                    <div class="right">
                        <h2>MODULE QUERY</h2>
                        <?php if ($account): ?>
                            <p class="balance">Balance pen: <?php echo $account['balance_pen']; ?></p>
                            <p>Balance usd:: <?php echo $account['balance_usd']; ?></p>
                        <?php else: ?>
                            <p>No se encontró la cuenta o no tiene saldo.</p>
                        <?php endif; ?>
                        <a href="./07/home.php" class="obtn">Back</a>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
