<?php
    require_once "config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
    $sql = "SELECT * FROM user WHERE id_user=".$_GET['id'];
    $result= mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['edit'])){
        $edituser="UPDATE `user` SET `firstname`='".$_POST['first_name']."',`lastname`='".$_POST['last_name']."',`password`='".$_POST['password']."',`phone`='".$_POST['phone']."',`email`='".$_POST['email']."' WHERE id_user=".$_GET['id'];
        $result_user = mysqli_query($conn, $edituser);
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
                                    <input type="text" class="form-control" name="first_name" value="<?= $row['firstname'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên</label>
                                    <input type="text" class="form-control" name="last_name" value="<?= $row['lastname'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" value="<?= $row['password'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">SĐT</label>
                                    <input type="tel" class="form-control" name="phone" value="<?= $row['phone'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>" required>
                                </div>
                                <div class="card-footer d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-default" name="edit">Sửa</button>
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