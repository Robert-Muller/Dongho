<?php
    require_once "header.php";
    if(isset($_POST['email']) && isset($_POST['password'])){
        $u = $_POST['email'];
        $p = $_POST['password'];
        $register = "SELECT * FROM  user WHERE email= '$u' ";
        $result_register = mysqli_query($conn, $register);
        if (mysqli_num_rows($result_register) == 0) {
            $addaccount = "INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `password`, `phone`, `email`) VALUES (NULL, '".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['password']."', '".$_POST['phone']."', '".$_POST['email']."')";
            $result_account = mysqli_query($conn, $addaccount);
            echo "<script>
            alert('Đăng ký thành công');
            window.location = 'login.php';
            </script>";
        } else {
            echo "<script>
            alert('email không hợp lệ hoặc đã tồn tại, vui lòng nhập email khác để đăng ký');
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
                    
                
<form name="checkout" method="post" class="checkout woocommerce-checkout " action="">

<div class="row pt-0 ">
    <div class="large-7 col  ">
        
            
            <div id="customer_details">
                <div class="clear">
                    <div class="woocommerce-billing-fields">

    <h3>Đăng ký</h3>



<div class="woocommerce-billing-fields__field-wrapper">
    <p class="form-row form-row-first validate-required" id="first_name_field">
        <label for="first_name" class="">Họ&nbsp;
            <abbr class="required" title="bắt buộc">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="first_name" id="first_name" placeholder=""  value="" required></span></p>
    <p class="form-row form-row-last validate-required" id="last_name_field">
        <label for="last_name" class="">Tên&nbsp;
            <abbr class="required" title="bắt buộc">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="last_name" id="last_name" placeholder=""  value="" required></span></p>
   <p class="form-row form-row-wide validate-required validate-phone" id="phone_field">
        <label for="phone" class="">Số điện thoại&nbsp;
            <abbr class="required" title="bắt buộc">*</abbr></label><span class="woocommerce-input-wrapper">
                <input type="tel" class="input-text " name="phone" id="phone" placeholder=""  value="" required></span></p>
    <p class="form-row form-row-wide validate-required validate-email" id="email_field">
        <label for="email" class="">Địa chỉ email&nbsp;
            <abbr class="required" title="bắt buộc">*</abbr></label>
            <span class="woocommerce-input-wrapper"><input type="email" class="input-text " name="email" id="email" placeholder=""  value="" required></span></p>
    <p class="form-row form-row-wide validate-required validate-email">
        <label for="password" class="">Mật khẩu&nbsp;
            <abbr class="required" title="bắt buộc">*</abbr></label>
            <span class="woocommerce-input-wrapper"><input type="password" class="input-text " name="password" id="password" placeholder=""  value="" required></span></p>		
        </div>
    <input type="submit" class="button" name="register" value="Đăng Ký">

</div>
                </div>
            </div>

            
        
    </div><!-- large-7 -->

</div><!-- .row -->
</div>


</main><!-- #main -->
<?php
    require_once "footer.php";
?>