<?php 
// kết nối và truyền dữ liệu vào cơ sở dữ liệu
include('../../config/config.php');

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
//Xử lý hình ảnh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
// $hinhanh = time().'_'.$hinhanh;
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$id_danhmuc = $_POST['id_danhmuc'];

if(isset($_POST['themsanpham'])){
    //thêm sản phẩm
    $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUES ('".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$id_danhmuc."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('Location:../../index.php?action=quanlysanpham&query=them');

}else if(isset($_POST['suasanpham'])){
    //sửa sản phẩm cách 1
    $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', giasp='".$giasp."', soluong='".$soluong."'
    , hinhanh='".$hinhanh."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."', id_danhmuc ='".$id_danhmuc."' WHERE id_sanpham ='$_GET[idsanpham]'";
    mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlysanpham&query=them');
    //sửa sản phẩm cách 2
    // hàm if nhằm mục đích cho admin muốn thay đổi hình ảnh sản phẩm, else ngược lại
    // if($hinhanh!=''){
    //     move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    //     $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
    //     $query = mysqli_query($mysqli,$sql);
    //     while($row = mysqli_fetch_array($query)){
    //         unlink('uploads/'.$row['hinhanh']);
    //     }
    //     $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', giasp='".$giasp."', soluong='".$soluong."'
    //     , hinhanh='".$hinhanh."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."', id_danhmuc='".$id_danhmuc."' WHERE id_sanpham ='$_GET[idsanpham]'";
    //     }else{
    //         $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', giasp='".$giasp."', soluong='".$soluong."'
    //         , tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."', id_danhmuc='".$id_danhmuc."' WHERE id_sanpham ='$_GET[idsanpham]'";
    //     }
    //     mysqli_query($mysqli,$sql_update);
    //     header('Location:../../index.php?action=quanlysanpham&query=them');
}else{
    //xóa sản phẩm cách 1
    $id = $_GET['idsanpham'];
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham = '".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlysanpham&query=them');
     //xóa sản phẩm cách 2
    //  $id = $_GET['idsanpham'];
    //  $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '.$id.' LIMIT 1";
    //  $query = mysqli_query($mysqli,$sql);
    //  hàm while dùng để xóa hình ảnh trong file uploads
    //  while($row = mysqli_fetch_array($query)){
    //     unlink('uploads/'.$row['hinhanh']);
    //  }
    //  $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham = '".$id."'";
    //  mysqli_query($mysqli,$sql_xoa);
    //  header('Location:../../index.php?action=quanlysanpham&query=them');
}

?>