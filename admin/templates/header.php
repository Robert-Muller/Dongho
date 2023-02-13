<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý Đồng hồ</title>
    <link href="public/dist/css/style.min.css" rel="stylesheet">
    <link href="public/dist/css/pag.css" rel="stylesheet">
    <script src="public/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="public/dist/js/sidebarmenu.js"></script>
</head>
<body>
<div id="main-wrapper">
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <a class="navbar-brand" href="#">
                <!-- Logo icon -->
                <b class="logo-icon p-l-10">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img width="40%" src="../image/logo.png" alt="homepage" class="light-logo" />
                    <span>Mona Watch</span>
                </b>
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-left mr-auto">
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                   <p class="user" style="color:white; font-size:18px; margin:10px 15px;"> Xin chào <?= $_SESSION['admin']['username']?></p>
                </li>
            </ul>
        </div>
    </nav>
</header>