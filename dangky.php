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
    <style>
        button.btn-dangky{
            border: 1px solid white; 
            border-radius: 5px; 
            background-color: black; 
            color: white; padding: 5px; 
            width: 100%;
        }
    </style>
</head>
<body>
	<div class="wrapper">
		<?php 
            session_start();
			include("admincp/config/config.php");
			include("pages/header.php");
			include("pages/menu.php");
            //Xử lý hàm đăng ký
            if(isset($_POST['dangky'])){
                $tenkhachhang = $_POST['hoten'];
                $email = $_POST['email'];
                $dienthoai = $_POST['dienthoai'];
                $matkhau = md5($_POST['matkhau']);
                $diachi = $_POST['diachi'];
                $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai)VALUES('".$tenkhachhang."', 
                '".$email."','".$diachi."','".$matkhau."','".$diachi."')");
               if($sql_dangky){
                    echo'<p style="color:green">Bạn đăng ký tài khoản thành công.</p>';
                    $_SESSION['dangky'] = $tenkhachhang;
               }
            }
		?>
        <!-- form đăng ký -->
        <!-- Section: Design Block -->
        <form action="" method="post">
        <section class="text-center" >
        <!-- Background image -->
        <div class="p-6 bg-image" style="
                background-image: url('pages/images/banner1.gif');
                height: 300px;
                width: 100%;
                "></div>
        <!-- Background image -->

        <div class="dangky" style="
                margin-left: 400px;
                margin-top: -100px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(5px);
                width: 50%;
                ">
            <div class="card-body py-2 px-md-3" >
            <div class="row d-flex justify-content-center" style="padding-bottom: 100px;">
                <div class="col-lg-8" style="width: 50%; padding: 0;">
                <img src="pages/images/logo.png" alt="logonike" style="width: 100%s; height: 50px;">
                <h4 class="fw-bold mb-4S">ĐĂNG KÝ TÀI KHOẢN</h4>
                    <!-- họ tên input -->
                    <div class="form-outline mb-4">
                    <input type="text" id="form3Example3" name="hoten" class="form-control" required/>
                    <label class="form-label" for="form3Example3">Họ và Tên</label>
                    </div>
                    <!-- email input -->
                    <div class="form-outline mb-4">
                    <input type="email" id="form3Example4" name="email" class="form-control" required/>
                    <label class="form-label" for="form3Example4">Email</label>
                    </div>
                    <!-- điện thoại input -->
                    <div class="form-outline mb-4">
                    <input type="text" id="form3Example4" name="dienthoai" class="form-control" required/>
                    <label class="form-label" for="form3Example4">Điện Thoại</label>
                    </div>
                    <!-- địa chỉ input -->
                    <div class="form-outline mb-4">
                    <input type="text" id="form3Example4" name="diachi" class="form-control" required/>
                    <label class="form-label" for="form3Example4">Địa Chỉ</label>
                    </div>
                    <!-- mật khẩu input -->
                    <div class="form-outline mb-4">
                    <input type="password" id="form3Example4" name="matkhau" class="form-control" required/>
                    <label class="form-label" for="form3Example4">Password</label>
                    </div>
                    <!-- Submit button -->
                    <button class="btn-dangky" type="submit" name="dangky" value="Đăng Ký" >ĐĂNG KÝ</button>

                    <!-- <button type="submit" class="btn btn-secondary">
                        QUÊN MẬT KHẨU 
                    </button> -->


                </div>
            </div>
            </div>
        </div>
        </section>
        </form>
<!-- Section: Design Block -->
        <!-- end formđăng ký -->
		<?php
			include("pages/footer.php");
		?>
	</div>
<!-- Section: Design Block -->
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
	</body>
</html>