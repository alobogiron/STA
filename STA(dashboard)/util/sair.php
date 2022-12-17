<?php
    session_start();
    unset($_SESSION["proflogado"]);
    header("location: ../index.php");
?>