<?php

require '../auth/database.php';

if( $_SERVER ['REQUEST_METHOD']==='POST'){

    $amount = $_POST['amount'];
    $coin = $_POST['coin'];

    if($coin == 'pen'){
        //                                       opera. matematica
        $sql = "UPDATE accounts SET balance_pen = balance_pen - ?  WHERE id = 1";
    } else{
        $sql = "UPDATE accounts SET balance_usd = balance_usd - ?  WHERE id = 1";
    }

    $calc = $connection->prepare($sql);

    //Vinculamos la variable monto
    //bind_param 2 parametros 1. tipo de variable "s" string , para numeros "d" 2.variable
    //pasa como numero la variable monto
    $calc->bind_param("d", $amount);

    if($calc->execute()){
        echo "Withraw has been execute successfully";
    }else{
        echo "¡ERROR! Withraw hasn't been execute";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .sidebar {
            background-color: #2c3e50;
            min-height: 100vh;
        }
        .sidebar h1 {
            color: #ecf0f1;
            padding: 20px;
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
        }
        .nav-button:hover {
            background-color: #1abc9c;
        }
        .content {
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h1>System</h1>
                    <button id="deposit-button" class="nav-button">Deposit</button>
                    <button id="query-button" class="nav-button">Query</button>
                    <button id="withdraw-button" class="nav-button">Withdraw</button>
                    <button id="clue-button" class="nav-button">Clue</button>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 content">
                <h1>Module of Withraw</h1>
                <form action="withraw.php" method="POST" class="mt-4">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" name="amount" id="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="coin">Coin</label>
                        <select name="coin" id="coin" class="form-control">
                            <option value="pen">PEN</option>
                            <option value="usd">USD</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Make withdraw</button>
                </form>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
