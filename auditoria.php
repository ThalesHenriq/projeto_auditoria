<?php
include('config.php');

// Registro de auditoria
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipamento_id = $_POST['equipamento_id'];
    $descricao = $_POST['descricao'];
    $alterado_por = $_POST['alterado_por'];

    // Insere a auditoria no banco
    $stmt = $pdo->prepare("INSERT INTO auditorias (equipamento_id, data_auditoria, descricao, alterado_por) 
                           VALUES (?, NOW(), ?, ?)");
    $stmt->execute([$equipamento_id, $descricao, $alterado_por]);

    echo "Auditoria registrada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar Auditoria</title>
</head>
<body>
    <h1>Registrar Auditoria</h1>
    <form method="POST" action="">
        Equipamento ID: <input type="number" name="equipamento_id" required><br>
        Descrição: <textarea name="descricao" required></textarea><br>
        Alterado Por: <input type="text" name="alterado_por" required><br>
        <button type="submit">Registrar Auditoria</button>
    </form>
</body>
</html>
