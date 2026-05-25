<?php

require_once "config.php";    
include      "cabecalho.php"; 
include_once "funcoes_clientes.php"; 

$clientes = obterClientes($pdo);

?>

<?php
exibirTabelaClientes($clientes);
?>

<a href="cadastro_cliente.php">Cadastrar Novo Cliente</a>

<?php include "rodape.php"; ?>

</body>
</html>