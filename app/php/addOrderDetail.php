<?php
    require "db.php";

    addOrderDetail($_POST['product_id'], $_POST['litre'], $_POST['cost']);
?>