<?php
function initConn() {
    $serverName = "localhost";
    $username = "eshopuser";
    $password = "eshopuserpasswd";
    $dbname = "eshop";

    return new mysqli($serverName, $username, $password, $dbname);
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

function checkIfUsernameExists($username) {
    $conn = initConn();

    if (!$conn) {
        die("Connection failed...".mysqli_connect_error());
    }

    $sql = "SELECT username FROM account WHERE username = '{$username}'";
    $result  = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0)
        return true;
}

function addAccount($email, $username, $password) {
    $conn = initConn();

    if (!$conn) {
        die("Connection failed...").mysqli_connect_error();
    }

    $query = "INSERT INTO account (email, username, password, type)
                    VALUES ('{$email}', '{$username}', '{$password}', 'user')";
    $result = mysqli_query($conn, $query) or die("Could not perform query");
}
?>