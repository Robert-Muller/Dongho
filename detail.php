<?php
	require_once "header.php";
	if(isset($_GET['id'])){
		$detail= "SELECT * FROM product WHERE id =".$_GET['id'];
		$result_detail = mysqli_query($conn, $detail);
		$row_detail = mysqli_fetch_assoc($result_detail);
	}
?>
<main id="main" class="">

	<div class="shop-container">
		<div class="product type-product status-publish has-post-thumbnail product_cat-best-seller product_cat-dong-ho-nam first instock shipping-taxable purchasable product-type-simple">
	<div class="product-container">
<div class="product-main">
<div class="row content-row mb-0">

	<div class="product-gallery large-6 col">
	
<div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">
    <div class="woocommerce-product-gallery__image slide first">
		<a href="<?php echo $row_detail["image"] ?>"><img style="width: 450px; height: 600px" src="<?php echo $row_detail["image"] ?>" class="wp-post-image skip-lazy" alt=""></a></div>

</div>
  	</div>

	<div class="product-info summary col-fit col entry-summary product-summary" style="margin-top:100px;">
		<h1 class="product-title product_title entry-title"><?php echo $row_detail["product-name"]; ?></h1>

	<div class="is-divider small"></div>
	<div class="price-wrapper">
	<p class="price product-page-price">
	<del><span class="woocommerce-Price-amount amount"><?php echo number_format($row_detail["price"],3,".",".") ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del><br><br> 
	<ins><span class="woocommerce-Price-amount amount"><?php echo number_format($row_detail["Sale_price"],3,".",".") ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></p>
</div><br><br><br>

	
	<form class="cart" action="addcart.php" method="get" enctype='multipart/form-data'>
		
			<div class="quantity buttons_added">
		<input type="hidden" value = "<?php echo $_GET['id'] ?>" name='id'>
		<input type="button" value="-" class="minus button is-form" onclick="subtract('quantity_detail')">		
		<label class="screen-reader-text" for="quantity_detail">Số lượng</label>
		<input
			type="number"
			id="quantity_detail"
			class="input-text qty text"
			step="1"
			min="1"
			max="9999"
			name="quantity[<?php echo $row_detail['id'] ?>]"
			value="1"
			title="SL"
			size="4"
			pattern="[0-9]*"
			inputmode="numeric">
		<input type="button" value="+" class="plus button is-form" onclick="add('quantity_detail')">	
	</div>
		<button type="submit" class="single_add_to_cart_button button alt" onclick="alertcart()">Thêm vào giỏ</button>
			</form>
</div><!-- .product-main -->

  <div class="related related-products-wrapper product-section">

    <h3 class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">
      Sản phẩm tương tự    </h3>
	
    <div class="row large-columns-5 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>

    <?php
		$similar= "SELECT * FROM product WHERE id_category =".$row_detail['id_category']." LIMIT 10";
		$result_similar = mysqli_query($conn, $similar);
		if(mysqli_num_rows($result_similar) > 0){
			while ($row_similar = mysqli_fetch_assoc($result_similar)) {
	?>

		<div class="product-small col has-hover post-748 product type-product status-publish has-post-thumbnail product_cat-best-seller product_cat-dong-ho-nam first instock shipping-taxable purchasable product-type-simple">
					<div class="col-inner">		
						<div class="badge-container absolute left top z-1">
							<div class="callout badge badge-circle">
								<div class="badge-inner secondary on-sale">
									<span class="onsale">-<?php echo 100-round($row_similar["Sale_price"]/$row_similar["price"]*100); ?>%</span>
								</div>
							</div>
						</div>
						<div class="product-small box has-hover box-normal box-text-bottom">
							<div class="box-image" >
								<div>
									<a href="detail.php?id=<?php echo $row_similar["id"]; ?>">
									<img width="300" height="300" src="<?php echo $row_similar["image"] ?>" class="attachment-original size-original" alt="">
									</a>
								</div>
							</div><!-- box-image -->
					
							<div class="box-text text-center" >
								<div class="title-wrapper"><p class="name product-title">
									<a href="detail.php?id=<?php echo $row_similar["id"]; ?>"><?php echo $row_similar["product-name"] ?></a>
								</p>
							</div>
							<div class="price-wrapper">
						<span class="price"><del><span class="woocommerce-Price-amount amount"><?php echo number_format($row_similar["price"],3,".",".") ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount"><?php echo number_format($row_similar["Sale_price"],3,".",".") ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
						</div>
					
						<div class="add-to-cart-button">
							<a href="addcart.php?id=<?php echo $row_similar['id'] ?>" rel="nofollow" class="ajax_add_to_cart add_to_cart_button product_type_simple button primary is-flat mb-0 is-small">Thêm vào giỏ</a></div>							
						</div><!-- box-text -->
											</div><!-- box -->
											</div><!--.col-inner -->
			</div>

      <?php
			}}
		?>
      </div>
  </div>

	</div><!-- container -->
</div><!-- product-footer -->
</div><!-- .product-container -->
</div>		
	</div><!-- shop container -->

</main><!-- #main -->
<?php
	include "footer.php";
?>