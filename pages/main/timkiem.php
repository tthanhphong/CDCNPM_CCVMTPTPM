<!-- form tìm kiếm -->
<?php 
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
    AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>
<p style="text-align: center;
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
            font-style: italic;
            margin-right: 8%;
            padding-top: 5px;
            padding-bottom: 5px;
            color: #a9a9a9;">Kết Quả Tìm Kiếm Sản Phẩm Cho Từ Khóa (<?php echo $_POST['tukhoa']; ?>)</p>
<ul class="product_lits" >
    <?php 
        while($row_pro = mysqli_fetch_array($query_pro)){
    ?>
    <li>
        <a  href="sanpham.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>" alt="hình ảnh sản phẩm theo danh mục">
            <p class="title_product"><?php echo $row_pro['tensanpham'] ?></p>
            <p style="color:#A9A9A9; ;"><?php echo $row_pro['tendanhmuc'] ?></p> 
            <p class="price_product" style="padding-top: 15px;"><?php echo number_format( $row_pro['giasp'],0,',','.').'₫' ?></p>
            <!-- để thay dấu phẩy thay bằng dấu chấm thì number_format( $row_pro['giasp'],0,',','.').'vnđ' 
            còn 0 có nghĩa là không có chữ số thập phân đằng sau. -->

        </a>
    </li>
    <?php 
    }
    ?>
</ul> 
<!-- end form tìm kiếm -->
