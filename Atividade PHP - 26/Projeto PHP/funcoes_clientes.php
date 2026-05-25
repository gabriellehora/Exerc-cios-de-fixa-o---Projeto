<?php

function obterClientes(PDO $pdo): array {
	$stmt = $pdo->query('SELECT * FROM clientes ORDER BY nome');
	return $stmt->fetchAll();
}

/**
 * Renderiza a tabela HTML com a lista de clientes.
 */
function exibirTabelaClientes(array $clientes): void {
    if (empty($clientes)) {
        echo "<p>Nenhum cliente encontrado.</p>";
        return;
    }

    echo "<table>\n";
    echo "  <thead>\n";
    echo "    <tr><th>#</th><th>Nome</th><th>Cpf</th><th>E-mail</th><th>Telefone</th><th>Endereco</th><th>Editar</th><th>Excluir</th></tr>\n";
    echo "  </thead>\n";
    echo "  <tbody>\n";

    foreach ($clientes as $indice => $cliente) {
        $id    =$cliente['id'];
        $num   = $indice + 1;
        $nome  = htmlspecialchars($cliente['nome']);
        $cpf   = htmlspecialchars($cliente['cpf']);
        $email = htmlspecialchars($cliente['email']);
        $fone  = htmlspecialchars($cliente['telefone']);
        $endereco = htmlspecialchars($cliente['endereco']);

        echo "    <tr>\n";
        echo "      <td>{$num}</td>\n";
        echo "      <td>{$nome}</td>\n";
        echo "      <td>{$cpf}</td>\n";
        echo "      <td>{$email}</td>\n";
        echo "      <td>{$fone}</td>\n";
        echo "      <td>{$endereco}</td>\n";
        echo "      <td><a href='editar_cliente.php?id={$id}'>Editar</a></td>\n";
        echo "      <td><a href='excluir_cliente.php?id={$id}'>Excluir</a></td>\n";
        echo "    </tr>\n";
        
    }

    echo "  </tbody>\n";
    echo "</table>\n";
}


