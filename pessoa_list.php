<html>

<head>
    <meta charset="utf-8">
    <title> Listagem de pessoas </title>
    <link href="css/list.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
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

    print '<table border=1>';
    print '<thead>';
    print '<tr>';
    print "<th> </th>";
    print "<th> </th>";
    print "<th> Id </th>";
    print "<th> Nome </th>";
    print "<th> Endereço </th>";
    print "<th> Bairro </th>";
    print "<th> Telefone </th>";
    print '</tr>';
    print '</thead>';
    print '<tbody>';

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nome = $row['nome'];
        $endereco = $row['endereco'];
        $bairro = $row['bairro'];
        $telefone = $row['telefone'];
        $email = $row['email'];

        print '<tr>';
        print "<td align='center'>
            <a href='pessoa_form.php?action=edit&id={$id}'>
                <img src='images/edit.svg' style='width:17px'>
            </a>
        </td>";
        print "<td align='center'>
            <a href='pessoa_list.php?action=delete&id={$id}'>
                <img src='images/remove.svg' style='width:17px'>
            </a>
        </td>";
        print "<td> {$id} </td>";
        print "<td> {$nome} </td>";
        print "<td> {$endereco} </td>";
        print "<td> {$bairro} </td>";
        print "<td> {$telefone} </td>";
        print '</tr>';
    }
    print '</tbody>';
    print '</table>';
    ?>
    <button onclick="window.location='pessoa_form.php'">
        <img src='images/insert.svg' style='width:17px'> Inserir
    </button>
</body>
</html>