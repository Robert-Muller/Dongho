<?php
    require_once "config/config.php";
    session_start();
        if(isset($_GET['quantity'])){
            foreach($_GET['quantity'] as $id => $quantity){
                if(!isset($_SESSION['cart'][$id])){
                    $_SESSION['cart'][$id]= $quantity;
                } else {
                    $_SESSION['cart'][$id] += $quantity;
                }
            }
        } else {
            $a = array(
                $_GET['id'] => '1'
            );
            foreach($a as $id => $quantity){
                if(!isset($_SESSION['cart'][$id])){
                    $_SESSION['cart'][$id]= $quantity;
                } else {
                    $_SESSION['cart'][$id] += $quantity;
                }
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
?>