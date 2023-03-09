<p>Thêm Sản Phẩm</p>
<div class="table_add"> 
     <table border="1" width="50%" style="border-collapse: collapse;">
     <!-- hình ảnh khi gửi file qua form theo phương thức post thêm dòng enctype="multipart/form-data" -->
        <form method="post" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
            <tr>
                <td>Tên Sản Phẩm</td>
                <td><input type="text" name="tensanpham" id="" required></td>
            </tr>
            <tr>
                <td>Mã Sản Phẩm</td>
                <td><input type="text" name="masp" id="" required></td>
            </tr>
            <tr>
                <td>Giá Sản Phẩm</td>
                <td><input type="text" name="giasp" id="" required></td>
            </tr>
            <tr>
                <td>Số Lượng</td>
                <td><input type="text" name="soluong" id="" required></td>
            </tr>
            <tr>
                <td>Hình Ảnh</td>
                <td><input type="file" name="hinhanh" id="" required></td>
            </tr>   
            <tr>
                <td>Tóm Tắt</td>
                <td><textarea name="tomtat" id="" cols="30" rows="10" style="resize: none;"></textarea></td>
            </tr>
            <tr>
                <td>Nội Dung</td>
                <td><textarea name="noidung" id="" cols="30" rows="10"style="resize: none;"></textarea></td>
            </tr>
            <tr>
                <td>Danh Mục Sản Phẩm</td>
                <td>
                    <select name="id_danhmuc">
                        <?php 
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                        ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tình Trạng</td>
                <td>
                    <select name="tinhtrang">
                        <option value="1">Kích Hoạt</option>
                        <option value="0">Ẩn</option>
                    </select>
                </td>
            </tr>
            <tr>    
                <td colspan="2"><input type="submit" name="themsanpham" value="Thêm Sản Phẩm" id="" ></td>
            </tr>   
        </form>
     </table>
</div>