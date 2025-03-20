<?php
include('config.php');

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $data_aquisicao = $_POST['data_aquisicao'];
    $status = $_POST['status'];

    // Insere o equipamento no banco
    $stmt = $pdo->prepare("INSERT INTO equipamentos (nome, descricao, tipo, data_aquisicao, status) 
                           VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $descricao, $tipo, $data_aquisicao, $status]);

    echo "Equipamento cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Equipamentos</title>
</head>
<body>
    <h1>Cadastrar Equipamento</h1>
    <form method="POST" action="">
        Nome: <input type="text" name="nome" required><br>
        Descrição: <textarea name="descricao"></textarea><br>
        Tipo: <input type="text" name="tipo"><br>
        Data de Aquisição: <input type="date" name="data_aquisicao"><br>
        Status: <input type="text" name="status"><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
