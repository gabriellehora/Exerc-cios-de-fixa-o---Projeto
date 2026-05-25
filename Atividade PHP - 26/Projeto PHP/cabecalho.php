<!-- cabecalho.php -->

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Projeto PHP</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f4f4;
            color: #222;

            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* DARK MODE BODY */
        body.dark-mode {
            background: #1b1b1b;
            color: white;
        }

        /* NAVBAR */
        .navbar {
            background: #222;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 25px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 12px;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #00bfff;
        }

        /* CONTEÚDO */
        .container {
            padding: 20px;
            flex: 1;
        }

        h2 {
            margin-top: 0;
        }

        /* TABELAS */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-top: 15px;
        }

        th {
            background: #333;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f1f1f1;
        }

        /* LINKS */
        a {
            text-decoration: none;
            color: #0066cc;
        }

        a:hover {
            text-decoration: underline;
        }

        /* BOTÕES */
        button {
            background: #444;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #666;
        }

        /* FORMULÁRIOS */
        input {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        /* IMAGENS */
        img {
            border-radius: 6px;
        }

        /* RODAPÉ */
        .rodape {
            background: #222;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 30px;
        }

        /* DARK MODE */
        body.dark-mode table {
            background: #2a2a2a;
        }

        body.dark-mode th {
            background: #111;
        }

        body.dark-mode td {
            border-color: #555;
        }

        body.dark-mode tr:hover {
            background: #333;
        }

        body.dark-mode input {
            background: #333;
            color: white;
            border: 1px solid #555;
        }

        body.dark-mode .navbar,
        body.dark-mode .rodape {
            background: black;
        }

        body.dark-mode a {
            color: #4da6ff;
        }

    </style>

</head>

<body>

<nav class="navbar">

    <div>
        <a href="index.php">Contatos</a>
        <a href="clientes.php">Clientes</a>
        <a href="produtos.php">Produtos</a>
    </div>

    <button id="themeToggle">
        Dark Mode
    </button>

</nav>

<div class="container">