<?php
class AccountModel {
    private $conn;
    private $table_name = "account";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Hàm kiểm tra xem tài khoản có tồn tại không
    public function getAccountByUsername($username) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ); // Trả về đối tượng tài khoản
    }

    // Hàm lưu tài khoản mới
    public function save($username, $fullName, $password, $role = 'user') {
        // Kiểm tra xem tài khoản đã tồn tại chưa
        if ($this->getAccountByUsername($username)) {
            return false; // Nếu tài khoản đã tồn tại, trả về false
        }

        // Thực hiện truy vấn thêm tài khoản mới
        $query = "INSERT INTO " . $this->table_name . " SET username=:username, fullname=:fullname, password=:password, role=:role";
        $stmt = $this->conn->prepare($query);

        // Làm sạch và bảo vệ dữ liệu
        $username = htmlspecialchars(strip_tags($username));
        $fullName = htmlspecialchars(strip_tags($fullName));
        $password = password_hash($password, PASSWORD_BCRYPT); // Mã hóa mật khẩu
        $role = htmlspecialchars(strip_tags($role));

        // Gắn tham số vào câu truy vấn
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":fullname", $fullName);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);

        // Thực thi câu truy vấn và trả về kết quả
        if ($stmt->execute()) {
            return true; // Thành công
        }

        return false; // Thất bại
    }
}
?>