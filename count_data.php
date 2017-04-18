<?php 
    include("config.php");
    session_start();

    $sql = "SELECT count(*) FROM product WHERE shop = 'friday'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>