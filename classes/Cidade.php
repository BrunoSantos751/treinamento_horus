<?php
class Cidade {
    public static function all() {
        $conn = new PDO("mysql:host=127.0.0.1;dbname=treinamento;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT * FROM cidade");
        return $result->fetchAll();
    }
}