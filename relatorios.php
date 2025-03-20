<?php
include('config.php');
// Validação de entrada para o cadastro de equipamentos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $tipo = trim($_POST['tipo']);
    $data_aquisicao = trim($_POST['data_aquisicao']);
    $status = trim($_POST['status']);
    
    if (empty($nome) || empty($descricao) || empty($tipo) || empty($data_aquisicao) || empty($status)) {
        echo "Por favor, preencha todos os campos!";
    } else {
        // Insere o equipamento no banco
        $stmt = $pdo->prepare("INSERT INTO equipamentos (nome, descricao, tipo, data_aquisicao, status) 
                               VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $descricao, $tipo, $data_aquisicao, $status]);
        echo "Equipamento cadastrado com sucesso!";
    }
}
// Listando equipamentos
$stmt = $pdo->query("SELECT * FROM equipamentos");
$equipamentos = $stmt->fetchAll();

foreach ($equipamentos as $equipamento) {
    echo "ID: " . $equipamento['id'] . " - Nome: " . $equipamento['nome'] . "<br>";
    
    // Listando auditorias de cada equipamento
    $stmt_auditoria = $pdo->prepare("SELECT * FROM auditorias WHERE equipamento_id = ?");
    $stmt_auditoria->execute([$equipamento['id']]);
    $auditorias = $stmt_auditoria->fetchAll();
    
    echo "<h3>Auditorias:</h3>";
    foreach ($auditorias as $auditoria) {
        echo "Data: " . $auditoria['data_auditoria'] . " - Descrição: " . $auditoria['descricao'] . "<br>";
    }
    echo "<hr>";
}
?>
