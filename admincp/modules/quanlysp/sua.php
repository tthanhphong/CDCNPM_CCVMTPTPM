<?php 
    $sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";    
    $query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?>
<p>Sửa Sản Phẩm</p>
     <table border="1" width="50%" style="border-collapse: collapse;">
        <form method="post" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $_GET['idsanpham'] ?>" enctype="multipart/form-data">
        <?php 
        while($dong = mysqli_fetch_array($query_sua_sp)){
        ?>
            <tr>
                <td>Tên Sản Phẩm</td>
                <td><input type="text" name="tensanpham" id="" value="<?php echo $dong['tensanpham'] ?>" required></td>
            </tr>
            <tr>
                <td>Mã Sản Phẩm</td>
                <td><input type="text" name="masp" id="" value="<?php echo $dong['masp'] ?>" required></td>
            </tr>
            <tr>
                <td>Giá Sản Phẩm</td>
                <td><input type="text" name="giasp" id="" value="<?php echo $dong['giasp'] ?>" required></td>
            </tr>
            <tr>
                <td>Số Lượng</td>
                <td><input type="text" name="soluong" id="" value="<?php echo $dong['soluong'] ?>" required></td>
            </tr>
            <tr>
                <td>Hình Ảnh</td>
                <td>
                    <input type="file" name="hinhanh" id="" required>
                    <img src="modules/quanlysp/uploads/<?php echo $dong['hinhanh'] ?> " width="100px" alt="hình ảnh sản phẩm" >
                </td>
            </tr>   
            <tr>
                <td>Tóm Tắt</td>    
                <td><textarea name="tomtat" id="" cols="30" rows="10" style="resize: none; " required><?php echo $dong['tomtat'] ?></textarea></td>
            </tr>
            <tr>
                <td>Nội Dung</td>
                <td><textarea name="noidung" id="" cols="30" rows="10"style="resize: none;" required><?php echo $dong['noidung'] ?></textarea></td>
            </tr>
            <tr>
                <td>Danh Mục Sản Phẩm</td>
                <td>
                    <select name="id_danhmuc">
                        <?php 
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                            if($row_danhmuc['id_danhmuc'] == $dong['id_danhmuc']){
                        ?>
                        <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                        }else{
                        ?>  
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php  
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tình Trạng</td>
                <td>
                    <select name="tinhtrang">
                        <?php
                            if($dong['tinhtrang'] == 1){
                        ?>
                            <option value="1" selected>Kích Hoạt</option>
                            <option value="0">Ẩn</option>
                        <?php 
                        }else{
                        ?>
                            <option value="1">Kích Hoạt</option>
                            <option value="0" selected>Ẩn</option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>    
                <td colspan="2"><input type="submit" name="suasanpham" value="Sửa Sản Phẩm" id="" ></td>
            </tr>
            <?php
        }
            ?>
        </form>
     </table>
