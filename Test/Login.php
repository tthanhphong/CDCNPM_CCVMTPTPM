<?php
class Login {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function authenticate($email, $matkhau) {
        // Kiểm tra xem tên đăng nhập và mật khẩu có tồn tại trong cơ sở dữ liệu hay không
        if(empty($email) || empty($matkhau)){
            return false;
        }else{
            $query = "SELECT * FROM tbl_dangky WHERE email = :email AND matkhau = :matkhau";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':matkhau', $matkhau);
            $stmt->execute();
        }
        // Nếu tồn tại tài khoản, trả về true, ngược lại trả về false
        if ($stmt->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
?>
