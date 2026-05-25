<?php
require_once 'config.php';
require_once 'cabecalho.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome      = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $preco     = trim($_POST['preco'] ?? '');
    $estoque   = trim($_POST['estoque'] ?? '');

    $imagem = '';

    //Validação de preço
    if (!is_numeric($preco) || $preco <= 0) {
        $erro = "Preço deve ser um número positivo.";
    }

    if (!ctype_digit($estoque) || $estoque < 0) {
        $erro = "Estoque deve ser um inteiro não negativo.";
    }

    // Upload de imagem
    if (!$erro && !empty($_FILES['imagem']['name'])) {

        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $permitidos = ['jpg', 'jpeg', 'png', 'webp'];

        if (!in_array(strtolower($extensao), $permitidos)) {
            $erro = 'Tipo de imagem não permitido.';
        } else {

            $pasta = 'uploads/';

            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }

            $nomeArquivo = uniqid('prod_') . '.' . $extensao;

            move_uploaded_file(
                $_FILES['imagem']['tmp_name'],
                $pasta . $nomeArquivo
            );

            $imagem = $pasta . $nomeArquivo;
        }
    }

    if (!$erro && $nome && $descricao && $preco && $estoque) {

        $stmt = $pdo->prepare(
            'INSERT INTO produtos (nome, descricao, preco, estoque, imagem)
             VALUES (?, ?, ?, ?, ?)'
        );

        $stmt->execute([
            $nome,
            $descricao,
            $preco,
            $estoque,
            $imagem
        ]);

        header('Location: produtos.php');
        exit;

    } else if (!$erro) {
        $erro = "Preencha todos os campos obrigatórios!";
    }
}
?>

<h2>Cadastrar Produto</h2>

<?php if ($erro): ?>
    <p style="color:red;"><?= $erro ?></p>
<?php endif; ?>

<form action="" method="POST" enctype="multipart/form-data">

    <label>Nome:</label><br>
    <input type="text" name="nome"><br><br>

    <label>Descrição:</label><br>
    <input type="text" name="descricao"><br><br>

    <label>Preço:</label><br>
    <input type="number" step="0.01" name="preco"><br><br>

    <label>Estoque:</label><br>
    <input type="number" name="estoque"><br><br>

    <label>Imagem:</label><br>
    <input type="file" name="imagem"><br><br>

    <button type="submit">Cadastrar</button>

</form>