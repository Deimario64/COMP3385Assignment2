<?php

namespace MVCFramework\Model;

class UserModel extends AbstractModel
{
    
    protected $database;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function register($username, $hashedPassword, $email)
    {
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $this->database->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $hashedPassword,
            ':email' => $email,
        ]);
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->database->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function validateForm(array $formData): bool
    {

    }


    public function getUsernameById($userId)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->execute([':id' => $userId]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
