<?php
$servername = "ARRCXP\\SQLEXPRESS";
$connectionInfo = array("Database" => "market-project-db", "UID" => "", "PWD" => "");

$conn = sqlsrv_connect($servername, $connectionInfo); //connect to sql

if ($conn === false) {
    echo "Connection to DB failed<br>";
    die(print_r(sqlsrv_errors(), true));
}

if (isset($_POST['clearCart'])) {

    $sql = "DELETE FROM SHOPPING_CART";
    $result = sqlsrv_query($conn, $sql);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));

    } else {
        header('Location: [-1]-cart.php');
        exit();
    }
    
}
?>
