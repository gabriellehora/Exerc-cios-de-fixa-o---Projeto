<?php

function obterClientes(PDO $pdo): array {
    $stmt = $pdo->query('SELECT * FROM clientes ORDER BY nome');
    return $stmt->fetchAll();
}

function obterClientePorId(PDO $pdo, int $id) {
    $stmt = $pdo->prepare( 'SELECT * FROM clientes WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function inserirCliente(
    PDO $pdo,
    string $nome,
    string $cpf,
    string $email,
    string $telefone,
    string $endereco
): void {

    $stmt = $pdo->prepare('INSERT INTO clientes (nome, cpf, email, telefone, endereco) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([
        $nome,
        $cpf,
        $email,
        $telefone,
        $endereco
    ]);
}

function atualizarCliente(
    PDO $pdo,
    int $id,
    string $nome,
    string $cpf,
    string $email,
    string $telefone,
    string $endereco
): void {

    $stmt = $pdo->prepare('UPDATE clientes SET nome = ?, cpf = ?, email = ?, telefone = ?, endereco = ? WHERE id = ?');
    $stmt->execute([
        $nome,
        $cpf,
        $email,
        $telefone,
        $endereco,
        $id
    ]);
}

function excluirCliente(PDO $pdo, int $id): void {
    $stmt = $pdo->prepare('DELETE FROM clientes WHERE id = ?');
    $stmt->execute([$id]);
}