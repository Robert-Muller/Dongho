<?php
    require_once "config/config.php";
    session_start();
    require_once "header.php";
?>
<main id="main" class="">
<div id="content" class="content-area page-wrapper" role="main">
	<div class="row row-main">
		<div class="large-12 col">
			<div class="col-inner">				
				<div class="woocommerce">
                    <div class="woocommerce-form-login-toggle">
	
	<div class="woocommerce-info message-wrapper">
		<div class="message-container container medium-text-center">
			Bạn đã có tài khoản? <a href="login.php" class="showlogin">Ấn vào đây để đăng nhập</a>		
        </div>
	</div>
</div>

<form name="checkout" method="post" class="checkout woocommerce-checkout " action="receipt.php" enctype="multipart/form-data">

	<div class="row pt-0 ">
		<div class="large-7 col  ">
			
				
				<div id="customer_details">
					<div class="clear">
						<div class="woocommerce-billing-fields">
	
		<h3>Thông tin thanh toán</h3>

	
	
	<div class="woocommerce-billing-fields__field-wrapper">
		<p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
            <label for="billing_first_name" class="">Họ&nbsp;
                <abbr class="required" title="bắt buộc">*</abbr></label>
                <span class="woocommerce-input-wrapper">
                    <input type="text" class="input-text " name="first_name" id="billing_first_name" placeholder=""  value="" required></span></p>
        <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
            <label for="billing_last_name" class="">Tên&nbsp;
                <abbr class="required" title="bắt buộc">*</abbr></label>
                <span class="woocommerce-input-wrapper">
                    <input type="text" class="input-text " name="last_name" id="billing_last_name" placeholder=""  value="" required></span></p>
       <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
            <label for="billing_address_1" class="">Địa chỉ&nbsp;
                <abbr class="required" title="bắt buộc">*</abbr></label><span class="woocommerce-input-wrapper">
                    <input type="text" class="input-text " name="address" id="billing_address_1" placeholder="Địa chỉ"  value="" required></span></p>
       <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
            <label for="billing_phone" class="">Số điện thoại&nbsp;
                <abbr class="required" title="bắt buộc">*</abbr></label><span class="woocommerce-input-wrapper">
                    <input type="tel" class="input-text " name="phone" id="billing_phone" placeholder=""  value="" required></span></p>
        <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
            <label for="billing_email" class="">Địa chỉ email&nbsp;
                <abbr class="required" title="bắt buộc">*</abbr></label>
                <span class="woocommerce-input-wrapper"><input type="email" class="input-text " name="email" id="billing_email" placeholder=""  value="" required></span></p>	
            </div>

	</div>
					</div>

					<div class="clear">
<div class="woocommerce-additional-fields">
	
	
		
		<div class="woocommerce-additional-fields__field-wrapper">
							<p class="form-row notes" id="order_comments_field" data-priority=""><label for="order_comments" class="">Ghi chú đơn hàng&nbsp;<span class="optional">(tuỳ chọn)</span></label><span class="woocommerce-input-wrapper"><textarea name="order_comments" class="input-text " id="order_comments" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."  rows="2" cols="5"></textarea></span></p>					
        </div>

	
	</div>
					</div>
				</div>

				
			
		</div><!-- large-7 -->

		<div class="large-5 col">
			
					<div class="col-inner has-border">
						<div class="checkout-sidebar sm-touch-scroll">
							<h3 id="order_review_heading">Đơn hàng của bạn</h3>

							
							<div id="order_review" class="woocommerce-checkout-review-order">
								<table class="shop_table woocommerce-checkout-review-order-table">
	<thead>
		<tr>
			<th class="product-name">Sản phẩm</th>
			<th class="product-total">Tổng</th>
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
							<tr class="cart_item">
						<td class="product-name">
							<?php echo $row_cart['product-name'] ?>&nbsp;							 <strong class="product-quantity">&times; <?php echo $_SESSION['cart'][$row_cart['id']] ?></strong>													</td>
						<td class="product-total">
							<span class="woocommerce-Price-amount amount"><?php $total=$_SESSION['cart'][$row_cart['id']]*$row_cart['Sale_price']; 
                                    echo number_format($total,3,".",".");
                                ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>						</td>
					</tr>
                    <?php
                        $total_cart += $total;    
                        }
                    ?>

						</tbody>
	<tfoot>

		<tr class="cart-subtotal">
			<th>Tổng phụ</th>
			<td><span class="woocommerce-Price-amount amount"><?php echo number_format($total_cart,3,".","."); ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></td>
		</tr>

		
		
			
			
<tr class="woocommerce-shipping-totals shipping
	">
	<td class="shipping__inner" colspan="2">
		<table class="shipping__table ">
			<tbody>
			<tr>
				<th >Giao hàng</th>
				<td data-title="Giao hàng">
											<ul id="shipping_method" class="shipping__list woocommerce-shipping-methods">
															<li class="shipping__list_item">
									<input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping1" value="free_shipping:1" class="shipping_method" /><label class="shipping__list_label" for="shipping_method_0_free_shipping1">Giao hàng miễn phí</label>								</li>
													</ul>
											
					
									</td>
			</tbody>
			</tr>
		</table>
	</td>
</tr>
			
		
		
		
		
		<tr class="order-total">
			<th>Tổng</th>
			<td><strong><span class="woocommerce-Price-amount amount"><?php echo number_format($total_cart,3,".","."); ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong> </td>
		</tr>
        <?php
            }
        ?>
		
	</tfoot>
</table>
<div id="payment" class="woocommerce-checkout-payment">
			<ul class="wc_payment_methods payment_methods methods">
			<li class="wc_payment_method payment_method_cod">
	<input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod"  checked='checked' data-order_button_text="" />

	<label for="payment_method_cod">
		Trả tiền mặt khi nhận hàng 	</label>
	</li>
<li class="wc_payment_method payment_method_bacs">
	<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs"  data-order_button_text="" />

	<label for="payment_method_bacs">
		Chuyển khoản ngân hàng 	</label>
	</li>
		</ul>
		<div class="form-row place-order">
		<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Đặt hàng" data-value="Đặt hàng">Đặt hàng</button>
		
		<input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="95a4d8a2a3">
	</div>
</div>
							</div>

							<div class="woocommerce-privacy-policy-text"></div>						</div>
					</div>

							</div><!-- large-5 -->

	</div><!-- row -->
</form>

</div>

						
												</div><!-- .col-inner -->
		</div><!-- .large-12 -->
	</div><!-- .row -->
</div>


</main><!-- #main -->
<?php
    include "footer.php";
?>