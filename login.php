<?php
    require_once "header.php";
    if(isset($_POST['username']) && isset($_POST['password'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    $login = "SELECT * FROM  user WHERE email= '$u' AND password= '$p'";
    $result_login= mysqli_query($conn, $login);
    $data = mysqli_fetch_assoc($result_login);
        if(mysqli_num_rows($result_login)>0){
        $_SESSION['user'] = $data;
        echo "<script>
            alert('Đăng nhập thành công');
            window.location = 'index.php';
            </script>";
    } else {
        echo "<script>
        alert('Đăng nhập thất bại');
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
    <form class="woocommerce-form woocommerce-form-login login" method="post">
    
        
        <p>Nếu trước đây bạn đã mua hàng của chúng tôi, vui lòng điền đầy đủ thông tin đăng nhập dưới đây. Nếu bạn là khách hàng mới, vui lòng tiếp tục các bước tiếp theo.</p>
    
        <p class="form-row form-row-first">
            <label for="username">Email&nbsp;<span class="required">*</span></label>
            <input type="text" class="input-text" name="username" id="username" required>
        </p>
        <p class="form-row form-row-last">
            <label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
            <input class="input-text" type="password" name="password" id="password" required>
        </p>
    
        
        <p class="form-row">	
            <input type="submit" class="button" name="login" value="Đăng nhập">
        </p>
        <p class="lost_password">
            <a href="lost-password.php">Quên mật khẩu?</a>
        </p>
        <p class="form-row">	
            <a href="register.php"><input type="button" class="button" name="login" value="Đăng Ký"></a> 
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