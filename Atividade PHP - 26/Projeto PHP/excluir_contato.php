<?php
require_once 'config.php';
require_once 'cabecalho.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID não informado.');
}

/* Busca o contato */
$stmt = $pdo->prepare(
    'SELECT * FROM contatos WHERE id = ?'
);

$stmt->execute([$id]);

$contato = $stmt->fetch();

if (!$contato) {
    die('Contato não encontrado.');
}

/* Exclui somente após confirmação */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare(
        'DELETE FROM contatos WHERE id = ?'
    );

    $stmt->execute([$id]);

    header('Location: index.php');
    exit;
}
?>

<h2>Confirmar Exclusão</h2>

<p>Deseja realmente excluir este contato?</p>

<ul>
    <li><strong>Nome:</strong> <?= htmlspecialchars($contato['nome']) ?></li>
    <li><strong>E-mail:</strong> <?= htmlspecialchars($contato['email']) ?></li>
    <li><strong>Telefone:</strong> <?= htmlspecialchars($contato['telefone']) ?></li>
</ul>

<form method="POST">

    <button type="submit">
        Confirmar Exclusão
    </button>

    <a href="index.php">
        Cancelar
    </a>

</form>

<?php include 'rodape.php'; ?>