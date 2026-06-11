<?php if (empty($clientes)): ?>

<p>Nenhum cliente encontrado.</p>

<?php else: ?>

<table>
<thead>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
</thead>

<tbody>

<?php foreach ($clientes as $indice => $cliente): ?>

    <tr>
        <td><?= $indice + 1 ?></td>
        <td><?= htmlspecialchars($cliente['nome']) ?></td>
        <td><?= htmlspecialchars($cliente['cpf']) ?></td>
        <td><?= htmlspecialchars($cliente['email']) ?></td>
        <td><?= htmlspecialchars($cliente['telefone']) ?></td>
        <td><?= htmlspecialchars($cliente['endereco']) ?></td>
        <td>
            <a href="index.php?pagina=clientes&acao=editar&id=<?= $cliente['id'] ?>">
                Editar
            </a>
        </td>

        <td>
            <a href="index.php?pagina=clientes&acao=excluir&id=<?= $cliente['id'] ?>">
                Excluir
            </a>
        </td>
    </tr>

<?php endforeach; ?>

</tbody>
</table>

<br>

<a href="index.php?pagina=clientes&acao=cadastrar">
    Cadastrar Novo Cliente
</a>

<?php endif; ?>