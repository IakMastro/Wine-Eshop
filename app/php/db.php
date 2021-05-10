<?php
function initConn() {
    $serverName = "localhost";
    $username = "eshopuser";
    $password = "eshopuserpasswd";
    $dbname = "eshop";

    return new mysqli($serverName, $username, $password, $dbname);
}
?>