<?php
class CRUD_DanhMucSanPham {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function create($tendanhmuc, $thutu) {
        // Kiểm tra xem có đầy đủ giá trị cho từng biến.
        if(empty($tendanhmuc)||empty($thutu)){
            return false;
        }else{
            $query = "INSERT INTO tbl_danhmuc(tendanhmuc, thutu) VALUES ('".$tendanhmuc."', '".$thutu."')";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            //trả về true nếu thêm thành công
            return true;
        }
    }
    public function Update($tendanhmuc, $thutu) {
        // Kiểm tra xem có đầy đủ giá trị cho từng biến.
        $query = "SELECT * FROM `tbl_danhmuc` WHERE `tendanhmuc` = '".$tendanhmuc."'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            $tendanhmuccapnhat= 'Thể Thao Điện Tử 1';
            $thutucapnhat = '1';
            //trả về true nếu update thành công
            $query = "UPDATE `tbl_danhmuc` SET `tendanhmuc`='".$tendanhmuccapnhat."',`thutu`='".$thutucapnhat."' WHERE `tendanhmuc` = '".$tendanhmuc."'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return true;
        }else{
            //trả về false nếu update không thành công
            return false;
        }
    }

    public function Delete($tendanhmuc, $thutu) {
        // Kiểm tra xem có đầy đủ giá trị cho từng biến.
        $query = "SELECT * FROM `tbl_danhmuc` WHERE `tendanhmuc` = '".$tendanhmuc."'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if($stmt->rowCount() > 1){
            //trả về true nếu delete thành công
            $query = "DELETE FROM `tbl_danhmuc` WHERE `tendanhmuc` = '".$tendanhmuc."'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return true;
        }else{
            //trả về false nếu delete không thành công vì không tồn tại tên danh mục cần xóa.
            return false;
        }
    }

    public function findByName($tendanhmuc) {
        // Kiểm tra xem có đầy đủ giá trị cho từng biến.
        $query = "SELECT * FROM `tbl_danhmuc` WHERE `tendanhmuc` = '".$tendanhmuc."'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            //trả về true nếu có danh mục sản phẩm
            return true;
        }else{
            //trả về false nếu không tồn tại danh mục sản phẩm
            return false;
        }
    }

    

}
?>
