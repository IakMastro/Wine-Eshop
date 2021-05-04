<?php
    session_start();
    unset($_SESSION['order_id']);
    unset($_SESSION['cart']);
    header('Location: ../index.php'); # TODO: Go to user orders instead
?>