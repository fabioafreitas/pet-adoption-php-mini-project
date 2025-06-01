<?php

require_once 'db.php';

function validarLoginAdmin($email, $senha) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM admins WHERE email = ? AND senha = ?");
    $stmt->execute([$email, $senha]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Primeiro, verifica se $result não é nulo
    if ($result) {
        // Depois, verifica se o total é maior que 0
        if ($result['total'] > 0) {
            return true;
        }
    }
    return false;
}

?>