<?php
require_once dirname(__DIR__, 2) . '/config/database.php';
require_once dirname(__DIR__, 2) . '/models/ContatoDAO.php';
include __DIR__ . '/../cabecalho.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID não informado.');
}

$contato = obterContatoPorId($pdo, $id);

if (!$contato) {
    die('Contato não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    excluirContato($pdo, $id);

    header('Location: ../../index.php?pagina=contatos');
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

    <a href="../../index.php?pagina=contatos">
        Cancelar
    </a>
</form>

<?php include __DIR__ . '/../rodape.php'; ?>