<?php 
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]' ORDER BY id_sanpham DESC";
    $query_pro = mysqli_query($mysqli, $sql_pro);
    //get tên danh mục
    $sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
?>
<h5 style="text-align: center;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            font-style: italic;
            margin-right: 8%;
            padding-top: 5px;
            padding-bottom: 5px;"><?php echo $row_title['tendanhmuc'] ?></h5>
<ul class="product_lits">
    <?php 
        while($row_pro = mysqli_fetch_array($query_pro)){
    ?>
    <li>
        <a href="">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>" alt="hình ảnh sản phẩm theo danh mục">
            <p class="title_product"><?php echo $row_pro['tensanpham'] ?></p>
            <p class="price_product"><?php echo number_format( $row_pro['giasp'],0,',','.').'vnđ' ?></p>
            <!-- để thay dấu phẩy thay bằng dấu chấm thì number_format( $row_pro['giasp'],0,',','.').'vnđ' 
            còn 0 có nghĩa là không có chữ số thập phân đằng sau. -->
        </a>
    </li>
    <?php 
    }
    ?>
</ul>   
    