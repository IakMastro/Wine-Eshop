<?php
    include 'db.php';

    function approveOrder($order_id) {
        $conn = initConn();

        if (!$conn) {
            die("Connection failed...").mysqli_connect_error();
        }

        $sql = "UPDATE orders SET approved = TRUE WHERE order_id = '{$order_id}'";
        $result = mysqli_query($conn, $sql) or die("Could not perform query");

        # This doesn't work
        // $result2 = mysqli_query($conn, "SELECT account_id FROM orders WHERE order_id = '{$order_id}'");

        // if (mysqli_num_rows($result2) > 0) {
        //     while ($row = mysqli_fetch_assoc($result2)) {
        //         $email_result = mysqli_query($conn, "SELECT email FROM account WHERE account_id = '{$row['account_id']}'");

        //         if (mysqli_num_rows($email_result) > 0) {
        //             while ($email_row = mysqli_fetch_assoc($email_result)) {
        //                 $email = $_POST['email'];
        //                 $subject = "H παραγγελεία σας εγκρίθηκε";
        //                 $message = "Diffez";

        //                 mail($email, $subject, $message);
        //             }
        //         }
        //     }
        // }
    }

    approveOrder($_GET['order_id']);
?>