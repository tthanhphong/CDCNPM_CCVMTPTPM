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
        <!-- form thanh toán -->
        <?php	
			$id_khachang = $_SESSION['id_khachhang'];
			$code_order = rand(0,9999);
			$insert_cart = "INSERT INTO tbl_cart(id_khachhang, code_cart, cart_status) VALUES('".$id_khachang."','".$code_order."',1)"; 
			$cart_query = mysqli_query($mysqli, $insert_cart);
			if($cart_query){
				//thêm giỏ hàng vào chi tiết giỏ hàng
				foreach($_SESSION['cart'] as $key => $value){
					$id_sanpham = $value['id'];
					$soluong = $value['soluongmua'];
					$insert_order_detail = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUES
					('".$id_sanpham."','".$code_order."','".$soluong."')";
					mysqli_query($mysqli,$insert_order_detail);
				}
			}
			unset($_SESSION['cart']);
			header('Location:camon.php');

		?>
        <!-- end form thanh toán -->
		<?php
			include("pages/footer.php");
		?>
	</div>
	</body>
</html>