<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Shop Bán Giầy</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" >
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<div class="wrapper">
		<?php 
			include("admincp/config/config.php");
			include("pages/header.php");
			include("pages/menu.php");
		?>
        <!-- form vận chuyển -->
        <?php 
				if(isset($_SESSION['dangky'])){
					echo ' Xin Chào! '.'<span>'.$_SESSION['dangky'].'</span>';
					echo ' Xin Chào! '.'<span>'.$_SESSION['id_khachhang'].'</span>';
				}
            ?>
        <p>THÔNG TIN VẬN CHUYỂN</p>
<div class="container">
  <?php
  if(isset($_SESSION['id_khachhang'])){
  ?>
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="giohang.php" >Giỏ hàng</a></span> </div>
    <div class="step current"> <span><a href="vanchuyen.php" >Vận chuyển</a></span> </div>
    <div class="step"> <span><a href="thongtinthanhtoan" >Thanh toán</a><span> </div>
    <div class="step"> <span><a href="donhangdadat.php" >Lịch sử đơn hàng</a><span> </div>
  </div>
  <?php
  } 
  ?>
 <h4>Thông tin vận chuyển</h4>
 <?php
 	if(isset($_POST['themvanchuyen'])) {
 		$name = $_POST['name'];
 		$phone = $_POST['phone'];
 		$address = $_POST['address'];
 		$note = $_POST['note'];
 		$id_dangky = $_SESSION['id_khachhang'];
 		$sql_them_vanchuyen = mysqli_query($mysqli,"INSERT INTO tbl_shipping(name,phone,address,note,id_dangky) VALUES('$name','$phone','$address','$note','$id_dangky')");
 		if($sql_them_vanchuyen){
 			echo '<script>alert("Thêm vận chuyển thành công")</script>';

 		}
 	}elseif(isset($_POST['capnhatvanchuyen'])){
 		$name = $_POST['name'];
 		$phone = $_POST['phone'];
 		$address = $_POST['address'];
 		$note = $_POST['note'];
 		$id_dangky = $_SESSION['id_khachhang'];
 		$sql_update_vanchuyen = mysqli_query($mysqli,"UPDATE tbl_shipping SET name='$name',phone='$phone',address='$address',note='$note',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'");
 		if($sql_update_vanchuyen){
 			echo '<script>alert("Cập nhật vận chuyển thành công")</script>';

 		}
 	}
 ?>
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
 	<div class="col-md-12">
	 <form action="" autocomplete="off" method="POST">
	  <div class="form-group">
	    <label for="email">Họ và tên</label>
	    <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="..." >
	  </div>
		<div class="form-group">
	    <label for="email">Phone</label>
	    <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>"  placeholder="...">
	  </div>
	  <div class="form-group">
	    <label for="email">Địa chỉ</label>
	    <input type="text" name="address" class="form-control" value="<?php echo $address ?>"  placeholder="...">
	  </div>
	  <div class="form-group">
	    <label for="email">Ghi chú</label>
	    <input type="text" name="note" class="form-control" value="<?php echo $note ?>"  placeholder="..." >
	  </div>
	  <?php
	  if($name=='' && $phone=='') {
	  ?>
	  <button style="margin: 10px; background-color: #5599e5;" type="submit" name="themvanchuyen" class="btn btn-primary">Thêm vận chuyển</button>

	  <?php
	  } elseif($name!='' && $phone!=''){
	  ?>
	  <button style="margin: 10px;" type="submit" name="capnhatvanchuyen" class="btn btn-success">Cập nhật vận chuyển</button>
	  <?php
	  } 
	  ?>
	</form>
	</div>

	<!--------Giỏ hàng------------------>
	<table style="width:100%;text-align: center;border-collapse: collapse;" border="1">
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
    <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'; ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
    
  </tr>
  <?php
  	}
  ?>
   <tr>
    <td colspan="8">
    	<p style="float: left;">Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p><br/>
    	 
</table>
</div>
</div>
      <div style="clear: both;"></div>
      <?php
        if(isset($_SESSION['dangky'])){
          ?>
           <p style="margin: 0 auto; padding-left: 40%; margin: 10px;"><button style=" background-color: #5599e5; border-radius: 10px; border: 1px solid white; padding: 5px; font-family: Arial, Helvetica, sans-serif; font-size: 15px;">
					<a href="thongtinthanhtoan.php" style="padding:20px;
					text-decoration: none; list-style: none; font-family: Arial, Helvetica, sans-serif;  color: white;">
					Hình Thức Thanh Toán</a></button></p>
      <?php
        }else{
      ?>
        <p><a href="dangky.php">Đăng kí đặt hàng</a></p>
      <?php
        }
      ?>
      
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


        <!-- end form vận chuyển -->
		<?php
			include("pages/footer.php");
		?>
	</div>
	</body>
</html>