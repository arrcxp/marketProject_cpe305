<?php

$servername = "ARRCXP\SQLEXPRESS";
$connectionInfo = array("Database" => "market-project-db", "UID" => "", "PWD" => "");

$conn = sqlsrv_connect($servername, $connectionInfo); //connect to sql

// Check connection
if($conn){

    if(isset($_POST['btn-confirm-delete-profile'])){
        $password = $_POST['password'];
        $sql = "delete from USERINFORMATION where password = ".$password;
        
        $result = sqlsrv_query($conn, $sql);

        if($result === false){
            die(print_r(sqlsrv_errors(), true));
        
        }  else {
            header('Location: [6]-profile.php');
            exit();
        }

        }
    }

?>