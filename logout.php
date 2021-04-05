<?php
    session_start();
    unset($_SESSION["nama"]);
    unset($_SESSION["password"]);
    unset($_SESSION["email"]);
    session_destroy();
    header("Location: index.php");