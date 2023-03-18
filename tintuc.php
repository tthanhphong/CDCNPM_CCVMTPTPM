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
    <?php 
        include("admincp/config/config.php");
        include("pages/header.php");
        include("pages/menu.php");
    ?>
	<div class="wrapper"style="width: 90%; margin: 0 auto;">
    <!-- form tin tức -->
    <div id="main">
    <div class="sidebar">
        <h5 style="text-align: left;
            font-size: 21px;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0 auto;
            padding-bottom: 10px;
            width: 100%;
            color: #383838;">Danh Mục Tin Tức</h5>
        <ul>
        <?php 
            $sql_danhmuc_bv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
            $query_danhmuc_bv = mysqli_query($mysqli,$sql_danhmuc_bv);
            while($row = mysqli_fetch_array($query_danhmuc_bv)){

        ?>
            <li><a href="tintuc.php?id=<?php echo $row['id_baiviet'] ?>"><?php echo $row['tendanhmuc_baiviet'] ?></a></li>
        <?php 
            }
        ?>
        </ul>
    </div>
    <div class="maincontent">
        <?php include("danhmuctintuc.php"); ?>
    </div>
    <div class="clear"></div>
    </div>
        <!-- end form tin tức -->
	</div>
    <?php
	    include("pages/footer.php");
	?>
	</body>
</html>