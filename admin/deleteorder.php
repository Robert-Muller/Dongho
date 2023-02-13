<?php
    require_once "../config/config.php";
    if(isset($_GET['id'])){
        $sql = "DELETE FROM orders WHERE id=".$_GET['id'];
        $result = mysqli_query($conn, $sql);
        header('location:order.php');
    }
?>