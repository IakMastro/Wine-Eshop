<?php
    require "db.php";

    function checkIfEmailExists($email) {
        $conn = initConn();

        if (!$conn) {
            die("Connection failed...".mysqli_connect_error());
        }

        $sql = "SELECT email FROM account WHERE email = '{$email}'";
        $result  = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (mysqli_num_rows($result) > 0)
            return true;
    }

    if (checkIfEmailExists($_POST['email']))
        echo 1;

    else
        echo 0;
?>