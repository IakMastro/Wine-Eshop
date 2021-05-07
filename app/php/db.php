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

    $sql = "SELECT account_id, username, type FROM account
                WHERE email = '{$email}' AND password = '{$pwd}'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['account_id'] = $row['account_id'];
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

    if (mysqli_num_rows($result) > 0)
        while ($row = mysqli_fetch_assoc($result))
            $_SESSION['order_id'] = $row['order_id'];
}

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

function getOrders() {
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
}

function getUserOrders() {
    session_start();
    $conn = initConn();

    if (!$conn) {
        die("Connection failed...").mysqli_connect_error();
    }

    $_SESSION['orders'] = array();

    $sql = "SELECT * FROM orders WHERE account_id = '{$_SESSION['account_id']}'";
    $result = mysqli_query($conn, $sql) or die("Could not perform query");

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
}

function getOrderDetails($order_id) {
    session_start();

    $conn = initConn();

    if (!$conn) {
        die("Connection failed...").mysqli_connect_error();
    }

    $_SESSION['order_details'] = array();

    $sql = "SELECT order_details.order_id, product.product_id, product.name, litre, cost_per_litre, cost FROM orders
                                            INNER JOIN order_details ON order_details.order_id = '{$order_id}'
                                            AND orders.order_id = order_details.order_id
                                            INNER JOIN product ON product.product_id = order_details.product_id";

    $result = mysqli_query($conn, $sql) or die("Could not perform query");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($_SESSION['order_details'], array(
                'order_id' => $row['order_id'],
                'product_id' => $row['product_id'],
                'name' => $row['name'],
                'litre' => $row['litre'],
                'cost_per_litre' => $row['cost_per_litre'],
                'cost' => $row['cost']
            ));
        }
    } else {
        unset($_SESSION['order_details']);
    }
}

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
?>