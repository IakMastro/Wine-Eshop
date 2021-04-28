<?php
    require "db.php";

    addAccount($_POST['email'], $_POST['username'], $_POST['password']);
?>