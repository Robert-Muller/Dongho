<?php
    require_once "../config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
?>

<div class="content-heading text-center" style="margin-right: 57%;">
    <button  style="margin:30px;" class="btn btn-default" onclick="window.location='addcategory.php'" id="them_loai">Thêm</button>

</div>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Loại đồng hồ</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Category</th>
                                    <th style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sqlcategory = "SELECT * FROM category";
                                $result_c= mysqli_query($conn, $sqlcategory);
                                while($rowc = mysqli_fetch_assoc($result_c)) {
                                    ?>
                                    <tr>
                                        <td><a href="product.php?category_id=<?php echo $rowc['id']?>"><?php echo $rowc['name'];?></a></td>
                                        <td>
                                            <button type="submit" id="sua_loai" class="btn btn-info" onclick="window.location='editcategory.php?id=<?php echo $rowc['id_category']?>'">Sửa</button>
                                            <button type="submit" class="btn btn-danger" onclick="window.location='deletecategory.php?id=<?php echo $rowc['id_category']?>'">Xóa</button>
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