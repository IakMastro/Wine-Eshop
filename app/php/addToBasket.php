<?php
    require "db.php";

    if (addToBasket($_POST['productType'])) {
        echo 1;
    } else {
        echo 0;
    }
?>