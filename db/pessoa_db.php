<?php

function lista_pessoas() {
    $conn = new mysqli('127.0.0.1', "root", "", "treinamento");
    $result = $conn->query("SELECT * FROM pessoa ORDER BY id");
    $list = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    return $list;
}
function exclui_pessoa($id) {
    $conn = new mysqli('127.0.0.1', "root", "", "treinamento");
    $result = $conn->query("DELETE FROM pessoa WHERE id='{$id}'");
    $conn->close();
    return $result;
}
function get_pessoa($id) {
    $conn = new mysqli('127.0.0.1', "root", "", "treinamento");
    $result = $conn->query("SELECT * FROM pessoa WHERE id='{$id}'");
    $pessoa = $result->fetch_assoc();
    $conn->close();
    return $pessoa;
}
function get_next_pessoa() {
    $conn = new mysqli('127.0.0.1', "root", "", "treinamento");
    $result = $conn->query("SELECT max(id) as next FROM pessoa");
    $next = (int) $result->fetch_assoc()['next'] +1;
    $conn->close();
    return $next;
}
function insert_pessoa($pessoa) {
    $conn = new mysqli('127.0.0.1', "root", "", "treinamento");
    $sql = "INSERT INTO pessoa (id, nome, endereco, bairro,
    telefone, email, id_cidade)
    VALUES ( '{$pessoa['id']}', '{$pessoa['nome']}',
    '{$pessoa['endereco']}',
    '{$pessoa['bairro']}', '{$pessoa['telefone']}',
    '{$pessoa['email']}', '{$pessoa['id_cidade']}'
    )";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}
function update_pessoa($pessoa) {
    $conn = new mysqli('127.0.0.1', "root", "", "treinamento");
    $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}',
    endereco = '{$pessoa['endereco']}',
    bairro = '{$pessoa['bairro']}',
    telefone = '{$pessoa['telefone']}',
    email = '{$pessoa['email']}',
    id_cidade = '{$pessoa['id_cidade']}'
    WHERE id = '{$pessoa['id']}'";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}