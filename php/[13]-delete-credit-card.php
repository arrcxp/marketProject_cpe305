<?php

$servername = "ARRCXP\SQLEXPRESS";
$connectionInfo = array("Database" => "market-project-db", "UID" => "", "PWD" => "");

$conn = sqlsrv_connect($servername, $connectionInfo); //connect to sql

$cvv = $_POST['cvv'];

// Check connection
if($conn){

    if(isset($_POST['confirm-delete-credit-card'])){

        $sql = "delete from CREDIT_CARD where CVV = ".$cvv;
        
        $result = sqlsrv_query($conn, $sql);

        if($result === false){
            die(print_r(sqlsrv_errors(), true));
        
        }  else {
            header('Location: [10]-show-credit-card.php');
            exit();
        }

        }
    }

?>