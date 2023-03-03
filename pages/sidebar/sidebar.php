<div class="sidebar">
<h5 style="text-align: left;
            font-size: 21px;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0 auto;
            padding-bottom: 10px;
            width: 100%;
            color: #383838;">Danh Mục Sản Phẩm</h5>
    <ul>
    <?php 
        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
        while($row = mysqli_fetch_array($query_danhmuc)){
            
    ?>
        <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
    <?php 
        }
    ?>
    </ul>
</div>