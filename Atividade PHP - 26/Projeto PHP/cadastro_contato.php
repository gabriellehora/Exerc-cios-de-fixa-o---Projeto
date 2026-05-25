<?php
require_once 'config.php';
require_once 'cabecalho.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nome     = trim($_POST['nome'] 	?? '');
	$email    = trim($_POST['email']	?? '');
	$telefone = trim($_POST['telefone'] ?? '');
 
	if ($nome && $email) {
    	$stmt = $pdo->prepare(
        	'INSERT INTO contatos (nome, email, telefone) VALUES (?, ?, ?)'
    	);
    	$stmt->execute([$nome, $email, $telefone]);
    	header('Location: index.php');
    	exit;
	}
}

?>

<h2>Cadastrar Contato</h2>

<?php if ($erro): ?>
    <p><?= $erro ?></p>
<?php endif; ?>

<form action="" method="POST">

    <label>Nome:</label><br>
    <input type="text" name="nome"><br><br>

    <label>E-mail:</label><br>
    <input type="email" name="email"><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone"><br><br>

    <button type="submit">Cadastrar</button>

</form>
