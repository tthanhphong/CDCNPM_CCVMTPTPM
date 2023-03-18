<?php 
    $sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc = '$_GET[id]' ORDER BY id DESC";
    $query_bv = mysqli_query($mysqli, $sql_bv);
    //get tên danh mục
    $sql_cate = "SELECT * FROM tbl_danhmucbaiviet WHERE tbl_danhmucbaiviet.id_baiviet = '$_GET[id]'";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);

?>
<h5 style="text-align: center;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            font-style: italic;
            margin-right: 8%;
            padding-top: 5px;
            padding-bottom: 5px;"><?php echo $row_title['tendanhmuc_baiviet'] ?></h5>
<ul class="product_lits">
    <?php 
        while($row_bv = mysqli_fetch_array($query_bv)){
    ?>
    <li>
            <a href="baiviet.php?&id=<?php echo $row_bv['id'] ?>">
            <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>" alt="hình ảnh bài viết theo danh mục">
            <p class="title_product">Tên bài viết: <?php echo $row_bv['tenbaiviet'] ?></p>
            <p class="title_product"><?php echo $row_bv['tomtat'] ?></p>
        </a>
    </li>
    <?php 
    }
    ?>
</ul>   
    