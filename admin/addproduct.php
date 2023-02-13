<?php
    require_once "../config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
    if(isset($_POST['add'])){
        $addpro="INSERT INTO `product`(`id`, `product-name`, `price`, `Sale_price`, `image`, `id_category`, `Number_sold_out`) VALUES (NULL,'".$_POST['name']."',".$_POST['price'].",".$_POST['Sale_price'].",'uploads/".$_FILES['image']['name']."',".$_POST['category'].", 0)";
        $result_addpro = mysqli_query($conn, $addpro);
        header('location: product.php');
    }
?>
<div id="main-wrapper">
    <div class="content-heading text-center" style="margin-right: 57%;">
        <button  style="margin: 30px" class="btn btn-default" onclick="window.location='product.php'">Quay lại </button>
    </div>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form class="form-horizontal" id="form_addcouse" method="post" enctype="multipart/form-data" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá gốc(đơn vị: 1.000NVĐ)</label>
                                    <input type="number" class="form-control" name="price" required>
                                </div>
                                <div class="form-group">
                                    <label for="Sale_price">Giá bán(đơn vị: 1.000NVĐ)</label>
                                    <input type="number" class="form-control" name="Sale_price" required>
                                </div>
                                <div class="form-group">
                                    <label >Hình ảnh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" multiple required>
                                            <label class="custom-file-label"><?= isset($_FILES['image']) ? $_FILES['image']['name']: 'Chọn ảnh';?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <label for="category">Loại đồng hồ</label>
                                    <select class="form-control" name="category">
                                        <?php 
                                            $pc = "SELECT * FROM category";
                                            $result_pc = mysqli_query($conn, $pc);
                                            while ($rowpc = mysqli_fetch_assoc($result_pc)) {
                                                echo "<option value=".$rowpc['id_category'].">".$rowpc['name']."</option>";
                                            }
                                        ?>
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