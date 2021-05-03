<?php
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['type']);
    unset($_SESSION['cart']);
    header('Location: ../index.php');
?>