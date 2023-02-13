<?php
    require_once "config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
    $current_page = !empty($_GET['page'])? $_GET['page']:1;
	$offset = ($current_page-1)*10;
    $totalproduct = mysqli_query($conn, "SELECT * FROM product, category WHERE product.id_category= category.id_category");
    $totalproduct = $totalproduct->num_rows;
    $totalpage = ceil($totalproduct/10);
?>

<div class="content-heading text-center" style="margin-right: 57%;">
    <button  style="margin:30px;" class="btn btn-default" onclick="window.location='addproduct.php'" id="them_loai">Thêm</button>

</div>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản lý sản phẩm</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá gốc</th>
                                    <th>Giá khuyến mại</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Số lượng đã bán</th>
                                    <th style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sqlproduct = "SELECT * FROM product, category WHERE product.id_category= category.id_category LIMIT 10 OFFSET ".$offset;
                                $result_p= mysqli_query($conn, $sqlproduct);
                                while($rowp = mysqli_fetch_assoc($result_p)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $rowp['product-name'];?></td>
                                        <td><?php echo number_format($rowp['price'],3,".",".");?></td>
                                        <td><?php echo number_format($rowp['Sale_price'],3,".",".");?></td>
                                        <td><img src="../<?php echo $rowp['image'];?>" width=100px></td>
                                        <td><?php echo $rowp['name'];?></td>
                                        <td><?php echo $rowp['Number_sold_out'];?></td>
                                        <td>
                                            <button type="submit" id="sua_loai" class="btn btn-info" onclick="window.location='editproduct.php?id=<?php echo $rowp['id']?>'">Sửa</button>
                                            <button type="submit" class="btn btn-danger" onclick="window.location='deleteproduct.php?id=<?php echo $rowp['id']?>'">Xóa</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="pagination">
                            <ul>
                            <?php
                            for($num =1; $num <= $totalpage;$num++){
                                if($num != $current_page){
                                    echo "<li><a href='?page=".$num."'>".$num."</a></li>";
                                } else{
                                    echo "<li class='currentpag'><strong class='currentpag'>".$num."</strong></li>";
                                }
                            }
                            ?>
                            </ul>
                            </div>
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