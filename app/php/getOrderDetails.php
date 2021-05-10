<?php
    require "db.php";

    function getOrderDetails($order_id) {
        session_start();

        $conn = initConn();

        if (!$conn) {
            die("Connection failed...").mysqli_connect_error();
        }

        $_SESSION['order_details'] = array();

        $sql = "SELECT order_details.order_id, product.product_id, product.name, litre, cost_per_litre, cost FROM orders
                                                INNER JOIN order_details ON order_details.order_id = '{$order_id}'
                                                AND orders.order_id = order_details.order_id
                                                INNER JOIN product ON product.product_id = order_details.product_id";

        $result = mysqli_query($conn, $sql) or die("Could not perform query");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($_SESSION['order_details'], array(
                    'order_id' => $row['order_id'],
                    'product_id' => $row['product_id'],
                    'name' => $row['name'],
                    'litre' => $row['litre'],
                    'cost_per_litre' => $row['cost_per_litre'],
                    'cost' => $row['cost']
                ));
            }
        } else {
            unset($_SESSION['order_details']);
        }
    }

    getOrderDetails($_GET['order_id']);
?>