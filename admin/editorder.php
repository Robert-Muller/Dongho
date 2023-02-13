<?php
    require_once "../config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
    $sql = "SELECT * FROM orders WHERE id=".$_GET['id'];
    $result= mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['edit'])){
        $editorder="UPDATE `orders` SET `firstname`='".$_POST['first_name']."',`lastname`='".$_POST['last_name']."',`phone_number`='".$_POST['phone']."',`email`='".$_POST['email']."',`address`='".$_POST['address']."',`payment_method`='".$_POST['payment_method']."' WHERE id=".$_GET['id'];
        $result_order = mysqli_query($conn, $editorder);
        header('location: order.php');
    }
?>
<div id="main-wrapper">
    <div class="content-heading text-center" style="margin-right: 57%;">
        <button  style="margin: 30px" class="btn btn-default" onclick="window.location='order.php'">Quay lại </button>
    </div>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form class="form-horizontal" id="form_addcouse" method="post" enctype="multipart/form-data" action="">
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="name">Họ Khách Hàng</label>
                                    <input type="text" class="form-control" name="first_name" value="<?= $row['firstname'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên Khách Hàng</label>
                                    <input type="text" class="form-control" name="last_name" value="<?= $row['lastname'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">SĐT</label>
                                    <input type="tel" class="form-control" name="phone" value="<?= $row['phone_number'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" value="<?= $row['address'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="payment_method">Phương thức thanh toán</label>
                                    <select class="form-control" name="payment_method">
                                        <option value="bacs" <?= $row['payment_method']=='bacs' ? 'selected':'' ?>>Chuyển khoản ngân hàng</option>
                                        <option value="cod" <?= $row['payment_method']=='cod' ? 'selected':'' ?>>Trả tiền mặt khi nhận hàng</option>
                                    </select>
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