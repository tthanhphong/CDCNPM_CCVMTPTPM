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
        button.btn-thaydoimatkhau{
            border: 1px solid white; 
            border-radius: 5px; 
            background-color: black; 
            color: white; 
            padding: 5px; 
            width: 100%;
        }
    </style>
    </style>
</head>
<body>
	<div class="wrapper" style="margin-bottom: -50px;">
		<?php 
			include("admincp/config/config.php");
			include("pages/header.php");
			include("pages/menu.php");
            //Xử lý hàm thay đổi mật khẩu
            if(isset($_POST['thaydoimatkhau'])){
                $email = $_POST["email"];
                $matkhau_cu  = md5($_POST["password_cu"]);
                $matkhau_moi  = md5($_POST["password_moi"]);
                $sql = "SELECT * FROM tbl_dangky WHERE email = '".$email."' AND matkhau = '".$matkhau_cu."' LIMIT 1";
                $row = mysqli_query($mysqli, $sql);
                $count = mysqli_num_rows($row);
                if($count > 0){
                $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau = '".$matkhau_moi."'");
                echo '<p style="color: green; position: relative;">Mật Khẩu Đã Được Thay Đổi</p>';
                }else{
                echo "<script>alert('Mật Khẩu Cũ Không Trùng Khớp, Vui Lòng Nhập Lại..');</script>";
                }
            }
		?>
<!-- form đăng nhập -->
<form action="" method="post">
    <section class="text-center">
    <!-- Background image -->
    <div class="p-6 bg-image" style="
            background-image: url('pages/images/banner1.gif');
            height: 300px;
            width: 100%;
            "></div>
    <!-- Background image -->
    <div class="login" style="
            margin-left: 400px;
            margin-top: -100px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter: blur(5px);
            width: 50%;
            ">
        <div class="card-body py-2 px-md-3">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8" style="width: 50%; padding: 0;">
                <img src="pages/images/logo.png" alt="logonike" style="width: 50px; height: 50px;">
                    <h4 class="fw-bold mb-4S">THAY ĐỔI MẬT KHẨU</h4>
                <!-- Email input -->
                <div class="form-outline mb-4">
                <input type="email" id="form3Example3" name="email" class="form-control" placeholder="Email..." required/>
                <label class="form-label" for="form3Example3">Email address</label>
                </div>
                <!-- Old Password input -->
                <div class="form-outline mb-4">
                <input type="password" id="form3Example4" name="password_cu" class="form-control" placeholder="Mật Khẩu Cũ..."  required/>
                <label class="form-label" for="form3Example4">Password Cũ</label>
                </div>
                <!-- New Password input -->
                <div class="form-outline mb-4">
                <input type="password" id="form3Example4" name="password_moi" class="form-control" placeholder="Mật Khẩu Mới..."  required/>
                <label class="form-label" for="form3Example4">Password Mới</label>
                </div>
                <!-- Submit button -->
                <button class="btn-thaydoimatkhau" type="submit" name="thaydoimatkhau" value="Thay Đổi Mật Khẩu" >THAY ĐỔI MẬT KHẨU</button>
                <!-- <button type="submit" class="btn btn-secondary">
                    QUÊN MẬT KHẨU 
                </button> -->
            </div>
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