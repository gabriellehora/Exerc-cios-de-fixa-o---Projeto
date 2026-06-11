<?php

function obterContatos(PDO $pdo): array {
    $stmt = $pdo->query('SELECT * FROM contatos ORDER BY nome');
    return $stmt->fetchAll();
}

function obterContatoPorId(PDO $pdo, int $id) {
    $stmt = $pdo->prepare('SELECT * FROM contatos WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function inserirContato(
    PDO $pdo,
    string $nome,
    string $email,
    string $telefone
): void {

    $stmt = $pdo->prepare('INSERT INTO contatos (nome, email, telefone) VALUES (?, ?, ?)');
    $stmt->execute([
        $nome,
        $email,
        $telefone
    ]);
}

function atualizarContato(
    PDO $pdo,
    int $id,
    string $nome,
    string $email,
    string $telefone
): void {

    $stmt = $pdo->prepare('UPDATE contatos SET nome = ?, email = ?, telefone = ? WHERE id = ?');
    $stmt->execute([
        $nome,
        $email,
        $telefone,
        $id
    ]);
}

function excluirContato(PDO $pdo, int $id): void {
    $stmt = $pdo->prepare('DELETE FROM contatos WHERE id = ?');
    $stmt->execute([$id]);
}