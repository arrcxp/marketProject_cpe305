<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="../css/[-1]-cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body id='background'>
    <section class='container d-flex flex-column justify-content-center'>
        <table>
            <tr id='tr-head'>
                <th>Quantity</th>
                <th>Product Name</th>
                <th>Price</th>
            </tr>

            <?php
            $servername = "ARRCXP\\SQLEXPRESS";
            $connectionInfo = array("Database" => "market-project-db", "UID" => "", "PWD" => "");

            $conn = sqlsrv_connect($servername, $connectionInfo); //connect to sql

            if ($conn === false) {
                echo "Connection to DB failed<br>";
                die(print_r(sqlsrv_errors(), true));
            }

            if (isset($_POST['add-to-cart'])) {
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];

                $sql_insert = "INSERT INTO shopping_cart (product_name, price) VALUES (?, ?)";
                $params = array($product_name, $product_price);
                $insert_result = sqlsrv_query($conn, $sql_insert, $params);

                if ($insert_result === false) {
                    die(print_r(sqlsrv_errors(), true));
                }

                $sql_select = "SELECT * FROM shopping_cart";
                $result = sqlsrv_query($conn, $sql_select);

                $sql_pricett = "SELECT SUM(price) AS 'price_total' FROM shopping_cart";
                $result_price = sqlsrv_query($conn, $sql_pricett);

                if ($result === false || $result_price === false) {
                    die(print_r(sqlsrv_errors(), true));

                } else {
                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                        echo "<tr>
                                <td>x1</td>
                                <td>" . $row['product_name'] . "</td>
                                <td>฿ " . $row['price'] . "</td>
                            </tr>";
                    }

                    while ($row = sqlsrv_fetch_array($result_price, SQLSRV_FETCH_ASSOC)) {
                        echo "<tr>
                                <td colspan='2'>Price Total</td>
                                <td>฿ " . $row['price_total'] . "</td>
                            </tr>";
                    }
                    echo "</table>";
                }
            }
            ?>
        </table>
        <span class='d-flex justify-content-between'>
            <div class="back">
                <a href="../[17]-fresh-ingredients.html">Back to Shopping</a>
            </div>
            
            <div class="clearCart">
                <form method="POST" action="[-2]-clear-cart.php">
                    <input type="submit" name="clearCart" value="Clear Cart">
                </form>
            </div>
        </span>
    </section>
</body>
</html>