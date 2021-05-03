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
            $_SESSION['user_id'] = $row['account_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['type'] = $row['type'];
        }

        return true;
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

function addToBasket($type) {
    session_start();
    $conn = initConn();

    if (!$conn) {
        die("Connection failed...").mysqli_connect_error();
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $sql = "SELECT * FROM product WHERE type = '{$type}'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // TODO: Fix duplicate bug
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (!isset($_SESSION['cart'][$row['product_id']]))
                array_push($_SESSION['cart'], array(
                    'product_id' => $row['product_id'],
                    'name' => $row['name'],
                    'cost_per_litre' => $row['cost_per_litre'],
                    'quantity' => 1
                ));

            else
                $_SESSION['cart'][$row['product_id']]['quantity'] += 1;
            return true;
        }
    }
}
?>