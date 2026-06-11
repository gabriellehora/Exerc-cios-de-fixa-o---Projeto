<?php if (empty($produtos)): ?>

<p>Nenhum produto encontrado.</p>

<?php else: ?>

<table>
<thead>
    <tr>
        <th>#</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Estoque</th>
        <th>Imagem</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
</thead>
<tbody>

<?php foreach ($produtos as $indice => $produto): ?>

    <tr>
        <td><?= $indice + 1 ?></td>
        <td><?= htmlspecialchars($produto['descricao']) ?></td>
        <td>
            R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
        </td>
        <td><?= htmlspecialchars($produto['estoque']) ?></td>
        <td>
            <?php if (!empty($produto['imagem'])): ?>

                <img
                    src="<?= $produto['imagem'] ?>"
                    width="80">
            <?php endif; ?>

        </td>
        <td>
            <a href="index.php?pagina=produtos&acao=editar&id=<?= $produto['id'] ?>">
                Editar
            </a>
        </td>
        <td>
            <a href="index.php?pagina=produtos&acao=excluir&id=<?= $produto['id'] ?>">
                Excluir
            </a>
        </td>
    </tr>

<?php endforeach; ?>

</tbody>

</table>

<?php endif; ?>

<br>

<a href="index.php?pagina=produtos&acao=cadastrar">
    Cadastrar Novo Produto
</a>