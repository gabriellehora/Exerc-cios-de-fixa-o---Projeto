<?php
require_once dirname(__DIR__, 2) . '/config/database.php';
require_once dirname(__DIR__, 2) . '/models/ProdutoDAO.php';
include __DIR__ . '/../cabecalho.php';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $descricao = trim($_POST['descricao'] ?? '');
    $preco     = trim($_POST['preco'] ?? '');
    $estoque   = trim($_POST['estoque'] ?? '');
    $imagem = '';

    if (!is_numeric($preco) || $preco <= 0) {
        $erro = "Preço deve ser um número positivo.";
    }

    if (!ctype_digit($estoque) || $estoque < 0) {
        $erro = "Estoque deve ser um inteiro não negativo.";
    }

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

    if (!$erro && $descricao && $preco && $estoque) { 

        inserirProduto(
            $pdo,
            $descricao,
            (float)$preco,
            (int)$estoque,
            $imagem
        );

        header('Location: ../../index.php?pagina=produtos');

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

<?php include __DIR__ . '/../rodape.php'; ?>