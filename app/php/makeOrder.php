<?php
    require "db.php";

    function addOrder($final_cost, $payment) {
        session_start();
        $conn = initConn();

        if (!$conn) {
            die("Connection failed...").mysqli_connect_error();
        }

        $query = "INSERT INTO orders (account_id, final_cost, payment, approved)
                        VALUES ('{$_SESSION['account_id']}', '{$final_cost}', '{$payment}', FALSE)";
        $result = mysqli_query($conn, $query) or die("Could not perform query");

        $sql = "SELECT order_id FROM orders WHERE account_id = '{$_SESSION['account_id']}'
                    AND final_cost = '{$final_cost}' AND payment = '{$payment}' AND NOT approved";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['order_id'] = $row['order_id'];
        }
    }

    addOrder($_POST['final_cost'], $_POST['payment']);
?>