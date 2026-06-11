<h2><?= $titulo ?></h2>

<?php if ($erro): ?>
    <p><?= $erro ?></p>
<?php endif; ?>

<form method="POST">

    <label>Nome:</label><br>
    <input type="text" name="nome"
        value="<?= $cliente['nome'] ?? '' ?>">
    <br><br>

    <label>CPF:</label><br>
    <input type="text" name="cpf"
        value="<?= $cliente['cpf'] ?? '' ?>">
    <br><br>

    ...

</form>