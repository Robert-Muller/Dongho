<?php
    require_once "config/config.php";
    session_start();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    if(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'delete':
                if(isset($_GET['id'])){
                    unset($_SESSION['cart'][$_GET['id']]);
                }
                break;
        }
    }
    foreach($_GET['quantity'] as $id => $quantity){
        $_SESSION['cart'][$id]= $quantity;
        }
    header("location:cart.php");
?>