<?php
$servername = "ARRCXP\\SQLEXPRESS";
$connectionInfo = array("Database" => "market-project-db", "UID" => "", "PWD" => "");

$conn = sqlsrv_connect($servername, $connectionInfo); //connect to sql

if ($conn === false) {
    echo "Connection to DB failed<br>";
    die(print_r(sqlsrv_errors(), true));
}

if (isset($_POST['Confirm-Register'])) {
    $Password = $_POST['Password'];
    $PhoneNumber = $_POST['PhoneNumber'];

    $sql = "SELECT TEL, PASSWORD FROM USERINFORMATION WHERE TEL = ? AND PASSWORD = ?";
    $params = array($PhoneNumber, $Password);
    
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $result = sqlsrv_execute($stmt);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_fetch($stmt)) {
        echo 'Login Success';
    } else {
        echo 'Login Failed';
    }
}
?>
