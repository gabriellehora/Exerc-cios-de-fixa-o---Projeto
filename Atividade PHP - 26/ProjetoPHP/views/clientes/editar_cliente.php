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

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome     = trim($_POST['nome'] ?? '');
    $cpf      = trim($_POST['cpf'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    if (strlen($cpf) != 14) {

        $erro = 'CPF inválido!';

    } else {
        atualizarCliente(
            $pdo,
            $id,
            $nome,
            $cpf,
            $email,
            $telefone,
            $endereco
        );
        header('Location: ../../index.php?pagina=clientes');
        exit;
    }
}
?>

<h2>Editar Cliente</h2>

<?php if ($erro): ?>
    <p style="color:red;"><?= $erro ?></p>
<?php endif; ?>

<form method="POST">

    <label>Nome:</label><br>
    <input type="text" name="nome"
        value="<?= htmlspecialchars($cliente['nome']) ?>">
    <br><br>

    <label>CPF:</label><br>
    <input type="text" name="cpf"
        value="<?= htmlspecialchars($cliente['cpf']) ?>">
    <br><br>

    <label>E-mail:</label><br>
    <input type="email" name="email"
        value="<?= htmlspecialchars($cliente['email']) ?>">
    <br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone"
        value="<?= htmlspecialchars($cliente['telefone']) ?>">
    <br><br>

    <label>Endereço:</label><br>
    <input type="text" name="endereco"
        value="<?= htmlspecialchars($cliente['endereco']) ?>">
    <br><br>

    <button type="submit">
        Salvar Alterações
    </button>

</form>

<?php include __DIR__ . '/../rodape.php'; ?>