<?php 
    $sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = '$_GET[iddanhmuc]' LIMIT 1";    
    $query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
?>
<p>Sửa Danh Mục Sản Phẩm</p>
     <table border="1" width="50%" style="border-collapse: collapse;">
        <form method="post" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
        <?php 
        while($dong = mysqli_fetch_array($query_sua_danhmucsp)){
        ?>
            <tr>
                <td>Tên Danh Mục</td>
                <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc" id="" required></td>
            </tr>
            <tr>
                <td>Thứ Tự</td>
                <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu" id="" required></td>
            </tr>
            <tr>    
                <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa Danh Mục Sản Phẩm" id="" ></td>
            </tr>
            <?php
        }
            ?>
        </form>
     </table>
