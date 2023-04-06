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
		<!-- Trang Chi Tiết Sản Phẩm -->
		<?php 
		 $sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
		 AND tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1 ";
		 $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
		while($row_chitiet = mysqli_fetch_array($query_chitiet)){
		?>
		<!-- Form chi tiêt Bootstrap-->
		<section class="py-0">
			<form method="post" action="themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
				<div class="container px-3 px-lg-5 my-4">
					<div class="row gx-3 gx-lg-5 align-items-center" >
						<div class="col-md-6">
							<img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>" alt="hình ảnh chi tiết sản phẩm" style="border-radius: 10px;">
						</div>
						<div class="col-md-6">
							<p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; position: relative; top: 20px;" class="display-5"><?php echo $row_chitiet['tensanpham'] ?></p>
							<div class="fs-5 mb-3">
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-style: normal;"><?php echo $row_chitiet['tendanhmuc'] ?></p>
							</div>
								<p><?php echo number_format($row_chitiet['giasp'],0,',','.').'₫' ?></p>
								<p><?php echo $row_chitiet['noidung'] ?></p>
							<div class="d-flex">
								<!-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" /> -->
								<button class="btn btn-outline-dark flex-shrink-0" name="themgiohang" type="submit">
									<i class="bi-cart-fill me-1"></i>
									Thêm Vào Giỏ Hàng
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</section>
		<!-- End form chi tiết sản phẩm -->
		<?php 
		}
		?>
		<!-- End Trang Chi Tiết Sản Phẩm -->
		<?php
			include("pages/footer.php");
		?>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>