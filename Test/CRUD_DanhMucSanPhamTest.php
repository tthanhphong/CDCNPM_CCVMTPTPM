<?php 
    include('CRUD_DanhMucSanPham.php');
    use PHPUnit\Framework\TestCase;

    class CRUD_DanhMucSanPhamTest extends TestCase
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
            // Khởi tạo tạo danh mục hợp lệ
            $tendanhmuc = 'Thể Thao Điện Tử';
            $thutu ='1';
    
            // Tạo đối tượng danh mục và gọi phương thức create với thông tin danh mục hợp lệ
            $CRUD_DanhMucSanPham = new CRUD_DanhMucSanPham($this->conn);
            $result = $CRUD_DanhMucSanPham->create($tendanhmuc, $thutu);
    
            // Kiểm tra kết quả trả về phải là true
            $this->assertTrue($result);
        }

        public function testEmpty()
        {
            // Khởi tạo tên danh mục và thứ tự không hợp lệ
            $tendanhmuc = '';
            $thutu ='';

            // Tạo đối tượng danh mục và gọi phương thức create với thông tin danh mục không hợp lệ
            $CRUD_DanhMucSanPham = new CRUD_DanhMucSanPham($this->conn);
            $result = $CRUD_DanhMucSanPham->create($tendanhmuc, $thutu);
    
            // Kiểm tra kết quả trả về phải là false
            $this->assertFalse($result);
        }

        public function testUpdateSuccessDanhMuc()
        {
            // Khởi tạo tên danh mục và thứ tự có tồn tại để cập nhật
            $tendanhmuc = 'Thể Thao Điện Tử';
            $thutu = '1';
            // Tạo đối tượng danh mục và gọi phương thức Update với thông tin danh mục hợp lệ
            $CRUD_DanhMucSanPham = new CRUD_DanhMucSanPham($this->conn);
            $result = $CRUD_DanhMucSanPham->Update($tendanhmuc,$thutu);
    
            // Kiểm tra kết quả trả về phải là true
            $this->assertTrue($result);
        }

        public function testUpdateFailDanhMuc()
        {
            // Khởi tạo tên danh mục và thứ tự không tồn tại để cập nhật
            $tendanhmuc = 'Thể Thao Điện Tử';
            $thutu = '1';
            // Tạo đối tượng danh mục và gọi phương thức Update với thông tin danh mục không hợp lệ
            $CRUD_DanhMucSanPham = new CRUD_DanhMucSanPham($this->conn);
            $result = $CRUD_DanhMucSanPham->Update($tendanhmuc,$thutu);
    
            // Kiểm tra kết quả trả về phải là true
            $this->assertFalse($result);
        }

        public function testDeleteSuccessDanhMuc()
        {
            // Khởi tạo tên danh mục và thứ tự có tồn tại để cập nhật
            $tendanhmuc = 'Thể Thao Điện Tử 1';
            $thutu = '1';
            // Tạo đối tượng danh mục và gọi phương thức Update với thông tin danh mục hợp lệ
            $CRUD_DanhMucSanPham = new CRUD_DanhMucSanPham($this->conn);
            $result = $CRUD_DanhMucSanPham->Delete($tendanhmuc,$thutu);
    
            // Kiểm tra kết quả trả về phải là true
            $this->assertTrue($result);
        }

        public function testDeleteFailDanhMuc()
        {
            // Khởi tạo tên danh mục và thứ tự không tồn tạ
            $tendanhmuc = 'Điện Tử';
            $thutu = '1';
            // Tạo đối tượng danh mục và gọi phương thức Delete với thông tin danh mục không hợp lệ
            $CRUD_DanhMucSanPham = new CRUD_DanhMucSanPham($this->conn);
            $result = $CRUD_DanhMucSanPham->Delete($tendanhmuc,$thutu);
    
            // Kiểm tra kết quả trả về phải là false
            $this->assertFalse($result);
        }

        public function testFindByNameDanhMuc()
        {
            // Khởi tạo tên danh mục và thứ tự không tồn tạ
            $tendanhmuc = 'Thể Thao';
            $thutu = '3';
            // Tạo đối tượng danh mục và gọi phương thức Delete với thông tin danh mục không hợp lệ
            $CRUD_DanhMucSanPham = new CRUD_DanhMucSanPham($this->conn);
            $result = $CRUD_DanhMucSanPham->findByName($tendanhmuc,$thutu);
    
            // Kiểm tra kết quả trả về phải là false
            $this->assertTrue($result);
        }

        public function testFindByNameFailDanhMuc()
        {
            // Khởi tạo tên danh mục và thứ tự không tồn tạ
            $tendanhmuc = 'Điền Kinh';
            $thutu = '1';
            // Tạo đối tượng danh mục và gọi phương thức Delete với thông tin danh mục không hợp lệ
            $CRUD_DanhMucSanPham = new CRUD_DanhMucSanPham($this->conn);
            $result = $CRUD_DanhMucSanPham->findByName($tendanhmuc,$thutu);
    
            // Kiểm tra kết quả trả về phải là false
            $this->assertFalse($result);
        }


    }
?>