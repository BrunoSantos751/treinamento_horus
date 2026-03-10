<?php
$dados = $_POST;
if ($dados['id']) {
    $user = "root";
    $host = "localhost";
    $password = "Root@1234";
    $dbName = "treinamento";

    $conn = new mysqli($host, $user, $password, $dbName);
    $sql = "UPDATE pessoa SET nome = '{$dados['nome']}',
            endereco = '{$dados['endereco']}',
            bairro = '{$dados['bairro']}',
            telefone = '{$dados['telefone']}',
            email = '{$dados['email']}',
            id_cidade = '{$dados['id_cidade']}'
            WHERE id = '{$dados['id']}'";
    $result = $conn->query($sql);

    if ($result) {
        print 'Registro atualizado com sucesso';
    } else {
        print $conn->error;
    }
}