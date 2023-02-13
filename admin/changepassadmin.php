<?php
    require_once "../config/config.php";
    include ('templates/header.php');
    include ('templates/navigation.php');
    if(isset($_POST['submit'])){
        $o = $_POST['old_password'];
        $n = $_POST['new_password'];
        $r = $_POST['re_password'];
        $changepass = "SELECT * FROM  useradmin WHERE username= '".$_SESSION['admin']['username']."' AND password= '$o'";
        $result_changepass= mysqli_query($conn, $changepass);
            if(mysqli_num_rows($result_changepass)>0){
                if($n == $r){
                $change = "UPDATE useradmin SET `password` = '$n' WHERE username = '".$_SESSION['admin']['username']."'";
                $result_change = mysqli_query($conn, $change);
                echo "<script>
                    alert('Đổi mật khẩu thành công');
                    window.location = 'category.php';
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
<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form class="form-horizontal" id="form_addcouse" method="post" enctype="multipart/form-data" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="old_password">Mật khẩu cũ</label>
                                    <input type="password" class="form-control" name="old_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Mật khẩu mới</label>
                                    <input type="password" class="form-control" name="new_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="re_password">Nhập lại mật khẩu mới</label>
                                    <input type="password" class="form-control" name="re_password" required>
                                </div>
                                <div class="card-footer d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-default" name="submit">Đổi mật khẩu</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>