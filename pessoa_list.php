<?php
$user = "root";
$host = "127.0.0.1";
$password = "";
$dbName = "treinamento";

$conn = new mysqli($host, $user, $password, $dbName);
if (!empty($_GET['action']) AND $_GET['action'] == 'delete') {
$id = (int) $_GET['id'];
$result = $conn->query("DELETE FROM pessoa WHERE id='{$id}'");
}
$result = $conn->query("SELECT * FROM pessoa ORDER BY id");
$items = '';
while ($row = $result->fetch_assoc()) {
$item = file_get_contents('html/item.html');
$item = str_replace('{id}', $row['id'], $item);
$item = str_replace('{nome}', $row['nome'], $item);
$item = str_replace('{endereco}', $row['endereco'], $item);
$item = str_replace('{bairro}', $row['bairro'], $item);
$item = str_replace('{telefone}', $row['telefone'], $item);
$items.= $item;
}
$list = file_get_contents('html/list.html');
$list = str_replace('{items}', $items, $list);
print $list;