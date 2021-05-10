<?php
    require "db.php";

    function addAccount($email, $username, $password) {
        $conn = initConn();

        if (!$conn) {
            die("Connection failed...").mysqli_connect_error();
        }

        $password_encrypted = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO account (email, username, password, type)
                        VALUES ('{$email}', '{$username}', '{$password_encrypted}', 'user')";
        $result = mysqli_query($conn, $query) or die("Could not perform query");
    }

    addAccount($_POST['email'], $_POST['username'], $_POST['password']);
?>