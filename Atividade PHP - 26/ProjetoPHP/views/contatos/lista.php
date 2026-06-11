<?php if (empty($contatos)): ?>

<p>Nenhum contato encontrado.</p>

<?php else: ?>

<table>
<thead>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
</thead>

<tbody>

<?php foreach ($contatos as $indice => $contato): ?>

    <tr>
        <td><?= $indice + 1 ?></td>
        <td><?= htmlspecialchars($contato['nome']) ?></td>
        <td><?= htmlspecialchars($contato['email']) ?></td>
        <td><?= htmlspecialchars($contato['telefone']) ?></td>
        <td>
        <a href="../../index.php?pagina=contatos&acao=editar&id=<?= $contato['id'] ?>">
            Editar
        </a>
        </td>
        <td>
        <a href="../../index.php?pagina=contatos&acao=excluir&id=<?= $contato['id'] ?>">
            Excluir
        </a>
        </td>

    </tr>

<?php endforeach; ?>

</tbody>
</table>

<?php endif; ?>

<br>

<a href="views/contatos/cadastro_contato.php">
    Cadastrar Novo Contato
</a>