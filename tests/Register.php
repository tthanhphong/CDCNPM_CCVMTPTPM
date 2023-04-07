<?php
class Register {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function save($tenkhachhang, $email, $diachi, $matkhau, $dienthoai) {
        // Kiểm tra xem có đầy đủ giá trị cho từng biến.
        if(empty($tenkhachhang)||empty($email)||empty($diachi)||empty($matkhau)||empty($dienthoai)){
            return false;
        }else{
            $query = "INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai) VALUES ('".$tenkhachhang."', '".$email."', '".$diachi."', '".$matkhau."', '".$dienthoai."')";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            //trả về true nếu thêm thành công
            return true;
        }
        
    }

    public function DuplicateEmail($tenkhachhang, $email, $diachi, $matkhau, $dienthoai) {
        // Kiểm tra xem có đầy đủ giá trị cho biến.
        $query = "SELECT `email` FROM `tbl_dangky` WHERE `email` = '".$email."'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        //trả về true nếu email có tồn tại và không cho đăng ký
        if ($stmt->rowCount() == 1) {
            return true;
        } else {
            $query = "INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai) VALUES ('".$tenkhachhang."', '".$email."', '".$diachi."', '".$matkhau."', '".$dienthoai."')";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return false;
        }
    }

}
?>
