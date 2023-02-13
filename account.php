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
                    if(!empty($_SESSION['user'])){
                        $account = "SELECT * FROM product, order_details WHERE order_details.id_user = ".$_SESSION['user']['id_user']." AND order_details.product_id= product.id;";
                        $result_account = mysqli_query($conn, $account);
                ?>
                <div class="woocommerce row row-large row-divided">
                <div class="cart-wrapper sm-touch-scroll">
                <h2>Sản phẩm bạn đã mua</h2>
        
        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
            <thead>
                <tr>
                    <th class="product-name" colspan="2">Sản phẩm</th>
                    <th class="product-price">Giá</th>
                    <th class="product-quantity">Số lượng</th>
                    <th class="product-subtotal">Tổng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        while ($row_account = mysqli_fetch_assoc($result_account)){
                ?>
                <tr class="woocommerce-cart-form__cart-item cart_item">
                    <td class="product-thumbnail">
                        <a href="detail.php?id=<?php echo $row_account['id'] ?>"><img width="300" height="300" src="<?php echo $row_account['image'] ?>"></a>						
                    </td>
    
                    <td class="product-name" data-title="Sản phẩm">
                        <a href="detail.php?id=<?php echo $row_account['id'] ?>"><?php echo $row_account['product-name'] ?></a>
                    </td>
    
                    <td class="product-price" data-title="Giá">
                        <span class="woocommerce-Price-amount amount"><?php echo number_format($row_account['Sale_price'],3,".",".") ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>						
                    </td>                        
                    <td class="product-quantity" data-title="Số lượng">
                        <span class="woocommerce-Price-amount amount"><?php echo $row_account['num'] ?>
                        </span>  
                    </td>
    
                        <td class="product-subtotal" data-title="Tổng">
                            <span class="woocommerce-Price-amount amount"><?php echo number_format($row_account['price-order'],3,".",".") ?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span>
                            </span>						
                        </td>
                    </tr>
                      <?php
                        }}
                        ?>
                        </tbody>
        </table>
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