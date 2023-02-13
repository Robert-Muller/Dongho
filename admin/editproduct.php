<?php
    require_once "config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
    $sql = "SELECT * FROM product WHERE id=".$_GET['id'];
    $result= mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['edit'])){
        $editpro="UPDATE `product` SET `product-name`='".$_POST['name']."',`price`=".$_POST['price'].",`Sale_price`=".$_POST['Sale_price'].",`image`= 'uploads/".$_FILES['image']['name']."',`id_category`=".$_POST['category']." WHERE id=".$_GET['id'];
        $result_pro = mysqli_query($conn, $editpro);
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
                                    <input type="text" class="form-control" name="name" value="<?= $row['product-name']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá gốc(đơn vị: 1.000NVĐ)</label>
                                    <input type="number" class="form-control" name="price" value="<?= $row['price']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="Sale_price">Giá bán(đơn vị: 1.000NVĐ)</label>
                                    <input type="number" class="form-control" name="Sale_price" value="<?= $row['Sale_price']?>" required>
                                </div>
                                <div class="form-group">
                                    <label >Hình ảnh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" multiple required>
                                            <label class="custom-file-label"><?= $row['image'];?></label>
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
                                        ?>
                                            <option value="<?= $rowpc['id_category']?>" <?= $rowpc['id_category']==$row['id_category'] ? 'selected' : '' ?>><?= $rowpc['name'] ?></option>";
                                        <?php
                                            }
                                        ?>
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