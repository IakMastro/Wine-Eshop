<?php
    require_once "db.php";
    if (getAccount($_POST['email'], $_POST['pwd'])) {
        echo 1;
    } else {
        echo 0;
    }
?>
