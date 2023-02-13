<?php
session_start();
require_once "header.php";
?>
<main id="main" class="">
    <div id="content" class="content-area page-wrapper" role="main">
        <div class="row row-main">
            <div class="large-12 col">
                <div class="col-inner">

                <?php
                    if(!empty($_SESSION['cart'])){
                        $cartsql = "SELECT * FROM product WHERE id IN (".implode(",", array_keys($_SESSION["cart"])).")";
                        $result_cart = mysqli_query($conn, $cartsql);
                        $total_cart=0;
                ?>
                    <div class="woocommerce row row-large row-divided">
    <div class="col large-7 pb-0 ">
    <form class="woocommerce-cart-form" action="updatecart.php" method="get">
    <div class="cart-wrapper sm-touch-scroll">
    
        
        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
            <thead>
                <tr>
                    <th class="product-name" colspan="3">Sản phẩm</th>
                    <th class="product-price">Giá</th>
                    <th class="product-quantity">Số lượng</th>
                    <th class="product-subtotal">Tổng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        while ($row_cart = mysqli_fetch_assoc($result_cart)){
                ?>
                <tr class="woocommerce-cart-form__cart-item cart_item">
    
                    <td class="product-remove">
                        <a href="updatecart.php?action=delete&id=<?php echo $row_cart['id']?>" class="remove" aria-label="Xóa sản phẩm này" data-product_id="755" data-product_sku="P006-1-1">&times;</a>						
                    </td>
    
                    <td class="product-thumbnail">
                        <a href="detail.php?id=<?php echo $row_cart['id'] ?>"><img width="300" height="300" src="<?php echo $row_cart['image'] ?>"></a>						
                    </td>
    
                    <td class="product-name" data-title="Sản phẩm">
                        <a href="detail.php?id=<?php echo $row_cart['id'] ?>"><?php echo $row_cart['product-name'] ?></a>
                    </td>
    
                    <td class="product-price" data-title="Giá">
                                <span class="woocommerce-Price-amount amount"><?php echo number_format($row_cart['Sale_price'],3,".",".") ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>						</td>
                             
                    <td class="product-quantity" data-title="Số lượng">
                                <div class="quantity buttons_added">
            <input type="button" value="-" class="minus button is-form" onclick="subtract('quantity_<?php echo $row_cart['id']; ?>')">		
            <label class="screen-reader-text" for="quantity[<?php echo $row_cart['id']; ?>]">Số lượng</label>
            <input
                type="number"
                id="quantity_<?php echo $row_cart['id']; ?>"
                class="input-text qty text"
                step="1"
                min="0"
                max="9999"
                name="quantity[<?php echo $row_cart['id']; ?>]"
                value="<?php echo $_SESSION['cart'][$row_cart['id']] ?>"
                title="SL"
                size="4"
                pattern="[0-9]*"
                inputmode="numeric">
            <input type="button" value="+" class="plus button is-form" onclick="add('quantity_<?php echo $row_cart['id']; ?>')">
            
        	</div>
                                </td>
    
                        <td class="product-subtotal" data-title="Tổng">
                                <span class="woocommerce-Price-amount amount">
                                    <?php $total=$_SESSION['cart'][$row_cart['id']]*$row_cart['Sale_price']; 
                                    echo number_format($total,3,".",".");
                                ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>						</td>
                        </tr>
                      <?php
                        $total_cart += $total;
                        }
                        ?>
                <tr>
                    <td colspan="6" class="actions clear">
    
                        <div class="continue-shopping pull-left text-left">
        <a class="button-continue-shopping button primary is-outline"  href="product.php">
            &#8592; Tiếp tục xem sản phẩm    </a>
    </div>
    
                        <button type="submit" class="button primary mt-0 pull-left small" name="update" value="Cập nhật giỏ hàng">Cập nhật giỏ hàng</button>			
                    </td>
                </tr>
    
                        </tbody>
        </table>
        </div>
    </form>
    </div>
    
    <div class="cart-collaterals large-5 col pb-0">
        
        <div class="cart-sidebar col-inner ">
            <div class="cart_totals ">
    
                  <table cellspacing="0">
              <thead>
                  <tr>
                      <th class="product-name" colspan="2" style="border-width:3px;">Tổng số lượng</th>
                  </tr>
              </thead>
              </table>
      
        <h2>Tổng số lượng</h2>
    
        <table cellspacing="0" class="shop_table shop_table_responsive">
    
            <tr class="cart-subtotal">
                <th>Tổng phụ</th>
                <td data-title="Tổng phụ"><span class="woocommerce-Price-amount amount"><?php echo number_format($total_cart,3,".","."); ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></td>
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
                                <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping1" value="free_shipping:1" class="shipping_method">
                                <label class="shipping__list_label" for="shipping_method_0_free_shipping1">Giao hàng miễn phí</label>								
                            </li>
                                                        
                        </ul>
    <p class="woocommerce-shipping-destination"> Ước tính cho <strong>Việt Nam</strong>. 							
    </p>
                    </td>
                </tbody>
                </tr>
            </table>
        </td>
    </tr>
                
            
            
            
            
            <tr class="order-total">
                <th>Tổng</th>
                <td data-title="Tổng"><strong><span class="woocommerce-Price-amount amount"><?php echo number_format($total_cart,3,".","."); ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong> </td>
            </tr>
    
            
        </table>
    
        <div class="wc-proceed-to-checkout">
            
    <a href="pay.php" class="checkout-button button alt wc-forward">
        Tiến hành thanh toán</a>
        </div>
    
        
    </div>
	</div>
    </div>
    </div>
    </div>
                <?php
                } else {
                ?>
                            <div class="woocommerce">
                                <div class="text-center pt pb">
                                    <p class="cart-empty">Chưa có sản phẩm nào trong giỏ hàng.</p>
                                    <p class="return-to-shop">
                                    <a class="button primary wc-backward" href="index.php">
                                        Quay trở lại cửa hàng			</a>
                                </p>
                                </div>
                            </div>
                    <?php
                        }
                      ?>
    
                            
                                                    </div><!-- .col-inner -->
            </div><!-- .large-12 -->
        </div><!-- .row -->
    
    
</main><!-- #main -->
<?php
 require_once "footer.php";
?>