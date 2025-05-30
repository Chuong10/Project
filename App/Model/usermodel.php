<?php
require_once __DIR__ . '/../../Core/database.php';
class usermodel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getAllUsers()
    {
        $stmt = $this->db->prepare("SELECT * FROM users ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($fullname, $username, $password, $role = 'user') 
    {
        // Kiểm tra username đã tồn tại chưa
    $check = $this->db->prepare("SELECT id FROM users WHERE username = ?");
    $check->execute([$username]);
    if ($check->fetch()) {
        throw new Exception("Tên đăng nhập đã tồn tại.");
    }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (fullname, username, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$fullname, $username, $hash, $role]);

        return $this->db->lastInsertId(); // để lưu vào session
    }

}
