<?php
class database {
    private $host = 'localhost';    // Tên service trong docker-compose
    private $user = 'root';
    private $pass = ''; // Mật khẩu bạn đã đặt
    private $db   = 'techstore-managament';        // Tên database bạn đã tạo
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
         $this->conn->set_charset("utf8mb4");
    }

    // Hàm bổ trợ để chạy câu lệnh SELECT mà bạn đang dùng ở index.php
    public function select($sql) {
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>