<?php
    require_once "../config/config.php";
    if(isset($_GET['id'])){
        $sql = "DELETE FROM product WHERE id=".$_GET['id'];
        $result = mysqli_query($conn, $sql);
        header('location:product.php');
    }
?>