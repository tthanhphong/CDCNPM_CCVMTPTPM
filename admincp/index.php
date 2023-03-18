<?php 
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css" >
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <p class="title">Welcome To Admin DashBoard</p>
        <div class="wrapper">
                <?php 
                    include("config/config.php");
                    include("modules/header.php");
                    include("modules/menu.php");
                    include("modules/main.php");
                    include("modules/footer.php");
                ?>
        </div>


        <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
        <!-- Trình soạn thảo văn bản ckeditor -->
        <script>
                CKEDITOR.replace('noidung');
                CKEDITOR.replace('tomtat');
        </script>
</body>
</html>