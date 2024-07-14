<?php

require 'database.php';



if( $_SERVER['REQUEST_METHOD'] === POST ){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_query_for_table_name = 'SELECT * FROM users WHERE nombre = ?';
    $status = $connection -> prepare( $sql_inquery_table_name );
    $status -> execute();
    $result = $status -> get_result();

    if( $result -> num_rows > 0 ){
        $user = $result -> fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['userId'] = $user['id'];
            header("Location: home.php");
            exit();          
        } else{
            echo "Password wrong";
        }
    } else {
        echo "User has not been found";
    }

}





?>