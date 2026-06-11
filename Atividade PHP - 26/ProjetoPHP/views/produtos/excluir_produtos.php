<?php
require_once dirname(__DIR__, 2) . '/config/database.php';
require_once dirname(__DIR__, 2) . '/models/ProdutoDAO.php';
include __DIR__ . '/../cabecalho.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID não informado.');
}

$produto = obterProdutoPorId($pdo, $id);

if (!$produto) {
    die('Produto não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    excluirProduto($pdo, $id);

    header('Location: ../../index.php?pagina=produtos');
}
?>

<h2>Confirmar Exclusão</h2>

<p>Deseja realmente excluir este produto?</p>

<ul>
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
    <img
        src="../../<?= $produto['imagem'] ?>"
        width="100">
    <br><br>

<?php endif; ?>

<form method="POST">

    <button type="submit">
        Confirmar Exclusão
    </button>

    <a href="../../index.php?pagina=produtos">

</form>

<?php include __DIR__ . '/../rodape.php'; ?>