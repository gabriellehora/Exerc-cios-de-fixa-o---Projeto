<?php
require_once 'config.php';
require_once 'cabecalho.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID não informado.');
}

/* Busca o contato atual */
$stmt = $pdo->prepare('SELECT * FROM contatos WHERE id = ?');
$stmt->execute([$id]);

$contato = $stmt->fetch();

if (!$contato) {
    die('Contato não encontrado.');
}

/* Atualiza o contato */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if ($nome && $email) {

        $stmt = $pdo->prepare(
            'UPDATE contatos
             SET nome = ?, email = ?, telefone = ?
             WHERE id = ?'
        );

        $stmt->execute([$nome, $email, $telefone, $id]);

        header('Location: index.php');
        exit;
    }
}
?>

<h2>Editar Contato</h2>

<form action="" method="POST">

    <label>Nome:</label><br>
    <input
        type="text"
        name="nome"
        value="<?= htmlspecialchars($contato['nome']) ?>"
    >
    <br><br>

    <label>E-mail:</label><br>
    <input
        type="email"
        name="email"
        value="<?= htmlspecialchars($contato['email']) ?>"
    >
    <br><br>

    <label>Telefone:</label><br>
    <input
        type="text"
        name="telefone"
        value="<?= htmlspecialchars($contato['telefone']) ?>"
    >
    <br><br>

    <button type="submit">Salvar Alterações</button>

</form>

<?php include 'rodape.php'; ?>