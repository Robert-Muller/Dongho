<?php
    require_once "header.php";
    if(isset($_POST['user_login'])){
        $u = $_POST['user_login'];
        $lostpass = "SELECT * FROM  user WHERE email= '$u' ";
        $result_lostpass = mysqli_query($conn, $lostpass);
        if (mysqli_num_rows($result_lostpass) > 0) {
            echo "<script>
            alert('Bạn sẽ nhận được một liên kết tạo mật khẩu mới qua email.');
			window.location = 'login.php';
            </script>";
        } else {
            echo "<script>
            alert('Email không hợp lệ');
            </script>";
        }
    }

?>
<main id="main" class="">
<div id="content" class="content-area page-wrapper" role="main">
	<div class="row row-main">
		<div class="large-12 col">
			<div class="col-inner">
												
						<div class="woocommerce">
<form method="post" class="woocommerce-ResetPassword lost_reset_password">

	<p>Quên mật khẩu? Vui lòng nhập tên đăng nhập hoặc địa chỉ email. Bạn sẽ nhận được một liên kết tạo mật khẩu mới qua email.</p>
	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<label for="user_login">Tên đăng nhập hoặc email</label>
		<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
	</p>

	<div class="clear"></div>

	
	<p class="woocommerce-form-row form-row">
		<input type="hidden" name="wc_reset_password" value="true" />
		<button type="submit" class="woocommerce-Button button" value="Đặt lại mật khẩu">Đặt lại mật khẩu</button>
	</p>
</form>
</div>		
			</div><!-- .col-inner -->
		</div><!-- .large-12 -->
	</div><!-- .row -->
</div>
</main><!-- #main -->
<?php
    require_once "footer.php";
?>