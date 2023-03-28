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
        <!-- form thong tin thanh toan -->
            <?php 
				if(isset($_SESSION['dangky'])){
					echo ' Xin Chào! '.'<span>'.$_SESSION['dangky'].'</span>';
					echo ' Xin Chào! '.'<span>'.$_SESSION['id_khachhang'].'</span>';
				}
            ?>
            <p>Hình thức thanh toán</p>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->s
  <?php
  if(isset($_SESSION['id_khachhang'])){
  ?>
  <div class="arrow-steps clearfix">
  <div class="step done"> <span> <a href="giohang.php" >Giỏ hàng</a></span> </div>
    <div class="step done"> <span><a href="vanchuyen.php" >Vận chuyển</a></span> </div>
    <div class="step current"> <span><a href="thongtinthanhtoan.php" >Thanh toán</a><span> </div>
    <div class="step"> <span><a href="donhangdadat.php" >Lịch sử đơn hàng</a><span> </div>
  </div>
  <?php
  } 
  ?>
  	<form action="xulythanhtoan.php" method="POST">
	<div class="row">
  
  	<?php
 	$id_dangky = $_SESSION['id_khachhang'];
 	$sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
 	$count = mysqli_num_rows($sql_get_vanchuyen);
 	if($count>0){
 		$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
 		$name = $row_get_vanchuyen['name'];
 		$phone = $row_get_vanchuyen['phone'];
 		$address = $row_get_vanchuyen['address'];
 		$note = $row_get_vanchuyen['note'];
 	}else{

 		$name = '';
 		$phone = '';
 		$address = '';
 		$note = '';
 	}
 	?>
 		
  	<div class="col-md-8">
  		<h4>Thông tin vận chuyển và giỏ hàng</h4>
  		<ul style="text-decoration: none; list-style: none; padding-left: 0%; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
  			<li>Họ và tên vận chuyển: <b><?php echo $name ?></b></li>
  			<li>Số điện thoại: <b><?php echo $phone ?></b></li>
  			<li>Địa chỉ: <b><?php echo $address ?></b></li>
  			<li>Ghi chú: <b><?php echo $note ?></b></li>
  		</ul>
  		<h5>Giỏ hàng của bạn</h5>
  		<table style="width:100%;text-align: center;border-collapse: collapse; margin-bottom: 10px;" border="1">
		  <tr>
		    <th>Id</th>
		    <th>Mã sp</th>
		    <th>Tên sản phẩm</th>
		    <th>Hình ảnh</th>
		    <th>Số lượng</th>
		    <th>Giá sản phẩm</th>
		    <th>Thành tiền</th>
		 
		   
		  </tr>
		  <?php
		  if(isset($_SESSION['cart'])){
		  	$i = 0;
		  	$tongtien = 0;
		  	foreach($_SESSION['cart'] as $cart_item){
		  		$thanhtien = $cart_item['soluong']*$cart_item['giasp'];
		  		$tongtien+=$thanhtien;
		  		$i++;
		  ?>
		  <tr>
		    <td><?php echo $i; ?></td>
		    <td><?php echo $cart_item['masp']; ?></td>
		    <td><?php echo $cart_item['tensanpham']; ?></td>
		    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
		    <td>
		    	<!-- <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus fa-style" aria-hidden="true"></i></a> -->
		    	<?php echo $cart_item['soluong']; ?>
		    	<!-- <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus fa-style" aria-hidden="true"></i></a> -->

		    </td>
		    <td><?php echo number_format($cart_item['giasp'],0,',','.').'₫'; ?></td>
		    <td><?php echo number_format($thanhtien,0,',','.').'₫' ?></td>
		   
		  </tr>
		  <?php
		  	}
		  ?>
		   <tr>
		    <td colspan="8">
		    
		      <div style="clear: both;"></div>
		    
		    
		    </td>

		   
		  </tr>
		  <?php	
		  }else{ 
		  ?>
		   <tr>
		    <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
		   
		  </tr>
		  <?php
		  } 
		  ?>
		 
		</table>
  	</div>
  	<style type="text/css">
  		.col-md-4.hinhthucthanhtoan .form-check {
		    margin: 11px;
		}
  	</style>

  	<div class="col-md-4 hinhthucthanhtoan">
  		<h4>Phương thức thanh toán</h4>
  		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tienmat" checked>
		  <label class="form-check-label" for="exampleRadios1">
		    Tiền mặt
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="chuyenkhoan">
		  <label class="form-check-label" for="exampleRadios2">
		    Chuyển khoản
		  </label>
		</div>
		<!-- <div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="vnpay">
		  <img src="images/vnpay.png" height="20" width="64">
		  <label class="form-check-label" for="exampleRadios4">
		    Vnpay
		  </label>
		</div> -->
		<input type="submit" value="Thanh toán ngay" name="redirect" class="btn btn-danger">
		
		</form>

		<p></p>
	
		<?php
		$tongtien = 0;
		foreach($_SESSION['cart'] as $key => $value){
			$thanhtien = $value['soluong']*$value['giasp'];
  			$tongtien+=$thanhtien;

		} 
		$tongtien_vnd = $tongtien;
		$tongtien_usd = round($tongtien/22667);
		?>
		<input type="hidden" name="" value="<?php echo $tongtien_usd ?>" id="tongtien">
		<div id="paypal-button"></div>

		<!-- <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="pages/main/xulythanhtoanmomo.php">
            <input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">              	
			<input type="submit" name="momo" value="Thanh toán MOMO QRcode" class="btn btn-danger">

		</form> -->

		<p></p>
		
		<!-- <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="pages/main/xulythanhtoanmomo_atm.php">
		<input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">        
		<input type="submit" name="momo" value="Thanh toán MOMO ATM" class="btn btn-danger">

		</form> -->
		<p></p>
		<!-- <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="pages/main/onepay.php">
		<input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">        
		<input type="submit" name="momo" value="Thanh toán ONEPAY" class="btn btn-danger">

		</form> -->
		<p style="float: left;">Tổng Tiền Cần Thanh Toán: <?php echo number_format($tongtien,0,',','.').'₫' ?></p><br/>
		 </div>
		 </div>
		</div>
             <!-- end form thong tin thanh toan -->
		<?php
			include("pages/footer.php");
		?>
	</div>
	</body>
</html>