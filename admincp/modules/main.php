<div class="clear"></div>
<div class="main">
    <?php    
        if(isset($_GET['action'])&& $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $tam ='';
            $query = '';
            
        }if($tam == 'quanlydanhmucsanpham' && $query == 'them'){
            include("modules/quanlydanhmucsp/them.php");
            include("modules/quanlydanhmucsp/lietke.php");
        }elseif ($tam == 'quanlydanhmucsanpham' && $query == 'sua'){
            include("modules/quanlydanhmucsp/sua.php");
        }elseif($tam == 'quanlysanpham' && $query == 'them'){
            include("modules/quanlysp/them.php");
            include("modules/quanlysp/lietke.php");
        }elseif($tam == 'quanlysanpham' && $query == 'sua'){
            include("modules/quanlysp/sua.php");    
        }elseif($tam == 'quanlydonhang' && $query == 'lietke'){//quản lý đơn hàng
            include("modules/quanlydonhang/lietke.php");    
        }elseif($tam == 'donhang' && $query == 'xemdonhang'){//quản lý đơn hàng
            include("modules/quanlydonhang/xemdonhang.php");    
        }elseif($tam=='quanlydanhmucbaiviet' && $query=='them'){//quản lý danh mục bài viết
            include("modules/quanlydanhmucbaiviet/them.php");
            include("modules/quanlydanhmucbaiviet/lietke.php");
        }elseif($tam=='quanlydanhmucbaiviet' && $query=='sua'){//sửa danh mục bài viết
            include("modules/quanlydanhmucbaiviet/sua.php");
        }elseif($tam=='quanlybaiviet' && $query=='them'){//quản lý bài viết
            include("modules/quanlybaiviet/them.php");
            include("modules/quanlybaiviet/lietke.php");
        }elseif($tam=='quanlybaiviet' && $query=='sua'){//sửa bài viết
            include("modules/quanlybaiviet/sua.php");
        }else{
            include("modules/dashboard.php");
        }
    ?>
</div>