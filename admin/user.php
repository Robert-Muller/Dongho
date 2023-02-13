<?php
    require_once "../config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
?>

<div class="content-heading text-center" style="margin-right: 57%;">
    <button  style="margin:30px;" class="btn btn-default" onclick="window.location='adduser.php'" id="them_loai">Thêm</button>

</div>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản lý người dùng</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Họ</th>
                                    <th>Tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Mật khẩu</th>
                                    <th style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sqluser = "SELECT * FROM user";
                                $result_u= mysqli_query($conn, $sqluser);
                                while($rowu = mysqli_fetch_assoc($result_u)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $rowu['firstname'];?></td>
                                        <td><?php echo $rowu['lastname'];?></td>
                                        <td><?php echo $rowu['phone'];?></td>
                                        <td><?php echo $rowu['email'];?></td>
                                        <td><?php echo $rowu['password'];?></td>
                                        <td>
                                            <button type="submit" id="sua_loai" class="btn btn-info" onclick="window.location.href='edituser.php?id=<?php echo $rowu['id_user']?>'">Sửa</button>
                                            <button type="submit" class="btn btn-danger" onclick="window.location.href='deleteuser.php?id=<?php echo $rowu['id_user']?>'">Xóa</button>
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