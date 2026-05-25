<?php
require_once 'config.php';
require_once 'cabecalho.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nome     = trim($_POST['nome'] 	?? '');
    $cpf      = trim($_POST['cpf']      ?? '');
	$email    = trim($_POST['email']	?? '');
	$telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    if (strlen($cpf) != 14) {

        $erro ='CPF invalido!';
    } else { 
 
	if ($nome && $cpf && $email) {
    	$stmt = $pdo->prepare(
        	'INSERT INTO clientes (nome, cpf, email, telefone, endereco) VALUES (?, ?, ?, ?, ?)'
    	);
    	$stmt->execute([$nome, $cpf, $email, $telefone, $endereco]);
    	header('Location: clientes.php');
    	exit;
	}
}
}

?>

<h2>Cadastrar Cliente</h2>

<?php if ($erro): ?>
    <p><?= $erro ?></p>
<?php endif; ?>

<form action="" method="POST">

    <label>Nome:</label><br>
    <input type="text" name="nome"><br><br>

    <label>Cpf:</label><br>
    <input type="text" name="cpf"><br><br>

    <label>E-mail:</label><br>
    <input type="email" name="email"><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone"><br><br>

    <label>Endereco</label><br>
    <input type="text" name="endereco"><br><br>

    <button type="submit">Cadastrar</button>

</form>
