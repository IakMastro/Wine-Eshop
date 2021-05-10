<?php
    require "db.php";

    function addOrderDetail($product_id, $litre, $cost) {
        session_start();
        $conn = initConn();

        if (!$conn) {
            die("Connection failed...").mysqli_connect_error();
        }

        $query = "INSERT INTO order_details VALUES ('{$_SESSION['order_id']}',
                    '{$product_id}', '{$litre}', '{$cost}')";
        $result = mysqli_query($conn, $query) or die("Could not perform action");
    }


    addOrderDetail($_POST['product_id'], $_POST['litre'], $_POST['cost']);
?>