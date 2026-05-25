<?php
// index.php — página principal

require_once "config.php";    // erro fatal se não encontrar
include      "cabecalho.php"; // warning se não encontrar
include_once "funcoes.php";   // inclui apenas uma vez

$contatos = obterContatos($pdo);
?>

<?php
exibirTabelaContatos($contatos);
?>

<a href="cadastro_contato.php">Cadastrar Novo Contato</a>


<?php include "rodape.php"; ?>

</body>

</html>
