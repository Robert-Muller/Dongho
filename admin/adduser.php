<?php
    require_once "../config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
    if(isset($_POST['add'])){
        $adduser="INSERT INTO `user`(`id_user`, `firstname`, `lastname`, `password`, `phone`, `email`) VALUES (NULL,'".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['password']."','".$_POST['phone']."','".$_POST['email']."')";
        $result_user = mysqli_query($conn, $adduser);
        header('location: user.php');
    }
?>
<div id="main-wrapper">
    <div class="content-heading text-center" style="margin-right: 57%;">
        <button  style="margin: 30px" class="btn btn-default" onclick="window.location='user.php'">Quay lại </button>
    </div>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form class="form-horizontal" id="form_addcouse" method="post" enctype="multipart/form-data" action="">
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="name">Họ</label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên</label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">SĐT</label>
                                    <input type="tel" class="form-control" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="card-footer d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-default" name="add">Thêm mới</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>