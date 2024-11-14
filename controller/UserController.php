<?php

require_once '../../config/db.php';

class UserController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Hàm để lấy toàn bộ user
    public function getAllUsers()
    {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }

    // Hàm để insert user
    public function addUser(
        $Username,
        $ProfileName,
        $Email,
        $Password,
        $Country,
        $IsVerified,
        $Role
    ) {
        $stmt = $this->pdo->prepare("INSERT INTO users (
            Username,
            ProfileName,
            Email,
            Password,
            Country,
            IsVerified,
            Role
        ) VALUES (
            :Username,
            :ProfileName,
            :Email,
            :Password,
            :Country,
            :IsVerified,
            :Role
        )");

        $hashPassword = password_hash($Password, PASSWORD_DEFAULT);

        $stmt->bindParam(':Username', $Username);
        $stmt->bindParam(':ProfileName', $ProfileName);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Password', $hashPassword);
        $stmt->bindParam(':Country', $Country);
        $stmt->bindParam(':IsVerified', $IsVerified);
        $stmt->bindParam(':Role', $Role);

        return $stmt->execute();
    }
}
