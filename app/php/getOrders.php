<?php
    require "db.php";

    if ($_GET['admin'])
        session_start();
        $conn = initConn();

        if (!$conn) {
            die("Connection failed...").mysqli_connect_error();
        }

        $_SESSION['orders'] = array();

        $result = mysqli_query($conn, "SELECT * FROM orders") or die("Could not perform query");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['approved'])
                    $approved = 'Ναι';
                else
                    $approved = 'Όχι';

                array_push($_SESSION['orders'], array(
                    'order_id' => $row['order_id'],
                    'account_id' => $row['account_id'],
                    'final_cost' => $row['final_cost'],
                    'payment' => $row['payment'],
                    'approved' => $approved
                ));
            }
        } else {
            unset($_SESSION['orders']);
        }
?>