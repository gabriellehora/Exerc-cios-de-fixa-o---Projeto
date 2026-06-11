<form method="POST">

    <label>Nome:</label><br>
    <input
        type="text"
        name="nome"
        value="<?= $contato['nome'] ?? '' ?>">
    <br><br>

    <label>E-mail:</label><br>
    <input
        type="email"
        name="email"
        value="<?= $contato['email'] ?? '' ?>">
    <br><br>

    <label>Telefone:</label><br>
    <input
        type="text"
        name="telefone"
        value="<?= $contato['telefone'] ?? '' ?>">
    <br><br>

    <button type="submit">
        Salvar
    </button>

</form>