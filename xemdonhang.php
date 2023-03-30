<?php 
    include('admincp/config/config.php');
    session_start();
    $code = $_GET['code'];
    $sql_lietke_donhang = "SELECT * FROM tbl_cart_details, tbl_sanpham WHERE tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham
    AND tbl_cart_details.code_cart = '".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";    
    $query_lietke_donhang = mysqli_query($mysqli, $sql_lietke_donhang);
?>
<p style="margin: 0 auto; width: 100%; margin-left: 45%; font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: bold;">Chi Tiết Đơn Hàng</p>
<table style="width: 100%;" border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Mã Đơn Hàng</th>
        <th>Tên Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Đơn Giá</th>
        <th>Thành Tiền</th>
    </tr>
    <?php 
        $i = 0;
        $tongtien = 0;
        while($row = mysqli_fetch_array($query_lietke_donhang)){
            $i++;
            $thanhtien = $row['giasp'] * $row['soluong'];
            $tongtien += $thanhtien;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['code_cart'] ?></td>
            <td><?php echo $row['tensanpham'] ?></td>
            <td><?php echo $row['soluong'] ?></td>
            <td><?php echo number_format($row['giasp'],0,',','.').'₫' ?></td>
            <td><?php echo number_format($thanhtien,0,',','.').'₫' ?></td>
        </tr>
    <?php
            }
    ?>
    <tr>
        <td>
            <p>Tổng Tiền: <?php echo number_format($tongtien,0,',','.').'₫' ?></p>
        </td>
    </tr>   
    <button style="border: 1px solid black; border-radius: 10px; font-family: Arial, Helvetica, sans-serif; padding: 10px; margin-bottom: 10px;"><a style="font-size: 13px ;font-family: Arial, Helvetica, sans-serif; margin: 10px; text-decoration: none; color: black;" href="lichsudonhang.php">Trở Về Lịch Sử Đơn Hàng</a></button>

</table>
