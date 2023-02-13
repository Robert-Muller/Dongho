<?php
    require_once "../config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
    if(isset($_POST['add'])){
        $addorder="INSERT INTO `orders`(`id`, `firstname`, `lastname`, `phone_number`, `email`, `address`, `payment_method`) VALUES (NULL,'".$_POST['first_name']."' ,'".$_POST['last_name']."',".$_POST['phone'].",'".$_POST['email']."','".$_POST['address']."', '".$_POST['payment_method']."')";
        $result_order = mysqli_query($conn, $addorder);
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
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên Khách Hàng</label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">SĐT</label>
                                    <input type="tel" class="form-control" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="payment_method">Phương thức thanh toán</label>
                                    <select class="form-control" name="payment_method">
                                        <option value="bacs">Chuyển khoản ngân hàng</option>
                                        <option value="cod">Trả tiền mặt khi nhận hàng</option>
                                    </select>
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