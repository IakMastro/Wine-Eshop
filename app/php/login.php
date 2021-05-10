<?php
    require "db.php";

    function getAccount($email, $pwd) {
        $conn = initConn();

        if (!$conn) {
            die("Connection failed...".mysqli_connect_error());
        }

        $sql = "SELECT account_id, username, type FROM account
                    WHERE email = '{$email}' AND password = '{$pwd}'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (mysqli_num_rows($result) > 0) {
            session_start();
            $row = mysqli_fetch_assoc($result);

            $_SESSION['account_id'] = $row['account_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['type'] = $row['type'];

            return true;
        }
    }

    if (getAccount($_POST['email'], $_POST['pwd'])) {
        echo 1;
    } else {
        echo 0;
    }
?>
