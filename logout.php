<?php 
    session_start();
    $_SESSION['Login'] = 0;
    header("Location: login.php");
?>