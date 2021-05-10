<?php
    require "db.php";

    function addToBasket($type) {
        session_start();
        $conn = initConn();

        if (!$conn) {
            die("Connection failed...").mysqli_connect_error();
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $sql = "SELECT * FROM product WHERE type = '{$type}'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        // TODO: Fix duplicate bug
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if (!isset($_SESSION['cart'][$row['product_id']]))
                array_push($_SESSION['cart'], array(
                    'product_id' => $row['product_id'],
                    'name' => $row['name'],
                    'cost_per_litre' => $row['cost_per_litre'],
                    'quantity' => 1
                ));

            else
                $_SESSION['cart'][$row['product_id']]['quantity'] += 1;
            return true;
        }
    }

    if (addToBasket($_POST['productType'])) {
        echo 1;
    } else {
        echo 0;
    }
?>