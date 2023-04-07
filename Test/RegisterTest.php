<?php 
    include('Register.php');
    use PHPUnit\Framework\TestCase;

    class RegisterTest extends TestCase
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
    
        public function testValid()
        {
            // Khởi tạo đăng ký hợp lệ
            $tenkhachhang ='tran thanh p';
            $email = 'tranthanhp@gmail.com';
            $diachi = 'phu quoc';
            $matkhau =  '123';
            $dienthoai = '0907703123';
    
            // Tạo đối tượng đăng ký và gọi phương thức đăng ký với thông tin đăng nhập hợp lệ
            $register = new Register($this->conn);
            $result = $register->save($tenkhachhang, $email, $diachi, $matkhau, $dienthoai);
    
            // Kiểm tra kết quả trả về phải là true
            $this->assertTrue($result);
        }

        public function testEmpty()
        {
            // Khởi tạo tên đăng ký và mật khẩu hợp lệ
            $tenkhachhang ='';
            $email = '';
            $diachi = '';
            $matkhau =  '';
            $dienthoai = '';
    
            // Tạo đối tượng đăng nhập và gọi phương thức đăng nhập với thông tin đăng nhập hợp lệ
            $register = new Register($this->conn);
            $result = $register->save($tenkhachhang, $email, $diachi, $matkhau, $dienthoai);
    
            // Kiểm tra kết quả trả về phải là true
            $this->assertFalse($result);
        }

        public function testDuplicateEmail()
        {
            // Khởi tạo đăng ký email đã tồn tại trong cơ sở dữ liệu
            $tenkhachhang ='tran thanh p';
            $email = 'ttp15112001@gmail.com12';
            $diachi = 'phu quoc';
            $matkhau =  '123';
            $dienthoai = '0907703123';
    
            // Tạo đối tượng đăng nhập và gọi phương thức đăng ký một email đã tồn tại xem có thành công hay không
            $register = new Register($this->conn);
            $result = $register->DuplicateEmail($tenkhachhang, $email, $diachi, $matkhau, $dienthoai);
    
            // Kiểm tra kết quả trả về phải là true là đăng ký thất bại.
            $this->assertTrue($result);
        }

    }
?>