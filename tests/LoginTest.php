<?php 
    include('Login.php');
    use PHPUnit\Framework\TestCase;

    class LoginTest extends TestCase
    {
        private $conn;
    
        protected function setUp(): void
        {
            // Tạo kết nối đến cơ sở dữ liệu
            $this->conn = new PDO('mysql:host=localhost;dbname=web_mysqli', 'root', '');
        }
    
        protected function tearDown(): void
        {
            // Đóng kết nối đến cơ sở dữ liệu
            $this->conn = null;
        }
    
        public function testLoginWithValidCredentials()
        {
            // Khởi tạo tên đăng nhập và mật khẩu hợp lệ
            $email = 'ttp15112001@gmail.com';
            $matkhau = '123';
    
            // Tạo đối tượng đăng nhập và gọi phương thức đăng nhập với thông tin đăng nhập hợp lệ
            $login = new Login($this->conn);
            $result = $login->authenticate($email, $matkhau);
    
            // Kiểm tra kết quả trả về phải là true
            $this->assertTrue($result);
        }
    
        public function testLoginWithInvalidCredentials()
        {
            // Khởi tạo tên đăng nhập và mật khẩu không hợp lệ
            $email = 'invaliduser';
            $matkhau = 'invalidpassword';
    
            // Tạo đối tượng đăng nhập và gọi phương thức đăng nhập với thông tin đăng nhập không hợp lệ
            $login = new Login($this->conn);
            $result = $login->authenticate($email, $matkhau);
    
            // Kiểm tra kết quả trả về phải là false
            $this->assertFalse($result);
        }

        public function testLoginWithEmptyCredentials()
        {
            // Khởi tạo tên đăng nhập và mật khẩu không hợp lệ
            $email = '';
            $matkhau = '';
    
            // Tạo đối tượng đăng nhập và gọi phương thức đăng nhập với thông tin đăng nhập không hợp lệ
            $login = new Login($this->conn);
            $result = $login->authenticate($email, $matkhau);
    
            // Kiểm tra kết quả trả về phải là false
            $this->assertFalse($result);
        }

        public function testLoginWithEmailEmpty()
        {
            // Khởi tạo tên đăng nhập và mật khẩu không hợp lệ
            $email = '';
            $matkhau = '123';
    
            // Tạo đối tượng đăng nhập và gọi phương thức đăng nhập với thông tin đăng nhập không hợp lệ
            $login = new Login($this->conn);
            $result = $login->authenticate($email, $matkhau);
    
            // Kiểm tra kết quả trả về phải là false
            $this->assertFalse($result);
        }

        public function testLoginWithUserPassEmpty()
        {
            // Khởi tạo tên đăng nhập và mật khẩu không hợp lệ
            $email = 'ttp15112001@gmail.com';
            $matkhau = '';
    
            // Tạo đối tượng đăng nhập và gọi phương thức đăng nhập với thông tin đăng nhập không hợp lệ
            $login = new Login($this->conn);
            $result = $login->authenticate($email, $matkhau);
    
            // Kiểm tra kết quả trả về phải là false
            $this->assertFalse($result);
        }

        
    }
?>