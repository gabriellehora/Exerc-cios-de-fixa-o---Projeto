<?php
require_once dirname(__DIR__, 2) . '/config/database.php';
require_once dirname(__DIR__, 2) . '/models/ClienteDAO.php';
include __DIR__ . '/../cabecalho.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome     = trim($_POST['nome'] ?? '');
    $cpf      = trim($_POST['cpf'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    if (!$nome || !$cpf || !$email) {
        $erro = "Preencha todos os campos obrigatórios!";
    } else {

        inserirCliente(
            $pdo,
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

<h2>Cadastrar Cliente</h2>

<?php if ($erro): ?>
    <p style="color:red;"><?= $erro ?></p>
<?php endif; ?>

<form method="POST">
    <label>Nome:</label><br>
    <input type="text" name="nome"><br><br>

    <label>CPF:</label><br>
    <input type="text" name="cpf"><br><br>

    <label>E-mail:</label><br>
    <input type="email" name="email"><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone"><br><br>

    <label>Endereço:</label><br>
    <input type="text" name="endereco"><br><br>

    <button type="submit">Salvar</button>
</form>

<?php include __DIR__ . '/../rodape.php'; ?>