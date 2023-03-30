<?php 
    session_start();
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
?>
<?php 
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
        header('Location:mainindex.php');
        exit();
    }
?>
<!-- header -->
<div class="header">
    <div class="row">
            <div class="col">
                <a href="index.php"><img src="pages/images/logojordan.png" alt="" class="logojordan"></a>
            </div>
            <div class="col">
                <ul class="list_1">
                    <?php 
                        if(isset($_SESSION['dangky'])){
                    ?>  
                    <li><a href="giohang.php?dangxuat=1">Đăng Xuất</a></li>
                    <li class="null">|</li>
                    <li><a href="thaydoimatkhau.php">Thay Đổi Mật Khẩu</a></li>
                    <li class="null">|</li>                 
                    <li><a href="lichsudonhang.php">Lịch Sử Đơn Hàng</a></li>
                    <?php
                        }else{
                    ?>
                    <li><a href="dangnhap.php">Đăng Nhập</a></li>
                    <li class="null">|</li>
                    <li><a href="dangky.php">Đăng Ký</a></li>
                    <?php
                        }
                    ?>
                   
                    
                    <li class="null">|</li>
                    <li><a href="tintuc.php?id=1">Tin Tức</a></li>
                    <li class="null">|</li>
                    <li><a href="#">Chúng Tôi</a></li>
                </ul>
            </div>
        </div>
</div>