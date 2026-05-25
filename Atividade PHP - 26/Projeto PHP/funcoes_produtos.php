<?php

function obterProdutos(PDO $pdo): array {
	$stmt = $pdo->query('SELECT * FROM produtos ORDER BY nome');
	return $stmt->fetchAll(PDO:: FETCH_ASSOC);
}

/**
 * Renderiza a tabela HTML com a lista de produtos.
 */
function exibirTabelaProdutos(array $produtos): void {
    if (empty($produtos)) {
        echo "<p>Nenhum produto encontrado.</p>";
        return;
    }

    echo "<table>\n";
    echo "  <thead>\n";
    echo "    <tr><th>#</th><th>Nome</th><th>Descricao</th><th>Preco</th><th>Estoque</th><th>Imagem</th><th>Editar</th><th>Excluir</th></tr>\n";
    echo "  </thead>\n";
    echo "  <tbody>\n";

    
    foreach ($produtos as $indice => $produto) {

        $id        = $produto['id'];
        $num       = $indice + 1;
        $nome      = htmlspecialchars($produto['nome']);
        $descricao = htmlspecialchars($produto['descricao']);
        $preco     = number_format($produto['preco'], 2, ',', '.');
        $estoque   = htmlspecialchars($produto['estoque']);
        $imagem    = $produto['imagem'];

        echo "<tr>";

        echo "<td>{$num}</td>";
        echo "<td>{$nome}</td>";
        echo "<td>{$descricao}</td>";
        echo "<td>R$ {$preco}</td>";
        echo "<td>{$estoque}</td>";

        echo "<td>";

        if (!empty($imagem)) {
            echo "<img src='{$imagem}' width='60' height='60' style='object-fit:cover'>";
        } else {
            echo "Sem imagem";
        }

        echo "</td>";

        echo "<td><a href='editar_produtos.php?id={$id}'>Editar</a></td>";
        echo "<td><a href='excluir_produtos.php?id={$id}'>Excluir</a></td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}