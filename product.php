<?php
	include "header.php";
?>
<?php
	$current_page = !empty($_GET['page'])? $_GET['page']:1;
	$offset = ($current_page-1)*8;
	if(isset($_GET['category'])){
		if($_GET['category']==1){
			echo "
			<script>
				window.onload = function() {
				document.getElementById('menu-item-916').className = 'current-menu-item active';
				};
			</script>";
		} else if($_GET['category']==2){
			echo "
			<script>
				window.onload = function() {
				document.getElementById('menu-item-917').className = 'current-menu-item active';
				};
			</script>";
		}
		$product="SELECT * FROM product WHERE `id_category`=".$_GET["category"]." LIMIT 8 OFFSET ".$offset;
		$propage="SELECT * FROM product WHERE `id_category`=".$_GET["category"];
	} else if(isset($_GET["s"])){
		$product="SELECT * FROM product WHERE `product-name` LIKE '%".$_GET['s']."%' LIMIT 8 OFFSET ".$offset;
		$propage="SELECT * FROM product WHERE `product-name` LIKE '%".$_GET['s']."%'";
	}
	else {
		$product="SELECT * FROM product LIMIT 8 OFFSET ".$offset;
		$propage="SELECT * FROM product";
	}
?>
<div class="shop-page-title category-page-title page-title ">

	<div class="page-title-inner flex-row  medium-flex-wrap container">
	  <div class="flex-col flex-grow medium-text-center">
	  	 	 <div class="is-large">
	<nav class="woocommerce-breadcrumb breadcrumbs"><a href="index.php">Trang chủ</a> <span class="divider">&#47;</span> Sản phẩm</nav></div>
<div class="category-filtering category-filter-row show-for-medium">
	<a href="#" data-open="#shop-sidebar" data-visible-after="true" data-pos="left" class="filter-button uppercase plain">
	</a>
	<div class="inline-block">
			</div>
</div>
	  </div><!-- .flex-left -->
	</div><!-- flex-row -->
</div><!-- .page-title -->

<main id="main" class="">
<div class="row category-page-row">

		<div class="col large-3 hide-for-medium ">
			<div id="shop-sidebar" class="sidebar-inner col-inner">
				<aside id="nav_menu-2" class="widget widget_nav_menu"><span class="widget-title shop-sidebar">Danh mục sản phẩm</span>
				<div class="menu-danh-muc-san-pham-vertical-menu-container">
					<ul id="menu-danh-muc-san-pham-vertical-menu" class="menu">
						<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-33"><a href='product.php'>Tất cả</a></li>
						<?php 
							$loaisp = mysqli_query($conn, "SELECT * FROM category");
							while($sp = mysqli_fetch_assoc($loaisp)){
						?>
						<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-33"><a href='product.php?category=<?= $sp['id_category']?>'>Đồng hồ <?= $sp['name']?></a></li>
						<?php
							}
						?>
					</ul>
				</div>
				</aside>
		</div><!-- .sidebar-inner -->
		</div><!-- #shop-sidebar -->
		<div class="col large-9">
		<div class="shop-container">
			<div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-shadow row-box-shadow-1 row-box-shadow-2-hover">
			<?php
					$result_product = mysqli_query($conn, $product);
					$totalpro= mysqli_query($conn, $propage);
					$totalpro = $totalpro->num_rows;
					$totalpage = ceil($totalpro/8);
					if(mysqli_num_rows($result_product) >0){
						while ($row_product = mysqli_fetch_assoc($result_product)) {
			?>
				<div class="product-small col has-hover post-748 product type-product status-publish has-post-thumbnail product_cat-best-seller product_cat-dong-ho-nam first instock shipping-taxable purchasable product-type-simple">
					<div class="col-inner">		
						<div class="badge-container absolute left top z-1">
							<div class="callout badge badge-circle">
								<div class="badge-inner secondary on-sale">
									<span class="onsale">-<?php echo 100-round($row_product["Sale_price"]/$row_product["price"]*100); ?>%</span>
								</div>
							</div>
						</div>
						<div class="product-small box has-hover box-normal box-text-bottom">
							<div class="box-image" >
								<div>
									<a href="detail.php?id=<?php echo $row_product["id"]; ?>">
									<img width="300" height="300" src="<?php echo $row_product["image"] ?>" class="attachment-original size-original" alt="">
									</a>
								</div>
							</div><!-- box-image -->
					
							<div class="box-text text-center" >
								<div class="title-wrapper"><p class="name product-title">
									<a href="detail.php?id=<?php echo $row_product["id"]; ?>"><?php echo $row_product["product-name"] ?></a>
								</p>
							</div>
							<div class="price-wrapper">
						<span class="price"><del><span class="woocommerce-Price-amount amount"><?php echo number_format($row_product["price"],3,".",".") ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount"><?php echo number_format($row_product["Sale_price"],3,".",".") ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
						</div>
					
						<div class="add-to-cart-button">
							<a href="addcart.php?id=<?php echo $row_product['id'] ?>" rel="nofollow" onclick="alertcart()" class="ajax_add_to_cart add_to_cart_button product_type_simple button primary is-flat mb-0 is-small">Thêm vào giỏ</a></div>							
						</div><!-- box-text -->
											</div><!-- box -->
											</div><!--.col-inner -->
			</div><!-- col -->
			<?php
						}}
			?>
			<div class="pagination">
                        <ul>
							<?php
							for($num =1; $num <= $totalpage;$num++){
								if(isset($_GET['category'])){
									if($num != $current_page){
							?>
								<li><a href="?category=<?= $_GET['category'] ?>&page=<?= $num ?>"><?=$num?></a></li>
							<?php
									} else{
										echo "<li class='currentpag'><strong class='currentpag'>".$num."</strong></li>";
									}
								} else if(isset($_GET['s'])){
									if($num != $current_page){
							?>
								<li><a href="?s=<?=$_GET['s']?>&page=<?=$num?>"><?=$num?></a></li>
							<?php
									} else{
										echo "<li class='currentpag'><strong class='currentpag'>".$num."</strong></li>";
									}
								} else{
									if($num != $current_page){
							?>
								<li id="pag<?=$num?>"><a href="?page=<?=$num?>"><?=$num?></a></li>
							<?php
									} else{
										echo "<li class='currentpag'><strong class='currentpag'>".$num."</strong></li>";
									}
								}
							}
							?>
                        </ul>
                </div>
		</div><!-- row -->
		</div><!-- shop container -->
		</div>
</div>

</main><!-- #main -->
<?php
	include "footer.php";
?>