<?php
class Estado {
    public $id;
    public $nome;
    public $sigla;

    private static $conn;
    public static function getConnection() {
    if (empty(self::$conn)) {
    $conexao = parse_ini_file( 'config/livro.ini');
    $host = $conexao['host'];
    $name = $conexao['name'];
    $user = $conexao['user'];
    $pass = $conexao['pass'];
    self::$conn = new PDO("mysql:host={$host};dbname={$name};user={$user};password={$pass}");
    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return self::$conn;
    } 

    public function save($estado) {
        $result = self::getConnection()->query("SELECT max(id) as next FROM estado");
        $row = $result->fetch();
        $estado['id'] = (int) $row['next'] +1;
        $sql = "INSERT INTO estado (id, nome, sigla) VALUES ('{$estado['id']}', '{$estado['nome']}', '{$estado['sigla']}')";
        $db = self::getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
    public static function all() {
        $sql = "SELECT * FROM estado";
        $db = self::getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Estado');
    }
    public static function delete($id) {
        $sql = "DELETE FROM estado WHERE id = {$id}";
        $db = self::getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
}