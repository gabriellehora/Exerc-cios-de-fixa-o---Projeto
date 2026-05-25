<?php
require_once 'config.php';
require_once 'cabecalho.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID não informado.');
}

/* Busca o produto */
$stmt = $pdo->prepare(
    'SELECT * FROM produtos WHERE id = ?'
);

$stmt->execute([$id]);

$produto = $stmt->fetch();

if (!$produto) {
    die('Produto não encontrado.');
}

/* Exclui após confirmação */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare(
        'DELETE FROM produtos WHERE id = ?'
    );

    $stmt->execute([$id]);

    header('Location: produtos.php');
    exit;
}
?>

<h2>Confirmar Exclusão</h2>

<p>Deseja realmente excluir este produto?</p>

<ul>
    <li>
        <strong>Nome:</strong>
        <?= htmlspecialchars($produto['nome']) ?>
    </li>

    <li>
        <strong>Descrição:</strong>
        <?= htmlspecialchars($produto['descricao']) ?>
    </li>

    <li>
        <strong>Preço:</strong>
        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
    </li>
</ul>

<?php if (!empty($produto['imagem'])): ?>

    <img src="<?= $produto['imagem'] ?>"
         width="100">

    <br><br>

<?php endif; ?>

<form method="POST">

    <button type="submit">
        Confirmar Exclusão
    </button>

    <a href="produtos.php">
        Cancelar
    </a>

</form>

<?php include 'rodape.php'; ?>