<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit-card Information</title>
    <link rel="stylesheet" href="../css/[10]-show-credit-card.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body id="background">
    <section>
        <header id="header" class="container-fluid py-4 px-5 d-flex justify-content-between align-items=center">
            <h1>FRESH & HEALTHY | Profile</h1>
            <span id="link-nav" class="mt-2">
                <a class="text-decoration-none h3" href="[-1]-cart.php">Shopping Cart</a>
                <a class="text-decoration-none h3 ms-3 me-3" href="#"> | </a>
                <a class="text-decoration-none h3" href="../[5]-information.html">Username</a>
            </span>
        </header>
        <table>
            <tr>
                <th>Card Number</th>
                <th>Expiration date</th>
                <th>Cvv</th>
                <th>Card Owner's Name</th>
                <th>Address</th>
                <th>Postcode</th>
            </tr>
            <?php
                $servername = "localhost";
                $connectionOptions = array("Database" => "market-project-db", "UID" => "", "PWD" => "");
                $conn = sqlsrv_connect($servername, $connectionOptions);

                if($conn) {
                    $sql = "SELECT * FROM CREDIT_CARD";
                    $result = sqlsrv_query($conn, $sql);

                    if($result === false) {
                        die(print_r(sqlsrv_errors(), true));
                    } else {
                        while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                            echo "<tr>
                                    <td>{$row['CARD_NUMBER']}</td>
                                    <td>{$row['EXP_DATE']}</td>
                                    <td>{$row['CVV']}</td>
                                    <td>{$row['OWNER_NAME']}</td>
                                    <td>{$row['ADDRESS']}</td>
                                    <td>{$row['POSTCODE']}</td>
                                </tr>";
                        }
                    }
                } else {
                    echo "Connection failed.";
                }
            ?>
        </table>
    </section>
    <footer class="d-flex justify-content-between fixed-bottom mx-5 my-5">
        <a href="../[9]-credit-card.html">Back</a>
        <span>
            <a href="../[12]-edit-credit-card.html">Edit Information</a>
            <span id="line-span"> | </span>
            <a href="../[13]-delete-credit-card.html">Delete Information</a>
        </span>
    </footer>
</body>
</html>
