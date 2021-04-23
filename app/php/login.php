<?php
    require_once "db.php";
    if (getAccount($_GET['email'], $_GET['pwd'])) {
        echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
    } else {
        echo '<meta http-equiv="refresh" content="0;URL=../account.php" />';
    }
?>
