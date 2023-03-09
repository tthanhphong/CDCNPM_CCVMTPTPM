<?php 
  session_start();
  include('config/config.php');
  if(isset($_POST['dangnhap'])){
    $taikhoan = $_POST["username"];
    $matkhau  = md5($_POST["password"]);
    $sql = "SELECT * FROM tbl_admin WHERE username = '".$taikhoan."' AND password = '".$matkhau."' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if($count > 0){
      $_SESSION['dangnhap'] = $taikhoan;
      header("Location:index.php");
      
    }else{
      echo "<script>alert('Tài Khoản Hoặc Mật Khẩu Không Đúng, Vui Lòng Nhập Lại..');</script>";
      header('window.location:login.php');
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css" >
    <title>Admin Panel</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet"/>
</head>
<body>
<!-- Section: Design Block -->
<form action="" method="post">
<section class="text-center">
  <!-- Background image -->
  <div class="p-6 bg-image" style="
        background-image: url('/images/banner1.gif');
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
        <div class="col-lg-8" style="width: 100%; padding: 0;">
          <h2 class="fw-bold mb-4">Admin Control Panel</h2>
          
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" name="username" class="form-control" required/>
              <label class="form-label" for="form3Example3">Email address</label>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" name="password" class="form-control" required/>
              <label class="form-label" for="form3Example4">Password</label>
            </div>
            <!-- Submit button -->
              <button type="submit" class="btn btn-primary" name="dangnhap" value="Đăng nhập">
                ĐĂNG NHẬP 
              </button>

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
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
></script>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
<!-- Section: Design Block -->
</body>
</html>