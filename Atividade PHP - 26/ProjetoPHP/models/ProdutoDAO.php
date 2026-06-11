<?php

function obterProdutos(PDO $pdo): array {

    $stmt = $pdo->query('SELECT * FROM produtos ORDER BY descricao');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obterProdutoPorId(PDO $pdo, int $id) {

    $stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function inserirProduto(
    PDO $pdo,
    string $descricao,
    float $preco,
    int $estoque,
    string $imagem
): void {

    $stmt = $pdo->prepare('INSERT INTO produtos (descricao, preco, estoque, imagem) VALUES (?, ?, ?, ?)');
    $stmt->execute([
        $descricao,
        $preco,
        $estoque,
        $imagem
    ]);
}

function atualizarProduto(
    PDO $pdo,
    int $id,
    string $descricao,
    float $preco,
    int $estoque,
    string $imagem
): void {

    $stmt = $pdo->prepare('UPDATE produtos SET descricao = ?, preco = ?, estoque = ?, imagem = ? WHERE id = ?');
    $stmt->execute([
        $descricao,
        $preco,
        $estoque,
        $imagem,
        $id
    ]);
}

function excluirProduto(PDO $pdo, int $id): void {

    $stmt = $pdo->prepare('DELETE FROM produtos WHERE id = ?');
    $stmt->execute([$id]);
}