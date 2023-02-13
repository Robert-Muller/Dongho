<?php
    require_once("config/config.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Đồng Hồ</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link rel='stylesheet' href="css/flatsome-main.css">
	<link rel='stylesheet' href='css/flatsome-shop.css'>
	<link rel='stylesheet' href='css/flatsome-style.css' >
	<link rel='stylesheet' href='css/header.css' >
	<link rel='stylesheet' href='css/pag.css' >
	<script type='text/javascript' src='js/head.js'></script>
	<script type='text/javascript' src='js/footer.js'></script>

<!--SPP-->
	<script type='text/javascript'>
		var flatsomeVars = {"rtl":"","sticky_height":"70","user":{"can_edit_pages":false}};
	</script>
<!-- header -->
	<link rel="alternate" type="application/json+oembed" href="head.json">
</head>
<body>
	<div id="wrapper">
		<header id="header" cylass="header has-stick sticky-jump">
   			<div class="header-wrapper">
				<div id="top-bar" class="header-top hide-for-sticky hide-for-medium">
    				<div class="flex-row container">
      					<div class="flex-col hide-for-medium flex-left">
        					<ul class="nav nav-left medium-nav-center nav-small  nav-divided">
            					<li class="html custom html_topbar_left"><p class="mona_html"><i class="fa fa-map-marker"></i> 75 Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Hà Nội</p></li>
								<li class="html custom html_topbar_right"><p class="mona_html"><i class="fa fa-phone"></i><a href="tel:0946180654"> 0946 180 654</a></p></li>
							</ul>
      					</div>

    				</div>
				</div>
				<div id="masthead" class="header-main hide-for-sticky nav-dark">
    				<div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
						<!-- Logo -->
						<div id="logo" class="flex-col logo">
							<!-- Header logo -->
							<a href="index.php" title="Đồng Hồ" rel="home">
							<img  width="200" height="100" src="image/logo.png" class="header-logo-dark" alt="Đồng Hồ"/></a>
        				</div>
						<!-- Left Elements -->
						<div class="flex-col hide-for-medium flex-left flex-grow">
            				<ul class="header-nav header-nav-main nav nav-left  nav-uppercase" >
              					<li class="header-search-form search-form html relative has-icon">
									<div class="header-search-form-wrapper">
										<div class="searchform-wrapper ux-search-box relative is-normal">
											<form role="search" method="get" class="searchform" action="product.php">
												<div class="flex-row relative">
													<div class="flex-col flex-grow">
														<input type="search" class="search-field mb-0" name="s" value="" placeholder="Tìm kiếm&hellip;" />
        											</div>
													<div class="flex-col">
														<button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
															<i class="fa fa-search" ></i>
														</button>
													</div>
												</div>
											</form>
										</div>	
									</div>
								</li>
							</ul>
          				</div>
						<!-- Right Elements -->
						<div class="flex-col hide-for-medium flex-right">
							<ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
								<li class="header-wishlist-icon has-dropdown">
									<?php
										if(isset($_SESSION['user'])){ 
									?>
    								<a href="account.php" class="wishlist-link is-small">
  	        							<i class="fa fa-user"></i>
										<span class="user"> <?= $_SESSION['user']['firstname']." ".$_SESSION['user']['lastname'] ?></span>
    								</a>	
									<ul class="nav-dropdown nav-dropdown-simple">
    									<li class="html widget_shopping_cart">
      										<div class="widget_shopping_cart_content">
												<p class="woocommerce-mini-cart__buttons buttons">
													<a href="changepass.php" class="button wc-forward">Đổi mật khẩu</a>
													<a href="logout.php" class="button checkout wc-forward">Đăng xuất</a>
												</p>
    										</div>
    									</li>
    								</ul>
									<?php } else{
									?>
									<a href="login.php" class="wishlist-link is-small">
  	        							<i class="fa fa-user"></i>
    								</a>	
									<?php	} ?>
								</li>
								<li class="cart-item has-icon">
									<a href="cart.php" title="Giỏ hàng" class="header-cart-link is-small">
    									<span class="cart-icon image-icon">
   											<strong><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0' ?></strong>
  										</span>
									</a>
								</li>
            				</ul>
         				</div>
      				</div><!-- .header-inner -->
    <script>
		function alertcart(){
			alert("Đã thêm vào giỏ hàng");
		}
        function subtract(id){
            var s= document.getElementById(id).value;
            if(parseInt(s)>1){
                document.getElementById(id).value=parseInt(s)-1;
            }
        }
        function add(id){
            var a= document.getElementById(id).value;
                document.getElementById(id).value=parseInt(a)+1;
        }
	</script>
        <!-- Header divider -->
    <div class="container">
		<div class="top-divider full-width">
		</div>
	</div>
    </div><!-- .header-main -->
	<div id="wide-nav" class="header-bottom wide-nav flex-has-center hide-for-medium">
    <div class="flex-row container">
        <div class="flex-col hide-for-medium flex-center">
            <ul class="nav header-nav header-bottom-nav nav-center  nav-uppercase">
<li id="menu-item-24" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-24"><a href="index.php" class="nav-top-link">Trang chủ</a></li>
<li id="menu-item-22" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22"><a href="introduce.php" class="nav-top-link">Giới thiệu</a></li>
<li id="menu-item-916" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-916"><a href="product.php?category=1" class="nav-top-link">Đồng hồ nam</a></li>
<li id="menu-item-917" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-917"><a href="product.php?category=2" class="nav-top-link">Đồng hồ nữ</a></li>
<li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-23"><a href="contact.php" class="nav-top-link">Liên hệ</a></li>
            </ul>
        </div><!-- flex-col -->     
    </div><!-- .flex-row -->
</div><!-- .header-bottom -->
<div class="header-bg-container fill">
	<div class="header-bg-image fill"></div>
	<div class="header-bg-color fill"></div>
</div><!-- .header-bg-container --> 
  </div><!-- header-wrapper-->
</header>