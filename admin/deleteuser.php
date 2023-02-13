<?php
    require_once "../config/config.php";
    if(isset($_GET['id'])){
        $sql = "DELETE FROM user WHERE id_user=".$_GET['id'];
        $result = mysqli_query($conn, $sql);
        header('location:user.php');
    }
?>