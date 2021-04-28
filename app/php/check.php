<?php
    require "db.php";

    if (checkIfEmailExists($_POST['email']))
            echo 1;

        else
            echo 0;
?>