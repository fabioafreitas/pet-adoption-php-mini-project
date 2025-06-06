<?php

if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
    http_response_code(403);
    exit('Acesso proibido.');
}

require_once 'db.php';

function getUsuarios() {
    $pdo = getDbConnection();
    $stmt = $pdo->query("SELECT * FROM usuarios");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addUsuario($nome, $email, $telefone) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, telefone) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $email, $telefone]);
}

function deleteUsuario($id) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
}

?>