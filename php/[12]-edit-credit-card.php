<?php

$servername = "ARRCXP\SQLEXPRESS";
$connectionInfo = array("Database" => "market-project-db", "UID" => "", "PWD" => "");

$conn = sqlsrv_connect($servername, $connectionInfo); //connect to sql

$card_number = $_POST['card-number'];
$exp_date    = $_POST['exp-date'];
$cvv         = $_POST['cvv']; // <------------------
$owner_name  = $_POST['owner-name'];
$address     = $_POST['address'];
$post_code   = $_POST['post-code'];

// Check connection
if($conn){

    if(isset($_POST['confirm-edit-credit-card'])){

        $sql_card_number = "update credit_card set CARD_NUMBER = "  .$card_number.  "  where cvv = ".$cvv;
        $sql_exp_date    = "update credit_card set EXP_DATE    = "  .$exp_date.     "  where cvv = ".$cvv;
        $sql_cvv         = "update credit_card set CVV         = "  .$cvv.          "  where cvv = ".$cvv;
        $sql_own_name    = "update credit_card set OWNER_NAME  = '" .$owner_name.   "' where cvv = ".$cvv;
        $sql_addr        = "update credit_card set ADDRESS     = '" .$address.      "' where cvv = ".$cvv;
        $sql_post        = "update credit_card set POSTCODE    = "  .$post_code.    "  where cvv = ".$cvv;

        $result1 = sqlsrv_query($conn, $sql_card_number);
        $result2 = sqlsrv_query($conn, $sql_exp_date);
        $result3 = sqlsrv_query($conn, $sql_cvv);
        $result4 = sqlsrv_query($conn, $sql_own_name);
        $result5 = sqlsrv_query($conn, $sql_addr);
        $result6 = sqlsrv_query($conn, $sql_post);

            if($result1 === false){
                die(print_r(sqlsrv_errors(), true));
        
            } elseif($result2 === false){
                die(print_r(sqlsrv_errors(), true));
        
            } elseif($result3 === false){
                die(print_r(sqlsrv_errors(), true));
        
            } elseif($result4 === false){
                die(print_r(sqlsrv_errors(), true));
        
            } elseif($result5 === false){
                die(print_r(sqlsrv_errors(), true));
        
            } elseif($result6 === false){
                die(print_r(sqlsrv_errors(), true));
        
            }  else {
                header('Location: [10]-show-credit-card.php');
                exit();
            }

    }

} else {
    echo 'Cannanot Connect';
}

?>    
