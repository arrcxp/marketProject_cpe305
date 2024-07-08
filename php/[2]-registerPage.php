<?php
$servername = "ARRCXP\\SQLEXPRESS";
$connectionInfo = array("Database" => "market-project-db", "UID" => "", "PWD" => "");

$conn = sqlsrv_connect($servername, $connectionInfo); //connect to sql

if ($conn === false) {
    echo "Connection to DB failed<br>";
    die(print_r(sqlsrv_errors(), true));
}

if (isset($_POST['Confirm-Register'])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $PhoneNumber = $_POST['PhoneNumber'];

    $sql = "INSERT INTO USERINFORMATION (FNAME, LNAME, EMAIL, PASSWORD, TEL) VALUES (?, ?, ?, ?, ?)";
    $params = array($FirstName, $LastName, $Email, $Password, $PhoneNumber);
    
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if (!$stmt) {
        die(print_r(sqlsrv_errors(), true));
    }

    $result = sqlsrv_execute($stmt);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header('Location: ../[3]-loginPage.html');
        exit();
    }
    
}
?>
