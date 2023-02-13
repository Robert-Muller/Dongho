<?php
    require_once "../config/config.php";
    if(isset($_GET['id'])){
        $sql = "DELETE FROM category WHERE id_category=".$_GET['id'];
        $result = mysqli_query($conn, $sql);
        header('location:category.php');
    }
?>