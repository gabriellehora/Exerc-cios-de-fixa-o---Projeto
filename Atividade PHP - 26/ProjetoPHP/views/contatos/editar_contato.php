<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/ContatoDAO.php';
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
    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if ($nome && $email) {
        atualizarContato(
            $pdo,
            $id,
            $nome,
            $email,
            $telefone
        );
        header('Location: ../../index.php?pagina=contatos');
        exit;
    }
}
?>

<h2>Editar Contato</h2>

<form method="POST">

    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($contato['nome']) ?>">
    <br><br>

    <label>E-mail:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($contato['email']) ?>">
    <br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone" value="<?= htmlspecialchars($contato['telefone']) ?>">
    <br><br>

    <button type="submit">Salvar Alterações</button>

</form>

<?php include __DIR__ . '/../rodape.php'; ?>