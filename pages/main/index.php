<?php 
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = 1;
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page * 3) - 3;
    }

    $sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
    ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,3";
    //$begin là số sản phẩm bắt đầu và số 3 ở trên là số lượng sản phẩm cần hiển thị(lấy).
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>
<h5 style="text-align: center;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            font-style: italic;
            margin-right: 8%;
            padding-top: 5px;
            padding-bottom: 5px;
            color: white;"><br></h5>
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
    <div style="clear: both;"></div>
    <style type="text/css">
        ul.list_trang{
            height: 0;
            list-style: none;  
        }
        ul.list_trang li{
           float: left;
           padding: 5px 13px;
           margin: 5px;
           background: #a9a9a9;
           display: block;
        }
        ul.list_trang li a{
           color: #ffffff;
           text-align: center;
           text-decoration: none;
        }
    </style>
    <!-- Xử lý số trang tùy theo số lượng sản phẩm -->
    <?php 
        $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
        $row_count = mysqli_num_rows($sql_trang);
        // hàm làm tròn ceil();
        $trang = ceil($row_count/3);
    ?>
    <p>Trang Hiện Tại <?php echo $page ?>/<?php echo $trang ?></p>
    <ul class="list_trang">
        <?php 
            for($i=1; $i<=$trang; $i++){
        ?>
            <li <?php if($i == $page){echo 'style="background: black"';}else{ echo '';} ?>> <a href="index.php?trang=<?php echo $i; ?>"><?php echo $i ?></a></li>
        <?php
            }
        ?>
    </ul>