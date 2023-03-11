<?php 
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangxuat']);
        header('Location:login.php');
    }
?>
<?php if(isset($_SESSION['dangnhap'])){echo "Xin Chào! ".$_SESSION['dangnhap'];} ?>
<ul class="admincp_list">
    <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản Lý Danh Mục Sản Phẩm</a></li>
    <li><p class="null">|</p></li>
    <li><a href="index.php?action=quanlysanpham&query=them">Quản Lý Sản Phẩm</a></li>
    <li><p class="null">|</p></li>
    <li><a href="index.php?action=quanlybaiviet&query=them">Quản Lý Bài Viết</a></li>
    <li><p class="null">|</p></li>
    <li><a href="index.php?action=quanlydanhmucbaiviet&query=them">Quản Lý Danh Mục Bài Viết</a></li>
    <li><p class="null">|</p></li>
    <li><a href="index.php?action=quanlydonhang&query=lietke">Quản Lý Đơn Hàng</a></li>
    <li><p class="null">|</p></li>
    <li><a href="index.php?dangxuat=1" style="margin-left:500px;">Đăng Xuất</a></li>
</ul>
</ul>