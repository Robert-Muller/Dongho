<?php
    require_once "../config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
    if(isset($_POST['add'])){
        $addcate="INSERT INTO `category`(`id_category`, `name`) VALUES (NULL,'".$_POST['name']."')";
        $result_addcate = mysqli_query($conn, $addcate);
        header('location: category.php');
    }
?>
<div id="main-wrapper">
    <div class="content-heading text-center" style="margin-right: 57%;">
        <button  style="margin: 30px" class="btn btn-default" onclick="window.location='category.php'">Quay lại </button>
    </div>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form class="form-horizontal" id="form_addcouse" method="post" enctype="multipart/form-data" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Loại đồng hồ</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="card-footer d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-default" name="add">Thêm mới</button>
                                </div>
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