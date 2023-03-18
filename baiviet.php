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
	<div class="wrapper" style="width: 90%; margin: 0 auto; height: auto; ">
		<?php 
		$sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id = '$_GET[id]' LIMIT 1";
		$query_bv = mysqli_query($mysqli, $sql_bv);

		$query_bv_all = mysqli_query($mysqli, $sql_bv);
		$row_bv_title = mysqli_fetch_array($query_bv);

	?>
	<h5 style="text-align: center;
				font-size: 20px;
				font-family: Arial, Helvetica, sans-serif;
				font-style: italic;
				margin-right: 8%;
				padding-top: 5px;
				padding-bottom: 5px;"><?php echo $row_bv_title['tenbaiviet'] ?></h5>

	<ul class="baiviet" style="text-decoration: none; list-style: none; ">
		<?php 
			while($row_bv = mysqli_fetch_array($query_bv_all)){
		?>
		<li>	
				<p class="title_product">Tên bài viết: <?php echo $row_bv['tenbaiviet'] ?></p>
				<p class="title_product"><?php echo $row_bv['tomtat'] ?></p>
				<p class="title_product"><?php echo $row_bv['noidung'] ?></p>
				
			</a>
		</li>
		<?php 
		}
		?>
	</ul>   
    
	</div>
    <div class="clear"></div>
        <!-- end form bài viết -->
	</div>
    <?php
	    include("pages/footer.php");
	?>
	</body>
</html>