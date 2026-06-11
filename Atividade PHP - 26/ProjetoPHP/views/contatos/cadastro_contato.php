<?php
require_once '../../config/database.php';
require_once '../../models/ContatoDAO.php';
include '../cabecalho.php';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if ($nome && $email) {
        inserirContato(
            $pdo,
            $nome,
            $email,
            $telefone
        );
        header('Location: contatos.php');
        exit;
    }
}

?>

<h2>Cadastrar Contato</h2>

<form method="POST">

    <label>Nome:</label><br>
    <input type="text" name="nome"><br><br>

    <label>E-mail:</label><br>
    <input type="email" name="email"><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone"><br><br>

    <button type="submit">
        Cadastrar
    </button>

</form>

<?php include '../rodape.php'; ?>