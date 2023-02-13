<?php
    session_start();
    require_once "header.php";
    $insertorder="INSERT INTO `orders` (`id`, `firstname`, `lastname`, `phone_number`, `email`, `address`, `note`,`payment_method`) VALUES (NULL, '".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['phone']."', '".$_POST['email']."', '".$_POST['address']."', '".$_POST['order_comments']."', '".$_POST['payment_method']."');";
    $result_insertorder = mysqli_query($conn, $insertorder);
    $orderid= mysqli_insert_id($conn);
    $insertString = "";
?>
<main id="main" class="">
<div id="content" class="content-area page-wrapper" role="main">
	<div class="row row-main">
		<div class="large-12 col">
			<div class="col-inner">
				
				
														
						<div class="woocommerce">
<div class="row">

	
		    <div class="large-7 col">
    <section class="woocommerce-order-details">
	
	<h2 class="woocommerce-order-details__title">Chi tiết đơn hàng</h2>

	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

		<thead>
			<tr>
				<th class="woocommerce-table__product-name product-name">Sản phẩm</th>
				<th class="woocommerce-table__product-table product-total">Tổng</th>
			</tr>
		</thead>

		<tbody>
        <?php
                if(!empty($_SESSION['cart'])){
                    $cartsql = "SELECT * FROM product WHERE id IN (".implode(",", array_keys($_SESSION["cart"])).")";
                    $result_cart = mysqli_query($conn, $cartsql);
                    $total_cart=0;
                    while ($row_cart = mysqli_fetch_assoc($result_cart)){
            ?>
			<tr class="woocommerce-table__line-item order_item">
           
	<td class="woocommerce-table__product-name product-name">
		<a href="product.php?id=<?php echo $row_cart['id'] ?>"><?php echo $row_cart['product-name'] ?></a> <strong class="product-quantity">&times; <?php echo $_SESSION['cart'][$row_cart['id']] ?></strong>	
    </td>
    <td class="woocommerce-table__product-total product-total">
		<span class="woocommerce-Price-amount amount"><?php $total=$_SESSION['cart'][$row_cart['id']]*$row_cart['Sale_price']; 
                                    echo number_format($total,3,".",".");
                                ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>	</td>
   </tr>
        <?php
				if(isset($_SESSION['user'])){
					$insert_detail = "INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `num`, `price-order`) VALUES (NULL, '".$orderid."', '".$row_cart['id']."', '".$_SESSION['user']['id_user']."', '".$_SESSION['cart'][$row_cart['id']]."', '".$total."')";
				} else{
					$insert_detail = "INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `num`, `price-order`) VALUES (NULL, '".$orderid."', '".$row_cart['id']."', NULL, '".$_SESSION['cart'][$row_cart['id']]."', '".$total."')";
				}
				$insert_product = "UPDATE `product` SET `Number_sold_out`= `Number_sold_out` + '".$_SESSION['cart'][$row_cart['id']]."'  WHERE id = ".$row_cart['id'];
                $result_order_detail= mysqli_query($conn, $insert_detail);
				$result_product_number = mysqli_query($conn, $insert_product);
                $total_cart += $total; 
                }}
        ?>
		</tbody>

		<tfoot>
								<tr>
						<th scope="row">Tổng số phụ:</th>
						<td><span class="woocommerce-Price-amount amount"><?php echo number_format($total_cart,3,".","."); ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></td>
					</tr>
										<tr>
						<th scope="row">Giao nhận hàng:</th>
						<td>Giao hàng miễn phí</td>
					</tr>
					<tr>
						<th scope="row">Phương thức thanh toán:</th>
						<td><?php echo $_POST['payment_method']== 'cod' ? "Trả tiền mặt khi nhận hàng" : "Chuyển khoản ngân hàng"; ?></td>
					</tr>
										<tr>
						<th scope="row">Tổng cộng:</th>
						<td><span class="woocommerce-Price-amount amount"><?php echo number_format($total_cart,3,".","."); ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></td>
					</tr>
												<tr>
					<th>Lưu ý:</th>
					<td><?php echo $_POST['order_comments'] ?></td>
				</tr>
					</tfoot>
	</table>

	</section>


    </div>

		<div class="large-5 col">
			<div class="is-well col-inner entry-content">
				<p class="success-color woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><strong>Cảm ơn bạn. Đơn hàng của bạn đã được nhận.</strong></p>

				<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

					<li class="woocommerce-order-overview__order order">
						Mã đơn hàng:	<strong><?php echo $orderid ?></strong>
					</li>					
					<li class="woocommerce-order-overview__total total">
						Tổng cộng:						<strong><span class="woocommerce-Price-amount amount"><?php echo number_format($total_cart,3,".","."); ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong>
					</li>

											<li class="woocommerce-order-overview__payment-method method">
							Phương thức thanh toán:							<strong><?php echo $_POST['payment_method']== 'cod' ? "Trả tiền mặt khi nhận hàng" : "Chuyển khoản ngân hàng"; ?></strong>
						</li>
					
				</ul>
			</div>
		</div>
</div>
</div>					
			</div><!-- .col-inner -->
		</div><!-- .large-12 -->
	</div><!-- .row -->
</div>

</main><!-- #main -->
<?php
    require_once "footer.php";
?>