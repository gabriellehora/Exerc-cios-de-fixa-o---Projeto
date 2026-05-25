<?php
// funcoes.php — funções reutilizáveis

function obterContatos(PDO $pdo): array {
	$stmt = $pdo->query('SELECT * FROM contatos ORDER BY nome');
	return $stmt->fetchAll();
}

/**
 * Renderiza a tabela HTML com a lista de contatos.
 */
function exibirTabelaContatos(array $contatos): void {
    if (empty($contatos)) {
        echo "<p>Nenhum contato encontrado.</p>";
        return;
    }

    echo "<table>\n";
    echo "  <thead>\n";
    echo "    <tr><th>#</th><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Editar</th><th>Excluir</th></tr>\n";
    echo "  </thead>\n";
    echo "  <tbody>\n";

    foreach ($contatos as $indice => $contato) {
        $id    =$contato['id'];
        $num   = $indice + 1;
        $nome  = htmlspecialchars($contato['nome']);
        $email = htmlspecialchars($contato['email']);
        $fone  = htmlspecialchars($contato['telefone']);

        echo "    <tr>\n";
        echo "      <td>{$num}</td>\n";
        echo "      <td>{$nome}</td>\n";
        echo "      <td>{$email}</td>\n";
        echo "      <td>{$fone}</td>\n";
        echo "      <td><a href='editar_contato.php?id={$id}'>Editar</a></td>\n";
        echo "      <td><a href='excluir_contato.php?id={$id}'>Excluir</a></td>\n";
        echo "    </tr>\n";
        
    }

    echo "  </tbody>\n";
    echo "</table>\n";
}


