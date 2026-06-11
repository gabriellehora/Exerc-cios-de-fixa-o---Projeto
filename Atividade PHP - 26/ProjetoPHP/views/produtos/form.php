<form method="POST" enctype="multipart/form-data">

    <label>Nome:</label><br>
    <input
        type="text"
        name="nome"
        value="<?= $produto['nome'] ?? '' ?>">
    <br><br>

    <label>Descrição:</label><br>
    <input
        type="text"
        name="descricao"
        value="<?= $produto['descricao'] ?? '' ?>">
    <br><br>

    <label>Preço:</label><br>
    <input
        type="number"
        step="0.01"
        name="preco"
        value="<?= $produto['preco'] ?? '' ?>">
    <br><br>

    <label>Estoque:</label><br>
    <input
        type="number"
        name="estoque"
        value="<?= $produto['estoque'] ?? '' ?>">
    <br><br>

    <label>Imagem:</label><br>
    <input type="file" name="imagem">
    <br><br>

    <button type="submit">
        Salvar
    </button>

</form>