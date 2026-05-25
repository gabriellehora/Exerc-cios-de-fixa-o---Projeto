<?php
require_once 'config.php';
require_once 'cabecalho.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('ID não informado.');
}

/* Busca o produto */
$stmt = $pdo->prepare(
    'SELECT * FROM produtos WHERE id = ?'
);

$stmt->execute([$id]);

$produto = $stmt->fetch();

if (!$produto) {
    die('Produto não encontrado.');
}

$erro = '';

/* Atualiza o produto */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome      = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $preco     = trim($_POST['preco'] ?? '');
    $estoque   = trim($_POST['estoque'] ?? '');

    $imagem = $produto['imagem'];

    // validações
    if (!is_numeric($preco) || $preco <= 0) {

        $erro = 'Preço inválido!';

    } elseif (!ctype_digit($estoque) || $estoque < 0) {

        $erro = 'Estoque inválido!';

    } else {

        // upload de nova imagem
        if (!empty($_FILES['imagem']['name'])) {

            $extensao = pathinfo(
                $_FILES['imagem']['name'],
                PATHINFO_EXTENSION
            );

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

        if (!$erro) {

            $stmt = $pdo->prepare(
                'UPDATE produtos
                 SET nome = ?, descricao = ?, preco = ?, estoque = ?, imagem = ?
                 WHERE id = ?'
            );

            $stmt->execute([
                $nome,
                $descricao,
                $preco,
                $estoque,
                $imagem,
                $id
            ]);

            header('Location: produtos.php');
            exit;
        }
    }
}
?>

<h2>Editar Produto</h2>

<?php if ($erro): ?>
    <p><?= $erro ?></p>
<?php endif; ?>

<form action="" method="POST" enctype="multipart/form-data">

    <label>Nome:</label><br>
    <input type="text" name="nome"
        value="<?= htmlspecialchars($produto['nome']) ?>">
    <br><br>

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

    <label>Imagem Atual:</label><br>

    <?php if (!empty($produto['imagem'])): ?>
        <img src="<?= $produto['imagem'] ?>"
             width="80">
    <?php endif; ?>

    <br><br>

    <label>Nova Imagem:</label><br>
    <input type="file" name="imagem">
    <br><br>

    <button type="submit">
        Salvar Alterações
    </button>

</form>

<?php include 'rodape.php'; ?>