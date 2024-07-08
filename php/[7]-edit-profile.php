<?php

$servername = "ARRCXP\SQLEXPRESS";
$connectionInfo = array("Database" => "market-project-db", "UID" => "", "PWD" => "");

$conn = sqlsrv_connect($servername, $connectionInfo); //connect to sql

// Check connection
if($conn){

    if(isset($_POST['btn-confirm-edit-profile'])){
        $fname    = $_POST['FirstName'];
        $lname    = $_POST['LastName'];
        $email    = $_POST['Email'];
        $password = $_POST['Password']; // <------------------
        $tel      = $_POST['PhoneNumber'];

        $sql_fname = "update USERINFORMATION set FNAME    = '" .$fname.      "'  where password = ".$password;
        $sql_lname = "update USERINFORMATION set LNAME    = '" .$lname.      "'  where password = ".$password;
        $sql_email = "update USERINFORMATION set EMAIL    = '" .$email.      "'  where password = ".$password;
        $sql_passw = "update USERINFORMATION set PASSWORD = '" .$password.   "'  where password = ".$password;
        $sql_telep = "update USERINFORMATION set TEL      = "  .$tel.        "   where password = ".$password;

        $result1 = sqlsrv_query($conn, $sql_fname);
        $result2 = sqlsrv_query($conn, $sql_lname);
        $result3 = sqlsrv_query($conn, $sql_email);
        $result4 = sqlsrv_query($conn, $sql_passw);
        $result5 = sqlsrv_query($conn, $sql_telep);

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
        
            }  else {
                header('Location: [6]-profile.php');
                exit();
            }

    }

} else {
    echo 'Cannanot Connect';
}

?>    
