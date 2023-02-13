<?php
session_start();
require_once "config/config.php";
if(isset($_POST['username']) && isset($_POST['password'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    $login = "SELECT * FROM  useradmin WHERE username= '$u' AND password= '$p'";
    $result_login= mysqli_query($conn, $login);
    $data = mysqli_fetch_assoc($result_login);
    if(mysqli_num_rows($result_login)>0){
        $_SESSION['admin'] = $data;
        echo "<script>
            window.location = 'category.php';
            </script>";
    } else {
        echo "<script>
        alert('Đăng nhập thất bại');
        </script>";
    }
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
</head>

<body>
<div class="main-wrapper">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
            <div id="loginform">
                <div class="text-center p-t-20 p-b-20">
                    <span class="db"><img width="80%" src="../image/logo.png" alt="logo" /></span>
                </div>
                <!-- Form -->
                <form class="form-horizontal m-t-20" id="loginform" action="" method="post">
                    <div class="row p-b-30">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                </div>
                                <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="p-t-20">
                                    <button class="btn btn-success float-right" name="login" type="submit" >Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>