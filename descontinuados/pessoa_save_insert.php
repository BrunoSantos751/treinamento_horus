<?php
$dados = $_POST;
$output = '';

$user = "root";
$host = "localhost";
$password = "Root@1234";
$dbName = "treinamento";

$conn = new mysqli($host, $user, $password, $dbName);

if ($conn->connect_error) {
	// Falha na conexão — retorna lista vazia
	return $output;
}

$result = $conn->query("SELECT max(id) as next FROM pessoa");
$next = (int) $result->fetch_assoc()['next'] + 1;

$sql = "INSERT INTO pessoa (
    id,
    nome,
    endereco,
    bairro,
    telefone,
    email,
    id_cidade
) VALUES (
    '{$next}',
    '{$dados['nome']}',
    '{$dados['endereco']}',
    '{$dados['bairro']}',
    '{$dados['telefone']}',
    '{$dados['email']}',
    '{$dados['id_cidade']}'
)";

$result = $conn->query($sql);

if ($result) {
	print 'Registro inserido com sucesso';
} else {
	print mysqli_error($conn);
}
