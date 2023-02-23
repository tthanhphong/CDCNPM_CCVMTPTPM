<!-- sidebar -->
<div id="main">
    <?php 
        include("pages/sidebar/sidebar.php");
    ?>
    <div class="maincontent">
        <?php 
            if(isset($_GET['quanly'])){
                $tam = $_GET['quanly'];
            }else{
                $tam='';
            }if($tam == 'danhmucsanpham'){
                include("pages/main/danhmuc.php");
            }else if($tam == 'lienhe'){
                include("pages/main/lienhe.php");
            }else if($tam == 'tintuc'){
                include("pages/main/tintuc.php");
            }else if($tam == 'timkiem'){
                include("pages/main/timkiem.php");
            }else if($tam == 'giohang'){
                include("pages/main/giohang.php");
            }else{
                include("pages/main/index.php");
            }
        ?>
    </div>
    <div class="clear"></div>
</div>
		<!-- end sidebar -->