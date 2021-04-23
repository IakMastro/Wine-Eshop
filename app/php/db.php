<?php
function initConn() {
    $serverName = "localhost";
    $userName = "eshopuser";
    $password = "eshopuserpasswd";
    $dbname = "eshop";

    return new mysqli($serverName, $userName, $password, $dbname);
}

function getAccount($email, $pwd) {
    $conn = initConn();

    if (!$conn) {
        die("Connection failed...".mysqli_connect_error());
    }

    $sql = "SELECT username, type FROM account
    WHERE email = '{$email}' AND password = '{$pwd}'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['type'] = $row['type'];
            return true;
        }
    }
}
?>