<?php
$dados = $_GET;
if (!empty($dados['id'])) {
$user = "root";
$host = "localhost";
$password = "Root@1234";
$dbName = "treinamento";

$conn = new mysqli($host, $user, $password, $dbName);
$sql = "DELETE FROM pessoa WHERE id = '{$dados['id']}'";
$result = $conn->query($sql);
if ($result) {
print 'Registro excluído com sucesso';
}
else {
print $conn->error;
}
}