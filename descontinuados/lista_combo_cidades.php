<?php
function lista_combo_cidades($id = null)
{
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

	$query = 'SELECT id, nome FROM cidade';
	$result = $conn->query($query);

	if ($result) {
		while ($row = $result->fetch_assoc()) {
			$row_id = $row['id'];
			$row_nome = htmlspecialchars($row['nome'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
			$check = ($row_id == $id) ? ' selected="selected"' : '';
			$output .= "<option value=\"{$row_id}\"{$check}>{$row_nome}</option>\n";
		}
	}


	return $output;
}