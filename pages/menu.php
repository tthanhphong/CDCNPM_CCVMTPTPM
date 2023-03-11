<?php 
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
?>
<!-- menu -->
<div class="menu">
    <div class="row">
        <div class="col">
            <a href="index.php"><img src="pages/images/logo.png" alt="" class="logo"></a>
        </div>
        <!-- Thanh chức năng chính của trang web -->
        <div class="col_menu">
            <ul class="menu_1">
                <li><a href="mainindex.php">Trang Chủ</a></li>
                <?php
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                    <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
                    <?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- Thanh chức năng tìm kiếm, giỏ hàng, sản phẩm yêu thích -->
        <div class="col_menu">
            <ul class="menu_2"> 
                <li><a href="giohang.php">Giỏ Hàng</a></li>
                <li><a href="index.php?quanly=lienhe">Liên Hệ</a></li>
                <li>
                    <form action="index.php?quanly=timkiem" method="post">
                        <input type="text" placeholder="Tìm Kiếm Sản Phẩm..." name="tukhoa" required>
                        <input type="submit" name="timkiem" value="Tìm Kiếm" required>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>