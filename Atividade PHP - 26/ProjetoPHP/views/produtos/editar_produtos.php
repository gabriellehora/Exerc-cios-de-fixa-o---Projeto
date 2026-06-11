<?php
require_once dirname(__DIR__, 2) . '/config/database.php';
require_once dirname(__DIR__, 2) . '/models/ProdutoDAO.php';
include __DIR__ . '/../cabecalho.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID não informado.');
}

$produto = obterProdutoPorId($pdo, $id);

if (!$produto) {
    die('Produto não encontrado.');
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = trim($_POST['descricao'] ?? '');
    $preco     = trim($_POST['preco'] ?? '');
    $estoque   = trim($_POST['estoque'] ?? '');
    $imagem = $produto['imagem'];

    if (!is_numeric($preco) || $preco <= 0) {

        $erro = 'Preço inválido!';

    } elseif (!ctype_digit($estoque) || $estoque < 0) {

        $erro = 'Estoque inválido!';

    } else {

        if (!empty($_FILES['imagem']['name'])) {

            $extensao = pathinfo(
                $_FILES['imagem']['name'],
                PATHINFO_EXTENSION
            );

            $permitidos = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array(strtolower($extensao), $permitidos)) {

                $erro = 'Tipo de imagem não permitido.';

            } else {

                $pasta = '../../uploads/';

                if (!is_dir($pasta)) {
                    mkdir($pasta, 0777, true);
                }

                $nomeArquivo = uniqid('prod_') . '.' . $extensao;

                move_uploaded_file(
                    $_FILES['imagem']['tmp_name'],
                    $pasta . $nomeArquivo
                );

                $imagem = 'uploads/' . $nomeArquivo;
            }
        }

        if (!$erro) {
            atualizarProduto(
                $pdo,
                $id,
                $descricao,
                (float)$preco,
                (int)$estoque,
                $imagem
            );
            header('Location: ../../index.php?pagina=produtos');
        }
    }
}
?>

<h2>Editar Produto</h2>

<?php if ($erro): ?>
    <p><?= $erro ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">

    <label>Descrição:</label><br>
    <input type="text" name="descricao"
        value="<?= htmlspecialchars($produto['descricao']) ?>">
    <br><br>

    <label>Preço:</label><br>
    <input type="number" step="0.01" name="preco"
        value="<?= htmlspecialchars($produto['preco']) ?>">
    <br><br>

    <label>Estoque:</label><br>
    <input type="number" name="estoque"
        value="<?= htmlspecialchars($produto['estoque']) ?>">
    <br><br>

    <?php if (!empty($produto['imagem'])): ?>
        <img src="../../<?= $produto['imagem'] ?>" width="80">
        <br><br>
    <?php endif; ?>

    <label>Nova Imagem:</label><br>
    <input type="file" name="imagem">
    <br><br>

    <button type="submit">
        Salvar Alterações
    </button>

</form>

<?php include __DIR__ . '/../rodape.php'; ?>