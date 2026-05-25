<?php
require_once 'config.php';
require_once 'cabecalho.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID não informado.');
}

/* Busca o cliente */
$stmt = $pdo->prepare(
    'SELECT * FROM clientes WHERE id = ?'
);

$stmt->execute([$id]);

$cliente = $stmt->fetch();

if (!$cliente) {
    die('Cliente não encontrado.');
}

/* Exclui após confirmação */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare(
        'DELETE FROM clientes WHERE id = ?'
    );

    $stmt->execute([$id]);

    header('Location: clientes.php');
    exit;
}
?>

<h2>Confirmar Exclusão</h2>

<p>Deseja realmente excluir este cliente?</p>

<ul>
    <li><strong>Nome:</strong>
        <?= htmlspecialchars($cliente['nome']) ?>
    </li>

    <li><strong>CPF:</strong>
        <?= htmlspecialchars($cliente['cpf']) ?>
    </li>

    <li><strong>E-mail:</strong>
        <?= htmlspecialchars($cliente['email']) ?>
    </li>
</ul>

<form method="POST">

    <button type="submit">
        Confirmar Exclusão
    </button>

    <a href="clientes.php">
        Cancelar
    </a>

</form>

<?php include 'rodape.php'; ?>