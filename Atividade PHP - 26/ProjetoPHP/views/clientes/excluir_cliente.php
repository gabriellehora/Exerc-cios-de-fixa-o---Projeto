<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/ClienteDAO.php';
include __DIR__ . '/../cabecalho.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID não informado.');
}

$cliente = obterClientePorId($pdo, $id);

if (!$cliente) {
    die('Cliente não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    excluirCliente($pdo, $id);
    header('Location: ../../index.php?pagina=clientes');
    exit;
}
?>

<h2>Confirmar Exclusão</h2>
<p>Deseja realmente excluir este cliente?</p>

<ul>
    <li><strong>Nome:</strong> <?= htmlspecialchars($cliente['nome']) ?></li>
    <li><strong>CPF:</strong> <?= htmlspecialchars($cliente['cpf']) ?></li>
    <li><strong>E-mail:</strong> <?= htmlspecialchars($cliente['email']) ?></li>
</ul>

<form method="POST">
    <button type="submit">Confirmar Exclusão</button>

    <a href="../../index.php?pagina=clientes">
        Cancelar
    </a>
</form>

<?php include __DIR__ . '/../rodape.php'; ?>