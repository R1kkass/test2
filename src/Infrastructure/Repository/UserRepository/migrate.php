<?php

class Migrate {
    protected $pdo;
    

    public function createTableUser() {
        $dsn = 'pgsql:host=postgres;dbname=homestead;port=5432';
        $username = 'root';
        $password = 'secret';
        try {
            $this->pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            echo 'Ошибка подключения к БД: ' . $e->getMessage();
        }
        $sql = "CREATE TABLE users (
            age int,
            name varchar(255)
        );";
        $stmt = $this->pdo->exec($sql);
    }
}