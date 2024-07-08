<?php

$servername = "ARRCXP\SQLEXPRESS";
$connectionInfo = array("Database" => "market-project-db", "UID" => "", "PWD" => "");

$conn = sqlsrv_connect($servername, $connectionInfo); //connect to sql

$card_number = $_POST['card-number'];
$exp_date    = $_POST['exp-date'];
$cvv         = $_POST['cvv'];
$owner_name  = $_POST['owner-name'];
$address     = $_POST['address'];
$post_code   = $_POST['post-code'];

// Check connection
if ($conn) {
    print "Connection successful<br>";

    if (isset($_POST['confirm-add-credit-card'])) {
        $sql = "INSERT INTO CREDIT_CARD (CARD_NUMBER, EXP_DATE, CVV, OWNER_NAME, ADDRESS, POSTCODE) VALUES (?, ?, ?, ?, ?, ?)";

        $params = array($card_number, $exp_date, $cvv, $owner_name, $address, $post_code);
        
        $result = sqlsrv_query($conn, $sql, $params);

        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            header('Location: [10]-show-credit-card.php');
            exit();
        }
    }

} else {
    echo "Connection to DB failed<br>";
    die(print_r(sqlsrv_errors(), true));
}

?>
