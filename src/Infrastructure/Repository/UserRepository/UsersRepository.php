<?php

namespace App\Infrastructure\Repository\UserRepository;

use PDO;
use PDOException;

class UsersRepository {
    protected $pdo;
    public function __construct() {
        $dsn = 'pgsql:host=postgres;dbname=homestead;port=5432';
        $username = 'root';
        $password = 'secret';
        try {
            $this->pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            echo 'Ошибка подключения к БД: ' . $e->getMessage();
        }
    }

    public function insert(string $name, int $age) {
        $sql = "INSERT INTO users (name, age) VALUES (:name, :age)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'age' => $age
        ]);
    }

    public function get() {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $objects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $objects;
    }

}
?>