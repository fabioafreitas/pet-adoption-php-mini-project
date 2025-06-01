<?php

require_once 'db.php';

function getPets() {
    $pdo = getDbConnection();
    $stmt = $pdo->query("
        SELECT 
            pets.id AS pet_id,
            pets.nome AS pet_nome, 
            pets.raca AS pet_raca, 
            pets.url_foto AS pet_foto_url, 
            usuarios.nome AS tutor_nome 
        FROM 
            pets
        LEFT JOIN 
            usuarios ON pets.id_usuario=usuarios.id
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addPet($nome, $raca, $urlFoto) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare("INSERT INTO pets (nome, raca, url_foto) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $raca, $urlFoto]);
}

function adotarPet($petId, $usuarioId) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare("UPDATE pets SET id_usuario = ? WHERE id = ?");
    $stmt->execute([$usuarioId, $petId]);
}

function deletePet($id) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare("DELETE FROM pets WHERE id = ?");
    $stmt->execute([$id]);
}

?>