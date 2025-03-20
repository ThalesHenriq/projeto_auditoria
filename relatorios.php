<?php
include('config.php');

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
