<?php

require_once "config.php";    
include      "cabecalho.php"; 
include_once "funcoes_produtos.php"; 

$produtos = obterProdutos($pdo);

?>

<?php
exibirTabelaProdutos($produtos);
?>

<a href="cadastro_produtos.php">Cadastrar Novo Produto</a>

<?php include "rodape.php"; ?>

</body>
</html>