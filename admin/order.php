<?php
    require_once "../config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
?>

<div class="content-heading text-center" style="margin-right: 57%;">
    <button  style="margin:30px;" class="btn btn-default" onclick="window.location='addorder.php'" id="them_loai">Thêm</button>

</div>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản lý đơn hàng</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Tên khách hàng</th>
                                    <th>SĐT</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Ghi chú</th>
                                    <th style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sqlorder = "SELECT * FROM orders";
                                $result_o= mysqli_query($conn, $sqlorder);
                                while($rowo = mysqli_fetch_assoc($result_o)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $rowo['firstname']." ".$rowo['lastname'];?></td>
                                        <td><?php echo $rowo['phone_number'];?></td>
                                        <td><?php echo $rowo['email'];?></td>
                                        <td><?php echo $rowo['address'];?></td>
                                        <td><?php echo $rowo['payment_method'] == 'cod' ? 'Trả tiền mặt khi nhận hàng':'Chuyển khoản ngân hàng';?></td></td>
                                        <td><?php echo $rowo['note'];?></td>
                                        <td>
                                            <button type="submit" id="sua_loai" class="btn btn-info" onclick="window.location='editorder.php?id=<?php echo $rowo['id']?>'">Sửa</button>
                                            <button type="submit" class="btn btn-danger" onclick="window.location='deleteorder.php?id=<?php echo $rowo['id']?>'">Xóa</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>