<?php
    require_once "header.php";
    if(isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['re-newpassword'])){
    $o = $_POST['oldpassword'];
    $n = $_POST['newpassword'];
    $r = $_POST['re-newpassword'];
    $changepass = "SELECT * FROM  user WHERE email= '".$_SESSION['user']['email']."' AND password= '$o'";
    $result_changepass= mysqli_query($conn, $changepass);
        if(mysqli_num_rows($result_changepass)>0){
            if($n == $r){
            $change = "UPDATE user SET `password` = '$n' WHERE email = '".$_SESSION['user']['email']."'";
            $result_change = mysqli_query($conn, $change);
            echo "<script>
                alert('Đổi mật khẩu thành công');
                window.location = 'index.php';
                </script>";
            }
            else{
                echo "<script>
                alert('Mật khẩu nhập lại không trùng với mật khẩu mới');      
                </script>";
            }
    } else {
        echo "<script>
        alert('Mật khẩu không đúng vui lòng thử lại');
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
        <h2>Đổi mật khẩu</h2>
    
        <p>
            <label for="oldpassword">Mật khẩu cũ</label>
            <input type="password" class="password" name="oldpassword" id="oldpassword" required>
        </p>
        <p>
            <label for="newpassword">Mật khẩu mới</label>
            <input class="password" type="password" name="newpassword" id="newpassword" required>
        </p>
        <p>
            <label for="re-newpassword">Nhập lại mật khẩu mới</label>
            <input class="password" type="password" name="re-newpassword" id="re-newpassword" required>
        </p>
    
        
        <p class="form-row">	
            <input type="submit" class="button" name="changepass" value="Đổi mật khẩu">
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