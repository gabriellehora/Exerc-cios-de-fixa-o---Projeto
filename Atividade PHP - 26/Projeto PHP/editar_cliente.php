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

$erro = '';

/* Atualiza o cliente */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome     = trim($_POST['nome'] ?? '');
    $cpf      = trim($_POST['cpf'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    if (strlen($cpf) != 14) {

        $erro = 'CPF inválido!';

    } else {

        $stmt = $pdo->prepare(
            'UPDATE clientes
             SET nome = ?, cpf = ?, email = ?, telefone = ?, endereco = ?
             WHERE id = ?'
        );

        $stmt->execute([
            $nome,
            $cpf,
            $email,
            $telefone,
            $endereco,
            $id
        ]);

        header('Location: clientes.php');
        exit;
    }
}
?>

<h2>Editar Cliente</h2>

<?php if ($erro): ?>
    <p><?= $erro ?></p>
<?php endif; ?>

<form action="" method="POST">

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

<?php include 'rodape.php'; ?>