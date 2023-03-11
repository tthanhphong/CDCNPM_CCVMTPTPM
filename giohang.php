<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Shop Bán Giầy</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<div class="wrapper">
		<?php 
			include("admincp/config/config.php");
			include("pages/header.php");
			include("pages/menu.php");

		?>
        <!-- form giỏ hàng -->
            <?php 
				if(isset($_SESSION['dangky'])){
					echo ' Xin Chào! '.'<span>'.$_SESSION['dangky'].'</span>';
					echo ' Xin Chào! '.'<span>'.$_SESSION['id_khachhang'].'</span>';
				}
            ?>
            <p>GIỎ HÀNG</p>
            <?php 
                if(isset($_SESSION['cart'])){
					?>
					<table style="width: 100%; text-align: center;">
					<tr style="border: 1px solid black; border-collapse: collapse;">
						<th>ID</th>
						<th>Mã Sản Phẩm</th>
						<th>Tên Sản Phẩm</th>
						<th>Hình Ảnh</th>
						<th>Số Lượng</th>
						<th>Giá Sản Phẩm</th>
						<th>Thành Tiền</th>
						<th>Quản Lý</th>
					</tr>
               <?php 
			   }
            ?>
			<?php 
			//Kiểm Tra Giỏ Hàng Có Đang Trống Hay Không
				if(isset($_SESSION['cart'])){
					$i = 0;
					$tongtien = 0;
					foreach($_SESSION['cart'] as $cart_item){
						$thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
						$tongtien += $thanhtien;
						$i++;
			?>
			<tr style="border: 1px solid black; border-collapse: collapse;">
				<td><?php echo $i; ?></td>
				<td><?php echo $cart_item['masp'] ?></td>
				<td><?php echo $cart_item['tensanpham'] ?></td>
				<td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="150px" alt="hình ảnh sản phẩm"></td>
				<td>
					<a href="themgiohang.php?cong=<?php echo $cart_item['id'] ?>">Cộng</a>
					<?php echo $cart_item['soluong'] ?>
					<a href="themgiohang.php?tru=<?php echo $cart_item['id'] ?>">Trừ</a>
				</td>

				<td><?php echo number_format($cart_item['giasp'],0,',','.').'₫' ?></td>
				<td><?php echo number_format($thanhtien,0,',','.').'₫' ?></td>
				<td><a href="themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>
			</tr>
			<?php 
				}
			?>
			<tr>
				<td colspan="8">
					<p style="float: left;">Tổng Tiền: <?php echo number_format($tongtien,0,',','.').'₫' ?></p>
					<p style="float: right;"><a href="themgiohang.php?xoatatca=1">Xóa Tất Cả</a></p>
					<div style="clear: both;"></div>
					<?php 
						if(isset($_SESSION['dangky'])){
					?>
					<p><a href="thanhtoan.php">Đặt Hàng</a></p>
					<?php
						}else{
					?>
					<p><a href="dangky.php">Đăng Ký Để Đặt Hàng</a></p>
					<?php
						}
					
					?>
				</td>
			</tr>
			<?php 
			}else{
			?>
			<tr>
			<td colspan="8"><p>Hiện Tại Giỏ Hàng Đang Trống</p></td>
			</tr>
			<?php
			}
			?>
			</table>

             <!-- end form giỏ hàng -->
		<?php
			include("pages/footer.php");
		?>
	</div>
	</body>
</html>