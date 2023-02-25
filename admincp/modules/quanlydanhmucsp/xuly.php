<?php 
// kết nối và truyền dữ liệu vào cơ sở dữ liệu
include('../../config/config.php');

$tenloaisp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
if(isset($_POST['themdanhmuc'])){
    //thêm danh mục sản phẩm
    $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('".$tenloaisp."','".$thutu."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}else if(isset($_POST['suadanhmuc'])){
    //sửa danh mục sản phẩm
    $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='".$tenloaisp."', thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
    mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}else{
    //xóa danh mục sản phẩm
    $id = $_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = '".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}

?>