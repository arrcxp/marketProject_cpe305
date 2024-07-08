<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommended Menu</title>

    <link rel="stylesheet" href="../css/[0]-search.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body id='background'>
    <header id="header" class="container-fluid py-4 px-5 d-flex justify-content-between align-items=center">
    <a href="../[4]-mainPage-unlock.html" class='text-decoration-none'><h1>FRESH & HEALTHY | HOME</h1></a>
        <span id="link-nav" class="mt-2">
            <a class="text-decoration-none h3" href="[-1]-cart.php">Shopping Cart</a>
            <a class="text-decoration-none h3 ms-3 me-3" href="#"> | </a>
            <a class="text-decoration-none h3" href="../[5]-information.html">Username</a>
        </span>
    </header>

    <section class='container vh-100 d-flex flex-column justify-content-center'>
        <article>
            <?php
            $servername = "ARRCXP\\SQLEXPRESS";
            $connectionInfo = array("Database" => "market-project-db", "UID" => "", "PWD" => "");

            $conn = sqlsrv_connect($servername, $connectionInfo); //connect to sql

            if($conn){
                                    
                // search menu
                if (isset($_POST['search'])) {
                    $search_text = $_POST['search-text'];
                    
                    $sql = "select * from Recommended_menu";
                    $result = sqlsrv_query($conn, $sql);

                    if($result === false){
                        die(print_r(sqlsrv_errors(), true));
                    
                    } else {
                        while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                            if($search_text === $row['name']){
                                print "<h2>".$row['name']."</h2>";
                                print "<h4>"."How to Cook"."</h4>"."<h3>"."<i>"." : ".$row['how_to']."</i>"."</h3>";
                                print "<h4>"."Component"."</h4>"."<h3>"."<i>"." : ".$row['ingredient']."</i>"."</h3>";
                            }
                        }
                    }
                } 
                
            } else {
                print "Errors";
            }
            ?>
        </article>
    </section>
</body>
</html>